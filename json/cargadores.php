<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("../models/config.php");


$query="
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
        usos.carga,
        usos.descanso,
        NULL as disponible
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
                CONCAT(
                   TIMESTAMPDIFF(day, fecha_carga, now()),'D ',    
                   TIMESTAMPDIFF(hour, fecha_carga, now())-TIMESTAMPDIFF(day, fecha_carga, now())*24,'H  ',
                   TIMESTAMPDIFF(minute, fecha_carga, now())-(TIMESTAMPDIFF(hour, fecha_carga, now()))*60,'M') 
                as 'carga',
                CONCAT(
                   TIMESTAMPDIFF(day, fecha_descanso, now()),'D ',    
                   TIMESTAMPDIFF(hour, fecha_descanso, now())-TIMESTAMPDIFF(day, fecha_descanso, now())*24,'H  ',
                   TIMESTAMPDIFF(minute, fecha_descanso, now())-(TIMESTAMPDIFF(hour, fecha_descanso, now()))*60,'M')
                as 'descanso'        
            FROM 
                uso_baterias_bodega
            WHERE 
                fecha_salida ='0000-00-00 00:00:00'
        ) as usos,
        (
            SELECT cg,
                COUNT(id) as cantbg
            FROM bodegas
            GROUP BY cg
        ) as cbg
    WHERE
        usos.bg=b.id AND
        usos.bt=bat.idbaterias AND
        c.idsucursal IN (".$loggedInUser->sucursales.") AND 
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
        NULL as carga,
        NULL as descanso,
        CONCAT(
            TIMESTAMPDIFF(day, libres.fecha_salida, now()),'D ',    
            TIMESTAMPDIFF(hour, libres.fecha_salida, now())-TIMESTAMPDIFF(day, libres.fecha_salida, now())*24,'H  ',
            TIMESTAMPDIFF(minute, libres.fecha_salida, now())-(TIMESTAMPDIFF(hour, libres.fecha_salida, now()))*60,'M')
        as disponible
    FROM
        bodegas as b,
        cargadores as c,
        (
          SELECT  
            bg,
            MAX(fecha_salida) as fecha_salida
          FROM 
            uso_baterias_bodega
          WHERE 
            fecha_salida !='0000-00-00 00:00:00'
          GROUP BY bg
        ) as libres,
        (
            SELECT cg,
                COUNT(id) as cantbg
            FROM bodegas
            GROUP BY cg
        ) as cbg
    WHERE
        libres.bg=b.id AND
        c.idsucursal IN (".$loggedInUser->sucursales.") AND
        c.idcargadores=b.cg AND
        cbg.cg=c.idcargadores AND
        b.id not in (
            SELECT 
               bg   
            FROM 
               uso_baterias_bodega
            WHERE 
               fecha_salida='0000-00-00 00:00:00'
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
        NULL as carga,
        NULL as descanso,
        NULL as disponible
    FROM
        bodegas as b,
        cargadores as c,
        (
            SELECT cg,
                COUNT(id) as cantbg
            FROM bodegas
            GROUP BY cg
        ) as cbg
    WHERE
        b.id NOT IN (
				SELECT bg
				FROM uso_baterias_bodega, bodegas as b, cargadores as c
				WHERE b.id=bg
					AND b.cg=c.idcargadores
					AND c.idsucursal IN (".$loggedInUser->sucursales.")
				GROUP BY bg
			) AND
        c.idsucursal IN (".$loggedInUser->sucursales.") AND
        c.idcargadores=b.cg AND
        cbg.cg=c.idcargadores
) as todo
GROUP BY Cargador 
ORDER BY Cargador, Espacio
";

$resultado = $mysqli->query($query);

$queryCargadoresDes="
    SELECT *, CONCAT(
            TIMESTAMPDIFF(day, fecha_entrada, now()),'D ',    
            TIMESTAMPDIFF(hour, fecha_entrada, now())-TIMESTAMPDIFF(day, fecha_entrada, now())*24,'H  ',
            TIMESTAMPDIFF(minute, fecha_entrada, now())-(TIMESTAMPDIFF(hour, fecha_entrada, now()))*60,'M')
            as tiempo
    FROM deshabilitacg
    WHERE fecha_salida='0000-00-00 00:00:00'
