<?php




?>
 <div class="col-md-6" id="indicadores">
   <div class="portlet box  blue-sharp">
      <div class="portlet-title">
         <div class="caption">
            <i class="fa fa-sitemap"></i>¿Que desea hacer? <strong> <?php  echo $idBateria ?> </strong>
         </div>
         <div class="tools">
            <a href="" class="collapse" data-original-title="" title=""> </a>
            <a href="" class="remove" data-original-title="" title=""> </a>
         </div>
      </div>
      <div class="portlet-body form">	   

		 
		 <div class="btn-group btn-group btn-group-justified">
							<div class="col-s-4 ">
                           <a href="https://regetrack.com/escanear.php" class="btn default btn-block" style="height: 110px;"><h2> <i class="fa fa-arrow-left"></i></h2><h5>Regresar</h5></a>
						   </div>
							<div class="col-s-4 ">
                           <a href="javascript:deshabilita('bodega','<?php  echo $_GET['id'] ?>')" class="btn red btn-block" style="height: 110px;"><h2> <i class="fa fa-warning"></i></h2><h5>Deshabilitar Montacargas</h5></a>
						   </div>
							
				 </div>
   </div>
 </div>
   </div>