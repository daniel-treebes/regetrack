<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");
//Database Information
$db_host = "localhost"; //Host address (most likely localhost)
$db_name = "regetrac_sistemav2"; //Name of Database
$db_user = "regetrac_sistema"; //Name of database user
$db_pass = "Hola.1234"; //Password for database user



/* Create a new mysqli object with database connection parameters */
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);





$minHoras=6;
$maxHoras=9;
$ciclos=120;



$queryMC="
SELECT
	idmontacargas as Id
FROM
	montacargas
";
$losMC = $mysqli->query($queryMC);
while($losMCa2 = $losMC->fetch_array())
{
$losMCa[] = $losMCa2;
}



$queryBT="
SELECT
	idbaterias as Id
FROM
	baterias
";
$lasBT = $mysqli->query($queryBT);
while($lasBTa2 = $lasBT->fetch_array())
{
$lasBTa[] = $lasBTa2;
}


$queryBG="
SELECT
	id as Id
FROM
	bodegas
";
$lasBG = $mysqli->query($queryBG);
while($lasBGa2 = $lasBG->fetch_array())
{
$lasBGa[] = $lasBGa2;
}
 

echo "MC: ". mysqli_num_rows($losMC)."<br>";
echo "BT: ".mysqli_num_rows($lasBT)."<br>";
echo "BG: ".mysqli_num_rows($lasBG)."<br>";
echo "MinHrs: ".$minHoras."<br>";
echo "MaxHrs: ".$maxHoras."<br>";
echo "Ciclos: ".$ciclos."<br>";






reseteaTodo();
inicializa();
for($i=0;$i<$ciclos;$i++){

desplazaSacaMC();
desplazaEnDescanso();

desplazaCarga();
desplazaEsperando();
}

echo "<center>------------------Listo!--------------LISTO!------------------Listo!--------------</center>";





function inicializa(){
	global $ciclos;
	global $lasBTa;
	global $losMCa;
	
	$bateriasAcomodadas=[];
	$montaCargasAcomodadas=[];
	
	for($i=0;$i<count($lasBTa);$i++){
		$random=randWithout(1,count($lasBTa),$bateriasAcomodadas);
		$randomb=randWithout(1,count($lasBTa),$bateriasAcomodadas);
		
		$bateriasAcomodadas[$i]=$random;
		if($i==0){
		acomodaBaterias(1,$random,dameFechaCiclo($ciclos),dameFechaCero(),dameFechaCero(),dameFechaCero());
		}else if($i==1){
		acomodaBaterias(2,$random,dameFechaCiclo($ciclos),dameFechaCiclo($ciclos),dameFechaCero(),dameFechaCero());
		}else if($i==2){
		acomodaBaterias(3,$random,dameFechaCiclo($ciclos),dameFechaCiclo($ciclos),dameFechaCiclo($ciclos),dameFechaCero());
		acomodaMC($losMCa[2]['Id'],$random,dameFechaCiclo($ciclos),dameFechaCiclo($ciclos));
		}else if($i==3){
		acomodaBaterias(4,$random,dameFechaCiclo($ciclos),dameFechaCiclo($ciclos),dameFechaCiclo($ciclos),dameFechaCiclo($ciclos));
		acomodaMC($losMCa[1]['Id'],$random,dameFechaCiclo($ciclos),dameFechaCero());
		}else if($i==4){
		acomodaBaterias(5,$random,dameFechaCiclo($ciclos),dameFechaCiclo($ciclos),dameFechaCiclo($ciclos),dameFechaCiclo($ciclos));
		acomodaMC($losMCa[0]['Id'],$random,dameFechaCiclo($ciclos),dameFechaCero());
		}else if($i==5){
		acomodaBaterias(6,$random,dameFechaCiclo($ciclos),dameFechaCiclo($ciclos),dameFechaCero(),dameFechaCero());
		}
	}
}








//// 1

