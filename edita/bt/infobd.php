<?php
$query="
    SELECT
        b.idbaterias as Id,
        b.baterias_nombre as Nombre,
        b.baterias_modelo as Modelo,
        b.baterias_marca as Marca,
        b.baterias_comprador as Comprador,
        b.baterias_numserie as Serie,
        CONCAT(b.baterias_c,'-',b.baterias_k,'-',b.baterias_p,'-',b.baterias_t,'-',b.baterias_e,' (',b.baterias_volts,'V ',b.baterias_amperaje,'Ah)') as Tipo
    FROM
        baterias as b
    WHERE
        b.idbaterias= ".$_GET['id']."
    limit 1
";

$resultado = $mysqli->query($query);

while($fila = $resultado->fetch_array()) {
    $datosBateria=$fila;
}
$nombreBateria=$datosBateria['Nombre'];

$querydeshabilitado="
    SELECT *
    FROM deshabilitabt
    WHERE bt= ".$_GET['id']." and fecha_salida='0000-00-00 00:00:00'
";
$resultado = $mysqli->query($querydeshabilitado);
$habilitaid=0;
$habilitabt=$_GET['id'];
$habilitamotivo='';
$habilitafecha='';
while($fila = $resultado->fetch_array()) {
    $habilitaid= $fila['id'];
    $habilitabt= $fila['bt'];
    $habilitamotivo= $fila['motivo'];
    $habilitafecha= $fila['fecha_entrada'];
}

$querydondecg="
	SELECT u.id, c.cargadores_nombre as nombre, c.idcargadores as cgid,
	   TIMESTAMPDIFF(hour, fecha_entrada, now()) as espera,
	   TIMESTAMPDIFF(hour, fecha_carga, now()) as carga,
	   TIMESTAMPDIFF(hour, fecha_descanso, now()) as descanso,
	   c.cargadores_tipo as ctipo
	FROM uso_baterias_bodega as u, bodegas as b, cargadores as c
	WHERE u.bt =".$_GET['id']." AND 
	   b.id = u.bg AND
	   b.cg = c.idcargadores AND
	   u.fecha_salida = '0000-00-00 00:00:00' AND
	   c.idsucursal IN (".$loggedInUser->sucursales.") 
	ORDER BY u.id desc 
	LIMIT 1
";

$querydondemc="
	SELECT m.montacargas_nombre as nombre,
		TIMESTAMPDIFF(hour, fecha_entrada, now()) as uso
	FROM uso_baterias_montacargas as u, montacargas as m
	WHERE bt=".$_GET['id']."
		AND m.idmontacargas=u.mc
		AND fecha_salida='0000-00-00 00:00:00'
		AND m.idsucursal IN (".$loggedInUser->sucursales.")
	ORDER BY u.id desc
	LIMIT 1
";

$resultadodonde = $mysqli->query($querydondecg);
$filadondecg = $resultadodonde->fetch_array();
$resultadodonde = $mysqli->query($querydondemc);
$filadondemc = $resultadodonde->fetch_array();
$estado="ERROR";
$ubicacion='SIN UBICACIÓN';
$cargadorid=0;
$idMovimientoBtaCarga=0;
$ctipo='SIN UBICACIÓN';
$bodegaLibre=true;
if (count($filadondecg)==0 && count($filadondemc)==0){
	$porcentaje=0;
	$tiempoDeUso='??';
	$estadoAct='<span style="color:red;">SIN UBICACIÓN</span>';
}elseif (count($filadondecg)>=0 && count($filadondemc)==0){
	$idMovimientoBtaCarga=$filadondecg['id'];
	$cargadorid=$filadondecg['cgid'];
	$ctipo=$filadondecg['ctipo'];
	$ubicacion=$filadondecg['nombre'];
	if ($filadondecg['descanso']!=NULL){
		$estado="DESCANSO";
		$estadoAct='<span class="green-jungle">DESCANSO</span>';
		$porcentaje=$filadondecg['descanso']*100/8;
		$tiempoDeUso=$filadondecg['descanso'];
	}elseif ($filadondecg['carga']!=NULL){
		$estado="CARGA";
		$estadoAct='<span class="yellow">CARGA</span>';
		$porcentaje=$filadondecg['carga']*100/8;
		$tiempoDeUso=$filadondecg['carga'];
	}elseif ($filadondecg['espera']!=NULL){
		$estado="ESPERA";		
		$estadoAct='<span style="color:red;">ESPERA</span>';
		$porcentaje=$filadondecg['espera']*100/8;
		$tiempoDeUso=$filadondecg['espera'];
	}
}elseif (count($filadondecg)==0 && count($filadondemc)>=0){
	$ctipo='Montacargas';
	$estado="USO";
	$ubicacion=$filadondemc['nombre'];
	$estadoAct='<span style="color:green;">EN USO</span>';
	$porcentaje=$filadondemc['uso']*100/8;
	$tiempoDeUso=$filadondemc['uso'];
}elseif (count($filadondecg)>=0 && count($filadondemc)>=0){
	$ubicacion='ERROR! (2 locaciones):'.$filadondecg['nombre'].' y '.$filadondemc['nombre'];
	$estadoAct='<span style="color:red;">ERROR!!</span>';
	$porcentaje=0;
	$tiempoDeUso='??';
}

