<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("../models/db-settings.php");

if($_POST['funcion']=="dameCargadores"){
dameCargadorBaterias($mysqli);
}
if($_POST['funcion']=="saleBateriaCargador"){
saleBateriaCargador($mysqli,$_POST['bateria'],$_POST['cargador']);
}
if($_POST['funcion']=="entraBateriaCargador"){
entraBateriaCargador($mysqli,$_POST['bateria'],$_POST['cargador']);
}


/*
$hostname = 'localhost';
$username = 'pruebast_reget';
$password = 'o-8hA!dWh@_o';
$dbname = 'pruebast_regetrack';
*/

// Create connection
//$con=mysqli_connect($hostname,$username,$password,$dbname);
/*
if($_GET['funcion']=="dameCargadores"){
dameCargadorBaterias($con);
}
elseif($_GET['funcion']=="saleBateriaCargador"){
saleBateriaCargador($con,3,1);    
}
elseif($_GET['funcion']=="entraBateriaCargador"){
entraBateriaCargador($con,3,1);
}
else
echo "error";
*/
//Sección de baterías - cargador

function saleBateriaCargador($mysqli,$bateria,$cargador){

//function saleBateriaCargador($con,$bateria,$cargador){
		$busca = "
				SELECT * FROM
				uso_baterias_cargador
				WHERE
				bt = ".$bateria." AND
		cg = ".$cargador." and
		fecha_salida = 0
		";
		//echo $busca;
        if($result = $mysqli->query($busca)){
		//if($result=mysqli_query($con,$busca)){
				
		$inserta = "UPDATE
		uso_baterias_cargador
		SET
		fecha_salida =  now()
		WHERE
		bt = ".$bateria." AND
		cg = ".$cargador." and
		fecha_salida = 0";
		//echo $inserta;
        //$result=mysqli_query($con,$inserta);
       $result = $mysqli->query($inserta);
				
		}
		else{
		echo "Este cargador no cuenta con una batería activa";
}

        //mysqli_close($con);
        
}

function entraBateriaCargador($mysqli,$bateria,$cargador){
//function entraBateriaCargador($con,$bateria,$cargador){
	$inserta="INSERT INTO  pruebast_regetrack.uso_baterias_cargador (
id ,
cg ,
bt ,
fecha_entrada ,
fecha_salida ,
usuario
)
VALUES (
NULL ,  ".$cargador.",  ".$bateria.",  now(),  0,  '1'
);
";
$result = $mysqli->query($inserta);
//mysqli_query($con, $inserta);
//mysqli_close($con);
}

function dameCargadorBaterias($mysqli){
//function dameCargadorBaterias($con){
		$query="
			SELECT 
uso_baterias_cargador.id as id, 
cg, 
cargadores.nombre as cargador, 
bt, 
cargadores.tipo as tipo ,
display_name as usuario,
CONCAT(
TIMESTAMPDIFF(day, fecha_entrada, now()),'D ',    
TIMESTAMPDIFF(hour, fecha_entrada, now())-TIMESTAMPDIFF(day, fecha_entrada, now())*24,'H  ',
TIMESTAMPDIFF(minute, fecha_entrada, now())-(TIMESTAMPDIFF(hour, fecha_entrada, now()))*60,'M') AS tiempo

FROM 
uso_baterias_cargador, 
baterias,
cargadores,
uc_users

wHERE 
fecha_salida=0 
and bt = baterias.id 
and cg = cargadores.id
and uc_users.id = usuario
group by uso_baterias_cargador.id order by
TIMESTAMPDIFF(minute, fecha_entrada, now())DESC
			";
		
			//$result=mysqli_query($con,$query);
           	$result = $mysqli->query($query);
			
			
			$regreso ='	<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Id Movimiento</th>
							<th>Cargador</th>
							<th>Nombre Cargador</th>
							<th>Batería</th>
							<th>Tipo de Cargador</th>
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
						$regreso.="<th>".$fila['cg']."</th>";
						$regreso.="<th>".$fila['cargador']."</th>";
						$regreso.="<th>".$fila['bt']."</th>";
						$regreso.="<th>".$fila['tipo']."</th>";
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