function desplazaEsperando(){
	global $mysqli;
	$arreglo = dameBtEsperando();
	for($i=0;$i<count($arreglo);$i++){

	 $query="
	 UPDATE
	 uso_baterias_bodega
	 SET
	 fecha_carga =  '".$arreglo[$i]['fecha_entrada']."'
	 WHERE
	 id =".$arreglo[$i]['id'].";
	 ";
	$mysqli->query($query);
	}	
}

function dameBtEsperando(){
	global $mysqli;
	$query="
	 select
	 id,
	 fecha_entrada
	 from
	 uso_baterias_bodega
	 where
	 fecha_entrada!='0000-00-00 00:00:00' and
	 fecha_carga='0000-00-00 00:00:00' and
	 fecha_descanso='0000-00-00 00:00:00' and
	 fecha_salida='0000-00-00 00:00:00'
	 limit 2
	";
	$respuesta = $mysqli->query($query);
	$arregloRespuesta=[];
	while($lasBTa2 = $respuesta->fetch_array())
		{
		$arregloRespuesta[] = $lasBTa2;
		}
	return($arregloRespuesta);
}

//2

function desplazaCarga(){
		global $mysqli;
	$arreglo = dameBtCargando();
	for($i=0;$i<count($arreglo);$i++){

	 $query="
	 UPDATE
	 uso_baterias_bodega
	 SET
	 fecha_descanso =  '".ponfechaposterior($arreglo[$i]['fecha_entrada'])."'
	 WHERE
	 id =".$arreglo[$i]['id'].";
	 ";
	$mysqli->query($query);
	}
}


function dameBtCargando(){
	global $mysqli;
	$query="
	 select
	 id,
	 fecha_carga as fecha_entrada
	 from
	 uso_baterias_bodega
	 where
	 fecha_entrada!='0000-00-00 00:00:00' and
	 fecha_carga!='0000-00-00 00:00:00' and
	 fecha_descanso='0000-00-00 00:00:00' and
	 fecha_salida='0000-00-00 00:00:00' 
	";
	$respuesta = $mysqli->query($query);
	$arregloRespuesta=[];
	while($lasBTa2 = $respuesta->fetch_array())
		{
		$arregloRespuesta[] = $lasBTa2;
		}
	return($arregloRespuesta);
}

///3


function desplazaCargadas(){
	global $mysqli;
	$arreglo = dameBtCargadas();
	$arreglo2 = dameMCDisponibles();
	
	for($i=0;$i<count($arreglo);$i++){

	 $query="
	 UPDATE
	 uso_baterias_bodega
	 SET
	 fecha_descanso =  '".ponfechaposterior($arreglo[$i]['fecha_entrada'])."'
	 WHERE
	 id =".$arreglo[$i]['id'].";
	 ";
	}
}

function dameBtCargadas(){
	global $mysqli;
	$query="
	 select
	 id,
	 bt,
	 fecha_carga as fecha_entrada
	 from
	 uso_baterias_bodega
	 where
	 fecha_entrada!='0000-00-00 00:00:00' and
	 fecha_carga!='0000-00-00 00:00:00' and
	 fecha_descanso='0000-00-00 00:00:00' and
	 fecha_salida='0000-00-00 00:00:00'
	";
	$respuesta = $mysqli->query($query);
	$arregloRespuesta=[];
	while($lasBTa2 = $respuesta->fetch_array())
		{
		$arregloRespuesta[] = $lasBTa2;
		}
	return($arregloRespuesta);
}

///4


function desplazaEnDescanso(){
	global $mysqli;
	$arreglo = dameBtDescanso();
	
	for($i=0;$i<count($arreglo);$i++){
	 $arreglo2 = dameMCDisponibles();
	 $query="
	 UPDATE
	 uso_baterias_bodega
	 SET
	 fecha_salida =  '".ponfechaposterior($arreglo[$i]['fecha_entrada'])."'
	 WHERE
	 id =".$arreglo[$i]['id'].";
	 ";
		$mysqli->query($query);
		if(count($arreglo2)>1){
			$rmc=rand(0,count($arreglo2)-1);
			$mc=$arreglo2[$rmc]['mc'];
			$query="INSERT INTO
				uso_baterias_montacargas (
				mc ,
				bt ,
				fecha_entrada ,
				fecha_salida ,
				usuario_entrada,
				usuario_salida
				)
				VALUES (
				'".$mc."',  '".$arreglo[$i]['bt']."',  '".ponfechaposterior($arreglo[$i]['fecha_entrada'])."',  '".dameFechaCero()."',  '1',NULL
				)
		";
	
		$mysqli->query($query);
		}
	//echo $arreglo[$i]['id'];
	}
}




