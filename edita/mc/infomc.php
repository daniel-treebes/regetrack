<?php

$message_baterias = false;
$message_montacargas = false;
if($_POST){
    $post_data = $_POST;
   
    if($post_data['action'] == 'asignaBaterias'){
        $montacargas_baterias = MontacargasBateriasQuery::create()->filterByIdmontacargas($post_data['idmontacargas'])->delete();
        
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
                        $montacargas_baterias = new MontacargasBaterias();
                        $montacargas_baterias->setIdbaterias($value['idbaterias'])
                                     ->setIdmontacargas($post_data['idmontacargas'])
                                     ->save();

                    }
                }
            }
        }
        $message_baterias = 'El Registro se ha guardado satisfactoriamente!';
        
        
        
    }elseif($post_data['action'] == 'editarMontacargaas'){
     
        $entity = MontacargasQuery::create()->findPk($post_data['idmontacargas']);
        foreach ($post_data as $key => $value){
            if(MontacargasPeer::getTableMap()->hasColumn($key)){
               $entity->setByName($key, strtoupper($value), BasePeer::TYPE_FIELDNAME);
            }
        }
        $volts = (int)$post_data['montacargas_c'] * 2;
        $amperaje = (((int)$post_data['montacargas_p'] - 1)/2) * (int)$post_data['montacargas_k'];

        $entity->setMontacargasVolts($volts)
               ->setMontacargasAmperaje($amperaje);
        

        $entity->save();
        
        $message_montacargas = 'El Registro se ha guardado satisfactoriamente!';
    }
    
    
    
    
    
    
   
}



$query="
    SELECT
        m.idmontacargas as Id,
        m.montacargas_nombre as Nombre,
        m.montacargas_modelo as Modelo,
        m.montacargas_marca as Marca,
        m.montacargas_comprador as Comprador,
        m.montacargas_c as Celdas,
        m.montacargas_k as FactorK,
        m.montacargas_p as Placas,
        m.montacargas_t as Tipo,
        m.montacargas_e as Enchufe,
        m.montacargas_numserie as Serie,
        m.idsucursal as Idsucursal
    FROM montacargas as m
    WHERE m.idmontacargas= ".$_GET['id']."
        AND m.idsucursal IN (".$loggedInUser->sucursales.")
    limit 1
";

$resultado = $mysqli->query($query);
while($fila = $resultado->fetch_array()) {
    
    $id= $fila['Id'];
    $nombre= $fila['Nombre'];
    $modelo= $fila['Modelo'];
    $marca= $fila['Marca'];
    $comprador= $fila['Comprador'];
    $celdas= $fila['Celdas'];
    $factork= $fila['FactorK'];
    $placas= $fila['Placas'];
    $tipo= $fila['Tipo'];
    $enchufe= $fila['Enchufe'];
    $serie= $fila['Serie'];
    $idsucursal= $fila['Idsucursal'];
    

}

$querydeshabilitado="
    SELECT dmc.*
    FROM deshabilitamc as dmc, montacargas as tmc
    WHERE dmc.idmontacargas= ".$_GET['id']."
        AND tmc.idmontacargas=dmc.idmontacargas
        AND dmc.fecha_salida='0000-00-00 00:00:00'
        AND tmc.idsucursal IN (".$loggedInUser->sucursales.")
";
$resultado = $mysqli->query($querydeshabilitado);
$habilitaid=0;
$habilitamc=$_GET['id'];
$habilitamotivo='';
$habilitafecha='';
while($fila = $resultado->fetch_array()) {
    $habilitaid= $fila['id'];
    $habilitamc= $fila['idmontacargas'];
    $habilitamotivo= $fila['motivo'];
    $habilitafecha= $fila['fecha_entrada'];
}
//DATOS DEL MONTACARGAS
?>
<script src="js/numeric.js"></script>
<?php

