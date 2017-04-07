<?php

	session_start();

	// Import the config file
	include 'include/config.php';

	if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == "") {
		header('Location: index.php');
	}
	
	mysql_query("SET NAMES UTF8", $con);
	$query = "SELECT firstname, lastname FROM users WHERE ID = " . $_SESSION['user_id'];
	$result = mysql_query($query, $con);
	
	if($row = mysql_fetch_assoc($result)) {
		$firstname = $row["firstname"];
		$lastname = $row["lastname"];
	}
	
?>

<html>
<head>

	<title><?php echo WEBSITE_NAME; ?> - Administrator</title>

	<!-- Import css files -->
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/manage.css">
	
	<!-- Import javascript files -->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="js/jquery.form.min.js"></script>
	<script src="js/manage.js"></script>
	
	<!-- CK Editor -->
	<script src="ckeditor/ckeditor.js"></script>
	<script src="ckeditor/adapters/jquery.js"></script>
	
</head>
<body <?php if($testPage != "") echo "onload=\"openPage('".$testPage."')\""; ?>>
	<!-- menu -->
	<div id="menu">
		<div id="menu_header">
			<div id="menu_greeting">
				Hello, <?php echo $firstname . " " . $lastname; ?> !<br>
			</div>
			<div id="menu_logout">
				If it's not you, click <span class="fake-link" id="logout-button">here</span> to logout.
			</div>
			<div id="menu_title">
				<?php echo WEBSITE_NAME; ?>
			</div>
			<div id="menu_subtitle">
				Administrator
			</div>
		</div>
		<div id="menu_content">
			<h3>Menu</h3>
			<div class="menu_content_item menu_content_item_top" onclick="openPage('scripts/manage_media/manage_media.php')">Manage media</div>
			<div class="menu_content_item menu_content_item_top" onclick="openPage('scripts/manage_blog/manage_blog.php')">Manage blog articles</div>
			<div class="menu_content_item menu_content_item_top" onclick="openPage('scripts/manage_magickeys/manage_magickeys.php')">Manage magic keys</div>
			<div class="menu_content_item menu_content_item_top" onclick="openPage('scripts/manage_publicity/manage_publicity.php')">Manage publicity</div>
			<!--<div class="menu_content_item menu_content_item_top" onclick="openPage('scripts/manage_users/manage_users.php')">Manage users</div>-->
			<!--<div class="menu_content_item menu_content_item_top" onclick="openPage('scripts/global_configuration/global_configuration.php')">Global configuration</div>-->
			<div onclick="logout()" class="menu_content_item menu_content_item_bottom">Log out</div>
		</div>
	</div>
	<div id="menu_arrow"></div>
	
	<!-- content -->
	<div id="content">
		<div id="content_wrapper">
			<h2>Hello!</h2>
			<p>Please navigate in the menu to your left.</p>
		</div>
	</div>
	
	<!-- footer -->
	
	<div id="footer">
		<div id="footer_left">
			Alex Kua Content Management System, &#169; Copyright 2014.
		</div>
		<div id="footer_right">
			Made by <a href="http://www.alexkua.com">Alex Kua</a>.
		</div>
	</div>
</body>