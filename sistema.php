<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF']))


{
	die();
}



$module = explode('edita/', $_GET['ruta'])[1];
if($module == 'montacargas'){
  $exist = MontacargasQuery::create()->filterById($_GET['id'])->useBateriastiposQuery()->filterByIdsucursal($loggedInUser->sucursal_activa)->endUse()->exists();
    if(!$exist){
        header("Location: /montacargas.php");
        die();
    }  
}
require_once("models/header.php");
require_once( $_GET['ruta'].".php");


?>