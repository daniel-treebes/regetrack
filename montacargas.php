<?php

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

require_once("models/header.php");

$nombrePagina="Montacargas";
$acciones=[];
$acciones[0][0]="Exportar";
$acciones[0][1]="javascript:exporta();";
if($loggedInUser->checkPermission(array(2))){
   $acciones[1][0]="Nuevo";
   $acciones[1][1]='/sistema.php?ruta=alta/montacargas'; 
}

$query="
    SELECT
        m.idmontacargas as Id,
        m.montacargas_nombre as Nombre,
        m.montacargas_modelo as Modelo,
        m.montacargas_marca as Marca,
        m.montacargas_comprador as Empresa,
        CONCAT(m.montacargas_c,'-',m.montacargas_k,'-',m.montacargas_p,'-',m.montacargas_t,'-',m.montacargas_e,' (',m.montacargas_volts,'V - ',m.montacargas_amperaje,'Ah)') as Tipo
    FROM
        montacargas as m
        WHERE m.idsucursal = ".$loggedInUser->sucursal_activa."
	ORDER BY Nombre
";


$resultado = $mysqli->query($query);	

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
		   url=location.href.substring(0, location.href.lastIndexOf("/")+1);
		   window.open(url+'exportaciones/emontacargas.php','_blank');
}

	
function importa2(){
		   var file_data = $('#sortpicture').prop('files')[0];   
			var form_data = new FormData();                  
			form_data.append('file', file_data);                         
			$.ajax({
						url: 'importaciones/imontacargas.php', // point to server-side PHP script 
						dataType: 'text',  // what to expect back from the PHP script, if anything
						cache: false,
						contentType: false,
						processData: false,
						data: form_data,                         
						type: 'post',
						success: function(php_script_response){
                     return;
						},
						  error: function(XMLHttpRequest, textStatus, errorThrown) {
							alert(XMLHttpRequest);
						 }
						
			 });
}

function deshabilita(cual) {
	alert();
}
		
	</script>   
   <script src="assets/global/scripts/app.min.js"></script>
	<script type="text/javascript">

    $(document).ready(function() {
        'use strict';
        var oTable =$('#tablamontacargas').dataTable( {
            "bStateSave": false,
//            "sScrollY": "510px",
            "iDisplayLength": 10,
            "bPaginate": true,
            "aaSorting": [[0, 'asc']],
            "oLanguage": {
                "sUrl": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json",
            },
        } );
       oTable.yadcf([
            {column_number : 0,filter_type: "multi_select",select_type: 'chosen',filter_container_id: 'filter_0'},
            {column_number : 1,filter_type: "multi_select",select_type: 'chosen',filter_container_id: 'filter_1'},
            {column_number : 2,filter_type: "multi_select",select_type: 'chosen',filter_container_id: 'filter_2'},
            {column_number : 3,filter_type: "multi_select",select_type: 'chosen',filter_container_id: 'filter_3'},
            {column_number : 4,filter_type: "multi_select",select_type: 'chosen',filter_container_id: 'filter_4'},
            {column_number : 9,filter_type: "multi_select",select_type: 'chosen',filter_container_id: 'filter_9'},
            
        ]);
        
        $('a.collapse').trigger('click');

    } );
	  
	</script>
	<style>
		div.container {
        width: 80%;
    }
	 #tablamontacargas{
		min-width: 750px;
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
                            <div class="col-sm-3" id="filter_1"  style="margin-left: 15px;">
                                <label>Modelo</label>
                            </div>
                            <div class="col-sm-3" id="filter_2" style="margin-left: 15px;">
                                <label>Marca</label>
                            </div>
                            <div class="col-sm-3" id="filter_3" style="margin-left: 15px;">
                                <label>Empresa</label>
                            </div>
                            <div class="col-sm-3" id="filter_4" style="margin-left:15px;">
                                <label>Tipo</label>
                            </div>
                            <div class="col-sm-3" id="filter_9" style="margin-left: 15px;">
                                <label>Status</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
	<table id="tablamontacargas" class="display table table-striped table-bordered table-hover" cellspacing="0" width="50%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Empresa</th>
                <th>Tipo</th>
                
