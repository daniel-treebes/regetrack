<?php
//Bodegas Libres

$queryBateriaSiguiente="
	SELECT
		IF (TIMESTAMPDIFF(hour, tubb.fecha_descanso, now())>=8,'1 lista',
			IF (tubb.fecha_descanso<>'0000-00-00 00:00:00','2 descanso','3 carga')
		) as estado,
		tubb.id as movimientoid,
		tcg.idcargadores as cg_id,
		tcg.cargadores_nombre as cg_nombre,
		tbt.idbaterias as bt_id,
		tbt.baterias_nombre as bt_nombre,
		tubb.bg as bg_id,
		CONCAT(TIMESTAMPDIFF(hour, tubb.fecha_descanso, now()),'H ',
			(TIMESTAMPDIFF(minute, tubb.fecha_descanso, now())-TIMESTAMPDIFF(hour, tubb.fecha_descanso, now())*60),'M')
			as t_descanso,
		CONCAT(TIMESTAMPDIFF(hour, tubb.fecha_carga, now()),'H ',
			(TIMESTAMPDIFF(minute, tubb.fecha_carga, now())-TIMESTAMPDIFF(hour, tubb.fecha_carga, now())*60),'M')
			as t_carga
	FROM uso_baterias_bodega as tubb,
		bodegas as tbg,
		baterias as tbt,
		cargadores as tcg,
		montacargas as tmc
	WHERE
		(
			(tubb.fecha_salida='0000-00-00 00:00:00'
			&& tubb.fecha_descanso<>'0000-00-00 00:00:00')
		OR (tubb.fecha_descanso='0000-00-00 00:00:00'
			&& tubb.fecha_carga<>'0000-00-00 00:00:00')
		)
		AND tbg.id=tubb.bg
		AND tbg.cg=tcg.idcargadores
		AND tbt.idbaterias=tubb.bt
		AND tmc.idmontacargas=".$_GET['id']."
		AND tbt.idbaterias NOT IN (
			SELECT bt
			FROM deshabilitabt
			WHERE fecha_salida ='0000-00-00 00:00:00'
			GROUP BY bt
		)
        AND tbt.idbaterias IN (
			SELECT idbaterias
			FROM montacargas_baterias
			WHERE idmontacargas =".$_GET['id']."
		)
		AND tcg.idsucursal IN (".$loggedInUser->sucursales.")
		AND tmc.idsucursal IN (".$loggedInUser->sucursales.")
		AND tbt.idsucursal IN (".$loggedInUser->sucursales.")
	ORDER BY estado, t_descanso DESC, t_carga DESC
	LIMIT 1
";

$res = $mysqli->query($queryBateriaSiguiente);
$bateriaSiguiente=array();
while($fila = $res->fetch_array()) {
    $bateriaSiguiente=$fila;
}

$queryEspacioDisponible="
	SELECT
		tcg.idcargadores as cg_id,
		tcg.cargadores_nombre as cg_nombre,
		tbg.id as bg_id
	FROM bodegas as tbg, cargadores as tcg, montacargas as tmc,
		montacargas_baterias as tmb, cargadores_baterias as tcb
	WHERE
		tbg.id NOT IN (
			SELECT tubb.bg as bg
			FROM uso_baterias_bodega as tubb, bodegas as tbg, cargadores as tcg, montacargas as tmc,
				montacargas_baterias as tmb, cargadores_baterias as tcb
			WHERE
				(
					tubb.fecha_salida='0000-00-00 00:00:00'
					OR tubb.fecha_descanso='0000-00-00 00:00:00'
					OR tubb.fecha_carga='0000-00-00 00:00:00'
				)
				AND tbg.id=tubb.bg
				AND tbg.cg=tcg.idcargadores
				AND tcg.idcargadores=tcb.idcargadores
				AND tmc.idmontacargas=tmb.idmontacargas
				AND tmc.idmontacargas=".$_GET['id']."
				AND tcg.idsucursal IN (".$loggedInUser->sucursales.")
				AND tmc.idsucursal IN (".$loggedInUser->sucursales.")
			GROUP BY bg
			ORDER BY tubb.id
		)
		AND tbg.cg=tcg.idcargadores
		AND tcg.idcargadores=tcb.idcargadores
		AND tmc.idmontacargas=tmb.idmontacargas
		AND tmc.idmontacargas=".$_GET['id']."
		AND tcg.idsucursal IN (".$loggedInUser->sucursales.")
		AND tmc.idsucursal IN (".$loggedInUser->sucursales.")
	GROUP BY cg_id
