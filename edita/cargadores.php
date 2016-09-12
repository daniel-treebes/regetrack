<?php
   $nombrePagina="Edita Cargadores";
   $acciones=[];
  
/* 
 *Inicializamos variables
 */
//MONTACARGAS
   $id;
   $nombre;
   $modelo;
   $tipo;
   $EstadoActual;
   $ProximoCambio;
   $SaludBaterias;

//BATERIAS
   $horasDeUso=0;
   $tiempoDeUso=0;
   $horasDeUso=0;
   $ciclos=0;
   $salud=0;
   $idMovimientoBtaMC=0;
   
//Bodega
  $idMovimientoBateriaDescansada=0;
  $bodegaDisponible=0;
  $bateriaDisponible=0;
  $horasBateriaDescansada=0;
  $minutosBateriaDescansada=0;
   
   ?>
   <div class="row">
	  <?php include("cg/infocg.php");?>
   </div>
   <?php
   require_once("libs/libreriasJquery.php");
   ?>
   	<script src="https://code.highcharts.com/stock/highstock.js"></script>
	<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>

   <script src="edita/cg/cg.js" type="text/javascript"></script>

   <script>
	   $('.easy-pie-chart .number.btact').easyPieChart({
		 animate: 1000,
		 size:  75,
		 lineWidth: 3,
		 barColor: App.getBrandColor('<?php  echo $colorbtact; ?>')
	  });
	  
	  $('.easy-pie-chart .number.btant').easyPieChart({
		 animate: 1000,
		 size: 75,
		 lineWidth: 3,
		 barColor: App.getBrandColor('<?php  echo $colorbtant; ?>')
	  });
   </script>
   
   <style>
	  #result{
		 display: none;
	  }
   </style>
   <?php                                                       
   require_once("tema/comun/footer.php");
   ?>