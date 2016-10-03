<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

//Database Information
$db_host = "localhost"; //Host address (most likely localhost)
$db_name = "regetrac_sistemav2"; //Name of Database
$db_user = "regetrac_sistema"; //Name of database user
$db_pass = "Hola.1234"; //Password for database user
$db_table_prefix = "uc_";

GLOBAL $errors;
GLOBAL $successes;
GLOBAL $websiteName;
GLOBAL $nombrePagina ;
GLOBAL $template;

$websiteName = "Regetrak";
//$nombrePagina = "Control de Baterías";

$errors = array();
$successes = array();

/* Create a new mysqli object with database connection parameters */
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

GLOBAL $mysqli;

//Treebes TRIGGER de cargado a descanso
/* CAMBIADO POR EVENTO EN BD
$query="
	UPDATE uso_baterias_bodega as u, bodegas as b, cargadores as c
	SET fecha_descanso=DATE_ADD(fecha_carga, INTERVAL 8 HOUR)
	WHERE fecha_descanso='0000-00-00 00:00:00'
		AND now()>=DATE_ADD(fecha_carga, INTERVAL 8 HOUR)
		AND c.idcargadores=b.cg
		AND b.id=u.bg
		AND c.cargadores_tipo='Cargador'
	";
$mysqli->query($query);
*/
if(mysqli_connect_errno()) {
	echo "Connection Failed: " . mysqli_connect_errno();
	exit();
}

//Direct to install directory, if it exists
if(is_dir("install/"))
{
	header("Location: install/");
	die();

}

?>