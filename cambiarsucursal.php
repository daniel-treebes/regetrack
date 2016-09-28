<?php

require_once("models/config.php");

$idsucursal = (isset($_GET['idsucursal']) && !empty($_GET['idsucursal'])) ? $_GET['idsucursal'] : false;
$redirect = (isset($_SERVER["HTTP_REFERER"])) ? $_SERVER["HTTP_REFERER"] : '/escanear.php';


if($idsucursal){
    //VALIDAMOS QUE LA URL PERTENEZCA A LA EMPRESA EN SESION
    $exist = SucursalQuery::create()->filterByIdempresa($loggedInUser->idempresa)->filterByIdsucursal($idsucursal)->exists();
    if($exist){
        $loggedInUser->sucursal_activa = $idsucursal;
        header('Location: '.$redirect);
    }else{
        header('Location: '.$redirect);
    }
}else{
    header('Location: '.$redirect);
}

