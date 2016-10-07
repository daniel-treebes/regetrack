<?php

$nombrePagina="Cargadores";
$acciones=[];
$acciones[0][0]="Exportar";
$acciones[0][1]="javascript:exporta();";
$acciones[1][0]="Importar";
$acciones[1][1]='javascript:importa();';

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
$tipo = $_GET['tipo'];
if($tipo == 'Bodega'){
    $nombrePagina="Bodegas";
}
require_once("models/header.php");
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

//$resultado = $mysqli->query($query);

$queryCargadoresDes="
    SELECT *, CONCAT(
            TIMESTAMPDIFF(day, fecha_entrada, now()),'D ',    
            TIMESTAMPDIFF(hour, fecha_entrada, now())-TIMESTAMPDIFF(day, fecha_entrada, now())*24,'H  ',
            TIMESTAMPDIFF(minute, fecha_entrada, now())-(TIMESTAMPDIFF(hour, fecha_entrada, now()))*60,'M')
            as tiempo
    FROM deshabilitacg
    WHERE fecha_salida='0000-00-00 00:00:00'
";
//$resCgDes = $mysqli->query($queryCargadoresDes);
//$cgDes=array();
//while($fila = $resCgDes->fetch_array()) {
//   $cgDes[$fila['cg']]=$fila;
//}
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
        <style>
            .dataTables_filter label{
                float: right;
            }
            .dataTables_paginate ul{
                float: right;
            }



        </style>
	<div class="row">
		<div class="col-md-12">
            <?php require_once("tema/comun/topcontenedor.php");?>
                        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box  blue-sharp">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-filter"></i>Filtros
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                                    </div>
                                </div>
                                <div class="portlet-body ">
                                    <div class="row">
                                        <div class="col-sm-3" id="filter_0" style="margin-left: 15px;">
                                            <label>Nombre</label>
                                        </div>
                                        <?php if($tipo == 'Cargador') :?>
                                            <div class="col-sm-3" id="filter_1" style="margin-left: 15px;">
                                                <label >Tipo</label>
                                            </div>
                                        <?php endif;?>
                                        <div class="col-sm-3" id="filter_8" style="margin-left:15px;">
                                            <label>Estatus</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
			<table id="tablacargadores" class="table table-striped table-bordered table-hover table-fixed" cellspacing="0" width="100%">
				<thead>
					<tr>
                                                <th></th>
						<th>Nombre</th>
                                                
                                                <?php if($tipo == 'Cargador') :?>
                                                <th>Tipo</th>
                                                <?php else:?>
                                                <th style="display: none">Tipo</th>
                                                <?php endif;?>
				
						<th>Num. Lugares</th>
						<th>Lugares Disp.</th>
						<th>Bat. En Espera</th>
                                                <th>Bat. En Descanso</th>
					

                                                <?php if($tipo == 'Cargador') :?>
                                                <th>Tiempo En Carga</th>
                                                <?php else:?>
                                                <th style="display: none">Tiempo En Carga</th>
                                                <?php endif;?>
                         
                                                <th>Estatus</th>
						<th>Opciones</th>
					</tr>
				</thead>
                               
                                <tbody></tbody>
			</table>
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light portlet-fit bordered">
						<div class="portlet-title">
							<div class="caption">
                                                            <?php if($tipo == 'Cargador') :?>
								<span class="caption-subject font-green bold uppercase">Desempeño de Cargadores</span>
                                                            <?php else:?>
                                                                <span class="caption-subject font-green bold uppercase">Desempeño de Bodegas</span>
                                                            <?php endif;?>
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
        
        if($tipo == 'Cargador'){
            $grafica=pinta_grafica('cg','reporteCC','carga','todo',$loggedInUser->sucursal_activa);
            echo $grafica;
            $grafica=pinta_grafica('cg','reporteCD','descanso','todo',$loggedInUser->sucursal_activa);
            echo $grafica;
            $grafica=pinta_grafica('cg','reporteCE','espera','todo',$loggedInUser->sucursal_activa);
            echo $grafica;
        }else{
            $grafica=pinta_grafica('li','reporteCE','espera','todo',$loggedInUser->sucursal_activa,'Bodega');
            echo $grafica;
        }
	
