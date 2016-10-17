<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF']))
{
	die();
}

$module = explode('edita/', $_GET['ruta'])[1];
if($module == 'montacargas'){
  $exist = MontacargasQuery::create()->filterByIdmontacargas($_GET['id'])->filterByIdsucursal($loggedInUser->sucursales)->exists();
    if(!$exist){
        header("Location: /montacargas.php");
        die();
    }  
}
elseif($module == 'baterias'){
  $exist = BateriasQuery::create()->filterByIdbaterias($_GET['id'])->filterByIdsucursal($loggedInUser->sucursales)->exists();
    if(!$exist){
        header("Location: /baterias.php");
        die();
    }  
}
elseif($module == 'cargadores'){
  $exist = CargadoresQuery::create()->filterByIdcargadores($_GET['id'])->filterByIdsucursal($loggedInUser->sucursales)->exists();
    if(!$exist){
        header("Location: /bodegas.php");
        die();
    }  
}
require_once("models/header.php");
require_once( $_GET['ruta'].".php");


?>