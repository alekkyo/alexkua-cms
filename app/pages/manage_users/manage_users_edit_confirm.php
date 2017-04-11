<?php 

	session_start();

	// Import the config file	
	include '../../include/config.php';

	if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
  		header('Location: index.php');
	}
	
	// post variables
	$id				= $_POST['manage_users_edit_userid'];
	$firstName 		= urldecode($_POST["manage_users_edit_firstname"]);
	$lastName 		= urldecode($_POST["manage_users_edit_lastname"]);
	$phoneNumber 	= urldecode($_POST["manage_users_edit_phonenumber"]);
	$password 		= urldecode($_POST["manage_users_edit_password"]);
	
	if ($_POST["manage_users_edit_active"] == "") {
		$active = 0;
	} else {
		$active = 1;
	}
	
	// update user
	if ($password == "") {
		// insert user
		$query = "UPDATE users ";
		$query .= "SET firstname = \"".$firstName."\", ";
		$query .= "lastname = \"".$lastName."\", ";
		$query .= "active = \"".$active."\", ";
		$query .= "telephone = \"".$phoneNumber."\" ";
		$query .= "WHERE id = " . $id;
		$result = mysql_query($query, $con);
	} else {
		// insert user and password
		$salt = uniqid(mt_rand(), true);
		
		$query = "INSERT INTO users (email, password, salt, firstname, lastname, telephone, active) ";
		$query .= "VALUES (\"".$email."\",\"".md5($password.$salt)."\",\"".$salt."\",\"".$firstName."\",\"".$lastName."\",\"".$phoneNumber."\",0)";
		$result = mysql_query($query, $con);
		
		$query = "UPDATE users ";
		$query .= "SET firstname = \"".$firstName."\", ";
		$query .= "lastname = \"".$lastName."\", ";
		$query .= "active = \"".$active."\", ";
		$query .= "telephone = \"".$phoneNumber."\", ";
		$query .= "password = \"".md5($password.$salt)."\", ";
		$query .= "salt = \"".$salt."\" ";
		$query .= "WHERE id = " . $id;
		$result = mysql_query($query, $con);
	}
	
	// update result
	if ($result) {
		echo 1;
	} else {
		echo 0;
	}
	
?>