include("infobd.php");

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
<div class="col-md-6" id="indicadores1">
    <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa icon-montacarga"></i>Montacargas <?php echo $nombre; ?>
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
            </div>
        </div>
        <div class="portlet-body form" ng-controller="MontacargasController">
            
            <form role="form" name="CargadoresBateriasForm" method="post" action="<?php echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']?>">
                <div class="form-actions right1 gray" style="padding: 0px">
                <div class="form-body" style="padding: 0px">
                    <?php if($message_montacargas) :?>
                        <div class="row" style="margin-left: 0px; margin-right: 0px; padding-right: 10px; padding-left: 10px; padding-top: 10px;">

                            <div class="alert alert-success">
                            <strong>Exito!</strong>
                            <?php echo $message_montacargas ?>
                            </div>
                        </div>
                    <?php endif;?>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nombre</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <select name="idsucursal" style="display: none"> 
                                    <option value="<?php echo $idsucursal?>" selected>Sucursal</option>
                                </select>
                                <input type="hidden" name="idmontacargas" value="<?php echo $_GET['id']?>">
                                <input type="hidden" name="action" value="editarMontacargaas">
                                <i class="fa fa-check " style="top: 0px; margin-top: 10px; color: green"></i>
                                <i class="fa fa-close " style="top: 0px; margin-top: 10px; color: red; display: none"></i>
                                <input ng-blur="verificaNombre('<?php echo$nombre?>')"  class="form-control" type="text" value="<?php echo $nombre?>" name="montacargas_nombre">
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Celdas</label>
                        <div class="col-md-9">
                            <input number-mask name="montacargas_c" type="text" class="form-control datos-cosa"  value="<?php  echo $celdas ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Factor K</label>
                        <div class="col-md-9">
                            <input number-mask name="montacargas_k"  type="text" class="form-control datos-cosa"  value="<?php  echo $factork ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Placas</label>
                        <div class="col-md-9">
                            <input number-mask name="montacargas_p" type="text" class="form-control datos-cosa"  value="<?php  echo $placas ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tipo</label>
                        <div class="col-md-9">
                            <input  name="montacargas_t" type="text" class="form-control datos-cosa"  value="<?php  echo $tipo ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Enchufe</label>
                        <div class="col-md-9">
                            <input  name="montacargas_e" type="text" class="form-control datos-cosa"  value="<?php  echo $enchufe ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Modelo</label>
                        <div class="col-md-9">
                            <input  name="montacargas_modelo" type="text" class="form-control datos-cosa"  value="<?php  echo $modelo ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Marca</label>
                        <div class="col-md-9">
                            <input   name="montacargas_marca" type="text" class="form-control datos-cosa"  value="<?php  echo $marca ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Comprador</label>
                        <div class="col-md-9">
                            <input  name="montacargas_comprador" type="text" class="form-control datos-cosa"  value="<?php  echo $comprador ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Serie</label>
                        <div class="col-md-9">
                            <input  name="montacargas_numserie" type="text" class="form-control datos-cosa"  value="<?php  echo $serie ?> "> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-10" style="padding-bottom: 15px; padding-top: 15px;">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
        
    </div>
