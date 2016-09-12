<?php

$nombrePagina="Cargadores";
$acciones=[];
$acciones[0][0]="Exportar";
$acciones[0][1]="javascript:exporta();";
$acciones[1][0]="Importar";
$acciones[1][1]='javascript:importa();';

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

require_once("models/header.php");
$query="
SELECT * FROM
(
    SELECT
        b.id as Id,
        c.nombre as Cargador,
        c.id as cgid,
        cbg.cantbg as cantbg,
        b.nombre as Espacio,
        CONCAT(t.volts,'V ',t.ah,'Ah') as Tipo,
        bat.num_serie as Bateria,
        usos.entrada,
        usos.carga,
        usos.descanso,
        NULL as disponible
    FROM
        bodegas as b,
        cargadores as c,
        bateriastipos as t,
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
        usos.bt=bat.id AND
        t.id=c.tipo AND
        c.id=b.cg AND
        cbg.cg=c.id
    
    UNION ALL
    
    SELECT
        b.id as 'Id',
        c.nombre as Cargador,
        c.id as cgid,
        cbg.cantbg as cantbg,
        b.nombre as Espacio,
        CONCAT(t.volts,'V ',t.ah,'Ah') as Tipo,
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
        bateriastipos as t,
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
        t.id=c.tipo AND
        c.id=b.cg AND
        cbg.cg=c.id AND
        b.id not in (
            SELECT 
               bg   
            FROM 
               uso_baterias_bodega
            WHERE 
               fecha_salida='0000-00-00 00:00:00'
            GROUP BY bg
        )
) as todo
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
?>

<input id="sortpicture" type="file" name="sortpic" style="display: none"; />
    <script>
$( "#sortpicture" ).change(function() {
   importa2();
});

	
function importa(){
    $("#sortpicture").trigger('click');		
}
function exporta(){
		   url=location.href.substring(0, location.href.lastIndexOf("/")+1)
		   window.open(url+'exportaciones/ebodegas.php','_blank');
}

	
function importa2(){
    var file_data = $('#sortpicture').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);                         
        $.ajax({
            url: 'importaciones/ibodegas.php', // point to server-side PHP script 
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            success: function(php_script_response){
                location.reload(); // display response from the PHP script, if any
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert(XMLHttpRequest);
            }
        });
}

function deshabilita(cual) {
	alert()
}
		
	</script>   

	<div class="row">
		<div class="col-md-12">
            <?php require_once("tema/comun/topcontenedor.php");?>

			<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Cargador</th>
						<th>Tipo</th>
		<!--				<th>Espacio</th>-->
						<th>Batería</th>
						<th>Estado Lugar</th>
						<th>Tiempo</th>
						<th>Estado Cargador</th>
						<th></th>
					</tr>
				</thead>
			   
				<tbody>
				<?php
				$cg_ant='cualquiercosadiferentequenoserepita';
				while($fila = $resultado->fetch_array()) {
				   if (isset($cgDes[$fila['cgid']])){
						$estado='<span style="color:red">'.$cgDes[$fila['cgid']]['motivo'].': '.$cgDes[$fila['cgid']]['tiempo'].'</span>';
				   }else{
						$estado='<span style="color:green">Habilitado</span>';
				   }
				   echo "<tr>";
				   if ($fila['Cargador']!=$cg_ant){
					   echo "<th rowspan='".$fila['cantbg']."'>".$fila['Cargador']."</th>";
					   echo "<th rowspan='".$fila['cantbg']."'>".$fila['Tipo']."</th>";
				   }
   //				echo "<th>".$fila['Espacio']."</th>";
				   if($fila['disponible']!=NULL){
					   echo '<th style="color:green">Sin Batería</th>';
				   }else{
					   echo "<th>".$fila['Bateria']."</th>";
				   }
				   if($fila['disponible']!=NULL){
					 echo '<th style="color:green">Disponible</th>';
					 echo "<th>".$fila['disponible']."</th>";
				   }elseif($fila['descanso']!=NULL){
					 echo "<th>En descanso</th>";
					 echo "<th>".$fila['descanso']."</th>";
				   }elseif($fila['carga']!=NULL){
					 echo "<th>En carga</th>";
					 echo "<th>".$fila['carga']."</th>";				  
				   }else{
					 echo "<th>En espera</th>";
					 echo "<th>".$fila['entrada']."</th>";				  
				   }
				   //echo "<th>".$fila['']."<th>";
				   $herramientas="<button type='button' class='btn green' onclick='window.location.href=\"sistema.php?ruta=edita/cargadores&id=".$fila['cgid']."\"'><i class='fa fa-cogs'></i> </button>";
				   $herramientas.="<button type='button' class='btn gray'  onclick='window.open(\"libs/imprimeQR.php?tipo=cargadores&id=".$fila['cgid']."\")'><i class='fa fa-qrcode'></i> </button>";
				   
				   if ($fila['Cargador']!=$cg_ant){
					   echo "<th rowspan='".$fila['cantbg']."'>".$estado."</th>";
					   echo "<th rowspan='".$fila['cantbg']."'>".$herramientas."</th>";
				   }				
				   $cg_ant=$fila['Cargador'];
				   echo "</tr>";
				}
				?>
				</tbody>
			</table>
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light portlet-fit bordered">
						<div class="portlet-title">
							<div class="caption">
								<span class="caption-subject font-green bold uppercase">Desempeño de Cargadores</span>
							</div>
						</div>
						<div class="portlet-body">
							<div id="reporteCC" ></div>
						</div>
						<div class="portlet-body">
							<div id="reporteCD" ></div>
						</div>
						<div class="portlet-body">
							<div id="reporteCE" ></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<div id="container" style="height: 30px"></div>
		
		<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>

        <script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
<?php

	$grafica=pinta_grafica('cg','reporteCC','carga');
	echo $grafica;
	$grafica=pinta_grafica('cg','reporteCD','descanso');
	echo $grafica;
	$grafica=pinta_grafica('cg','reporteCE','espera');
	echo $grafica;
	
require_once("tema/comun/footer.php");
?>
