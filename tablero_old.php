<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

require_once("models/header.php");
require_once("libs/libreriasJquery.php");





?>
	<script src="rgraph/RGraph.common.core.js" ></script>
	<script src="rgraph/RGraph.meter.js" ></script>
	<link rel="stylesheet" type="text/css" href="rgraph/demos.css">
	</script>   

        <div class="row">
            <div class="col-md-12">
              <?php require_once("tema/comun/topcontenedor.php");?>



   
   <?php   ?>
</div>

			
			<div class="col-md-12 ">



		 

<div class="col-md-12 ">

		 


<?php

$queryTM="
SELECT COUNT( id ) 
FROM  `montacargas`
";
$resultadoTM=$mysqli->query($queryTM);
         $filaTM=$resultadoTM->fetch_array();
         $valor=eficiencia("`uso_baterias_montacargas`","`mc`",$mysqli,"fecha_entrada","fecha_salida");
         $valor=round($valor,2);
         	   
       
         ?>


<div class="row widget-row">
                        <div class="col-xs-4">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading"> Montacargas </h4>
                                <div class="widget-thumb-wrap">
									<div class="col-md-6">	
										<i class="widget-thumb-icon bg-green-jungle icon-montacarga"></i>
										<div class="widget-thumb-body">
											<span class="widget-thumb-subtitle">Activos</span>
											<span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $filaTM[0]; ?>"><?php echo $filaTM[0]; ?></span>
										</div>
									</div>
									<div class="col-md-6 ">
										<i class="widget-thumb-icon bg-red icon-montacarga"></i>
										<div class="widget-thumb-body">
											<span class="widget-thumb-subtitle">Inactivos</span>
											<span class="widget-thumb-body-stat" data-counter="counterup" data-value="0">0</span>
										</div>
									</div>
										
										<hr>
										
										
							<br><br>
                                <div class="portlet-body">
                                    <div class="row">
										<div class="col-xs-4 ">
<!--original
                                        <div class="easy-pie-chart">
										   <div class="number eficienciaMC" data-percent="<?php echo $valor; ?>"> 
											  <span><?php echo $valor; ?></span>% 
											  <canvas height="75" width="75"></canvas>
										   </div>
										<span class="widget-thumb-subtitle">Uso<br></span>
										<?php echo $valor/100*8; ?> Hrs
-->
<!--Aquí va la gráfica y las horas-->
<div id="preview">
  	<canvas width="220" height="70" id="canvas-meter"></canvas>
  	<div id="preview-textfield" style="font-size: 14px; padding-left: 66px;"><center>Uso <?php echo round($valor/100*8,2); ?> Hrs</center></div>
	<div id="preview-textfield" style="font-size: 14px; padding-left: 75px;"><center><?php echo $valor; ?>% </center></div>
	
  </div>
										 </div>
                                    </div>
                                </div>
                            
<script>
	var opts = {
  lines: 12, // The number of lines to draw
  angle: 0.15, // The length of each line
  lineWidth: 0.44, // The line thickness
  pointer: {
    length: 0.9, // The radius of the inner circle
    strokeWidth: 0.035, // The rotation offset
    color: '#000000' // Fill color
  },
  limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
  colorStart: '#6FADCF',   // Colors
  colorStop: '#8FC0DA',    // just experiment with them
  strokeColor: '#E0E0E0',   // to see which ones work best for you
  generateGradient: true
};
var valor ="<?php echo $valor; ?>";
var target = document.getElementById('canvas-meter'); // your canvas element
var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
gauge.maxValue = 100; // set max gauge value
gauge.animationSpeed = 32; // set animation speed (32 is default value)
gauge.set(valor); // set actual value
</script>										
										
										
											
										   <!--script>
												$('.easy-pie-chart .number.eficienciaMC').easyPieChart({
													animate: 1000,
													size: 75,
													lineWidth: 3,
													barColor: App.getBrandColor('green')
												});
											</script-->
												
															
										
									</div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
			<?php
