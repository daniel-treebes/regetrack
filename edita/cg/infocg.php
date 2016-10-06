<?php
include('infobd.php');
//DATOS DEL CARGADOR
if ($datosCargador['ctipo']=='Cargador') {
	$titulocg="Cargador";
}else{
	$titulocg="Bodega";
}
?>
<div class="col-md-6" id="indicadores1">
    <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa icon-cargador"></i><?php echo $titulocg.' '.$datosCargador['Nombre']; ?>
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
                            <input type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $datosCargador['Nombre'] ?> "> 
                        </div>
                    </div>
					<?php if ($datosCargador['ctipo']=='Cargador') {?>
						<div class="form-group">
							<label class="col-md-3 control-label">Tipo</label>
							<div class="col-md-9">
								<input type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $datosCargador['Tipo'] ?> "> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Modelo</label>
							<div class="col-md-9">
								<input type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $datosCargador['Modelo'] ?> "> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Marca</label>
							<div class="col-md-9">
								<input type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $datosCargador['Marca'] ?> "> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Comprador</label>
							<div class="col-md-9">
								<input type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $datosCargador['Comprador'] ?> "> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Serie</label>
							<div class="col-md-9">
								<input type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $datosCargador['Serie'] ?> "> 
							</div>
						</div>
					<?php } ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Espacios</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $cantlugares ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Total de Horas</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo round($horas['h']['total'],0) ?> "> 
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
}
?>
<!--DATOS ESTADÍSTICOS Cargador-->
<?php if ($datosCargador['ctipo']=='Cargador') {?>
<div class="col-md-6" id="indicadores2">
    <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bar-chart "></i>Estadísticas CARGA / IDLE
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
            </div>
        </div>
        <div class="portlet-body form">	   
            <div class="form-actions right1 gray" >
                <div class="">
                    <div class="col-md-4">
                       <div class="easy-pie-chart">
                          <center>Historico<br>Horas</center>
                          <strong><?php echo $horas['h']['carga'].'hrs / '.$horas['h']['idle']; ?>hrs</strong>
						  <div style="height: 20px;"> </div>
					   </div>
                    </div>
                    <div class="col-md-4">
                       <div class="easy-pie-chart">
                          <center>Historico<br>Promedio diario</center>
                          <strong><?php echo $horas['h']['cargap'].'hrs / '.$horas['h']['idlep']; ?>hrs</strong>
						  <div style="height: 20px;"> </div>
                       </div>
                    </div>
                    <div class="col-md-4">
                       <div class="easy-pie-chart">
                          <center>Historico<br>Relación %</center>
                          <strong><?php echo round($horas['h']['carga']*100/$horas['h']['total'],0).'% / '.round($horas['h']['idle']*100/$horas['h']['total'],0); ?>%</strong>
						  <div style="height: 20px;"> </div>
                       </div>
                    </div>
                    <div class="col-md-4">
                       <div class="easy-pie-chart">
                          <center>Útimos 7 dias<br>Horas</center>
                          <strong><?php echo $horas['7']['carga'].'hrs / '.$horas['7']['idle']; ?>hrs</strong>
						  <div style="height: 20px;"> </div>
                       </div>
                    </div>
                    <div class="col-md-4">
                       <div class="easy-pie-chart">
                          <center>Útimos 7 dias<br>Promedio diario</center>
                          <strong><?php echo $horas['7']['cargap'].'hrs / '.$horas['7']['idlep']; ?>hrs</strong>
						  <div style="height: 20px;"> </div>
                       </div>
                    </div>
                    <div class="col-md-4">
                       <div class="easy-pie-chart">
                          <center>Útimos 7 dias<br>Relación %</center>
                          <strong><?php echo round($horas['7']['carga']*100/$horas['7']['total'],0).'% / '.round($horas['7']['idle']*100/$horas['7']['total'],0); ?>%</strong>
						  <div style="height: 20px;"> </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>            
<?php } ?>
<!--DATOS ESTADÍSTICOS Baterias-->
<div class="col-md-6" id="indicadores6">
    <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa icon-bateria "></i>Estado de Espacios
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
            </div>
        </div>
        <div class="portlet-body form">	   
            <div class="form-actions right1 gray" >
                <div class="">
					<?php
					if (count($bodegas)==0) echo '<center>VACÍO</center>';
					foreach ($bodegas as $espacio => $datosbt){ ?>
						<div class="col-md-4">
						   <div class="easy-pie-chart">
							  <center><?php echo $espacio.'<br>'.$datosbt['bt'];?></center>
							  <strong><?php echo $datosbt['estado']; ?></strong><br>
							  <strong><?php echo $datosbt['horas']; ?></strong><br>
							  <strong><?php echo $datosbt['tiempo']; ?></strong><br>
							  <div style="height: 20px;"> </div>
						   </div>
						</div>
					<?php }?>
                </div>
            </div>
        </div>
    </div>
</div>            

<?php
//ALERTAS
include("edita/alertas.php");
pinta_alertas($mysqli,'cg',$id);

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
				   <div id="reporteCGC" ></div>
				</div>
                <div class="col-md-12">
				   <div id="reporteCGD" ></div>
				</div>
                <div class="col-md-12">
				   <div id="reporteCGE" ></div>
				</div>
			</div>
		</div>
	</div>

	<?php
	$grafica=pinta_grafica('cg','reporteCGC','carga',$id, $datosCargador['ctipo']);
	echo $grafica;
	$grafica=pinta_grafica('cg','reporteCGD','descanso',$id, $datosCargador['ctipo']);
	echo $grafica;
	$grafica=pinta_grafica('cg','reporteCGE','espera',$id, $datosCargador['ctipo']);
	echo $grafica;

}
?>


        


