<?php

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF']))


{
	die();
}


 $query="
 UPDATE
 uso_baterias_montacargas
 SET
 fecha_salida =  '0000-00-00 00:00:00'
 WHERE
 id=1";
  echo $query."<br>";
$mysqli->query($query);


$query="
UPDATE 
uso_baterias_bodega
SET
fecha_salida =   '0000-00-00 00:00:00'
WHERE
id =3";

echo $query;
$mysqli->query($query);
?>
