<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

$pages = getPageFiles(); //Retrieve list of pages in root usercake folder
$dbpages = fetchAllPages(); //Retrieve list of pages in pages table
$creations = array();
$deletions = array();

//Check if any pages exist which are not in DB
foreach ($pages as $page){
	if(!isset($dbpages[$page])){
		$creations[] = $page;	
	}
}

//Enter new pages in DB if found
if (count($creations) > 0) {
	createPages($creations)	;
}

if (count($dbpages) > 0){
	//Check if DB contains pages that don't exist
	foreach ($dbpages as $page){
		if(!isset($pages[$page['page']])){
			$deletions[] = $page['id'];	
		}
	}
}

//Delete pages from DB if not found
if (count($deletions) > 0) {
	deletePages($deletions);
}

//Update DB pages
$dbpages = fetchAllPages();


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
               <?php
			   

echo "
<table class='admin'>
<tr><th>Id</th><th>Page</th><th>Access</th></tr>";

//Display list of pages
foreach ($dbpages as $page){
	echo "
	<tr>
	<td>
	".$page['id']."
	</td>
	<td>
	<a href ='admin_page.php?id=".$page['id']."'>".$page['page']."</a>
	</td>
	<td>";
	
	//Show public/private setting of page
	if($page['private'] == 0){
		echo "Public";
	}
	else {
		echo "Private";	
	}
	
	echo "
	</td>
	</tr>";
}

echo "
</table>
";

?>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>


<?php
require_once("tema/comun/footer.php");
?>









