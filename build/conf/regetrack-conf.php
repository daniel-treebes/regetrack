<?php
// This file generated by Propel 1.7.1 convert-conf target
// from XML runtime conf file /home/treebes/regetrack/runtime-conf.xml
$conf = array (
  'datasources' => 
  array (
    'regetrack' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'mysql:host=localhost;dbname=regetrac_sistema',
        'user' => 'regetrac_sistema',
        'password' => 'Hola.1234',
      ),
    ),
    'default' => 'regetrack',
  ),
  'generator_version' => '1.7.1',
);
//$conf['classmap'] = include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classmap-regetrack-conf.php');
return $conf;