require_once("tema/comun/footer.php");
?>
<script src="assets/global/scripts/app.min.js"></script>
<script>
    $(document).ready( function () {
        'use strict';
        var tipo = "<?php echo $tipo?>";

            var columns = [
                {
                    "sClass":      'details-control',
                    "bSortable":      false,
                    "mData":           null,
                    "sDefaultContent": ''
                },
                { "mData": "Cargador" },
                { "mData": "Tipo" },
                { "mData": "Lugares" },
                { "mData": "Disponibles" },
                { "mData": "Espera" },
                { "mData": "Descanso" },
                { "mData": "Tiempo" },
                { "mData": "Estado" },
                { "mData": "Herramientas" },
            ];
       
        console.log()
  
        $.ajax({
            "dataType": 'json',
            "contentType": "application/json; charset=utf-8",
            "type": "GET",
            "url":"/json/cargadores.php",
            data:{tipo:"<?php echo $tipo?>"},
            success: function (data, textStatus, jqXHR) {
                
                var oTable =$('#tablacargadores').dataTable( {
                    "bStateSave": false,
                    "sScrollY": "510px",
                    "iDisplayLength": 25,
                    "bPaginate": false,
                    "aaData": data, 
                    "aaSorting": [[1, 'asc']],
                    "aoColumns": columns,
                    "oLanguage": {
                        "sUrl": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json",
                    },
                    rowCallback: function(row, data, index) {
                        if(data.details.length == 0){
                            $(row).find('td').eq(0).removeClass('details-control');
                        }

                       // if(tipo == 'Cargador'){
                            if($(row).find('td').eq(8).text() == "Habilitado"){
                                $(row).find('td').eq(8).css('color','green').css('font-weight','bold'); 
                             }else{
                                 $(row).find('td').eq(8).css('color','red').css('font-weight','bold'); 
                             }
                             if($(row).find('td').eq(7).text() == "Disponible"){
                                $(row).find('td').eq(7).css('color','green').css('font-weight','bold'); 
                             }else{
                                  $(row).find('td').eq(7).css('color','red').css('font-weight','bold'); 
                            }
                       // }else{
                           
                   
                      //  }
                    },
                    "initComplete": function( settings, json ) {
                        if(tipo == 'Bodega'){
                            $('#tablacargadores tbody tr').filter(function(){
                                
                                $(this).find('td').eq(2).hide();
                                 $(this).find('td').eq(7).hide();
                            });
                        }
                      }
                    
                } );
                
                
               

                $('#tablacargadores tbody').on('click', 'td.details-control', function () {
                   
                    var nTr = $(this).parents('tr')[0];

                    if ( oTable.fnIsOpen(nTr) )
                    {
                        /* This row is already open - close it */
                        $(nTr).removeClass('shown');
                        oTable.fnClose( nTr );
                    }
                    else
                    {
                        /* Open this row */
                        $(nTr).addClass('shown');
                        oTable.fnOpen( nTr, format(nTr), 'details' );
                    }
                    
                });
                
                function format ( d ) {
                    var aData = oTable.fnGetData( d );

                    // `d` is the original data object for the row
                    var table_child = '';
                    var details_count = aData.details.lenght;
                    var count = 0;
                    $(aData.details).each(function(){
                       table_child+= '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px; margin-bottom: 15px;">'+
                        '<tr>'+
                            '<td style="font-weight:bold">Bateria:</td>'+
                            '<td>'+this.Bateria+'</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<td style="font-weight:bold">Estado:</td>'+
                            '<td>'+this.Estado+'</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<td style="font-weight:bold">Tiempo:</td>'+
                            '<td>&nbsp;'+this.Tiempo+'</td>'+
                        '</tr>'+
                    '</table>';
                    count ++;
                    if(count<details_count){
                        table_child+="<hr>";
                    }
                    });
                    return table_child;
                }
                
                if(tipo == 'Cargador'){
                
                    oTable.yadcf([
                        {column_number : 1,filter_type: "multi_select",select_type: 'chosen',filter_container_id: 'filter_0'},
                        {column_number : 2,filter_type: "multi_select",select_type: 'chosen',filter_container_id: 'filter_1'},
                        {column_number : 8,filter_type: "multi_select",select_type: 'chosen',filter_container_id: 'filter_8'},

                    ]);
                }else{
                     oTable.yadcf([
                        {column_number : 1,filter_type: "multi_select",select_type: 'chosen',filter_container_id: 'filter_0'},
                        {column_number : 7,filter_type: "multi_select",select_type: 'chosen',filter_container_id: 'filter_8'},

                    ]);
                }
		$('a.collapse').trigger('click');
                
                
            }
        });
        
        
        /*
        var table = $('#tablacargadores').DataTable({
            "ajax": {
                "dataType": 'json',
                "contentType": "application/json; charset=utf-8",
                "type": "GET",
                "url":"/json/cargadores.php"
            },
            "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "Cargador" },
            { "data": "Tipo" },
            { "data": "Lugares" },
            { "data": "Disponibles" },
            { "data": "Espera" },
            { "data": "Descanso" },
            { "data": "Tiempo" },
            { "data": "Herramientas" },
            {
                "orderable":      false,
            },
        ],
        "order": [[1, 'asc']]
        });
        
*/
       
    });
    
    
</script>
