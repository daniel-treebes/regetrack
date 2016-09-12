<?php


$nombrePagina="Editando bateria";
$acciones=[];
$acciones[0][0]="Nuevo";
$acciones[0][1]="accionAñadir";
$acciones[1][0]="Exportar";
$acciones[1][1]="javascript:exporta();";
$acciones[2][0]="Importar";
$acciones[2][1]='javascript:importa();';




			  



$query="
SELECT
	id as 'Id',
	bateria_tipo as 'Tipo',
	num_serie as 'Núm de Serie',
	'Ciclos de uso' as 'Ciclos de uso',
	'Ciclos para preventivo' as 'Ciclos para preventivo',
	'Ciclos para correctivo' as 'Ciclos para correctivo',
	'Estado actual' as 'Estado actual'
FROM
	baterias
WHERE
id= ".$_GET['id']."
";

$id;
$tipo;
$serie;
$uso;
$preventivo;
$correctivo;
$actual;
$resultado = $mysqli->query($query);
while($fila = $resultado->fetch_array()) {
				$id= $fila['Id'];
				$tipo= $fila['Tipo'];
				$serie= $fila['Núm de Serie'];
				$uso= $fila['Ciclos de uso'];
				$preventivo= $fila['Ciclos para preventivo'];
				$correctivo= $fila['Ciclos para correctivo'];
				$actual= $fila['Estado actual'];
}





?>

    <script>
	
	</script>
				<div class="row">
                        <div class="col-md-6 ">
							<div class="portlet box red ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-edit"></i>Datos Bateria <?php  echo $_GET['id'] ?> </div>
                                    <div class="tools">
                                        <a href="" class="collapse" data-original-title="" title=""> </a>
                                        
                                        <a href="" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-body">
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Numero identificador:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="Default Input" value="<?php  echo $fila['Id']; ?> "> </div>
												</div>
                                            
                                            
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Tipo</label>
                                                <div class="col-md-9">
                                                    <select class="form-control">
                                                      <?php echo imprimeTipos() ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-actions right1 gray" >
                                            
                                            <button type="submit" class="btn green">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
						</div>
						<div class="col-md-6 ">
								<script type="text/javascript" src="libs/jsqrcode-master/src/llqrcode.js"></script>
								<script type="text/javascript" src="libs/jsqrcode-master/src/webqr.js"></script>
							<div class="portlet box red ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-camera"></i>Modulo QR <?php  echo $_GET['id'] ?> </div>
                                    <div class="tools">
                                        <a href="" class="collapse" data-original-title="" title=""> </a>
                                        
                                        <a href="" class="remove" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div id="mainbody">
												<table class="tsel" border="0" width="100%">
												<tr>
												<td valign="top" align="center" width="50%">
												<table class="tsel" border="0">
												<tr>
												<td><a id="webcamimg" onclick="setwebcam()" align="left" />Camara</a></td>
												<td><a id="qrimg"  onclick="setimg()" align="right"/>Archivo<a/></tr>
												<tr><td colspan="2" align="center">
												<div id="outdiv">
												</div></td></tr>
												</table>
												</td>
												</tr>
												<tr><td colspan="3" align="center">
												
												</td></tr>
												<tr><td colspan="3" align="center">
												<div id="result"></div>
												</td></tr>
												</table>

                                </div>
						</div>
<style>#qr-canvas{
    /*display:none;*/
}</style>
			<canvas id="qr-canvas" width="800" height="600"></canvas>
<script type="text/javascript">load();</script>
             
				
            
            <?php  ?>

		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
				
				      <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
				
				 <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
		<!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
		<!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
		


<?php
function imprimeTipos(){
?>
	 <option>Tipo 1</option>
     <option>Tipo 2</option>
     <option>Tipo 3</option>
     <option>Tipo 4</option>
	 <option>Tipo 5</option>
<?php                                                       
}
require_once("tema/comun/footer.php");
?>