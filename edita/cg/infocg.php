<?php

$message_baterias = false;
if($_POST){
    $post_data = $_POST;
   
    if($post_data['action'] == 'asignaBaterias'){
      
        $cargadores_baterias = CargadoresBateriasQuery::create()->filterByIdcargadores($post_data['idcargadores'])->delete();
        
        //ASOCIACION DE BATERIAS
        $sucursales = explode(',', $loggedInUser->sucursales);
        $baterias = BateriasQuery::create()->filterByIdsucursal($sucursales)->withColumn("CONCAT(baterias_c,'-',baterias_k,'-',baterias_p,'-',baterias_t,'-',baterias_e,' (',baterias_volts,'V - ',baterias_amperaje,'Ah)')","baterias_tipo")->find()->toArray(null,false,BasePeer::TYPE_FIELDNAME);
        if(isset($post_data['baterias'])){
            foreach ($post_data['baterias'] as $bateria){
                 $filter_column = 'baterias_modelo';
                if(preg_match("/^\d*[-]\d*[-]\d*[-]\w[-]\w\s[(]\d*V\s[-]\s\d*Ah[)]/", $bateria)){
                    $filter_column = 'baterias_tipo';
                }
                foreach ($baterias as $value){

                    if($value[$filter_column] == $bateria){
                        $montacargas_baterias = new CargadoresBaterias();
                        $montacargas_baterias->setIdbaterias($value['idbaterias'])
                                     ->setIdcargadores($post_data['idcargadores'])
                                     ->save();

                    }
                }
            }
        }

        $message_baterias = 'El Registro se ha guardado satisfactoriamente!';
        
        
        
    }
   
}

include('infobd.php');
//DATOS DEL CARGADOR
$titulocg=$datosCargador['ctipo'];
if ($datosCargador['ctipo']=='Cargador') {
	$iconocb='icon-cargador';
}else{
	$iconocb='fa-th';
}
?>
<div class="col-md-6" id="indicadores1">
    <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa <?php echo $iconocb;?>"></i><?php echo $titulocg.' '.$datosCargador['Nombre']; ?>
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
                            <input type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo round($horas['espera']['h']['total'],0) ?> "> 
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
							  <strong><?php echo $datosbt['horas']; ?>hrs</strong><br>
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

//DATOS ESTADÍSTICOS Cargador
for($e=1;$e<=4;$e++){
	if ($titulocg=="Bodega" && $e==2) $e=3;
	if ($e==1){
		$est_estado="espera";
		$titulo="Estadísticas ESPERA / TOTAL";
	}elseif ($e==2){
		$est_estado="carga";
		$titulo="Estadísticas CARGA / TOTAL";
	}elseif($e==3){
		$est_estado="descanso";
		$titulo="Estadísticas DESCANSO / TOTAL";
	}elseif($e==4){
		$est_estado="listo";
		$titulo="Estadísticas LISTO / TOTAL";
	}
?>
<!--DATOS ESTADÍSTICOS Cargador-->
<div class="col-md-6" id="indicadores2">
    <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bar-chart "></i><?php echo $titulo;?>
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
                          <strong><?php echo $horas[$est_estado]['h']['estado'].'hrs / '.$horas[$est_estado]['h']['total']; ?>hrs</strong>
						  <div style="height: 20px;"> </div>
					   </div>
                    </div>
                    <div class="col-md-4">
                       <div class="easy-pie-chart">
                          <center>Historico<br>Promedio diario</center>
                          <strong><?php echo $horas[$est_estado]['h']['estadop'].'hrs / '.$horas[$est_estado]['h']['totalp']; ?>hrs</strong>
						  <div style="height: 20px;"> </div>
                       </div>
                    </div>
                    <div class="col-md-4">
                       <div class="easy-pie-chart">
                          <center>Historico<br>Relación %</center>
                          <strong><?php echo round($horas[$est_estado]['h']['estado']*100/$horas[$est_estado]['h']['total'],0); ?>% / 100%</strong>
						  <div style="height: 20px;"> </div>
                       </div>
                    </div>
                    <div class="col-md-4">
                       <div class="easy-pie-chart">
                          <center>Útimos 7 dias<br>Horas</center>
                          <strong><?php echo $horas[$est_estado]['7']['estado'].'hrs / '.$horas[$est_estado]['7']['total']; ?>hrs</strong>
						  <div style="height: 20px;"> </div>
                       </div>
                    </div>
                    <div class="col-md-4">
                       <div class="easy-pie-chart">
                          <center>Útimos 7 dias<br>Promedio diario</center>
                          <strong><?php echo $horas[$est_estado]['7']['estadop'].'hrs / '.$horas[$est_estado]['7']['totalp']; ?>hrs</strong>
						  <div style="height: 20px;"> </div>
                       </div>
                    </div>
                    <div class="col-md-4">
                       <div class="easy-pie-chart">
                          <center>Útimos 7 dias<br>Relación %</center>
                          <strong><?php echo round($horas[$est_estado]['7']['estado']*100/$horas[$est_estado]['7']['total'],0); ?>% / 100%</strong>
						  <div style="height: 20px;"> </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php }

