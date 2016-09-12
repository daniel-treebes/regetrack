<?php

$nombrePagina="Baterias";
$acciones=[];
$acciones[0][0]="Nuevo";
$acciones[0][1]="accionAñadir";
$acciones[1][0]="Exportar";
$acciones[1][1]="javascript:exporta();";
$acciones[2][0]="Importar";
$acciones[2][1]='javascript:importa();';




require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

require_once("models/header.php");
$query="
SELECT
	id as 'Id',
	nombre as 'Nombre'
FROM
	bodegas
";


$resultado = $mysqli->query($query);	

?>
<input id="sortpicture" type="file" name="sortpic" style="display: none"; />
    <script>
$( "#sortpicture" ).change(function() {
   importa2();
});

	
function importa(){
    $("#sortpicture").trigger('click');		
}
function exporta(){
		   url=location.href.substring(0, location.href.lastIndexOf("/")+1)
		   window.open(url+'exportaciones/ebodegas.php','_blank');
}

	
function importa2(){
		   var file_data = $('#sortpicture').prop('files')[0];   
			var form_data = new FormData();                  
			form_data.append('file', file_data);                         
			$.ajax({
						url: 'importaciones/ibodegas.php', // point to server-side PHP script 
						dataType: 'text',  // what to expect back from the PHP script, if anything
						cache: false,
						contentType: false,
						processData: false,
						data: form_data,                         
						type: 'post',
						success: function(php_script_response){
							location.reload(); // display response from the PHP script, if any
						},
						  error: function(XMLHttpRequest, textStatus, errorThrown) {
							alert(XMLHttpRequest);
						 }
						
			 });
}

function deshabilita(cual) {
	alert()
}
		
	</script>   

        <div class="row">
            <div class="col-md-12">
              <?php require_once("tema/comun/topcontenedor.php");?>

	<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th>ID</th>
				<th>Nombre</th>
		        <th></th>
            </tr>
        </thead>
       
        <tbody>
			 <?php 
			 while($fila = $resultado->fetch_array()) {
				echo "<tr>";
				echo "<th>".$fila['Id']."</th>";
				echo "<th>".$fila['Nombre']."</th>";
				$herramientas="<button type='button' class='btn green' onclick='window.location.href=\"edita/bodegas.php&id=".$fila['Id']."\"'><i class='fa fa-cogs'></i> </button>";
				$herramientas.="<button type='button' class='btn red' onclick='window.location.href=\"edita/bodegas.php&id=".$fila['Id']."\"'><i class='fa fa-trash'></i> </button>";
				
				
				echo "<th>".$herramientas."</th>";
				
				echo "</tr>";
			  }
			  
			 ?>
             
				
            
            <?php  ?>
        </tbody>
    </table>


            </div>
        </div>
		<!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
		<script>
		   $(document).ready(function() {
    $('#example').DataTable( {
        
    } );
 } );
			
		</script>



<?php
require_once("tema/comun/footer.php");
?>
