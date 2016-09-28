					
						<?php


if($loggedInUser->checkPermission(array(2))){
                
                $sucursa_activa = SucursalQuery::create()->findPk($loggedInUser->sucursal_activa);
                $sucursales = \SucursalQuery::create()->filterByIdempresa($loggedInUser->idempresa)->find();

		?>
		<!-- BEGIN TOP NAVIGATION MENU -->
            <ul class="nav navbar-nav pull-right" >
                <li class="dropdown dropdown-user" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <!--img alt="" class="img-circle" src="../assets/layouts/layout/img/avatar3_small.jpg"/-->
                    <span class="username" >
                    <?php echo $loggedInUser->displayname ?> (<?php echo $sucursa_activa->getSucursalNombre()?>) </span>
                    <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
						<li>
                            <a href="user_settings.php">
                            <i class="fa fa-user"></i> Mi perfil </a>
                        </li>
						<li class="divider">
						<li>
                            <a href="bateriastipos.php">
                            <i class="fa fa-battery-full"></i> Tipos de bateria </a>
                        </li>	
						<li>
                            <a href="cargadores.php">
                            <i class="fa icon-cargador"></i> Catalogo Cargadores </a>
                        </li>
						<li class="divider">
						 <li>
                            <a href="admin_users.php">
                            <i class="fa fa-users"></i> Usuarios
                            </a>
                        </li>
						<li>
                            <a href="admin_pages.php">
                            <i class="fa fa-file-o"></i> Páginas </a>
                        </li>
						<li>
                            <a href="admin_permissions.php">
                            <i class="fa fa-key"></i> Permisos </a>
                        </li>
                       
                        <li>
                            <a href="admin_configuration.php">
                            <i class="fa fa-cogs"></i> Configuración
                            </a>
                        </li>
                        <li class="divider">
                        </li>
                        <?php foreach ($sucursales as $sucursal) :?>
                            <li>
                                <a href="cambiarsucursal.php?idsucursal=<?php echo $sucursal->getIdsucursal()?>">
                                <?php echo $sucursal->getSucursalNombre()?>
                                <?php if($loggedInUser->sucursal_activa == $sucursal->getIdsucursal()) :?>
                                    <i class="fa fa-check"></i>
                                <?php endif;?>
                                </a>
                            </li>
                        <?php endforeach;?>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="logout.php"><i class="fa fa-sign-out"></i> Salir</a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
              
            </ul>
                        
		<?php
	}elseif($loggedInUser->checkPermission(array(3))){
		?>
		<ul class="nav navbar-nav pull-right" >
			<span class="username" >
                 <?php echo $loggedInUser->displayname; ?> &#160;
			</span>
				<a class="blanco" href="logout.php">
				<i class="fa fa-sign-out"></i> Salir</a><span>&#160;&#160;</span>
		</ul>	
		
		<style>
		ul.nav.navbar-nav.pull-right {
			/* display: none;*/
		}
		.page-sidebar-wrapper {
			display: none;
		}
		
		.page-content-wrapper .page-content {
			margin-left: 0px !important;
			margin-top: 0;
			min-height: 600px;
			padding: 25px 20px 10px;
		}
		</style>
<?php
	}elseif($loggedInUser->checkPermission(array(1))){
		?>
		<ul class="nav navbar-nav pull-right" >
			<span class="username" >
                 <?php echo $loggedInUser->displayname; ?> &#160;
			</span>
				<a class="blanco" href="logout.php">
				<i class="fa fa-sign-out"></i> Salir</a><span>&#160;&#160;</span>
		</ul>	
		
<?php
	}
?>		
		
						
       
		
        <!-- END TOP NAVIGATION MENU -->