function dameBtDescanso(){
	global $mysqli;
	$query="
	 select
	 id,
	 bt,
	 fecha_descanso as fecha_entrada
	 from
	 uso_baterias_bodega
	 where
	 fecha_entrada!='0000-00-00 00:00:00' and
	 fecha_carga!='0000-00-00 00:00:00' and
	 fecha_descanso!='0000-00-00 00:00:00' and
	 fecha_salida='0000-00-00 00:00:00'
	";
	$respuesta = $mysqli->query($query);
	$arregloRespuesta=[];
	while($lasBTa2 = $respuesta->fetch_array())
		{
		$arregloRespuesta[] = $lasBTa2;
		}
	return($arregloRespuesta);
}


///////////5


function desplazaSacaMC(){
	global $mysqli;
	$arreglo = dameMC();
	$bodegasDisp=dameBodegasDisponibles();
	for($i=0;$i<count($arreglo);$i++){

	 $query="
	 UPDATE
	 uso_baterias_montacargas
	 SET
	 fecha_salida =  '".ponfechaposterior($arreglo[$i]['fecha_entrada'])."'
	 WHERE
	 id =".$arreglo[$i]['id'].";
	 ";
	$mysqli->query($query);
	

	
	$query="INSERT INTO
	uso_baterias_bodega(
	id ,
	bg ,
	bt ,
	fecha_entrada ,
	fecha_carga ,
	fecha_descanso ,
	fecha_salida,
	usuario_entrada,
	usuario_carga,
	usuario_descanso,
	usuario_salida
	)
	VALUES (
	NULL ,
	'".$bodegasDisp[$i]['bg']."',
	'".$arreglo[$i]['bt']."',
	'".ponfechaposterior($arreglo[$i]['fecha_entrada'])."',
	'".dameFechaCero()."',
	'".dameFechaCero()."',
	'".dameFechaCero()."',
	'1',
	NULL,
	NULL,
	NULL
	);
	";
	
	$mysqli->query($query);
	}
}

function dameBodegasDisponibles(){
	global $mysqli;
	$query="
	SELECT bg FROM (
			SELECT bg
			FROM
				uso_baterias_bodega
			WHERE 
				fecha_salida != '0000-00-00 00:00:00' and
				fecha_carga != '0000-00-00 00:00:00' and
				id not in (
					select bg from uso_baterias_bodega where fecha_salida = '0000-00-00 00:00:00'
				)
				
			UNION ALL
			
			SELECT id as bg FROM bodegas WHERE id not in (
					select bg from uso_baterias_bodega where fecha_salida = '0000-00-00 00:00:00'
				)
		) as resulta
		GROUP BY bg
		
		";
	$respuesta = $mysqli->query($query);
	$arregloRespuesta=[];
	while($lasBTa2 = $respuesta->fetch_array())
		{
		$arregloRespuesta[] = $lasBTa2;
		}
	return($arregloRespuesta);
	
}
function dameMCDisponibles(){
		global $mysqli;
	$query="
	select idmontacargas as mc
	from montacargas
	where idmontacargas not in(
    	select
			mc
		from
			uso_baterias_montacargas
		where
			fecha_salida = '0000-00-00 00:00:00'
	   )
	";
	$respuesta = $mysqli->query($query);
	$arregloRespuesta=[];
	while($lasBTa2 = $respuesta->fetch_array())
		{
		$arregloRespuesta[] = $lasBTa2;
		}
	return($arregloRespuesta);
}
function dameMC(){
	global $mysqli;
	$query="
	 select
		id,
		bt,
		mc,
		fecha_entrada
	 from
		 uso_baterias_montacargas
	 where
		 fecha_salida='0000-00-00 00:00:00'
	";
	$respuesta = $mysqli->query($query);
	$arregloRespuesta=[];
	while($lasBTa2 = $respuesta->fetch_array())
		{
		$arregloRespuesta[] = $lasBTa2;
		}
	return($arregloRespuesta);
}








