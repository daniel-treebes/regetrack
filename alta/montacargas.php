<?php

$nombrePagina="Alta Montacargas";
$acciones=[];
$montacargas_nombre = (int)MontacargasQuery::create()->select(array('idmontacargas'))->orderByIdmontacargas(Criteria::DESC)->findOne();
$montacargas_nombre = sprintf("M%03d", $montacargas_nombre+1);

?>

<div class="row">
    <div class="col-sm-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                
            </div>
            <div class="portlet-body form">
                <form role="form">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" readonly type="text" value="<?php echo $montacargas_nombre?>" name="montacargas_nombre">
                    </div>
                    <div class="form-group">
                        <label>Modelo</label>
                        <input class="form-control" type="text" name="montacargas_modelo">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once("tema/comun/footer.php"); ?>
