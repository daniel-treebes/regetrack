<?php
   $nombrePagina="Escanear";
   
   require_once("models/config.php");
   if (!securePage($_SERVER['PHP_SELF'])){die();}
   
   require_once("models/header.php");
   
   $queryBateriasEsperando="
	  SELECT bt.num_serie as nombrebt,
		 cg.nombre as nombrecg,
		 if (tiempopcargar IS NULL,'0H 0M',tiempopcargar) as t_pcargar
	  FROM baterias as bt, bodegas as bg, uso_baterias_bodega as tubb, cargadores as cg LEFT JOIN 
		(SELECT
			cg.id as id,
			(if (TIMESTAMPDIFF(second, now(),DATE_ADD(tubb.fecha_carga, INTERVAL 8 HOUR))>0,
			   CONCAT(TIMESTAMPDIFF(hour, now(),DATE_ADD(tubb.fecha_carga, INTERVAL 8 HOUR)),'H ',
				  (TIMESTAMPDIFF(minute, now(),DATE_ADD(tubb.fecha_carga, INTERVAL 8 HOUR))-TIMESTAMPDIFF(hour, now(),DATE_ADD(tubb.fecha_carga, INTERVAL 8 HOUR))*60),'M')
			   ,'0H 0M'))
			   as tiempopcargar
			FROM uso_baterias_bodega as tubb, cargadores as cg, bodegas as bg
			WHERE bg.id=tubb.bg
				AND bg.cg=cg.id
				AND tubb.fecha_carga!='0000-00-00 00:00:00'
				AND tubb.fecha_descanso='0000-00-00 00:00:00'
			GROUP BY id
		) as tu ON tu.id=cg.id 
	  WHERE bt.id=tubb.bt
		 AND bg.id=tubb.bg
		 AND bg.cg=cg.id
		 AND tubb.fecha_carga='0000-00-00 00:00:00'
   ";
	$resultado = $mysqli->query($queryBateriasEsperando);
	$btEsperando=array();
	while($fila = $resultado->fetch_array()) {
		$btEsperando[$fila['nombrebt']]['cg']=$fila['nombrecg'];
		$btEsperando[$fila['nombrebt']]['t']=$fila['t_pcargar'];
	}
	
   $queryBateriasSinLugar="
	  SELECT num_serie as nombrebt
	  FROM baterias
	  WHERE id NOT IN (
			SELECT bt
			FROM uso_baterias_bodega
			WHERE fecha_salida='0000-00-00 00:00:00'
			GROUP BY bt
		 )
		 AND id NOT IN (
			SELECT bt
			FROM uso_baterias_montacargas
			WHERE fecha_salida='0000-00-00 00:00:00'
			GROUP BY bt
		 )
   ";
   $resultado = $mysqli->query($queryBateriasSinLugar);
	$btSinlugar=array();
	while($fila = $resultado->fetch_array()) {
		$btSinlugar[]=$fila['nombrebt'];
	}

   $queryUltimoLugar="
	  SELECT a.nombrebt,
		 a.nombrel as lugar,
		 MAX(a.ufecha) as desde
	  FROM
		 (  SELECT bt.num_serie as nombrebt,
			   'C' as tipol,
			   cg.nombre as nombrel,
			   MAX(u.fecha_salida) as ufecha
			FROM baterias as bt, cargadores as cg, bodegas as bg, uso_baterias_bodega as u
			WHERE bt.id=u.bt
			   AND bg.id=u.bg
			   AND bg.cg=cg.id
			GROUP BY nombrebt
			
			UNION ALL
			
			SELECT bt.num_serie as nombrebt,
			   'M' as tipol,
			   m.nombre as nombrel,
			   MAX(u.fecha_salida) as ufecha
			FROM baterias as bt, montacargas as m, uso_baterias_montacargas as u
			WHERE bt.id=u.bt
			   AND m.id=u.mc
			GROUP BY nombrebt
			
			UNION ALL
			
			SELECT bt.num_serie as nombrebt,
			   'S' as tipol,
			   'SIN REGISTROS' as nombrel,
			   '0000-00-00 00:00:00' as ufecha
			FROM baterias as bt
			GROUP BY nombrebt
		 ) as a,
		(  SELECT num_serie as nombrebt
			FROM baterias
			WHERE id NOT IN (
				  SELECT bt
				  FROM uso_baterias_bodega
				  WHERE fecha_salida='0000-00-00 00:00:00'
				  GROUP BY bt
			   )
			   AND id NOT IN (
				  SELECT bt
				  FROM uso_baterias_montacargas
				  WHERE fecha_salida='0000-00-00 00:00:00'
				  GROUP BY bt
			   )
		) as b
	  WHERE a.nombrebt=b.nombrebt
	  GROUP BY a.nombrebt
	  ORDER BY a.nombrebt		
   ";
   $resultado = $mysqli->query($queryUltimoLugar);
	$btSinlugar=array();
	while($fila = $resultado->fetch_array()) {
		$btSinlugar[$fila['nombrebt']]['lugar']=$fila['lugar'];
		$btSinlugar[$fila['nombrebt']]['desde']=$fila['desde'];
	}



   ?>
