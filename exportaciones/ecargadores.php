<?php

require_once("../models/db-settings.php");
require_once("../models/config.php");
$tipo = $_GET['tipo'];
if($tipo == 'Cargador'){
    $file_name = 'cargadores';
}else{
    $file_name = 'bodegas';
}

$uploaddir = getcwd()."/archivos";
$filename = strtolower($tipo). "-".date('Y-m-d-H:i:s');
$uploadfile = $uploaddir."/".$filename.'.cvs';
$sucursales = explode(',', $loggedInUser->sucursales);
$result = CargadoresQuery::create()->filterByCargadoresTipo($tipo)->select(array('idcargadores','cargadores_modelo','cargadores_marca','cargadores_comprador','cargadores_e','cargadores_volts','cargadores_amperaje'))->filterByIdsucursal($sucursales)->find()->toArray();

//$result = $mysqli->query('SELECT montacargas.* FROM montacargas JOIN cargadorestipos ON montacargas.tipo = cargadorestipos.id WHERE cargadorestipos.idsucursal = '.$loggedInUser->sucursal_activa);
if (!$result) die('Couldn\'t fetch records');

$fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="'.$file_name."-".date('Y-m-d-H:i:s').'.csv"');
    header('Pragma: no-cache');
    header('Expires: 0'); 
    $encavezado=[];
    $encavezado[0]="ID";
    $encavezado[1]="MODELO";
    $encavezado[2]="MARCA";
     $encavezado[3]="COMPRADOR";
    $encavezado[4]="C";
    $encavezado[8]="E";
    $encavezado[9]="VOLTS";
    $encavezado[10]="AMPERES";
    fputcsv($fp, $encavezado);
    foreach($result as $row) {
        fputcsv($fp, array_values($row));
    }
    
}

return $fp;

?>