<!--                <th>Total de Ciclos</th>
                <th>Ciclos Restantes</th>-->
			    <th>Batería</th>
			    <th>Tiempo con/sin batería</th>
				<th>Uso P. Hist.</th>
				<th>Uso P. 7dias</th>
				<th>Status</th>
		        <th></th>
            </tr>
        </thead>
       
        <tbody >
			 <?php 
			 while($fila = $resultado->fetch_array()) {
				echo "<tr>";
			    echo "<th>".$fila['Nombre']."</th>";
				echo "<th>".$fila['Modelo']."</th>";
                                  echo "<th>".$fila['Marca']."</th>";
                                   echo "<th>".$fila['Empresa']."</th>";
				echo "<th>".$fila['Tipo']."</th>";
                              

//					 (cictot-IF(COUNT(d.id) IS NULL,0,COUNT(d.id)))/IF(m.ciclos_mant IS NULL OR m.ciclos_mant=0,1,m.ciclos_mant)) AS  'cicres'

			   $qciclos="
				  SELECT COUNT(uso_baterias_montacargas.id) as ciclos
				  FROM uso_baterias_montacargas
                                  JOIN montacargas ON uso_baterias_montacargas.mc = montacargas.idmontacargas
				  WHERE idmontacargas =".$fila['Id']."
					 AND fecha_salida!='0000-00-00 00:00:00'
                                         AND idsucursal = ".$loggedInUser->sucursal_activa."
			   ";
                           
			   $resC1=$mysqli->query($qciclos);
			   $filaC1 = $resC1->fetch_array();
			   $ciclos = $filaC1['ciclos'];
			   
			   $qcicman="
				  SELECT IF(MAX(fecha_entrada) IS NULL,0,MAX(fecha_entrada)) as ultman
				  FROM deshabilitamc
                                  JOIN montacargas ON deshabilitamc.idmontacargas = montacargas.idmontacargas
				  WHERE montacargas.idmontacargas =".$fila['Id']."
					 AND fecha_salida!='0000-00-00 00:00:00'
					 AND motivo='Mantenimiento'
                                         AND montacargas.idsucursal = ".$loggedInUser->sucursal_activa."
			   ";
                          
			   $resC1=$mysqli->query($qcicman);
			   $filaC1 = $resC1->fetch_array();
			   $ultman = $filaC1['ultman'];

			   $qcicact="
				  SELECT COUNT(uso_baterias_montacargas.id) as cicact
				  FROM uso_baterias_montacargas
                                   JOIN montacargas ON uso_baterias_montacargas.mc = montacargas.idmontacargas
				  WHERE montacargas.idmontacargas =".$fila['Id']."
					 AND fecha_salida>'".$ultman."' AND montacargas.idsucursal = ".$loggedInUser->sucursal_activa."
			   ";
                         
			   $resC1=$mysqli->query($qcicact);
			   $filaC1 = $resC1->fetch_array();
			   $cicact = $filaC1['cicact'];
			   
			   $qcicmei="SELECT IF(montacargas_ciclosiniciales IS NULL,0,montacargas_ciclosiniciales) as cicini,
					 IF(montacargas_ciclosmant IS NULL OR montacargas_ciclosmant=0,1,montacargas_ciclosmant) as cicman
				  FROM  montacargas
				  WHERE  montacargas.idmontacargas = ".$fila['Id']." AND montacargas.idsucursal = ".$loggedInUser->sucursal_activa.";";
			  
                          
                           $resC1=$mysqli->query($qcicmei);
			   $filaC1 = $resC1->fetch_array();
			   $cicini = $filaC1['cicini'];
			   $cicman = $filaC1['cicman'];
		   
			   if ($ultman==0) $sumaini=$cicini;
			   else $sumaini=0;
		   
			   $cictot = $ciclos;
			   $cicres = $cicman-$cicact-$sumaini;

			  // echo "<th>".$cictot."</th>";

			   //echo "<th>".$cicres."</th>";
				
				$saludBateriaActualValor = mt_rand(1, 100);
				
				$querybateria="
				  SELECT b.baterias_nombre as 'bateria', CONCAT(TIMESTAMPDIFF(day, fecha_entrada, now()),'D ',    
					 TIMESTAMPDIFF(hour, fecha_entrada, now())-TIMESTAMPDIFF(day, fecha_entrada, now())*24,'H  ',
					 TIMESTAMPDIFF(minute, fecha_entrada, now())-(TIMESTAMPDIFF(hour, fecha_entrada, now()))*60,'M')
					 as 'tiempo'
				  FROM uso_baterias_montacargas as u, baterias as b
				  WHERE fecha_salida = '0000-00-00 00:00:00'
					 AND u.bt = b.idbaterias
                                         AND b.idsucursal = ".$loggedInUser->sucursal_activa."
					 AND u.mc =".$fila['Id'];
 
                            
			   $resultadobateria=$mysqli->query($querybateria);
			   $filabateria = $resultadobateria->fetch_array();
			   if (!isset($filabateria['bateria'])) {
				  $filabateria['bateria']='<div style="color:red">Sin Batería</div>';
				  if (!isset($filabateria['tiempo'])) $filabateria['tiempo']='<div style="color:red">Sin registro</div>';
			   }
				echo "<th>".$filabateria['bateria']."</th>";
				echo "<th>".$filabateria['tiempo']."</th>";

				$eficiencia=eficiencia('mc','uso','sindiv',$fila['Id']);
   				echo "<th>".round($eficiencia['promedio'],2)."</th>";
   				echo "<th>".round($eficiencia['7d']['promedio'],2)."</th>";

				
				$querystatus="SELECT motivo,
						CONCAT(TIMESTAMPDIFF(day, fecha_entrada, now()),'D ',    
						   TIMESTAMPDIFF(hour, fecha_entrada, now())-TIMESTAMPDIFF(day, fecha_entrada, now())*24,'H  ',
						   TIMESTAMPDIFF(minute, fecha_entrada, now())-(TIMESTAMPDIFF(hour, fecha_entrada, now()))*60,'M')
						as 'tiempo'
					 FROM deshabilitamc
                                         JOIN montacargas ON deshabilitamc.idmontacargas = montacargas.idmontacargas                
					 WHERE montacargas.idmontacargas=".$fila['Id']."
						AND fecha_salida='0000-00-00 00:00:00' AND montacargas.idsucursal=".$loggedInUser->sucursal_activa;
                           
			   if ($resultadostatus=$mysqli->query($querystatus)){
				  $filastatus = $resultadostatus->fetch_array();
						 
				  if (isset($filastatus['motivo']) ){
					   echo '<th style="color:red">'.$filastatus['motivo'].': '.$filastatus['tiempo'].'</th>';
				  }else{
					   echo '<th style="color:green">Habilitado</th>';
				  }
			   }else{
				   echo '<th style="color:green">Habilitado</th>';
			   }

				$herramientas="<button type='button' class='btn green' onclick='window.location.href=\"sistema.php?ruta=edita/montacargas&id=".$fila['Id']."\"'><i class='fa fa-cogs'></i> </button>";
				$herramientas.="<button type='button' class='btn gray'  onclick='window.open(\"libs/imprimeQR.php?tipo=montacargas&id=".$fila['Id']."\")'><i class='fa fa-qrcode'></i> </button>";
				
				
				echo "<th>".$herramientas."</th>";
				echo "</tr>";
			  }
			 ?>
            <?php  ?>
        </tbody>
    </table>
		<div class="row">
		   <div class="col-md-12">
			   <div class="portlet light portlet-fit bordered">
				   <div class="portlet-title">
					   <div class="caption">
						   <span class="caption-subject font-green bold uppercase">Desempeño de montacargas</span>
					   </div>
				   </div>
				   <div class="portlet-body">
					   <div id="reporteMC" ></div>
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

<?php
$grafica=pinta_grafica('mc','reporteMC','uso','todo');
echo $grafica;

require_once("tema/comun/footer.php");
?>
