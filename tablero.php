<?php

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("libs/libreriasJquery.php");

//--MONTACARGAS---
$montacargas=  MontacargasQuery::create()->filterByIdsucursal($loggedInUser->sucursales);

$montacargas_total = $montacargas->count();

$montacargas_desh_query = "
    SELECT id 
    FROM regetrac_sistemav2.deshabilitamc 
    JOIN montacargas ON deshabilitamc.idmontacargas = montacargas.idmontacargas 
    WHERE fecha_salida = '0000-00-00 00:00:00'  AND montacargas.idsucursal IN (".$loggedInUser->sucursales.") ;
";

$resultado = $mysqli->query($montacargas_desh_query);

$montacargas_desh_arr = array();
while( $fila = $resultado->fetch_array()){
    $montacargas_desh_arr[] = $fila['id']; // Inside while loop
}
 
$montacargas_desh = DeshabilitamcQuery::create()->filterByIdmontacargas($montacargas_desh_arr)->find();
$montacargas_desh_toal = $montacargas_desh->count();

//--BATERIAS---
$baterias= BateriasQuery::create()->filterByIdsucursal($loggedInUser->sucursales);

$baterias_total = $baterias->count();

$baterias_desh_query = "
    SELECT id 
    FROM regetrac_sistemav2.deshabilitabt 
    JOIN baterias ON deshabilitabt.bt = baterias.idbaterias 
    WHERE fecha_salida = '0000-00-00 00:00:00'  AND baterias.idsucursal IN (".$loggedInUser->sucursales.") ;
";

$resultado = $mysqli->query($baterias_desh_query);

$baterias_desh_arr = array();
while( $fila = $resultado->fetch_array()){
    $baterias_desh_arr[] = $fila['id']; // Inside while loop
}
 
$baterias_desh = DeshabilitabtQuery::create()->filterById($baterias_desh_arr)->find();
$baterias_desh_total = $baterias_desh->count();

//--CARGADORES---
$cargadores= CargadoresQuery::create()->filterByIdsucursal($loggedInUser->sucursales)->filterByCargadoresTipo('Cargador')->find();

$cargadores_total = $cargadores->count();

$cargadores_desh_query = "
    SELECT id 
    FROM regetrac_sistemav2.deshabilitacg 
    JOIN cargadores ON deshabilitacg.cg = cargadores.idcargadores
    WHERE cargadores.cargadores_tipo = 'Cargador' AND fecha_salida = '0000-00-00 00:00:00'  AND cargadores.idsucursal IN (".$loggedInUser->sucursales.") ;
";

$resultado = $mysqli->query($cargadores_desh_query);

$cargadores_desh_arr = array();
while( $fila = $resultado->fetch_array()){
    $cargadores_desh_arr[] = $fila['id']; // Inside while loop
}
 
$cargadores_desh = DeshabilitacgQuery::create()->filterById($cargadores_desh_arr)->find();
$cargadores_desh_total = $cargadores_desh->count();

//--BODEGAS---
$bodegas_espera = "
    SELECT * FROM uso_baterias_bodega 
    JOIN bodegas ON uso_baterias_bodega.bg = bodegas.id
    JOIN cargadores ON cargadores.idcargadores = bodegas.cg
    WHERE cargadores.cargadores_tipo = 'Bodega' AND uso_baterias_bodega.fecha_carga='0000-00-00 00:00:00' AND uso_baterias_bodega.fecha_descanso='0000-00-00 00:00:00' AND uso_baterias_bodega.fecha_salida= '0000-00-00 00:00:00' AND cargadores.idsucursal IN (".$loggedInUser->sucursales.") ;
";

$resultado = $mysqli->query($bodegas_espera);
$bodegas_espera = $resultado->num_rows;

$bodegas_descanso = "
    SELECT * FROM uso_baterias_bodega 
    JOIN bodegas ON uso_baterias_bodega.bg = bodegas.id
    JOIN cargadores ON cargadores.idcargadores = bodegas.cg
    WHERE cargadores.cargadores_tipo = 'Bodega' AND uso_baterias_bodega.fecha_salida= '0000-00-00 00:00:00' AND cargadores.idsucursal IN (".$loggedInUser->sucursales.") ;
";
$resultado = $mysqli->query($bodegas_descanso);
$bodegas_descanso = $resultado->num_rows;


//PENDIENTE
$bodegas_listo = 0;




?>

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
    
    #tablero h3{
        font-weight: bold;
        text-align: center;
    }
    #tablero i{
        text-align: center;
    }
    #tablero .number{
        font-size: 50px;
        text-align: center;
        font-weight: bold;
        
    }
    #tablero .number span{
        font-weight: 100;
    }
    .my_icons{
        font-size: 85px;
    }
    
    @media screen and (max-width: 768px) {
        #tablero_head {
            display: none;
        }
        .my_icons{
            font-size: 85px;
        }
        .tablero_head_movil{
            display: block !important;
        }
    }
    .highcharts-axis-title{
        font-size: 9px !important;
        font-weight: bold;
    }
