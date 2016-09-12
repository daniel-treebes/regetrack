<?php


$nombrePagina="Editando bateria";
$acciones=[];
$acciones[0][0]="Nuevo";
$acciones[0][1]="accionAñadir";
$acciones[1][0]="Exportar";
$acciones[1][1]="javascript:exporta();";
$acciones[2][0]="Importar";
$acciones[2][1]='javascript:importa();';


?>
<style>
#qr-canvas{
    display:none;
}
#pasos{
    display:none;
}
#scaner{
	display: none;
}
.instrucciones{
	display: none;
}

</style>
  
				<div class="row">
					
					
					<div class="col-md-12" id="quehacer">
						<h1>¿Que deseas hacer?</h1> <br><br>
						<div class="clearfix">
						<div class="btn-group btn-group btn-group-justified">
							<div class="col-md-4 ">
                           <a href="javascript:usartbt(1);" class="btn blue btn-block" style="height: 110px;"><h1> Usar <i class="fa fa-battery-full"></i></h1>Utilizar una bateria de la bodega y colocar en un montacargas.</a>
							</div>
							<div class="col-md-4 ">
                           <a href="javascript:cargarbt(2);" class="btn yellow btn-block" style="height: 110px;"><h1> Cargar <i class="fa fa-battery-empty"></i></h1>Colocar una bateria de un montacargas en su cargador.</a>
						   </div>
							<div class="col-md-4 ">
                           <a href="javascript:reposarbt(3);" class="btn red btn-block" style="height: 110px;"><h1> Reposar <i class="fa fa-battery-half"></i></h1>Poner a reposar una bateria que ya este cargada.</a>
						   </div>
							
                        </div>
						</div>
					</div>
					<div class="row">
					<div class="col-md-12 " id="pasos">
					<div class="portlet-body ">
                                    <div class="mt-element-step">
                                        
                                        <div class="row step-line">
                                            <div class="mt-step-desc">
                                                
                                            <div class="col-md-3 mt-step-col first active" id="guiaPasos1">
                                                <div class="mt-step-number bg-dark font-grey">1</div>
                                                <div class="mt-step-title uppercase font-grey-cascade" id="pasos1">MONTACARGAS</div>
                                                <div class="mt-step-content font-grey-cascade"></div>
                                            </div>
                                            <div class="col-md-3 mt-step-col "id="guiaPasos2">
                                                <div class="mt-step-number bg-dark font-grey" >2</div>
                                                <div class="mt-step-title uppercase font-grey-cascade"id="pasos2">VERIFICAR BATERÍA</div>
                                                <div class="mt-step-content font-grey-cascade"></div>
                                            </div>
                                            <div class="col-md-3 mt-step-col "id="guiaPasos3">
                                                <div class="mt-step-number bg-dark font-grey">3</div>
                                                <div class="mt-step-title uppercase font-grey-cascade"id="pasos3">TRASLADO DE BATERIA</div>
                                                <div class="mt-step-content font-grey-cascade"></div>
                                            </div>
                                            <div class="col-md-3 mt-step-col last "id="guiaPasos4">
                                                <div class="mt-step-number bg-dark font-grey" >4</div>
                                                <div class="mt-step-title uppercase font-grey-cascade"id="pasos4">CARGAR BATERIA</div>
                                                <div class="mt-step-content font-grey-cascade"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
					</div>
					</div>
					</div>
                    <div class="row"> 
						<div class="col-md-12" id="scaner">
								<script type="text/javascript" src="libs/jsqrcode-master/src/llqrcode.js"></script>
								<script type="text/javascript" src="libs/jsqrcode-master/src/webqr.js"></script>
							<div class="col-md-6" id="indicacionesPaso">
                                                
                            </div>	
							<div class="col-md-6" id="camara">
                               <div id="mainbody">
									<a id="webcamimg"  align="left" /></a>
									<a id="qrimg"   align="right"/></a>
									<div id="outdiv"></div>
									<div id="result"></div>
									<canvas id="qr-canvas" width="80" height="60"></canvas>  
							    </div>
							</div>
							
						</div>
				</div>

			
<script type="text/javascript">
load();
window.onload = function() {
  setwebcam();
};







 function usartbt(){
	muestraPaso(1)
 }
 function cargarbt(){
	muestraPaso(2)
 }
 function reposarbt(){
	muestraPaso(3)
 }
 
 function muestraPaso(elPaso) {
	cambiaTitulosPasos(elPaso)
	jQuery('#pasos').show(500)
	jQuery('#quehacer').hide(500)
	jQuery('#scaner').show(500)
	
					
 }
 var proceso;
 function cambiaTitulosPasos(elPaso) {
	proceso=elPaso;
	jQuery('#pasos1').html(pasos[elPaso-1][0])
	jQuery('#pasos2').html(pasos[elPaso-1][1])
	jQuery('#pasos3').html(pasos[elPaso-1][2])
	jQuery('#pasos4').html(pasos[elPaso-1][3])
	
	if (proceso==1) {
		  $.ajax({
                data: {funcion: 'dameBodegas'},
                url:   'usos/bodega.php',
                type:  'post',
                success:  function (response) {
                        $("#indicacionesPaso").html(response);
                }
        });
		
	}
 }
 
 
 var secuenciaDePasos=0;
 function cambiaPaso(cadena) {
    
		modulo=dameModulo(cadena);
		id=dameId(cadena)
	
	if (secuenciaDePasos==0) {
		
		
		if (modulo=="bodega") {
			
			$.getScript( "usos/bodegas.js" )
				.done(function( script, textStatus ) {
					
				  paso1(modulo,id);
				  
				})
				.fail(function( jqxhr, settings, exception ) {
				  alert("Error de libreria")
			  });
			
		
		}else{
			alert("Debe escanear primero la bodega")
		}
		//
		
	 }else if (secuenciaDePasos==1) {
		 paso2(modulo,id);
		 
	 }else if (secuenciaDePasos==2) {
		 paso3(modulo,id);
		
	 }else if (secuenciaDePasos==3) {
		 paso4(modulo,id);
		
	 }
	
 }
  

 


 
 
 
 var pasos=new Array();
 pasos[0]=new Array();
 pasos[1]=new Array();
 pasos[2]=new Array();
 
 pasos[0][0]="Escanear Bodega";
 pasos[0][1]="Escanear Batería";
 pasos[0][2]="Escanear Montacargas";
 pasos[0][3]="Escanear Batería";
 
 pasos[1][0]="Escanear Montacargas";
 pasos[1][1]="Escanear Batería";
 pasos[1][2]="Escanear Cargador";
 pasos[1][3]="Escanear Batería";

 pasos[2][0]="Escanear Cargador";
 pasos[2][1]="Escanear Batería";
 pasos[2][2]="Escanear Bodega";
 pasos[2][3]="Escanear Batería";
 
 
</script>
<div id="bateriasDisponibles">
	
</div>

<div id="iusar11" class="instrucciones">
	
</div>    
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

require_once("tema/comun/footer.php");
?>