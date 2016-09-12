<?php
  $query="
   SELECT
   	id as Id,
   	nombre as Nombre,
   	modelo as Modelo,
   	tipo as Tipo,
   	'Proximamente' as 'Estado Actual',
   	'Proximamente' as 'Proximo Cambio',
   	'Proximamente' as 'Salud de baterias'
   FROM
   	montacargas
   WHERE
   id= ".$_GET['id']."
   limit 1
   ";
   

   
   $resultado = $mysqli->query($query);
   while($fila = $resultado->fetch_array()) {
   				$id= $fila['Id'];
   				$nombre= $fila['Nombre'];
   				$modelo= $fila['Modelo'];
   				$tipo= $fila['Tipo'];
   				
   }


?>

<div class="col-md-6" id="indicadores">
   <div class="portlet box  blue-sharp">
      <div class="portlet-title">
         <div class="caption">
            <i class="fa fa-sitemap"></i>Espacio <strong><?php  echo $_GET['id'] ?> </strong>
         </div>
         <div class="tools">
            <a href="" class="collapse" data-original-title="" title=""> </a>
            <a href="" class="remove" data-original-title="" title=""> </a>
         </div>
      </div>
      <div class="portlet-body form">
         <form class="form-horizontal" role="form">
            <div class="form-body">
              
               <div class="form-group">
                  <label class="col-md-3 control-label">Nombre</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" placeholder="Default Input" value="<?php  echo $nombre ?> "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3 control-label">Modelo</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" placeholder="Default Input" value="<?php  echo $modelo ?> "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3 control-label">Tipo</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" placeholder="Default Input" value="<?php  $tipo; ?> ">
                  </div>
               </div>
			   
   </div>
		 </form>
		 </div>
	  </div>
	</div>	