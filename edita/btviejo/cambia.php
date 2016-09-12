<?php

if (!isset($estado_bateira )) $estado_bateira='';


?>
<div class="col-md-6" id="indicadores">
  <div class="portlet box  blue-sharp">
	<div class="portlet-title">
	  <div class="caption">
	    <i class="fa fa-car"></i>¿Que desea hacer? 
	  </div>
	  <div class="tools">
	    <a href="" class="collapse" data-original-title="" title=""> </a>
	    <a href="" class="remove" data-original-title="" title=""> </a>
	  </div>
	</div>
	<div class="portlet-body form">	   
	  <div class="btn-group btn-group btn-group-justified">
		<div class="col-s-4 ">
		  <?php
		  if ($estado_bateira=="espera") {	
			echo '<a href="javascript:cambiaBateria(\'baterias\',\''.$_GET['id'].'\')" class="btn green-jungle btn-block" style="height: 110px;"><h2><i class="fa fa-battery-empty"></i></h2><h5>Cargar bateria</h3></h5></a>';
		  }elseif ($estado_bateira=="cargando") {	
			echo '<a href="javascript:descansar(\'baterias\',\''.$_GET['id'].'\')" class="btn green-jungle btn-block" style="height: 110px;"><h2><i class="fa fa-battery-empty"></i></h2><h5>Forzar Descanso</h3></h5></a>';
		  }elseif ($estado_bateira=="descanso"){
			echo '<a href="https://regetrack.com/escanear.php" class="btn green-jungle btn-block" style="height: 110px;"><h2><i class="fa fa-battery-empty"></i></h2><h5>Escanear montacargas a usar</h3></h5></a>';
		  }else{
			echo '<a href="javascript:inventario(\'bateria\','.$_GET['id'].')" class="btn yellow btn-block" style="height: 110px;"><h2> <i class="fa fa-link"></i></h2><h5>Inventario</h5></a>';
		  }
		  ?>
		</div>
		<div class="col-s-4 ">
		  <a href="https://regetrack.com/escanear.php" class="btn default btn-block" style="height: 110px;"><h2> <i class="fa fa-arrow-left"></i></h2><h5>Regresar</h5></a>
		</div>
		<div class="col-s-4 ">
		  <a href="javascript:deshabilita('bateria','<?php  echo $_GET['id'] ?>')" class="btn red btn-block" style="height: 110px;"><h2> <i class="fa fa-warning"></i></h2><h5>Deshabilitar Bateria</h5></a>
		</div>
		<?php
		  if ($estado_bateira=="espera" || $estado_bateira=="cargando" || $estado_bateira=="descanso"){
			echo'
			  <div class="col-s-4 ">
				<a href="javascript:inventario(\'bateria\','.$_GET['id'].')" class="btn yellow btn-block" style="height: 110px;"><h2> <i class="fa fa-link"></i></h2><h5>Inventario</h5></a>
			  </div>
			';
		  }
		  ?>
	  </div>
	</div>
  </div>
</div>