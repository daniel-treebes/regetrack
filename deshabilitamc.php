<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF']))
{
	die();
}

//Usar este query y hacer conexion. Hay que crear una conexion global
if($_POST['func']=="des")
    deshabilita($mysqli,$_POST['idMC'],$_POST['motivo'],$loggedInUser->user_id);
if($_POST['func']=="hab")
    habilita($mysqli,$_POST['idMC'],$loggedInUser->user_id);

function deshabilita($mysqli,$idMC,$motivo,$usuario){
    $query="
        INSERT
        INTO deshabilitamc(
            mc,
            motivo,
            fecha_entrada,
			fecha_salida,
            usuario_entrada
        )
        VALUES (
            ".$idMC.",
            '".$motivo."',
            now(),
			'0000-00-00 00:00:00',
            ".$usuario."
        )
    ";	
    $resultado=$mysqli->query($query);
}

function habilita($mysqli,$idMC,$usuario){
    $query="
        UPDATE deshabilitamc
        SET fecha_salida=now(),
            usuario_salida=".$usuario."
        WHERE mc =".$idMC."
			AND fecha_salida='0000-00-00 00:00:00'
		ORDER BY id DESC
		LIMIT 1";
    $resultado=$mysqli->query($query);
}
?>
