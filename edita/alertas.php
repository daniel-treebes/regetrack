<?php
function pinta_alertas($mysqli, $modulo, $id){
    $tabla='deshabilita'.$modulo;
    $query="SELECT
            SUM(alertas)/(TIMESTAMPDIFF(month,inicio,now())+1) as promedio,
            IF (CONCAT(YEAR(now()),'-',MONTH(now()))=mes,alertas,0) as actual,
            IF (CONCAT(YEAR(now()-(60*60*24*31)),'-',MONTH(now()-(60*60*24*31)))=mes,alertas,0) as anterior
        FROM 
        (
            SELECT
                MIN(fecha_entrada) as inicio,
                COUNT(*) as alertas,
                CONCAT(YEAR(fecha_entrada),'-',MONTH(fecha_entrada)) as mes
            FROM ".$tabla."
            WHERE ".$modulo."=".$id."
            GROUP BY mes
        ) as tabla
        limit 1
    ";
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