$queryTB="
SELECT COUNT( id ) 
FROM  `baterias`
";			
$resultadoTB=$mysqli->query($queryTB);
         $filaTB=$resultadoTB->fetch_array();
         $valor=eficiencia("`uso_baterias_montacargas`","`mc`",$mysqli,"fecha_entrada","fecha_salida");
         $valor=round($valor,2);
			
			  $valor1=eficiencia("uso_baterias_bodega","bg",$mysqli,"fecha_entrada","fecha_salida");
			   $valor1=round($valor1,2);
			   $valor=$valor1;
			  
			   $valor2=eficiencia("`uso_baterias_bodega`","`id`",$mysqli,"fecha_carga","fecha_descanso");
			   $valor2=round($valor2,2);
			   $valor += $valor2;
			   		   			   
			   $valor3=eficiencia("`uso_baterias_bodega`","`id`",$mysqli,"fecha_descanso","fecha_salida");
			   $valor3=round($valor3,2);
			   $valor += $valor3;
			   
			   $valor=$valor/3;
			   $valor=round($valor,2);
			   ?>
			

     


			  
			  
			            
                        <div class="col-xs-4">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading"> Baterias </h4>
                                <div class="widget-thumb-wrap">
									<div class="col-md-6">	
										<i class="widget-thumb-icon bg-green-jungle icon-bateria"></i>
										<div class="widget-thumb-body">
											<span class="widget-thumb-subtitle">Activas</span>
											<span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $filaTB[0] ?>"><?php echo $filaTB[0] ?></span>
										</div>
									</div>
									<div class="col-md-6 ">
										<i class="widget-thumb-icon bg-red icon-bateria"></i>
										<div class="widget-thumb-body">
											<span class="widget-thumb-subtitle">Inactivas</span>
											<span class="widget-thumb-body-stat" data-counter="counterup" data-value="0">0</span>
										</div>
									</div>
										
										<hr>
										
										
							<br><br>
                                <div class="portlet-body">
                                    <div class="row">
										 <div class="col-xs-4 ">
<div id="preview">
  	<canvas width="100%" height="70" id="canvas-meterb1"></canvas>
  	<div id="preview-textfield" style="font-size: 14px;"><center>Carga <?php echo round($valor1/100*8,2); ?> Hrs</center></div>
	<div id="preview-textfield" style="font-size: 14px;"><center><?php echo $valor1; ?>% </center></div>
	
  </div>
<script>
		var opts = {
  lines: 12, // The number of lines to draw
  angle: 0.15, // The length of each line
  lineWidth: 0.44, // The line thickness
  pointer: {
    length: 0.9, // The radius of the inner circle
    strokeWidth: 0.035, // The rotation offset
    color: '#000000' // Fill color
  },
  limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
  colorStart: '#6FADCF',   // Colors
  colorStop: '#8FC0DA',    // just experiment with them
  strokeColor: '#E0E0E0',   // to see which ones work best for you
  generateGradient: true
};
var valor ="<?php echo $valor1; ?>";
var target = document.getElementById('canvas-meterb1'); // your canvas element
var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
gauge.maxValue = 100; // set max gauge value
gauge.animationSpeed = 32; // set animation speed (32 is default value)
gauge.set(valor); // set actual value
</script>
         
      
   </div>
   <div class="col-xs-4 ">
      
<div id="preview">
  	<canvas width="100%" height="70" id="canvas-meterb2" ></canvas>
  	<div id="preview-textfield" style="font-size: 14px;"><center>Descanso <?php echo round($valor2/100*8,2); ?> Hrs</center></div>
	<div id="preview-textfield" style="font-size: 14px;"><center><?php echo $valor2; ?>% </center></div>
	
  </div>
<script>
		var opts = {
  lines: 12, // The number of lines to draw
  angle: 0.15, // The length of each line
  lineWidth: 0.44, // The line thickness
  pointer: {
    length: 0.9, // The radius of the inner circle
    strokeWidth: 0.035, // The rotation offset
    color: '#000000' // Fill color
  },
  limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
  colorStart: '#6FADCF',   // Colors
  colorStop: '#8FC0DA',    // just experiment with them
  strokeColor: '#E0E0E0',   // to see which ones work best for you
  generateGradient: true
};
var valor ="<?php echo $valor2; ?>";
var target = document.getElementById('canvas-meterb2'); // your canvas element
var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
gauge.maxValue = 100; // set max gauge value
gauge.animationSpeed = 32; // set animation speed (32 is default value)
gauge.set(valor); // set actual value
</script>
         
      
   </div>
   <div class="col-xs-4 ">
      
