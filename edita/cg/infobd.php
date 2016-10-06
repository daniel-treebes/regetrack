<?php
$query="
    SELECT
        c.idcargadores as Id,
        c.cargadores_nombre as Nombre,
        c.cargadores_modelo as Modelo,
        c.cargadores_marca as Marca,
        c.cargadores_comprador as Comprador,
        c.cargadores_numserie as Serie,
        CONCAT(c.cargadores_volts,'V ',c.cargadores_amperaje,'Ah (',c.cargadores_e,')') as Tipo,
		c.cargadores_tipo as ctipo
    FROM
        cargadores as c
    WHERE
        c.idcargadores= ".$_GET['id']."
    limit 1
";
$resultado = $mysqli->query($query);
while($fila = $resultado->fetch_array()) {
	$datosCargador=$fila;
}

$querydeshabilitado="
    SELECT *
    FROM deshabilitacg
    WHERE cg= ".$_GET['id']." and fecha_salida='0000-00-00 00:00:00'
";
$resultado = $mysqli->query($querydeshabilitado);
$habilitaid=0;
$habilitamc=$_GET['id'];
$habilitamotivo='';
$habilitafecha='';
while($fila = $resultado->fetch_array()) {
    $habilitaid= $fila['id'];
    $habilitamc= $fila['cg'];
    $habilitamotivo= $fila['motivo'];
    $habilitafecha= $fila['fecha_entrada'];
}

$queryhoras="
	SELECT
		TIMESTAMPDIFF(DAY,MIN(u.fecha_entrada),NOW()) AS diastotal,
		TIMESTAMPDIFF(HOUR,MIN(u.fecha_entrada),NOW()) AS horastotal,
		SUM(TIMESTAMPDIFF(HOUR,u.fecha_carga,IF(u.fecha_descanso!='0000-00-00 00:00:00',u.fecha_descanso,NOW())))
			AS horascarga,
		TIMESTAMPDIFF(HOUR,MIN(u.fecha_entrada),NOW())
			-SUM(TIMESTAMPDIFF(HOUR,u.fecha_carga,IF(u.fecha_descanso!='0000-00-00 00:00:00',u.fecha_descanso,NOW())))
			AS horasidle
	FROM uso_baterias_bodega AS u, bodegas AS b, cargadores AS c
	WHERE u.bg = b.id
		AND b.cg = c.idcargadores
		AND u.fecha_carga != '0000-00-00 00:00:00'
		AND c.idcargadores =$id
	";
$resultado = $mysqli->query($queryhoras);
$horas['h']['total']=0;
$horas['h']['carga']=0;
$horas['h']['idle']=0;
$horas['h']['cargap']=0;
$horas['h']['idlep']=0;
while($fila = $resultado->fetch_array()) {
	if ($fila['diastotal']==0) $fila['diastotal']=1;
	if ($fila['horastotal']==0) $fila['horastotal']=1;
    $horas['h']['total']= round($fila['horastotal'],0);
    $horas['h']['carga']= round($fila['horascarga'],0);
    $horas['h']['idle']= round($fila['horasidle'],0);
	$horas['h']['cargap']= round($fila['horascarga']/$fila['diastotal'],0);
	$horas['h']['idlep']= round($fila['horasidle']/$fila['diastotal'],0);
}

$queryhoras7d="
	SELECT
		7 AS diastotal,
		(24*7) AS horastotal,
		SUM(
			TIMESTAMPDIFF(HOUR,
				IF(u.fecha_carga>=DATE_SUB(now(), INTERVAL 7 DAY),u.fecha_carga,DATE_SUB(now(), INTERVAL 7 DAY)),
				IF(u.fecha_descanso!='0000-00-00 00:00:00',u.fecha_descanso,NOW())
			)
		)AS horascarga,
		(24*7)-SUM(
			TIMESTAMPDIFF(HOUR,
				IF(u.fecha_carga>=DATE_SUB(now(), INTERVAL 7 DAY),u.fecha_carga,DATE_SUB(now(), INTERVAL 7 DAY)),
				IF(u.fecha_descanso!='0000-00-00 00:00:00',u.fecha_descanso,NOW())
			)
		)AS horasidle
	FROM uso_baterias_bodega AS u, bodegas AS b, cargadores AS c
	WHERE u.bg = b.id
		AND b.cg = c.idcargadores
		AND (u.fecha_carga>=DATE_SUB(now(), INTERVAL 7 DAY) || u.fecha_descanso='0000-00-00 00:00:00')
		AND u.fecha_carga != '0000-00-00 00:00:00'
		AND c.idcargadores =$id
	";
