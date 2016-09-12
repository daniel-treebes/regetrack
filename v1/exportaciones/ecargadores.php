<?php

require_once("../models/db-settings.php");

$uploaddir = getcwd()."/archivos";
$filename = "baterias-".date('Y-m-d-H:i:s');
$uploadfile = $uploaddir."/".$filename.'.cvs';

/*$result = $mysqli->query("SELECT cargadores.id, cargadores.nombre as 'nombre de cargador', bateriastipos.nombre as 'nombre de bateria', bateriastipos.marca, bateriastipos.celdas, bateriastipos.factor_k as 'factor k', bateriastipos.placas, bateriastipos.volts, bateriastipos.ah, bateriastipos.vida_util as 'vida util', bateriastipos.regeneracion_preventiva as 'regeneracion preventiva', bateriastipos.regeneracion_correctiva as 'regeneracion correctiva'
from cargadores
left join bateriastipos
ON cargadores.tipo = bateriastipos.id");*/
$result= $mysqli->query("SELECT * FROM cargadores");
if (!$result) die('Couldn\'t fetch records');
$num_fields = mysqli_num_fields($result);
$headers = array();
while ($property = mysqli_fetch_field($result)) {
    $headers[] = $property->name;
}

$fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="cargadores-'.date('Y-m-d-H:i:s').'.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    fputcsv($fp, $headers);
    $encavezado=[];
    $encavezado[0]="id";
    $encavezado[1]="nombre";
    $encavezado[2]="tipo";
/*    $encavezado[2]="nombre de batería";
    $encavezado[3]="marca";
    $encavezado[4]="celdas";
    $encavezado[5]="factor k";
    $encavezado[6]="placas";
    $encavezado[7]="volts";
    $encavezado[8]="ah";
    $encavezado[9]="vida útil";
    $encavezado[10]="regeneración preventiva";
    $encavezado[11]="regeneración correctiva";*/
	 
    
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        fputcsv($fp, array_values($row));
    }
    
}

return $fp;

?>