<?php

$message_baterias = false;
$message_cargadores = false;
if($_POST){
    $post_data = $_POST;
    
    if(isset($post_data['action']) && $post_data['action'] == 'asignaBaterias'){
      
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

    }elseif(isset($post_data['action']) && $post_data['action'] == 'editarCargador'){
        
        $entity = CargadoresQuery::create()->findPk($post_data['idcargadores']);
        foreach ($post_data as $key => $value){
            if(CargadoresPeer::getTableMap()->hasColumn($key)){
               $entity->setByName($key, strtoupper($value), BasePeer::TYPE_FIELDNAME);
            }
        }

        $entity->save();
        
        $message_cargadores = 'El Registro se ha guardado satisfactoriamente!';
        
    }elseif(isset($post_data['action']) && $post_data['action'] == 'bajaCargador'){
       
        $entity = CargadoresQuery::create()->findPk($post_data['idcargadores']);
        $entity->setCargadoresBaja(1);
        $entity->save();
        
         $desh= DeshabilitacgQuery::create()->filterByCg($entity->getIdcargadores())->filterByFechaSalida()->findOne();
         $desh->setFechaSalida(new DateTime())->save();
         $desh = new Deshabilitacg();
         $desh->setFechaEntrada(new DateTime())
              ->setCg($entity->getIdcargadores())
              ->setMotivo('Baja')
              ->save();

        $message_baterias = 'El cargador fue dado de baja satisfactoriamente!';
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
<script src="js/numeric.js"></script>
<?php
if($habilitaid>0){
    //SI ESTÁ DESHABILITADO
    include("habilita.php");
}else{
    //PINTA ACTIVIDADES QUE HACER?
    include("cambia.php");
    //PROCEDIMIENTO DE DESHABILITADO solo si no es Bodega
	if ($datosCargador['ctipo']=='Cargador') include("deshabilita.php");
}

?>
<?php
    //baja
    $cg = CargadoresQuery::create()->findPk($_GET['id']);
    $desh= DeshabilitacgQuery::create()->filterByCg($cg->getIdcargadores())->filterByFechaSalida()->exists();
    $baja = false;
    if($desh && $cg->getCargadoresBaja() == 0){
        $baja = true;
    }
    
    $infocg_readonly = "readonly";
    if($loggedInUser->checkPermission(array(1)) && $cg->getCargadoresBaja() == 0){
        $infocg_readonly = "";
    }
?>
<div class="col-md-6" id="indicadores1">
    <div class="portlet box  blue-sharp" ng-controller="CargadoresController">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa <?php echo $iconocb;?>"></i><?php echo $titulocg.' '.$datosCargador['Nombre']; ?>
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
            </div>
        </div>
        <div class="portlet-body form">	   
            <div class="form-actions right1 gray" style="padding: 0px;">
                <div class="form-body" style="padding: 0px;">
                    <?php if($message_cargadores) :?>
                        <div class="row" style="margin-left: 0px; margin-right: 0px; padding-right: 10px; padding-left: 10px; padding-top: 10px;">

                            <div class="alert alert-success">
                            <strong>Exito!</strong>
                            <?php echo $message_cargadores ?>
                            </div>
                        </div>
                    <?php endif;?>
                    <form role="form" name="CargadoresBateriasForm" method="post" action="<?php echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']?>">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nombre</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <select name="idsucursal" style="display: none"> 
                                    <option value="<?php echo $datosCargador['IdSucursal']?>" selected>Sucursal</option>
                                </select>
                                <input type="hidden" name="idcargadores" value="<?php echo $_GET['id']?>">
                                <input type="hidden" name="action" value="editarCargador">
                                <i class="fa fa-check " style="top: 0px; margin-top: 10px; color: green"></i>
                                <i class="fa fa-close " style="top: 0px; margin-top: 10px; color: red; display: none"></i>
                                <input <?php echo $infocg_readonly ?> ng-blur="verificaNombre('<?php echo $datosCargador['Nombre']?>')"  class="form-control" type="text" value="<?php echo $datosCargador['Nombre']?>" name="cargadores_nombre">
                            </div>
                        </div>
                    </div>
                    <?php if ($datosCargador['ctipo']=='Cargador') {?>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Volts</label>
                            <div class="col-md-9">
                                <input <?php echo $infocg_readonly ?> name="cargadores_volts"  number-mask type="text" class="form-control datos-cosa"  value="<?php  echo $datosCargador['Volts'] ?> "> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Amperios</label>
                            <div class="col-md-9">
                                <input <?php echo $infocg_readonly ?> name="cargadores_amperaje"  number-mask type="text" class="form-control datos-cosa"  value="<?php echo $datosCargador['Ampere'] ?> "> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Enchufe</label>
                            <div class="col-md-9">
                                <input  <?php echo $infocg_readonly ?> name="cargadores_e" type="text" class="form-control datos-cosa"  value="<?php echo $datosCargador['Enchufe'] ?> "> 
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label">Modelo</label>
                                <div class="col-md-9">
                                    <input  <?php echo $infocg_readonly ?> name="cargadores_modelo"  type="text" class="form-control datos-cosa" value="<?php  echo $datosCargador['Modelo'] ?> "> 
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Marca</label>
                            <div class="col-md-9">
                                <input  <?php echo $infocg_readonly ?> name="cargadores_marca" type="text" class="form-control datos-cosa" value="<?php  echo $datosCargador['Marca'] ?> "> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Comprador</label>
                            <div class="col-md-9">
                                    <input  <?php echo $infocg_readonly ?> name="cargadores_comprador"  type="text" class="form-control datos-cosa"" value="<?php  echo $datosCargador['Comprador'] ?> "> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Serie</label>
                            <div class="col-md-9">
                                <input <?php echo $infocg_readonly ?>  name="cargadores_numserie"  type="text" class="form-control datos-cosa" value="<?php  echo $datosCargador['Serie'] ?> "> 
                            </div>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Espacios</label>
                        <div class="col-md-9">
                            <input readonly type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $cantlugares ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Total de Horas</label>
                        <div class="col-md-9">
                            <input readonly type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo round($horas['espera']['h']['total'],0) ?> "> 
                        </div>
                    </div>
                    <div class="row" style="padding-right: 15px;">
                        <div class="col-sm-4 col-sm-offset-4" style="padding-bottom: 15px; padding-top: 15px;">
                            <?php if($baja && $loggedInUser->checkPermission(array(1))) :?>
                                <a class="btn btn-danger" style="width: 100%" data-toggle="modal" href="#basic">Baja</a>
                            <?php endif;?>
                        </div>
                        <div class="col-sm-4" style="padding-bottom: 15px; padding-top: 15px;">
                            <?php if($loggedInUser->checkPermission(array(1)) && $cg->getCargadoresBaja() == 0) :?>
                            <button type="submit" class="btn btn-success" style="width: 100%">Guardar</button>
                            <?php endif;?>
                        </div>
                        <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                             <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Baja Cargador <?php echo $cg->getCargadoresNombre()?></h4>
                                        </div>
                                        <input type="hidden" name="idbaterias" value="<?php echo $_GET['id']?>">
                                        <input type="hidden" name="action" value="bajaCargador">
                                        <div class="modal-body"> ¿Esta seguro que desea dar de baja el cargador ?<p style="color:red">NOTA: UNA VEZ CONFIRMADO ESTE CAMBIO ES IRREVERSIBLE</p></div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-danger">Confirmar</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                            </form>
                            <!-- /.modal-dialog -->
                        </div>
                    </div>
                        <input type="hidden" name="idcargadores" value="<?php echo $_GET['id']?>">
                        <input type="hidden" name="action" value="editarCargador">
                    </form>
                </div>
            </div>
        </div>
    </div>

        
        <?php if ($datosCargador['ctipo']=='Cargador') :?>
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
        <div class="portlet box  blue-sharp">
                <div class="portlet-title">
                    <div class="caption">
                       <i class="icon-bateria" style="font-size: 25px;margin-top: 2px;"></i>
                        <span class="caption-subject">Asociación de baterias</span>
                    </div>
                    <div class="tools">
                            <a href="" class="expand" data-original-title="" title=""> </a>
                             
                    </div>
                </div>
                <div class="portlet-body form" style="display:none">
                    <form role="form" name="CargadoresBateriasForm" method="post" action="<?php echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']?>">
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
                            <?php if($loggedInUser->checkPermission(array(1))  && $cg->getCargadoresBaja() == 0):?>
                                <?php foreach ($baterias_modelos as $modelo) :?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="mt-checkbox-list">
                                            <?php if(!is_null($modelo['tipo'])) :?>
                                            <?php if(in_array($modelo['tipo'], $cargadores_baterias_array)):?>
                                                    <input style="display: inline-block" value="<?php echo $modelo['tipo']?>" name="baterias[]" type="checkbox" checked>
                                                <?php else:?>
                                                    <input style="display: inline-block" value="<?php echo $modelo['tipo']?>" name="baterias[]" type="checkbox">
                                            <?php endif;?>
                                            <label style="display: inline-block" class="mt-checkbox mt-checkbox-outline"> <?php echo $modelo['tipo']?>                           
                                                <span></span>
                                            </label>
                                            <?php else:?>
                                                <?php if(in_array($modelo['baterias_modelo'], $cargadores_baterias_array)):?>
                                                    <input style="display: inline-block" value="<?php echo $modelo['baterias_modelo']?>" name="baterias[]" type="checkbox" checked>
                                                    <?php else:?>
                                                          <input style="display: inline-block" value="<?php echo $modelo['baterias_modelo']?>" name="baterias[]" type="checkbox">
                                                <?php endif;?>
                                                <label style="display: inline-block" class="mt-checkbox mt-checkbox-outline"> <?php echo $modelo['baterias_modelo']?>
                                                    
                                                  
                                                    <span></span>
                                                </label>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                            <?php else :?>
                                <?php foreach ($cargadores_baterias_array as $value) :?>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="mt-checkbox-list">
                                                <label style="display: inline-block" class="mt-checkbox mt-checkbox-outline"> <?php echo $value?>
                                                     <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            <?php endif;?>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 col-sm-offset-10" style="padding-bottom: 15px;">
                                <?php if($loggedInUser->checkPermission(array(1))) :?>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                <?php endif;?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif;?>


</div>


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
<div class="col-md-6 indicadores2">
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




