<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

//Prevent the user visiting the logged in page if he/she is already logged in
if(isUserLoggedIn()) {
	
	//echo $loggedInUser->checkPermission(ARRAY);
	
	//header("Location: escanear.php"); die();
	
	}

//Forms posted
if(!empty($_POST))
{
    
	$errors = array();
	$username = sanitize(trim($_POST["username"]));
	$password = trim($_POST["password"]);
	
	//Perform some validation
	//Feel free to edit / change as required
	if($username == "")
	{
		$errors[] = lang("ACCOUNT_SPECIFY_USERNAME");
	}
	if($password == "")
	{
		$errors[] = lang("ACCOUNT_SPECIFY_PASSWORD");
	}

	if(count($errors) == 0)
	{       
            
       
		//A security note here, never tell the user which credential was incorrect
		if(!usernameExists($username))
		{
			$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
		}
		else
		{
                        
			$userdetails = fetchUserDetails($username);
                        
			//See if the user's account is activated
			if($userdetails["active"]==0)
			{
				$errors[] = lang("ACCOUNT_INACTIVE");
			}
			else
			{
				//Hash the password and use the salt from the database to compare the password.
				$entered_pass = generateHash($password,$userdetails["password"]);
				
				if($entered_pass != $userdetails["password"])
				{
					//Again, we know the password is at fault here, but lets not give away the combination incase of someone bruteforcing
					$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
				}
				else
				{
                                   
                                        
					//Passwords match! we're good to go'
					
					//Construct a new logged in user object
					//Transfer some db data to the session object
					$loggedInUser = new loggedInUser();
					$loggedInUser->email = $userdetails["email"];
					$loggedInUser->user_id = $userdetails["id"];
					$loggedInUser->hash_pw = $userdetails["password"];
					$loggedInUser->title = $userdetails["title"];
					$loggedInUser->displayname = $userdetails["display_name"];
					$loggedInUser->username = $userdetails["user_name"];
					$loggedInUser->idsucursal = $userdetails["idsucursal"];
                                        
					//SI ES ADMINISTRADOR Y NO TIENE UNA SUCURSAL ASIGNADA LE ASIGNAMOS LA PRIMERA ACTIVA
					if(is_null($loggedInUser->idsucursal)){
						$hoy = time();
                                                $empresa = EmpresaQuery::create()->filterByIdusuario($loggedInUser->user_id)->findOne();
						$sucursal_activa = SucursalQuery::create()->filterByIdempresa($empresa->getIdempresa())->findOne();
                                                $loggedInUser->idempresa = $empresa->getIdempresa();
						$loggedInUser->sucursal_activa = $sucursal_activa->getIdsucursal();
						
						$query=" SELECT idsucursal
							FROM sucursal
							WHERE idempresa=".$loggedInUser->idempresa."
							ORDER BY idsucursal						
						";
						$res = $mysqli->query($query);
						$loggedInUser->sucursales="";
						while($fila = $res->fetch_array()) {
							$loggedInUser->sucursales.=$fila['idsucursal'].',';
						}
						$loggedInUser->sucursales=substr($loggedInUser->sucursales,0,-1);
						
					}else{
						$loggedInUser->sucursal_activa = $loggedInUser->idsucursal;
						$loggedInUser->sucursales=$loggedInUser->sucursal_activa;
					}
                              
					//Update last sign in
					$loggedInUser->updateLastSignIn();
					$_SESSION["userCakeUser"] = $loggedInUser;
					
					//Redirect to user account page
					header("Location: index.php");
					die();
				}
			}
		}
	}
}

require_once("models/header.php");
require_once("tema/usuario/login.php");
require_once("tema/comun/footer.php");
/*echo "
<body>
<div id='wrapper'>
<div id='top'><div id='logo'></div></div>
<div id='content'>
<h1>UserCake</h1>
<h2>Login</h2>
<div id='left-nav'>";

include("left-nav.php");

echo "
</div>
<div id='main'>";

echo resultBlock($errors,$successes);

echo "
<div id='regbox'>
<form name='login' action='".$_SERVER['PHP_SELF']."' method='post'>
<p>
<label>Username:</label>
<input type='text' name='username' />
</p>
<p>
<label>Password:</label>
<input type='password' name='password' />
</p>
<p>
<label>&nbsp;</label>
<input type='submit' value='Login' class='submit' />
</p>
</form>
</div>
</div>
<div id='bottom'></div>
</div>
</body>
</html>";
*/
?>
