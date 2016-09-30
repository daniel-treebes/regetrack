<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("db-settings.php"); //Require DB connection
/*
 * PROPEL
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/'.'vendor/propel/propel1/runtime/lib/Propel.php';
Propel::init($_SERVER['DOCUMENT_ROOT'].'/'.'build/conf/regetrack-conf.php');
require_once $_SERVER['DOCUMENT_ROOT'].'/'.'vendor/autoload.php';
set_include_path($_SERVER['DOCUMENT_ROOT'].'/'.'build/classes' . PATH_SEPARATOR . get_include_path());


//Retrieve settings
$stmt = $mysqli->prepare("SELECT id, name, value
	FROM ".$db_table_prefix."configuration");	
$stmt->execute();
$stmt->bind_result($id, $name, $value);

while ($stmt->fetch()){
	$settings[$name] = array('id' => $id, 'name' => $name, 'value' => $value);
}
$stmt->close();

//Set Settings
$emailActivation = $settings['activation']['value'];
$mail_templates_dir = "models/mail-templates/";
$websiteName = $settings['website_name']['value'];
$websiteUrl = $settings['website_url']['value'];
$emailAddress = $settings['email']['value'];
$resend_activation_threshold = $settings['resend_activation_threshold']['value'];
$emailDate = date('dmy');
$language = $settings['language']['value'];
$template = $settings['template']['value'];

$master_account = -1;

$default_hooks = array("#WEBSITENAME#","#WEBSITEURL#","#DATE#");
$default_replace = array($websiteName,$websiteUrl,$emailDate);

if (!file_exists($language)) {
	$language = "../models/languages/en.php";
}

if(!isset($language)) $language = "../models/languages/en.php";

//Pages to require
require_once($language);
require_once("class.mail.php");
require_once("class.user.php");
require_once("class.newuser.php");
require_once("funcs.php");

session_start();

//Global User Object Var
//loggedInUser can be used globally if constructed
if(isset($_SESSION["userCakeUser"]) && is_object($_SESSION["userCakeUser"]))
{
	$loggedInUser = $_SESSION["userCakeUser"];
}

?>
