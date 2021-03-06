<?php
   $rangoferchasBAT='';
   $rangoferchasDES='';
   $rangoferchasMON='';
   $fini='';
   $ffin='';
   if (isset($_GET['fechaini']) && isset($_GET['fechafin'])){
      $rangoferchasBAT=" AND fecha_entrada>='".$_GET['fechaini']." 00:00:00' AND fecha_entrada<='".$_GET['fechafin']." 23:59:59'";
      $rangoferchasDES=" AND fecha_entrada>='".$_GET['fechaini']." 00:00:00' AND fecha_entrada<='".$_GET['fechafin']." 23:59:59'";
      $rangoferchasMON=" AND fecha_entrada>='".$_GET['fechaini']." 00:00:00' AND fecha_entrada<='".$_GET['fechafin']." 23:59:59'";
      $fini=$_GET['fechaini'];
      $ffin=$_GET['fechafin'];
   }
 
   $nombrePagina="Reportes";
   $acciones=[];
/*
   $acciones[0][0]="Nuevo";
   $acciones[0][1]="accionAñadir";
   $acciones[1][0]="Exportar";
   $acciones[1][1]="javascript:exporta();";
   $acciones[2][0]="Importar";
   $acciones[2][1]='javascript:importa();';
*/

   require_once("models/config.php");
   if (!securePage($_SERVER['PHP_SELF'])){die();}

   require_once("models/header.php");
   require_once("libs/libreriasJquery.php");

   echo '<script src="js/i18n/grid.locale-es.js" type="text/javascript"></script>';

    /******** DO NOT MODIFY ***********/
    require_once('phpGrid.php');
    /**********************************/
global $loggedInUser;
   ?>

<div class="row">
   <div class="col-md-12">
       <?php require_once("tema/comun/topcontenedor.php");?>
   </div>
   <div class="col-md-12">
      <form id="rangofechas" action="reportes.php" method="get">
      Rango de fechas 
      de: <input class="datepicker" type="text" id="fechaini" value="<?php echo $fini;?>"/> 
      a: <input class="datepicker" type="text" id="fechafin" value="<?php echo $ffin;?>"/> 
      <input type="button" id="search_date" value="Filtrar" onclick="recargaconfechas();"> 
      </form>
      <br><br>
<script>
   function recargaconfechas() {
      if ($("#fechaini").val()!=='') {
         window.location.assign("http://v2.regetreack.com/reportes.php?fechaini="+$("#fechaini").val()+"&fechafin="+$("#fechafin").val());
      }
   }

   jQuery(window).load(function() { 
      jQuery(".datepicker").datepicker({ 
            "disabled":false, 
            "dateFormat":"yy-mm-dd", 
            "changeMonth": true, 
            "changeYear": true, 
            "firstDay": 1, 
            "showOn":'both' 
      }); 
   }); 
      
</script>

      <?php
