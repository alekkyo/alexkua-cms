<?php
	// DB Connections
	include_once "db.php";

	// Connect to DB
	try {
		$conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_SCHEMA, DB_USER, DB_PASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	    print "Error!: " . $e->getMessage() . "<br/>";
	    die();
	}
	
	$imgDirectory = "/home/alekkyo/public_html/projects/alexkua_cms/img/article_img/";
	$imgDirectoryUrl = "http://www.alexkua.com/projects/alexkua_cms/img/article_img";
	
	// insert test page to execute on load
	$testPage = "app/pages/manage_users/manage_users.php";
	
	// default lang
	$lang = "fr";
?>