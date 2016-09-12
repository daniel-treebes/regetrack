<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF']))
{
	die();
}

//Usar este query y hacer conexion. Hay que crear una conexion global
if($_POST['func']=="des")
    deshabilita($mysqli,$_POST['idBT'],$_POST['motivo'],$loggedInUser->user_id);
if($_POST['func']=="hab")
    habilita($mysqli,$_POST['idBT'],$loggedInUser->user_id);

function deshabilita($mysqli,$idBT,$motivo,$usuario){
    $query="
        INSERT
        INTO deshabilitabt(
            bt,
            motivo,
            fecha_entrada,
			fecha_salida,
            usuario_entrada
        )
        VALUES (
            ".$idBT.",
            '".$motivo."',
            now(),
			'0000-00-00 00:00:00',
            ".$usuario."
        )
    ";
    $resultado=$mysqli->query($query);
}

function habilita($mysqli,$idBT,$usuario){
    $query= "
        UPDATE deshabilitabt
        SET fecha_salida=now(),
            usuario_salida=".$usuario."
        WHERE bt =".$idBT."
			AND fecha_salida='0000-00-00 00:00:00'
		ORDER BY id DESC
		LIMIT 1";
    $resultado=$mysqli->query($query);
}
?>
