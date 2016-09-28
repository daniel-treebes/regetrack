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
	$deletions = $_POST['delete'];
	if ($deletion_count = deleteUsers($deletions)){
		$successes[] = lang("ACCOUNT_DELETIONS_SUCCESSFUL", array($deletion_count));
	}
	else {
		$errors[] = lang("SQL_ERROR");
	}
}

$userData = fetchAllUsers(); //Fetch information for all users



/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("tema/comun/header.php");?>

        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

                       
    
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            MANEJO DE USUARIOS
        </h3>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
               <?php
echo resultBlock($errors,$successes);

echo "
<form action='https://v2.regetrack.com/register.php'>
    <input type='submit' value='Crear Nuevo usuario'>
</form>

<form name='adminUsers' action='".$_SERVER['PHP_SELF']."' method='post'>
<table class='admin' style='border-spacing:15px;border-collapse: separate;'>
<tr>
<th>Borrar</th><th>Usuario</th><th>Nombre</th><th>Tipo</th><th>Última Entrada</th>
</tr>";

//Cycle through users
foreach ($userData as $v1) {
	echo "
	<tr>
	<td><input type='checkbox' name='delete[".$v1['id']."]' id='delete[".$v1['id']."]' value='".$v1['id']."'></td>
	<td><a href='admin_user.php?id=".$v1['id']."'>".$v1['user_name']."</a></td>
	<td>".$v1['display_name']."</td>
	<td>".$v1['title']."</td>
	<td>
	";
	
	//Interprety last login
	if ($v1['last_sign_in_stamp'] == '0'){
		echo "Never";	
	}
	else {
		echo date("j M, Y", $v1['last_sign_in_stamp']);
	}
	echo "
	</td>
	</tr>";
}

echo "
</table>
<input type='submit' name='Submit' value='Borrar' />
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