//CARGADORES
      $query="SELECT b.id,
                  s.sucursal_nombre as 'SUCURSAL',
                  cg.cargadores_nombre as 'CARGADOR',
                  bt.baterias_nombre as 'BATERIA',
                  b.fecha_entrada as 'Fecha_Espera',
                  b.fecha_carga as 'Fecha_Carga',
                  b.fecha_descanso as 'Fecha_Descanso',
                  b.fecha_salida as 'Fecha_Salida',
                  CONCAT(TIMESTAMPDIFF(DAY, fecha_entrada, fecha_carga),':',
                     IF((TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_carga)-(TIMESTAMPDIFF(DAY, fecha_entrada, fecha_carga)*24))<10,'0',''),
                     TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_carga)-(TIMESTAMPDIFF(DAY, fecha_entrada, fecha_carga)*24),':',
                     IF((TIMESTAMPDIFF(MINUTE, fecha_entrada, fecha_carga)-(TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_carga)*60))<10,'0',''),
                     TIMESTAMPDIFF(MINUTE, fecha_entrada, fecha_carga)-(TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_carga)*60)
                  )
                  as 'ESPERA',
                  CONCAT(TIMESTAMPDIFF(DAY, fecha_carga, fecha_descanso),':',
                     IF((TIMESTAMPDIFF(HOUR, fecha_carga, fecha_descanso)-(TIMESTAMPDIFF(DAY, fecha_carga, fecha_descanso)*24))<10,'0',''),
                     TIMESTAMPDIFF(HOUR, fecha_carga, fecha_descanso)-(TIMESTAMPDIFF(DAY, fecha_carga, fecha_descanso)*24),':',
                     IF((TIMESTAMPDIFF(MINUTE, fecha_carga, fecha_descanso)-(TIMESTAMPDIFF(HOUR, fecha_carga, fecha_descanso)*60))<10,'0',''),
                     TIMESTAMPDIFF(MINUTE, fecha_carga, fecha_descanso)-(TIMESTAMPDIFF(HOUR, fecha_carga, fecha_descanso)*60)
                  )
                  as 'CARGA',
                  IF (IF(fecha_original='0000-00-00 00:00:00',
                        IF(TIMESTAMPDIFF(hour, fecha_descanso, fecha_salida)<8,true,false),
                        IF(TIMESTAMPDIFF(hour, fecha_original, fecha_salida)<8,true,false)),
                        CONCAT(TIMESTAMPDIFF(DAY, fecha_descanso, fecha_salida),':',
                           IF((TIMESTAMPDIFF(HOUR, fecha_descanso, fecha_salida)-(TIMESTAMPDIFF(DAY, fecha_descanso, fecha_salida)*24))<10,'0',''),
                           TIMESTAMPDIFF(HOUR, fecha_descanso, fecha_salida)-(TIMESTAMPDIFF(DAY, fecha_descanso, fecha_salida)*24),':',
                           IF((TIMESTAMPDIFF(MINUTE, fecha_descanso, fecha_salida)-(TIMESTAMPDIFF(HOUR, fecha_descanso, fecha_salida)*60))<10,'0',''),
                           TIMESTAMPDIFF(MINUTE, fecha_descanso, fecha_salida)-(TIMESTAMPDIFF(HOUR, fecha_descanso, fecha_salida)*60)),
                        IF (fecha_original='0000-00-00 00:00:00',
                           '0:08:00',
                           IF(TIMESTAMPDIFF(hour, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))<8,
                              '0:08:00',
                              CONCAT(TIMESTAMPDIFF(DAY, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR)),':',
                                 IF((TIMESTAMPDIFF(HOUR, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))-(TIMESTAMPDIFF(DAY, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))*24))<10,'0',''),
                                 TIMESTAMPDIFF(HOUR, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))-(TIMESTAMPDIFF(DAY, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))*24),':',
                                 IF((TIMESTAMPDIFF(MINUTE, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))-(TIMESTAMPDIFF(HOUR, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))*60))<10,'0',''),
                                 TIMESTAMPDIFF(MINUTE, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))-(TIMESTAMPDIFF(HOUR, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))*60))
                           )
                        )
                  ) as 'DESCANSO',
                  IF (IF(fecha_original='0000-00-00 00:00:00',
                        IF(TIMESTAMPDIFF(hour, fecha_descanso, fecha_salida)<8,true,false),
                        IF(TIMESTAMPDIFF(hour, fecha_original, fecha_salida)<8,true,false)),
                     '0:00:00',
                     IF (fecha_original='0000-00-00 00:00:00',
                        CONCAT(TIMESTAMPDIFF(DAY, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida),':',
                           IF((TIMESTAMPDIFF(HOUR, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida)-(TIMESTAMPDIFF(DAY, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida)*24))<10,'0',''),
                           TIMESTAMPDIFF(HOUR, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida)-(TIMESTAMPDIFF(DAY, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida)*24),':',
                           IF((TIMESTAMPDIFF(MINUTE, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida)-(TIMESTAMPDIFF(HOUR, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida)*60))<10,'0',''),
                           TIMESTAMPDIFF(MINUTE, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida)-(TIMESTAMPDIFF(HOUR, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida)*60)),
                        CONCAT(TIMESTAMPDIFF(DAY, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida),':',
                           IF((TIMESTAMPDIFF(HOUR, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida)-(TIMESTAMPDIFF(DAY, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida)*24))<10,'0',''),
                           TIMESTAMPDIFF(HOUR, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida)-(TIMESTAMPDIFF(DAY, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida)*24),':',
                           IF((TIMESTAMPDIFF(MINUTE, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida)-(TIMESTAMPDIFF(HOUR, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida)*60))<10,'0',''),
                           TIMESTAMPDIFF(MINUTE, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida)-(TIMESTAMPDIFF(HOUR, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida)*60))
                     )
                  ) as 'LISTO',
                  ue.user_name as UE,
                  uc.user_name as UC,
                  ud.user_name as UD,
                  us.user_name as US
              FROM sucursal as s, bodegas as bg, cargadores as cg, baterias as bt,
                   uso_baterias_bodega as b
                     LEFT JOIN uc_users as ue ON b.usuario_entrada=ue.id
                     LEFT JOIN uc_users as uc ON b.usuario_carga=uc.id
                     LEFT JOIN uc_users as ud ON b.usuario_descanso=ud.id
                     LEFT JOIN uc_users as us ON b.usuario_salida=us.id
               WHERE b.bg=bg.id
                  AND cg.idcargadores=bg.cg
                  AND b.bt=bt.idbaterias
                  AND bt.idsucursal = s.idsucursal
                  AND bt.idsucursal IN (".$loggedInUser->sucursales.")
                  AND cg.idsucursal IN (".$loggedInUser->sucursales.")".
                  $rangoferchasBAT;
      
      $dg = new C_DataGrid($query, "id", "USO_DE_BATERIAS_Y_CARGADORES");
     
      $dg -> set_caption("USO DE BATER&Iacute;AS Y CARGADORES");