<div id="preview">
  	<canvas width="100%" height="70" id="canvas-meterb3"></canvas>
  	<div id="preview-textfield" style="font-size: 14px;"><center>Carga <?php echo round($valor3/100*8,2); ?> Hrs</center></div>
	<div id="preview-textfield" style="font-size: 14px;"><center><?php echo $valor3; ?>% </center></div>
	
  </div>
<script>
		var opts = {
  lines: 12, // The number of lines to draw
  angle: 0.15, // The length of each line
  lineWidth: 0.44, // The line thickness
  pointer: {
    length: 0.9, // The radius of the inner circle
    strokeWidth: 0.035, // The rotation offset
    color: '#000000' // Fill color
  },
  limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
  colorStart: '#6FADCF',   // Colors
  colorStop: '#8FC0DA',    // just experiment with them
  strokeColor: '#E0E0E0',   // to see which ones work best for you
  generateGradient: true
};
var valor ="<?php echo $valor3; ?>";
var target = document.getElementById('canvas-meterb3'); // your canvas element
var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
gauge.maxValue = 100; // set max gauge value
gauge.animationSpeed = 32; // set animation speed (32 is default value)
gauge.set(valor); // set actual value
</script>
         
      
                                    </div>
                                </div>
                            
										
										

										</div>				
															
										
									</div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
        
		
		
		
		
		 <?php
	  
	  $queryTC="
SELECT COUNT( id ) 
FROM  `cargadores`
";
$resultadoTC=$mysqli->query($queryTC);	
$valor=eficiencia("uso_baterias_bodega","bg",$mysqli,"fecha_entrada","fecha_salida");
$valor=round($valor,2);
$filaTC=$resultadoTC->fetch_array();
         ?>

		
		
		
		
		
		               <div class="col-xs-4">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading"> Cargadores </h4>
                                <div class="widget-thumb-wrap">
									<div class="col-md-6">	
										<i class="widget-thumb-icon bg-green-jungle icon-cargador"></i>
										<div class="widget-thumb-body">
											<span class="widget-thumb-subtitle">Activos</span>
											<span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $filaTC[0]; ?>"><?php echo $filaTM[0]; ?></span>
										</div>
									</div>
									<div class="col-md-6 ">
										<i class="widget-thumb-icon bg-red icon-cargador"></i>
										<div class="widget-thumb-body">
											<span class="widget-thumb-subtitle">Inactivos</span>
											<span class="widget-thumb-body-stat" data-counter="counterup" data-value="0">0</span>
										</div>
									</div>
										
										<hr>
										
										
							<br><br>
                                <div class="portlet-body">
                                    <div class="row">
										<div class="col-xs-4 ">
<div id="preview">
  	<canvas width="100%" height="70" id="canvas-meterc"></canvas>
  	<div id="preview-textfield" style="font-size: 14px;"><center>Carga <?php echo round($valor/100*8,2); ?> Hrs</center></div>
	<div id="preview-textfield" style="font-size: 14px;"><center><?php echo $valor; ?>% </center></div>
	
  </div>
										 </div>
                                    </div>
                                </div>
                            
										
										
										
											
