<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

require_once("models/header.php");
require_once("libs/libreriasJquery.php");





?>
	<script src="rgraph/RGraph.common.core.js" ></script>
	<script src="rgraph/RGraph.meter.js" ></script>
	    <script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="rgraph/demos.css">
    <style>
        .my_icons{
            float: left;
    width: 60px;
    height: 60px;
    display: inline-block;
    font-size: 120px;
    line-height: 41px;
    color: #0000FF;
    text-align: center;
    padding: 10px;
    margin-right: 15px;

        }
        .my_subtitle{
                padding-top: 2px;
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #8e9daa;
        }
        .my_number{
                display: block;
    font-size: 75px;
    font-weight: 600;
    color: #3e4f5e;
        }
    </style>



            

        <div class="row">
            <div class="col-md-12">
				<?php require_once("tema/comun/topcontenedor.php");?>
				<?php   ?>
			</div>
		
			<div class="col-md-12 ">
			<?php
				
				$queryTM="
				SELECT COUNT( id ) 
				FROM  `montacargas`
				";
				$resultadoTM=$mysqli->query($queryTM);
						 $filaTM=$resultadoTM->fetch_array();
						 $valor0=eficiencia("`uso_baterias_montacargas`","`mc`",$mysqli,"fecha_entrada","fecha_salida");
						 $valor0=round($valor0,2);
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
					  $queryTC="
				SELECT COUNT( id ) 
				FROM  `cargadores`
				";
				$resultadoTC=$mysqli->query($queryTC);	
				$valor4=eficiencia("uso_baterias_bodega","bg",$mysqli,"fecha_entrada","fecha_salida");
				$valor4=round($valor4,2);
				$filaTC=$resultadoTC->fetch_array();
					   
			?>
<style>
    .centrado{
        text-align: center;
        vertical-align: middle;
    }
    .icon-montacarga,
    .icon-cargador,
    .icon-bateria
    {
        text-align: center;
        vertical-align: middle;
        float: none;
        margin: 0;
        padding: 0;
        width: 0;
        height: 0;
        line-height: 0;
        display: inline;
    }
