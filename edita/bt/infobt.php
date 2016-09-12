<?php
$query="
    SELECT
        b.id as Id,
        b.num_serie as Nombre,
        CONCAT(t.volts,'V - ',t.ah,'Ah') as Tipo
    FROM
        baterias as b, bateriastipos as t
    WHERE
        b.id= ".$_GET['id']."
        AND b.tipo = t.id
    limit 1
";

$resultado = $mysqli->query($query);
while($fila = $resultado->fetch_array()) {
    $id= $fila['Id'];
    $nombreBateria= $fila['Nombre'];
    $tipo= $fila['Tipo'];
}

$querydeshabilitado="
    SELECT *
    FROM deshabilitabt
    WHERE bt= ".$_GET['id']." and fecha_salida='0000-00-00 00:00:00'
";
$resultado = $mysqli->query($querydeshabilitado);
$habilitaid=0;
$habilitabt=$_GET['id'];
$habilitamotivo='';
$habilitafecha='';
while($fila = $resultado->fetch_array()) {
    $habilitaid= $fila['id'];
    $habilitabt= $fila['bt'];
    $habilitamotivo= $fila['motivo'];
    $habilitafecha= $fila['fecha_entrada'];
}
include("infobd.php");

//DATOS DE BATERÍA
?>
<div class="col-md-6" id="indicadores1">
    <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-battery-full"></i>Batería <?php echo $id.'-'.$nombreBateria; ?>
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
            </div>
        </div>
        <div class="portlet-body form">	   
            <div class="form-actions right1 gray" >
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nombre</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $nombreBateria ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tipo</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $tipo ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Ubicación</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $ubicacion ?> "> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if($habilitaid>0){
    //SI ESTÁ DESHABILITADO
    include("habilita.php");
}else{
    //PINTA ACTIVIDADES QUE HACER?
    include("cambia.php");
    
    //PROCEDIMIENTO DE DESHABILITADO
    include("deshabilita.php");
    
    //PROCEDIMIENTO DE MONTADO O DESMONTADO DE BATERÍA
    echo '<div class="row">';
        include("scan.php");
    echo '</div>';
}
?>

<!--DATOS ESTADÍSTICOS-->
<div class="col-md-6" id="indicadores2">
    <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bar-chart "></i>Estadísticas
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
            </div>
        </div>
        <div class="portlet-body form">	   
            <div class="form-actions right1 gray" >
                <div class="form-body">
                <?php
                    if($porcentaje>100){
                            $colorbtestado="red";
                    }elseif($porcentaje>70){
                            $colorbtestado="yellow";
                    }else{
                            $colorbtestado="green";
                    }
                    ?>
                    <div class="col-md-4">
                        <div class="easy-pie-chart">
                           <center>Estado Actual<br><strong><?php echo $estadoAct;?></strong></center>
                           <div class="number btestado" data-percent="<?php  echo $porcentaje; ?>">
                              <span><?php echo $porcentaje; ?></span>% 
                              <canvas height="75" width="75"></canvas>
                           </div>
                           <?php  echo $tiempoDeUso; ?> hrs / 8hrs
                        </div>
                    <br>
                    </div>
                    <div class="margin-bottom-10 visible-sm"></div>
                    <div class="col-md-4">
                        <?php
                        if($ppromedioAnt>100){
                                $colorbtant="red";
                        }else if($ppromedioAnt>70){
                                $colorbtant="yellow";
                        }else{
                                $colorbtant="green";
                        }
                        ?>
                        <div class="easy-pie-chart">
                           <center>Promedio de uso<br>mes pasado</center>
                           <div class="number btant" data-percent="<?php echo $ppromedioAnt;?>">
                              <span><?php echo $ppromedioAnt;?>%</span> 
                              <canvas height="75" width="75"></canvas>
                           </div>
                           <?php echo $tpromedioAnt;?> hrs / 8hrs
                        </div>
                    <br>
                    </div>
                    <div class="margin-bottom-10 visible-sm"> </div>
                    <div class="col-md-4">
                        <?php
                        if($ppromedioAct>100){
                                $colorbtact="red";
                        }else if($ppromedioAct>70){
                                $colorbtact="yellow";
                        }else{
                                $colorbtact="green";
                        }
                        ?>
                        <div class="easy-pie-chart">
                           <center>Promedio de uso<br>mes actual</center>
                           <div class="number btact" data-percent="<?php  echo $ppromedioAct; ?>">
                              <span><?php  echo $ppromedioAct; ?></span>% 
                              <canvas height="75" width="75"></canvas>
                           </div>
                           <?php echo $tpromedioAct;?> hrs / 8hrs
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>            
<?php
//ALERTAS
include("edita/alertas.php");
pinta_alertas($mysqli,'bt',$id);

if($loggedInUser->checkPermission(array(1,2))){
?>

	<div class="col-md-12" id="indicadores5">
		<div class="portlet box  blue-sharp">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-area-chart"></i>Gráficas 
				</div>
				<div class="tools">
					<a href="" class="collapse" data-original-title="" title=""> </a>
				</div>
			</div>
			<div class="portlet-body form">	   
						<div class="col-md-12">
						   <div id="reporteBTC" ></div>
						</div>
						<div class="col-md-12">
						   <div id="reporteBTD" ></div>
						</div>
						<div class="col-md-12">
						   <div id="reporteBTU" ></div>
						</div>
						<div class="col-md-12">
						   <div id="reporteBTE" ></div>
						</div>
			</div>
		</div>
	</div>

	<?php
	$grafica=pinta_grafica('bt','reporteBTC','carga',$id);
	echo $grafica;
	$grafica=pinta_grafica('bt','reporteBTD','descanso',$id);
	echo $grafica;
	$grafica=pinta_grafica('bt','reporteBTU','uso',$id);
	echo $grafica;
	$grafica=pinta_grafica('bt','reporteBTE','espera',$id);
	echo $grafica;

}
?>


        


