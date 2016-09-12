<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("../models/db-settings.php");

if($_POST['funcion']=="dameBodegas"){
dameBodegasBaterias($mysqli);
}
if($_POST['funcion']=="saleBateriaBodega"){
saleBateriaBodega($mysqli,$_POST['bateria'],$_POST['bodega']);
}
if($_POST['funcion']=="entraBateriaBodega"){
entraBateriaBodega($mysqli,$_POST['bateria'],$_POST['bodega']);
}


/*
$hostname = 'localhost';
$username = 'pruebast_reget';
$password = 'o-8hA!dWh@_o';
$dbname = 'pruebast_regetrack';

$con=mysqli_connect($hostname,$username,$password,$dbname);

if($_GET['funcion']=="dameBodegas"){
dameBodegasBaterias($con);
}
elseif($_GET['funcion']=="saleBateriaBodega"){
saleBateriaBodega($con,3,1);    
}
elseif($_GET['funcion']=="entraBateriaBodega"){
entraBateriaBodega($con,3,1);
}
else
echo "error";
*/

//Sección de baterías - bodega
function saleBateriaBodega($mysqli,$bateria,$bodega){
//function saleBateriaBodega($con,$bateria,$bodega){
		
		$busca = "
				SELECT * FROM
				uso_baterias_bodega
				WHERE
				bt = ".$bateria." AND
		bg = ".$bodega." and
		fecha_salida = 0
		";
		//echo $busca;
					
        if($result = $mysqli->query($busca)){
		//if($result=mysqli_query($con,$busca)){
		$inserta = "UPDATE
		uso_baterias_bodega
		SET
		fecha_salida =  now()
		WHERE
		bt = ".$bateria." AND
		bg = ".$bodega." and
		fecha_salida = 0";
		//echo $inserta;    
		//$result=mysqli_query($con,$inserta);
		$result = $mysqli->query($inserta);
		
				
		}
		else{
		echo "Esta bodega no cuenta con una batería activa";
		   
}
//		mysqli_close($con);
		
	/*$inserta="INSERT INTO  pruebast_regetrack.uso_baterias_bodega (
id ,
bg ,
bt ,
fecha_entrada ,
fecha_salida ,
usuario
)
VALUES (
NULL ,  ".$bodega.",".$bateria.", 0 ,  now(),  '1'
);
";
*/
}

//function entraBateriaBodega($con, $bateria,$bodega){
function entraBateriaBodega($mysqli, $bateria,$bodega){
	$inserta="INSERT INTO  pruebast_regetrack.uso_baterias_bodega (
id ,
bg ,
bt ,
fecha_entrada ,
fecha_salida ,
usuario
)
VALUES (
NULL ,  ".$bodega.",  ".$bateria.",  now(),  0,  '1'
);
";
$result = $mysqli->query($inserta);
//mysqli_query($con, $inserta);
//mysqli_close($con);
}

//function dameBodegasBaterias($con){
function dameBodegasBaterias($mysqli){
		$query="
			SELECT 
uso_baterias_bodega.id as id, 
bg, 
bodegas.nombre as bodega, 
bt, 
baterias.num_serie as num_serie ,
display_name as usuario,
CONCAT(
TIMESTAMPDIFF(day, fecha_entrada, now()),'D ',    
TIMESTAMPDIFF(hour, fecha_entrada, now())-TIMESTAMPDIFF(day, fecha_entrada, now())*24,'H  ',
TIMESTAMPDIFF(minute, fecha_entrada, now())-(TIMESTAMPDIFF(hour, fecha_entrada, now()))*60,'M') AS tiempo

FROM 
uso_baterias_bodega, 
baterias,
bodegas,
uc_users

wHERE 
fecha_salida=0 
and bt = baterias.id 
and bg = bodegas.id
and uc_users.id = usuario
group by uso_baterias_bodega.id order by
TIMESTAMPDIFF(minute, fecha_entrada, now())DESC
			";
				//$result=mysqli_query($con,$query);
			$result = $mysqli->query($query);
				
			
			
			$regreso ='	<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Id Movimiento</th>
							<th>Bodega</th>
							<th>Nombre Bodega</th>
							<th>Batería</th>
							<th>Número de serie</th>
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
						$regreso.="<th>".$fila['bg']."</th>";
						$regreso.="<th>".$fila['bodega']."</th>";
						$regreso.="<th>".$fila['bt']."</th>";
						$regreso.="<th>".$fila['num_serie']."</th>";
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