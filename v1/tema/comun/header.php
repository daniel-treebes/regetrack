<?php

if(isUserLoggedIn()) { 
?>
 <!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="account.php">
            <img src="imagenes/reggae-track.png" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler hide">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
       <?php include("tema/comun/topmenu.php"); ?>
	    <ul class="dropdown-menu">
                     <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <!--img alt="" class="img-circle" src="../assets/layouts/layout/img/avatar3_small.jpg"/-->
                    <span class="username">
                    <?php echo $loggedInUser->displayname; ?> </span>
                    <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
						<li>
                            <a href="user_settings.php">
                            <i class="icon-user"></i> Mi perfil </a>
                        </li>
						<li class="divider">
						<li>
                            <a href="bateriastipos.php">
                            <i class="fa fa-battery-full"></i> Tipos de bateria </a>
                        </li>	
						<li class="divider">
						 <li>
                            <a href="admin_users.php">
                            <i class="icon-users"></i> Usuarios
                            </a>
                        </li>
                        <li>
                            <a href="admin_pages.php">
                            <i class="icon-puzzle"></i>Páginas </a>
                        </li>
                        <li>
                            <a href="admin_permissions.php">
                            <i class="icon-key"></i> Permisos </a>
                        </li>
                       
                        <li>
                            <a href="admin_configuration.php">
                            <i class="icon-rocket"></i> Configuración
                            </a>
                        </li>
                        <li class="divider">
                        </li>
                        
                        <li>
                            <a href="logout.php">
                            <i class="icon-key"></i> Cerrar sesión </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
              
            </ul>
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
	<!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
	  <div class="page-content">
		
<?php
}

?>

  
 
 
 