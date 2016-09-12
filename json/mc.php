
<?php
header("content-type: application/json"); 
error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");


//Database Information
$db_host = "localhost"; //Host address (most likely localhost)
$db_name = "regetrac_sistema"; //Name of Database
$db_user = "regetrac_sistema"; //Name of database user
$db_pass = "Hola.1234"; //Password for database user



/* Create a new mysqli object with database connection parameters */
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);



		
	$query="
    select
	 mc,
	 bt,
	 fecha_entrada,
	 fecha_salida,
	 
   TIMESTAMPDIFF(hour, fecha_entrada, fecha_salida) as hrs,
   TIMESTAMPDIFF(minute, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(hour, fecha_entrada, fecha_salida))*60 as min
	
	 from
	 uso_baterias_montacargas
	 where
	 fecha_salida!='0000-00-00 00:00:00' and 
    mc=1
	";
	$respuesta = $mysqli->query($query);
	$data='[';
	$i=0;
	while($lasBTa2 = $respuesta->fetch_array())
		{
			$fechaentrada=$lasBTa2['fecha_entrada'];
			$fecha=strtotime($fechaentrada);
			$data.='['$fecha.','.($lasBTa2['hrs']+($lasBTa2['min']/100)).'],';
//			$data[$i]= array('Date.UTC('.substr($lasBTa2['fecha_entrada'],0,4).','.substr($lasBTa2['fecha_entrada'],5,2).','.substr($lasBTa2['fecha_entrada'],8,2).')',($lasBTa2['hrs']+($lasBTa2['min']/100)));
			$i++;
		}
		$data=substr($data,0,-1).']';
	
		
		$manage = json_encode($data, JSON_NUMERIC_CHECK);
		echo $manage;
//		echo $_GET['callback']. '('. json_encode($data) . ')';
//		echo '('. json_encode($data) . ')';

		?>
		