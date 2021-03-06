<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/

//Functions that do not interact with DB
//------------------------------------------------------------------------------

//Retrieve a list of all .php files in models/languages
function getLanguageFiles()
{
	$directory = "models/languages/";
	$languages = glob($directory . "*.php");
	//print each file name
	return $languages;
}

//Retrieve a list of all .css files in models/site-templates 
function getTemplateFiles()
{
	$directory = "models/site-templates/";
	$languages = glob($directory . "*.css");
	//print each file name
	return $languages;
}

//Retrieve a list of all .php files in root files folder
function getPageFiles()
{
	$directory = "";
	$pages = glob($directory . "*.php");
	//print each file name
	foreach ($pages as $page){
		$row[$page] = $page;
	}
	return $row;
}

//Destroys a session as part of logout
function destroySession($name)
{
	if(isset($_SESSION[$name]))
	{
		$_SESSION[$name] = NULL;
		unset($_SESSION[$name]);
	}
}

//Generate a unique code
function getUniqueCode($length = "")
{	
	$code = md5(uniqid(rand(), true));
	if ($length != "") return substr($code, 0, $length);
	else return $code;
}

//Generate an activation key
function generateActivationToken($gen = null)
{
	do
	{
		$gen = md5(uniqid(mt_rand(), false));
	}
	while(validateActivationToken($gen));
	return $gen;
}

//@ Thanks to - http://phpsec.org
function generateHash($plainText, $salt = null)
{
	if ($salt === null)
	{
		$salt = substr(md5(uniqid(rand(), true)), 0, 25);
	}
	else
	{
		$salt = substr($salt, 0, 25);
	}
	
	return $salt . sha1($salt . $plainText);
}

//Checks if an email is valid
function isValidEmail($email)
{
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return true;
	}
	else {
		return false;
	}
}

//Inputs language strings from selected language.
function lang($key,$markers = NULL)
{
	global $lang;
	if($markers == NULL)
	{
		$str = $lang[$key];
	}
	else
	{
		//Replace any dyamic markers
		$str = $lang[$key];
		$iteration = 1;
		foreach($markers as $marker)
		{
			$str = str_replace("%m".$iteration."%",$marker,$str);
			$iteration++;
		}
	}
	//Ensure we have something to return
	if($str == "")
	{
		return ("No language key found");
	}
	else
	{
		return $str;
	}
}

//Checks if a string is within a min and max length
function minMaxRange($min, $max, $what)
{
	if(strlen(trim($what)) < $min)
		return true;
	else if(strlen(trim($what)) > $max)
		return true;
	else
	return false;
}

//Replaces hooks with specified text
function replaceDefaultHook($str)
{
	global $default_hooks,$default_replace;	
	return (str_replace($default_hooks,$default_replace,$str));
}

//Displays error and success messages
function resultBlock($errors,$successes){
	//Error block
	if(count($errors) > 0)
	{
		echo "<div id='error'>
		<a href='#' onclick=\"showHide('error');\">[X]</a>
		<ul>";
		foreach($errors as $error)
		{
			echo "<li>".$error."</li>";
		}
		echo "</ul>";
		echo "</div>";
	}
	//Success block
	if(count($successes) > 0)
	{
		echo "<div id='success'>
		<a href='#' onclick=\"showHide('success');\">[X]</a>
		<ul>";
		foreach($successes as $success)
		{
			echo "<li>".$success."</li>";
		}
		echo "</ul>";
		echo "</div>";
	}
}

//Completely sanitizes text
function sanitize($str)
{
	return strtolower(strip_tags(trim(($str))));
}

//Functions that interact mainly with .users table
//------------------------------------------------------------------------------

//Delete a defined array of users
function deleteUsers($users) {
	global $mysqli,$db_table_prefix; 
	$i = 0;
	$stmt = $mysqli->prepare("DELETE FROM ".$db_table_prefix."users 
		WHERE id = ?");
	$stmt2 = $mysqli->prepare("DELETE FROM ".$db_table_prefix."user_permission_matches 
		WHERE user_id = ?");
	foreach($users as $id){
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$stmt2->bind_param("i", $id);
		$stmt2->execute();
		$i++;
	}
	$stmt->close();
	$stmt2->close();
	return $i;
}

//Check if a display name exists in the DB
function displayNameExists($displayname)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT active
		FROM ".$db_table_prefix."users
		WHERE
		display_name = ?
		LIMIT 1");
	$stmt->bind_param("s", $displayname);	
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if ($num_returns > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Check if an email exists in the DB
function emailExists($email)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT active
		FROM ".$db_table_prefix."users
		WHERE
		email = ?
		LIMIT 1");
	$stmt->bind_param("s", $email);	
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if ($num_returns > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Check if a user name and email belong to the same user
function emailUsernameLinked($email,$username)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT active
		FROM ".$db_table_prefix."users
		WHERE user_name = ?
		AND
		email = ?
		LIMIT 1
		");
	$stmt->bind_param("ss", $username, $email);	
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if ($num_returns > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Retrieve information for all users
function fetchAllUsers()
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT 
		id,
		user_name,
		display_name,
		password,
		email,
		activation_token,
		last_activation_request,
		lost_password_request,
		active,
		title,
		sign_up_stamp,
		last_sign_in_stamp
		FROM ".$db_table_prefix."users");
	$stmt->execute();
	$stmt->bind_result($id, $user, $display, $password, $email, $token, $activationRequest, $passwordRequest, $active, $title, $signUp, $signIn);
	
	while ($stmt->fetch()){
		$row[] = array('id' => $id, 'user_name' => $user, 'display_name' => $display, 'password' => $password, 'email' => $email, 'activation_token' => $token, 'last_activation_request' => $activationRequest, 'lost_password_request' => $passwordRequest, 'active' => $active, 'title' => $title, 'sign_up_stamp' => $signUp, 'last_sign_in_stamp' => $signIn);
	}
	$stmt->close();
	return ($row);
}

//Retrieve complete user information by username, token or ID
function fetchUserDetails($username=NULL,$token=NULL, $id=NULL)
{   

	if($username!=NULL) {
		$column = "user_name";
		$data = $username;
	}
	elseif($token!=NULL) {
		$column = "activation_token";
		$data = $token;
	}
	elseif($id!=NULL) {
		$column = "id";
		$data = $id;
	}
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT 
		id,
		user_name,
		display_name,
		password,
		email,
		activation_token,
		last_activation_request,
		lost_password_request,
		active,
		title,
		sign_up_stamp,
		last_sign_in_stamp,
                idsucursal
		FROM ".$db_table_prefix."users          
		WHERE
		$column = ?
		LIMIT 1");
		$stmt->bind_param("s", $data);
	
	$stmt->execute();
       
	$stmt->bind_result($id, $user, $display, $password, $email, $token, $activationRequest, $passwordRequest, $active, $title, $signUp, $signIn,$idsucursal);
	
        while ($stmt->fetch()){
		$row = array('id' => $id, 'user_name' => $user, 'display_name' => $display, 'password' => $password, 'email' => $email, 'activation_token' => $token, 'last_activation_request' => $activationRequest, 'lost_password_request' => $passwordRequest, 'active' => $active, 'title' => $title, 'sign_up_stamp' => $signUp, 'last_sign_in_stamp' => $signIn,'idsucursal' => $idsucursal);
              
                
        }
	$stmt->close();
        
	return ($row);
}

//Toggle if lost password request flag on or off
function flagLostPasswordRequest($username,$value)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."users
		SET lost_password_request = ?
		WHERE
		user_name = ?
		LIMIT 1
		");
	$stmt->bind_param("ss", $value, $username);
	$result = $stmt->execute();
	$stmt->close();
	return $result;
}

//Check if a user is logged in
function isUserLoggedIn()
{
	global $loggedInUser,$mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT 
		id,
		password
		FROM ".$db_table_prefix."users
		WHERE
		id = ?
		AND 
		password = ? 
		AND
		active = 1
		LIMIT 1");
	$stmt->bind_param("is", $loggedInUser->user_id, $loggedInUser->hash_pw);	
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if($loggedInUser == NULL)
	{
		return false;
	}
	else
	{
		if ($num_returns > 0)
		{
			return true;
		}
		else
		{
			destroySession("userCakeUser");
			return false;	
		}
	}
}

//Change a user from inactive to active
function setUserActive($token)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."users
		SET active = 1
		WHERE
		activation_token = ?
		LIMIT 1");
	$stmt->bind_param("s", $token);
	$result = $stmt->execute();
	$stmt->close();	
	return $result;
}

//Change a user's display name
function updateDisplayName($id, $display)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."users
		SET display_name = ?
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("si", $display, $id);
	$result = $stmt->execute();
	$stmt->close();
	return $result;
}

//Update a user's email
function updateEmail($id, $email)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."users
		SET 
		email = ?
		WHERE
		id = ?");
	$stmt->bind_param("si", $email, $id);
	$result = $stmt->execute();
	$stmt->close();	
	return $result;
}

