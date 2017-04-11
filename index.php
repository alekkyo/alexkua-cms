<?php

	session_start();

	// Import the config file
	include 'include/config.php';

	if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "") {
		header('Location: manage.php');
	}

	echo bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM));
?>

<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title><?php echo WEBSITE_NAME; ?> - Admin Panel</title>

	<!-- Import css files -->
	<link rel="stylesheet" type="text/css" href="resources/css/global.css">
	<link rel="stylesheet" type="text/css" href="resources/css/login.css">
	<link rel="stylesheet" type="text/css" href="resources/css/alertify.min.css"/>
	
	<!-- Import javascript files -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="resources/js/login.js"></script>
	<script src="resources/js/alertify.min.js"></script>

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
	<?php
		include_once "app/common/footer.php";
	?>
</body>