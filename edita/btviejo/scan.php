<?php

?>
<div class="col-md-6 " id="scaneo">
<div class="portlet box  blue-sharp">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-car"></i>Escaneo <strong><?php  echo $_GET['id'] ?> </strong>
</div>
<div class="tools">
<a href="" class="collapse" data-original-title="" title=""> </a>
<a href="" class="remove" data-original-title="" title=""> </a>
</div>
</div>
<div class="col-xs-12 ">
<div id="pasos" movimientoBTMC="<?php  echo $idMovimientoBtaMC ?>">
<div id="paso1" tipodemodulo="bodega" proximo="<?php  echo $_GET['id'] ?>" val="0" ><center><h3>PASO 1</h3>Escanea la bodega <?php  echo $_GET['id'] ?> </center><span></span></div>
<div id="paso2" tipodemodulo="bateria" proximo="<?php  echo $idBateria ?>" val="0" movimiento="<?php echo $idMovimientoBtaMC; ?>"><center><h3>PASO 2</h3> Escanea la bateria <?php  echo $idBateria ?></center><span></span></div>
<div id="paso3" tipodemodulo="bodega" proximo="<?php  echo $bodegaDisponible ?>" val="0"><center><h3>PASO 3</h3>Escanea la bodega <?php  echo $idBateria ?> y desconecta la bateria <?php  echo $bodegaDisponible ?></center><span></span></div>
<div id="paso4" tipodemodulo="bateria" proximo="<?php  echo $idBateria ?>" val="0"  movimiento="<?php echo $idMovimientoBateriaDescansada; ?>"><center><h3>PASO 4</h3>Conecta la bateria <?php  echo $idBateria ?> al cargador y escanea la bateria <span></span></div>

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


</div>
</div>