<?php
    if($siHay>0) $titulo="Desmontar batería <strong>".$nombreBateria."</strong> del montacargas <strong>".$nombreMontacargas."</strong>";
    else $titulo="Montar Batería al montacargas <strong>".$nombreMontacargas."</strong>";
    
    if ($cargadorSiguiente['tipo']=="Bodega"){
        $letrerocargador="a la bodega";
        $letrerosincargar="No olvides mover posteriormente la batería a un cargador.";
    }else{
        $letrerocargador="al cargador";
        $letrerosincargar="El cargador no está disponible para carga.";
    }
?>
<div class="col-md-12 " id="scaneo" style="display: none">
    <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa icon-montacarga"></i> <?php echo $titulo;?>
            </div>
        </div>
        <?php
        if($siHay>0){
            //Si hay batería, Desmonta
            //Aqui ya se validó que hay espacio disponible
            ?>
            <div class="col-xs-12 ">
                <div id="pasos" movimiento="<?php echo $idMovimientoBtaMC;?>"
                                montacargas="<?php echo $_GET['id'];?>"
                                bateria="<?php echo $idBateria;?>"
                                bodega="<?php echo $cargadorSiguiente['bg_id'];?>"
                                cargando=1
                                tipomovimiento="desmonta">
                    <div id="paso1" tipodemodulo="baterias" proximo="<?php echo $idBateria;?>" val="0">
                        <center><h3>PASO 1</h3>
                            <br>
                            <i class="fa fa-battery-full iconscannext"><span class="textoiconnext"><?php  echo $nombreBateria; ?></span></i><br>
                            <br>
                            Escanea la batería montada <?php  echo $nombreBateria ?>
                        </center>
                        <span></span>
                    </div>
                    <div id="paso2" tipodemodulo="cargadores" proximo="<?php echo $cargadorSiguiente['cg_id'];?>" val="0">
                        <center><h3>PASO 2</h3>
                            <br>
                            <i class="my_icons icon-cargador iconscannext"><span class="textoiconnext"><?php  echo $cargadorSiguiente['cg_nombre']; ?></span></i><br>
                            <br>
                            Toma la bateria <?php  echo $nombreBateria ?>, dirijete <?php  echo $letrerocargador.' '.$cargadorSiguiente['cg_nombre']; ?> y escanea el QR.
                        </center>
                        <span></span>
                    </div>
                    <?php
                    if (($cargadorSiguiente['minfd']!='0000-00-00 00:00:00'
                         || $cargadorSiguiente['maxfc']=='0000-00-00 00:00:00')
                         && $cargadorSiguiente['tipo']=='Cargador'){
                        ?>
                        <div id="paso3" tipodemodulo="baterias" proximo="<?php  echo $idBateria;?>" val="0">
                            <center><h3>PASO 3</h3>
                                <br>
                                <i class="fa fa-battery-full iconscannext"><span class="textoiconnext"><?php  echo $nombreBateria ?></span></i><br>
                                <br>
                                Conecta la batería <?php  echo $nombreBateria ?> para cargar y escaneala una vez conectada
                            </center>
                            <span></span>
                        </div>
                        <?php
                    }else{
                        ?>
                        <div id="paso3" tipodemodulo="baterias" proximo="0" val="0">
                            <center><h3>PASO 3</h3><?php echo $letrerosincargar;?></center><span></span>
                            <br>
                            <div class="col-s-12 ">
                                <a onclick="desmontasincarga();" class="btn default btn-block" style="height: 110px;"><h2> <i class="fa fa-arrow-left"></i></h2><h5>CONFIRMAR FIN DE DESMONTADO</h5></a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }else{
            //Si NO hay batería, Monta
            //Aquí ya se valido que hay batería dsponible
            ?>
            <div class="col-xs-12 ">
                <div id="pasos" movimiento="<?php echo $bateriaSiguiente['movimientoid'];?>"
                                montacargas="<?php echo $_GET['id'];?>"
                                bateria="<?php echo $bateriaSiguiente['bt_id'];?>"
                                bodega="<?php echo $bateriaSiguiente['bg_id'];?>"
                                estadobat="<?php echo $bateriaSiguiente['estado'];?>"
                                tipomovimiento="monta">
                    <div id="paso1" tipodemodulo="cargadores" proximo="<?php echo $bateriaSiguiente['cg_id'];?>" val="0">
                        <center><h3>PASO 1</h3>
                            <br>
                            <i class="my_icons icon-cargador iconscannext"><span class="textoiconnext"><?php  echo $bateriaSiguiente['cg_nombre'] ?></span></i><br>
                            <br>
                            Dirígete <?php echo $letrerocargador;?> <strong><?php  echo $bateriaSiguiente['cg_nombre']?></strong> y escanéa el QR.
                        </center>
                        <span></span>
                    </div>
                    <div id="paso2" tipodemodulo="baterias" proximo="<?php echo $bateriaSiguiente['bt_id'];?>" val="0">
                        <center><h3>PASO 2</h3>
                            <br>
                            <i class="fa fa-battery-full iconscannext"><span class="textoiconnext"><?php echo $bateriaSiguiente['bt_nombre']; ?></span></i><br>
                            <br>
                            Ubica la bateria <strong><?php echo $bateriaSiguiente['bt_nombre']; ?></strong> y escanéala.
                        </center>
                        <span></span>
                    </div>
                    <div id="paso3" tipodemodulo="montacargas" proximo="<?php echo $_GET['id'];?>" val="0">
                        <center><h3>PASO 3</h3>
                            <br>
                            <i class="my_icons icon-montacarga iconscannext"><span class="textoiconnext"><?php  echo $nombreMontacargas; ?></span></i><br>
                            <br>
                            Monta la Batería <strong><?php echo $bateriaSiguiente['bt_nombre']; ?></strong> y escanea de nuevo el montacargas <?php  echo $nombreMontacargas ?>.
                        </center>
                        <span></span>
                    </div>
                </div>
            </div>
            <?php
           
        }
        ?>
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
</div>