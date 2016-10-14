<?php

require_once("../models/config.php");

$sucursales = explode(',', $loggedInUser->sucursales);

$nombre = $_GET['nombre'];
$idsucursal = $_GET['idsucursal'];
$tipo = $_GET['tipo'];

if($tipo == "montacargas"){
    $exist = MontacargasQuery::create()->filterByIdsucursal($idsucursal)->filterByMontacargasNombre($nombre)->exists();
}elseif ($tipo == "cargadores") {
    $exist = CargadoresQuery::create()->filterByIdsucursal($idsucursal)->filterByCargadoresNombre($nombre)->exists();
}elseif ($tipo == "baterias") {
    $exist = BateriasQuery::create()->filterByIdsucursal($idsucursal)->filterByBateriasNombre($nombre)->exists();
}

header('Content-Type: application/json');
$response = array('exist' => $exist );
$json = json_encode($response);

echo $json;