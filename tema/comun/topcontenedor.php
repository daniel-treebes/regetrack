 <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE HEADER-->
  

                    
        <h3 class="page-title">
            Bienvenido <?php echo $loggedInUser->username; ?>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="escanear.php">Regetrak</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#"><?php echo $nombrePagina ?></a>
                </li>
            </ul>

        <?php if (isset($acciones)){ ?>
            <div class="page-toolbar">
                <ul class="nav navbar-nav pull-right" >
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->
                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user" >
                        <a style="padding-bottom:9px;padding-top:10px;" href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <!--img alt="" class="img-circle" src="../assets/layouts/layout/img/avatar3_small.jpg"/-->
                        <span class="username">Acciones</span>
                        <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                        <?php
                        for($i=0;$i<=count($acciones)-1;$i++){
                            ?>
                             <li>
                                <a href="<?php echo $acciones[$i][1]  ?>"><?php echo $acciones[$i][0]  ?></a>
                            </li>
                             <?php
                        }
                        ?>
    
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                  
                </ul>

            
<!--            
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    Acciones <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                    <?php
//                    for($i=0;$i<=count($acciones)-1;$i++){
                        ?>
                         <li>
                            <a href="<?php echo $acciones[$i][1]  ?>"><?php echo $acciones[$i][0]  ?></a>
                        </li>
                         <?php
//                    }
                    ?>
                    </ul>
                </div>
-->            </div>
        <?php }?>
        </div>
        <!-- END PAGE HEADER-->