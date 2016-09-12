<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

//Forms posted
if(!empty($_POST))
{
	//Delete permission levels
	if(!empty($_POST['delete'])){
		$deletions = $_POST['delete'];
		if ($deletion_count = deletePermission($deletions)){
		$successes[] = lang("PERMISSION_DELETIONS_SUCCESSFUL", array($deletion_count));
		}
	}
	
	//Create new permission level
	if(!empty($_POST['newPermission'])) {
		$permission = trim($_POST['newPermission']);
		
		//Validate request
		if (permissionNameExists($permission)){
			$errors[] = lang("PERMISSION_NAME_IN_USE", array($permission));
		}
		elseif (minMaxRange(1, 50, $permission)){
			$errors[] = lang("PERMISSION_CHAR_LIMIT", array(1, 50));	
		}
		else{
			if (createPermission($permission)) {
			$successes[] = lang("PERMISSION_CREATION_SUCCESSFUL", array($permission));
		}
			else {
				$errors[] = lang("SQL_ERROR");
			}
		}
	}
}

$permissionData = fetchAllPermissions(); //Retrieve list of all permission levels


echo resultBlock($errors,$successes);

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
               
<?php
echo "
<form name='adminPermissions' action='".$_SERVER['PHP_SELF']."' method='post'>
<table class='admin'>
<tr>
<th>Delete</th><th>Permission Name</th>
</tr>";

//List each permission level
foreach ($permissionData as $v1) {
	echo "
	<tr>
	<td><input type='checkbox' name='delete[".$v1['id']."]' id='delete[".$v1['id']."]' value='".$v1['id']."'></td>
	<td><a href='admin_permission.php?id=".$v1['id']."'>".$v1['name']."</a></td>
	</tr>";
}

echo "
</table>
<p>
<label>Permission Name:</label>
<input type='text' name='newPermission' />
</p>                                
<input type='submit' name='Submit' value='Submit' />
</form>
";

?>
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>


<?php
require_once("tema/comun/footer.php");
?>

