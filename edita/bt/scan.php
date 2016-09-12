<div class="col-md-12 " id="scaneo" style="display: none">
    <?php
    if($estado=="ESPERA"){
        $titulo="Cargar Batería <strong>".$nombreBateria."</strong> en cargador <strong>".$ubicacion."</strong>";
    ?>
        <div id="divCargar" class="portlet box blue-sharp" style="display:none;">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-battery-full"></i> <?php echo $titulo;?>
                </div>
            </div>
            <div class="col-xs-12 ">
                <div id="pasos" movimiento="<?php echo $idMovimientoBtaCarga;?>"
                                bateria="<?php echo $_GET['id'];?>"
                                tipomovimiento="carga">
                    <div id="paso1" tipodemodulo="cargadores" proximo="<?php echo $cargadorid;?>" val="0">
                        <center><h3>PASO 1</h3>
                            <br>
                            <i class="fa icon-cargador iconscannext"><span class="textoiconnext"><?php  echo $ubicacion; ?></span></i><br>
                            <br>
                            Escanea el cargador <?php  echo $ubicacion ?> y conectalo a la batería <?php  echo $nombreBateria ?>
                        </center>
                        <span></span>
                    </div>
                    <div id="paso2" tipodemodulo="baterias" proximo="<?php echo $_GET['id'];?>" val="0">
                        <center><h3>PASO 2</h3>
                            <br>
                            <i class="fa fa-battery-full iconscannext"><span class="textoiconnext"><?php  echo $nombreBateria;?></span></i><br>
                            <br>
                            Escanea de nuevo la bateria <?php  echo $nombreBateria ?> para confirmar que está conectada e iniciar el tiempo decarga.
                        </center>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    $titulo="Forzar ubicación y estado de la bartería <strong>".$nombreBateria."</strong>";
    ?>
    <div id="divInventario" class="portlet box blue-sharp" style="display:none;">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-battery-full"></i> <?php echo $titulo;?>
            </div>
        </div>
        <div class="col-xs-12 ">
            <div id="pasosI" bateria="<?php echo $_GET['id'];?>"
                            nuevoestado=" "
                            tipomovimiento="Inventario">
                <div id="paso1I" tipodemodulo="cualquiera" proximo="0" val="0" modulonombre="" moduloid="">
                    <center><h3>PASO 1</h3>
                        <br>
                        <i class="fa fa-question-circle iconscannext"></i><i class="fa icon-cargador iconscannext"></i><i class="fa icon-montacarga iconscannext"></i><br>
                        <br>
                        Escanea el cargador o montacargas donde se encuentra la batería <?php  echo $nombreBateria ?>
                    </center>
                    <span></span>
                </div>
                <div id="paso2I" tipodemodulo="espera" val="0" >
                    <!--Este paso solo aparecerá si está en cargador-->
                    <center><h3>PASO 2</h3>
                        <br>
                        Elige el estatus de la Batería <?php  echo $nombreBateria ?>
                        <br><br>
                        <div class="col-xs-6" >
                            <span onclick="cambiaestado('ESPERA');" class="btn default btn-block" style="height:100px;"><h2>ESPERA</h2></span>
                        </div>
<!--
                        <div class="col-xs-4" >
                            <span onclick="cambiaestado('CARGA');" class="btn default btn-block" style="height:100px;"><h2>CARGA</h2></span>
                        </div>
-->
                        <div class="col-xs-6" >
                            <span onclick="cambiaestado('DESCANSO');" class="btn default btn-block" style="height:100px;"><h2>DESCANSO</h2></span>
                        </div>
                    </center>
                    <span></span>
                </div>
                <div id="paso3I" tipodemodulo="baterias" proximo="<?php echo $_GET['id'];?>" val="0">
                    <center><h3>CONFIRMACIÓN</h3>
                        <br>
                        <i class="fa fa-battery-full iconscannext"><span class="textoiconnext"><?php  echo $nombreBateria;?></span></i><br>
                        <br>
                        Escanea de nuevo la batería <?php  echo $nombreBateria ?> para confirmar el movimiento:<br>
                        <span id="datosdelmovimiento"></span>
                    </center>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-3 ">
    </div>
    <div class="col-xs-6 "><br>
        <div class="portlet-body form" id="contenedorScaner">
            <div class="col-xs-3 ">
            </div>				
        </div>
    </div>
    <div class="col-xs-3 ">
    </div>
    <div class="col-xs-12 ">
        <a onclick="cancelacambios();" href="" class="btn default btn-block" style="height: 110px;"><h2> <i class="fa fa-arrow-left"></i></h2><h5>Cancelar</h5></a>
    </div>
</div>