<<<<<<< HEAD
            <?php if($loggedInUser->checkPermission(array(1,2))) :?>
            <?php

            $sucursales = explode(',', $loggedInUser->sucursales);
            $baterias_modelos = BateriasQuery::create()->withColumn('baterias_modelo')->withColumn("CONCAT(baterias_c,'-',baterias_k,'-',baterias_p,'-',baterias_t,'-',baterias_e,' (',baterias_volts,'V - ',baterias_amperaje,'Ah)')","tipo")->select(array('tipo'))->filterByIdsucursal($sucursales)->groupBy('tipo')->find();
            $montacargas_baterias = MontacargasBateriasQuery::create()->joinBaterias()->withColumn("CONCAT(baterias_c,'-',baterias_k,'-',baterias_p,'-',baterias_t,'-',baterias_e,' (',baterias_volts,'V - ',baterias_amperaje,'Ah)')","tipo")->select(array('tipo','Baterias.BateriasModelo'))->groupBy('tipo')->filterByIdmontacargas($_GET['id'])->find()->toArray(null,false,  BasePeer::TYPE_FIELDNAME);
            $montacargas_baterias_array = array();
            foreach ($montacargas_baterias as $value){
                if(!is_null($value['tipo'])){
                    $montacargas_baterias_array[] = $value['tipo'];
                }else{
                    $montacargas_baterias_array[] = $value['Baterias.BateriasModelo'];
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
                <div class="portlet-body form" style="display: none">
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
                            <input type="hidden" name="idmontacargas" value="<?php echo $_GET['id']?>">
                            <input type="hidden" name="action" value="asignaBaterias">
                            <?php foreach ($baterias_modelos as $modelo) :?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="mt-checkbox-list">
                                            <?php if(!is_null($modelo['tipo'])) :?>
                                            <label style="display: block" class="mt-checkbox mt-checkbox-outline"> <?php echo $modelo['tipo']?>
                                                <?php if(in_array($modelo['tipo'], $montacargas_baterias_array)):?>
                                                    <input  value="<?php echo $modelo['tipo']?>" name="baterias[]" type="checkbox" checked>
                                                <?php else:?>
                                                    <input  value="<?php echo $modelo['tipo']?>" name="baterias[]" type="checkbox">
                                                <?php endif;?>
                                                <span></span>
                                            </label>
                                            <?php else:?>
                                                <label style="display: block" class="mt-checkbox mt-checkbox-outline"> <?php echo $modelo['baterias_modelo']?>
                                                    <?php if(in_array($modelo['baterias_modelo'], $montacargas_baterias_array)):?>
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
            <?php endif;?>

    
</div>


<!--DATOS ESTADÍSTICOS-->
        
=======
    <?php if($loggedInUser->checkPermission(array(1,2))) :?>
    <?php

    $sucursales = explode(',', $loggedInUser->sucursales);
    $baterias_modelos = BateriasQuery::create()->withColumn('baterias_modelo')->withColumn("CONCAT(baterias_c,'-',baterias_k,'-',baterias_p,'-',baterias_t,'-',baterias_e,' (',baterias_volts,'V - ',baterias_amperaje,'Ah)')","tipo")->select(array('tipo'))->filterByIdsucursal($sucursales)->groupBy('tipo')->find();
    $montacargas_baterias = MontacargasBateriasQuery::create()->joinBaterias()->withColumn("CONCAT(baterias_c,'-',baterias_k,'-',baterias_p,'-',baterias_t,'-',baterias_e,' (',baterias_volts,'V - ',baterias_amperaje,'Ah)')","tipo")->select(array('tipo','Baterias.BateriasModelo'))->groupBy('tipo')->filterByIdmontacargas($_GET['id'])->find()->toArray(null,false,  BasePeer::TYPE_FIELDNAME);
    $montacargas_baterias_array = array();
    foreach ($montacargas_baterias as $value){
        if(!is_null($value['tipo'])){
            $montacargas_baterias_array[] = $value['tipo'];
        }else{
            $montacargas_baterias_array[] = $value['Baterias.BateriasModelo'];
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
                    <input type="hidden" name="idmontacargas" value="<?php echo $_GET['id']?>">
                    <input type="hidden" name="action" value="asignaBaterias">
                    <?php foreach ($baterias_modelos as $modelo) :?>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="mt-checkbox-list">
                                    <?php if(!is_null($modelo['tipo'])) :?>
                                    <label style="display: block" class="mt-checkbox mt-checkbox-outline"> <?php echo $modelo['tipo']?>
                                        <?php if(in_array($modelo['tipo'], $montacargas_baterias_array)):?>
                                            <input  value="<?php echo $modelo['tipo']?>" name="baterias[]" type="checkbox" checked>
                                        <?php else:?>
                                            <input  value="<?php echo $modelo['tipo']?>" name="baterias[]" type="checkbox">
                                        <?php endif;?>
                                        <span></span>
                                    </label>
                                    <?php else:?>
                                        <label style="display: block" class="mt-checkbox mt-checkbox-outline"> <?php echo $modelo['baterias_modelo']?>
                                            <?php if(in_array($modelo['baterias_modelo'], $montacargas_baterias_array)):?>
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
    <?php endif;?>
    
</div>

<?php

include("infobd.php");

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
>>>>>>> 3d1de66536b54b357f77db6903c3f0addb714743
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
                            $colorbtact="red";
                    }else if($porcentaje>70){
                            $colorbtact="yellow";
                    }else{
                            $colorbtact="green";
                    }
                    ?>
                    <div class="col-md-4">
                        <?php
                        if($siHay>0){
                        ?>
                            <div class="easy-pie-chart">
                               <center>Batería Actual<strong> <?php  echo $nombreBateria ?> </strong></center>
                               <div class="number btact" data-percent="<?php  echo $porcentaje; ?>">
                                  <span><?php  echo $porcentaje; ?></span>% 
                                  <canvas height="75" width="75"></canvas>
                               </div>
                               En uso<br> <?php  echo $tiempoDeUso; ?>
                            </div>
                        <?php
                        }else{
                        ?>
                            <div style="color:red;">
                               <center><strong>SIN<br>Batería</strong></center>
                            </div>
                        <?php
                        }
                        
                        if($porcentajeAnt>100){
                                $colorbtant="red";
                        }else if($porcentajeAnt>70){
                                $colorbtant="yellow";
                        }else{
                                $colorbtant="green";
                        }
                        ?>
                    <br>
                    </div>
                    <div class="margin-bottom-10 visible-sm"></div>
                    <div class="col-md-4">
                        <?php
                        if($idBateriaAnt!=' '){
                        ?>
                            <div class="easy-pie-chart">
                               <center>Batería Anterior<strong> <?php  echo $idBateriaAnt ?> </strong></center>
                               <div class="number btant" data-percent="<?php  echo $porcentajeAnt; ?>">
                                  <span><?php  echo $porcentajeAnt; ?></span>% 
                                  <canvas height="75" width="75"></canvas>
                               </div>
                               En uso<br> <?php  echo $tiempoDeUsoAnt; ?>
                            </div>
                        <?php
                        }else{
                        ?>
                            <div style="color:red;">
                               <center><strong>SIN<br>Batería Anterior</strong></center>
                            </div>
                        <?php
                        }
                        ?>
                    <br>
                    </div>
                    <div class="margin-bottom-10 visible-sm"> </div>
                    <div class="col-md-4">
                       <div class="easy-pie-chart">
                          <center>Tempo sin batería en los últimos 7 días</center>
                          <br><strong><?php echo $sinuso; ?></strong>
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
pinta_alertas($mysqli,'mc',$id);


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
				   <div id="reporteMC" ></div>
				</div>
			</div>
		</div>
	</div>

	<?php
	$grafica=pinta_grafica('mc','reporteMC','uso',$id);
	echo $grafica;

}
?>
<?php 

    if($habilitaid <= 0){
        //PROCEDIMIENTO DE MONTADO O DESMONTADO DE BATERÍA
        echo '<div class="row">';
            include("scan.php");
        echo '</div>';
    }

?>

        


