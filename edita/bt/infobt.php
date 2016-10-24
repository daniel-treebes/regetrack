<?php

include("infobd.php");
$message_baterias = false;
if($_POST){
    $post_data = $_POST;
    
    if($post_data['action'] == 'editarBaterias'){
        
        $entity = BateriasQuery::create()->findPk($post_data['idbaterias']);
        foreach ($post_data as $key => $value){
            if(BateriasPeer::getTableMap()->hasColumn($key)){
               $entity->setByName($key, strtoupper($value), BasePeer::TYPE_FIELDNAME);
            }
        }
        $volts = (int)$post_data['baterias_c'] * 2;
        $amperaje = (((int)$post_data['baterias_p'] - 1)/2) * (int)$post_data['baterias_k'];

        $entity->setBateriasVolts($volts)
               ->setBateriasAmperaje($amperaje);
        
       
        $entity->save();


        $message_baterias = 'El Registro se ha guardado satisfactoriamente!';
    }
   
}
//DATOS DE BATERÍA
?>
<script src="js/numeric.js"></script>
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
<?php 
    $infobt_readonly = "readonly";
    if($loggedInUser->checkPermission(array(1))){
        $infobt_readonly = "";
    }
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
        <div class="portlet-body form" ng-controller="BateriasController">	   
            <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']?>">
                <div class="form-actions right1 gray" style="padding: 0px">
                <div class="form-body" style="padding: 0px">
                    <?php if($message_baterias) :?>
                        <div class="row" style="margin-left: 0px; margin-right: 0px; padding-right: 10px; padding-left: 10px; padding-top: 10px;">

                            <div class="alert alert-success">
                            <strong>Exito!</strong>
                            <?php echo $message_baterias ?>
                            </div>
                        </div>
                    <?php endif;?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nombre</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <select name="idsucursal" style="display: none"> 
                                    <option value="<?php echo $datosBateria['Idsucursal']?>" selected>Sucursal</option>
                                </select>
                                <input type="hidden" name="idbaterias" value="<?php echo $_GET['id']?>">
                                <input type="hidden" name="action" value="editarBaterias">
                                <i class="fa fa-check " style="top: 0px; margin-top: 10px; color: green"></i>
                                <i class="fa fa-close " style="top: 0px; margin-top: 10px; color: red; display: none"></i>
                                <input <?php echo $infobt_readonly ?> ng-blur="verificaNombre('<?php echo $datosBateria['Nombre']?>')"  class="form-control" type="text" value="<?php echo $datosBateria['Nombre']?>" name="baterias_nombre">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Celdas</label>
                        <div class="col-md-9">
                            <input <?php echo $infobt_readonly ?> name="baterias_c" number-mask type="text" class="form-control datos-cosa"  value="<?php  echo $datosBateria['Celdas'] ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Factor K</label>
                        <div class="col-md-9">
                            <input <?php echo $infobt_readonly ?> name="baterias_k" number-mask type="text" class="form-control datos-cosa"  value="<?php  echo $datosBateria['FactorK'] ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Placas</label>
                        <div class="col-md-9">
                            <input <?php echo $infobt_readonly ?> name="baterias_p" number-mask type="text" class="form-control datos-cosa"  value="<?php  echo $datosBateria['Placas'] ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tipo</label>
                        <div class="col-md-9">
                            <input <?php echo $infobt_readonly ?> name="baterias_t" type="text" class="form-control datos-cosa"  value="<?php  echo $datosBateria['Tipo'] ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Enchufe</label>
                        <div class="col-md-9">
                            <input <?php echo $infobt_readonly ?> name="baterias_e" type="text" class="form-control datos-cosa"  value="<?php  echo $datosBateria['Enchufe'] ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Modelo</label>
                        <div class="col-md-9">
                            <input <?php echo $infobt_readonly ?> name="baterias_modelo" type="text" class="form-control datos-cosa"  value="<?php  echo $datosBateria['Modelo'] ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Marca</label>
                        <div class="col-md-9">
                            <input <?php echo $infobt_readonly ?> name="baterias_marca" type="text" class="form-control datos-cosa"  value="<?php  echo $datosBateria['Marca'] ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Comprador</label>
                        <div class="col-md-9">
                            <input <?php echo $infobt_readonly ?> name="baterias_comprador" type="text" class="form-control datos-cosa"  value="<?php  echo $datosBateria['Comprador'] ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Serie</label>
                        <div class="col-md-9">
                            <input <?php echo $infobt_readonly ?>  name="baterias_numserie" type="text" class="form-control datos-cosa"  value="<?php  echo $datosBateria['Serie'] ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Ubicación</label>
                        <div class="col-md-9">
                            <input readonly type="text" class="form-control datos-cosa"  value="<?php  echo $ubicacion ?> "> 
                        </div>
                    </div>
                    <div class="row" style="padding-right: 15px;">
                        <div class="col-sm-2 col-sm-offset-10" style="padding-bottom: 15px; padding-top: 15px;">
                            <?php if($loggedInUser->checkPermission(array(1))) :?>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <?php 

    $montacargas_baterias = MontacargasBateriasQuery::create()->filterByIdbaterias($_GET['id'])->find();

