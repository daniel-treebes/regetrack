<?php

require_once("../models/db-settings.php");

function dameusoBB(){
    $result = $mysqli->query('SELECT * FROM uso_baterias_bodega');
    if (!$result) die('Couldn\'t fetch records');
    $entrada=0; $salida=0;
    $identrada=array();$idsalida=array();
    
    while($valor = mysqli_fetch_field($result)){
            if($valor[4]==1){
                $entrada++;
                $identrada[]=$valor[2];
                $non=false;
            }
            else{
                $salida++;
                $idsalida[]=$valor[2];
                $non=true;
            }
    }
    $reportar=array();
    $index=0;
    for($i=0;$i<$salida;$i++){
        for($j=0;$j<$entrada;$j++){
            if($idsalida[$j]==$identrada[$i]){
                break;        
            }
            else{
                $reportar[]=$identrada[$i];
                $index++;
            }
        }
    }
    $regreso ='	<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>ID</th>
				<th>Tipo</th>
				<th>Nombre</th>
				<th>Número de serie</th>
		                <th></th>
            </tr>
        </thead>
       
        <tbody>';
    for($i=0;$i<$index;$i++){
        $result2 = $mysqli->query("SELECT baterias.id as 'id', baterias.bateria_tipo as 'tipo', baterias.num_serie as 'serie', bateriastipos.nombre as 'nombre' FROM `baterias` left join `bateriastipos` on baterias.bateria_tipo = bateriastipos.id AND baterias.id = ".$reportar[$index]);
        if (!$result2) die('Couldn\'t fetch records');
        while($baterias = $result2->fetch_array()){
			$regreso.="<tr>";
			$regreso.="<th>".$fila['Id']."</th>";
			$regreso.="<th>".$fila['Nombre']."</th>";
    		$herramientas="<button type='button' class='btn green' onclick='window.location.href=\"edita/cargadores.php&id=".$fila['Id']."\"'><i class='fa fa-cogs'></i> </button>";
			$herramientas.="<button type='button' class='btn red' onclick='window.location.href=\"edita/cargadores.php&id=".$fila['Id']."\"'><i class='fa fa-trash'></i> </button>";
    		$regreso.="<th>".$herramientas."</th>";
			$regreso.="</tr>";
        }
    }
    $regreso.='</tbody></table>';
    echo $regreso;
}

function dameusoBC(){
    $result = $mysqli->query('SELECT * FROM uso_baterias_cargador');
    if (!$result) die('Couldn\'t fetch records');
    $entrada=0; $salida=0;
    $identrada=array();$idsalida=array();
    
    while($valor = mysqli_fetch_field($result)){
            if($valor[4]==1){
                $entrada++;
                $identrada[]=$valor[2];
                $non=false;
            }
            else{
                $salida++;
                $idsalida[]=$valor[2];
                $non=true;
            }
    }
    $reportar=array();
    for($i=0;$i<$salida;$i++){
        for($j=0;$j<$entrada;$j++){
            if($idsalida[$j]==$identrada[$i]){
                break;        
            }
            else{
                $reportar[]=$identrada[$i];
            }
        }
    }    
}

function dameusoBM(){
    $result = $mysqli->query('SELECT * FROM uso_baterias_montacargas');
    if (!$result) die('Couldn\'t fetch records');
    $entrada=0; $salida=0;
    $identrada=array();$idsalida=array();
    
    while($valor = mysqli_fetch_field($result)){
            if($valor[4]==1){
                $entrada++;
                $identrada[]=$valor[2];
                $non=false;
            }
            else{
                $salida++;
                $idsalida[]=$valor[2];
                $non=true;
            }
    }
    $reportar=array();
    for($i=0;$i<$salida;$i++){
        for($j=0;$j<$entrada;$j++){
            if($idsalida[$j]==$identrada[$i]){
                break;        
            }
            else{
                $reportar[]=$identrada[$i];
            }
        }
    }    
}

?>