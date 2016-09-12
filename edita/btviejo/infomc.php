<?php
  $query="
   SELECT
   	b.id as Id,
   	b.num_serie as Serie,
   	t.nombre as Tipo,
   	t.marca as Marca,
   FROM
   	baterias as b, bateriastipos as t
   WHERE
    b.bateria_tipo = t.id AND 
    b.id= ".$_GET['id']."
   limit 1
   ";
   
   $resultado = $mysqli->query($query);
   while($fila = $resultado->fetch_array()) {
   				$id= $fila['Id'];
   				$serie= $fila['Serie'];
   				$tipo= $fila['Tipo'];
   				$marca= $fila['Marca'];
   }


?>

<div class="col-md-6" id="indicadores">
   <div class="portlet box  blue-sharp">
      <div class="portlet-title">
         <div class="caption">
            <i class="fa fa-car"></i>Bateria <strong><?php  echo $_GET['id'] ?> </strong>
         </div>
         <div class="tools">
            <a href="" class="collapse" data-original-title="" title=""> </a>
            <a href="" class="remove" data-original-title="" title=""> </a>
         </div>
      </div>
      <div class="portlet-body form">
         <form class="form-horizontal" role="form">
            <div class="form-body">
               <h3>Datos de la Batería</h3>
               <div class="form-group">
                  <label class="col-md-2 control-label">Serie</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" placeholder="Default Input" value="<?php  echo $serie ?> "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-2 control-label">Tipo</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" placeholder="Default Input" value="<?php  echo $tipo ?> "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-2 control-label">Marca</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" placeholder="Default Input" value="<?php echo $marca; ?> ">
                  </div>
               </div>
<?php
//AQUI VAN LAS GRAFIQUITAS

?>			   
			</div>
		 </form>
		 </div>
	  </div>
	</div>	