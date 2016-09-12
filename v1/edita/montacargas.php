<?php
   $nombrePagina="Editando bateria";
   $acciones=[];
   $acciones[0][0]="Nuevo";
   $acciones[0][1]="accionAñadir";
   $acciones[1][0]="Exportar";
   $acciones[1][1]="javascript:exporta();";
   $acciones[2][0]="Importar";
   $acciones[2][1]='javascript:importa();';
   
   
   
   
   			  
   
   
   
   $query="
   SELECT
   	id as Id,
   	nombre as Nombre,
   	modelo as Modelo,
   	tipo as Tipo,
   	'Proximamente' as 'Estado Actual',
   	'Proximamente' as 'Proximo Cambio',
   	'Proximamente' as 'Salud de baterias'
   FROM
   	montacargas
   WHERE
   id= ".$_GET['id']."
   limit 1
   ";
   
      $id;
   $nombre;
   $modelo;
   $tipo;
   $EstadoActual;
   $ProximoCambio;
   $SaludBaterias;
   
    
      $horasDeUso=0;
   $tiempoDeUso=0;
   $horasDeUso=0;
   $ciclos=0;
   $salud=0;
   $idMovimientoBtaMC=0;
   
   
   $resultado = $mysqli->query($query);
   while($fila = $resultado->fetch_array()) {
   				$id= $fila['Id'];
   				$nombre= $fila['Nombre'];
   				$modelo= $fila['Modelo'];
   				$tipo= $fila['Tipo'];
   				
   }
   
   
   
   $queryBateria="
   SELECT
   	id as Id,
	bt as bt,
   	TIMESTAMPDIFF(hour, fecha_entrada, now()) as horas,
   	CONCAT(
   TIMESTAMPDIFF(day, fecha_entrada, now()),'D ',    
   TIMESTAMPDIFF(hour, fecha_entrada, now())-TIMESTAMPDIFF(day, fecha_entrada, now())*24,'H  ',
   TIMESTAMPDIFF(minute, fecha_entrada, now())-(TIMESTAMPDIFF(hour, fecha_entrada, now()))*60,'M') AS tiempo,
   	
   	60 as 'ciclos',
   	20 as 'salud'
   FROM
   	uso_baterias_montacargas
   WHERE
   mc= ".$_GET['id']." and
   fecha_salida='0000-00-00 00:00:00'
   limit 1
   ";
   
  
   $resultado2 = $mysqli->query($queryBateria);
   while($fila = $resultado2->fetch_array()) {
			   $idMovimientoBtaMC=$fila['Id'];
   				$idBateria= $fila['bt'];
   				$tiempoDeUso= $fila['tiempo'];
   				$horasDeUso= $fila['horas'];
   				$ciclos= $fila['ciclos'];
   				$salud= $fila['salud'];
   				
   }
   echo $idBateria."<br>";
   echo $tiempoDeUso;
   $querybodega="
   select uso_baterias_bodega where fecha_salida='0000-00-00 00:00:00';
   ";
   $querybateriaDescansada="
   SELECT 
   id,
   bg,
   bt,
   TIMESTAMPDIFF(hour, fecha_entrada, fecha_salida) as horas,
   TIMESTAMPDIFF(minute, fecha_entrada, fecha_salida)- (TIMESTAMPDIFF(hour, fecha_entrada, fecha_salida)*60) as minutos
   FROM 
   uso_baterias_bodega 
   where 
   fecha_salida != '0000-00-00 00:00:00'
   order by horas, minutos desc
   limit 1
   ";
   $idMovimientoBateriaDescansada=0;
  $bodegaDisponible=0;
  $bateriaDisponible=0;
  $horasBateriaDescansada=0;
  $minutosBateriaDescansada=0;
   $resultado2 = $mysqli->query($querybateriaDescansada);
   while($fila = $resultado2->fetch_array()) {
			   $idMovimientoBateriaDescansada=$fila['id'];
   			    $bodegaDisponible= $fila['bg'];
   				$bateriaDisponible= $fila['bt'];
   				$horasBateriaDescansada= $fila['horas'];
   				$minutosBateriaDescansada= $fila['minutos']; 				
   }
   
   


   $porcentajeDeUso;
   $porcentajeDeUso=($horasDeUso/8)*100;
   $pintaporcentaje;
   $pintaporcentaje=$porcentajeDeUso;
   	if($porcentajeDeUso>100){
   			
   			$colorUso="red";
   	}else if($porcentajeDeUso>70){
   			
   			$colorUso="yellow";
   	}else{
   			$colorUso="green";
   	}
   	
   
   
   
   ?>
