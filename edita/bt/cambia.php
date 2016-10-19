<div class="col-md-6" id="indicadores4">
    <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-question-circle"></i> <?php echo $datosBateria['Nombre']; ?> - ¿Que desea hacer? 
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
            </div>
        </div>
        <div class="portlet-body form">	   
            <div class="btn-group btn-group btn-group-justified">
                <div class="col-s-4 ">
                    <?php
                    if($estado=="ESPERA" && $ctipo=='Cargador'){
                        if ($tiempoParaCarga==0){
                            //Aquí no se genera excepción
                            ?>
                            <a href="javascript:cargaBateria()" class="btn green-jungle btn-block" style="height: 110px;"><h2><i class="fa fa-battery-empty"></i></h2><h5>Cargar bateria</h5></a>
                            <?php
                        }else{
                            ?>
                            <span class="btn yellow btn-block" style="height: 110px;"><h2><i class="fa fa-battery-empty"></i></h2>
                                <h5>El cargador esta cargando otra batería,<br>Tiempo estimado de espera: <?php echo $tiempoParaCarga;?></h5>
                            </span>
                            <?php
                        }
                    }
                    if($estado=="ESPERA" && $ctipo=='Bodega' && isset($cargadorSiguiente['cg_id'])){
                        ?>
                        <a href="javascript:cargaBateria()" class="btn green-jungle btn-block" style="height: 110px;"><h2><i class="fa icon-cargador"></i></h2><h5>Mover a Cargador</h5></a>
                        <?php
                    }
                    if(($estado=="DESCANSO"||$estado=="LISTO") && $ctipo=='Cargador' && isset($cargadorSiguiente['cg_id'])){
                        ?>
                        <a href="javascript:cargaBateria()" class="btn green-jungle btn-block" style="height: 110px;"><h2><i class="fa fa-th"></i></h2><h5>Mover a Bodega</h5></a>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-s-4 ">
                    <a href="/escanear.php" class="btn default btn-block" style="height: 110px;"><h2> <i class="fa fa-arrow-left"></i></h2><h5>Regresar</h5></a>
                </div>
                <div class="col-s-4 ">
                    <a href="javascript:inventario();" class="btn yellow btn-block" style="height: 110px;"><h2> <i class="fa fa-warning"></i></h2><h5>Forzar ubicación y/o estado</h5></a>
                </div>
                <div class="col-s-4 ">
                    <a href="javascript:deshabilita('bateria','<?php  echo $_GET['id'] ?>')" class="btn red btn-block" style="height: 110px;"><h2> <i class="fa fa-warning"></i></h2><h5>Deshabilitar Batería</h5></a>
                </div>
            </div>
        </div>
    </div>
</div>
