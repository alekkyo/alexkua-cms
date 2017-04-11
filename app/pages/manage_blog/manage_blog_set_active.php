<?php 

	session_start();

	// Import the config file	
	include '../../include/config.php';

	if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
  		header('Location: index.php');
	}
	
	// post variables
	$id = $_POST["id"];
	$value = $_POST["value"];
	
	$insertValue = 1;
	if($value == "NO") {
		$insertValue = 0;
	}
	
	// change active value
	$query = "UPDATE blog_articles_en SET active = " . $insertValue . " WHERE ID = " . $id;
	$result = mysql_query($query, $con);
	
	$query2 = "UPDATE blog_articles_fr SET active = " . $insertValue . " WHERE ID = " . $id;
	$result2 = mysql_query($query2, $con);
	
	if($result && $result2) {
		echo 1;
	} else {
		echo 0;
	}
	
?>