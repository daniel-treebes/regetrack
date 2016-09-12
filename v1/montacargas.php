<?php

$nombrePagina="Montacargas";
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
	id as Id,
	nombre as Nombre,
	modelo as Modelo,
	tipo as Tipo,
	'Proximamente' as 'Estado Actual',
	'Proximamente' as 'Proximo Cambio',
	'Proximamente' as 'Salud de baterias'
FROM
	montacargas
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
		   window.open(url+'exportaciones/emontacargas.php','_blank');
}

	
function importa2(){
		   var file_data = $('#sortpicture').prop('files')[0];   
			var form_data = new FormData();                  
			form_data.append('file', file_data);                         
			$.ajax({
						url: 'importaciones/imontacargas.php', // point to server-side PHP script 
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
                <th>Modelo</th>
                <th>Tipo</th>
                <th>Proximo Cambio (será calculado)</th>
				<th>Salud Bateria actual (será calculado)</th>
                <th>Salud de baterias (será calculado)</th>
		        <th></th>
            </tr>
        </thead>
       
        <tbody>
			 <?php 
			 while($fila = $resultado->fetch_array()) {
				echo "<tr>";
				echo "<th>".$fila['Id']."</th>";
				echo "<th>".$fila['Nombre']."</th>";
				echo "<th>".$fila['Modelo']."</th>";
				echo "<th>".$fila['Tipo']."</th>";
				
		
				
				
				$proximoCambioBateria = mt_rand(1, 80)/10 ." Hrs";
				
				$alerta = 'success';
				if($proximoCambioBateria>6){
					 $alerta='warning';
				}
				if($proximoCambioBateria>7.5){
					$alerta ='danger';
				}
				echo "<th><span class='label label-sm label-".$alerta."'> ".$proximoCambioBateria." </span></th>";
				
				
				
				
				$saludBateriaActualValor = mt_rand(1, 100);
				
				$alerta = 'success';
				if($saludBateriaActualValor>70){
					 $alerta='warning';
				}
				if($saludBateriaActualValor>90){
					$alerta ='danger';
				}
				
				
				
				
		       $saludBateriaActual='<div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-'.$alerta.'" role="progressbar" aria-valuenow="'.$saludBateriaActualValor.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$saludBateriaActualValor.'%">
                                            <span class="sr-only"> '.$saludBateriaActualValor.' </span>
                                        </div>
                                    </div>';
									
									
				echo "<th>".$saludBateriaActual/*$fila['Estado Actual']*/."</th>";
				
				$estadoBateriasPorcentaje=mt_rand(1, 100);
				$colorEstadoBaterias='succes';
				if($estadoBateriasPorcentaje>70){
					 $colorEstadoBaterias='warning';
				}
				if($estadoBateriasPorcentaje>90){
					$colorEstadoBaterias ='danger';
				}
				  
				$estadoDeBaterias='<div class="progress progress-striped active">
				<div class="progress-bar progress-bar-'.$colorEstadoBaterias.'" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: '.$estadoBateriasPorcentaje.'%">
                                            <span class="sr-only"> '.$estadoBateriasPorcentaje.' </span>
                                 </div>
								 </div>';
				echo "<th>".$estadoDeBaterias/*$fila['Salud de baterias']*/."</th>";
			
				
				$herramientas="<button type='button' class='btn green' onclick='window.location.href=\"sistema.php?ruta=edita/montacargas&id=".$fila['Id']."\"'><i class='fa fa-cogs'></i> </button>";
				$herramientas.="<button type='button' class='btn red' onclick='window.location.href=\"sistema.php?ruta=edita/montacargas&id=".$fila['Id']."\"'><i class='fa fa-trash'></i> </button>";
				
				
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
