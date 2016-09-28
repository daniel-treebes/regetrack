<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF']))


{
	die();
}



$module = explode('edita/', $_GET['ruta'])[1];
if($module == 'montacargas'){
  $exist = MontacargasQuery::create()->filterByIdmontacargas($_GET['id'])->filterByIdsucursal($loggedInUser->sucursal_activa)->exists();
    if(!$exist){
        header("Location: /montacargas.php");
        die();
    }  
}
require_once("models/header.php");
require_once( $_GET['ruta'].".php");


?>