</style>
            <table width="100%" >
                <tr>
                    <th class="centrado" width="10%">Elemento</th>
                    <th class="centrado" width="10%">Activos</th>
                    <th class="centrado" width="10%">Inactivos</th>
                    <th class="centrado" colspan="3">Indicadores</th>
                </tr>
                <tr>
                    <td class="centrado">
                        <i class="my_icons icon-montacarga">
                    </td>
                    <td class="centrado">
						<span class="my_number" data-counter="counterup" data-value="<?php echo $filaTM[0]; ?>"><?php echo $filaTM[0]; ?></span>
                    </td>
                    <td class="centrado">
						<span class="my_number" data-counter="counterup" data-value="0">0</span>
                    </td>
                    <td class="centrado" colspan="3">
						<div id="preview"><canvas id="cvs1" width="300" height="125" style="border-radius: 15px">[No canvas support]</canvas></div>
						<div id="preview-textfield" style="font-size: 14px;"><center>Uso <?php echo round($valor0/100*8,2); ?> Hrs</center></div>
						<div id="preview-textfield" style="font-size: 14px;"><center><?php echo $valor0; ?>% </center></div>					
                    </td>
                </tr>
                <tr>
                    <td class="centrado">
                        <i class="my_icons icon-cargador">
                    </td>
                    <td class="centrado">
 						<span class="my_number" data-counter="counterup" data-value="<?php echo $filaTB[0] ?>"><?php echo $filaTB[0] ?></span>
                   </td>
                    <td class="centrado">
						<span class="my_number" data-counter="counterup" data-value="0">0</span>
                    </td>
                    <td class="centrado">
                        <div id="preview">
                            <canvas id="cvs2" width="300" height="125" style="border-radius: 15px">[No canvas support]</canvas>
                            <div id="preview-textfield" style="font-size: 14px;"><center>Carga <?php echo round($valor1/100*8,2); ?> Hrs</center></div>
                            <div id="preview-textfield" style="font-size: 14px;"><center><?php echo $valor1; ?>% </center></div>
                        </div>
                    </td>
                    <td class="centrado">
                        <div id="preview">
                            <canvas id="cvs3" width="300" height="125" style="border-radius: 15px">[No canvas support]</canvas>
                            <div id="preview-textfield" style="font-size: 14px;"><center>Carga <?php echo round($valor2/100*8,2); ?> Hrs</center></div>
                            <div id="preview-textfield" style="font-size: 14px;"><center><?php echo $valor2; ?>% </center></div>
                        </div>
                    </td>
                    <td class="centrado">
                        <div id="preview">
                            <canvas id="cvs4" width="300" height="125" style="border-radius: 15px">[No canvas support]</canvas>
                            <div id="preview-textfield" style="font-size: 14px;"><center>Carga <?php echo round($valor3/100*8,2); ?> Hrs</center></div>
                            <div id="preview-textfield" style="font-size: 14px;"><center><?php echo $valor3; ?>% </center></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="centrado">
                        <i class="my_icons icon-bateria">
                    </td>
                    <td class="centrado">
						<span class="my_number" data-counter="counterup" data-value="<?php echo $filaTC[0]; ?>"><?php echo $filaTM[0]; ?></span>        
                    </td>
                    <td class="centrado">
						<span class="my_number" data-counter="counterup" data-value="0">0</span>    
                    </td>
                    <td class="centrado" colspan="3">
						<div id="preview">
							<canvas id="cvs5" width="300" height="125" style="border-radius: 15px">[No canvas support]</canvas>
							<div id="preview-textfield" style="font-size: 14px;"><center>Carga <?php echo round($valor4/100*8,2); ?> Hrs</center></div>
							<div id="preview-textfield" style="font-size: 14px;"><center><?php echo $valor4; ?>% </center></div>							
						</div>
                    </td>
                </tr>
            </table>


<!--************************************************************************************-->
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
            <script id="source1">
$(document).ready(function ()
        {
            var meter = new RGraph.Meter({
                id: 'cvs1',
                min: 0,
                max: 100,
                value: <?php echo round($valor0,2); ?>,
                options: {
                    anglesStart: RGraph.PI, //ángulo de inicio de la barra de colores
                    anglesEnd: RGraph.TWOPI,//ángulo de fin de la barra de colores
                    linewidthSegments: 0,//ancho de la división de segmentos
                    textSize: 8,//Tamaño de los números
                    strokestyle: 'white',
                    segmentRadiusStart: 100,//ancho de la barra de colores
                    border: 0,
                    tickmarksSmallNum: 0,
                    tickmarksBigNum: 0,
                    adjustable: true,
                    needleRadius: 60,/*Este es el tamaño de la flecha*/
                    textAccessible: false,
					//Rangos de los colores
					colorsRanges: [
                [0,25, 'Gradient(white:red)'],
                [25,45, 'Gradient(white:yellow)'],
                [45,100, 'Gradient(white:green)']
            ]
                }
            }).on('beforedraw', function (obj)
            {
                RGraph.clear(obj.canvas, 'white');
            }).draw();
        });
		</script>
            <script id="source2">
$(document).ready(function ()
        {
            var meter = new RGraph.Meter({
                id: 'cvs2',
                min: 0,
                max: 100,
                value: <?php echo round($valor1,2); ?>,
                options: {
                    anglesStart: RGraph.PI, //ángulo de inicio de la barra de colores
                    anglesEnd: RGraph.TWOPI,//ángulo de fin de la barra de colores
                    linewidthSegments: 0,//ancho de la división de segmentos
                    textSize: 8,//Tamaño de los números
                    strokestyle: 'white',
                    segmentRadiusStart: 100,//ancho de la barra de colores
                    border: 0,
                    tickmarksSmallNum: 0,
                    tickmarksBigNum: 0,
                    adjustable: true,
                    needleRadius: 60,/*Este es el tamaño de la flecha*/
                    textAccessible: false,
					//Rangos de los colores
					colorsRanges: [
                [0,25, 'Gradient(white:red)'],
                [25,45, 'Gradient(white:yellow)'],
                [45,100, 'Gradient(white:green)']
            ]
                }
            }).on('beforedraw', function (obj)
            {
                RGraph.clear(obj.canvas, 'white');
            }).draw();
        });
		</script>
            <script id="source3">
