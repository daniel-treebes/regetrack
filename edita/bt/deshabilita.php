<?php

?>
<div class="col-md-12 " id="deshabilita" style="display: none">
    <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-exclamation-triangle"></i>Desabilita Batería
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
                <a href="" class="remove" data-original-title="" title=""> </a>
            </div>
        </div>
        <div class="col-xs-12 ">
            <div class="form-group"><br><br><br>
                <label class="col-md-3 control-label">Seleccione el motivo</label>
                <div class="col-md-9">
                    <select class="form-control" id="formaDeshabilita">
                        <option>Mantenimiento</option>
                        <option>Descompostura</option>
                        <option>Otro</option>
                    </select>
                </div>
                <div class="form-group" id="formaEnviaDeshabilitaContenedor">
                    <label class="col-md-3 control-label">Espesifique el motivo: </label>
                    <div class="col-md-9">
                        <textarea class="form-control" id="formaEnviaDeshabilita" rows="3">Mantenimiento</textarea>
                    </div>
                </div>
                <br><br><br><br>
                <div class="btn-group btn-group btn-group-justified">
                    <div class="col-s-12 ">
                        <a href="javascript:deshabilitaEnvia('<?php  echo $_GET['id'] ?>')" class="btn red btn-block" style="height: 110px;"><h2> <i class="fa fa-send"></i></h2><h5>Deshabilitar Batería</h5></a>
                    </div>
                    <div class="col-s-12 ">
                        <a href="/escanear.php" class="btn default btn-block" style="height: 110px;"><h2> <i class="fa fa-arrow-left"></i></h2><h5>Regresar</h5></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>