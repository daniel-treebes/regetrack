<!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-bell"></i>
                    <span class="badge badge-default">
                     1 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <p>
                                 Tiene 1 notificacion.
                            </p>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;">
                                <li>
                                    <a href="#">
                                    <span class="label label-sm label-icon label-success">
                                    <i class="fa fa-plus"></i>
                                    </span>
                                    Cambiar bateria Montagargas 1. <span class="time">
                                     Cambiar</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <!--li class="external">
                            <a href="#">
                            See all notifications <i class="m-icon-swapright"></i>
                            </a>
                        </li-->
                    </ul>
                </li>
                <!-- END NOTIFICATION DROPDOWN -->
               
                <!-- BEGIN TODO DROPDOWN -->
                <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-calendar"></i>
                    
                    </a>
                    <ul class="dropdown-menu extended tasks">
                        <li>
                            <p>
                                 Próximas tareas
                            </p>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;">
								 <li>
                                    <a href="#">
                                    <span class="task">
                                    <span class="desc">
                                    Montacargas 1 </span>
                                    <span class="percent">
                                    11 hrs de uso </span>
                                    </span>
                                    <span class="progress">
                                    <span style="width: 100%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">
                                    100% uso </span>
                                    </span>
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="task">
                                    <span class="desc">
                                    Montacargas 2 </span>
                                    <span class="percent">
                                    4 hrs de uso </span>
                                    </span>
                                    <span class="progress">
                                    <span style="width: 50%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">
                                    50% uso </span>
                                    </span>
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="task">
                                    <span class="desc">
                                     Montacargas 3 </span>
                                    <span class="percent">
                                    5hrs 30 min</span>
                                    </span>
                                    <span class="progress progress-striped">
                                    <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">
                                    65% uso </span>
                                    </span>
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="task">
                                    <span class="desc">
                                    Montacargas 4 </span>
                                    <span class="percent">
                                    1hrs 23 min</span>
                                    </span>
                                    <span class="progress">
                                    <span style="width: 24%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">
                                    24% uso </span>
                                    </span>
                                    </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="external">
                            <a href="#">
                            Ver todos los montagargas <i class="m-icon-swapright"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END TODO DROPDOWN -->
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
        <!-- END TOP NAVIGATION MENU -->