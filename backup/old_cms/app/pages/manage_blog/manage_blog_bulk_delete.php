<?php 

	session_start();

	// Import the config file	
	include '../../include/config.php';

	if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
  		header('Location: index.php');
	}
	
	// post variables
	$id = explode(",", $_POST["id"]);
	
	// boolean to see if request passes
	$isOk = true;
	
	// delete all articles
	for($i = 0; $i < count($id); $i++) {
	
		$query = "DELETE FROM blog_articles_fr WHERE id = " . $id[$i];
		$result = mysql_query($query, $con);
		
		$query2 = "DELETE FROM blog_articles_en WHERE id = " . $id[$i];
		$result2 = mysql_query($query2, $con);
		
		if(!$result || !$result2) {
			$isOk = false;
		}
	}
	
	// if ok print 1
	if($isOk) {
		echo 1;
	} else {
		echo 0;
	}
	
?>