$resultado = $mysqli->query($queryhoras7d);
$horas['7']['total']=0;
$horas['7']['carga']=0;
$horas['7']['idle']=0;
$horas['7']['cargap']=0;
$horas['7']['idlep']=0;
while($fila = $resultado->fetch_array()) {
    $horas['7']['total']= round($fila['horastotal'],0);
    $horas['7']['carga']= round($fila['horascarga'],0);
    $horas['7']['idle']= round($fila['horasidle'],0);
	$horas['7']['cargap']= round($fila['horascarga']/$fila['diastotal'],0);
	$horas['7']['idlep']= round($fila['horasidle']/$fila['diastotal'],0);
}

//Estado de lugares
$querybodegas="
	SELECT * FROM
	(
		SELECT
			b.id as Id,
			c.cargadores_nombre as Cargador,
			c.idcargadores as cgid,
			cbg.cantbg as cantbg,
			b.nombre as Espacio,
			CONCAT(c.cargadores_volts,'V ',c.cargadores_amperaje,'Ah (',c.cargadores_e,')') as Tipo,
			bat.baterias_nombre as Bateria,
			usos.entrada,
			usos.entradat,
			usos.carga,
			usos.cargat,
			usos.descanso,
			usos.descansot,
			NULL as disponible,
			NULL as disponiblet
		FROM
			bodegas as b,
			cargadores as c,
			baterias as bat,
			(
				SELECT 
					bg,
					bt,
					CONCAT(
					   TIMESTAMPDIFF(day, fecha_entrada, now()),'D ',    
					   TIMESTAMPDIFF(hour, fecha_entrada, now())-TIMESTAMPDIFF(day, fecha_entrada, now())*24,'H  ',
					   TIMESTAMPDIFF(minute, fecha_entrada, now())-(TIMESTAMPDIFF(hour, fecha_entrada, now()))*60,'M') 
					as 'entrada',
					TIMESTAMPDIFF(hour, fecha_entrada, now()) as 'entradat',
					CONCAT(
					   TIMESTAMPDIFF(day, fecha_carga, now()),'D ',    
					   TIMESTAMPDIFF(hour, fecha_carga, now())-TIMESTAMPDIFF(day, fecha_carga, now())*24,'H  ',
					   TIMESTAMPDIFF(minute, fecha_carga, now())-(TIMESTAMPDIFF(hour, fecha_carga, now()))*60,'M') 
					as 'carga',
					TIMESTAMPDIFF(hour, fecha_carga, now()) as 'cargat',
					CONCAT(
					   TIMESTAMPDIFF(day, fecha_descanso, now()),'D ',    
					   TIMESTAMPDIFF(hour, fecha_descanso, now())-TIMESTAMPDIFF(day, fecha_descanso, now())*24,'H  ',
					   TIMESTAMPDIFF(minute, fecha_descanso, now())-(TIMESTAMPDIFF(hour, fecha_descanso, now()))*60,'M')
					as 'descanso',
					TIMESTAMPDIFF(hour, fecha_descanso, now()) as 'descansot'
				FROM 
					uso_baterias_bodega,
					(SELECT id as bdcid
					 FROM bodegas
					 WHERE cg=$id) as bdc
				WHERE 
					fecha_salida ='0000-00-00 00:00:00'
					AND bg=bdc.bdcid
			) as usos,
			(
				SELECT cg,
					COUNT(id) as cantbg
				FROM bodegas
				WHERE cg=$id
				GROUP BY cg
			) as cbg
		WHERE
			usos.bg=b.id AND
			usos.bt=bat.idbaterias AND
			bat.idbaterias IN (
				SELECT idbaterias
				FROM cargadores_baterias
				WHERE idcargadores =$id
			) AND 
			c.idcargadores=b.cg AND
			cbg.cg=c.idcargadores
		
		UNION ALL
		
		SELECT
			b.id as 'Id',
			c.cargadores_nombre as Cargador,
			c.idcargadores as cgid,
			cbg.cantbg as cantbg,
			b.nombre as Espacio,
			CONCAT(c.cargadores_volts,'V ',c.cargadores_amperaje,'Ah (',c.cargadores_e,')') as Tipo,
			NULL as Bateria,
			NULL as entrada,
			NULL as entradah,
			NULL as carga,
			NULL as cargah,
			NULL as descanso,
			NULL as descansoh,
			CONCAT(
				TIMESTAMPDIFF(day, libres.fecha_salida, now()),'D ',    
				TIMESTAMPDIFF(hour, libres.fecha_salida, now())-TIMESTAMPDIFF(day, libres.fecha_salida, now())*24,'H  ',
				TIMESTAMPDIFF(minute, libres.fecha_salida, now())-(TIMESTAMPDIFF(hour, libres.fecha_salida, now()))*60,'M')
			as disponible,
			TIMESTAMPDIFF(hour, libres.fecha_salida, now())	as disponibleh
		FROM
			bodegas as b,
			cargadores as c,
			(
			  SELECT  
				bg,
				MAX(fecha_salida) as fecha_salida
			  FROM 
				uso_baterias_bodega,
				(SELECT id as bdcid
					 FROM bodegas
					 WHERE cg=$id) as bdc
			  WHERE 
				fecha_salida !='0000-00-00 00:00:00'
				AND bg=bdc.bdcid
			  GROUP BY bg
			) as libres,
			(
				SELECT cg,
					COUNT(id) as cantbg
				FROM bodegas
				WHERE cg=$id
				GROUP BY cg
			) as cbg
		WHERE
			libres.bg=b.id AND
			c.idcargadores=b.cg AND
			cbg.cg=c.idcargadores AND
			b.id not in (
				SELECT 
				   bg   
				FROM 
				   uso_baterias_bodega,
				   (SELECT id as bdcid
					 FROM bodegas
					 WHERE cg=$id) as bdc
				WHERE 
				   fecha_salida='0000-00-00 00:00:00'
				   AND bg=bdc.bdcid
				GROUP BY bg
			)
	
		UNION ALL
		
		SELECT
			b.id as 'Id',
			c.cargadores_nombre as Cargador,
			c.idcargadores as cgid,
			cbg.cantbg as cantbg,
			b.nombre as Espacio,
			CONCAT(c.cargadores_volts,'V ',c.cargadores_amperaje,'Ah (',c.cargadores_e,')') as Tipo,
			NULL as Bateria,
			NULL as entrada,
			NULL as entradah,
			NULL as carga,
			NULL as cargah,
			NULL as descanso,
			NULL as descansoh,
			NULL as disponible,
			NULL as disponibleh
		FROM
			bodegas as b,
			cargadores as c,
			(
				SELECT cg,
					COUNT(id) as cantbg
				FROM bodegas
				WHERE cg=$id
				GROUP BY cg
			) as cbg
		WHERE
			b.id NOT IN (
				SELECT bg
				FROM uso_baterias_bodega, bodegas as b
				WHERE b.id=bg
					AND b.cg=$id
				GROUP BY bg
			) AND
			c.idcargadores=b.cg AND
			cbg.cg=c.idcargadores			
	) as todo
	ORDER BY Cargador, Espacio
