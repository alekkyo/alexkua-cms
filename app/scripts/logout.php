<?php

	session_start();

	// Import the config file
	include '../include/config.php';
	
	// Logout
	session_destroy();
	
	echo 1;
	
?>