<script>
		var opts = {
  lines: 12, // The number of lines to draw
  angle: 0.15, // The length of each line
  lineWidth: 0.44, // The line thickness
  pointer: {
    length: 0.9, // The radius of the inner circle
    strokeWidth: 0.035, // The rotation offset
    color: '#000000' // Fill color
  },
  limitMax: 'false',   // If true, the pointer will not go past the end of the gauge
  colorStart: '#6FADCF',   // Colors
  colorStop: '#8FC0DA',    // just experiment with them
  strokeColor: '#E0E0E0',   // to see which ones work best for you
  generateGradient: true
};
var valor ="<?php echo $valor; ?>";
var target = document.getElementById('canvas-meterc'); // your canvas element
var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
gauge.maxValue = 100; // set max gauge value
gauge.animationSpeed = 32; // set animation speed (32 is default value)
gauge.set(valor); // set actual value
</script>
													
															
										
									</div>
                                </div>
                            </div>
  
                    </div>



	 
					 <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Desempeño de montacargas</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="reporteMC" ></div>
									
                                </div>
								
								
                            </div>
							
                        </div>
					 </div>

				
		<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>

		
        <script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
		
		
        <!-- END PAGE LEVEL PLUGINS -->
		<script type="text/javascript">
		
 

	
	
   $(function () {


<?php
			   date_default_timezone_set('UTC');
			   date_default_timezone_set("America/Mexico_City");
			   //Database Information
			   $db_host = "localhost"; //Host address (most likely localhost)
			   $db_name = "regetrac_sistema"; //Name of Database
			   $db_user = "regetrac_sistema"; //Name of database user
			   $db_pass = "Hola.1234"; //Password for database user
			   /* Create a new mysqli object with database connection parameters */
			   $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
			   $query="
				select
					u.mc,
					m.nombre,
					u.bt,
					u.fecha_entrada,
					u.fecha_salida,
				    TIMESTAMPDIFF(hour, fecha_entrada, fecha_salida) as hrs,
				    TIMESTAMPDIFF(minute, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(hour, fecha_entrada, fecha_salida))*60 as min
				from
					uso_baterias_montacargas as u LEFT JOIN montacargas as m 
						ON u.mc=m.id
				where
				    u.fecha_salida!='0000-00-00 00:00:00' 
			    order by
					u.fecha_entrada asc				 
					 
				   ";			   
			   $respuesta = $mysqli->query($query);

			   $data=array();
			   if ($respuesta) {
				  while($lasBTa2 = $respuesta->fetch_array()){
					 $mc=$lasBTa2['mc'];
					 if (!isset($data[$mc])){
						$data[$mc]['data']='[';
						$data[$mc]['nombre']=$lasBTa2['nombre'];
					 }
					 $fechaentrada=$lasBTa2['fecha_entrada'];
					 $fecha= strtotime($fechaentrada. " UTC");
					 $data[$mc]['data'].='[parseInt('.$fecha.'000,10),parseInt('.($lasBTa2['hrs']+($lasBTa2['min']/100)).')],';
				  }
			   }
			   $query="SELECT
						a.*,
						m.nombre
					FROM  deshabilitamc as a LEFT JOIN montacargas as m ON a.mc=m.id
					ORDER BY a.fecha_entrada ";

			   $rep_alertas = $mysqli->query($query);
			   
			   $alertas=array();

   			   if ($rep_alertas){
				  while($renglon = $rep_alertas->fetch_array()){
					 $mc=$renglon['mc'];
					 if (!isset($alertas[$mc])){
						$alertas[$mc]['data']='';
						$alertas[$mc]['nombre']=$renglon['nombre'];
					 }
					 $fechaentrada=$renglon['fecha_entrada'];
					 $fecha= strtotime($fechaentrada. " UTC");
					 $alertas[$mc]['data'].="{x: parseInt(".$fecha."000,10),title: 'AVISO', text: '".$renglon['motivo']."'},";
				  }
			   }
			   

   if (count($data)+count($alertas)>0){
?>
		 var now = new Date(); 
		 var now_utc = new Date(now.getUTCFullYear(), now.getUTCMonth(), now.getUTCDate(),  now.getUTCHours(), now.getUTCMinutes(), now.getUTCSeconds());

		 $('#reporteMC').highcharts('StockChart', {

            rangeSelector : {
                selected : 0
            },
			legend : {
					enabled : true
			},

            title : {
                text : 'Uso de montacargas'
            },

            tooltip: {
                style: {
                    width: '200px'
                },
                valueDecimals: 4,
                shared : true
            },

            yAxis : {
                title : {
                    text : 'Horas de uso'
                }
            },
            xAxis : {
			   max: parseInt(<?php echo time();?>000)
            },

            series : [
			   <?php
			   $lineas='';
			   foreach ($data as $mc => $dmc){
				  $dmc['data']=substr($dmc['data'],0,-1).']';
				  $lineas.="{".
					  "name : '".$dmc['nombre']."', ".
					  "type: 'spline', ".
					  "marker : { ".
						  "enabled : true, ".
						  "radius : 4 ".
					  "}, ".
					  "data : ".$dmc['data'].", ".
					  "id : 'dataseries".$mc."' ".
				  "}, ";
			   }
			   $alineas='';
			   if (count($alertas)<=0){
				  $lineas=substr($lineas,0,-1);
			   }else{
     			  foreach ($alertas as $mc => $amc){
					 $amc['data']=substr($amc['data'],0,-1);
					 $alineas.="{".
						 "name : 'Alertas ".$amc['nombre']."', ".
						 "type: 'flags', ".
						 "data : [".$amc['data']."], ".
						 "onSeries : 'dataseries".$mc."', ".
						 "shape : 'circlepin', ".
						 "width : 16 ".
					 "}, ";
				  }
				  $alineas=substr($alineas,0,-1);
			   }
			   
			   echo $lineas.$alineas;
			   ?>
			]
		 });
  
   });
   
   <?php
   }else{
	  echo "$('#reporteMC').html('NO HAY DATOS QUE MOSTRAR');   });";
   }
   ?>
 
   </script>

				  <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Desempeño de baterias</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="reporteB" ></div>
									
                                </div>
								
								
                            </div>
							
                        </div>
                    </div>
		
		<script type="text/javascript">
			
	
   $(function () {


<?php
			   date_default_timezone_set('UTC');
			   date_default_timezone_set("America/Mexico_City");
			   //Database Information
			   $db_host = "localhost"; //Host address (most likely localhost)
			   $db_name = "regetrac_sistema"; //Name of Database
			   $db_user = "regetrac_sistema"; //Name of database user
			   $db_pass = "Hola.1234"; //Password for database user
			   /* Create a new mysqli object with database connection parameters */
			   $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
			   $query="
				select
					u.bt,
					b.num_serie as nombre,
					u.fecha_entrada,
					u.fecha_salida,
				    TIMESTAMPDIFF(hour, fecha_entrada, fecha_salida) as hrs,
				    TIMESTAMPDIFF(minute, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(hour, fecha_entrada, fecha_salida))*60 as min
				from
					uso_baterias_montacargas as u LEFT JOIN baterias as b 
						ON u.bt=b.id
				where
				    u.fecha_salida!='0000-00-00 00:00:00' 
			    order by
					u.fecha_entrada asc				 
				   ";				   
			   $respuesta = $mysqli->query($query);

			   $data=array();
  			   if ($respuesta){
				  while($lasBTa2 = $respuesta->fetch_array()){
					 $bt=$lasBTa2['bt'];
					 if (!isset($data[$bt])){
						$data[$bt]['data']='[';
						$data[$bt]['nombre']=$lasBTa2['nombre'];
					 }
					 $fechaentrada=$lasBTa2['fecha_entrada'];
					 $fecha= strtotime($fechaentrada. " UTC");
					 $data[$bt]['data'].='[parseInt('.$fecha.'000,10),parseInt('.($lasBTa2['hrs']+($lasBTa2['min']/100)).')],';
				  }
			   }
			   $query="SELECT
						a.*,
						b.num_serie as nombre,
					FROM  deshabilitabt as a LEFT JOIN baterias as b ON a.bt=b.id
					ORDER BY a.fecha_entrada ";

			   $rep_alertas = $mysqli->query($query);
			   
			   $alertas=array();
			   
			   if ($rep_alertas){
	  			   while($renglon = $rep_alertas->fetch_array()){
					 $bt=$renglon['bt'];
					 if (!isset($alertas[$bt])){
						$alertas[$bt]['data']='';
						$alertas[$bt]['nombre']=$renglon['nombre'];
					 }
					 $fechaentrada=$renglon['fecha_entrada'];
					 $fecha= strtotime($fechaentrada. " UTC");
					 $alertas[$bt]['data'].="{x: parseInt(".$fecha."000,10),title: 'AVISO', text: '".$renglon['motivo']."'},";
				  }
  
			   }   
   if (count($data)+count($alertas)>0){
?>
		 var now = new Date(); 
		 var now_utc = new Date(now.getUTCFullYear(), now.getUTCMonth(), now.getUTCDate(),  now.getUTCHours(), now.getUTCMinutes(), now.getUTCSeconds());

		 $('#reporteB').highcharts('StockChart', {

            rangeSelector : {
                selected : 0
            },
			legend : {
					enabled : true
			},

            title : {
                text : 'Uso de baterias'
            },

            tooltip: {
                style: {
                    width: '200px'
                },
                valueDecimals: 4,
                shared : true
            },

            yAxis : {
                title : {
                    text : 'Horas de uso'
                }
            },
            xAxis : {
			   max: parseInt(<?php echo time();?>000)
            },

            series : [
			   <?php
			   $lineas='';
			   foreach ($data as $bt => $dbt){
				  $dbt['data']=substr($dbt['data'],0,-1).']';
				  $lineas.="{".
					  "name : '".$dbt['nombre']."', ".
					  "type: 'spline', ".
					  "marker : { ".
						  "enabled : true, ".
						  "radius : 4 ".
					  "}, ".
					  "data : ".$dbt['data'].", ".
					  "id : 'dataseries".$bt."' ".
				  "}, ";
			   }
			   $alineas='';
			   if (count($alertas)<=0){
				  $lineas=substr($lineas,0,-1);
			   }else{
     			  foreach ($alertas as $bt => $abt){
					 $abt['data']=substr($abt['data'],0,-1);
					 $alineas.="{".
						 "name : 'Alertas ".$abt['nombre']."', ".
						 "type: 'flags', ".
						 "data : [".$abt['data']."], ".
						 "onSeries : 'dataseries".$bt."', ".
						 "shape : 'circlepin', ".
						 "width : 16 ".
					 "}, ";
				  }
				  $alineas=substr($alineas,0,-1);
			   }
			   
			   echo $lineas.$alineas;
			   ?>
			]
		 });
  
   });
 
   <?php
   }else{
	  echo "$('#reporteB').html('NO HAY DATOS QUE MOSTRAR');   });";
   }
   ?>
 
   </script>

				 <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Desempeño de Cargadores</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="reporteC" ></div>
									
                                </div>
								
								
                            </div>
							
                        </div>
					 </div>


		<script type="text/javascript">

	
	
   $(function () {


<?php
			   date_default_timezone_set('UTC');
			   date_default_timezone_set("America/Mexico_City");
			   //Database Information
			   $db_host = "localhost"; //Host address (most likely localhost)
			   $db_name = "regetrac_sistema"; //Name of Database
			   $db_user = "regetrac_sistema"; //Name of database user
			   $db_pass = "Hola.1234"; //Password for database user
			   /* Create a new mysqli object with database connection parameters */
			   $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
			   $query="
				select
					u.bg as cg,
					m.nombre,
					u.fecha_carga as fecha_entrada,
					u.fecha_descanso as fecha_salida,
				    TIMESTAMPDIFF(hour, fecha_entrada, fecha_salida) as hrs,
				    TIMESTAMPDIFF(minute, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(hour, fecha_entrada, fecha_salida))*60 as min
				from
					uso_baterias_bodega as u LEFT JOIN bodegas as m 
						ON u.bg=m.id
				where
				    u.fecha_salida!='0000-00-00 00:00:00' 
			    order by
					u.fecha_entrada asc				 
					 
				   ";			   
			   $respuesta = $mysqli->query($query);

			   $data=array();
               if ($respuesta) {
                    while($lasBTa2 = $respuesta->fetch_array()){
                       $mc=$lasBTa2['cg'];
                       if (!isset($data[$mc])){
                          $data[$mc]['data']='[';
                          $data[$mc]['nombre']=$lasBTa2['nombre'];
                       }
                       $fechaentrada=$lasBTa2['fecha_entrada'];
                       $fecha= strtotime($fechaentrada. " UTC");
                       $data[$mc]['data'].='[parseInt('.$fecha.'000,10),parseInt('.($lasBTa2['hrs']+($lasBTa2['min']/100)).')],';
                    }
               }
			   
			   $query="SELECT
						a.*,
						m.nombre
					FROM  deshabilitacg as a LEFT JOIN cargadores as m ON a.cg=m.id
					ORDER BY a.fecha_entrada ";

			   $rep_alertas = $mysqli->query($query);
			   
			   $alertas=array();

   			   if ($rep_alertas){
				  while($renglon = $rep_alertas->fetch_array()){
					 $mc=$renglon['cg'];
					 if (!isset($alertas[$mc])){
						$alertas[$mc]['data']='';
						$alertas[$mc]['nombre']=$renglon['nombre'];
					 }
					 $fechaentrada=$renglon['fecha_entrada'];
					 $fecha= strtotime($fechaentrada. " UTC");
					 $alertas[$mc]['data'].="{x: parseInt(".$fecha."000,10),title: 'AVISO', text: '".$renglon['motivo']."'},";
				  }
			   }
			   
   if (count($data)+count($alertas)>0){
?>
		 var now = new Date(); 
		 var now_utc = new Date(now.getUTCFullYear(), now.getUTCMonth(), now.getUTCDate(),  now.getUTCHours(), now.getUTCMinutes(), now.getUTCSeconds());

		 $('#reporteC').highcharts('StockChart', {

            rangeSelector : {
                selected : 0
            },
			legend : {
					enabled : true
			},

            title : {
                text : 'Uso de espacios en cargadores'
            },

            tooltip: {
                style: {
                    width: '200px'
                },
                valueDecimals: 4,
                shared : true
            },

            yAxis : {
                title : {
                    text : 'Horas de uso'
                }
            },
            xAxis : {
			   max: parseInt(<?php echo time();?>000)
            },

            series : [
			   <?php
			   $lineas='';
			   foreach ($data as $mc => $dmc){
				  $dmc['data']=substr($dmc['data'],0,-1).']';
				  $lineas.="{".
					  "name : '".$dmc['nombre']."', ".
					  "type: 'spline', ".
					  "marker : { ".
						  "enabled : true, ".
						  "radius : 4 ".
					  "}, ".
					  "data : ".$dmc['data'].", ".
					  "id : 'dataseries".$mc."' ".
				  "}, ";
			   }
			   $alineas='';
			   if (count($alertas)<=0){
				  $lineas=substr($lineas,0,-1);
			   }else{
     			  foreach ($alertas as $mc => $amc){
					 $amc['data']=substr($amc['data'],0,-1);
					 $alineas.="{".
						 "name : 'Alertas ".$amc['nombre']."', ".
						 "type: 'flags', ".
						 "data : [".$amc['data']."], ".
						 "onSeries : 'dataseries".$mc."', ".
						 "shape : 'circlepin', ".
						 "width : 16 ".
					 "}, ";
				  }
				  $alineas=substr($alineas,0,-1);
			   }
			   
			   echo $lineas.$alineas;
			   ?>
			]
		 });
  
   });
   
   <?php
   }else{
	  echo "$('#reporteC').html('NO HAY DATOS QUE MOSTRAR');   });";
   }
   ?>
   </script>




		 
		  <?php
			 
