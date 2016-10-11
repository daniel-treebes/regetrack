<?php


//BATERIAS
require_once("models/config.php");

require_once 'libs/PHPExcel/Classes/PHPExcel/IOFactory.php';

/*
$b= BateriasQuery::create()->findPk(58);
$b->setBateriasVolts(NULL)->setBateriasAmperaje(NULL)->setBateriasC(NULL)->setBateriasK(NULL)->setBateriasP(NULL)->save();
exit();
*/
/*
$inputFileName = 'bat monta carga de pisa repartido.xlsx';
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($inputFileName);
$sheet = $objPHPExcel->getSheet(4); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();
for ($row = 3; $row <= $highestRow; $row++){ 
    
    //Read a row of data into an array
    $rowData = $sheet->rangeToArray('A' . $row . ':' . 'M'     . $row,NULL,TRUE,FALSE);
    $cargador = new Montacargas();
    $cargador->setMontacargasModelo($rowData[0][1])
             ->setMontacargasMarca($rowData[0][2])
             ->setMontacargasComprador($rowData[0][5])
             ->setMontacargasT($rowData[0][11])
             ->setMontacargasE($rowData[0][12])   
             ->setIdsucursal(1);
    
    if($rowData[0][3] != 'N/A'){
        $cargador->setMontacargasVolts($rowData[0][3]);
    }
    if($rowData[0][4] != 'N/A'){
        $cargador->setMontacargasAmperaje($rowData[0][4]);
    }
    if($rowData[0][8] != 'N/A'){
        $cargador->setMontacargasC($rowData[0][9]);
    }
    if($rowData[0][9] != 'N/A'){
        $cargador->setMontacargasK($rowData[0][9]);
    }
    if($rowData[0][10] != 'N/A'){
        $cargador->setMontacargasP($rowData[0][10]);
    }
     
    $cargador->save();
    
    $cargador->setMontacargasNombre('M'.$cargador->getIdmontacargas())->save();
       

    
}
exit();
*/
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
		<?php  require_once("tema/comun/topcontenedor.php");?>
            </div>
            <div class="col-md-12 ">
		<?php
                //$queryTM="SELECT COUNT( montacargas.idmontacargas ) FROM montacargas  WHERE montacargas.idsucursal = ".$loggedInUser->sucursal_activa;
                //$resultadoTM=$mysqli->query($queryTM);
                $filaTM=  MontacargasQuery::create()->filterByIdsucursal($loggedInUser->sucursal_activa)->count();
                
                //$queryTB="SELECT COUNT( baterias.id ) FROM baterias JOIN bateriastipos ON bateriastipos.id = tipo WHERE bateriastipos.idsucursal = ".$loggedInUser->sucursal_activa;
                //$resultadoTB=$mysqli->query($queryTB);
                $filaTB=  BateriasQuery::create()->filterByIdsucursal($loggedInUser->sucursal_activa)->count();
                
              
                //$queryTC="SELECT COUNT( cargadores.id ) FROM cargadores JOIN bateriastipos ON bateriastipos.id = tipo WHERE bateriastipos.idsucursal = ".$loggedInUser->sucursal_activa;
                //$resultadoTC=$mysqli->query($queryTC);
                $resultadoTC = CargadoresQuery::create()->filterByIdsucursal($loggedInUser->sucursal_activa)->count();
				/*
                $valor4=eficiencia("uso_baterias_bodega","bg",$mysqli,"fecha_entrada","fecha_salida");
                $valor4=round($valor4,2);
                */
                //$filaTC=$resultadoTC->fetch_array();
				/*
				$queryImc="SELECT COUNT(deshabilitamc.id) as inactivos 
                                            FROM deshabilitamc 
                                            JOIN montacargas ON montacargas.id = deshabilitamc.id
                                            JOIN bateriastipos ON montacargas.tipo = bateriastipos.id
                                            JOIN sucursal ON bateriastipos.idsucursal = sucursal.idsucursal
                                            WHERE fecha_salida='0000-00-00 00:00:00' AND sucursal.idsucursal = ".$loggedInUser->sucursal_activa;
                                
                                */
                
				$mcInactivos = DeshabilitamcQuery::create()->filterByFechaSalida(NULL)->useMontacargasQuery()->filterByIdsucursal($loggedInUser->sucursal_activa)->endUse()->count();	
				//$resInactivos=$mysqli->query($queryImc);
                               
				//$mcInactivos=0;
				//if ($fila=$resInactivos->fetch_array()) $mcInactivos=$fila['inactivos'];
                                /*
                                $queryIcg="SELECT COUNT(deshabilitacg.id) as inactivos 
                                            FROM deshabilitacg 
                                            JOIN montacargas ON montacargas.id = deshabilitacg.id
                                            JOIN bateriastipos ON montacargas.tipo = bateriastipos.id
                                            JOIN sucursal ON bateriastipos.idsucursal = sucursal.idsucursal
                                            WHERE fecha_salida='0000-00-00 00:00:00' AND sucursal.idsucursal = ".$loggedInUser->sucursal_activa;
                                

				$resInactivos=$mysqli->query($queryIcg);
                                 * 
                                 */
                                
				$cgInactivos= DeshabilitacgQuery::create()->filterByFechaSalida(NULL)->useCargadoresQuery()->filterByIdsucursal($loggedInUser->sucursal_activa)->endUse()->count();
                               
                                /*
                                if ($fila=$resInactivos->fetch_array())$cgInactivos=$fila['inactivos'];

                                $queryIbt="SELECT COUNT(deshabilitabt.id) as inactivos 
                                            FROM deshabilitabt 
                                            JOIN montacargas ON montacargas.id = deshabilitabt.id
                                            JOIN bateriastipos ON montacargas.tipo = bateriastipos.id
                                            JOIN sucursal ON bateriastipos.idsucursal = sucursal.idsucursal
                                            WHERE fecha_salida='0000-00-00 00:00:00' AND sucursal.idsucursal = ".$loggedInUser->sucursal_activa;
                                
				$resInactivos=$mysqli->query($queryIbt);
				$btInactivos=0;
				if ($fila=$resInactivos->fetch_array())$btInactivos=$fila['inactivos'];
				*/
                                $btInactivos = DeshabilitabtQuery::create()->filterByFechaSalida(NULL)->useBateriasQuery()->filterByIdsucursal($loggedInUser->sucursal_activa)->endUse()->count();
				
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
                            <i class="my_icons fa icon-montacarga"></i>
                        </center>
                    </div>
					<?php
						if($mcInactivos>0) $clasemci="inactivos";
						else $clasemci="activos";
					?>
                    <div class="col-lg-2 col-md-8 col-sm-8 col-xs-8">
                        <center>
                            Deshabilitados<?php echo '<span class="'.$clasemci.'">'.$mcInactivos.'/'.$filaTM.'</span>';?>
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
                        <i class="my_icons fa icon-cargador"></i>
                    </div>
                    
                    <div class="col-lg-2 col-md-8 col-sm-8 col-xs-8">
                        <?php
                     
                            
                            $clasecgi = "";
                            if($cgInactivos>0){
                                $clasecgi = 'inactivos';
                            }else{
                                $clasecgi = 'activos';
                            }
                        ?>
                          
                        <center>
                            Deshabilitados<?php echo '<span class="'.$clasecgi.'">'.$cgInactivos.'/'.$resultadoTC.'</span>';?>
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
                        <i class="my_icons fa icon-bateria"></i>
                    </div>
					<?php
						if($btInactivos>0) $clasebti="inactivos";
						else $clasebti="activos";
					?>
                    <div class="col-lg-2 col-md-8 col-sm-8 col-xs-8">
                        <center>
                            Deshabilitados<?php echo '<span class="'.$clasebti.'">'.$btInactivos.'/'.$filaTB.'</span>';?>
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
                                    <i class="fa icon-montacarga font-green"></i>
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
                                        <i class="fa icon-bateria font-green"></i>
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
									<i class="fa icon-cargador font-green"></i>
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
                                ?>

