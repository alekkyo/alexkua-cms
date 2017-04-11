<?php 

	session_start();

	// Import the config file	
	include '../../include/config.php';

	if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
  		header('Location: index.php');
	}
	
	// post variables
	$id = $_POST["id"];
	$lang = $_POST["lang"];
	$text = $_POST["text"];
	$author = $_POST["author"];
	
	// change active value
	$query = "UPDATE cle_magiques_".$lang;
	$query .= " SET cle_magique_text = \"" . $text . "\", auteur = \"" . $author . "\"";
	$query .= " WHERE ID = " . $id;
	$result = mysql_query($query, $con);
	
	if($result) {
		echo 1;
	} else {
		echo 0;
	}
	
?>