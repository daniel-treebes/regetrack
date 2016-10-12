<?php

require_once("../models/config.php");
$volts = $_GET['volts'];
$amperaje = $_GET['amperaje'];
$tipo = $_GET['tipo'];
$enchufe = $_GET['enchufe'];

$baterias_modelos = BateriasQuery::create()->select(array('baterias_modelo'))->filterByBateriasVolts($volts)->filterByBateriasAmperaje($amperaje)->filterByBateriasT($tipo)->filterByBateriasE($enchufe)->groupByBateriasModelo()->find();

$json = json_encode($baterias_modelos->toArray());
header('Content-Type: application/json');
echo $json;
