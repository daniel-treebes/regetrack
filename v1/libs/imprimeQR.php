<?php

$id= $_GET['id'];
$tipo= $_GET['tipo'];
 
if($tipo=="montacargas"){
	
	
$stingurl="https://treebes.com/regetrack/sistema.php?ruta=edita/montacargas&id=".$id;
?>
<h3>
PENDIENTE - INFOGRAFIA DE USO MONTACARGAS
</h3>
<?php
echo "<img src='https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=".$stingurl."'/>";
}

if($tipo=="baterias"){
	
	
$stingurl="https://treebes.com/regetrack/sistema.php?ruta=edita/baterias&id=".$id;
?>
<h3>
PENDIENTE - INFOGRAFIA DE USO BATERÍA
</h3>
<?php
echo "<img src='https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=".$stingurl."'/>";
}


if($tipo=="cargadores"){
	
	
$stingurl="https://treebes.com/regetrack/sistema.php?ruta=edita/cargadores&id=".$id;
?>
<h3>
PENDIENTE - INFOGRAFIA DE USO CARGADOR
</h3>
<?php
echo "<img src='https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=".$stingurl."'/>";
}

?>