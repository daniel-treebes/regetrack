<?php

$nombrePagina="Baterias";
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
   b.id as 'Id',
   b.num_serie as 'Nombre',
   CONCAT(t.volts,'V - ',t.ah,'Ah') as Tipo,
   b.ciclos_iniciales,
   b.ciclos_mant
FROM
   baterias as b, bateriastipos as t
WHERE b.tipo=t.id
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
		   window.open(url+'exportaciones/ebaterias.php','_blank');
}

	
function importa2(){
		   var file_data = $('#sortpicture').prop('files')[0];   
			var form_data = new FormData();                  
			form_data.append('file', file_data);                         
			$.ajax({
						url: 'importaciones/ibaterias.php', // point to server-side PHP script 
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
				<th>Tipo</th>
				<th>Total de Cliclos</th>
                <th>Ciclos Restantes</th>
				<th>Dónde está</th>
				<th>Estado</th>
				<th>Tiempo</th>
                <th>Estatus</th>
		        <th></th>
            </tr>
        </thead>
       
        <tbody>
			 <?php 
	  while($fila = $resultado->fetch_array()) {
		 echo "<tr>";
		 echo "<th>".$fila['Nombre']."</th>";
		 echo "<th>".$fila['Tipo']."</th>";

		 $querydonde="
			SELECT  u.id, u.bg, u.bt, CONCAT(c.nombre,'-',b.nombre) as bg_nombre,
			   CONCAT(
				  TIMESTAMPDIFF(day, fecha_entrada, now()),'D ',    
				  TIMESTAMPDIFF(hour, fecha_entrada, now())-TIMESTAMPDIFF(day, fecha_entrada, now())*24,'H  ',
				  TIMESTAMPDIFF(minute, fecha_entrada, now())-(TIMESTAMPDIFF(hour, fecha_entrada, now()))*60,'M') 
			   as 'entrada',
			   CONCAT(
				  TIMESTAMPDIFF(day, fecha_carga, now()),'D ',    
				  TIMESTAMPDIFF(hour, fecha_carga, now())-TIMESTAMPDIFF(day, fecha_carga, now())*24,'H  ',
				  TIMESTAMPDIFF(minute, fecha_carga, now())-(TIMESTAMPDIFF(hour, fecha_carga, now()))*60,'M') 
			   as 'carga',
			   CONCAT(
				  TIMESTAMPDIFF(day, fecha_descanso, now()),'D ',    
				  TIMESTAMPDIFF(hour, fecha_descanso, now())-TIMESTAMPDIFF(day, fecha_descanso, now())*24,'H  ',
				  TIMESTAMPDIFF(minute, fecha_descanso, now())-(TIMESTAMPDIFF(hour, fecha_descanso, now()))*60,'M')
			   as 'descanso',
			   CONCAT(
				  TIMESTAMPDIFF(day, fecha_salida, now()),'D ',    
				  TIMESTAMPDIFF(hour, fecha_salida, now())-TIMESTAMPDIFF(day, fecha_salida, now())*24,'H  ',
				  TIMESTAMPDIFF(minute, fecha_salida, now())-(TIMESTAMPDIFF(hour, fecha_salida, now()))*60,'M')
			   as 'salida'
			FROM  uso_baterias_bodega as u, bodegas as b, cargadores as c
			WHERE
			   bt =".$fila['Id']." AND 
			   b.id=u.bg AND
			   b.cg=c.id
			ORDER BY id desc 
			LIMIT 1
		 ";
						
		 $resultadodonde = $mysqli->query($querydonde);
		 $filadonde = $resultadodonde->fetch_array();
		 
		 $querycuantos="
			SELECT COUNT(id) as c
			FROM  uso_baterias_bodega 
			WHERE  bt = ".$filadonde['bt'];
		 $resultadocuantos=$mysqli->query($querycuantos);
		 $filacuantos = $resultadocuantos->fetch_array();

		  $ca=$fila['ciclos_iniciales']+$filacuantos['c'];
		  echo "<th>".$ca."</th>";
		  //calculando ciclos para preventivo
		  $todo=$ca/$fila['ciclos_mant'];
		  $entero=floor($ca/$fila['ciclos_mant']);
		  $decimal=$todo-$entero;
		  $cpp=(1-$decimal)*$fila['ciclos_mant'];
		  //calculando ciclos para correctivo
		  echo "<th>".$cpp."</th>";
		 
		 if($filadonde['salida']!=NULL){
			$querymc="SELECT m.id as mc, m.nombre as nombre,
				  CONCAT(
					 TIMESTAMPDIFF(day, fecha_entrada, now()),'D ',    
					 TIMESTAMPDIFF(hour, fecha_entrada, now())-TIMESTAMPDIFF(day, fecha_entrada, now())*24,'H  ',
					 TIMESTAMPDIFF(minute, fecha_entrada, now())-(TIMESTAMPDIFF(hour, fecha_entrada, now()))*60,'M') 
				  as 'entrada'
			   FROM uso_baterias_montacargas as u, montacargas as m
			   WHERE bt=".$filadonde['bt']."
				  AND m.id=u.mc
				  AND fecha_salida='0000-00-00 00:00:00'
			   ORDER BY m.id desc
			   LIMIT 1";
			$resultadomc = $mysqli->query($querymc);
			$filamc = $resultadomc->fetch_array();
			$estadomc = 'En uso';
			if (!isset($filamc['nombre'])){
			   $queryultimaubicacion="
				  SELECT lugar, fecha_salida
				  FROM
					(
						SELECT
						   c.nombre as lugar,
						   MAX(u.fecha_salida) as fecha_salida
						FROM uso_baterias_bodega as u, bodegas as b, cargadores as c
						WHERE u.fecha_salida!='0000-00-00 00:00:00'
						   AND u.bt=".$filadonde['bt']."
						   AND u.bg=b.id
						   AND b.cg=c.id
						
						UNION ALL
						
						SELECT
						   m.nombre as lugar,
						   MAX(u.fecha_salida) as fecha_salida
						FROM uso_baterias_montacargas as u, montacargas as m
						WHERE u.fecha_salida!='0000-00-00 00:00:00'
						   AND u.bt=".$filadonde['bt']."
						   AND u.mc=m.id
						
						UNION ALL
						
						SELECT
						   'SIN REGISTROS' as lugar,
						   '0000-00-00 00:00:00' as fecha_salida
					) as a
				  ORDER BY fecha_salida DESC
				  LIMIT 1
			   ";
      		   $resultadoul = $mysqli->query($queryultimaubicacion);
		 	   $filaul = $resultadoul->fetch_array();

			   $filamc['nombre']='<span style="color:red">ANT.: '.$filaul['lugar'].'</span>';
			   $estadomc = '<span style="color:red">SIN ESTADO</span>';
			   $filamc['entrada'] = '<span style="color:red">'.$filaul['fecha_salida'].'</span>';
			}else{
			   $filamc['nombre']="<i class='fa icon-montacarga'></i> ".$filamc['nombre'];
			}
			echo "<th>".$filamc['nombre']."</th>";
  			echo "<th>$estadomc</th>";
			echo "<th>".$filamc['entrada']."</th>";
		  }elseif($filadonde['descanso']!=NULL){
			echo "<th><i class='fa icon-cargador'></i> ".$filadonde['bg_nombre']."</th>";
			echo "<th>En descanso</th>";
			echo "<th>".$filadonde['descanso']."</th>";
		  }elseif($filadonde['carga']!=NULL){
			echo "<th><i class='fa icon-cargador'></i> ".$filadonde['bg_nombre']."</th>";
			echo "<th>En carga</th>";
			echo "<th>".$filadonde['carga']."</th>";				  
		  }else{
			echo "<th><i class='fa icon-cargador'></i> ".$filadonde['bg_nombre']."</th>";
			echo "<th>En espera</th>";
			echo "<th>".$filadonde['entrada']."</th>";				  
		  }

		 $querystatus="SELECT motivo,
				 CONCAT(TIMESTAMPDIFF(day, fecha_entrada, now()),'D ',    
					TIMESTAMPDIFF(hour, fecha_entrada, now())-TIMESTAMPDIFF(day, fecha_entrada, now())*24,'H  ',
					TIMESTAMPDIFF(minute, fecha_entrada, now())-(TIMESTAMPDIFF(hour, fecha_entrada, now()))*60,'M')
				 as 'tiempo'
			  FROM deshabilitabt
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

				
				$herramientas="<button type='button' class='btn green' onclick='window.location.href=\"sistema.php?ruta=edita/baterias&id=".$fila['Id']."\"'><i class='fa fa-cogs'></i> </button>";
				$herramientas.="<button type='button' class='btn gray'  onclick='window.open(\"libs/imprimeQR.php?tipo=baterias&id=".$fila['Id']."\")'><i class='fa fa-qrcode'></i> </button>";
				
				
				echo "<th>".$herramientas."</th>";
				
				echo "</tr>";
   	  }
			  
?>
        </tbody>
    </table>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet light portlet-fit bordered">
					<div class="portlet-title">
						<div class="caption">
							<span class="caption-subject font-green bold uppercase">Desempeño de baterias</span>
						</div>
					</div>
					<div class="portlet-body">
						<div id="reporteBTC" ></div>
					</div>
					<div class="portlet-body">
						<div id="reporteBTD" ></div>
					</div>
					<div class="portlet-body">
						<div id="reporteBTU" ></div>
					</div>
					<div class="portlet-body">
						<div id="reporteBTE" ></div>
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
        <!-- END PAGE LEVEL PLUGINS -->
<?php

	$grafica=pinta_grafica('bt','reporteBTC','carga');
	echo $grafica;
	$grafica=pinta_grafica('bt','reporteBTD','descanso');
	echo $grafica;
	$grafica=pinta_grafica('bt','reporteBTU','uso');
	echo $grafica;
	$grafica=pinta_grafica('bt','reporteBTE','espera');
	echo $grafica;

require_once("tema/comun/footer.php");
?>
