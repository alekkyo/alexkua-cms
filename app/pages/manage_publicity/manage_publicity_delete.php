<?php

	session_start();

	// Import the config file	
	include '../../include/config.php';

	if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
  		header('Location: index.php');
	}
	
	// post variables
	$id = $_POST["id"];
	
	// delete publicity
	$query = "DELETE FROM publicite WHERE id = " . $id;
	$result = mysql_query($query, $con);
	
	if($result) {
		echo 1;
	} else {
		echo 0;
	}
	
?>