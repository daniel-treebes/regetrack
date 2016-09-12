<?php

require_once("../models/db-settings.php");

$uploaddir = getcwd()."/archivos";
$filename = "tipos-de-baterias-".date('Y-m-d-H:i:s');
$uploadfile = $uploaddir."/".$filename.'.cvs';

$result = $mysqli->query('SELECT * FROM bateriastipos');
if (!$result) die('Couldn\'t fetch records');
$num_fields = mysqli_num_fields($result);
$headers = array();
while ($property = mysqli_fetch_field($result)) {
    $headers[] = $property->name;
}
$fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="tipos-de-baterias-'.date('Y-m-d-H:i:s').'.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    fputcsv($fp, $headers);
    $encavezado=[];
    $encavezado[0]="id";
    $encavezado[1]="nombre";
	 $encavezado[1]="Marca";
    $encavezado[2]="celdas";
    $encavezado[3]="factor_k";
	$encavezado[3]="placas";
	$encavezado[3]="volts";
	$encavezado[3]="ah";
	$encavezado[3]="vida_util";
	$encavezado[3]="regeneracion_preventiva";
	$encavezado[3]="regeneracion_correctiva";
    
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        fputcsv($fp, array_values($row));
    }
    
}

return $fp;

?>