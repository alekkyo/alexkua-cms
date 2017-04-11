<?php
	session_start();

	// Import the config file
	include 'include/config.php';

	if(!isset($_SESSION['ak_user_id']) || $_SESSION['ak_user_id'] == "") {
		header('Location: index.php');
	}
?>
<html>
<head>

	<title><?php echo WEBSITE_NAME; ?> - Administrator</title>

	<!-- Import css files -->
	<link rel="stylesheet" type="text/css" href="resources/css/global.css">
	<link rel="stylesheet" type="text/css" href="resources/css/manage.css">
	<link rel="stylesheet" type="text/css" href="resources/css/alertify.min.css"/>
	
	<!-- Import javascript files -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="resources/js/manage.js"></script>
	<script src="resources/js/alertify.min.js"></script>
	
	<!-- Import javascript files -->
	<!--<script src="js/jquery.form.min.js"></script>-->
	
	<!-- CK Editor -->
	<!--<script src="ckeditor/ckeditor.js"></script>
	<script src="ckeditor/adapters/jquery.js"></script>-->
	
</head>
<body <?php if($testPage != "") echo "onload=\"openPage('".$testPage."')\""; ?>>
	<!-- menu -->
	<?php include "app/common/header.php"; ?>
	<div id="menu">
		<div id="menu_content">
			<h3>Menu</h3>
			<div class="menu_content_item menu_content_item_top" onclick="openPage('scripts/manage_media/manage_media.php')">Manage media</div>
			<!--<div class="menu_content_item menu_content_item_top" onclick="openPage('scripts/manage_blog/manage_blog.php')">Manage blog articles</div>
			<div class="menu_content_item menu_content_item_top" onclick="openPage('scripts/manage_magickeys/manage_magickeys.php')">Manage magic keys</div>
			<div class="menu_content_item menu_content_item_top" onclick="openPage('scripts/manage_publicity/manage_publicity.php')">Manage publicity</div>-->
			<div class="menu_content_item menu_content_item_top" onclick="openPage('app/pages/manage_users/manage_users.php')">Manage users</div>
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