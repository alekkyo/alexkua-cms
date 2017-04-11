<?php 

	session_start();

	// Import the config file	
	include '../../include/config.php';

	if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
  		header('Location: index.php');
	}
	
	// post variables
	$email 			= urldecode($_POST["manage_users_add_email"]);
	$firstName 		= urldecode($_POST["manage_users_add_firstname"]);
	$lastName 		= urldecode($_POST["manage_users_add_lastname"]);
	$phoneNumber 	= urldecode($_POST["manage_users_add_phonenumber"]);
	$password 		= urldecode($_POST["manage_users_add_password"]);
	
	$salt = uniqid(mt_rand(), true);
	
	// Login form
	$query = "SELECT email FROM users WHERE email = \"" . $email . "\"";
	$result = mysql_query($query, $con);
	if($row = mysql_fetch_assoc($result)) {
		echo 2;
		return;
	}
	
	// insert user
	$query = "INSERT INTO users (email, password, salt, firstname, lastname, telephone, active) ";
	$query .= "VALUES (\"".$email."\",\"".md5($password.$salt)."\",\"".$salt."\",\"".$firstName."\",\"".$lastName."\",\"".$phoneNumber."\",1)";
	$result = mysql_query($query, $con);
	
	// insert result
	if ($result) {
		echo 1;
	} else {
		echo 0;
	}
	
?>