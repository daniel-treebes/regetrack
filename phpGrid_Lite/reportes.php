<?php
   $nombrePagina="Reportes";

   $acciones=[];
/*
   $acciones[0][0]="Nuevo";
   $acciones[0][1]="accionAñadir";
   $acciones[1][0]="Exportar";
   $acciones[1][1]="javascript:exporta();";
   $acciones[2][0]="Importar";
   $acciones[2][1]='javascript:importa();';
*/   
   
   require_once("../models/config.php");
   if (!securePage($_SERVER['PHP_SELF'])){die();}
   
   require_once("../models/header.php");

    define('SERVER_ROOT', str_replace(str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'])),'', str_replace('\\', '/',dirname(__FILE__))));
    define('DEBUG', false); // *** MUST SET TO FALSE WHEN DEPLOYED IN PRODUCTION ***
    /******** DO NOT MODIFY ***********/
    require_once('phpGrid.php');
    /**********************************/   
     

   
   ?>
<div class="row">
   <div class="col-md-12">
      <?php require_once("../tema/comun/topcontenedor.php");?>
      
      <?php
$dg = new C_DataGrid("SELECT * FROM uso_baterias_bodega", "orderNumber", "orders");


$dg -> display();
?>
      
      
   </div>
</div>


<?php
   require_once("../tema/comun/footer.php");
   ?>