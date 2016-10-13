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
   b.idbaterias as 'Id',
   b.baterias_nombre as 'Nombre',
   b.baterias_modelo as 'Modelo',
   b.baterias_marca as 'Marca',
   CONCAT(b.baterias_c,'-',b.baterias_k,'-',b.baterias_p,'-',b.baterias_t,'-',b.baterias_e,' (',b.baterias_volts,'V - ',b.baterias_amperaje,'Ah)') as Tipo,
   b.baterias_ciclosiniciales,
   b.baterias_ciclosmant
FROM
   baterias as b
WHERE b.idsucursal = ".$loggedInUser->sucursal_activa."
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
		   url=location.href.substring(0, location.href.lastIndexOf("/")+1);
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
	</script>   
        <style>
            
        </style>
        <script src="assets/global/scripts/app.min.js"></script>
	<script type="text/javascript">
    $(document).ready(function() {
        'use strict';
        var oTable =$('#tablabaterias').dataTable( {
            "bStateSave": false,
            "sScrollY": "510px",
            "iDisplayLength": 25,
            "bPaginate": false,
            "aaSorting": [[0, 'asc']],
            "oLanguage": {
                "sUrl": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json",
            },
        } );
        
        oTable.yadcf([
            {column_number : 0,filter_type: "multi_select",select_type: 'chosen',filter_container_id: 'filter_0'},
            {column_number : 1,filter_type: "multi_select",select_type: 'chosen',filter_container_id: 'filter_1'},
            {column_number : 2,filter_type: "multi_select",select_type: 'chosen',filter_container_id: 'filter_2'},
            {column_number : 3,filter_type: "multi_select",select_type: 'chosen',filter_container_id: 'filter_3'},
            {column_number : 5,filter_type: "multi_select",select_type: 'chosen',filter_container_id: 'filter_5'},
            {column_number : 7,filter_type: "multi_select",select_type: 'chosen',filter_container_id: 'filter_7'},
            
        ]);
        
        $('a.collapse').trigger('click');
        
    } );
	</script>
        
        <div class="row">
            <div class="col-md-12">
              <?php require_once("tema/comun/topcontenedor.php");?>
         
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box  blue-sharp">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-filter"></i>Filtros
                         </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        </div>
                    </div>
                    <div class="portlet-body ">
                        <div class="row">
                            <div class="col-sm-3" id="filter_0" style="margin-left: 15px;">
                                <label>Nombre</label>
                            </div>
                            <div class="col-sm-3" id="filter_1"  style="margin-left: 15px;">
                                <label>Modelo</label>
                            </div>
                            <div class="col-sm-3" id="filter_2" style="margin-left: 15px;">
                                <label>Marca</label>
                            </div>
                            <div class="col-sm-3" id="filter_3" style="margin-left:15px;">
                                <label>Tipo</label>
                            </div>
                            <div class="col-sm-3" id="filter_5" style="margin-left: 15px;">
                                <label>Estado</label>
                            </div>
                            <div class="col-sm-3" id="filter_7" style="margin-left: 15px;">
                                <label>Estatus</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
	<table id="tablabaterias" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
					<th>Nombre</th>
					<th>Modelo</th>
					<th>Marca</th>
					<th>Tipo</th>
					<th>Dónde está</th>
					<th>Estado</th>
					<th>Tiempo</th>
					<th>Estatus</th>
					<th>Opciones</th>
            </tr>
        </thead>
       
        <tbody>
			 <?php
		$tiposbateria=array();
		while($fila = $resultado->fetch_array()) {
			$tipobn=str_replace(' ','_',$fila['Tipo']);
			$tipobn=str_replace('(','',$tipobn);
			$tipobn=str_replace(')','',$tipobn);
			$tiposbateria[$tipobn]=$fila['Tipo'];
			echo "<tr>";
			echo "<td>".$fila['Nombre']."</td>";
						  echo "<td>".$fila['Modelo']."</td>";
							echo "<td>".$fila['Marca']."</td>";
			echo "<td>".$fila['Tipo']."</tdDA>";
							 
			$querydonde="
			  SELECT  u.id, u.bg, u.bt, c.cargadores_nombre as bg_nombre, c.cargadores_tipo as ctipo,
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
				  IF (IF(fecha_original='0000-00-00 00:00:00',
						  IF(TIMESTAMPDIFF(hour, fecha_descanso, now())<8,true,false),
						  IF(TIMESTAMPDIFF(hour, fecha_original, now())<8,true,false)),
					  CONCAT(
						  TIMESTAMPDIFF(day, fecha_descanso, now()),'D ',    
						  TIMESTAMPDIFF(hour, fecha_descanso, now())-TIMESTAMPDIFF(day, fecha_descanso, now())*24,'H  ',
						  TIMESTAMPDIFF(minute, fecha_descanso, now())-(TIMESTAMPDIFF(hour, fecha_descanso, now()))*60,'M'),
					  IF (fecha_original='0000-00-00 00:00:00',
						  8,
						  IF(TIMESTAMPDIFF(hour, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))<8,
							  8,
							  CONCAT(
								  TIMESTAMPDIFF(day, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR)),'D ',    
								  TIMESTAMPDIFF(hour, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))-TIMESTAMPDIFF(day, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))*24,'H  ',
								  TIMESTAMPDIFF(minute, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))-(TIMESTAMPDIFF(hour, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR)))*60,'M')
						  )
					  )
				  ) as 'descanso',
				  IF (IF(fecha_original='0000-00-00 00:00:00',
						  IF(TIMESTAMPDIFF(hour, fecha_descanso, now())<8,true,false),
						  IF(TIMESTAMPDIFF(hour, fecha_original, now())<8,true,false)),
					  0,
					  IF (fecha_original='0000-00-00 00:00:00',
						  CONCAT(
							  TIMESTAMPDIFF(day, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), now()),'D ',    
							  TIMESTAMPDIFF(hour, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), now())-TIMESTAMPDIFF(day, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), now())*24,'H  ',
							  TIMESTAMPDIFF(minute, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), now())-(TIMESTAMPDIFF(hour, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), now()))*60,'M'),
						  CONCAT(
							  TIMESTAMPDIFF(day, DATE_ADD(fecha_original, INTERVAL 8 HOUR), now()),'D ',    
							  TIMESTAMPDIFF(hour, DATE_ADD(fecha_original, INTERVAL 8 HOUR), now())-TIMESTAMPDIFF(day, DATE_ADD(fecha_original, INTERVAL 8 HOUR), now())*24,'H  ',
							  TIMESTAMPDIFF(minute, DATE_ADD(fecha_original, INTERVAL 8 HOUR), now())-(TIMESTAMPDIFF(hour, DATE_ADD(fecha_original, INTERVAL 8 HOUR), now()))*60,'M')
					  )
				  ) as 'listo',
				  CONCAT(
					 TIMESTAMPDIFF(day, fecha_salida, now()),'D ',    
					 TIMESTAMPDIFF(hour, fecha_salida, now())-TIMESTAMPDIFF(day, fecha_salida, now())*24,'H  ',
					 TIMESTAMPDIFF(minute, fecha_salida, now())-(TIMESTAMPDIFF(hour, fecha_salida, now()))*60,'M')
				  as 'salida'
			  FROM  uso_baterias_bodega as u, bodegas as b, cargadores as c
			  WHERE
				  bt =".$fila['Id']." AND 
				  b.id=u.bg AND
				  b.cg=c.idcargadores
			  ORDER BY id desc 
			  LIMIT 1
			";
					  
			$resultadodonde = $mysqli->query($querydonde);
			$filadonde = $resultadodonde->fetch_array();
						 
			$querycuantos="
			  SELECT COUNT(*) as c
			  FROM uso_baterias_bodega 
			  JOIN baterias b ON uso_baterias_bodega.bt = b.idbaterias
			  WHERE  b.idsucursal IN (".$loggedInUser->sucursales.") AND bt = '".$filadonde['bt']."'";
						 
						
			$resultadocuantos=$mysqli->query($querycuantos);
			$filacuantos = $resultadocuantos->fetch_array();
						
			  $fila['baterias_ciclosiniciales'] = (!is_null($fila['baterias_ciclosiniciales'])) ? $fila['baterias_ciclosiniciales']:0;
			  $fila['baterias_ciclosmant'] = (!is_null($fila['baterias_ciclosmant'])) ? $fila['baterias_ciclosmant']:1;
						 
			 $ca=$fila['baterias_ciclosiniciales']+$filacuantos['c'];
		  
			 //calculando ciclos para preventivo
			 $todo=$ca/$fila['baterias_ciclosmant'];
			 $entero=floor($ca/$fila['baterias_ciclosmant']);
			 $decimal=$todo-$entero;
			 $cpp=(1-$decimal)*$fila['baterias_ciclosmant'];
			 //calculando ciclos para correctivo
			 //echo "<th>".$cpp."</th>";
			
						  if($filadonde != NULL){
							 if ($filadonde['ctipo']=="Cargador") $iconctipo="icon-cargador";
							 else $iconctipo="fa-th";
							 if(isset($filadonde['salida']) && $filadonde['salida']!=NULL){
									  $querymc="SELECT m.idmontacargas as mc, m.montacargas_nombre as nombre,
													CONCAT(
															 TIMESTAMPDIFF(day, fecha_entrada, now()),'D ',    
															 TIMESTAMPDIFF(hour, fecha_entrada, now())-TIMESTAMPDIFF(day, fecha_entrada, now())*24,'H  ',
															 TIMESTAMPDIFF(minute, fecha_entrada, now())-(TIMESTAMPDIFF(hour, fecha_entrada, now()))*60,'M') 
													as 'entrada'
										  FROM uso_baterias_montacargas as u, montacargas as m
										  WHERE bt=".$filadonde['bt']."
													AND m.idmontacargas=u.mc
													AND fecha_salida='0000-00-00 00:00:00'
										  ORDER BY m.idmontacargas desc
										  LIMIT 1";
									  $resultadomc = $mysqli->query($querymc);
									  $filamc = $resultadomc->fetch_array();
									  $estadomc = 'USO';
									  if (!isset($filamc['nombre'])){
										  $queryultimaubicacion="
													SELECT lugar, fecha_salida
													FROM
															(
																	  SELECT
																		  c.cargadores_nombre as lugar,
																		  MAX(u.fecha_salida) as fecha_salida
																	  FROM uso_baterias_bodega as u, bodegas as b, cargadores as c
																	  WHERE u.fecha_salida!='0000-00-00 00:00:00'
																		  AND u.bt=".$filadonde['bt']."
																		  AND u.bg=b.id
																		  AND b.cg=c.idcargadores
																	  LIMIT 1
  
																	  UNION ALL
  
																	  SELECT
																		  m.montacargas_nombre as lugar,
																		  MAX(u.fecha_salida) as fecha_salida
																	  FROM uso_baterias_montacargas as u, montacargas as m
																	  WHERE u.fecha_salida!='0000-00-00 00:00:00'
																		  AND u.bt=".$filadonde['bt']."
																		  AND u.mc=m.idmontacargas
																	  LIMIT 1
  
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
									  echo "<td>".$filamc['nombre']."</td>";
									  echo "<td style='color:black'>$estadomc</td>";
									  echo "<td>".$filamc['entrada']."</td>";
							  }elseif(isset($filadonde['listo']) && $filadonde['listo']!=NULL){
									  echo "<td><i class='fa ".$iconctipo."'></i> ".$filadonde['bg_nombre']."</td>";
									  echo "<td style='color:green'>LISTO</td>";
									  echo "<td>".$filadonde['listo']."</td>";
							  }elseif(isset($filadonde['descanso']) && $filadonde['descanso']!=NULL){
									  echo "<td><i class='fa ".$iconctipo."'></i> ".$filadonde['bg_nombre']."</td>";
									  echo "<td style='color:blue'>DESCANSO</td>";
									  echo "<td>".$filadonde['descanso']."</td>";
							  }elseif(isset($filadonde['carga']) && $filadonde['carga'] !=NULL){
									  echo "<td><i class='fa ".$iconctipo."'></i> ".$filadonde['bg_nombre']."</td>";
									  echo "<td style='color:orange'>CARGA</th>";
									  echo "<td>".$filadonde['carga']."</td>";				  
							  }elseif(isset($filadonde['entrada']) && $filadonde['entrada'] !=NULL){
									  echo "<td><i class='fa ".$iconctipo."'></i> ".$filadonde['bg_nombre']."</td>";
									  echo "<td style='color:red'>ESPERA</td>";
									  echo "<td>".$filadonde['entrada']."</td>";				  
							  }else{
									  //echo "<th></th>";
									  echo "<td style='color:red'>Sin asignar</td>";
									  echo "<td style='color:red'>N/A</td>";
									  echo "<td style='color:red'>N/A</td>";
							  }
						}else{ //SI NO EXISTE REGISTRO DE LA BATERIA EN LAS BODEGAS (BUSCAMOS EN MONTACARGAS)
							 $querymc="SELECT m.idmontacargas as mc, m.montacargas_nombre as nombre,
											 CONCAT(
													  TIMESTAMPDIFF(day, fecha_entrada, now()),'D ',    
													  TIMESTAMPDIFF(hour, fecha_entrada, now())-TIMESTAMPDIFF(day, fecha_entrada, now())*24,'H  ',
													  TIMESTAMPDIFF(minute, fecha_entrada, now())-(TIMESTAMPDIFF(hour, fecha_entrada, now()))*60,'M') 
											 as 'entrada'
											 FROM uso_baterias_montacargas as u, montacargas as m
											 WHERE bt=".$fila['Id']."
													AND m.idmontacargas=u.mc
													AND fecha_salida='0000-00-00 00:00:00'
										  ORDER BY m.idmontacargas desc
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
																		  c.cargadores_nombre as lugar,
																		  MAX(u.fecha_salida) as fecha_salida
																	  FROM uso_baterias_bodega as u, bodegas as b, cargadores as c
																	  WHERE u.fecha_salida!='0000-00-00 00:00:00'
																		  AND u.bt=".$fila['Id']."
																		 AND u.bg=b.id
																		  AND b.cg=c.idcargadores
  
																	  UNION ALL
  
																	  SELECT
																		  m.montacargas_nombre as lugar,
																		  MAX(u.fecha_salida) as fecha_salida
																	  FROM uso_baterias_montacargas as u, montacargas as m
																	  WHERE u.fecha_salida!='0000-00-00 00:00:00'
																		  AND u.bt=".$fila['Id']."
																		 AND u.mc=m.idmontacargas
  
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
									  echo "<td>".$filamc['nombre']."</td>";
									  echo "<td>$estadomc</td>";
									  echo "<td>".$filamc['entrada']."</td>";
						}
  
			$querystatus="SELECT motivo,
					CONCAT(TIMESTAMPDIFF(day, fecha_entrada, now()),'D ',    
					  TIMESTAMPDIFF(hour, fecha_entrada, now())-TIMESTAMPDIFF(day, fecha_entrada, now())*24,'H  ',
					  TIMESTAMPDIFF(minute, fecha_entrada, now())-(TIMESTAMPDIFF(hour, fecha_entrada, now()))*60,'M')
					as 'tiempo'
				 FROM deshabilitabt
				 WHERE bt=".$fila['Id']."
					AND fecha_salida='0000-00-00 00:00:00'";
						 
			if ($resultadostatus=$mysqli->query($querystatus)){
			  $filastatus = $resultadostatus->fetch_array();
					  
			  if (isset($filastatus['motivo']) ){
					echo '<td style="color:red">Deshabilitado</td>';
			  }else{
					echo '<td style="color:green">Habilitado</td>';
			  }
			}else{
				echo '<td style="color:green">Habilitado</td>';
			}
  
				  
				  $herramientas="<button type='button' class='btn green' onclick='window.location.href=\"sistema.php?ruta=edita/baterias&id=".$fila['Id']."\"'><i class='fa fa-cogs'></i> </button>";
				  $herramientas.="<button type='button' class='btn gray'  onclick='window.open(\"libs/imprimeQR.php?tipo=baterias&id=".$fila['Id']."\")'><i class='fa fa-qrcode'></i> </button>";
				  
				  
				  echo "<td>".$herramientas."</td>";
				  
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
					<?php foreach ($tiposbateria as $tipobn => $tipob){?>
						<div class="portlet-body">
							<div id="reporteBTU_<?php echo $tipobn;?>" ></div>
						</div>
						<div class="portlet-body">
							<div id="reporteBTE_<?php echo $tipobn;?>" ></div>
						</div>
						<div class="portlet-body">
							<div id="reporteBTC_<?php echo $tipobn;?>" ></div>
						</div>
						<div class="portlet-body">
							<div id="reporteBTD_<?php echo $tipobn;?>" ></div>
						</div>
						<div class="portlet-body">
							<div id="reporteBTL_<?php echo $tipobn;?>" ></div>
						</div>
					<?php }?>
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

echo '<pre>';print_r($tiposbateria);echo  '</pre>';

	foreach ($tiposbateria as $tipobn => $tipob){
		$grafica=pinta_grafica('bt','reporteBTU_'.$tipobn,'uso','todo',$tipob);
		echo $grafica;
		$grafica=pinta_grafica('bt','reporteBTE_'.$tipobn,'espera','todo',$tipob);
		echo $grafica;
		$grafica=pinta_grafica('bt','reporteBTC_'.$tipobn,'carga','todo',$tipob);
		echo $grafica;
		$grafica=pinta_grafica('bt','reporteBTD_'.$tipobn,'descanso','todo',$tipob);
		echo $grafica;
		$grafica=pinta_grafica('bt','reporteBTL_'.$tipobn,'listo','todo',$tipob);
		echo $grafica;
	}

require_once("tema/comun/footer.php");
?>
