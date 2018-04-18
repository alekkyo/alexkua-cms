<?php 

	session_start();

	// Import the config file	
	include '../../include/config.php';

	if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
  		header('Location: index.php');
	}
	
	// post variables
	$id = $_POST["id"];
	
	// initialize variables
	$email = "";
	$firstname = "";
	$lastname = "";
	$phonenumber = "";
	$active = 0;
	
	$query = "SELECT email, firstname, lastname, telephone, active FROM users WHERE ID = " . $id;
	$result = mysql_query($query, $con);
	
	if($row = mysql_fetch_assoc($result)) {
		$email = urldecode($row['email']);
		$firstname = urldecode($row['firstname']);
		$lastname = urldecode($row['lastname']);
		$phonenumber = urldecode($row['telephone']);
		$active = $row['active'];
		print_r($row);
	} else {
		die("Error with the page. Please contact a administrator.");
	}
?>

<div id="manage_users_edit_wrapper">
	<h3><a class="goback" href="#" onclick="manage_users_goback()">&larr; Go Back</a></h3>

	<h2>Editing a user</h2>

	<form id="manage_users_edit_container">
		
		<div id="manage_users_edit_email_div">
			<div id="manage_users_edit_email_text" class="input_text">Email:</div>
			<input type="text" id="manage_users_edit_email" name="manage_users_edit_email" class="input_box" value="<?php echo $email ?>" readonly/>
		</div>
		
		<div id="manage_users_edit_firstname_div">
			<div id="manage_users_edit_firstname_text" class="input_text">First name:</div>
			<input type="text" id="manage_users_edit_firstname" name="manage_users_edit_firstname" class="input_box" value="<?php echo $firstname ?>"/>
		</div>
		
		<div id="manage_users_edit_lastname_div">
			<div id="manage_users_edit_lastname_text" class="input_text">Last name:</div>
			<input type="text" id="manage_users_edit_lastname" name="manage_users_edit_lastname" class="input_box" value="<?php echo $lastname ?>"/>
		</div>
		
		<div id="manage_users_edit_phonenumber_div">
			<div id="manage_users_edit_phonenumber_text" class="input_text">Phone number:</div>
			<input type="text" id="manage_users_edit_phonenumber" name="manage_users_edit_phonenumber" class="input_box" value="<?php echo $phonenumber ?>"/>
		</div>
		
		<div id="manage_users_edit_active_div">
			<div id="manage_users_edit_active_text" class="input_text">Is active:</div>
			<?php
				if ($active) {
					echo "<input type=\"checkbox\" id=\"manage_users_edit_active\" name=\"manage_users_edit_active\" class=\"input_box\" checked>";
				} else {
					echo "<input type=\"checkbox\" id=\"manage_users_edit_active\" name=\"manage_users_edit_active\" class=\"input_box\">";
				}
			?>
		</div>
		
		<div id="manage_users_edit_password_div">
			<div id="manage_users_edit_password_text" class="input_text">Password (leave empty to keep same password):</div>
			<input type="password" id="manage_users_edit_password" name="manage_users_edit_password" class="input_box" value=""/>
		</div>

		<div id="manage_users_edit_confirmpassword_div">
			<div id="manage_users_edit_confirmpassword_text" class="input_text">Confirm password:</div>
			<input type="password" id="manage_users_edit_confirmpassword" name="manage_users_edit_confirmpassword" class="input_box" value=""/>
		</div>
		
		<input type="hidden" id="manage_users_edit_userid" name="manage_users_edit_userid" value="<?php echo $id; ?>"/>
	
		<div id="manage_users_article_save_div">
			<input type="submit" id="manage_users_edit_save" value="Add user" onclick="return manage_users_save_confirm('edit')"/>
		</div>
	</form>
</div>