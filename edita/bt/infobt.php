<?php

include("infobd.php");

//DATOS DE BATERÍA
?>
<div class="col-md-6" id="indicadores1">
    <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-battery-full"></i>Batería <?php echo $datosBateria['Nombre']; ?>
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
                            <input type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $datosBateria['Nombre'] ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tipo</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $datosBateria['Tipo'] ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Modelo</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $datosBateria['Modelo'] ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Marca</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $datosBateria['Marca'] ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Comprador</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $datosBateria['Comprador'] ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Serie</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $datosBateria['Serie'] ?> "> 
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
	$grafica=pinta_grafica('bt','reporteBTC','carga',$id,$sucursal_activa);
	echo $grafica;
	$grafica=pinta_grafica('bt','reporteBTD','descanso',$id,$sucursal_activa);
	echo $grafica;
	$grafica=pinta_grafica('bt','reporteBTU','uso',$id,$sucursal_activa);
	echo $grafica;
	$grafica=pinta_grafica('bt','reporteBTE','espera',$id,$sucursal_activa);
	echo $grafica;

}
?>


        


