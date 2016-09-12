<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("tema/comun/header.php");?>

<div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

                       
    
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Bienvenidos <small>al primer jalon.</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.html">Regetrak</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Pagina actual</a>
                    
                </li>
            </ul>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    Actions <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a href="#">Acción</a>
                        </li>
                        <li>
                            <a href="#">Otra acción</a>
                        </li>
                        <li>
                            <a href="#">Algo mas aqui</a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="#">Links separados</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                Hola, este es el primer desarrollo del sistema, ya maneja todo el control de usuarios, asi como cargar dinamicamente las secciones del sitio.
				<br>
				De momento solo funcionan los menus relacionados a la edicion de usuarios.
				<br>
				Porfavor, no le muevan  a nada aun.
				<br><br>
				Usuario:<?php echo $loggedInUser->displayname ?><br>
				Categoria:<?php echo  $loggedInUser->title?><br>
				Fecha:<?php echo  date("M d, Y", $loggedInUser->signupTimeStamp())?><br>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>


<?php
require_once("tema/comun/footer.php");
?>
