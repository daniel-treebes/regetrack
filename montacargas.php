<?php

$nombrePagina="Montacargas";
$acciones=[];
$acciones[0][0]="Exportar";
$acciones[0][1]="javascript:exporta();";
$acciones[1][0]="Importar";
$acciones[1][1]='javascript:importa();';


require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

require_once("models/header.php");
$query="
    SELECT
        m.id as Id,
        m.nombre as Nombre,
        m.modelo as Modelo,
        CONCAT(t.volts,'V - ',t.ah,'Ah') as Tipo
    FROM
        montacargas as m, bateriastipos as t
    WHERE m.tipo = t.id
	ORDER BY Nombre
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
                <th>Nombre</th>
                <th>Modelo</th>
                <th>Tipo</th>
                <th>Total de Ciclos</th>
                <th>Ciclos Restantes</th>
			    <th>Batería</th>
			    <th>Tiempo con/sin batería</th>
				<th>Uso P. Hist.</th>
				<th>Uso P. 7dias</th>
				<th>Status</th>
		        <th></th>
            </tr>
        </thead>
       
        <tbody>
			 <?php 
			 while($fila = $resultado->fetch_array()) {
				echo "<tr>";
			    echo "<th>".$fila['Nombre']."</th>";
				echo "<th>".$fila['Modelo']."</th>";
				echo "<th>".$fila['Tipo']."</th>";

//					 (cictot-IF(COUNT(d.id) IS NULL,0,COUNT(d.id)))/IF(m.ciclos_mant IS NULL OR m.ciclos_mant=0,1,m.ciclos_mant)) AS  'cicres'

			   $qciclos="
				  SELECT COUNT(id) as ciclos
				  FROM uso_baterias_montacargas
				  WHERE mc =".$fila['Id']."
					 AND fecha_salida!='0000-00-00 00:00:00'
			   ";
			   $resC1=$mysqli->query($qciclos);
			   $filaC1 = $resC1->fetch_array();
			   $ciclos = $filaC1['ciclos'];
			   
			   $qcicman="
				  SELECT IF(MAX(fecha_entrada) IS NULL,0,MAX(fecha_entrada)) as ultman
				  FROM deshabilitamc
				  WHERE mc =".$fila['Id']."
					 AND fecha_salida!='0000-00-00 00:00:00'
					 AND motivo='Mantenimiento'
			   ";
			   $resC1=$mysqli->query($qcicman);
			   $filaC1 = $resC1->fetch_array();
			   $ultman = $filaC1['ultman'];

			   $qcicact="
				  SELECT COUNT(id) as cicact
				  FROM uso_baterias_montacargas
				  WHERE mc =".$fila['Id']."
					 AND fecha_salida>'".$ultman."'
			   ";

			   $resC1=$mysqli->query($qcicact);
			   $filaC1 = $resC1->fetch_array();
			   $cicact = $filaC1['cicact'];
			   
			   $qcicmei="SELECT IF(ciclos_iniciales IS NULL,0,ciclos_iniciales) as cicini,
					 IF(ciclos_mant IS NULL OR ciclos_mant=0,1,ciclos_mant) as cicman
				  FROM  montacargas
				  WHERE  id = ".$fila['Id'];
			   $resC1=$mysqli->query($qcicmei);
			   $filaC1 = $resC1->fetch_array();
			   $cicini = $filaC1['cicini'];
			   $cicman = $filaC1['cicman'];
		   
			   if ($ultman==0) $sumaini=$cicini;
			   else $sumaini=0;
		   
			   $cictot = $ciclos;
			   $cicres = $cicman-$cicact-$sumaini;

			   echo "<th>".$cictot."</th>";

			   echo "<th>".$cicres."</th>";
				
				$saludBateriaActualValor = mt_rand(1, 100);
				
				$querybateria="
				  SELECT b.num_serie as 'bateria', CONCAT(TIMESTAMPDIFF(day, fecha_entrada, now()),'D ',    
					 TIMESTAMPDIFF(hour, fecha_entrada, now())-TIMESTAMPDIFF(day, fecha_entrada, now())*24,'H  ',
					 TIMESTAMPDIFF(minute, fecha_entrada, now())-(TIMESTAMPDIFF(hour, fecha_entrada, now()))*60,'M')
					 as 'tiempo'
				  FROM uso_baterias_montacargas as u, baterias as b
				  WHERE fecha_salida = '0000-00-00 00:00:00'
					 AND u.bt = b.id
					 AND u.mc =".$fila['Id'];
  
			   $resultadobateria=$mysqli->query($querybateria);
			   $filabateria = $resultadobateria->fetch_array();
			   if (!isset($filabateria['bateria'])) {
				  $filabateria['bateria']='<div style="color:red">Sin Batería</div>';
				  if (!isset($filabateria['tiempo'])) $filabateria['tiempo']='<div style="color:red">Sin registro</div>';
			   }
				echo "<th>".$filabateria['bateria']."</th>";
				echo "<th>".$filabateria['tiempo']."</th>";

				$eficiencia=eficiencia('mc','uso','sindiv',$fila['Id']);
   				echo "<th>".round($eficiencia['promedio'],2)."</th>";
   				echo "<th>".round($eficiencia['7d']['promedio'],2)."</th>";

				
				$querystatus="SELECT motivo,
						CONCAT(TIMESTAMPDIFF(day, fecha_entrada, now()),'D ',    
						   TIMESTAMPDIFF(hour, fecha_entrada, now())-TIMESTAMPDIFF(day, fecha_entrada, now())*24,'H  ',
						   TIMESTAMPDIFF(minute, fecha_entrada, now())-(TIMESTAMPDIFF(hour, fecha_entrada, now()))*60,'M')
						as 'tiempo'
					 FROM deshabilitamc
					 WHERE mc=".$fila['Id']."
						AND fecha_salida='0000-00-00 00:00:00'";
			   if ($resultadostatus=$mysqli->query($querystatus)){
				  $filastatus = $resultadostatus->fetch_array();
						 
				  if (isset($filastatus['motivo']) ){
					   echo '<th style="color:red">'.$filastatus['motivo'].': '.$filastatus['tiempo'].'</th>';
				  }else{
					   echo '<th style="color:green">Habilitado</th>';
				  }
			   }else{
				   echo '<th style="color:green">Habilitado</th>';
			   }

				$herramientas="<button type='button' class='btn green' onclick='window.location.href=\"sistema.php?ruta=edita/montacargas&id=".$fila['Id']."\"'><i class='fa fa-cogs'></i> </button>";
				$herramientas.="<button type='button' class='btn gray'  onclick='window.open(\"libs/imprimeQR.php?tipo=montacargas&id=".$fila['Id']."\")'><i class='fa fa-qrcode'></i> </button>";
				
				
				echo "<th>".$herramientas."</th>";
				echo "</tr>";
			  }
			 ?>
            <?php  ?>
        </tbody>
    </table>
		<div class="row">
		   <div class="col-md-12">
			   <div class="portlet light portlet-fit bordered">
				   <div class="portlet-title">
					   <div class="caption">
						   <span class="caption-subject font-green bold uppercase">Desempeño de montacargas</span>
					   </div>
				   </div>
				   <div class="portlet-body">
					   <div id="reporteMC" ></div>
				   </div>
			   </div>
		   </div>
		</div>
	</div>
</div>
		
<div id="container" style="height: 30px"></div>
		
		<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>

		
<script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

<?php
$grafica=pinta_grafica('mc','reporteMC','uso','todo');
echo $grafica;

require_once("tema/comun/footer.php");
?>
