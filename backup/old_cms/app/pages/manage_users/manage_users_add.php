<?php 

	session_start();

	// Import the config file	
	include '../../include/config.php';

	if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
  		header('Location: index.php');
	}
	
	// post variables
	$id = $_POST["id"];
	
?>

<div id="manage_users_add_wrapper">
	<h3><a class="goback" href="#" onclick="manage_users_goback()">&larr; Go Back</a></h3>

	<h2>Adding a user</h2>

	<form id="manage_users_add_container">
		
		<div id="manage_users_add_email_div">
			<div id="manage_users_add_email_text" class="input_text">Email:</div>
			<input type="text" id="manage_users_add_email" name="manage_users_add_email" class="input_box" value=""/>
		</div>
		
		<div id="manage_users_add_firstname_div">
			<div id="manage_users_add_firstname_text" class="input_text">First name:</div>
			<input type="text" id="manage_users_add_firstname" name="manage_users_add_firstname" class="input_box" value=""/>
		</div>
		
		<div id="manage_users_add_lastname_div">
			<div id="manage_users_add_lastname_text" class="input_text">Last name:</div>
			<input type="text" id="manage_users_add_lastname" name="manage_users_add_lastname" class="input_box" value=""/>
		</div>
		
		<div id="manage_users_add_phonenumber_div">
			<div id="manage_users_add_phonenumber_text" class="input_text">Phone number:</div>
			<input type="text" id="manage_users_add_phonenumber" name="manage_users_add_phonenumber" class="input_box" value=""/>
		</div>
		
		<div id="manage_users_add_password_div">
			<div id="manage_users_add_password_text" class="input_text">Password:</div>
			<input type="password" id="manage_users_add_password" name="manage_users_add_password" class="input_box" value=""/>
		</div>

		<div id="manage_users_add_confirmpassword_div">
			<div id="manage_users_add_confirmpassword_text" class="input_text">Confirm password:</div>
			<input type="password" id="manage_users_add_confirmpassword" name="manage_users_add_confirmpassword" class="input_box" value=""/>
		</div>
	
		<div id="manage_users_article_save_div">
			<input type="submit" id="manage_users_add_save" value="Add user" onclick="return manage_users_save_confirm('add')"/>
		</div>
	</form>
</div>