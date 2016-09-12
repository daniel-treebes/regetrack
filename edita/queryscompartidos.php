<?php
   
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
            uso_baterias_bodega ubg
         where
            fecha_salida = '0000-00-00 00:00:00'
        )
    ";

$queryBateriasDescansadas="
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
";
    
?>