$querypromediosdeuso="
	SELECT ROUND(AVG(TIMESTAMPDIFF(hour, fecha_entrada, fecha_salida)),2) as promedio,
		IF(CONCAT(YEAR(fecha_entrada),'-',MONTH(fecha_entrada))=CONCAT(YEAR(now()),'-',MONTH(now())),'Act',
			IF(CONCAT(YEAR(fecha_entrada),'-',MONTH(fecha_entrada))=CONCAT(YEAR(DATE_SUB(now(),INTERVAL 1 MONTH)),'-',MONTH(DATE_SUB(now(),INTERVAL 1 MONTH))),'Ant',
			  'Otro')
		) as mes
	FROM uso_baterias_montacargas
	WHERE bt=".$_GET['id']."
		AND fecha_salida!='0000-00-00 00:00:00'
		AND fecha_entrada>=DATE_SUB(now(),INTERVAL 2 MONTH)
	GROUP BY YEAR(fecha_entrada), MONTH(fecha_entrada)
	ORDER BY YEAR(fecha_entrada) DESC, MONTH(fecha_entrada) DESC
	LIMIT 2
";
$resultado = $mysqli->query($querypromediosdeuso);
$ppromedioAct=0;
$tpromedioAct=' 0';
$ppromedioAnt=0;
$tpromedioAnt=' 0';
while($promediosuso = $resultado->fetch_array()){
	if ($promediosuso['mes']=='Act'){
		$ppromedioAct=$promediosuso['promedio']*100/8;
		$tpromedioAct=$promediosuso['promedio'];
	}elseif($promediosuso['mes']=='Ant'){
		$ppromedioAnt=$promediosuso['promedio']*100/8;
		$tpromedioAnt=$promediosuso['promedio'];
	}
}

$tiempoParaCarga=0;
if ($cargadorid>0){
	//Si la batería está en espera, verfica que el cargador esté listo para cargar y dar opcin de carga
	$querycgcarga="
		SELECT 
		   CONCAT(TIMESTAMPDIFF(hour,now(), DATE_ADD(fecha_carga,INTERVAL 8 HOUR)),'H ',
			   TIMESTAMPDIFF(minute,now(), DATE_ADD(fecha_carga,INTERVAL 8 HOUR))
			   -(TIMESTAMPDIFF(hour,now(), DATE_ADD(fecha_carga,INTERVAL 8 HOUR))*60),'M'
		   ) as tfalta
		FROM uso_baterias_bodega as u, (SELECT id FROM bodegas WHERE cg=".$cargadorid.") as b
		WHERE
		   bg=b.id AND
		   fecha_descanso='0000-00-00 00:00:00' AND
		   fecha_carga!='0000-00-00 00:00:00'
		ORDER BY u.id desc 
		LIMIT 1
	";
	$resultado = $mysqli->query($querycgcarga);
	$dato=$resultado->fetch_array();
	$tiempoParaCarga=$dato['tfalta'];
}
if ($ctipo=="Cargador"){
	$buscalugar="AND tcg.cargadores_tipo='Bodega' ";	
}else{
	$buscalugar="AND tcg.cargadores_tipo='Cargador' ";	
}
$queryEspacioDisponible="
	SELECT
		tcg.idcargadores as cg_id,
		tcg.cargadores_nombre as cg_nombre,
		tbg.id as bg_id,
		tcg.cargadores_tipo as tipo
	FROM bodegas as tbg, cargadores as tcg, cargadores_baterias as tcb
	WHERE
		tbg.id NOT IN (
			SELECT tubb.bg as bg
			FROM uso_baterias_bodega as tubb, bodegas as tbg, cargadores as tcg,
				cargadores_baterias as tcb
			WHERE
				(
					tubb.fecha_salida='0000-00-00 00:00:00'
					OR tubb.fecha_descanso='0000-00-00 00:00:00'
					OR tubb.fecha_carga='0000-00-00 00:00:00'
				)
				AND tbg.id=tubb.bg
				AND tbg.cg=tcg.idcargadores
				AND ((tcg.idcargadores=tcb.idcargadores
						AND tcb.idbaterias=".$_GET['id'].")
					OR tcg.cargadores_tipo='Bodega')
				AND tcg.idsucursal IN (".$loggedInUser->sucursales.")
				".$buscalugar."
			GROUP BY bg
			ORDER BY tubb.id
		)
		AND tbg.cg=tcg.idcargadores
		AND ((tcg.idcargadores=tcb.idcargadores
				AND tcb.idbaterias=".$_GET['id'].")
			OR tcg.cargadores_tipo='Bodega')
		AND tcg.idsucursal IN (".$loggedInUser->sucursales.")
		".$buscalugar."
	GROUP BY cg_id
	ORDER BY tcg.cargadores_tipo