//      $dg -> set_query_filter($qwhere);
      $dg -> set_col_hidden("id");
      $dg -> set_col_align('SUCURSAL', 'center');
      $dg -> set_col_align('CARGADOR', 'center');
      $dg -> set_col_align('BATERIA', 'center');
      $dg -> set_col_title('Fecha_Espera','Fecha Entrada');
      $dg -> set_col_align('Fecha_Espera', 'center');
      $dg -> set_col_title('Fecha_Carga','Fecha Carga');
      $dg -> set_col_align('Fecha_Carga', 'center');
      $dg -> set_col_title('Fecha_Descanso','Fecha Descanso');
      $dg -> set_col_align('Fecha_Descanso', 'center');
      $dg -> set_col_title('F_Desc_Cargador','F. Descanso Cargador');
      $dg -> set_col_align('F_Desc_Cargador', 'center');
      $dg -> set_col_title('Fecha_Salida','Fecha Salida');
      $dg -> set_col_align('Fecha_Salida', 'center');
      $dg -> set_col_align('ESPERA', 'center');
      $dg -> set_col_align('CARGA', 'center');
      $dg -> set_col_align('DESCANSO', 'center');
      $dg -> set_col_align('LISTO', 'center');
      $dg -> set_col_width('CARGADOR', 100);
      $dg -> set_col_width('BATERIA', 100);
      $dg -> set_col_width('ESPERA', 70);
      $dg -> set_col_width('CARGA', 70);
      $dg -> set_col_width('DESCANSO', 80);
      $dg -> set_col_width('LISTO', 70);
      $dg -> set_col_width('UE', 40);
      $dg -> set_col_width('UC', 40);
      $dg -> set_col_width('UD', 40);
      $dg -> set_col_width('US', 40);
     
      $dg -> enable_export('EXCEL');
      $dg -> display();
      
      echo '<br><br>';


