<?php 

	session_start();

	// Import the config file	
	include '../../include/config.php';

	if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
  		header('Location: index.php');
	}
	
?>

<div id="manage_media_wrapper">
	<h2>Global configuration</h2>
	<p>Hello! In this page, you will be able to manage your website's global configuration.</p>
</div>