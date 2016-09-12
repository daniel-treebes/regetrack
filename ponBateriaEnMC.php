<?php

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF']))
{
	die();
}

if ($_POST['estadobat']=='2 descanso'){
	//Si la batería no ha completado descanso, genera alerta
	$query="
		INSERT INTO deshabilitabt (bt,motivo,fecha_entrada,fecha_salida,usuario_entrada,usuario_salida)
		VALUES	(". $_POST['bateria']."'Montada en MC ".$_POST['montacargas']." SIN DESCANSO completado.',now(),now(),".$loggedInUser->user_id.",".$loggedInUser->user_id.")";
	$mysqli->query($query);
}elseif ($_POST['estadobat']=='3 carga'){
	//Si la batería no ha completado descanso, genera alerta
	$query="
		INSERT INTO deshabilitabt (bt,motivo,fecha_entrada,fecha_salida,usuario_entrada,usuario_salida)
		VALUES	(". $_POST['bateria']."'Montada en MC ".$_POST['montacargas']." SIN CARGA completa.',now(),now(),".$loggedInUser->user_id.",".$loggedInUser->user_id.")";
	$mysqli->query($query);
	
	//y pone fecha_descanso
	$query="
		UPDATE uso_baterias_bodega
		SET	fecha_descanso = now(),
			usuario_descanso = '".$loggedInUser->user_id."'
		WHERE id =". $_POST['movimiento'];
	$mysqli->query($query);
}

//Sale de bodega
$query="
	UPDATE uso_baterias_bodega
	SET	fecha_salida = now(),
		usuario_salida = '".$loggedInUser->user_id."'
	WHERE id =". $_POST['movimiento'];
$mysqli->query($query);

//Entra a MC
$query="
INSERT INTO uso_baterias_montacargas
	(
		mc ,
		bt ,
		fecha_entrada,
		fecha_salida,
		usuario_entrada
	)
	VALUES (".
		$_POST['montacargas'].",".
		$_POST['bateria'].",
		now(),
		'0000-00-00 00:00:00',
		'".$loggedInUser->user_id."'
)";

$mysqli->query($query);

echo $_POST['montacargas'];
?>