";
//echo '<pre>';var_dump($queryEspacioDisponible);echo  '</pre>';exit();
//Los ocupados serviran para saber si está vacío!
$queryCargadorOcupado="
	SELECT
		tbg.cg as cg,
		MAX(tubb.fecha_carga) as maxfc,
		MIN(tubb.fecha_descanso) as minfd
	FROM uso_baterias_bodega as tubb, bodegas as tbg, cargadores as tcg, montacargas as tmc,
		montacargas_baterias as tmb, cargadores_baterias as tcb
	WHERE
		(
			tubb.fecha_salida='0000-00-00 00:00:00'
			OR tubb.fecha_descanso='0000-00-00 00:00:00'
			OR tubb.fecha_carga='0000-00-00 00:00:00'
		)
		AND tbg.id=tubb.bg
		AND tbg.cg=tcg.idcargadores
		AND tcg.idcargadores=tcb.idcargadores
		AND tmc.idmontacargas=tmb.idmontacargas
		AND tmc.idmontacargas=".$_GET['id']."
		AND tcg.idsucursal IN (".$loggedInUser->sucursales.")
		AND tmc.idsucursal IN (".$loggedInUser->sucursales.")
	GROUP BY cg
	ORDER BY minfd, maxfc
";

//los cargadores deshabilitados... pueden usar los espacios pero no cargar!
$queryCargadorDeshabilitado="
	SELECT dcg.cg, dcg.fecha_entrada
	FROM deshabilitacg as dcg, cargadores as tcg
	WHERE dcg.fecha_salida ='0000-00-00 00:00:00'
		AND dcg.cg=tcg.idcargadores
		AND tcg.idsucursal IN (".$loggedInUser->sucursales.")
	GROUP BY cg
";

$espaciosDisponibles=array();
$res = $mysqli->query($queryEspacioDisponible);
while($fila = $res->fetch_array()) {
    $espaciosDisponibles[$fila['cg_id']]=$fila;
}

$cargadoresOcupados=array();
$res = $mysqli->query($queryCargadorOcupado);
while($fila = $res->fetch_array()) {
    $cargadoresOcupados[$fila['cg']]=$fila;
}

$cargadoresDeshabilitados=array();
$res = $mysqli->query($queryCargadorDeshabilitado);
while($fila = $res->fetch_array()) {
    $cargadoresDeshabilitados[$fila['cg']]=$fila;
}

$cargadorSiguiente=array();

//En caso de haber más de 1 primero quita los deshabilitados excepto el último
foreach ($espaciosDisponibles as $cg_id => $datos){
	if (count($espaciosDisponibles)<=1){
		break;
	}else{
		if (array_key_exists ($cg_id,$cargadoresDeshabilitados)){
			unset ($espaciosDisponibles[$cg_id]);
		}
	} 
}

