<?php

require_once("../models/db-settings.php");

$uploaddir = getcwd()."/archivos";
$filename = "bodegas-".date('Y-m-d-H:i:s');
$uploadfile = $uploaddir."/".$filename.'.cvs';

$result = $mysqli->query('SELECT * FROM bodegas');
if (!$result) die('Couldn\'t fetch records');
$num_fields = mysqli_num_fields($result);
$headers = array();
while ($property = mysqli_fetch_field($result)) {
    $headers[] = $property->name;
}
$fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="bodegas-'.date('Y-m-d-H:i:s').'.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    fputcsv($fp, $headers);
    $encavezado=[];
    $encavezado[0]="id";
    $encavezado[1]="nombre";
	 
    
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        fputcsv($fp, array_values($row));
    }
    
}

return $fp;

?>