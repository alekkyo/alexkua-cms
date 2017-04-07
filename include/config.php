<?php

	// Define constants
	define("WEBSITE_NAME", "Test project"); // Website name
	define("DB_HOST", "localhost"); // db host
	define("DB_USER", "user"); // db user
	define("DB_PASS", "pass"); // db pass
	define("DB_SCHEMA", "schema"); // db schema
	
	$imgDirectory = "/home/alekkyo/public_html/projects/alexkua_cms/img/article_img/";
	$imgDirectoryUrl = "http://www.alexkua.com/projects/alexkua_cms/img/article_img";
	
	// insert test page to execute on load
	$testPage = "scripts/manage_blog/manage_blog.php";
	
	// default lang
	$lang = "fr";
	
	// connect to db
	$con = mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db(DB_SCHEMA);

?>