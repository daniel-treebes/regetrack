<?php
require_once("../models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

$id= $_GET['id'];
$tipo= $_GET['tipo'];
echo '<link href="../models/site-templates/default.css" rel="stylesheet" type="text/css" />';
echo '<br>';

if($tipo=="montacargas"){
    $stingurl=urlencode("https://regetrack.com/sistema.php?ruta=edita/montacargas&id=".$id);
    $query="
        SELECT
            m.montacargas_nombre as nombre,
            CONCAT(m.montacargas_c,'-',m.montacargas_k,'-',m.montacargas_p,'-',m.montacargas_t,'-',m.montacargas_e,' (',m.montacargas_volts,'V - ',m.montacargas_amperaje,'Ah)') as tipo
        FROM montacargas as m
        WHERE
            m.idmontacargas=".$id;
    $res = $mysqli->query($query);
    $datos = $res->fetch_array();
     
    ?>
    <center>
    <h1 style="font-size:2em;">MONTAGARGAS</h1><br><h1 style="font-size:3em;"><?php echo $datos['nombre'] ?></h1>
    <?php
    echo "<img src='https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=".$stingurl."'/>";
    echo '<h1>'.$datos['tipo'].'</h1>';
    echo '</center>';
}

if($tipo=="baterias"){
    $stingurl=urlencode("https://regetrack.com/sistema.php?ruta=edita/baterias&id=".$id);
    $query="
        SELECT
            b.baterias_nombre as nombre,
            CONCAT(b.baterias_c,'-',b.baterias_k,'-',b.baterias_p,'-',b.baterias_t,'-',b.baterias_e,' (',b.baterias_volts,'V - ',b.baterias_amperaje,'Ah)') as tipo
        FROM baterias as b
        WHERE b.idbaterias=".$id;
         
    $res = $mysqli->query($query);
    $datos = $res->fetch_array();
    ?>
    <center>
    <h1 style="font-size:2em;">BATERIA</h1><br><h1 style="font-size:3em;"><?php echo $datos['nombre'] ?></h1>
    <?php
    echo "<img src='https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=".$stingurl."'/>";
    echo '<h1>'.$datos['tipo'].'</h1>';
    echo '</center>';
}

if($tipo=="cargadores"){
    $stingurl=urlencode("https://regetrack.com/sistema.php?ruta=edita/cargadores&id=".$id);
    $query="
        SELECT c.cargadores_tipo as ctipo,
            c.cargadores_nombre as nombre,
            CONCAT(c.cargadores_volts,'V ',c.cargadores_amperaje,'Ah (',c.cargadores_e,')') as tipo
        FROM cargadores as c
        WHERE  c.idcargadores=".$id;
    
    $res = $mysqli->query($query);
    $datos = $res->fetch_array();
    if ($datos['ctipo']=="Cargador") $titulo="CARGADOR";
    else $titulo="BODEGA";
    ?>
    <center>
    <h1 style="font-size:2em;"><?php echo $titulo;?></h1><br><h1 style="font-size:3em;"><?php echo $datos['nombre'] ?></h1>
    <?php
    echo "<img src='https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=".$stingurl."'/>";
    echo '<h1>'.$datos['tipo'].'</h1>';
    echo '</center>';
}

?>