<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("../models/db-settings.php");

$uploaddir = getcwd()."/archivos";
$filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME)."-".date('Y-m-d-H:i:s');
$uploadfile = $uploaddir."/".$filename.'.cvs';
 if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }else {
       
		if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    sleep(1);
			$sql="
LOAD DATA LOCAL INFILE '".$uploaddir."/".$filename.".cvs' 
REPLACE INTO TABLE bodegas 
CHARACTER SET utf8 
FIELDS TERMINATED BY ',' 
OPTIONALLY ENCLOSED BY '\"' 
ESCAPED BY '\"' 
IGNORE 1 LINES
(id, nombre)
";


//$mysqli->prepare($query);
//Try to execute query (not stmt) and catch mysqli error from engine and php error
if (!($stmt = $mysqli->query($sql))) {
    echo "\nFallo query: ERROR: (" . $mysqli->errno . ") " . $mysqli->error;
};
echo "Bodegas actualizadas";


} else {
    echo "Fallo";
}
		
    }



function actualizaBd(){

}

?>
   

<?php

?>
