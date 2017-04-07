<?php

	session_start();

	// Import the config file
	include '../include/config.php';

	// POST variable
	$email = urldecode($_POST['email']);
	$password = urldecode($_POST['password']);
	
	// Login form
	if($email == "alexkua@me.com" && $password == "alex123") {
		$_SESSION['user_id'] = 1;
		echo 1;
	} else {
		echo 0;
	}
	
?>