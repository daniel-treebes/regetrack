<?php
   $nombrePagina="Editando bateria";
   $acciones=[];
   $acciones[0][0]="Nuevo";
   $acciones[0][1]="accionAñadir";
   $acciones[1][0]="Exportar";
   $acciones[1][1]="javascript:exporta();";
   $acciones[2][0]="Importar";
   $acciones[2][1]='javascript:importa();';
   
      
   
   
  
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
	<?php   
   include ('queryscompartidos.php');   
   include("bt/infomc.php");
   include("bt/infobd.php");
    include("bt/infobt.php");
		
?>
</div>


<div class="row">
	<?php   
   include("bt/cambia.php");
   include("bt/scan.php");		   
		
?>
</div>


<?php
require_once("libs/libreriasJquery.php");
?>
<script src="edita/bt/bt.js" type="text/javascript"></script>
<script>
    $('.easy-pie-chart .number.transactions').easyPieChart({
                  animate: 1000,
                  size:  75,
                  lineWidth: 3,
                  barColor: App.getBrandColor('<?php  echo $colorUso; ?>')
              });
   
              $('.easy-pie-chart .number.visits').easyPieChart({
                  animate: 1000,
                  size: 75,
                  lineWidth: 3,
                  barColor: App.getBrandColor('green')
              });
   
              $('.easy-pie-chart .number.bounce').easyPieChart({
                  animate: 1000,
                  size: 75,
                  lineWidth: 3,
                  barColor: App.getBrandColor('red')
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