<?php


$queryBateria="
   SELECT
   	id as Id,
	bt as bt,
   	TIMESTAMPDIFF(hour, fecha_entrada, now()) as horas,
   	CONCAT(
   TIMESTAMPDIFF(day, fecha_entrada, now()),'D ',    
   TIMESTAMPDIFF(hour, fecha_entrada, now())-TIMESTAMPDIFF(day, fecha_entrada, now())*24,'H  ',
   TIMESTAMPDIFF(minute, fecha_entrada, now())-(TIMESTAMPDIFF(hour, fecha_entrada, now()))*60,'M') AS tiempo,
   	TIMESTAMPDIFF(second, fecha_entrada, now()) seg,
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
				$segundos= $fila['seg'];
   				$horasDeUso= $fila['horas'];
   				$ciclos= $fila['ciclos'];
   				$salud= $fila['salud'];
   				
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
    <?php if ($segundos!=0)
                  {
                  ?>
   <div class="col-md-6" id="indicadores">
   <div class="portlet box  blue-sharp">
      <div class="portlet-title">
         <div class="caption">
            <i class="fa fa-sitemap"></i>Bateria espacio en <strong> <?php  echo $idBateria ?> </strong>
         </div>
         <div class="tools">
            <a href="" class="collapse" data-original-title="" title=""> </a>
            <a href="" class="remove" data-original-title="" title=""> </a>
         </div>
      </div>
      <div class="portlet-body form">	   
			   
			   
              
              
				 <div class="form-actions right1 gray" >
         
                 
                  <div class="col-sm-4">
                     <div class="easy-pie-chart">
                        <div class="number transactions" data-percent="<?php  echo $pintaporcentaje; ?>">
                           <span><?php  echo $pintaporcentaje; ?></span>% 
                           <canvas height="75" width="75"></canvas>
                        </div>
                        <a class="title" href="javascript:;"> Usando <?php  echo $tiempoDeUso; ?>
                       
                        </a>
                     </div>
                  </div>
                  <div class="margin-bottom-10 visible-sm"> </div>
                  <div class="col-sm-4">
                     <div class="easy-pie-chart">
                        <div class="number visits" data-percent="85">
                           <span>+85</span>% 
                           <canvas height="75" width="75"></canvas>
                        </div>
                        <a class="title" href="javascript:;"> Promedio de uso
                        
                        </a>
                     </div>
                  </div>
                   <div class="margin-bottom-10 visible-sm"> </div>
                  <div class="col-sm-4">
                     <div class="easy-pie-chart">
                        <div class="number visits" data-percent="85">
                           <span>+85</span>% 
                           <canvas height="75" width="75"></canvas>
                        </div>
                        <a class="title" href="javascript:;"> Fecha de mantenimiento
                        
                        </a>
                     </div>
                  </div>
               
            </div>

	
   </div>
		 </form>
  
</div>
</div>


 <?php 
      }else{
				?>
				               
   <div class="col-md-6" id="indicadores">
   <div class="portlet box  blue-sharp">
      <div class="portlet-title">
         <div class="caption">
            <i class="fa fa-car"></i>Sin Batería
         </div>
         <div class="tools">
            <a href="" class="collapse" data-original-title="" title=""> </a>
            <a href="" class="remove" data-original-title="" title=""> </a>
         </div>
      </div>
      <div class="portlet-body form">	   
      		 <h3>Este montacargas no tiene una bateria registrada</h3>
			 <div class=" right1 gray" >
				<button onclick="imprimeQr('montacargas','<?php  echo $_GET['id'] ?>')" class="btn green">Imprimir QR</button>	
				<button onclick="montarBateria('montacargas','<?php  echo $_GET['id'] ?>')" class="btn green">Montar una bateria</button>
			 </div>
			 </div>
			</div>
</div>
			 <?php
			 
      				
      }
      ?>