function acomodaMC($mc,$bt,$fechaEntra,$fechaSale){
	global $mysqli;
	$query="
	INSERT INTO  uso_baterias_montacargas (
		mc ,
		bt ,
		fecha_entrada ,
		fecha_salida ,
		usuario_entrada,
		usuario_salida
	)
	VALUES (
		'".$mc."',
		'".$bt."',
		'".$fechaEntra."',
		'".$fechaSale."',
		'1',
		'1'
	)
	";
	$mysqli->query($query);
}

function acomodaBaterias($bg,$bt,$fechaEntra,$fechaCarga,$fechaDescansa,$fechaSale){
	
	global $mysqli;
	$query="INSERT INTO
	uso_baterias_bodega(
	id ,
	bg ,
	bt ,
	fecha_entrada ,
	fecha_carga ,
	fecha_descanso ,
	fecha_salida ,
	usuario_entrada,
	usuario_carga,
	usuario_descanso,
	usuario_salida
	)
	VALUES (
	NULL ,
	'".$bg."',
	'".$bt."',
	'".$fechaEntra."',
	'".$fechaCarga."',
	'".$fechaDescansa."',
	'".$fechaSale."',
	'1',
	'1',
	'1',
	'1'
	);
	";
	
	$mysqli->query($query);
}

function dameFechaCiclo($ciclos) {
	$hrs=(($ciclos)*8);
	$fecha = date('Y-m-d H:i:s', time());
	$fecha = new DateTime($fecha);
    $fecha = $fecha->modify("-".$hrs." hours");
	return $fecha->format("Y-m-d H:i:s")."<br>";
}

function ponfechaposterior($fecha2){
	global $minHoras;
	global $maxHoras;
	$hrs = rand($minHoras,$maxHoras);
	
	$min = rand(0, 60); 
	$seg = rand(0, 60); 
	

	$fecha = date($fecha2, time());
	$fecha = new DateTime($fecha);
    $fecha = $fecha->modify("+".$seg." seconds");
	$fecha = $fecha->modify("+".$min." minutes");
	$fecha = $fecha->modify("+".$hrs." hours");
	$hoy = date("Y-m-d H:i:s");
	$hoy = new DateTime($hoy);
	
	if($fecha>$hoy){
		$fecha=$hoy;
		//echo $hoy->format("Y-m-d H:i:s")," Es mayor que hoy ".$fecha->format("Y-m-d H:i:s")."<br>";
	}
	return $fecha->format("Y-m-d H:i:s")."<br>";
}

function dameFechaCero() {
	return "0000-00-00 00:00:00";
}



function reseteaTodo(){
	global $mysqli;
	$qvacia="TRUNCATE uso_baterias_bodega";
	$resultado = $mysqli->query($qvacia);
	$qvacia="TRUNCATE uso_baterias_montacargas";
	$resultado = $mysqli->query($qvacia);
//	$qvacia="TRUNCATE deshabilitamc";
//	$resultado = $mysqli->query($qvacia);
//	$qvacia="TRUNCATE deshabilitacg";
//	$resultado = $mysqli->query($qvacia);
//	$qvacia="TRUNCATE deshabilitabt";
//	$resultado = $mysqli->query($qvacia);
	
}


function randWithout($from, $to, array $exceptions) {
    sort($exceptions); // lets us use break; in the foreach reliably
    $number = rand($from, $to - count($exceptions)); // or mt_rand()
    foreach ($exceptions as $exception) {
        if ($number >= $exception) {
            $number++; // make up for the gap
        } else /*if ($number < $exception)*/ {
            break;
        }
    }
    return $number;
}

?>
	
	