//MONTACARGAS
      
      $query="SELECT b.id,
                  s.sucursal_nombre as 'SUCURSAL',
                  mc.montacargas_nombre as 'MONTACARGAS',
                  bt.baterias_nombre as 'BATERIA',
                  b.fecha_entrada as 'Fecha_Uso',
                  b.fecha_salida as 'Fecha_Salida',
                  CONCAT(TIMESTAMPDIFF(DAY, fecha_entrada, fecha_salida),':',
                     IF((TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(DAY, fecha_entrada, fecha_salida)*24))<10,'0',''),
                     TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(DAY, fecha_entrada, fecha_salida)*24),':',
                     IF((TIMESTAMPDIFF(MINUTE, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_salida)*60))<10,'0',''),
                     TIMESTAMPDIFF(MINUTE, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_salida)*60))
                  as 'USO',
                  ue.user_name as UE,
                  us.user_name as US
              FROM sucursal as s, baterias as bt, montacargas as mc,
                   uso_baterias_montacargas as b
                     LEFT JOIN uc_users as ue ON b.usuario_entrada=ue.id
                     LEFT JOIN uc_users as us ON b.usuario_salida=us.id
               WHERE bt.idbaterias=b.bt
                  AND mc.idmontacargas=b.mc
                  AND s.idsucursal=bt.idsucursal
                  AND bt.idsucursal IN (".$loggedInUser->sucursales.")
                  AND mc.idsucursal IN (".$loggedInUser->sucursales.")
               ".$rangoferchasMON;
              
      $dg = new C_DataGrid($query, "id", "USO_DE_BATERIAS_Y_MONTACARGAS");
      $dg -> set_caption("USO DE BATER&Iacute;AS Y MONTACARGAS");
//      $dg -> set_query_filter("mc.idmontacargas=b.mc AND b.bt=bt.idbaterias ".$rangoferchasMON." AND mc.idsucursal = ".$loggedInUser->sucursal_activa);
      $dg -> set_col_hidden("id");
      $dg -> set_col_align('SUCURSAL', 'center');
      $dg -> set_col_align('MONTACARGAS', 'center');
      $dg -> set_col_align('BATERIA', 'center');
      $dg -> set_col_title('Fecha_Uso','Fecha Uso');
      $dg -> set_col_align('Fecha_Uso', 'center');
      $dg -> set_col_title('Fecha_Salida','Fecha Salida');
      $dg -> set_col_align('Fecha_Salida', 'center');
      $dg -> set_col_align('USO', 'right');
      $dg -> set_col_width('USO', 80);
      $dg -> set_col_width('UE', 50);
      $dg -> set_col_width('US', 50);
//      $dg -> enable_search(true);
      $dg -> enable_export('EXCEL');
      $dg -> display();
    
      echo '<br><br>';

