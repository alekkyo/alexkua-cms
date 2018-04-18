<?php 

	session_start();

	// Import the config file	
	include '../../include/config.php';

	if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
  		header('Location: index.php');
	}
	
	// post variables
	$title = $_POST["title"];
	$tags = $_POST["tags"];
	$article_text = $_POST["article_text"];
	$meta_description = $_POST["meta_description"];
	$meta_title = $_POST["meta_title"];
	
	// today date
	$today = date("Y-m-d H:i:s");
	
	// insert fr
	$query = "INSERT INTO blog_articles_fr (article_text, date_posted, tags, author_id, title, active, meta_title, meta_description) ";
	$query .= "VALUES (\"".$article_text."\",\"".$today."\",\"".$tags."\",".$_SESSION['user_id'].",\"".$title."\",0,\"".$meta_title."\",\"".$meta_description."\")";
	$result = mysql_query($query, $con);
	
	// insert fr
	$query = "INSERT INTO blog_articles_en (article_text, date_posted, tags, author_id, title, active, meta_title, meta_description) ";
	$query .= "VALUES (\"".$article_text."\",\"".$today."\",\"".$tags."\",".$_SESSION['user_id'].",\"".$title."\",0,\"".$meta_title."\",\"".$meta_description."\")";
	$result = mysql_query($query, $con);
	
	if ($result) {
		echo 1;
	} else {
		echo 0;
	}
	
?>