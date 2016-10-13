
<?php

$message = false;
if($_POST){
    $post_data = $_POST;
   
    
    $entity = new Baterias();
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

    
    $message = 'El Registro se ha guardado satisfactoriamente!';
  
}

$nombrePagina="Alta Baterias";
$acciones=[];
$sucursales = explode(',', $loggedInUser->sucursales);
$sucursales_array = SucursalQuery::create()->filterByIdempresa($loggedInUser->idempresa)->find();
$baterias_nombre = (int)  BateriasQuery::create()->filterByIdsucursal($sucursales)->select(array('idbaterias'))->orderByIdbaterias(Criteria::DESC)->findOne();
$baterias_nombre = sprintf("B%03d", $baterias_nombre+1);

$baterias_modelos = BateriasQuery::create()->select(array('baterias_modelo'))->filterByIdsucursal($sucursales)->groupByBateriasModelo()->find();

?>
<?php if($message) :?>
    <div class="row">
        <div class="alert alert-success">
        <strong>Exito!</strong>
        <?php echo $message ?>
        </div>
    </div>
<?php endif;?>
<div>
    <form method="POST" action="/sistema.php?ruta=alta/baterias" name="MontacargasForm">
    <div class="row">
        <div class="col-sm-6">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                       <i class="icon-bateria" style="font-size: 25px; color: rgb(226, 106, 106); margin-top: -3px;"></i>
                        <span class="caption-subject bold uppercase"> Información general</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input  class="form-control" readonly type="text" value="<?php echo $baterias_nombre?>" name="baterias_nombre">
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
                                <input required class="form-control"  type="text" name="baterias_comprador">
                            </div>
                            </div>
                            <div class="col-sm-12">
                            <div class="form-group">
                                <label>Modelo</label>
                                <input required class="form-control" type="text" name="baterias_modelo">
                            </div>
                            </div>
                             <div class="col-sm-12">
                            <div class="form-group">
                                <label>Marca</label>
                                <input required class="form-control" type="text" name="baterias_marca">
                            </div>
                             </div>
                        </div>
                    
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-1">
                            <div class="form-group">
                                <label>C</label>
                                <input required class="form-control" type="text" ng-model="baterias_c" name="baterias_c" number-mask>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>K</label>
                                <input required class="form-control" type="text" name="baterias_k"  ng-model="baterias_k" number-mask >
                            </div>
                         </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>P</label>
                                <input required class="form-control" type="text" name="baterias_p" ng-model="baterias_p" number-mask>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>T</label>
                                <input required class="form-control" type="text" name="baterias_t" ng-model="baterias_t">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>E</label>
                                <input required class="form-control" type="text" name="baterias_e" ng-model="baterias_e">
                            </div>
                        </div>
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