//BODEGAS
      $query="SELECT b.id,
                  s.sucursal_nombre as 'SUCURSAL',
                  cg.cargadores_nombre as 'BODEGA',
                  bt.baterias_nombre as 'BATERIA',
                  b.fecha_entrada as 'Fecha_Espera',
                  b.fecha_original as 'F_Desc_Cargador',
                  b.fecha_descanso as 'Fecha_Descanso',
                  b.fecha_salida as 'Fecha_Salida',
                  CONCAT(TIMESTAMPDIFF(DAY, fecha_entrada, fecha_carga),':',
                     IF((TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_carga)-(TIMESTAMPDIFF(DAY, fecha_entrada, fecha_carga)*24))<10,'0',''),
                     TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_carga)-(TIMESTAMPDIFF(DAY, fecha_entrada, fecha_carga)*24),':',
                     IF((TIMESTAMPDIFF(MINUTE, fecha_entrada, fecha_carga)-(TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_carga)*60))<10,'0',''),
                     TIMESTAMPDIFF(MINUTE, fecha_entrada, fecha_carga)-(TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_carga)*60))
                  as 'ESPERA',
                  IF (IF(fecha_original='0000-00-00 00:00:00',
                        IF(TIMESTAMPDIFF(hour, fecha_descanso, fecha_salida)<8,true,false),
                        IF(TIMESTAMPDIFF(hour, fecha_original, fecha_salida)<8,true,false)),
                        CONCAT(TIMESTAMPDIFF(DAY, fecha_descanso, fecha_salida),':',
                           IF((TIMESTAMPDIFF(HOUR, fecha_descanso, fecha_salida)-(TIMESTAMPDIFF(DAY, fecha_descanso, fecha_salida)*24))<10,'0',''),
                           TIMESTAMPDIFF(HOUR, fecha_descanso, fecha_salida)-(TIMESTAMPDIFF(DAY, fecha_descanso, fecha_salida)*24),':',
                           IF((TIMESTAMPDIFF(MINUTE, fecha_descanso, fecha_salida)-(TIMESTAMPDIFF(HOUR, fecha_descanso, fecha_salida)*60))<10,'0',''),
                           TIMESTAMPDIFF(MINUTE, fecha_descanso, fecha_salida)-(TIMESTAMPDIFF(HOUR, fecha_descanso, fecha_salida)*60)),
                        IF (fecha_original='0000-00-00 00:00:00',
                           '0:08:00',
                           IF(TIMESTAMPDIFF(hour, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))<8,
                              '0:08:00',
                              CONCAT(TIMESTAMPDIFF(DAY, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR)),':',
                                 IF((TIMESTAMPDIFF(HOUR, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))-(TIMESTAMPDIFF(DAY, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))*24))<10,'0',''),
                                 TIMESTAMPDIFF(HOUR, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))-(TIMESTAMPDIFF(DAY, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))*24),':',
                                 IF((TIMESTAMPDIFF(MINUTE, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))-(TIMESTAMPDIFF(HOUR, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))*60))<10,'0',''),
                                 TIMESTAMPDIFF(MINUTE, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))-(TIMESTAMPDIFF(HOUR, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))*60))
                           )
                        )
                  ) as 'DESCANSO',
                  IF (IF(fecha_original='0000-00-00 00:00:00',
                        IF(TIMESTAMPDIFF(hour, fecha_descanso, fecha_salida)<8,true,false),
                        IF(TIMESTAMPDIFF(hour, fecha_original, fecha_salida)<8,true,false)),
                     '0:00:00',
                     IF (fecha_original='0000-00-00 00:00:00',
                        CONCAT(TIMESTAMPDIFF(DAY, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida),':',
                           IF((TIMESTAMPDIFF(HOUR, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida)-(TIMESTAMPDIFF(DAY, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida)*24))<10,'0',''),
                           TIMESTAMPDIFF(HOUR, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida)-(TIMESTAMPDIFF(DAY, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida)*24),':',
                           IF((TIMESTAMPDIFF(MINUTE, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida)-(TIMESTAMPDIFF(HOUR, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida)*60))<10,'0',''),
                           TIMESTAMPDIFF(MINUTE, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida)-(TIMESTAMPDIFF(HOUR, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida)*60)),
                        CONCAT(TIMESTAMPDIFF(DAY, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida),':',
                           IF((TIMESTAMPDIFF(HOUR, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida)-(TIMESTAMPDIFF(DAY, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida)*24))<10,'0',''),
                           TIMESTAMPDIFF(HOUR, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida)-(TIMESTAMPDIFF(DAY, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida)*24),':',
                           IF((TIMESTAMPDIFF(MINUTE, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida)-(TIMESTAMPDIFF(HOUR, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida)*60))<10,'0',''),
                           TIMESTAMPDIFF(MINUTE, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida)-(TIMESTAMPDIFF(HOUR, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida)*60))
                     )
                  ) as 'LISTO',
                  ue.user_name as UE,
                  ud.user_name as UD,
                  us.user_name as US
              FROM sucursal as s, bodegas as bg, cargadores as cg, baterias as bt,
                   uso_baterias_bodega as b
                     LEFT JOIN uc_users as ue ON b.usuario_entrada=ue.id
                     LEFT JOIN uc_users as uc ON b.usuario_carga=uc.id
                     LEFT JOIN uc_users as ud ON b.usuario_descanso=ud.id
                     LEFT JOIN uc_users as us ON b.usuario_salida=us.id
               WHERE b.bg=bg.id
                  AND cg.idcargadores=bg.cg
                  AND b.bt=bt.idbaterias
                  AND bt.idsucursal = s.idsucursal
                  AND bt.idsucursal IN (".$loggedInUser->sucursales.")
                  AND cg.idsucursal IN (".$loggedInUser->sucursales.")
                  ".$rangoferchasBAT;

      $dg = new C_DataGrid($query, "id", "USO_DE_BATERIAS_EN_BODEGAS");
      
      $dg -> set_caption("USO DE BATER&Iacute;AS EN BODEGAS");
