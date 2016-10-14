
<?php

$message = false;
if($_POST){
    $post_data = $_POST;
    
    $entity = new Montacargas();
    foreach ($post_data as $key => $value){
        if(MontacargasPeer::getTableMap()->hasColumn($key)){
           $entity->setByName($key, strtoupper($value), BasePeer::TYPE_FIELDNAME);
        }
    }
   
    // echo '<pre>';var_dump(preg_match("/^\d*[-]\d*[-]\d*[-]\w[-]\w\s[(]\d*V\s[-]\s\d*Ah[)]/", "TROJAN 4"));echo  '</pre>';exit();
    $entity->save();
    
    //ASOCIACION DE BATERIAS
    $sucursales = explode(',', $loggedInUser->sucursales);
    $baterias = BateriasQuery::create()->filterByIdsucursal($sucursales)->withColumn("CONCAT(baterias_c,'-',baterias_k,'-',baterias_p,'-',baterias_t,'-',baterias_e,' (',baterias_volts,'V - ',baterias_amperaje,'Ah)')","baterias_tipo")->find()->toArray(null,false,BasePeer::TYPE_FIELDNAME);
    foreach ($post_data['baterias'] as $bateria){
         $filter_column = 'baterias_modelo';
        if(preg_match("/^\d*[-]\d*[-]\d*[-]\w[-]\w\s[(]\d*V\s[-]\s\d*Ah[)]/", $bateria)){
            $filter_column = 'baterias_tipo';
        }
        foreach ($baterias as $value){
            
            if($value[$filter_column] == $bateria){
                $montacargas_baterias = new MontacargasBaterias();
                $montacargas_baterias->setIdbaterias($value['idbaterias'])
                             ->setIdmontacargas($entity->getIdmontacargas())
                             ->save();
               
            }
        }
    }
    
    $message = 'El Registro se ha guardado satisfactoriamente!';
    
}

$nombrePagina="Alta Montacargas";
$acciones=[];
$sucursales = explode(',', $loggedInUser->sucursales);
$sucursales_array = SucursalQuery::create()->filterByIdempresa($loggedInUser->idempresa)->find();
$montacargas_nombre = (int)MontacargasQuery::create()->filterByIdsucursal($sucursales)->select(array('idmontacargas'))->orderByIdmontacargas(Criteria::DESC)->findOne();
$montacargas_nombre = sprintf("M%03d", $montacargas_nombre+1);

$baterias_modelos = BateriasQuery::create()->withColumn('baterias_modelo')->withColumn("CONCAT(baterias_c,'-',baterias_k,'-',baterias_p,'-',baterias_t,'-',baterias_e,' (',baterias_volts,'V - ',baterias_amperaje,'Ah)')","tipo")->select(array('tipo'))->filterByIdsucursal($sucursales)->groupBy('tipo')->find();


?>
<?php if($message) :?>
    <div class="row">
        <div class="alert alert-success">
        <strong>Exito!</strong>
        <?php echo $message ?>
        </div>
    </div>
<?php endif;?>
<div ng-controller="MontacargasController">
    <form method="POST" action="/sistema.php?ruta=alta/montacargas" name="MontacargasForm">
    <div class="row">
        <div class="col-sm-6">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                       <i class="icon-montacarga" style="font-size: 25px; color: rgb(226, 106, 106); margin-top: -3px;"></i>
                        <span class="caption-subject bold uppercase"> Información general</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-icon right">
                                <label>Nombre</label>
                                <i class="fa fa-check " style="top: 0px; margin-top: 35px; color: green"></i>
                                <i class="fa fa-close " style="top: 0px; margin-top: 35px; color: red; display: none"></i>
                                <input ng-blur="verificaNombre()"  class="form-control" type="text" value="<?php echo $montacargas_nombre?>" name="montacargas_nombre">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sucursal</label>
                                <select name="idsucursal" class="form-control">
                                    <?php foreach ($sucursales_array as $sucursal) :?>
                                    <option value="<?php echo $sucursal->getIdsucursal()?>"><?php echo $sucursal->getSucursalNombre()?></option>
                                    <?php endforeach;?>
                                </select>
                               
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-sm-12">
                            <div class="form-group">
                                <label>Comprador</label>
                                <input required class="form-control"  type="text" name="montacargas_comprador">
                            </div>
                            </div>
                            <div class="col-sm-12">
                            <div class="form-group">
                                <label>Modelo</label>
                                <input required class="form-control" type="text" name="montacargas_modelo">
                            </div>
                            </div>
                             <div class="col-sm-12">
                            <div class="form-group">
                                <label>Marca</label>
                                <input required class="form-control" type="text" name="montacargas_marca">
                            </div>
                             </div>
                        </div>
                    
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>C</label>
                                <input required class="form-control" type="text" ng-model="montacargas_c" name="montacargas_c" number-mask>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>K</label>
                                <input required class="form-control" type="text" name="montacargas_k"  ng-model="montacargas_k" number-mask >
                            </div>
                         </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>P</label>
                                <input required class="form-control" type="text" name="montacargas_p" ng-model="montacargas_p" number-mask>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>T</label>
                                <input required class="form-control" type="text" name="montacargas_t" ng-model="montacargas_t">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>E</label>
                                <input required class="form-control" type="text" name="montacargas_e" ng-model="montacargas_e">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <button ng-click="recomiendaBaterias()" class="btn btn-primary" type="button" style="margin-top: 20px;"><i class="icon-bateria" style="font-size: 24px"></i></button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                       <i class="icon-bateria" style="font-size: 25px; color: rgb(226, 106, 106); margin-top: -3px;"></i>
                        <span class="caption-subject bold uppercase">Asociación de baterias</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Volts</label>
                                    <input class="form-control" readonly type="text" ng-model="montacargas_volts" name="montacargas_volts">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ampere</label>
                                    <input class="form-control" readonly type="text" name="montacargas_amperaje" ng-model="montacargas_amperaje" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($baterias_modelos as $modelo) :?>
                             
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="mt-checkbox-list">
                                            <?php if(!is_null($modelo['tipo'])) :?>
                                            <label style="display: block" class="mt-checkbox mt-checkbox-outline"> <?php echo $modelo['tipo']?>
                                                <input value="<?php echo $modelo['tipo']?>" name="baterias[]" type="checkbox">
                                                <span></span>
                                            </label>
                                            <?php else:?>
                                                <label style="display: block" class="mt-checkbox mt-checkbox-outline"> <?php echo $modelo['baterias_modelo']?>
                                                    <input value="<?php echo $modelo['baterias_modelo']?>" name="baterias[]" type="checkbox">
                                                    <span></span>
                                                </label>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach;?>
                        </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-sm-12">
                    <hr>
                </div>
                <div class="col-md-offset-10 col-md-2">
                    <button class="btn green" type="submit">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<?php require_once("tema/comun/footer.php"); ?>
