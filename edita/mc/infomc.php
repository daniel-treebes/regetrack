<?php

$query="
    SELECT
        m.idmontacargas as Id,
        m.montacargas_nombre as Nombre,
        m.montacargas_modelo as Modelo,
        m.montacargas_marca as Marca,
        m.montacargas_comprador as Comprador,
        m.montacargas_numserie as Serie,
        CONCAT(m.montacargas_c,'-',m.montacargas_k,'-',m.montacargas_p,'-',m.montacargas_t,'-',m.montacargas_e,' (',m.montacargas_volts,'V - ',m.montacargas_amperaje,'Ah)') as Tipo
    FROM montacargas as m
    WHERE m.idmontacargas= ".$_GET['id']."
        AND m.idsucursal IN (".$loggedInUser->sucursales.")
    limit 1
";

$resultado = $mysqli->query($query);
while($fila = $resultado->fetch_array()) {
    $id= $fila['Id'];
    $nombre= $fila['Nombre'];
    $modelo= $fila['Modelo'];
    $tipo= $fila['Tipo'];
    $marca= $fila['Marca'];
    $comprador= $fila['Comprador'];
    $serie= $fila['Serie'];
}

$querydeshabilitado="
    SELECT dmc.*
    FROM deshabilitamc as dmc, montacargas as tmc
    WHERE dmc.idmontacargas= ".$_GET['id']."
        AND tmc.idmontacargas=dmc.idmontacargas
        AND dmc.fecha_salida='0000-00-00 00:00:00'
        AND tmc.idsucursal IN (".$loggedInUser->sucursales.")
";
$resultado = $mysqli->query($querydeshabilitado);
$habilitaid=0;
$habilitamc=$_GET['id'];
$habilitamotivo='';
$habilitafecha='';
while($fila = $resultado->fetch_array()) {
    $habilitaid= $fila['id'];
    $habilitamc= $fila['idmontacargas'];
    $habilitamotivo= $fila['motivo'];
    $habilitafecha= $fila['fecha_entrada'];
}
//DATOS DEL MONTACARGAS
?>
<div class="col-md-6" id="indicadores1">
    <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa icon-montacarga"></i>Montacargas <?php echo $nombre; ?>
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
            </div>
        </div>
        <div class="portlet-body form">	   
            <div class="form-actions right1 gray" >
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nombre</label>
                        <div class="col-md-9">
                            <input readonly type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $nombre ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tipo</label>
                        <div class="col-md-9">
                            <input readonly type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $tipo ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Modelo</label>
                        <div class="col-md-9">
                            <input readonly type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $modelo ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Marca</label>
                        <div class="col-md-9">
                            <input readonly type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $marca ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Comprador</label>
                        <div class="col-md-9">
                            <input readonly type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $comprador ?> "> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Serie</label>
                        <div class="col-md-9">
                            <input readonly type="text" class="form-control datos-cosa" placeholder="Default Input" value="<?php  echo $serie ?> "> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

include("infobd.php");

if($habilitaid>0){
    //SI ESTÁ DESHABILITADO
    include("habilita.php");
}else{
    //PINTA ACTIVIDADES QUE HACER?
    include("cambia.php");
    
    //PROCEDIMIENTO DE DESHABILITADO
    include("deshabilita.php");
    //PROCEDIMIENTO DE MONTADO O DESMONTADO DE BATERÍA
    echo '<div class="row">';
        include("scan.php");
    echo '</div>';
}
?>
<!--DATOS ESTADÍSTICOS-->
<div class="col-md-6" id="indicadores2">
    <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bar-chart "></i>Estadísticas
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
            </div>
        </div>
        <div class="portlet-body form">	   
            <div class="form-actions right1 gray" >
                <div class="form-body">
                <?php
                
                    if($porcentaje>100){
                            $colorbtact="red";
                    }else if($porcentaje>70){
                            $colorbtact="yellow";
                    }else{
                            $colorbtact="green";
                    }
                    ?>
                    <div class="col-md-4">
                        <?php
                        if($siHay>0){
                        ?>
                            <div class="easy-pie-chart">
                               <center>Batería Actual<strong> <?php  echo $nombreBateria ?> </strong></center>
                               <div class="number btact" data-percent="<?php  echo $porcentaje; ?>">
                                  <span><?php  echo $porcentaje; ?></span>% 
                                  <canvas height="75" width="75"></canvas>
                               </div>
                               En uso<br> <?php  echo $tiempoDeUso; ?>
                            </div>
                        <?php
                        }else{
                        ?>
                            <div style="color:red;">
                               <center><strong>SIN<br>Batería</strong></center>
                            </div>
                        <?php
                        }
                        
                        if($porcentajeAnt>100){
                                $colorbtant="red";
                        }else if($porcentajeAnt>70){
                                $colorbtant="yellow";
                        }else{
                                $colorbtant="green";
                        }
                        ?>
                    <br>
                    </div>
                    <div class="margin-bottom-10 visible-sm"></div>
                    <div class="col-md-4">
                        <?php
                        if($idBateriaAnt!=' '){
                        ?>
                            <div class="easy-pie-chart">
                               <center>Batería Anterior<strong> <?php  echo $idBateriaAnt ?> </strong></center>
                               <div class="number btant" data-percent="<?php  echo $porcentajeAnt; ?>">
                                  <span><?php  echo $porcentajeAnt; ?></span>% 
                                  <canvas height="75" width="75"></canvas>
                               </div>
                               En uso<br> <?php  echo $tiempoDeUsoAnt; ?>
                            </div>
                        <?php
                        }else{
                        ?>
                            <div style="color:red;">
                               <center><strong>SIN<br>Batería Anterior</strong></center>
                            </div>
                        <?php
                        }
                        ?>
                    <br>
                    </div>
                    <div class="margin-bottom-10 visible-sm"> </div>
                    <div class="col-md-4">
                       <div class="easy-pie-chart">
                          <center>Tempo sin batería en los últimos 7 días</center>
                          <br><strong><?php echo $sinuso; ?></strong>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>            
<?php
//ALERTAS
include("edita/alertas.php");
pinta_alertas($mysqli,'mc',$id);


if($loggedInUser->checkPermission(array(1,2))){
?>
	<div class="col-md-12" id="indicadores5">
		<div class="portlet box  blue-sharp">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-area-chart"></i>Gráficas  
				</div>
				<div class="tools">
					<a href="" class="collapse" data-original-title="" title=""> </a>
				</div>
			</div>
			<div class="portlet-body form">
                <div class="col-md-12">
				   <div id="reporteMC" ></div>
				</div>
			</div>
		</div>
	</div>

	<?php
	$grafica=pinta_grafica('mc','reporteMC','uso',$id);
	echo $grafica;

}
?>


        