//Selecciona el cargador más adecuado
foreach ($espaciosDisponibles as $cg_id => $datos){
	$termina=0;
	if (!array_key_exists ($cg_id,$cargadoresOcupados)){
		//Si cargador está vacío lo escoje y ya
		$cargadorSiguiente=$datos;
		$cargadorSiguiente['minfd']='0000-00-00 00:00:00';
		$cargadorSiguiente['maxfc']='0000-00-00 00:00:00';
		$termina=1;
	}else{
		if ($cargadoresOcupados[$cg_id]['minfd']!='0000-00-00 00:00:00'){
			//Si el cargador está sin cargar lo escoje y ya
			$cargadorSiguiente=$datos;
			$cargadorSiguiente['minfd']=$cargadoresOcupados[$cg_id]['minfd'];
			$cargadorSiguiente['maxfc']=$cargadoresOcupados[$cg_id]['maxfc'];
			$termina=1;
		}else{
			if (count($cargadorSiguiente)==0){
				//Si no se ha elegido ninguno, lo pone para comparacíon
				$cargadorSiguiente=$datos;
				$cargadorSiguiente['minfd']=$cargadoresOcupados[$cg_id]['minfd'];
				$cargadorSiguiente['maxfc']=$cargadoresOcupados[$cg_id]['maxfc'];
			}else{
				//Si el nuevo cargador tiene más tiempo cargando, lo cambia
				if ($cargadoresOcupados[$cg_id]['maxfc']<$cargadorSiguiente['maxfc']){
					$cargadorSiguiente=$datos;
					$cargadorSiguiente['minfd']=$cargadoresOcupados[$cg_id]['minfd'];
					$cargadorSiguiente['maxfc']=$cargadoresOcupados[$cg_id]['maxfc'];
				}
			}
		}
	}
	if (array_key_exists ($cg_id,$cargadoresDeshabilitados)){
		$cargadorSiguiente['f_des']=$cargadoresDeshabilitados[$cg_id]['fecha_entrada'];
	}else{
		$cargadorSiguiente['f_des']='0000-00-00 00:00:00';
	}
	if ($termina==1) break;
}


	$queryBateriaActual="
		SELECT
			u.id as Id,
			u.bt as bt,
			b.baterias_nombre as bt_nombre,
			TIMESTAMPDIFF(hour, u.fecha_entrada, now()) as horas,
			CONCAT(
				TIMESTAMPDIFF(day, u.fecha_entrada, now()),'D ',    
				TIMESTAMPDIFF(hour, u.fecha_entrada, now())-TIMESTAMPDIFF(day, u.fecha_entrada, now())*24,'H  ',
				TIMESTAMPDIFF(minute, u.fecha_entrada, now())-(TIMESTAMPDIFF(hour, u.fecha_entrada, now()))*60,'M')
				AS tiempo,
			TIMESTAMPDIFF(second, u.fecha_entrada, now()) as seg
		FROM
			uso_baterias_montacargas as u, baterias as b
		WHERE
			u.bt = b.idbaterias
			AND u.mc = ".$_GET['id']."
			AND u.fecha_salida='0000-00-00 00:00:00'
			AND b.idsucursal IN (".$loggedInUser->sucursales.")
		limit 1
   ";
   
   $siHay=0;
   $resultado2 = $mysqli->query($queryBateriaActual);
   $porcentaje=0;
   while($fila = $resultado2->fetch_array()) {
	  $idMovimientoBtaMC=$fila['Id'];
	  $idBateria= $fila['bt'];
	  $nombreBateria=$fila['bt_nombre'];
	  $tiempoDeUso= $fila['tiempo'];
	  $segundos= $fila['seg'];
	  $porcentaje= ($fila['horas']/8)*100;
	  $siHay=$fila['Id'];
   }
   
	$queryBateriaAnt="
	  SELECT
		 u.id as Id,
		 u.bt as bt,
		 b.baterias_nombre as btnombre,
		 TIMESTAMPDIFF(hour, fecha_entrada, fecha_salida) as horas,
		 CONCAT(
			TIMESTAMPDIFF(day, fecha_entrada, fecha_salida),'D ',    
			TIMESTAMPDIFF(hour, fecha_entrada, fecha_salida)-TIMESTAMPDIFF(day, fecha_entrada, fecha_salida)*24,'H  ',
			TIMESTAMPDIFF(minute, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(hour, fecha_entrada, fecha_salida))*60,'M') AS tiempo,
		 TIMESTAMPDIFF(second, fecha_entrada, fecha_salida) seg
	  FROM
		 uso_baterias_montacargas as u, baterias as b
	  WHERE b.idbaterias=u.bt
		 AND u.mc= ".$_GET['id']."
		 AND b.idsucursal IN (".$loggedInUser->sucursales.")
	  ORDER BY fecha_salida DESC
	  limit 1
   ";
   
   $resultado2 = $mysqli->query($queryBateriaAnt);
   $idBateriaAnt=' ';
   $tiempoDeUsoAnt=0;
   $porcentajeAnt=0;
   while($fila = $resultado2->fetch_array()) {
	  $idBateriaAnt= $fila['btnombre'];
	  $tiempoDeUsoAnt= $fila['tiempo'];
	  $porcentajeAnt= ($fila['horas']/8)*100;
   }

   $segundossinuso=0;

/*
   $querySinBatUltimo="
		SELECT 
			((60*60*24*7)-SUM(TIMESTAMPDIFF(second, fecha_entrada, now()))) AS sin_uso
		FROM
			uso_baterias_montacargas
		WHERE
			mc= ".$_GET['id']." AND
			fecha_salida='0000-00-00 00:00:00'
   ";
   $resultado = $mysqli->query($querySinBatUltimo);
   while($fila = $resultado->fetch_array()) {
		$segundossinuso+=$fila['sin_uso'];
   }
*/   
   $querySinBat7Dias="
		SELECT
			((60*60*24*7)-SUM(TIMESTAMPDIFF(second, fecha_entrada, fecha_salida))) AS sin_uso
		FROM
			uso_baterias_montacargas
		WHERE
			mc= ".$_GET['id']." AND
			fecha_salida!='0000-00-00 00:00:00' AND
			fecha_entrada >= DATE_SUB(now(),INTERVAL 7 DAY)
   ";
   $resultado = $mysqli->query($querySinBat7Dias);
   $sinuso='SIN REGISTROS';
   while($fila = $resultado->fetch_array()) {
		$segundossinuso+=$fila['sin_uso'];
   }
	$dias= intval($segundossinuso/60/60/24);
	$horas= intval($segundossinuso/60/60)-($dias*24);
	$min=intval($segundossinuso/60)-((($dias*24)+($horas))*60);
	$sinuso=$dias.'D '.$horas.'H '.$min.'M';

   $queryNombreMontacargas="
		SELECT montacargas_nombre as nombre
		FROM montacargas
		WHERE idmontacargas=".$_GET['id']."
			AND idsucursal IN (".$loggedInUser->sucursales.")
		";
   $resultado = $mysqli->query($queryNombreMontacargas);
   $nombreMontacargas=$_GET['id'];
   while($fila = $resultado->fetch_array()) {
		$nombreMontacargas=$fila['nombre'];
   }
?>