function eficiencia($tabla,$ref,$mysqli,$fechamenor,$fechamayor,$va=0){
			   //Aquí viene lo chingüengüenchón
//Esta consulta nos regresa todos los montacargas
$queryTODO="
SELECT ".$ref."
FROM  ".$tabla."
ORDER BY  ".$ref." ASC
";


$resultadoTODO = $mysqli->query($queryTODO);

//Variables que vamos a usar
$contador=0;//Vamos a ver cuántos montacargas iguales hay en el arreglo
//$actual=""; //Para saber si estamos trabajando con el mismo montacargas
$tiempo="";//Diferencia de salida-entrada
$promedio=0;//Promedio de eficiencia
//Recorremos los resultados
while($filaTODO=$resultadoTODO->fetch_array()){
   //Esta consulta saca las horas de diferencia para el montacargas actual del arreglo de resultados de la consulta anterior
   $consulta="
   SELECT TIMESTAMPDIFF( HOUR , ".$fechamenor.", ".$fechamayor." ) AS  'tiempo'
FROM  ".$tabla." 
WHERE  ".$ref." = ".$filaTODO[0];

 if($va==1){
	echo $consulta;
   }

$resultado=$mysqli->query($consulta);
$filaresultado=$resultado->fetch_array();
//Ahora calculamos resultados

	  $contador++;
	  
	  if($filaresultado[0]==NULL) $filaresultado[0]=0;
	  $tiempo=$filaresultado[0];
	  $promedio = $promedio + $tiempo;

   /*
   if($actual==$filaTODO["mc"]){
	  $promedio=$promedio/$contador;
	  $contador=1;
	  
   }
   else{
	  $actual=$filaTODO["mc"];
	  if($filaresultado==NULL) $filaresultado=0;
	  $tiempo=$filaresultado;
	  $promedio=$promedio+$tiempo;	  
   }

   */
   
  
   
}


$promedio=$promedio/$contador;
//El 100% es 8, hay que convertir este promedio
return $promedio = $promedio*100/8;
//Aquí termina lo chingüengüenchón... al menos para esta parte
   
   }
			 ?>

			 