$(document).ready(function ()
        {
            var meter = new RGraph.Meter({
                id: 'cvs3',
                min: 0,
                max: 100,
                value: <?php echo round($valor2,2); ?>,
                options: {
                    anglesStart: RGraph.PI, //ángulo de inicio de la barra de colores
                    anglesEnd: RGraph.TWOPI,//ángulo de fin de la barra de colores
                    linewidthSegments: 0,//ancho de la división de segmentos
                    textSize: 8,//Tamaño de los números
                    strokestyle: 'white',
                    segmentRadiusStart: 100,//ancho de la barra de colores
                    border: 0,
                    tickmarksSmallNum: 0,
                    tickmarksBigNum: 0,
                    adjustable: true,
                    needleRadius: 60,/*Este es el tamaño de la flecha*/
                    textAccessible: false,
					//Rangos de los colores
					colorsRanges: [
                [0,25, 'Gradient(white:red)'],
                [25,45, 'Gradient(white:yellow)'],
                [45,100, 'Gradient(white:green)']
            ]
                }
            }).on('beforedraw', function (obj)
            {
                RGraph.clear(obj.canvas, 'white');
            }).draw();
        });
		</script>
            <script id="source4">
$(document).ready(function ()
        {
            var meter = new RGraph.Meter({
                id: 'cvs4',
                min: 0,
                max: 100,
                value: <?php echo round($valor3,2); ?>,
                options: {
                    anglesStart: RGraph.PI, //ángulo de inicio de la barra de colores
                    anglesEnd: RGraph.TWOPI,//ángulo de fin de la barra de colores
                    linewidthSegments: 0,//ancho de la división de segmentos
                    textSize: 8,//Tamaño de los números
                    strokestyle: 'white',
                    segmentRadiusStart: 100,//ancho de la barra de colores
                    border: 0,
                    tickmarksSmallNum: 0,
                    tickmarksBigNum: 0,
                    adjustable: true,
                    needleRadius: 60,/*Este es el tamaño de la flecha*/
                    textAccessible: false,
					//Rangos de los colores
					colorsRanges: [
                [0,25, 'Gradient(white:red)'],
                [25,45, 'Gradient(white:yellow)'],
                [45,100, 'Gradient(white:green)']
            ]
                }
            }).on('beforedraw', function (obj)
            {
                RGraph.clear(obj.canvas, 'white');
            }).draw();
        });
		</script>
            <script id="source5">
$(document).ready(function ()
        {
            var meter = new RGraph.Meter({
                id: 'cvs5',
                min: 0,
                max: 100,
                value: <?php echo round($valor4,2); ?>,
                options: {
                    anglesStart: RGraph.PI, //ángulo de inicio de la barra de colores
                    anglesEnd: RGraph.TWOPI,//ángulo de fin de la barra de colores
                    linewidthSegments: 0,//ancho de la división de segmentos
                    textSize: 8,//Tamaño de los números
                    strokestyle: 'white',
                    segmentRadiusStart: 100,//ancho de la barra de colores
                    border: 0,
                    tickmarksSmallNum: 0,
                    tickmarksBigNum: 0,
                    adjustable: true,
                    needleRadius: 60,/*Este es el tamaño de la flecha*/
                    textAccessible: false,
					//Rangos de los colores
					colorsRanges: [
                [0,25, 'Gradient(white:red)'],
                [25,45, 'Gradient(white:yellow)'],
                [45,100, 'Gradient(white:green)']
            ]
                }
            }).on('beforedraw', function (obj)
            {
                RGraph.clear(obj.canvas, 'white');
            }).draw();
        });
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

			 