<?php
$habilitaid;
$habilitamc;
$habilitamc;
$habilitamotivo;
$habilitafecha;
?>
<div class="col-md-6" id="indicadores5">
    <div class="portlet box  blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa icon-montacarga"></i>Montacargas <?php echo $nombre; ?>
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
<!--            <a href="" class="remove" data-original-title="" title=""> </a>-->
            </div>
        </div>
        <div class="portlet-body form">
            <div class="btn-group btn-group btn-group-justified">
                <h3> Desabilitado por: <?php echo $habilitamotivo; ?></h3>
                <h3> El dia : <?php echo $habilitafecha; ?></h3>
                <div class="col-s-12 ">
                    <a href="javascript:habilitaEnvia('<?php  echo $_GET['id'] ?>')" class="btn green-jungle btn-block" style="height: 110px;"><h2> <i class="fa fa-send"></i></h2><h5>Habilitar</h5></a>
                </div>
            </div>
        </div>
    </div>
</div>