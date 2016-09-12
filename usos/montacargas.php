<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("../models/db-settings.php");

if($_POST['funcion']=="dameBodegas"){
dameMontacargasBaterias($mysqli);
}
if($_POST['funcion']=="saleBateriaBodega"){
saleBateriaMontacarga($mysqli,$_POST['bateria'],$_POST['montacarga']);
}
if($_POST['funcion']=="entraBateriaBodega"){
entraBateriaMontecarga($mysqli,$_POST['bateria'],$_POST['montacarga']);
}

/*
$hostname = 'localhost';
$username = 'pruebast_reget';
$password = 'o-8hA!dWh@_o';
$dbname = 'pruebast_regetrack';


// Create connection
$con=mysqli_connect($hostname,$username,$password,$dbname);

if($_GET['funcion']=="dameMontacargas"){
dameMontacargasBaterias($con);
}
elseif($_GET['funcion']=="saleBateriaMontacarga"){
saleBateriaMontacarga($con,3,1);    
}
elseif($_GET['funcion']=="entraBateriaMontacarga"){
entraBateriaMontacarga($con,3,1);
}
else
echo "error";
*/
//Sección de baterías - montacargas
//function saleBateriaMontacarga($con,$bateria,$montacarga){
function saleBateriaMontacarga($mysqli,$bateria,$montacarga){
		$busca = "
				SELECT * FROM
				uso_baterias_montacargas
				WHERE
				bt = ".$bateria." AND
		mc = ".$montacarga." and
		fecha_salida = 0
		";
		
		if($result = $mysqli->query($busca)){
		//if($result=mysqli_query($con,$busca)){
		$inserta = "UPDATE
		uso_baterias_montacargas
		SET
		fecha_salida =  now()
		WHERE
		bt = ".$bateria." AND
		mc = ".$montacarga." and
		fecha_salida = 0";
		
		$result = $mysqli->query($inserta);
				
	//	$result=mysqli_query($con,$inserta);
		}
		else{
		echo "Este montacargas no cuenta con una batería activa";
}
      //  mysqli_close($con);

}

//function entraBateriaMontacarga($con,$bateria,$montacarga){
function entraBateriaMontacarga($mysqli,$bateria,$montacarga){
	$inserta="INSERT INTO  pruebast_regetrack.uso_baterias_montacargas (
id ,
mc ,
bt ,
fecha_entrada ,
fecha_salida ,
usuario
)
VALUES (
NULL ,  ".$montacarga.",  ".$bateria.",  now(),  0,  '1'
);
";
$result = $mysqli->query($inserta);
//mysqli_query($con, $inserta);
//mysqli_close($con);
}

//function dameMontacargasBaterias($con){
function dameMontacargasBaterias($mysqli){
		$query="
			SELECT 
uso_baterias_montacargas.id as id, 
mc, 
bt, 
display_name as usuario,
CONCAT(
TIMESTAMPDIFF(day, fecha_entrada, now()),'D ',    
TIMESTAMPDIFF(hour, fecha_entrada, now())-TIMESTAMPDIFF(day, fecha_entrada, now())*24,'H  ',
TIMESTAMPDIFF(minute, fecha_entrada, now())-(TIMESTAMPDIFF(hour, fecha_entrada, now()))*60,'M') AS tiempo

FROM 
uso_baterias_montacargas, 
baterias,
montacargas,
uc_users

wHERE 
fecha_salida=0 
and bt = baterias.id 
and mc = montacargas.id
and uc_users.id = usuario
group by uso_baterias_montacargas.id order by
TIMESTAMPDIFF(minute, fecha_entrada, now())DESC
			";
		
			$result = $mysqli->query($query);
            //$result=mysqli_query($con,$query);
				
			
			
			$regreso ='	<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Id Movimiento</th>
							<th>Montacargas</th>
							<th>Batería</th>
							<th>Usuario</th>
							<th>Último cambio</th>
						</tr>
					</thead>
				   
					<tbody>';
			$i=0;
				if (!$result) die('Couldn\'t fetch records');
					while($fila = $result->fetch_array()){
						
						$regreso.="<tr class='red'>";
						$regreso.="<th>".$fila['id']."</th>";
						$regreso.="<th>".$fila['mc']."</th>";
						$regreso.="<th>".$fila['bt']."</th>";
						$regreso.="<th>".$fila['usuario']."</th>";
						$regreso.="<th>".$fila['tiempo']."</th>";
						$regreso.="</tr>";
					}
				
			$regreso.='</tbody></table>
			<h3 class="instucciontitulo">ESCANEAR BODEGA</h3>
	 <div class="row" style="width:90%"> 
		<div class="col-md-4" >
			<img style="width:100%" src="https://dummyimage.com/300x300.jpg">
		</div>
		<div class="col-md-4" >
			<img style="width:100%" src="https://dummyimage.com/300x300.jpg">
		</div>
		<div class="col-md-4" >
			<img style="width:100%" src="https://dummyimage.com/300x300.jpg">
		</div>
		</div>
	</div>
			
			';
			echo $regreso;
//mysqli_close($con);
}

?>