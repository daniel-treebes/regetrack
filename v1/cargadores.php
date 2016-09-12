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
	nombre as 'Nombre',
	tipo as 'Tipo'
FROM
	cargadores
";



$query1="
SELECT
	id as 'Id',
	nombre as 'NombreBateria',
	marca as 'Marca',
    celdas as 'Celdas',
    factor_k as 'FactorK',
    placas as 'Placas',
    volts as 'Volts',
    ah as 'AH',
    vida_util as 'VidaUtil',
    regeneracion_preventiva as 'RegeneracionPreventiva',
    regeneracion_correctiva as 'RegeneracionCorrectiva'
FROM
	bateriastipos
";

$resultado = $mysqli->query($query);

$resultado1 = $mysqli->query($query1);	

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
		   window.open(url+'exportaciones/ecargadores.php','_blank');
}

	
function importa2(){
		   var file_data = $('#sortpicture').prop('files')[0];   
			var form_data = new FormData();                  
			form_data.append('file', file_data);                         
			$.ajax({
						url: 'importaciones/icargadores.php', // point to server-side PHP script 
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
				<th>Nombre Batería</th>
                <th>Marca</th>
				<th>Celdas</th>
                <th>Factor K</th>
                <th>Placas</th>
		        <th>Volts</th>
                <th>AH</th>
                <th>Vida Útil</th>
                <th>Regeneración Preventiva</th>
                <th>Regeneración Correctiva</th>
                <th></th>
            </tr>
        </thead>
       
        <tbody>
			 <?php 
			 while($fila = $resultado->fetch_array()) {
				echo "<tr>";
				echo "<th>".$fila['Id']."</th>";
				echo "<th>".$fila['Nombre']."</th>";
                $fila2 = $resultado1->fetch_array();
				echo "<th>".$fila2['NombreBateria']."</th>";
				echo "<th>".$fila2['Marca']."</th>";
				echo "<th>".$fila2['Celdas']."</th>";
				echo "<th>".$fila2['FactorK']."</th>";
				echo "<th>".$fila2['Placas']."</th>";
                echo "<th>".$fila2['Volts']."</th>";
                echo "<th>".$fila2['AH']."</th>";
                echo "<th>".$fila2['VidaUtil']."</th>";
                echo "<th>".$fila2['RegeneracionPreventiva']."</th>";
                echo "<th>".$fila2['RegeneracionCorrectiva']."</th>";
				$herramientas="<button type='button' class='btn green' onclick='window.location.href=\"edita/cargadores.php&id=".$fila['Id']."\"'><i class='fa fa-cogs'></i> </button>";
				$herramientas.="<button type='button' class='btn red' onclick='window.location.href=\"edita/cargadores.php&id=".$fila['Id']."\"'><i class='fa fa-trash'></i> </button>";
				
				
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
