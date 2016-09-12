<?php


  /* $querybateriaDescansada="
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
   ";*/
   
   
   //Bodegas Libres
   
   $queryBodegasLibres="
select
bg.id as bodega

from 
bodegas bg
where
bg.id not in
(
 select 
    ubg.bg
    from
    uso_baterias_bodega ubg where
    fecha_salida = '0000-00-00 00:00:00' and
    fecha_carga !='0000-00-00 00:00:00'
    )
limit 1
";
 $bodegaDisponible=0;
 $resultado2 = $mysqli->query($queryBodegasLibres);
   while($fila = $resultado2->fetch_array()) {
   			    $bodegaDisponible= $fila['bodega'];
   }
   

   


	$queryBateriaDescansada="
	 SELECT 
   id,
   bg,
   bt,
   TIMESTAMPDIFF(hour, `fecha_descanso`, now()) as horas,
   TIMESTAMPDIFF(minute, `fecha_descanso`, now())- (TIMESTAMPDIFF(hour, `fecha_descanso`, now())*60) as minutos
   FROM 
   uso_baterias_bodega 
   where 
   fecha_salida = '0000-00-00 00:00:00' and
fecha_descanso != '0000-00-00 00:00:00'
   order by horas, minutos desc
limit 1
	";

   //Baterias Cargando

   $resultado2 = $mysqli->query($queryBateriaDescansada);
   while($fila = $resultado2->fetch_array()) {
				$idMovimientoBateriaDescansada=$fila['id'];
				$bodegaBateriaDescansada= $fila['bg'];
   				$bateriaDisponible= $fila['bt'];
   				$horasBateriaDescansada= $fila['horas'];
   				$minutosBateriaDescansada= $fila['minutos']; 				
   }
   
   $btAcargarMovimiento;
   $btAcargarBT;
   $btAcargarBG;
   $btAcargarHrs;
   $btAcargarMin;
   

   
   
   ?>
   
   