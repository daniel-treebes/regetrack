<?php

require_once("../models/config.php");
$volts = $_GET['volts'];
$amperaje = $_GET['amperaje'];
$tipo = $_GET['tipo'];
$enchufe = $_GET['enchufe'];
$amperaje_range = isset($_GET['amperaje_range']) ? $_GET['amperaje_range']  : 0;

if($amperaje_range>0){
    $porcentaje_cantidad = ($amperaje*$amperaje_range) / 100;
    $amperaje_min = $amperaje - $porcentaje_cantidad;
    $amperaje_max = $amperaje + $porcentaje_cantidad;
    
    $baterias_modelos = BateriasQuery::create()->select(array('baterias_modelo'))->filterByBateriasVolts($volts)->filterByBateriasAmperaje(array('min' => $amperaje_min,'max' => $amperaje_max))->filterByBateriasT($tipo)->filterByBateriasE($enchufe)->groupByBateriasModelo()->find();
}else{
    $baterias_modelos = BateriasQuery::create()->select(array('baterias_modelo'))->filterByBateriasVolts($volts)->filterByBateriasAmperaje($amperaje)->filterByBateriasT($tipo)->filterByBateriasE($enchufe)->groupByBateriasModelo()->find();
}

$json = json_encode($baterias_modelos->toArray());
header('Content-Type: application/json');
echo $json;
