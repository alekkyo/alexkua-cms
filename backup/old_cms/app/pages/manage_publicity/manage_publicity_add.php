<?php

	session_start();

	// Import the config file	
	include '../../include/config.php';

	if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
  		header('Location: index.php');
	}
	
	// post variables
	$description = $_POST["description"];
	$img_link = $_POST["img_link"];
	$link = $_POST["link"];
	
	// insert publicite
	$query = "INSERT INTO publicite (description, img_link, link) ";
	$query .= "VALUES (\"".$description."\",\"".$img_link."\",\"".$link."\")";
	$result = mysql_query($query, $con);
	
	if($result) {
		echo 1;
	} else {
		echo 0;
	}
	
?>