<div class="row">
<div class="col-md-6" id="indicadores">
   <div class="portlet box  blue-sharp">
      <div class="portlet-title">
         <div class="caption">
            <i class="fa fa-car"></i>Montacargas <strong><?php  echo $_GET['id'] ?> </strong>
         </div>
         <div class="tools">
            <a href="" class="collapse" data-original-title="" title=""> </a>
            <a href="" class="remove" data-original-title="" title=""> </a>
         </div>
      </div>
      <div class="portlet-body form">
         <form class="form-horizontal" role="form">
            <div class="form-body">
               <h3>Datos del Montacargas</h3>
               <div class="form-group">
                  <label class="col-md-3 control-label">Nombre</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" placeholder="Default Input" value="<?php  echo $nombre ?> "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3 control-label">Modelo</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" placeholder="Default Input" value="<?php  echo $modelo ?> "> 
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3 control-label">Tipo</label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" placeholder="Default Input" value="<?php  $tipo; ?> ">
                  </div>
               </div>
               <?php if ($horasDeUso!=0)
                  {
                  ?>
               <div class="row">
				 <div class="form-actions right1 gray" >
         
                  <h3>Datos de la batería en uso: <?php  echo $idBateria ?></h3>
                  <div class="col-md-4">
                     <div class="easy-pie-chart">
                        <div class="number transactions" data-percent="<?php  echo $pintaporcentaje; ?>">
                           <span><?php  echo $pintaporcentaje; ?></span>% 
                           <canvas height="75" width="75"></canvas>
                        </div>
                        <a class="title" href="javascript:;"> Uso actual: <?php  echo $tiempoDeUso; ?>
                       
                        </a>
                     </div>
                  </div>
                  <div class="margin-bottom-10 visible-sm"> </div>
                  <div class="col-md-4">
                     <div class="easy-pie-chart">
                        <div class="number visits" data-percent="85">
                           <span>+85</span>% 
                           <canvas height="75" width="75"></canvas>
                        </div>
                        <a class="title" href="javascript:;"> Ciclos restrantes
                        
                        </a>
                     </div>
                  </div>
                  <div class="margin-bottom-10 visible-sm"> </div>
                  <div class="col-md-4">
                     <div class="easy-pie-chart">
                        <div class="number bounce" data-percent="46">
                           <span>-46</span>% 
                           <canvas height="75" width="75"></canvas>
                        </div>
                        <a class="title" href="javascript:;"> 
                        <i class="icon-arrow-right"></i>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         
		 </div>
		  
		 <center><h3>¿Que desea hacer?   </h3></center><br>
		 <div class="btn-group btn-group btn-group-justified">
							<div class="col-md-4 ">
                           <a href="javascript:imprimeQr('montacargas','<?php  echo $_GET['id'] ?>')" class="btn grey-steel btn-block" style="height: 110px;"><h2> <i class="fa fa-print"></i></h1><h5>Imprimir QR </h5></a>
							</div>
							<div class="col-md-4 ">
                           <a href="javascript:cambiaBateria('montacargas','<?php  echo $_GET['id'] ?>')" class="btn green-jungle btn-block" style="height: 110px;"><h2><i class="fa fa-battery-empty"></i></h2><h5>Cambiar bateria</h3></h5></a>
						   </div>
							<div class="col-md-4 ">
                           <a href="javascript:imprimeQr('montacargas','<?php  echo $_GET['id'] ?>')" class="btn red btn-block" style="height: 110px;"><h2> <i class="fa fa-warning"></i></h2><h5>Esta no es la bateria en uso</h5></a>
						   </div>
							
				 </div>
		 

  
		 <div id="pasos" movimientoBTMC="<?php  echo $idMovimientoBtaMC ?>">
				<div id="paso1" tipodemodulo="montacargas" proximo="<?php  echo $_GET['id'] ?>" val="0" >Escaneo MC <?php  echo $_GET['id'] ?>: <span></span></div>
				<div id="paso2" tipodemodulo="baterias" proximo="<?php  echo $idBateria ?>" val="0" movimiento="<?php echo $idMovimientoBtaMC; ?>">Escaneo BAT usada <?php  echo $idBateria ?>: <span></span></div>
			    <div id="paso3" tipodemodulo="bodegas" proximo="<?php  echo $bodegaDisponible ?>" val="0">Escaneo BD a dejar <?php  echo $bodegaDisponible ?>: <span></span></div>
				<div id="paso4" tipodemodulo="baterias" proximo="<?php  echo $idBateria ?>" val="0"  movimiento="<?php echo $idMovimientoBateriaDescansada; ?>">Escaneo BAT usada <?php  echo $idBateria ?>: <span></span></div>
				<div id="paso5" tipodemodulo="bodegas" proximo="<?php  echo $bodegaDisponible ?>" val="0">Escaneo BD con bateria <?php  echo $bodegaDisponible ?>:<span></span></div>
				<div id="paso6" tipodemodulo="baterias" proximo="<?php  echo $bateriaDisponible ?>" val="0">Escaneo BAT reposada <?php  echo $bateriaDisponible ?>:<span></span></div>
				<div id="paso7" tipodemodulo="montacargas" proximo="<?php  echo $_GET['id'] ?>" val="0">Escaneo MC <?php  echo $_GET['id'] ?>: <span></span></div>
				<div id="paso8" tipodemodulo="baterias" proximo="<?php  echo $bateriaDisponible ?>" val="0">Escaneo BAT reposada <?php  echo $bateriaDisponible ?>: <span></span></div>
		 </div>
         
           <br>
	
   </div>
		 </form>
   <?php 
      }else{
				?>
      		 <h3>Este montacargas no tiene una bateria registrada</h3>
			 <div class=" right1 gray" >
				<button onclick="imprimeQr('montacargas','<?php  echo $_GET['id'] ?>')" class="btn green">Imprimir QR</button>	
				<button onclick="montarBateria('montacargas','<?php  echo $_GET['id'] ?>')" class="btn green">Montar una bateria</button>
			 </div>
			 <?php
      				
      }
      ?>
