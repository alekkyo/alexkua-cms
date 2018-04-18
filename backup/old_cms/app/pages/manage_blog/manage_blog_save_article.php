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
	$title = $_POST["title"];
	$tags = $_POST["tags"];
	$active = $_POST["active"];
	$article_text = $_POST["article_text"];
	$meta_title = $_POST['meta_title'];
	$meta_description = $_POST['meta_description'];
	
	// change active value
	mysql_query("SET NAMES UTF8", $con);
	$query = "UPDATE blog_articles_".$lang;
	$query .= " SET title = \"" . $title . "\", tags = \"".$tags."\", active = \"".$active."\", ";
	$query .= "article_text = \"".$article_text."\", meta_title = \"".$meta_title."\", meta_description = \"".$meta_description."\" WHERE ID = " . $id;
	$result = mysql_query($query, $con);
	
	if($result) {
		echo 1;
	} else {
		echo 0;
	}
	
?>