</style>
<script src="rgraph/RGraph.common.core.js" ></script>
<script src="rgraph/RGraph.meter.js" ></script>
<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
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
</div>
<div class="row">
    <div class="col-sm-3">
        <!--div id="container-speed" class="visores" style=" height: 180px; float: left"></div-->
        <div id="eficienciaBTU" class="visores" style="height: 180px;"> </div>
       
    </div>
    <div class="col-sm-3">
        <!--div id="container-speed" class="visores" style=" height: 180px; float: left"></div-->
        <div id="eficienciaBTC" class="visores" style="height: 180px;"> </div>
       
    </div>
    <div class="col-sm-3">
        <!--div id="container-speed" class="visores" style=" height: 180px; float: left"></div-->
        <div id="eficienciaBTD" class="visores" style="height: 180px;"> </div>
       
    </div>
    <div class="col-sm-3">
        <!--div id="container-speed" class="visores" style=" height: 180px; float: left"></div-->
        <div id="eficienciaBG" class="visores" style="height: 180px;"> </div>
       
    </div>
    
</div>
<div id="tablero">
    <div class="row" id="tablero_head">
        <div class="col-sm-3 ">
        </div>
        <div class="col-sm-2">
            <h3>Total</h3>
        </div>
        <div class="col-sm-3">
             <h3>Deshabilitados</h3>
        </div>
        <div class="col-sm-2">
            <h3>%</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 ">
            <center>
                <i class="my_icons fa icon-montacarga"></i>
            </center>
             
        </div>
        <div class="col-sm-2 number">
            <h3 class="tablero_head_movil" style="display:none">Total</h3>
            <h1 style="color:green;font-weight: bold"><?php echo $montacargas_total?></h1>
        </div>
        <div class="col-sm-3 number">
            <h3 class="tablero_head_movil" style="display:none">Deshabilitados</h3>
            <h1 style="color:red;font-weight: bold"><?php echo $montacargas_desh_toal?></h1>
        </div>
        <div class="col-sm-2 number">
            <h3 class="tablero_head_movil" style="display:none">%</</h3>
            <h1 style="font-weight: bold"><?php echo round((($montacargas_total-$montacargas_desh_toal) * 100) / $montacargas_total)?> %</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 ">
             <center>
                <i class="my_icons fa icon-bateria" ></i>
             </center>
        </div>
        <div class="col-sm-2 number">
            <h3 class="tablero_head_movil" style="display:none">Total</h3>
            <h1 style="color:green;font-weight: bold"><?php echo $baterias_total?></h1>
        </div>
        <div class="col-sm-3 number">
            <h3 class="tablero_head_movil" style="display:none">Deshabilitados</h3>
            <h1 style="color:red;font-weight: bold"><?php echo $baterias_desh_total?></h1>
        </div>
        <div class="col-sm-2 number">
            <h3 class="tablero_head_movil" style="display:none">%</h3>
            <h1 style="font-weight: bold"><?php echo round((($baterias_total-$baterias_desh_total) * 100) / $baterias_total)?> %</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 ">
             <center>
                 <i class="my_icons fa icon-cargador"></i>
             </center>
        </div>
        <div class="col-sm-2 number">
            <h3 class="tablero_head_movil" style="display:none">Total</h3>
            <h1 style="color:green;font-weight: bold"><?php echo $cargadores_total?></h1>
        </div>
        <div class="col-sm-3 number">
            <h3 class="tablero_head_movil" style="display:none">Deshabilitados</h3>
            <h1 style="color:red;font-weight: bold"><?php echo $cargadores_desh_total?></h1>
        </div>
        <div class="col-sm-2 number">
            <h3 class="tablero_head_movil" style="display:none">%</h3>
            <h1 style="font-weight: bold"><?php echo round((($cargadores_total-$cargadores_desh_total) * 100) / $cargadores_total)?> %</h1>
        </div>
    </div>
    <div class="row" id="tablero_head">
        <div class="col-sm-3 ">
        </div>
        <div class="col-sm-2">
            <h3>Bat. Espera</h3>
        </div>
        <div class="col-sm-3">
             <h3>Bat. Descanso</h3>
        </div>
        <div class="col-sm-2">
            <h3>Bat. Listo</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 ">
             <center>
                 <i class="my_icons fa fa-th" style="font-size: 55px; margin-left: 25px; margin-top: 25px;"></i>
             </center>
        </div>
        <div class="col-sm-2 number">
            <h3 class="tablero_head_movil" style="display:none">Bat. Espera</h3>
            <h1 style="color:red;font-weight: bold"><?php echo $bodegas_espera?></h1>
        </div>
        <div class="col-sm-3 number">
            <h3 class="tablero_head_movil" style="display:none">Bat. Descanso</h3>
            <h1 style="color:blue;font-weight: bold"><?php echo $bodegas_descanso?></h1>
        </div>
        <div class="col-sm-2 number">
            <h3 class="tablero_head_movil" style="display:none">Bat. Listo</h3>
            <h1 style="font-weight: bold;color:green"><?php echo $bodegas_listo?></h1>
        </div>
    </div>
    