</div>
</div>
<div class="col-md-6 ">
				<div class="portlet box  blue-sharp">
      <div class="portlet-title">
         <div class="caption">
            <i class="fa fa-car"></i>Escaneo <strong><?php  echo $_GET['id'] ?> </strong>
         </div>
         <div class="tools">
            <a href="" class="collapse" data-original-title="" title=""> </a>
            <a href="" class="remove" data-original-title="" title=""> </a>
         </div>
      </div>
      <div class="portlet-body form" id="contenedorScaner">
				
	  </div>
</div>
<?php
require_once("libs/libreriasJquery.php");
?>

<script>
   function imprimeQr(tipo,id) {
   			var stingurl="https://treebes.com/regetrack/libs/imprimeQR.php?tipo="+tipo+"&id="+id;
   			//url="<img src='https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl="+encodeURIComponent(data)+"'/>";
   			window.open(stingurl,'_blank');
   }
   
   function cambiaBateria(tipo,id) {
	$.ajax({
    url : "edita/cambio2.php",
    type: "POST",
    data : {tipo:"tipo",id:"id"},
    success: function(data, textStatus, jqXHR)
    {
        jQuery("#contenedorScaner").html(data)
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
 
    }
});
   }
   <?php
      ?>
   
   
              $('.easy-pie-chart .number.transactions').easyPieChart({
                  animate: 1000,
                  size:  75,
                  lineWidth: 3,
                  barColor: App.getBrandColor('<?php  echo $colorUso; ?>')
              });
   
              $('.easy-pie-chart .number.visits').easyPieChart({
                  animate: 1000,
                  size: 75,
                  lineWidth: 3,
                  barColor: App.getBrandColor('green')
              });
   
              $('.easy-pie-chart .number.bounce').easyPieChart({
                  animate: 1000,
                  size: 75,
                  lineWidth: 3,
                  barColor: App.getBrandColor('red')
              });
   
              $('.easy-pie-chart-reload').click(function() {
                  $('.easy-pie-chart .number').each(function() {
                      var newValue = Math.floor(100 * Math.random());
                      $(this).data('easyPieChart').update(newValue);
                      $('span', this).text(newValue);
                  });
              });
          
</script>
<?php                                                       
   require_once("tema/comun/footer.php");
   ?>