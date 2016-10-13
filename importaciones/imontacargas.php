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
        $sucursales = explode(',', $loggedInUser->sucursales); 
        $exist = MontacargasQuery::create()->filterByIdmontacargas($data[0])->filterByIdsucursal($sucursales)->exists();
        if($exist){
            $montacargas = MontacargasQuery::create()->findPk($data[0]);
           
        }else{
            $montacargas = new Montacargas(); 
        }  

        $montacargas->setMontacargasModelo($data[1])
                    ->setMontacargasMarca($data[2])
                    ->setMontacargasComprador($data[3])
                    ->setMontacargasC($data[4])
                    ->setMontacargasK($data[5])
                    ->setMontacargasP($data[6])
                    ->setMontacargasT($data[7])
                    ->setMontacargasE($data[8])
                    ->setMontacargasVolts($data[9])
                    ->setMontacargasAmperaje($data[10]);
        
       
        
        $baterias_modelos = BateriasQuery::create()->select(array('baterias_modelo'))->filterByBateriasVolts($data[9])->filterByBateriasAmperaje($data[10])->filterByBateriasT($data[7])->filterByBateriasE($data[8])->groupByBateriasModelo()->find();
        //ASOCIACION DE BATERIAS
        $sucursales = explode(',', $loggedInUser->sucursales);
        $baterias = BateriasQuery::create()->filterByIdsucursal($sucursales)->filterByBateriasModelo($baterias_modelos)->find();
        $bateria = new Baterias();
        foreach ($baterias as $bateria){
            $montacargas_baterias = new MontacargasBaterias();
            $montacargas_baterias->setIdbaterias($bateria->getIdbaterias())
                                 ->setIdmontacargas($montacargas->getIdmontacargas())
                                 ->save();
        }
        
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
