<?php
	session_start();

	// Import the config file
	include '../../include/config.php';

	// POST variable
	$email = urldecode($_POST['email']);
	$password = urldecode($_POST['password']);

	// Login form
	$query = "SELECT id, password, salt FROM ak_users WHERE email = :email AND active = 1";
	$stmt = $conn->prepare($query);
	$stmt->execute(array(':email' => $email));
	if ($row = $stmt->fetch()) {
		if ($row["password"] == md5($password . $row['salt'])) {
			$_SESSION["ak_user_id"] = $row["id"];
			echo 1;
		} else {
			echo 0;
		}
	} else {
		echo 0;
	}
	
?>