<?php
	$query = "SELECT firstname, lastname, profile_pic FROM ak_users WHERE id = :id";
	$stmt = $conn->prepare($query);
	$stmt->execute(array(':id' => $_SESSION['ak_user_id']));
	if ($row = $stmt->fetch()) {
		$firstname = $row["firstname"];
		$lastname = $row["lastname"];
		$profile_pic = $row["profile_pic"];
	} else {
		header('Location: index.php');
	}
?>

<div id="menu_header">
	<div id="menu_greeting">
		<div class="profile_button">
			<div class="profile_name">
				<?php echo $firstname . " " . $lastname; ?>
			</div>
			<div class="profile_pic" style="background:url('<?php echo $profile_pic; ?>') #fff left center no-repeat; background-size:cover;"></div>
		</div>
	</div>
	<!--<div id="menu_logout">
		If it's not you, click <span class="fake-link" id="logout-button">here</span> to logout.
	</div>-->
	<div id="menu_title">
		<?php echo WEBSITE_NAME; ?>
		<div id="menu_subtitle">
			Admin panel
		</div>
	</div>
</div>