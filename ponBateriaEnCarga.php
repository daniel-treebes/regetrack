<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF']))
{
	die();
}

//pone batería en carga
$query="
	UPDATE uso_baterias_bodega
	SET	fecha_carga =  now(),
		usuario_carga = '".$loggedInUser->user_id."'
	WHERE id=". $_POST['movimiento'];
$mysqli->query($query);
echo $_POST['bateria'];
?>
