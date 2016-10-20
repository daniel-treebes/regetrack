<?php
?>
<div class="col-md-6" id="indicadores4">
    <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa <?php echo $iconocb;?>"></i><?php echo $titulocg.' '.$datosCargador['Nombre']; ?>
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
            </div>
        </div>
        <div class="portlet-body form">	   
            <div class="btn-group btn-group btn-group-justified">
                <div class="col-s-4 ">
                    <a href="/escanear.php" class="btn default btn-block" style="height: 110px;"><h2> <i class="fa fa-arrow-left"></i></h2><h5>Regresar</h5></a>
                </div>
                <?php if ($datosCargador['ctipo']=='Cargador'){ ?>
                <div class="col-s-4 ">
                    <a href="javascript:deshabilita('cargadores','<?php  echo $_GET['id'] ?>')" class="btn red btn-block" style="height: 110px;"><h2> <i class="fa fa-warning"></i></h2><h5>Deshabilitar</h5></a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