";
//echo $queryEspacioDisponible;

//Los ocupados serviran para saber si está vacío!
$queryCargadorOcupado="
	SELECT
		tbg.cg as cg,
		MAX(tubb.fecha_carga) as maxfc,
		MIN(tubb.fecha_descanso) as minfd
	FROM uso_baterias_bodega as tubb, bodegas as tbg, cargadores as tcg,
		cargadores_baterias as tcb
	WHERE
		(
			tubb.fecha_salida='0000-00-00 00:00:00'
			OR tubb.fecha_descanso='0000-00-00 00:00:00'
			OR tubb.fecha_carga='0000-00-00 00:00:00'
		)
		AND tbg.id=tubb.bg
		AND tbg.cg=tcg.idcargadores
		AND ((tcg.idcargadores=tcb.idcargadores
				AND tcb.idbaterias=".$_GET['id'].")
			OR tcg.cargadores_tipo='Bodega')
		AND tcg.idsucursal IN (".$loggedInUser->sucursales.")
		".$buscalugar."
	GROUP BY cg
	ORDER BY minfd, maxfc
";

//los cargadores deshabilitados... pueden usar los espacios pero no cargar!
$queryCargadorDeshabilitado="
	SELECT dcg.cg, dcg.fecha_entrada,
		tcg.cargadores_tipo as tipo
	FROM deshabilitacg as dcg, cargadores as tcg
	WHERE dcg.fecha_salida ='0000-00-00 00:00:00'
		AND dcg.cg=tcg.idcargadores
		AND tcg.idsucursal IN (".$loggedInUser->sucursales.")
		".$buscalugar."
	GROUP BY cg
	ORDER BY tcg.cargadores_tipo DESC
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

$cargadorSiguiente['tipo']='Montacargas';
$cargadorSiguiente['minfd']='0000-00-00 00:00:00';
$cargadorSiguiente['maxfc']='0000-00-00 00:00:00';
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
		if ($cargadoresOcupados[$cg_id]['minfd']!='0000-00-00 00:00:00' && $cargadorSiguiente['tipo']=="Cargador"){
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
	
	$cargadorSiguiente['tipo']=$espaciosDisponibles[$cg_id]['tipo'];
	
	if ($cargadorSiguiente['tipo']=="Bodega"){
		$cargadorSiguiente['minfd']='0000-00-00 00:00:00';
		$cargadorSiguiente['maxfc']='0000-00-00 00:00:00';
	}
	
	if (array_key_exists ($cg_id,$cargadoresDeshabilitados)){
		$cargadorSiguiente['f_des']=$cargadoresDeshabilitados[$cg_id]['fecha_entrada'];
	}else{
		$cargadorSiguiente['f_des']='0000-00-00 00:00:00';
	}
	if ($termina==1) break;
}
//print_r($cargadorSiguiente);

?>

