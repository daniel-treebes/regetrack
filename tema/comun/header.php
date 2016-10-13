<?php

if(isUserLoggedIn()) {
	
	
?>
 <!-- BEGIN HEADER -->
 <body ng-app="regetrack">
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="escanear.php">
            <img src="imagenes/reggae-track.png" alt="logo" class="logo-default hidden-xs"/>
            <img src="imagenes/reggae-track_2.png" alt="logo" class="logo-default hidden-sm hidden-md hidden-lg"/>
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
	   
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->

  <?php include("tema/comun/sidebar.php"); ?>
	
	<!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
	  <div class="page-content">
		
<?php

if($loggedInUser->checkPermission(array(1,2))){
	echo "<br><br>"	;
	?>
		<style>
			@font-face {
				font-family: 'icomoon';
				src:    url('fonts/icomoon.eot?3h0hdn');
				src:    url('fonts/icomoon.eot?3h0hdn#iefix') format('embedded-opentype'),
					url('fonts/icomoon.ttf?3h0hdn') format('truetype'),
					url('fonts/icomoon.woff?3h0hdn') format('woff'),
					url('fonts/icomoon.svg?3h0hdn#icomoon') format('svg');
				font-weight: normal;
				font-style: normal;
			}
			
			[class^="icon-"], [class*=" icon-"] {
				/* use !important to prevent issues with browser extensions that change fonts */
				font-family: 'icomoon' !important;
				speak: none;
				font-style: normal;
				font-weight: normal;
				font-variant: normal;
				text-transform: none;
				line-height: 1;
			
				/* Better Font Rendering =========== */
				-webkit-font-smoothing: antialiased;
				-moz-osx-font-smoothing: grayscale;
			}
			
			.icon-bateria:before {
				content: "\e900";
			}
			.icon-cargador:before {
				content: "\e901";
			}
			.icon-montacarga:before {
				content: "\e902";
			}

			ul.nav.navbar-nav.pull-right {
			 display: block;
			 z-index: 999;
			 color: white;
			 line-height: 44px;
			 vertical-align: middle;
			}
			.blanco{
			 z-index: 999;
			 color: white;
			}
		</style>
	<?php
	}else{
		echo "<br><br>";
		?>
		<style>
			ul.nav.navbar-nav.pull-right {
			/* display: none;*/
			}
			
			.page-sidebar-wrapper,.page-header.navbar .menu-toggler.responsive-toggler {
			 display: none !important;
			}
			
			.page-content-wrapper .page-content {
			 margin-left: 0px !important;
			 margin-top: 0;
			 min-height: 600px;
			 padding: 25px 20px 10px;
			}
			
			ul.nav.navbar-nav.pull-right {
			 display: block;
			 z-index: 999;
			 color: white;
 			 line-height: 44px;
			 vertical-align: middle;
			}
			
			.blanco{
			 z-index: 999;
			 color: white;
			}
		</style>
		
<?php
		
	}
}

?>

  
 
 
 