";
$resCgDes = $mysqli->query($queryCargadoresDes);
$cgDes=array();
while($fila = $resCgDes->fetch_array()) {
    $cgDes[$fila['cg']]=$fila;
}
$json_array = array();
  while($fila = $resultado->fetch_array()) {
    $tmp = array();
    $tmp['details'] = array();
    $num_lugares = BodegasQuery::create()->filterByCg($fila['cgid'])->count();
    $bodegas = BodegasQuery::create()->select('Id')->filterByCg($fila['cgid'])->find()->toArray();
    $lugares_ocupados = UsoBateriasBodegaQuery::create()->filterByBg($bodegas)->filterByFechaSalida(NULL)->count();
    $baterias_espera = UsoBateriasBodegaQuery::create()->filterByBg($bodegas)->filterByFechaEntrada(NULL,  Criteria::NOT_EQUAL)->filterByFechaSalida(NULL)->filterByFechaCarga(NULL)->filterByFechaDescanso(NULL)->count();
    $baterias_descanso = UsoBateriasBodegaQuery::create()->filterByBg($bodegas)->filterByFechaEntrada(NULL,  Criteria::NOT_EQUAL)->filterByFechaSalida(NULL)->filterByFechaCarga(NULL,  Criteria::NOT_EQUAL)->filterByFechaDescanso(NULL,  Criteria::NOT_EQUAL)->count();
    $baterias_carga = UsoBateriasBodegaQuery::create()->filterByBg($bodegas)->filterByFechaEntrada(NULL,  Criteria::NOT_EQUAL)->filterByFechaSalida(NULL)->filterByFechaCarga(NULL,  Criteria::NOT_EQUAL)->filterByFechaDescanso(NULL)->count();
    if($baterias_carga == 0){
         $tmp['Tiempo'] = 'Disponible';
    }else{
        $baterias_carga = UsoBateriasBodegaQuery::create()->filterByBg($bodegas)->filterByFechaEntrada(NULL,  Criteria::NOT_EQUAL)->filterByFechaSalida(NULL)->filterByFechaCarga(NULL,  Criteria::NOT_EQUAL)->filterByFechaDescanso(NULL)->findOne();
        $today = new DateTime();
        $tiempo_carga = new DateTime($baterias_carga->getFechaCarga());
        $tiempo_carga =$tiempo_carga->diff($today);
        $tmp['Tiempo'] = $tiempo_carga->d.'D '.$tiempo_carga->h.'H '.$tiempo_carga->i.'M';
        
    }
    $herramientas="<button type='button' class='btn green' onclick='window.location.href=\"sistema.php?ruta=edita/cargadores&id=".$fila['cgid']."\"'><i class='fa fa-cogs'></i> </button>";
    $herramientas.="<button type='button' class='btn gray'  onclick='window.open(\"libs/imprimeQR.php?tipo=cargadores&id=".$fila['cgid']."\")'><i class='fa fa-qrcode'></i> </button>";
    if($lugares_ocupados > 0){
        $details_control_flag = true;
        $details_control = "<td class='details-control'></td>";
    }else{
         $details_control_flag = false;
         $details_control = "<td></td>";
    }
    
    $tmp['Cargador'] = $fila['Cargador'];
    $tmp['Tipo'] = $fila['Tipo'];
    $tmp['Lugares'] = $num_lugares;
    $tmp['Disponibles'] = ($num_lugares - $lugares_ocupados);
    $tmp['Espera'] = $baterias_espera;
    $tmp['Descanso'] = $baterias_descanso;

    if (isset($cgDes[$fila['cgid']])){
        $tmp['Estado'] = $cgDes[$fila['cgid']]['motivo'].': '.$cgDes[$fila['cgid']]['tiempo'];
        $tmp['Tiempo'] = 'N/D';
    }else{
        $tmp['Estado']= 'Habilitado';                                      
    }
    $tmp['Herramientas'] ="<td>".$herramientas."</td>";

         if($details_control_flag){

             $uso_baterias = UsoBateriasBodegaQuery::create()->filterByBg($bodegas)->filterByFechaSalida(NULL)->find();


             $ubb = new UsoBateriasBodega();
             $count = 0;
             $uso_baterias_count = $uso_baterias->count();
             foreach($uso_baterias as $ubb){

                 $nombre = $ubb->getBaterias()->getBateriasNombre();
                 $today = new DateTime();
                 if(!is_null($ubb->getFechaEntrada()) && is_null($ubb->getFechaCarga()) && is_null($ubb->getFechaDescanso()) && is_null($ubb->getFechaSalida())){
                     $estado = 'Espera';
                     $time = new DateTime($ubb->getFechaEntrada());
                 }elseif (!is_null($ubb->getFechaEntrada()) && !is_null($ubb->getFechaCarga()) && is_null($ubb->getFechaDescanso()) && is_null($ubb->getFechaSalida())) {
                     $estado = 'Carga';
                     $time = new DateTime($ubb->getFechaCarga());
                 }
                 elseif (!is_null($ubb->getFechaEntrada()) && !is_null($ubb->getFechaCarga()) && !is_null($ubb->getFechaDescanso()) && is_null($ubb->getFechaSalida())) {
                     $estado = 'Descanso';
                     $time = new DateTime($ubb->getFechaDescanso());
                 }

                 $tiempo = $time->diff($today);
                 
                 $tmp['details'][$count]['Bateria'] = $nombre;
                 $tmp['details'][$count]['Estado'] = $estado;
                 $tmp['details'][$count]['Tiempo'] = $tiempo->d.'D '.$tiempo->h.'H '.$tiempo->i.'M';
                 
                 $count ++;


             }

         }
         $id = $fila['cgid'];
         $json_array[] = $tmp;
         
 }
 $json = json_encode($json_array);
header('Content-Type: application/json');
echo $json;