";
$resultado = $mysqli->query($querybodegas);
$bodegas=array();
$cantlugares=0;
while($fila = $resultado->fetch_array()) {
	$cantlugares=$fila['cantbg'];
	if ($datosCargador['ctipo']=='Cargador'){
		$bodegas[$fila['Espacio']]['bt']=$fila['Bateria'];
		$bodegas[$fila['Espacio']]['estado']='<span style="color:red;">ERROR</span>';
		$bodegas[$fila['Espacio']]['tiempo']=0;
		$bodegas[$fila['Espacio']]['horas']=0;
	}
	if ($fila['disponible']!=NULL && $datosCargador['ctipo']=='Cargador'){
		$bodegas[$fila['Espacio']]['bt']='<span style="color:green">Sin Batería</span>';
		$bodegas[$fila['Espacio']]['estado']='<span style="color:green">Disponible</span>';
		$bodegas[$fila['Espacio']]['tiempo']=$fila['disponible'];
		$bodegas[$fila['Espacio']]['horas']=$fila['disponiblet'];
	}elseif ($fila['descanso']!=NULL){
		$bodegas[$fila['Espacio']]['estado']='<span style="color:green">Descanso</span>';
		$bodegas[$fila['Espacio']]['tiempo']=$fila['descanso'];
		$bodegas[$fila['Espacio']]['horas']=$fila['descansot'];
	}elseif ($fila['carga']!=NULL && $datosCargador['ctipo']=='Cargador'){
		$bodegas[$fila['Espacio']]['estado']='<span style="color:#c49f47">Carga</span>';
		$bodegas[$fila['Espacio']]['tiempo']=$fila['carga'];
		$bodegas[$fila['Espacio']]['horas']=$fila['cargat'];
	}elseif ($fila['entrada']!=NULL){
		$bodegas[$fila['Espacio']]['estado']='<span style="color:red">Espera</span>';
		$bodegas[$fila['Espacio']]['tiempo']=$fila['entrada'];
		$bodegas[$fila['Espacio']]['horas']=$fila['entradat'];
	}elseif ($fila['disponible']==NULL && $fila['Bateria']==NULL && $datosCargador['ctipo']=='Cargador'){
		$bodegas[$fila['Espacio']]['bt']='<span style="color:green">Sin Batería</span>';
		$bodegas[$fila['Espacio']]['estado']='<span style="color:green">Disponible</span>';
		$bodegas[$fila['Espacio']]['tiempo']=0;
		$bodegas[$fila['Espacio']]['horas']=0;
	}
}



?>

