<?php

require_once("../models/config.php");

$sucursales = explode(',', $loggedInUser->sucursales);

$nombre = $_GET['nombre'];
$idsucursal = $_GET['idsucursal'];
$tipo = $_GET['tipo'];
$current_name = $_GET['current_name'];

if($tipo == "montacargas"){
    $exist = MontacargasQuery::create()->filterByIdsucursal($idsucursal)->filterByMontacargasNombre($nombre)->exists();
    if($current_name){
         $exist =MontacargasQuery::create()->filterByIdsucursal($idsucursal)->filterByMontacargasNombre($nombre)->filterByMontacargasNombre($current_name,  Criteria::NOT_EQUAL)->exists();
    }
}elseif ($tipo == "cargadores") {
    
    $exist = CargadoresQuery::create()->filterByIdsucursal($idsucursal)->filterByCargadoresNombre($nombre)->exists();
    if($current_name){
         $exist = CargadoresQuery::create()->filterByIdsucursal($idsucursal)->filterByCargadoresNombre($nombre)->filterByCargadoresNombre($current_name,  Criteria::NOT_EQUAL)->exists();
    }
   
}elseif ($tipo == "baterias") {
    $exist = BateriasQuery::create()->filterByIdsucursal($idsucursal)->filterByBateriasNombre($nombre)->exists();
    if($current_name){
          $exist = BateriasQuery::create()->filterByIdsucursal($idsucursal)->filterByBateriasNombre($nombre)->filterByBateriasNombre($current_name,  Criteria::NOT_EQUAL)->exists();
    }
}

header('Content-Type: application/json');
$response = array('exist' => $exist );
$json = json_encode($response);

echo $json;