if($loggedInUser->checkPermission(array(1,2))){
?>
        <?php
        $sucursales = explode(',', $loggedInUser->sucursales);
        $baterias_modelos = BateriasQuery::create()->withColumn('baterias_modelo')->withColumn("CONCAT(baterias_c,'-',baterias_k,'-',baterias_p,'-',baterias_t,'-',baterias_e,' (',baterias_volts,'V - ',baterias_amperaje,'Ah)')","tipo")->select(array('tipo'))->filterByIdsucursal($sucursales)->groupBy('tipo')->find();
        $cargadores_baterias = CargadoresBateriasQuery::create()->joinBaterias()->withColumn("CONCAT(baterias_c,'-',baterias_k,'-',baterias_p,'-',baterias_t,'-',baterias_e,' (',baterias_volts,'V - ',baterias_amperaje,'Ah)')","tipo")->select(array('tipo','Baterias.BateriasModelo'))->groupBy('tipo')->filterByIdcargadores($_GET['id'])->find()->toArray(null,false,  BasePeer::TYPE_FIELDNAME);
        $cargadores_baterias_array = array();
        foreach ($cargadores_baterias as $value){
            if(!is_null($value['tipo'])){
                $cargadores_baterias_array[] = $value['tipo'];
            }else{
                $cargadores_baterias_array[] = $value['Baterias.BateriasModelo'];
            }
        }
        ?>
        <div class="col-sm-6">
            <div class="portlet box  blue-sharp">
                <div class="portlet-title">
                    <div class="caption">
                       <i class="icon-bateria" style="font-size: 25px;margin-top: 2px;"></i>
                        <span class="caption-subject">Asociación de baterias</span>
                    </div>
                    <div class="tools">
                            <a href="" class="collapse" data-original-title="" title=""> </a>
                             
                    </div>
                </div>
                <div class="portlet-body form" >
                    <form role="form" name="MontacargasBateriasForm" method="post" action="<?php echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']?>">
                        <?php if($message_baterias) :?>
                            <div class="row" style="margin-left: 0px; margin-right: 0px; padding-right: 20px; padding-left: 20px; padding-top: 20px;">
                        
                                <div class="alert alert-success">
                                <strong>Exito!</strong>
                                <?php echo $message_baterias ?>
                                </div>
                            </div>
                        <?php endif;?>
                        <div class="row" style="padding: 20px">
                            <input type="hidden" name="idcargadores" value="<?php echo $_GET['id']?>">
                            <input type="hidden" name="action" value="asignaBaterias">
                            <?php foreach ($baterias_modelos as $modelo) :?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="mt-checkbox-list">
                                            <?php if(!is_null($modelo['tipo'])) :?>
                                            <label style="display: block" class="mt-checkbox mt-checkbox-outline"> <?php echo $modelo['tipo']?>
                                                <?php if(in_array($modelo['tipo'], $cargadores_baterias_array)):?>
                                                    <input  value="<?php echo $modelo['tipo']?>" name="baterias[]" type="checkbox" checked>
                                                <?php else:?>
                                                    <input  value="<?php echo $modelo['tipo']?>" name="baterias[]" type="checkbox">
                                                <?php endif;?>
                                                <span></span>
                                            </label>
                                            <?php else:?>
                                                <label style="display: block" class="mt-checkbox mt-checkbox-outline"> <?php echo $modelo['baterias_modelo']?>
                                                    <?php if(in_array($modelo['baterias_modelo'], $cargadores_baterias_array)):?>
                                                    <input value="<?php echo $modelo['baterias_modelo']?>" name="baterias[]" type="checkbox" checked>
                                                    <?php else:?>
                                                          <input value="<?php echo $modelo['baterias_modelo']?>" name="baterias[]" type="checkbox">
                                                    <?php endif;?>
                                                  
                                                    <span></span>
                                                </label>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 col-sm-offset-10" style="padding-bottom: 15px;">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
				   <div id="reporteCGE" ></div>
				</div>
				<?php if ($datosCargador['ctipo']!='Bodega'){?>
                <div class="col-md-12">
				   <div id="reporteCGC" ></div>
				</div>
				<?php } ?>
                <div class="col-md-12">
				   <div id="reporteCGD" ></div>
				</div>
                            <div class="col-md-12">
				   <div id="reporteCGL" ></div>
				</div>
			</div>
		</div>
	</div>

	<?php
	$grafica=pinta_grafica('cg','reporteCGE','espera',$id,'todos', $datosCargador['ctipo']);
	echo $grafica;
	if ($datosCargador['ctipo']!='Bodega'){
		$grafica=pinta_grafica('cg','reporteCGC','carga',$id,'todos', $datosCargador['ctipo']);
		echo $grafica;
	}
	$grafica=pinta_grafica('cg','reporteCGD','descanso',$id,'todos', $datosCargador['ctipo']);
	echo $grafica;
	$grafica=pinta_grafica('cg','reporteCGL','listo',$id,'todos', $datosCargador['ctipo']);
	echo $grafica;

}
?>


        


