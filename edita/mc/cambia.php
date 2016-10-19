<?php
?>
<div class="col-md-6" id="indicadores4">
    <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa icon-montacarga"></i>Montacargas <?php echo $nombre; ?>
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
            </div>
        </div>
        <div class="portlet-body form">	   
            <div class="btn-group btn-group btn-group-justified">
                <div class="col-s-4 ">
                    <?php
                    if($siHay>0){
                        if (count($cargadorSiguiente)>0){
                            //Aquí no se genera excepción
                            ?>
                            <a href="javascript:cambiaBateria()" class="btn green-jungle btn-block" style="height: 110px;"><h2><i class="fa fa-battery-empty"></i></h2><h5>Desmontar bateria</h5></a>
                            <?php
                        }else{
                            ?>
                            <span class="btn green-jungle btn-block" style="height: 110px;"><h2><i class="fa fa-battery-empty"></i></h2><h5>No hay espacio disponible para desmontar</h5></span>
                            <?php
                        }
                    }else{
                        if (count($bateriaSiguiente)>0){
                            //Poner letrero de excepciones
                            $letrero='Montar bateria';
                            if ($bateriaSiguiente['estado']=="2 descanso"){
                                $letrero='La batería siguiente tiene descansando '.$bateriaSiguiente['t_descanso'].'.'.
                                        '<br>Si la cambia se generará una Alerta por no completar 8hrs. de Descanso';
                            }elseif ($bateriaSiguiente['estado']=="3 carga"){
                                $letrero='La batería siguiente tiene cargándose '.$bateriaSiguiente['t_carga'].'.'.
                                        '<br>Si la cambia se generará una Alerta por no completar 8hrs. de Carga y Descanso.';
                            }
                            ?>
                            <a href="javascript:cambiaBateria()" class="btn green-jungle btn-block" style="height: 110px;"><h2><i class="fa fa-battery-full"></i></h2><h5><?php echo $letrero;?></h5></a>
                            <?php
                        }else{
                            ?>
                            <span class="btn green-jungle btn-block" style="height: 110px;"><h2><i class="fa fa-battery-empty"></i></h2><h5>No hay batería disponible para montar</h5></span>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="col-s-4 ">
                    <a href="/escanear.php" class="btn default btn-block" style="height: 110px;"><h2> <i class="fa fa-arrow-left"></i></h2><h5>Regresar</h5></a>
                </div>
                <div class="col-s-4 ">
                    <a href="javascript:deshabilita('montacargas','<?php  echo $_GET['id'] ?>')" class="btn red btn-block" style="height: 110px;"><h2> <i class="fa fa-warning"></i></h2><h5>Deshabilitar</h5></a>
                </div>
            </div>
        </div>
    </div>
</div>
