<div class="col-md-12 " id="scaneo" style="display: none">
    <?php
    if(($estado=="ESPERA" && $ctipo=='Cargador')
       ||($estado=="ESPERA" && $ctipo=='Bodega' && isset($cargadorSiguiente['cg_id']))
       ||(($estado=="DESCANSO"||$estado=="LISTO") && $ctipo=='Cargador' && isset($cargadorSiguiente['cg_id']))){
        if($estado=="ESPERA" && $ctipo=='Cargador'){
            $titulo="Cargar Batería <strong>".$nombreBateria."</strong> en cargador <strong>".$ubicacion."</strong>";
            $paso1="Escanea el cargador <strong>".$ubicacion."</strong> y conectalo a la batería <strong>".$nombreBateria."</strong>";
            $paso2="Escanea de nuevo la bateria <strong>".$nombreBateria."</strong> para confirmar que está conectada e iniciar el tiempo de carga.";
            $lugarsiguiente=$ubicacion;
            $idsiguiente=$cargadorid;
            $tipomovimiento="carga";
            $classicono="fa icon-cargador";
        }elseif($estado=="ESPERA" && $ctipo=='Bodega' && isset($cargadorSiguiente['cg_id'])){
            $titulo="Mover Batería <strong>".$nombreBateria."</strong> al cargador <strong>".$cargadorSiguiente['cg_nombre']."</strong>";
            $paso1="Lleva la batería <strong>".$nombreBateria."</strong> al cargador <strong>".$cargadorSiguiente['cg_nombre']."</strong> y escanea el QR del cargador.";
            $paso2="Escanea de nuevo la bateria <strong>".$nombreBateria."</strong> para confirmar que está ya en el cargador.";
            $lugarsiguiente=$cargadorSiguiente['cg_nombre'];
            $idsiguiente=$cargadorSiguiente['cg_id'];
            $tipomovimiento="espcargador";
            $classicono="fa icon-cargador";
        }elseif(($estado=="DESCANSO"||$estado=="LISTO") && $ctipo=='Cargador' && isset($cargadorSiguiente['cg_id'])){
            $titulo="Mover Batería <strong>".$nombreBateria."</strong> a la bodega <strong>".$cargadorSiguiente['cg_nombre']."</strong>";
            $paso1="Lleva la batería <strong>".$nombreBateria."</strong> a la bodega <strong>".$cargadorSiguiente['cg_nombre']."</strong> y escanea el QR de la bodega.";
            $paso2="Escanea de nuevo la bateria <strong>".$nombreBateria."</strong> para confirmar que está ya en la bodega.";
            $lugarsiguiente=$cargadorSiguiente['cg_nombre'];
            $idsiguiente=$cargadorSiguiente['cg_id'];
            $tipomovimiento="descbodega";
            $classicono="fa fa-th";
        }
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
                                espacio="<?php echo $cargadorSiguiente['bg_id'];?>"
                                tipomovimiento="<?php echo $tipomovimiento;?>">
                    <div id="paso1" tipodemodulo="cargadores" proximo="<?php echo $idsiguiente;?>" val="0">
                        <center><h3>PASO 1</h3>
                            <br>
                            <i class="<?php echo $classicono;?> iconscannext"><span class="textoiconnext"><?php  echo $lugarsiguiente; ?></span></i><br>
                            <br>
                            <?php  echo $paso1; ?>
                        </center>
                        <span></span>
                    </div>
                    <div id="paso2" tipodemodulo="baterias" proximo="<?php echo $_GET['id'];?>" val="0">
                        <center><h3>PASO 2</h3>
                            <br>
                            <i class="fa fa-battery-full iconscannext"><span class="textoiconnext"><?php  echo $nombreBateria;?></span></i><br>
                            <br>
                            <?php  echo $paso2; ?>
                        </center>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    $titulo="Forzar ubicación y estado de la bartería <strong>".$datosBateria['Nombre']."</strong>";
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
                        Escanea el cargador o montacargas donde se encuentra la batería <?php  echo $datosBateria['Nombre'] ?>
                    </center>
                    <span></span>
                </div>
                <div id="paso2I" tipodemodulo="espera" val="0" >
                    <!--Este paso solo aparecerá si está en cargador-->
                    <center><h3>PASO 2</h3>
                        <br>
                        Elige el estatus de la Batería <?php  echo $datosBateria['Nombre'] ?>
                        <br><br>
                        <div class="col-md-4" >
                            <span onclick="cambiaestado('ESPERA');" class="btn default btn-block" style="height:100px;background-color:red;color:white;"><h2>ESPERA</h2></span>
                        </div>
<!--
                        <div class="col-xs-4" >
                            <span onclick="cambiaestado('CARGA');" class="btn default btn-block" style="height:100px;backgroud-color:orange;"><h2>CARGA</h2></span>
                        </div>
-->
                        <div class="col-md-4" >
                            <span onclick="cambiaestado('DESCANSO');" class="btn default btn-block" style="height:100px;background-color:blue;color:white;"><h2>DESCANSO</h2></span>
                        </div>
                        <div class="col-md-4" >
                            <span onclick="cambiaestado('LISTO');" class="btn default btn-block" style="height:100px;background-color:green;color:white;"><h2>LISTO</h2></span>
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
