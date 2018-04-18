<?php

	session_start();

	// Import the config file	
	include '../../include/config.php';

	if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
  		header('Location: index.php');
	}
	
	// post variables
	$text = $_POST["text"];
	$author = $_POST["author"];
	
	// today date
	$today = date("Y-m-d H:i:s");
	
	// insert cle magique fr
	$query = "INSERT INTO cle_magiques_fr (cle_magique_text, date_posted, auteur, user_id) ";
	$query .= "VALUES (\"".$text."\",\"".$today."\",\"".$author."\",".$_SESSION['user_id'].")";
	$result = mysql_query($query, $con);
	
	// insert cle magique en
	$query2 = "INSERT INTO cle_magiques_en (cle_magique_text, date_posted, auteur, user_id) ";
	$query2 .= "VALUES (\"".$text."\",\"".$today."\",\"".$author."\",".$_SESSION['user_id'].")";
	$result2 = mysql_query($query2, $con);
	
	if($result && $result2) {
		echo 1;
	} else {
		echo 0;
	}
	
?>