?>

      <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-montacarga" style="font-size: 25px;margin-top: 2px;"></i>
                <span class="caption-subject">Asociación con montacargas</span>
            </div>
            <div class="tools">
                <a href="" class="expand" data-original-title="" title=""> </a>

            </div>
        </div>
          <div class="portlet-body form" style="display: none; background-color: #F5F5F5">
              <ul style="padding: 0px;list-style-type: square;margin: 0px">
                <div class="row" style="padding: 20px">
                    <?php foreach ($montacargas_baterias as $value) : ?>
                   
                    <li style="display: inline-block;" ><i class="fa fa-circle" style="font-size: 10px"></i><a href="/sistema.php?ruta=edita/montacargas&id=<?php echo $value->getIdmontacargas()?>"><?php echo $value->getMontacargas()->getMontacargasNombre()?></a></li>
                    
                    <?php endforeach; ?>
                </div>  
                </ul>
        </div>
    </div>

<?php 

    $cargadores_baterias = CargadoresBateriasQuery::create()->filterByIdbaterias($_GET['id'])->find();

?>

      <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-cargador" style="font-size: 25px;margin-top: 2px;"></i>
                <span class="caption-subject">Asociación con cargadores</span>
            </div>
            <div class="tools">
                <a href="" class="expand" data-original-title="" title=""> </a>

            </div>
        </div>
          <div class="portlet-body form" style="display: none; background-color: #F5F5F5">
              <ul style="padding: 0px;list-style-type: square;margin: 0px">
                <div class="row" style="padding: 20px">
                    <?php foreach ($cargadores_baterias as $value) : ?>
                   
                    <li style="display: inline-block;" ><i class="fa fa-circle" style="font-size: 10px"></i><a href="/sistema.php?ruta=edita/cargadores&id=<?php echo $value->getIdcargadores()?>"><?php echo $value->getCargadores()->getCargadoresNombre()?></a></li>
                    
                    <?php endforeach; ?>
                </div>  
                </ul>
        </div>
    </div>
    
</div>
          
<?php
//ALERTAS
include("edita/alertas.php");
pinta_alertas($mysqli,'bt',$_GET['id']);

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
						   <div id="reporteBTU" ></div>
						</div>
						<div class="col-md-12">
						   <div id="reporteBTE" ></div>
						</div>
						<div class="col-md-12">
						   <div id="reporteBTC" ></div>
						</div>
						<div class="col-md-12">
						   <div id="reporteBTD" ></div>
						</div>
						<div class="col-md-12">
						   <div id="reporteBTL" ></div>
						</div>
			</div>
		</div>
	</div>

	<?php
	$grafica=pinta_grafica('bt','reporteBTU','uso',$_GET['id']);
	echo $grafica;
	$grafica=pinta_grafica('bt','reporteBTE','espera',$_GET['id']);
	echo $grafica;
	$grafica=pinta_grafica('bt','reporteBTC','carga',$_GET['id']);
	echo $grafica;
	$grafica=pinta_grafica('bt','reporteBTD','descanso',$_GET['id']);
	echo $grafica;
	$grafica=pinta_grafica('bt','reporteBTL','listo',$_GET['id']);
	echo $grafica;

}
?>
<?php

    if($habilitaid<=0)
    //PROCEDIMIENTO DE MONTADO O DESMONTADO DE BATERÍA
    echo '<div class="row">';
        include("scan.php");
    echo '</div>';

?>  


