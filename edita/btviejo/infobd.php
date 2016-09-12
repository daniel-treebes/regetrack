<?php



//Bodegas Libres

$bodegaDisponible=0;
$resultado2 = $mysqli->query($queryBodegasLibres);
while($fila = $resultado2->fetch_array()) {
	$bodegaDisponible= $fila['bodega'];
	break; 
}

//Baterias Cargando

$resultado2 = $mysqli->query($queryBateriasDescansadas);
while($fila = $resultado2->fetch_array()) {
    $idMovimientoBateriaDescansada=$fila['id'];
    $bodegaBateriaDescansada= $fila['bg'];
    $bateriaDisponible= $fila['bt'];
    $horasBateriaDescansada= $fila['horas'];
    $minutosBateriaDescansada= $fila['minutos']; 				
}

$btAcargarMovimiento;
$btAcargarBT;
$btAcargarBG;
$btAcargarHrs;
$btAcargarMin;




?>