//      $dg -> set_query_filter("bg.id=b.bg AND bg.cg=cg.idcargadores AND bt.idbaterias=b.bt ".$rangoferchasBAT." AND cg.idsucursal IN (".$loggedInUser->sucursales.") AND cg.cargadores_tipo='Bodega' ");
      $dg -> set_col_hidden("id");
      $dg -> set_col_align('SUCURSAL', 'center');
      $dg -> set_col_align('BODEGA', 'center');
      $dg -> set_col_align('BATERIA', 'center');
      $dg -> set_col_title('Fecha_Espera','Fecha Entrada');
      $dg -> set_col_align('Fecha_Espera', 'center');
      $dg -> set_col_title('F_Desc_Cargador','F.Des. Cargador');
      $dg -> set_col_align('F_Desc_Cargador', 'center');
      $dg -> set_col_title('Fecha_Descanso','Fecha Descanso');
      $dg -> set_col_align('Fecha_Descanso', 'center');
      $dg -> set_col_title('Fecha_Salida','Fecha Salida');
      $dg -> set_col_align('Fecha_Salida', 'center');
      $dg -> set_col_align('ESPERA', 'center');
      $dg -> set_col_align('DESCANSO', 'center');
      $dg -> set_col_align('LISTO', 'center');
      $dg -> set_col_width('BODEGA', 100);
      $dg -> set_col_width('BATERIA', 100);
      $dg -> set_col_width('ESPERA', 80);
      $dg -> set_col_width('DESCANSO', 80);
      $dg -> set_col_width('LISTO', 80);
      $dg -> set_col_width('UE', 40);
      $dg -> set_col_width('UD', 40);
      $dg -> set_col_width('US', 40);
     
      $dg -> enable_export('EXCEL');
      $dg -> display();
      
      echo '<br><br>';



//ALERTAS MONTACARGAS

      $query="SELECT b.id,
                  s.sucursal_nombre as 'SUCURSAL',
                  mc.montacargas_nombre as 'MONTACARGAS',
                  b.fecha_entrada as 'Fecha_Inicio',
                  b.fecha_salida as 'Fecha_Fin',
                  CONCAT(TIMESTAMPDIFF(DAY, fecha_entrada, fecha_salida),':',
                     IF((TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(DAY, fecha_entrada, fecha_salida)*24))<10,'0',''),
                     TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(DAY, fecha_entrada, fecha_salida)*24),':',
                     IF((TIMESTAMPDIFF(MINUTE, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_salida)*60))<10,'0',''),
                     TIMESTAMPDIFF(MINUTE, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_salida)*60))
                  as 'Tiempo',
                  ue.user_name as UE,
                  us.user_name as US,
                  b.motivo as 'Motivo'
              FROM sucursal as s, montacargas as mc,
                   deshabilitamc as b
                     LEFT JOIN uc_users as ue ON b.usuario_entrada=ue.id
                     LEFT JOIN uc_users as us ON b.usuario_salida=us.id
               WHERE b.idmontacargas=mc.idmontacargas
                  AND s.idsucursal=mc.idsucursal
                  AND mc.idsucursal IN (".$loggedInUser->sucursales.") 
                  ".$rangoferchasMON;
  
      $dg = new C_DataGrid($query, "id", "Alertas_Montacargas");
      $dg -> set_caption("Alertas Montacargas");
