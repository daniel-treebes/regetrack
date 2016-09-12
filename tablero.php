<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

require_once("models/header.php");
require_once("libs/libreriasJquery.php");

?>
<script src="rgraph/RGraph.common.core.js" ></script>
<script src="rgraph/RGraph.meter.js" ></script>
<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="rgraph/demos.css">
<style>

    .my_subtitle{
        padding-top: 2px;
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #8e9daa;
    }
    .inactivos{
        display: block;
        font-size: 75px;
        font-weight: 600;
        color: #DF5353;
    }

    .activos{
        display: block;
        font-size: 75px;
        font-weight: 600;
        color: #55BF3B;
    }

    .my_icons {
        margin-top: 20px;
        /*float: left;*/
        width: 60px;
        height: 60px;
        display: inline-block;
        font-size: 120px;
        line-height: 41px;
        color: #3E4F5E;
        text-align: center;
        padding: 10px;
        margin-right: 15px;
    }

    .visores {
        margin-top: -25px;
    }
    </style>

		<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>


<script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

        <div class="row">
            <div class="col-md-12">
		<?php require_once("tema/comun/topcontenedor.php");?>
            </div>
            <div class="col-md-12 ">
		<?php
                $queryTM="
                    SELECT COUNT( id )
                    FROM `montacargas`
                    ";
                $resultadoTM=$mysqli->query($queryTM);
                $filaTM=$resultadoTM->fetch_array();
                $queryTB="
                    SELECT COUNT( id )
                    FROM  `baterias`
                ";
                $resultadoTB=$mysqli->query($queryTB);
                $filaTB=$resultadoTB->fetch_array();
                
                $queryTC="
                    SELECT COUNT( id )
                    FROM  `cargadores`
                ";
                $resultadoTC=$mysqli->query($queryTC);
				/*
                $valor4=eficiencia("uso_baterias_bodega","bg",$mysqli,"fecha_entrada","fecha_salida");
                $valor4=round($valor4,2);
                */
                $filaTC=$resultadoTC->fetch_array();
				
				$queryImc="
					SELECT COUNT(id) as inactivos
					FROM deshabilitamc
					WHERE fecha_salida='0000-00-00 00:00:00'
					";
				$resInactivos=$mysqli->query($queryImc);
				$mcInactivos=0;
				if ($fila=$resInactivos->fetch_array()) $mcInactivos=$fila['inactivos'];
				$queryIcg="
					SELECT COUNT(id) as inactivos
					FROM deshabilitacg
					WHERE fecha_salida='0000-00-00 00:00:00'
					";
				$resInactivos=$mysqli->query($queryIcg);
				$cgInactivos=0;
				if ($fila=$resInactivos->fetch_array())$cgInactivos=$fila['inactivos'];
				$queryIbt="
					SELECT COUNT(id) as inactivos
					FROM deshabilitabt
					WHERE fecha_salida='0000-00-00 00:00:00'
					";
				$resInactivos=$mysqli->query($queryIbt);
				$btInactivos=0;
				if ($fila=$resInactivos->fetch_array())$btInactivos=$fila['inactivos'];
				
				?>
                <script>
                    var gaugeOptions = {
                        chart: {
                            type: 'solidgauge'
                        },

                        title: null,
                        pane: {
                            center: ['50%', '85%'],
                            size: '140%',
                            startAngle: -90,
                            endAngle: 90,
                            background: {
                                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
                                innerRadius: '60%',
                                outerRadius: '100%',
                                shape: 'arc'
                            }
                        },
                        tooltip: {
                            enabled: false
                        },

                        // the value axis
                        yAxis: {
                            stops: [
                                [0.5, '#DF5353'],
                                [0.8, '#DDDF0D'],
                                [0.9, '#55BF3B']
                            ],
                            lineWidth: 0,
                            minorTickInterval: null,
                            tickPixelInterval: 400,
                            tickWidth: 0,
                            title: {
                                y: -70
                            },
                            labels: {
                                y: 16
                            }
                        },

                        plotOptions: {
                            solidgauge: {
                                dataLabels: {
                                    y: 5,
                                    borderWidth: 0,
                                    useHTML: true
                                }
                            }
                        }
                    };
                </script>
			<!-- Montacargas!!! -->
                <div class="row widget-row">
                    <div class="col-lg-1 col-md-4 col-sm-4 col-xs-4">
                        <center>
                            <i class="my_icons icon-montacarga"></i>
                        </center>
                    </div>
					<?php
						if($mcInactivos>0) $clasemci="inactivos";
						else $clasemci="activos";
					?>
                    <div class="col-lg-2 col-md-8 col-sm-8 col-xs-8">
                        <center>
                            Deshabilitados<?php echo '<span class="'.$clasemci.'">'.$mcInactivos.'/'.$filaTM[0].'</span>';?>
                        </center>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <!--div id="container-speed" class="visores" style=" height: 180px; float: left"></div-->
                        <div id="eficienciaMC" class="visores" style="height: 180px;">
                        </div>
                    </div>
                </div>
                <br>
                <!-- CARGADORES!!! -->
                <div class="row widget-row">
                    <div class="col-lg-1 col-md-4 col-sm-4 col-xs-4">
                        <i class="my_icons icon-cargador"></i>
                    </div>
					<?php
						if($cgInactivos>0) $clasegci="inactivos";
						else $clasecgi="activos";
					?>
                    <div class="col-lg-2 col-md-8 col-sm-8 col-xs-8">
                        <center>
                            Deshabilitados<?php echo '<span class="'.$clasecgi.'">'.$cgInactivos.'/'.$filaTC[0].'</span>';?>
                        </center>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div id="eficienciaCGE" class="col-md-4 col-lg-4 col-sm-12 col-xs-12 visores" style="height: 180px; ">
                            </div>
                            <div id="eficienciaCGC" class="col-md-4 col-lg-4 col-sm-12 col-xs-12 visores" style=" height: 180px; ">
                            </div>
                            <div id="eficienciaCGD" class="col-md-4 col-lg-4 col-sm-12 col-xs-12 visores" style="height: 180px; ">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <!-- Baterias!!! -->
                <div class="row widget-row">
                    <div class="col-md-1 col-sm-4 col-xs-4">
                        <i class="my_icons icon-bateria"></i>
                    </div>
					<?php
						if($btInactivos>0) $clasebti="inactivos";
						else $clasebti="activos";
					?>
                    <div class="col-lg-2 col-md-8 col-sm-8 col-xs-8">
                        <center>
                            Deshabilitados<?php echo '<span class="'.$clasebti.'">'.$btInactivos.'/'.$filaTB[0].'</span>';?>
                        </center>
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <!--div id="contenedorBaterias" class="visores" style=" height: 180px; float: left"></div-->
                            <div id="eficienciaBTU" class="col-md-4 col-lg-4 col-sm-12 col-xs-12 visores" style="height: 180px; ">
                            </div>
                            <div id="eficienciaBTC" class="col-md-4 col-lg-4 col-sm-12 col-xs-12 visores" style=" height: 180px; ">
                            </div>
                            <div id="eficienciaBTD" class="col-md-4 col-lg-4 col-sm-12 col-xs-12 visores" style="height: 180px; ">
                            </div>
                    </div>
                </div>

