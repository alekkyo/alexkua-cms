<?php

	session_start();

	// Import the config file
	include 'include/config.php';

	if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "") {
		header('Location: manage.php');
	}
?>

<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title><?php echo WEBSITE_NAME; ?> - Administrator</title>

	<!-- Import css files -->
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	
	<!-- Import javascript files -->
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="js/login.js"></script>
	
</head>
<body>
	<div id="login">
		<h1>Administrator Log in</h1>
			<div id="form">
				<input type="email" placeholder="Email" id="email"/>
				<input type="password" placeholder="Password" id="password" onkeypress="if(event.keyCode == 13)login();"/>
				<input type="submit" value="Log in" onclick="login()" />
				<span id="error_text"></span>
			</div>
	</div>
	<div id="footer">
		<div id="footer_left">
			Alex Kua Content Management System, &#169; Copyright 2014.
		</div>
		<div id="footer_right">
			Made by <a href="http://www.alexkua.com">Alex Kua</a>.
		</div>
	</div>
</body>