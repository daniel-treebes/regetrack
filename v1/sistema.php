<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF']))


{
	die();
}

require_once("models/header.php");

require_once( $_GET['ruta'].".php");


?>