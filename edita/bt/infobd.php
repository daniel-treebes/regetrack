<?php
$querydondecg="
	SELECT u.id, CONCAT(c.cargadores_nombre,'-',b.nombre) as nombre, c.idcargadores as cgid,
	   TIMESTAMPDIFF(hour, fecha_entrada, now()) as espera,
	   TIMESTAMPDIFF(hour, fecha_carga, now()) as carga,
	   TIMESTAMPDIFF(hour, fecha_descanso, now()) as descanso
	FROM uso_baterias_bodega as u, bodegas as b, cargadores as c
	WHERE
	   bt =".$_GET['id']." AND 
	   b.id=u.bg AND
	   b.cg=c.idcargadores AND
	   fecha_salida='0000-00-00 00:00:00'
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
if (count($filadondecg)==0 && count($filadondemc)==0){
	$porcentaje=0;
	$tiempoDeUso='??';
	$estadoAct='<span style="color:red;">SIN UBICACIÓN</span>';
}elseif (count($filadondecg)>=0 && count($filadondemc)==0){
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
		$cargadorid=$filadondecg['cgid'];
		$idMovimientoBtaCarga=$filadondecg['id'];
		$estado="ESPERA";		
		$estadoAct='<span style="color:red;">ESPERA</span>';
		$porcentaje=$filadondecg['espera']*100/8;
		$tiempoDeUso=$filadondecg['espera'];
	}
}elseif (count($filadondecg)==0 && count($filadondemc)>=0){
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
$tpromedioAct='S/R';
$ppromedioAnt=0;
$tpromedioAnt='S/R';
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

?>

