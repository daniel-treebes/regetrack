<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("../models/db-settings.php");
require_once("../models/config.php");

$uploaddir = getcwd()."/archivos";
$filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME)."-".time();
$uploadfile = $uploaddir."/".$filename.'.cvs';
 if ( 0 < $_FILES['file']['error'] ) {
        echo 'Ercd ror: ' . $_FILES['file']['error'] . '<br>';
    }else {
               
		if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    sleep(1);
    $filecsv = $uploaddir."/".$filename.".cvs";
    $handle = fopen($filecsv, 'r');
    
    $count = 0;
   // $q = MontacargasQuery::create()->useBateriastiposQuery()->filterByIdsucursal($loggedInUser->sucursal_activa)->endUse()->find();
    while (($data = fgetcsv($handle, 100000, ",")) !== FALSE) {
      
      if($count != 0){
          
        $exist = MontacargasQuery::create()->filterById($data[0])->useBateriastiposQuery()->filterByIdsucursal($loggedInUser->sucursal_activa)->endUse()->exists();
        if($exist){
            $montacargas = MontacargasQuery::create()->findPk($data[0]);
           
        }else{
            $montacargas = new Montacargas(); 
        }  
        
        $montacargas->setNombre($data[1])
                    ->setModelo($data[2])
                    ->setTipo($data[3])
                    ->setCiclosMant($data[4])
                    ->setCiclosMant($data[5])
                    ->save();
        
      }
      $count ++ ;
      
     
    }


//$mysqli->prepare($query);
//Try to execute query (not stmt) and catch mysqli error from engine and php error
if (!($stmt = $mysqli->query($sql))) {
    echo "\nFallo query: ERROR: (" . $mysqli->errno . ") " . $mysqli->error;
};
echo "Montacargas actualizados";


} else {
    echo "Fallo";
}
		
    }



function actualizaBd(){

}

?>
   

<?php

?>
