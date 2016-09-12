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
				<div id="paso1" tipodemodulo="montacargas" proximo="<?php  echo $_GET['id'] ?>" val="0" ><center><h3>PASO 1</h3>Escanea el montacargas <?php  echo $_GET['id'] ?> </center><span></span></div>
				<div id="paso2" tipodemodulo="baterias" proximo="<?php  echo $idBateria ?>" val="0" movimiento="<?php echo $idMovimientoBtaMC; ?>"><center><h3>PASO 2</h3> Escanea la bateria <?php  echo $idBateria ?> del montacargas <?php  echo $_GET['id'] ?></center><span></span></div>
			    <div id="paso3" tipodemodulo="bodegas" proximo="<?php  echo $bodegaDisponible ?>" val="0"><center><h3>PASO 3</h3>Toma la bateria <?php  echo $idBateria ?> y dirijete a la bodega <?php  echo $bodegaDisponible ?> y escaneala </center><span></span></div>
				<div id="paso4" tipodemodulo="baterias" proximo="<?php  echo $idBateria ?>" val="0"  movimiento="<?php echo $idMovimientoBateriaDescansada; ?>"><center><h3>PASO 4</h3>Coloca la bateria <?php  echo $idBateria ?> en la bodega <?php  echo $bodegaDisponible ?> y escanea la bateria <?php  echo $idBateria ?> nuevamente </center><span></span></div>
				<div id="paso5" tipodemodulo="bodegas" proximo="<?php  echo $bodegaBateriaDescansada ?>" val="0"><center><h3>PASO 5</h3> Dirijete a la bodega <?php  echo $bodegaBateriaDescansada ?> y escaneala</center><span></span></div>
				<div id="paso6" tipodemodulo="baterias" proximo="<?php  echo $bateriaDisponible ?>" val="0"><center><h3>PASO 6</h3> Escanea la bateria <?php  echo $bateriaDisponible ?> de la bodega <?php  echo $bodegaBateriaDescansada ?></center></span></span></div>
				<div id="paso7" tipodemodulo="montacargas" proximo="<?php  echo $_GET['id'] ?>" val="0"><center><h3>PASO 7</h3> Toma la bateria <?php  echo $bateriaDisponible ?>, llevala al montacargas <?php  echo $_GET['id'] ?> y escanealo </center><span></span></div>
				<div id="paso8" tipodemodulo="baterias" proximo="<?php  echo $bateriaDisponible ?>" val="0"><center><h3>PASO 8</h3>Escanea la bateria <?php  echo $bateriaDisponible ?> que fue colocada </center><span></span></div>
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