//      $dg -> set_query_filter("mc.idmontacargas=b.idmontacargas ".$rangoferchasMON." AND mc.idsucursal = ".$loggedInUser->sucursal_activa);
      $dg -> set_col_hidden("id");
      $dg -> set_col_align('SUCURSAL', 'center');
      $dg -> set_col_align('MONTACARGAS', 'center');
      $dg -> set_col_align('Motivo', 'left');
      $dg -> set_col_title('Fecha_Inicio','Fecha Inicio');
      $dg -> set_col_align('Fecha_Inicio', 'center');
      $dg -> set_col_title('Fecha_Fin','Fecha Fin');
      $dg -> set_col_align('Fecha_Fin', 'center');
      $dg -> set_col_align('Tiempo', 'right');
      $dg -> set_col_width('MONTACARGAS', 80);
      $dg -> set_col_title('Fecha_Inicio','Fecha Inicio');
      $dg -> set_col_width('Fecha_Inicio', 80);
      $dg -> set_col_title('Fecha_Fin','Fecha Fin');
      $dg -> set_col_width('Fecha_Fin', 80);
      $dg -> set_col_width('Tiempo', 50);
      $dg -> set_col_width('UE', 50);
      $dg -> set_col_width('US', 50);
//      $dg -> enable_search(true);
      $dg -> enable_export('EXCEL');
      $dg -> display();
 
 

//ALERTAS BATERIAS

       
      echo '<br><br>';
      $query="SELECT b.id,
                  s.sucursal_nombre as 'SUCURSAL',
                  bt.baterias_nombre as 'BATERIA',
                  b.fecha_entrada as 'Fecha_Inicio',
                  b.fecha_salida as 'Fecha_Fin',
                  CONCAT(TIMESTAMPDIFF(DAY, fecha_entrada, fecha_salida),':',
                     IF((TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(DAY, fecha_entrada, fecha_salida)*24))<10,'0',''),
                     TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(DAY, fecha_entrada, fecha_salida)*24),':',
                     IF((TIMESTAMPDIFF(MINUTE, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_salida)*60))<10,'0',''),
                     TIMESTAMPDIFF(MINUTE, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_salida)*60))
                  as 'Tiempo',
                  ue.user_name as UE,
                  us.user_name as US,
                  b.motivo as 'Motivo'
              FROM sucursal as s,baterias as bt,
                   deshabilitabt as b
                     LEFT JOIN uc_users as ue ON b.usuario_entrada=ue.id
                     LEFT JOIN uc_users as us ON b.usuario_salida=us.id
               WHERE b.bt=bt.idbaterias
                  AND s.idsucursal=bt.idsucursal
                  AND bt.idsucursal IN (".$loggedInUser->sucursales.") 
               ".$rangoferchasDES;

  
      $dg = new C_DataGrid($query, "id", "Alertas_Baterias");
      $dg -> set_caption("Alertas Bater&iacute;as");
