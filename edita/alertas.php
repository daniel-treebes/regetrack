<?php
function pinta_alertas($mysqli, $modulo, $id){
    global $loggedInUser;
    $tabla='deshabilita'.$modulo;
    $columna=$modulo;
    if ($columna=="mc"){
        $columna="idmontacargas";
        $otracolumna="idmontacargas";
        $otratabla="montacargas";
    }elseif ($columna=="cg"){
        $otracolumna="idcargadores";
        $otratabla="cargadores";
    }elseif ($columna=="bt"){
        $otracolumna="idbaterias";
        $otratabla="baterias";
    }
    $query="SELECT
            SUM(alertas)/(IF(TIMESTAMPDIFF(month,inicio,now())>0,TIMESTAMPDIFF(month,inicio,now()),1)) as promedio,
            IF (CONCAT(YEAR(now()),'-',MONTH(now()))=mes,alertas,0) as actual,
            IF (CONCAT(YEAR(DATE_SUB(now(),INTERVAL 1 MONTH)),'-',MONTH(DATE_SUB(now(),INTERVAL 1 MONTH)))=mes,alertas,0) as anterior
        FROM 
        (
            SELECT
                MIN(fecha_entrada) as inicio,
                COUNT(*) as alertas,
                CONCAT(YEAR(fecha_entrada),'-',MONTH(fecha_entrada)) as mes
            FROM ".$tabla." as a,".$otratabla." as o 
            WHERE a.".$columna."=".$id."
                AND a.".$columna."=o.".$otracolumna."
                AND o.idsucursal IN (".$loggedInUser->sucursales.")
            GROUP BY mes
        ) as tabla
        limit 1
    ";
//    echo $query.'<br>';
    $res = $mysqli->query($query);
    while($fila = $res->fetch_array()) {
        $alertas=$fila;
    }
    
    
?>
<div class="col-md-6" id="indicadores3">
    <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-exclamation-triangle"></i>Alertas
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
            </div>
        </div>
        <div class="portlet-body form">
            <div class="form-actions right1 gray" >
                <div class="form-body">
                    <div class="col-md-4">
                        <center>Promedio<br>Mensual Histórico</center>
                        <strong><center><?php echo number_format($alertas['promedio'],2,'.',',');?></center></strong>
                        <br>
                        <br>
                    </div>
                    <div class="col-md-4">
                        <center>Cantidad<br>Mes Anterior</center>
                        <strong><center><?php echo $alertas['anterior'];?></center></strong>
                        <br>
                        <br>
                    </div>
                    <div class="col-md-4">
                        <center>Cantidad<br>Mes Actual</center>
                        <strong><center><?php echo $alertas['actual'];?></center></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php
}
?>