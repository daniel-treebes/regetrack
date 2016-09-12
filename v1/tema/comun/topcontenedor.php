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
                    <a href="#"><?php echo $nombrePagina ?></a>
                    
                </li>
            </ul>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    Acciones <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                    <?php
                    
                    for($i=0;$i<=count($acciones)-1;$i++){
                        ?>
                         <li>
                            <a href="<?php echo $acciones[$i][1]  ?>"><?php echo $acciones[$i][0]  ?></a>
                        </li>
                         <?php
                         if($i==0){
                             ?><li class="divider"> <?php
                         }
                    }
                    
                    ?>
                    </ul>
                       
                       
                    
                </div>
            </div>
        </div>
        <!-- END PAGE HEADER-->