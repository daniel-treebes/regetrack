<?php

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF']))
{
	die();
}

//Sale del montacargas
$query="
	UPDATE uso_baterias_montacargas
	SET
		fecha_salida =  now(),
		usuario_salida = '".$loggedInUser->user_id."'
	WHERE id=". $_POST['movimiento'];
$mysqli->query($query);

//entra a bodega y pone en carga si así fue
if ($_POST['cargando']==1){
	$cargando='now()';
	$usuario_carga=$loggedInUser->user_id;
}else{
	$cargando="'0000-00-00 00:00:00'";
	$usuario_carga='NULL';
}
$query="
	INSERT INTO  uso_baterias_bodega
	(
		bg,
		bt,
		fecha_entrada,
		fecha_carga,
		fecha_descanso,
		fecha_salida,
		usuario_entrada,
		usuario_carga
	)
	VALUES (".
		$_POST['bodega'].",".
		$_POST['bateria'].",
		now(),
		".$cargando.",
		'0000-00-00 00:00:00',
		'0000-00-00 00:00:00',".
		"'".$loggedInUser->user_id."',".
		"'".$usuario_carga."'
	)";
$mysqli->query($query);
echo $_POST['montacargas'];
?>
