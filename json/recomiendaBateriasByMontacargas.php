<?php

require_once("../models/config.php");

$sucursales = explode(',', $loggedInUser->sucursales);

$volts = $_GET['volts'];
$amperaje = $_GET['amperaje'];
$enchufe = $_GET['enchufe'];
$tipo = $_GET['tipo'];
$amperaje_range = isset($_GET['amperaje_range']) ? $_GET['amperaje_range']  : 0;

if($amperaje_range>0){
    $porcentaje_cantidad = ($amperaje*$amperaje_range) / 100;
    $amperaje_min = $amperaje - $porcentaje_cantidad;
    $amperaje_max = $amperaje + $porcentaje_cantidad;
    
    //$baterias_modelos = BateriasQuery::create()->select(array('baterias_modelo'))->filterByBateriasVolts($volts)->filterByBateriasAmperaje(array('min' => $amperaje_min,'max' => $amperaje_max))->filterByBateriasE($enchufe)->groupByBateriasModelo()->find();
    $baterias_modelos = BateriasQuery::create()->withColumn("CONCAT(baterias_c,'-',baterias_k,'-',baterias_p,'-',baterias_t,'-',baterias_e,' (',baterias_volts,'V - ',baterias_amperaje,'Ah)')","tipo")->select(array('tipo'))->filterByIdsucursal($sucursales)->filterByBateriasVolts($volts)->filterByBateriasAmperaje(array('min' => $amperaje_min,'max' => $amperaje_max))->filterByBateriasE($enchufe)->groupBy('tipo')->find();
      
}else{
    $baterias_modelos = BateriasQuery::create()->withColumn("CONCAT(baterias_c,'-',baterias_k,'-',baterias_p,'-',baterias_t,'-',baterias_e,' (',baterias_volts,'V - ',baterias_amperaje,'Ah)')","tipo")->select(array('tipo'))->filterByIdsucursal($sucursales)->filterByBateriasVolts($volts)->filterByBateriasAmperaje($amperaje)->filterByBateriasE($enchufe)->groupBy('tipo')->find();
}

$json = json_encode($baterias_modelos->toArray());
header('Content-Type: application/json');
echo $json;