</div>
<div class="row" style="margin-top: 30px">
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
                                    y: -45,
                                    borderWidth: 0,
                                    useHTML: true
                                }
                            }
                        }
                    };
                </script>
<script>
    $(function () {
    var seriesOptions = [],
        seriesCounter = 0,
        names = ['USO'];

    /**
     * Create the chart when all data is loaded
     * @returns {undefined}
     */
    function createChart() {
        $('#container').highcharts('StockChart', {
            lang: {
                loading: 'Cargando...',
                months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                shortMonths: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                exportButtonTitle: "Exportar",
                printButtonTitle: "Importar",
                rangeSelectorFrom: "Desde",
                rangeSelectorTo: "Hasta",
                rangeSelectorZoom: "Período",
                downloadPNG: 'Descargar imagen PNG',
                downloadJPEG: 'Descargar imagen JPEG',
                downloadPDF: 'Descargar imagen PDF',
                downloadSVG: 'Descargar imagen SVG',
                printChart: 'Imprimir',
                resetZoom: 'Reiniciar zoom',
                resetZoomTitle: 'Reiniciar zoom',
                thousandsSep: ",",
                decimalPoint: '.'
            },
            rangeSelector : {
                buttons : [{
                        type : 'day',
                        count : 1,
                        text : '1D'
                }, {
                        type : 'week',
                        count : 1,
                        text : '1S'
                }, {
                        type : 'month',
                        count : 1,
                        text : '1M'
                }, {
                        type : 'all',
                        text : 'Todo'
                }],
                selected : 2,
                inputEnabled : true
            },
            title: {
                text: 'MONTACARGAS'
            },
         
            legend : {
                enabled : true
            },
            
            yAxis : {
                title : {
                        text : 'HORAS'
                },
            },

            plotOptions: {
                series: {
                    compare: 'percent',
                    showInNavigator: true
                }
            },
            
            tooltip: {
                style: {
                        width: '200px'
                },
                valueDecimals: 4,
                shared : true
            },

            series: seriesOptions
        });
    }

    $.each(names, function (i, name) {
      
        $.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=' + name.toLowerCase() + '-c.json&callback=?',    function (data) {

            seriesOptions[i] = {
                name: name,
                data: [[1255305600000,261.76],
                    [1255392000000,262.79],
                    [1255478400000,267.39],
                    [1255564800000,264.69],
                    [1255651200000,274.65],
                    [1255910400000,275.77],
                    [1255996800000,275.58],
                    [1256083200000,275.27],
                    [1256169600000,276.77],
                    [1256256000000,276.57],
                    [1256515200000,276.83],
                    [1256601600000,273.87],
                    [1256688000000,269.88],
                    [1256774400000,275.25],
                    [1,267.79]],
            };

            // As we're loading the data asynchronously, we don't know what order it will arrive. So
            // we keep a counter and create the chart when all the data is loaded.
            seriesCounter += 1;

            if (seriesCounter === names.length) {
                createChart();
            }
        });
    });
});
</script>
<?php

    $grafica=pinta_grafica('mc','reporteMC','uso','todo');
    echo $grafica;


    $grafica=pinta_grafica('cg','reporteCE','espera','todo');
    echo $grafica;
    $grafica=pinta_grafica('cg','reporteCC','carga','todo');
    echo $grafica;
    $grafica=pinta_grafica('cg','reporteCD','descanso','todo');
    echo $grafica;
    
    $grafica=pinta_grafica('bt','reporteBU','uso','todo');
    echo $grafica;
    $grafica=pinta_grafica('bt','reporteBE','espera','todo');
    echo $grafica;
    $grafica=pinta_grafica('bt','reporteBC','carga','todo');
    echo $grafica;
    $grafica=pinta_grafica('bt','reporteBD','descanso','todo');
    echo $grafica;
    
    $efidato=eficiencia('bt','uso','eficienciaBTU');
    echo $efidato['script'];
    $efidato=eficiencia('bt','carga','eficienciaBTC');
    echo $efidato['script'];
    $efidato=eficiencia('bt','descanso','eficienciaBTD');
    echo $efidato['script'];
    $efidato=eficiencia('cg','uso','eficienciaBG','Bodega');
    echo $efidato['script'];
    

?>