<!--************************************************************************************-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light portlet-fit bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class=" icon-layers font-green"></i>
                                    <span class="caption-subject font-green bold uppercase">Desempeño de montacargas</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div id="reporteMC" ></div>
                            </div>
                        </div>
                    </div>
                </div>

				<?php
				$grafica=pinta_grafica('mc','reporteMC','uso','todo');
				echo $grafica;
				?>

				  <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Desempeño de baterias</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="reporteBU" ></div>
                                </div>
                                <div class="portlet-body">
                                    <div id="reporteBE" ></div>
                                </div>
                                <div class="portlet-body">
                                    <div id="reporteBC" ></div>
                                </div>
                                <div class="portlet-body">
                                    <div id="reporteBD" ></div>
                                </div>
                            </div>
                        </div>
                    </div>

				<?php

				$efidato=eficiencia('mc','uso','eficienciaMC');
				echo $efidato['script'];
				$efidato=eficiencia('cg','espera','eficienciaCGE');
				echo $efidato['script'];
				$efidato=eficiencia('cg','carga','eficienciaCGC');
				echo $efidato['script'];
				$efidato=eficiencia('cg','descanso','eficienciaCGD');
				echo $efidato['script'];
				$efidato=eficiencia('bt','uso','eficienciaBTU');
				echo $efidato['script'];
				$efidato=eficiencia('bt','carga','eficienciaBTC');
				echo $efidato['script'];
				$efidato=eficiencia('bt','descanso','eficienciaBTD');
				echo $efidato['script'];


				$grafica=pinta_grafica('bt','reporteBU','uso','todo');
				echo $grafica;
				$grafica=pinta_grafica('bt','reporteBE','espera','todo');
				echo $grafica;
				$grafica=pinta_grafica('bt','reporteBC','carga','todo');
				echo $grafica;
				$grafica=pinta_grafica('bt','reporteBD','descanso','todo');
				echo $grafica;
				?>

				<div class="row">
					<div class="col-md-12">
						<div class="portlet light portlet-fit bordered">
							<div class="portlet-title">
								<div class="caption">
									<i class=" icon-layers font-green"></i>
									<span class="caption-subject font-green bold uppercase">Desempeño de Cargadores</span>
								</div>
							</div>
							<div class="portlet-body">
								<div id="reporteCE" ></div>
							</div>
							<div class="portlet-body">
								<div id="reporteCC" ></div>
							</div>
							<div class="portlet-body">
								<div id="reporteCD" ></div>
							</div>
						</div>
					</div>
				</div>
				<?php
				$grafica=pinta_grafica('cg','reporteCE','espera','todo');
				echo $grafica;
				$grafica=pinta_grafica('cg','reporteCC','carga','todo');
				echo $grafica;
				$grafica=pinta_grafica('cg','reporteCD','descanso','todo');
				echo $grafica;

				
function eficienciaBORRAME($tabla,$ref,$mysqli,$fechamenor,$fechamayor,$va=0){
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
					return $promedio;//$promedio = $promedio*100/8;
					//Aquí termina lo chingüengüenchón... al menos para esta parte

   }
			 ?>