<div class="row">
	<div class="col-md-12">
		<?php require_once("tema/comun/topcontenedor.php");?>
		<div class="col-md-6" id="scan">
			<div class="portlet box  blue-sharp">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-task"></i>Escaneo
					</div>
					<div class="tools">
						<a href="" class="collapse" data-original-title="" title=""> </a>
					</div>
				</div>
				<div class="portlet-body form">	   
					<div class="form-actions right1 gray" >
						<div class="col-xs-12 ">
						   <h3><center>Escanea un codigo QR para iniciar</center></h3>
						</div>
						<div class="col-xs-2 ">
						</div>
						<div class="col-xs-8 ">
						   <br>
							<div class="portlet-body form" id="contenedorScaner">
								<div id="mainbody">
									<a id="webcamimg"  align="left" /></a>
									<a id="qrimg"   align="right"/></a>
									<div id="outdiv"></div>
									<div id="result"></div>
									<canvas id="qr-canvas" width="80" height="60"></canvas>
								</div>
								<div class="col-xs-2 ">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6" id="tareasPendientes">
			<div class="portlet box  blue-sharp">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-task"></i>TAREAS PENDIENTES
					</div>
					<div class="tools">
						<a href="" class="collapse" data-original-title="" title=""> </a>
					</div>
				</div>
				<div class="portlet-body form">	   
					<div class="form-actions right1 gray" >
						<?php
						if (count($btSinlugar)>0 || count($btEsperando)>0){
							 if (count($btSinlugar)>0){
								 echo '<div class="col-md-12"><h3 style="color:red;">BATERIAS NO UBICADAS</h3>';
								 foreach ($btSinlugar as $bt  => $datosbt){
									 echo '<h4>Batería <strong>'.$bt.'</strong> fue ubicada el <strong>'.
										 $datosbt['desde'].'</strong> en <strong>'.$datosbt['lugar'].'</strong>.</h4>';
								 }
								 echo '</div>';
							 }
							 if (count($btEsperando)>0){
								 echo '<div class="col-md-12"><h3 style="color:red;">PRÓXIMAS BATERÍAS A CARGAR</h3>';
								 foreach ($btEsperando as $bt => $datosbt){
									 $tiempo=$datosbt['t'];
									 if ($datosbt['t']=='0H 0M') $tiempo='<blink style="color:red;text-decoration: blink;">'.$tiempo.'</blink>';
									 echo '<h4>La batería <strong>'.$bt.'</strong> en cargador <strong>'.$datosbt['cg'].'</strong> le falta <strong>'.
										 $tiempo.'</strong> para poder cargarla.</h4>';
								 }
								 echo '</div>';
							 }
						}else{
							echo '<div class="col-md-12"><h3 style="color:green;">NO HAY TAREAS PENDIENTES</h3></div>';
						}
						?>
					</div>
				</div>
			</div>
		</div>

   </div>
</div>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="libs/jsqrcode-master/src/llqrcode.js"></script>
<script type="text/javascript" src="libs/jsqrcode-master/src/webqrscan.js"></script>
   <?php
   require_once("libs/libreriasJquery.php");
   ?>

<style>
   video#v {
   width: 100%;
   }
   #qr-canvas{
   display:none;
   }
</style>
<script type="text/javascript">
   load();
   window.onload = function() {
     setwebcam();
   };
   
    var secuenciaDePasos=0;
    
    function dameModulo(cadena) {
	  var pos;
	  var pos2;
	  pos=cadena.indexOf("&");
	  pos2=cadena.indexOf("edita/");
	  return cadena.substring(pos2+6, pos);
    }
    
    function dameId(cadena) {
   	var pos;
   	pos=cadena.indexOf("&amp;id=");
   	return cadena.substring(pos+8, cadena.length );
    }
	
	function veAModulo(modulo, id) {
		ruta1="sistema.php?ruta=edita/"
		ruta2="&id="
		url=window.location.href
		rutaactual=url.substring(0, url.lastIndexOf("/") + 1);;
	
		destino=rutaactual+ruta1+modulo+ruta2+id;
		
		window.open(destino,"_self");
	}
    
    
    
</script>
<?php
   require_once("tema/comun/footer.php");
   ?>