<?php
require_once("models/config.php");
/*
if (!securePage($_SERVER['PHP_SELF']))
{
	die();
}
*/
if ($_POST['tipomovimiento']=='carga'){
	//pone batería en carga
	$query="
		UPDATE uso_baterias_bodega
		SET	fecha_carga =  now(),
			usuario_carga = '".$loggedInUser->user_id."'
		WHERE id=".$_POST['movimiento'];
	$mysqli->query($query);
}elseif ($_POST['tipomovimiento']=='espcargador'){
	//pone batería en espera en cargador
	$query="
		UPDATE uso_baterias_bodega
		SET	fecha_carga = now(),
			fecha_descanso = now(),
			fecha_salida = now(),
			usuario_carga = '".$loggedInUser->user_id."',
			usuario_descanso = '".$loggedInUser->user_id."',
			usuario_salida = '".$loggedInUser->user_id."'
		WHERE id=". $_POST['movimiento'];
	$mysqli->query($query);
	$query="
		INSERT INTO uso_baterias_bodega
		SET	fecha_entrada =  now(),
			usuario_entrada = '".$loggedInUser->user_id."',
			bt=".$_POST['bateria'].",
			bg=".$_POST['espacio'];
	$mysqli->query($query);
}elseif ($_POST['tipomovimiento']=='descbodega'){
	//pone batería en descanso/libre en bodega
	$query="
		UPDATE uso_baterias_bodega
		SET	fecha_salida = now(),
			usuario_salida = '".$loggedInUser->user_id."'
		WHERE id=".$_POST['movimiento'];
	$mysqli->query($query);
	$query="
		INSERT INTO uso_baterias_bodega
		(bt,bg,fecha_entrada,fecha_carga,fecha_descanso,fecha_original,usuario_entrada,usuario_carga,usuario_descanso)
		SELECT
			".$_POST['bateria'].",
			".$_POST['espacio'].",
			now(),
			now(),
			now(),
			fecha_descanso,
			'".$loggedInUser->user_id."',
			'".$loggedInUser->user_id."',
			'".$loggedInUser->user_id."'
		FROM uso_baterias_bodega
		WHERE id=".$_POST['movimiento'];
	$mysqli->query($query);
}	
	
echo $_POST['bateria'];
?>