//Input new activation token, and update the time of the most recent activation request
function updateLastActivationRequest($new_activation_token,$username,$email)
{
	global $mysqli,$db_table_prefix; 	
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."users
		SET activation_token = ?,
		last_activation_request = ?
		WHERE email = ?
		AND
		user_name = ?");
	$stmt->bind_param("ssss", $new_activation_token, time(), $email, $username);
	$result = $stmt->execute();
	$stmt->close();	
	return $result;
}

//Generate a random password, and new token
function updatePasswordFromToken($pass,$token)
{
	global $mysqli,$db_table_prefix;
	$new_activation_token = generateActivationToken();
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."users
		SET password = ?,
		activation_token = ?
		WHERE
		activation_token = ?");
	$stmt->bind_param("sss", $pass, $new_activation_token, $token);
	$result = $stmt->execute();
	$stmt->close();	
	return $result;
}

//Update a user's title
function updateTitle($id, $title)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."users
		SET 
		title = ?
		WHERE
		id = ?");
	$stmt->bind_param("si", $title, $id);
	$result = $stmt->execute();
	$stmt->close();	
	return $result;	
}

//Check if a user ID exists in the DB
function userIdExists($id)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT active
		FROM ".$db_table_prefix."users
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("i", $id);	
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if ($num_returns > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Checks if a username exists in the DB
function usernameExists($username)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT active
		FROM ".$db_table_prefix."users
		WHERE
		user_name = ?
		LIMIT 1");
	$stmt->bind_param("s", $username);	
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if ($num_returns > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Check if activation token exists in DB
function validateActivationToken($token,$lostpass=NULL)
{
	global $mysqli,$db_table_prefix;
	if($lostpass == NULL) 
	{	
		$stmt = $mysqli->prepare("SELECT active
			FROM ".$db_table_prefix."users
			WHERE active = 0
			AND
			activation_token = ?
			LIMIT 1");
	}
	else 
	{
		$stmt = $mysqli->prepare("SELECT active
			FROM ".$db_table_prefix."users
			WHERE active = 1
			AND
			activation_token = ?
			AND
			lost_password_request = 1 
			LIMIT 1");
	}
	$stmt->bind_param("s", $token);
	$stmt->execute();
	$stmt->store_result();
		$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if ($num_returns > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Functions that interact mainly with .permissions table
//------------------------------------------------------------------------------

//Create a permission level in DB
function createPermission($permission) {
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("INSERT INTO ".$db_table_prefix."permissions (
		name
		)
		VALUES (
		?
		)");
	$stmt->bind_param("s", $permission);
	$result = $stmt->execute();
	$stmt->close();	
	return $result;
}

//Delete a permission level from the DB
function deletePermission($permission) {
	global $mysqli,$db_table_prefix,$errors; 
	$i = 0;
	$stmt = $mysqli->prepare("DELETE FROM ".$db_table_prefix."permissions 
		WHERE id = ?");
	$stmt2 = $mysqli->prepare("DELETE FROM ".$db_table_prefix."user_permission_matches 
		WHERE permission_id = ?");
	$stmt3 = $mysqli->prepare("DELETE FROM ".$db_table_prefix."permission_page_matches 
		WHERE permission_id = ?");
	foreach($permission as $id){
		if ($id == 1){
			$errors[] = lang("CANNOT_DELETE_NEWUSERS");
		}
		elseif ($id == 2){
			$errors[] = lang("CANNOT_DELETE_ADMIN");
		}
		else{
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt2->bind_param("i", $id);
			$stmt2->execute();
			$stmt3->bind_param("i", $id);
			$stmt3->execute();
			$i++;
		}
	}
	$stmt->close();
	$stmt2->close();
	$stmt3->close();
	return $i;
}

//Retrieve information for all permission levels
function fetchAllPermissions()
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT 
		id,
		name
		FROM ".$db_table_prefix."permissions");
	$stmt->execute();
	$stmt->bind_result($id, $name);
	while ($stmt->fetch()){
		$row[] = array('id' => $id, 'name' => $name);
	}
	$stmt->close();
	return ($row);
}

//Retrieve information for a single permission level
function fetchPermissionDetails($id)
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT 
		id,
		name
		FROM ".$db_table_prefix."permissions
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$stmt->bind_result($id, $name);
	while ($stmt->fetch()){
		$row = array('id' => $id, 'name' => $name);
	}
	$stmt->close();
	return ($row);
}

//Check if a permission level ID exists in the DB
function permissionIdExists($id)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT id
		FROM ".$db_table_prefix."permissions
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("i", $id);	
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if ($num_returns > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Check if a permission level name exists in the DB
function permissionNameExists($permission)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT id
		FROM ".$db_table_prefix."permissions
		WHERE
		name = ?
		LIMIT 1");
	$stmt->bind_param("s", $permission);	
	$stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if ($num_returns > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Change a permission level's name
function updatePermissionName($id, $name)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."permissions
		SET name = ?
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("si", $name, $id);
	$result = $stmt->execute();
	$stmt->close();	
	return $result;	
}

//Functions that interact mainly with .user_permission_matches table
//------------------------------------------------------------------------------

//Match permission level(s) with user(s)
function addPermission($permission, $user) {
	global $mysqli,$db_table_prefix; 
	$i = 0;
	$stmt = $mysqli->prepare("INSERT INTO ".$db_table_prefix."user_permission_matches (
		permission_id,
		user_id
		)
		VALUES (
		?,
		?
		)");
	if (is_array($permission)){
		foreach($permission as $id){
			$stmt->bind_param("ii", $id, $user);
			$stmt->execute();
			$i++;
		}
	}
	elseif (is_array($user)){
		foreach($user as $id){
			$stmt->bind_param("ii", $permission, $id);
			$stmt->execute();
			$i++;
		}
	}
	else {
		$stmt->bind_param("ii", $permission, $user);
		$stmt->execute();
		$i++;
	}
	$stmt->close();
	return $i;
}

//Retrieve information for all user/permission level matches
function fetchAllMatches()
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT 
		id,
		user_id,
		permission_id
		FROM ".$db_table_prefix."user_permission_matches");
	$stmt->execute();
	$stmt->bind_result($id, $user, $permission);
	while ($stmt->fetch()){
		$row[] = array('id' => $id, 'user_id' => $user, 'permission_id' => $permission);
	}
	$stmt->close();
	return ($row);	
}

//Retrieve list of permission levels a user has
function fetchUserPermissions($user_id)
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT
		id,
		permission_id
		FROM ".$db_table_prefix."user_permission_matches
		WHERE user_id = ?
		");
	$stmt->bind_param("i", $user_id);	
	$stmt->execute();
	$stmt->bind_result($id, $permission);
        $i = 0;
	while ($stmt->fetch()){
		$row[$i] = array('id' => $id, 'permission_id' => $permission);
                $i++;
	}
	$stmt->close();
	if (isset($row)){
		return ($row);
	}
}

//Retrieve list of users who have a permission level
function fetchPermissionUsers($permission_id)
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT id, user_id
		FROM ".$db_table_prefix."user_permission_matches
		WHERE permission_id = ?
		");
	$stmt->bind_param("i", $permission_id);	
	$stmt->execute();
	$stmt->bind_result($id, $user);
	while ($stmt->fetch()){
		$row[$user] = array('id' => $id, 'user_id' => $user);
	}
	$stmt->close();
	if (isset($row)){
		return ($row);
	}
}

//Unmatch permission level(s) from user(s)
function removePermission($permission, $user) {
	global $mysqli,$db_table_prefix; 
	$i = 0;
	$stmt = $mysqli->prepare("DELETE FROM ".$db_table_prefix."user_permission_matches 
		WHERE permission_id = ?
		AND user_id =?");
	if (is_array($permission)){
		foreach($permission as $id){
			$stmt->bind_param("ii", $id, $user);
			$stmt->execute();
			$i++;
		}
	}
	elseif (is_array($user)){
		foreach($user as $id){
			$stmt->bind_param("ii", $permission, $id);
			$stmt->execute();
			$i++;
		}
	}
	else {
		$stmt->bind_param("ii", $permission, $user);
		$stmt->execute();
		$i++;
	}
	$stmt->close();
	return $i;
}

//Functions that interact mainly with .configuration table
//------------------------------------------------------------------------------

//Update configuration table
function updateConfig($id, $value)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."configuration
		SET 
		value = ?
		WHERE
		id = ?");
	foreach ($id as $cfg){
		$stmt->bind_param("si", $value[$cfg], $cfg);
		$stmt->execute();
	}
	$stmt->close();	
}

//Functions that interact mainly with .pages table
//------------------------------------------------------------------------------

//Add a page to the DB
function createPages($pages) {
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("INSERT INTO ".$db_table_prefix."pages (
		page
		)
		VALUES (
		?
		)");
	foreach($pages as $page){
		$stmt->bind_param("s", $page);
		$stmt->execute();
	}
	$stmt->close();
}

//Delete a page from the DB
function deletePages($pages) {
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("DELETE FROM ".$db_table_prefix."pages 
		WHERE id = ?");
	$stmt2 = $mysqli->prepare("DELETE FROM ".$db_table_prefix."permission_page_matches 
		WHERE page_id = ?");
	foreach($pages as $id){
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$stmt2->bind_param("i", $id);
		$stmt2->execute();
	}
	$stmt->close();
	$stmt2->close();
}

//Fetch information on all pages
function fetchAllPages()
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT 
		id,
		page,
		private
		FROM ".$db_table_prefix."pages");
	$stmt->execute();
	$stmt->bind_result($id, $page, $private);
	while ($stmt->fetch()){
		$row[$page] = array('id' => $id, 'page' => $page, 'private' => $private);
	}
	$stmt->close();
	if (isset($row)){
		return ($row);
	}
}

//Fetch information for a specific page
function fetchPageDetails($id)
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT 
		id,
		page,
		private
		FROM ".$db_table_prefix."pages
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$stmt->bind_result($id, $page, $private);
	while ($stmt->fetch()){
		$row = array('id' => $id, 'page' => $page, 'private' => $private);
	}
	$stmt->close();
	return ($row);
}

//Check if a page ID exists
function pageIdExists($id)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("SELECT private
		FROM ".$db_table_prefix."pages
		WHERE
		id = ?
		LIMIT 1");
	$stmt->bind_param("i", $id);	
	$stmt->execute();
	$stmt->store_result();	
	$num_returns = $stmt->num_rows;
	$stmt->close();
	
	if ($num_returns > 0)
	{
		return true;
	}
	else
	{
		return false;	
	}
}

//Toggle private/public setting of a page
function updatePrivate($id, $private)
{
	global $mysqli,$db_table_prefix;
	$stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."pages
		SET 
		private = ?
		WHERE
		id = ?");
	$stmt->bind_param("ii", $private, $id);
	$result = $stmt->execute();
	$stmt->close();	
	return $result;	
}

//Functions that interact mainly with .permission_page_matches table
//------------------------------------------------------------------------------

//Match permission level(s) with page(s)
function addPage($page, $permission) {
	global $mysqli,$db_table_prefix; 
	$i = 0;
	$stmt = $mysqli->prepare("INSERT INTO ".$db_table_prefix."permission_page_matches (
		permission_id,
		page_id
		)
		VALUES (
		?,
		?
		)");
	if (is_array($permission)){
		foreach($permission as $id){
			$stmt->bind_param("ii", $id, $page);
			$stmt->execute();
			$i++;
		}
	}
	elseif (is_array($page)){
		foreach($page as $id){
			$stmt->bind_param("ii", $permission, $id);
			$stmt->execute();
			$i++;
		}
	}
	else {
		$stmt->bind_param("ii", $permission, $page);
		$stmt->execute();
		$i++;
	}
	$stmt->close();
	return $i;
}

//Retrieve list of permission levels that can access a page
function fetchPagePermissions($page_id)
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT
		id,
		permission_id
		FROM ".$db_table_prefix."permission_page_matches
		WHERE page_id = ?
		");
	$stmt->bind_param("i", $page_id);	
	$stmt->execute();
	$stmt->bind_result($id, $permission);
	while ($stmt->fetch()){
		$row[$permission] = array('id' => $id, 'permission_id' => $permission);
	}
	$stmt->close();
	if (isset($row)){
		return ($row);
	}
}

//Retrieve list of pages that a permission level can access
function fetchPermissionPages($permission_id)
{
	global $mysqli,$db_table_prefix; 
	$stmt = $mysqli->prepare("SELECT
		id,
		page_id
		FROM ".$db_table_prefix."permission_page_matches
		WHERE permission_id = ?
		");
	$stmt->bind_param("i", $permission_id);	
	$stmt->execute();
	$stmt->bind_result($id, $page);
	while ($stmt->fetch()){
		$row[$page] = array('id' => $id, 'permission_id' => $page);
	}
	$stmt->close();
	if (isset($row)){
		return ($row);
	}
}

//Unmatched permission and page
function removePage($page, $permission) {
	global $mysqli,$db_table_prefix; 
	$i = 0;
	$stmt = $mysqli->prepare("DELETE FROM ".$db_table_prefix."permission_page_matches 
		WHERE page_id = ?
		AND permission_id =?");
	if (is_array($page)){
		foreach($page as $id){
			$stmt->bind_param("ii", $id, $permission);
			$stmt->execute();
			$i++;
		}
	}
	elseif (is_array($permission)){
		foreach($permission as $id){
			$stmt->bind_param("ii", $page, $id);
			$stmt->execute();
			$i++;
		}
	}
	else {
		$stmt->bind_param("ii", $permission, $user);
		$stmt->execute();
		$i++;
	}
	$stmt->close();
	return $i;
}

//Check if a user has access to a page
function securePage($uri){
	
	//Separate document name from uri
	$tokens = explode('/', $uri);
	$page = $tokens[sizeof($tokens)-1];
	global $mysqli,$db_table_prefix,$loggedInUser;
	//retrieve page details
	$stmt = $mysqli->prepare("SELECT 
		id,
		page,
		private
		FROM ".$db_table_prefix."pages
		WHERE
		page = ?
		LIMIT 1");
	$stmt->bind_param("s", $page);
	$stmt->execute();
	$stmt->bind_result($id, $page, $private);
	while ($stmt->fetch()){
		$pageDetails = array('id' => $id, 'page' => $page, 'private' => $private);
	}
	$stmt->close();
	//If page does not exist in DB, allow access
	if (empty($pageDetails)){
		return true;
	}
	//If page is public, allow access
	elseif ($pageDetails['private'] == 0) {
		return true;	
	}
	//If user is not logged in, deny access
	elseif(!isUserLoggedIn()) 
	{
		header("Location: login.php");
		return false;
	}
	else {
		//Retrieve list of permission levels with access to page
		$stmt = $mysqli->prepare("SELECT
			permission_id
			FROM ".$db_table_prefix."permission_page_matches
			WHERE page_id = ?
			");
		$stmt->bind_param("i", $pageDetails['id']);	
		$stmt->execute();
		$stmt->bind_result($permission);
		$pagePermissions=array();
		while ($stmt->fetch()){
			$pagePermissions[] = $permission;
		}
		$stmt->close();
		//Check if user's permission levels allow access to page
		if ($loggedInUser->checkPermission($pagePermissions)){ 
			return true;
		}
		//Grant access if master user
		if (!isset($master_account)) $master_account = -1;
		elseif ($loggedInUser->user_id == $master_account){
			return true;
		}
		else {
			header("Location: account.php");
			return false;	
		}
	}
}

//Treebes JLFV a partir de aqui
function pinta_grafica($modulo,$divapintar,$estatus,$idapintar='todo',$tipo="todos",$cargador_tipo= 'Cargador'){
        
	global $mysqli,$loggedInUser;

	date_default_timezone_set('UTC');
	date_default_timezone_set("America/Mexico_City");

	$astipo=" as tipo, ";
	$ordertipo=" tipo, ";
	if($modulo=="bt"){
		$id = 'idbaterias';
		$nombre = 'baterias_nombre';
		$qtipo="CONCAT(m.baterias_c,'-',m.baterias_k,'-',m.baterias_p,'-',m.baterias_t,'-',m.baterias_e,' (',m.baterias_volts,'V - ',m.baterias_amperaje,'Ah)')";
	}elseif($modulo=="cg"){
		$id = 'idcargadores';
		$nombre = 'cargadores_nombre';
		if ($cargador_tipo=='Cargador'){
			$qtipo="CONCAT(m.cargadores_volts,'V ',m.cargadores_amperaje,'Ah (',m.cargadores_e,')')";
		}else{
			$qtipo="";
			$astipo="";
			$ordertipo="";
		}
	}else{
		$id = 'idmontacargas';
		$nombre = 'montacargas_nombre';
		$qtipo="CONCAT(m.montacargas_c,'-',m.montacargas_k,'-',m.montacargas_p,'-',m.montacargas_t,'-',m.montacargas_e,' (',m.montacargas_volts,'V - ',m.montacargas_amperaje,'Ah)')";
	}
	
	$filtro="";
	if ($idapintar!='todo') $filtro='AND m.'.$id.'='.$idapintar;
	if ($estatus=='uso'){
		$fini='fecha_entrada';
		$ffin='fecha_salida';
	}elseif ($estatus=='espera'){
		$fini='fecha_entrada';
		$ffin='fecha_carga';
	}elseif ($estatus=='carga'){
		$fini='fecha_carga';
		$ffin='fecha_descanso';
	}elseif ($estatus=='descanso' || $estatus=='listo'){
		$fini='fecha_descanso';
		$ffin='fecha_salida';
	}

	if ($estatus=="uso"){
		$tuso='uso_baterias_montacargas as u';
		if ($modulo=="bt"){
			$tuso.=' JOIN baterias as m ON u.bt = m.idbaterias';
		}else{
			$tuso.=' JOIN montacargas as m ON u.mc = m.idmontacargas';
		}
	}else{
		$tuso='uso_baterias_bodega as u';
		if ($modulo=="bt"){
			$tuso.=' JOIN baterias as m ON u.bt = m.idbaterias';
		}else{
			$tuso.=' JOIN bodegas as b ON u.bg = b.id JOIN cargadores as m ON b.cg = m.idcargadores';
		}
	}

	$qwhere='m.'.$id.'=u.'.$modulo;
	if($modulo == 'cg'){
		$qwhere='m.'.$id.'=b.cg AND b.id=u.bg AND m.cargadores_tipo = "'.$cargador_tipo.'"';
	}
	$qwhere.=' AND m.idsucursal IN ('.$loggedInUser->sucursales.') ';
	
	if ($tipo!='todos' && $tipo!='tipo' && $cargador_tipo=="Cargador"){
		$qwhere.=" AND ".$qtipo."='".$tipo."'";
	}
	$agrupapor='nombre';
	if ($tipo=='tipo'){
		$agrupapor='tipo';
	}
	$query="
		SELECT
			m.".$id." as id,
			m.$nombre as nombre,
			$qtipo $astipo
			u.$fini as fecha_entrada,
			u.$ffin as fecha_salida,
			TIMESTAMPDIFF(hour, u.$fini, u.$ffin) as hrs,
			TIMESTAMPDIFF(minute, u.$fini, u.$ffin)-(TIMESTAMPDIFF(hour, u.$fini, u.$ffin))*60 as min
		from $tuso
		where $qwhere
			AND u.$ffin!='0000-00-00 00:00:00' 
			$filtro
		order by
			$ordertipo nombre, u.$fini asc
	";
//echo $query.'<br>';
	if ($estatus=='descanso'){
		$query="
			SELECT
				m.".$id." as id,
				m.$nombre as nombre,
				$qtipo $astipo
				u.$fini as fecha_entrada,
				IF(TIMESTAMPDIFF(hour, u.$fini, u.$ffin)<8,
					u.$ffin,
					DATE_ADD(u.$fini, INTERVAL 8 HOUR)
				) as fecha_salida,
				IF(TIMESTAMPDIFF(hour, u.$fini, u.$ffin)<8,
					TIMESTAMPDIFF(hour, u.$fini, u.$ffin),
					8
				) as hrs,
				IF(TIMESTAMPDIFF(hour, u.$fini, u.$ffin)<8,
					TIMESTAMPDIFF(minute, u.$fini, u.$ffin)-(TIMESTAMPDIFF(hour, u.$fini, u.$ffin))*60,
					0
				) as min
			from $tuso
			where $qwhere
				AND (u.$ffin!='0000-00-00 00:00:00'
					OR TIMESTAMPDIFF(hour, u.$fini, now())>=8
				) 
				$filtro
			order by
				$ordertipo nombre, u.$fini asc
		";
	}

	if ($estatus=='listo'){
		$query="
			SELECT
				m.".$id." as id,
				m.$nombre as nombre,
				$qtipo $astipo
				IF(TIMESTAMPDIFF(hour, u.$fini, u.$ffin)<8,
					u.$ffin,
					DATE_ADD(u.$fini, INTERVAL 8 HOUR)
				) as fecha_entrada,
				u.$ffin as fecha_salida,
				IF(TIMESTAMPDIFF(hour, u.$fini, u.$ffin)<8,
					0,
					TIMESTAMPDIFF(hour, DATE_ADD(u.$fini, INTERVAL 8 HOUR), u.$ffin)
				) as hrs,
				IF(TIMESTAMPDIFF(hour, u.$fini, u.$ffin)<8,
					0,
					TIMESTAMPDIFF(minute, DATE_ADD(u.$fini, INTERVAL 8 HOUR), u.$ffin)-(TIMESTAMPDIFF(hour, DATE_ADD(u.$fini, INTERVAL 8 HOUR), u.$ffin))*60
				) as min
			from $tuso
			where $qwhere
				AND u.$ffin!='0000-00-00 00:00:00' 
				$filtro
			order by
				$ordertipo nombre, u.$fini asc
		";
	}
//if ($modulo=='cg') echo $query.'<br>';
    $respuesta = $mysqli->query($query);
       
	$data=array();
	$nombreid='SIN USO';
	if ($respuesta) {
	   while($renglon = $respuesta->fetch_array()){
		  $mc=$renglon[$agrupapor];
		  if (!isset($data[$mc])){
			 $data[$mc]['data']='[';
			 $data[$mc]['nombre']=$renglon[$agrupapor];
			 $nombreid=$renglon[$agrupapor];
		  }
		  $fechaentrada=$renglon['fecha_entrada'];
		  $fecha= strtotime($fechaentrada. " UTC");
		  $data[$mc]['data'].='[parseInt('.$fecha.'000,10),parseInt('.($renglon['hrs']+($renglon['min']/100)).')],';
	   }
	}

	$tabladeh="deshabilita".$modulo." as d";
	$titulo='HORAS EN "'.strtoupper($estatus).'" DE';
	if ($modulo=='bt'){
		$tabladeh.=' JOIN baterias as m ON d.bt = m.idbaterias';
		if ($idapintar=='todo') $titulo.=' BATERIAS';
		else $titulo.=' LA BATERIA '.$nombreid;
	}
	if ($modulo=='cg'){
		$tabladeh.=' JOIN cargadores as m ON d.cg = m.idcargadores';
		if ($cargador_tipo=='Cargador'){
			if ($idapintar=='todo') $titulo.=' CARGADORES';
			else $titulo.='L CARGADOR '.$nombreid;
		}else{
			if ($idapintar=='todo') $titulo.=' BODEGAS';
			else $titulo.=' LA BODEGA '.$nombreid;
		}
	}
	if ($modulo=='mc'){
		$tabladeh.=' JOIN montacargas as m ON d.idmontacargas = m.idmontacargas';
		if ($idapintar=='todo') $titulo.=' MONTACARGAS';
		else $titulo.='L MONTACARGAS '.$nombreid;
	}
	
    if ($tipo!='todos' && $tipo!='tipo' && $cargador_tipo=="Cargador"){
		$titulo.=" - ".$tipo;
		$filtro.=" AND ".$qtipo."='".$tipo."'";
	}
    if ($tipo=='tipo') $titulo.=" - POR TIPO";
	if ($modulo=="cg") $filtro.=" AND m.cargadores_tipo='$cargador_tipo'";
	
	$query="
		SELECT
			d.*,
			$qtipo $astipo
			m.$nombre as nombre
		FROM  $tabladeh
		WHERE m.idsucursal IN (".$loggedInUser->sucursales.")
			$filtro
		ORDER BY $ordertipo nombre, d.fecha_entrada
	";
      
	$rep_alertas = $mysqli->query($query);
//echo $query.'<br>';
	$alertas=array();
         
	if ($rep_alertas){
	   while($renglon = $rep_alertas->fetch_array()){
                
		  $mc= isset($renglon[$modulo]) ? $renglon[$modulo] : 'idmontacargas' ;
		  $mc= $renglon[$agrupapor];
		  if (!isset($alertas[$mc])){
			 $alertas[$mc]['data']='';
			 $alertas[$mc]['nombre']=$renglon[$agrupapor];
		  }
		  $fechaentrada=$renglon['fecha_entrada'];
		  $fecha= strtotime($fechaentrada. " UTC");
		  $alertas[$mc]['data'].="{x: parseInt(".$fecha."000,10),title: 'AVISO', text: '".$renglon['nombre'].": ".$renglon['motivo']."'},";
	   }
	}
	
	if (count($alertas)>0 || count($data)>0){
		$aregresar='<script type="text/javascript">';
			if (count($data)+count($alertas)>0){
				$aregresar.='$(function () {';
				$lineas='';
				foreach ($data as $mc => $dmc){
					$dmc['data']=substr($dmc['data'],0,-1).']';
					$lineas.="{".
						"name : '".$dmc['nombre']."', ".
						"type: 'spline', ".
						"marker : { ".
							"enabled : true, ".
							"radius : 4 ".
						"}, ".
						"data : ".$dmc['data'].", ".
						"id : 'dataseries".$mc."' ".
					"}, ";
				}
				$alineas='';
				if (count($alertas)<=0){
				   $lineas=substr($lineas,0,-1);
				}else{
					foreach ($alertas as $mc => $amc){
						$amc['data']=substr($amc['data'],0,-1);
						$alineas.="{".
							"name : 'Alertas ".$amc['nombre']."', ".
							"type: 'flags', ".
							"visible: false, ".
							"data : [".$amc['data']."], ".
							"onSeries : 'dataseries".$mc."', ".
							"shape : 'circlepin', ".
							"width : 16 ".
						"}, ";
					}
					$alineas=substr($alineas,0,-1);
				}
				
							
				$aregresar.="
					$('#$divapintar').highcharts('StockChart', {
		
						rangeSelector : {
							buttons : [{
								type : 'day',
								count : 1,
								text : '1D'
							}, {
								type : 'week',
								count : 1,
								text : '1S'
							}, {
								type : 'month',
								count : 1,
								text : '1M'
							}, {
								type : 'all',
								count : 1,
								text : 'Todo'
							}],
							selected : 1,
							inputEnabled : true
						},
	
						legend : {
							enabled : true
						},
			
						title : {
							text : '$titulo'
						},
			
						tooltip: {
							style: {
								width: '200px'
							},
							valueDecimals: 4,
							shared : true
						},
			
						yAxis : {
							title : {
								text : 'HORAS'
							}
						},
						xAxis : {
						   max: parseInt(".time()."000)
						},
			
						series : [".$lineas.$alineas."
						]
					});
				});
				";   
			}else{
				//$aregresar.= "$('#$divapintar').html('$titulo<br><br>NO HAY DATOS QUE MOSTRAR');   });";
				$aregresar.= "$('#$divapintar').parent().hide();";
			}
			$aregresar.= "</script>";
			return $aregresar;
	}
	return;
}

function eficiencia($modulo,$estatus,$divapintar,$idapintar='todo',$cargador_tipo= 'Cargador'){
	global $mysqli,$loggedInUser;
	
	if($modulo=="bt"){
		$id = 'idbaterias';
		$nombre = 'baterias_nombre';
	}elseif($modulo=="cg"){
		$id = 'idcargadores';
		$nombre = 'cargadores_nombre';
	}else{
		$id = 'idmontacargas';
		$nombre = 'montacargas_nombre';
	}
	
	$filtro="";
	$notodas="";
	if ($idapintar!='todo'){
		$filtro='AND m.'.$id.'='.$idapintar;
		$notodas='m.'.$nombre.' as nombre,';
	}
	if ($estatus=='uso'){
		$fini='fecha_entrada';
		$ffin='fecha_salida';
		$colorestado="black";
	}elseif ($estatus=='espera'){
		$fini='fecha_entrada';
		$ffin='fecha_carga';
		$colorestado="red";
	}elseif ($estatus=='carga'){
		$fini='fecha_carga';
		$ffin='fecha_descanso';
		$colorestado="orange";
	}elseif ($estatus=='descanso' || $estatus=='listo'){
		$fini='fecha_descanso';
		$ffin='fecha_salida';
		$colorestado="blue";
	}
	if ($estatus=='listo') $colorestado="green";

	if ($estatus=="uso"){
		$tuso='uso_baterias_montacargas as u';
		if ($modulo=="bt"){
			$tuso.=' JOIN baterias as m ON u.bt = m.idbaterias';
		}else{
			$tuso.=' JOIN montacargas as m ON u.mc = m.idmontacargas';
		}
	}else{
		$tuso='uso_baterias_bodega as u';
		if ($modulo=="bt"){
			$tuso.=' JOIN baterias as m ON u.bt = m.idbaterias';
		}else{
			$tuso.=' JOIN bodegas as b ON u.bg = b.id JOIN cargadores as m ON b.cg = m.idcargadores';
		}
	}

	$qwhere='m.'.$id.'=u.'.$modulo;
	if($modulo == 'cg'){
		$qwhere='m.'.$id.'=b.cg AND b.id=u.bg AND cg.cargadores_tipo = "'.$cargador_tipo.'"';
	}
	$qwhere.=' AND m.idsucursal IN ('.$loggedInUser->sucursales.') ';

	$query="
		select
			$notodas
			COUNT(u.id) as datos,
			SUM(TIMESTAMPDIFF(hour, u.$fini, u.$ffin)) as horas,
			AVG(TIMESTAMPDIFF(hour, u.$fini, u.$ffin)) as promedio
		from $tuso
		where $qwhere
			AND u.$ffin!='0000-00-00 00:00:00'
			$filtro
		order by u.$fini asc
	";

	if ($estatus=='descanso'){
		$query="
			select
				$notodas
				COUNT(u.id) as datos,
				SUM(IF (IF(fecha_original='0000-00-00 00:00:00',
							IF(TIMESTAMPDIFF(hour, fecha_descanso, fecha_salida)<8,true,false),
							IF(TIMESTAMPDIFF(hour, fecha_original, fecha_salida)<8,true,false)),
						TIMESTAMPDIFF(hour, fecha_descanso, fecha_salida),
						IF (fecha_original='0000-00-00 00:00:00',
							8,
							IF(TIMESTAMPDIFF(hour, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))<8,
								8,
								TIMESTAMPDIFF(hour, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))
							)
						)
					)
				) as horas,
				AVG(IF (IF(fecha_original='0000-00-00 00:00:00',
							IF(TIMESTAMPDIFF(hour, fecha_descanso, fecha_salida)<8,true,false),
							IF(TIMESTAMPDIFF(hour, fecha_original, fecha_salida)<8,true,false)),
						TIMESTAMPDIFF(hour, fecha_descanso, fecha_salida),
						IF (fecha_original='0000-00-00 00:00:00',
							8,
							IF(TIMESTAMPDIFF(hour, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))<8,
								8,
								TIMESTAMPDIFF(hour, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))
							)
						)
					)
				) as promedio
			from $tuso
			where $qwhere
				AND (u.$ffin!='0000-00-00 00:00:00'
					OR TIMESTAMPDIFF(hour, u.$fini, now())>=8
				)
				$filtro
			order by u.$fini asc
		";
             
	}
	
	if ($estatus=='listo'){
		$query="
			select
				$notodas
				COUNT(u.id) as datos,
				SUM(IF (IF(fecha_original='0000-00-00 00:00:00',
							IF(TIMESTAMPDIFF(hour, fecha_descanso, fecha_salida)<8,true,false),
							IF(TIMESTAMPDIFF(hour, fecha_original, fecha_salida)<8,true,false)),
						0,
						IF (fecha_original='0000-00-00 00:00:00',
							TIMESTAMPDIFF(hour, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida),
							TIMESTAMPDIFF(hour, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida)
						)
					)
				) as horas,
				AVG(IF (IF(fecha_original='0000-00-00 00:00:00',
							IF(TIMESTAMPDIFF(hour, fecha_descanso, fecha_salida)<8,true,false),
							IF(TIMESTAMPDIFF(hour, fecha_original, fecha_salida)<8,true,false)),
						0,
						IF (fecha_original='0000-00-00 00:00:00',
							TIMESTAMPDIFF(hour, DATE_ADD(fecha_descanso, INTERVAL 8 HOUR), fecha_salida),
							TIMESTAMPDIFF(hour, DATE_ADD(fecha_original, INTERVAL 8 HOUR), fecha_salida)
						)
					)
				) as promedio
			from $tuso
			where $qwhere
				AND u.$ffin!='0000-00-00 00:00:00'
				$filtro
			order by u.$fini asc
		";
	}
	
    $respuesta = $mysqli->query($query);

    if(!$respuesta){
        echo '<pre>';var_dump($qwhere);echo  '</pre>';
    }
	
	$regresa['nombreid']='';
	$regresa['datos']=0;
	$regresa['horas']=0;
	$regresa['promedio']=0;

	if ($respuesta) {
		$renglon = $respuesta->fetch_array();
		if ($notodas!=''){
			$regresa['nombreid']=$renglon['nombre'];
			$nombreid=$regresa['nombreid'];
		}
		$regresa['datos']=$renglon['datos'];
		$regresa['horas']=$renglon['horas'];
		$regresa['promedio']=$renglon['promedio'];
		
		$promedio=round($regresa['promedio'],2);

		$titulo='HORAS PROMEDIO EN '.strtoupper($estatus).' ';
		if ($modulo=='bt'){
			if ($idapintar=='todo') $titulo.='';
			else $titulo.='DE LA BATERIA '.$nombreid;
		}
		if ($modulo=='cg'){
			if ($idapintar=='todo') $titulo.='DE CARGADORES';
			else $titulo.='DEL CARGADOR '.$nombreid;
		}
		if ($modulo=='mc'){
			if ($idapintar=='todo') $titulo.='DE MONTACARGAS';
			else $titulo.='DEL MONTACARGAS '.$nombreid;
		}
		$regresa['script']="
            <script>
			$(function () {
				$('#$divapintar').highcharts(Highcharts.merge(gaugeOptions, {
					pane: {
						center: ['50%', '85%'],
						size: '120%',
						startAngle: -90,
						endAngle: 90,
						background: {
							backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
							innerRadius: '60%',
							outerRadius: '100%',
							shape: 'arc'
						}
					},
					yAxis: {
						min: 0,
						max: 8,
						title: {
							text: '$titulo'
						},
						stops: [
							[1, '$colorestado'] 
						]
					},
					exportButton: {
						enabled: false
					},
					exporting: {
						enabled: false
					},
					credits: {
						enabled: false
					},
					series: [{
						name: 'Hrs',
						data: [$promedio],
						dataLabels: {
							format: '<div style=\"text-align:center\"><span style=\"font-size:25px;color:' +
									((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '\">{y}</span><br/>' +
									'<span style=\"font-size:12px;color:silver\">Hrs</span></div>'
						},
						tooltip: {
							valueSuffix: ' Hrs.'
						}
					}]
				}));
			});
		</script>
		";
	}
/*         
	$query7d="
		select
			$notodas
			COUNT(u.id) as datos,
			SUM(TIMESTAMPDIFF(hour, IF(u.$fini>=DATE_SUB(now(), INTERVAL 7 DAY),u.$fini,DATE_SUB(now(), INTERVAL 7 DAY)), IF(u.$ffin!='0000-00-00 00:00:00',u.$ffin,now()))) as horas,
			AVG(TIMESTAMPDIFF(hour, IF(u.$fini>=DATE_SUB(now(), INTERVAL 7 DAY),u.$fini,DATE_SUB(now(), INTERVAL 7 DAY)), IF(u.$ffin!='0000-00-00 00:00:00',u.$ffin,now()))) as promedio
		from $tuso
		where $qwhere
			AND (u.$fini>=DATE_SUB(now(), INTERVAL 7 DAY) || u.$ffin='0000-00-00 00:00:00')
			AND u.$fini!='0000-00-00 00:00:00'
			$filtro
		order by u.$fini asc
	";
*/	

	$query7d="
		select
			$notodas
			COUNT(u.id) as datos,
			SUM(TIMESTAMPDIFF(hour, IF(u.$fini>=DATE_SUB(now(), INTERVAL 7 DAY),u.$fini,DATE_SUB(now(), INTERVAL 7 DAY)), IF(u.$ffin!='0000-00-00 00:00:00',u.$ffin,now()))) as horas,
			AVG(TIMESTAMPDIFF(hour, IF(u.$fini>=DATE_SUB(now(), INTERVAL 7 DAY),u.$fini,DATE_SUB(now(), INTERVAL 7 DAY)), IF(u.$ffin!='0000-00-00 00:00:00',u.$ffin,now()))) as promedio
		from $tuso
		where $qwhere
			AND u.$ffin!='0000-00-00 00:00:00'
			AND (u.$fini>=DATE_SUB(now(), INTERVAL 7 DAY) || u.$ffin='0000-00-00 00:00:00')
			$filtro
		order by u.$fini asc
	";

	if ($estatus=='descanso'){
		$query7d="
			select
				$notodas
				COUNT(u.id) as datos,
				SUM(IF (IF(fecha_original='0000-00-00 00:00:00',
							IF(TIMESTAMPDIFF(hour, fecha_descanso, fecha_salida)<8,true,false),
							IF(TIMESTAMPDIFF(hour, fecha_original, fecha_salida)<8,true,false)),
						TIMESTAMPDIFF(hour, IF(fecha_descanso>=DATE_SUB(now(), INTERVAL 7 DAY),fecha_descanso,DATE_SUB(now(), INTERVAL 7 DAY)), IF(fecha_salida!='0000-00-00 00:00:00',fecha_salida,now())),
						IF (fecha_original='0000-00-00 00:00:00',
							8,
							IF(TIMESTAMPDIFF(hour, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))<8,
								8,
								TIMESTAMPDIFF(hour, fecha_descanso, DATE_ADD(IF(fecha_original>=DATE_SUB(now(), INTERVAL 7 DAY),fecha_original,DATE_SUB(now(), INTERVAL 7 DAY)), INTERVAL 8 HOUR))
							)
						)
					)
				) as horas,
				AVG(IF (IF(fecha_original='0000-00-00 00:00:00',
							IF(TIMESTAMPDIFF(hour, fecha_descanso, fecha_salida)<8,true,false),
							IF(TIMESTAMPDIFF(hour, fecha_original, fecha_salida)<8,true,false)),
						TIMESTAMPDIFF(hour, IF(fecha_descanso>=DATE_SUB(now(), INTERVAL 7 DAY),fecha_descanso,DATE_SUB(now(), INTERVAL 7 DAY)), IF(fecha_salida!='0000-00-00 00:00:00',fecha_salida,now())),
						IF (fecha_original='0000-00-00 00:00:00',
							8,
							IF(TIMESTAMPDIFF(hour, fecha_descanso, DATE_ADD(fecha_original, INTERVAL 8 HOUR))<8,
								8,
								TIMESTAMPDIFF(hour, fecha_descanso, DATE_ADD(IF(fecha_original>=DATE_SUB(now(), INTERVAL 7 DAY),fecha_original,DATE_SUB(now(), INTERVAL 7 DAY)), INTERVAL 8 HOUR))
							)
						)
					)
				) as promedio
			from $tuso
			where $qwhere
				AND (u.$ffin!='0000-00-00 00:00:00'
					OR TIMESTAMPDIFF(hour, u.$fini, now())>=8
				)
				AND (u.$fini>=DATE_SUB(now(), INTERVAL 7 DAY) || u.$ffin='0000-00-00 00:00:00')
				$filtro
			order by u.$fini asc
		";
	}

	if ($estatus=='listo'){
		$query7d="
			select
				$notodas
				COUNT(u.id) as datos,
				SUM(IF (IF(fecha_original='0000-00-00 00:00:00',
							IF(TIMESTAMPDIFF(hour, fecha_descanso, fecha_salida)<8,true,false),
							IF(TIMESTAMPDIFF(hour, fecha_original, fecha_salida)<8,true,false)),
						0,
						IF (fecha_original='0000-00-00 00:00:00',
							TIMESTAMPDIFF(hour, DATE_ADD(IF(fecha_descanso>=DATE_SUB(now(), INTERVAL 7 DAY),fecha_descanso,DATE_SUB(now(), INTERVAL 7 DAY)), INTERVAL 8 HOUR), IF(fecha_salida!='0000-00-00 00:00:00',fecha_salida,now())),
							TIMESTAMPDIFF(hour, DATE_ADD(IF(fecha_original>=DATE_SUB(now(), INTERVAL 7 DAY),fecha_descanso,DATE_SUB(now(), INTERVAL 7 DAY)), INTERVAL 8 HOUR), IF(fecha_salida!='0000-00-00 00:00:00',fecha_salida,now()))
						)
					)
				) as horas,
				AVG(IF (IF(fecha_original='0000-00-00 00:00:00',
							IF(TIMESTAMPDIFF(hour, fecha_descanso, fecha_salida)<8,true,false),
							IF(TIMESTAMPDIFF(hour, fecha_original, fecha_salida)<8,true,false)),
						0,
						IF (fecha_original='0000-00-00 00:00:00',
							TIMESTAMPDIFF(hour, DATE_ADD(IF(fecha_descanso>=DATE_SUB(now(), INTERVAL 7 DAY),fecha_descanso,DATE_SUB(now(), INTERVAL 7 DAY)), INTERVAL 8 HOUR), IF(fecha_salida!='0000-00-00 00:00:00',fecha_salida,now())),
							TIMESTAMPDIFF(hour, DATE_ADD(IF(fecha_original>=DATE_SUB(now(), INTERVAL 7 DAY),fecha_descanso,DATE_SUB(now(), INTERVAL 7 DAY)), INTERVAL 8 HOUR), IF(fecha_salida!='0000-00-00 00:00:00',fecha_salida,now()))
						)
					)
				) as promedio
			from $tuso
			where $qwhere
				AND (u.$ffin!='0000-00-00 00:00:00'
					OR TIMESTAMPDIFF(hour, u.$fini, now())>=8
				)
				AND (u.$fini>=DATE_SUB(now(), INTERVAL 7 DAY) || u.$ffin='0000-00-00 00:00:00')
				$filtro
			order by u.$fini asc
		";
	}
	
    $respuesta7d = $mysqli->query($query7d);
	
	$regresa['7d']['nombreid']='';
	$regresa['7d']['datos']=0;
	$regresa['7d']['horas']=0;
	$regresa['7d']['promedio']=0;
	if ($respuesta7d) {
		$renglon = $respuesta7d->fetch_array();
		if ($notodas!=''){
			$regresa['7d']['nombreid']=$renglon['nombre'];
		}
		$regresa['7d']['datos']=$renglon['datos'];
		$regresa['7d']['horas']=$renglon['horas'];
		$regresa['7d']['promedio']=$renglon['promedio'];
	}
    
//	echo '<pre>';print_r($regresa);echo  '</pre>';
	return $regresa;
    
}


?>
