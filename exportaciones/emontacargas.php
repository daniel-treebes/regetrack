<?php

require_once("../models/db-settings.php");
require_once("../models/config.php");

$uploaddir = getcwd()."/archivos";
$filename = "montacargas-".date('Y-m-d-H:i:s');
$uploadfile = $uploaddir."/".$filename.'.cvs';
$sucursales = explode(',', $loggedInUser->sucursales);
$result = MontacargasQuery::create()->select(array('idmontacargas','montacargas_modelo','montacargas_marca','montacargas_comprador','montacargas_c','montacargas_k','montacargas_p','montacargas_t','montacargas_e','montacargas_volts','montacargas_amperaje'))->filterByIdsucursal($sucursales)->find()->toArray();

//$result = $mysqli->query('SELECT montacargas.* FROM montacargas JOIN bateriastipos ON montacargas.tipo = bateriastipos.id WHERE bateriastipos.idsucursal = '.$loggedInUser->sucursal_activa);
if (!$result) die('Couldn\'t fetch records');

$fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="montacargas-'.date('Y-m-d-H:i:s').'.csv"');
    header('Pragma: no-cache');
    header('Expires: 0'); 
    $encavezado=[];
    $encavezado[0]="ID";
    $encavezado[1]="MODELO";
    $encavezado[2]="MARCA";
     $encavezado[3]="COMPRADOR";
    $encavezado[4]="C";
    $encavezado[5]="K";
    $encavezado[6]="P";
    $encavezado[7]="T";
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