//      $dg -> set_query_filter("bt.idbaterias=b.bt ".$rangoferchasDES." AND bt.idsucursal = ".$loggedInUser->sucursal_activa);
      $dg -> set_col_hidden("id");
      $dg -> set_col_align('SUCURSAL', 'center');
      $dg -> set_col_align('BATERIA', 'center');
      $dg -> set_col_align('Motivo', 'left');
      $dg -> set_col_title('Fecha_Inicio','Fecha Inicio');
      $dg -> set_col_align('Fecha_Inicio', 'center');
      $dg -> set_col_title('Fecha_Fin','Fecha Fin');
      $dg -> set_col_align('Fecha_Fin', 'center');
      $dg -> set_col_align('Tiempo', 'right');
      $dg -> set_col_width('BATERIA', 80);
      $dg -> set_col_title('Fecha_Inicio','Fecha Inicio');
      $dg -> set_col_width('Fecha_Inicio', 80);
      $dg -> set_col_title('Fecha_Fin','Fecha Fin');
      $dg -> set_col_width('Fecha_Fin', 80);
      $dg -> set_col_width('Tiempo', 50);
      $dg -> set_col_width('UE', 50);
      $dg -> set_col_width('US', 50);
//      $dg -> enable_search(true);
      $dg -> enable_export('EXCEL');
      $dg -> display();



//ALERTAS CARGADORES

      
      echo '<br><br>';
      $query="SELECT b.id,
                  s.sucursal_nombre as 'SUCURSAL',
                  cg.cargadores_nombre as 'CARGADOR',
                  b.fecha_entrada as 'Fecha_Inicio',
                  b.fecha_salida as 'Fecha_Fin',
                  CONCAT(TIMESTAMPDIFF(DAY, fecha_entrada, fecha_salida),':',
                     IF((TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(DAY, fecha_entrada, fecha_salida)*24))<10,'0',''),
                     TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(DAY, fecha_entrada, fecha_salida)*24),':',
                     IF((TIMESTAMPDIFF(MINUTE, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_salida)*60))<10,'0',''),
                     TIMESTAMPDIFF(MINUTE, fecha_entrada, fecha_salida)-(TIMESTAMPDIFF(HOUR, fecha_entrada, fecha_salida)*60))
                  as 'Tiempo',
                  ue.user_name as UE,
                  us.user_name as US,
                  b.motivo as 'Motivo'
              FROM sucursal as s, cargadores as cg,
                   deshabilitacg as b
                     LEFT JOIN uc_users as ue ON b.usuario_entrada=ue.id
                     LEFT JOIN uc_users as us ON b.usuario_salida=us.id
               WHERE b.cg=cg.idcargadores
                  AND s.idsucursal=cg.idsucursal
                  AND cg.idsucursal IN (".$loggedInUser->sucursales.") 
               ".$rangoferchasDES;

      $dg = new C_DataGrid($query, "id", "Alertas_Cargadores");
      $dg -> set_caption("Alertas Cargadores");
//      $dg -> set_query_filter("cg.idcargadores=b.cg ".$rangoferchasDES." AND cg.idsucursal = ".$loggedInUser->sucursal_activa);
      $dg -> set_col_hidden("id");
      $dg -> set_col_align('SUCURSAL', 'center');
      $dg -> set_col_align('CARGADOR', 'center');
      $dg -> set_col_align('Motivo', 'left');
      $dg -> set_col_title('Fecha_Inicio','Fecha Inicio');
      $dg -> set_col_align('Fecha_Inicio', 'center');
      $dg -> set_col_title('Fecha_Fin','Fecha Fin');
      $dg -> set_col_align('Fecha_Fin', 'center');
      $dg -> set_col_align('Tiempo', 'right');
      $dg -> set_col_width('CARGADOR', 80);
      $dg -> set_col_title('Fecha_Inicio','Fecha Inicio');
      $dg -> set_col_width('Fecha_Inicio', 80);
      $dg -> set_col_title('Fecha_Fin','Fecha Fin');
      $dg -> set_col_width('Fecha_Fin', 80);
      $dg -> set_col_width('Tiempo', 50);
      $dg -> set_col_width('UE', 50);
      $dg -> set_col_width('US', 50);
      $dg -> enable_export('EXCEL');
      $dg -> display();
            
      ?>
      
      
   </div>
</div>


<?php
   require_once("tema/comun/footer.php");
   ?>