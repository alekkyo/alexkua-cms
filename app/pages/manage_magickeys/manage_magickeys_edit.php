<?php 

	session_start();

	// Import the config file	
	include '../../include/config.php';

	if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
  		header('Location: index.php');
	}
	
	// post variables
	$id = $_POST["id"];
	
	if(isset($_POST['editLang'])) {
		$editLang = $_POST['editLang'];
	} else {
		$editLang = $lang;	
	}
	
	// initialize variables
	$cle_magique_text = "";
	$cle_magique_author = "";
	$date_posted = "";
	$author = "";
	
	mysql_query("SET NAMES UTF8", $con);
	$query = "SELECT i.cle_magique_text, j.firstname, j.lastname, i.date_posted, i.auteur FROM cle_magiques_".$editLang." as i INNER JOIN users as j ON i.user_id = j.ID WHERE i.ID = " . $id;
	$result = mysql_query($query, $con);
	
	if($row = mysql_fetch_assoc($result)) {
		$cle_magique_text = $row["cle_magique_text"];
		$author = $row["firstname"] . " " . $row["lastname"];
		$cle_magique_author = $row["auteur"];
		$date_posted = $row["date_posted"];
	} else {
		die("Error with the page. Please contact a administrator.");
	}
?>

<div id="manage_magickeys_article_wrapper">
	<h3><a class="goback" href="#" onclick="manage_magickeys_change_lang('<?php echo $editLang; ?>')">&larr; Go Back</a></h3>

	<h2>Editing magic key #<?php echo $id; ?></h2>

	<div id="manage_magickeys_article_container">
		<div id="manage_magickeys_article_userauthor">
			Article created by <b><?php echo $author; ?></b> on <b><?php echo $date_posted; ?></b>.
		</div>
	
		<div id="manage_magickeys_article_lang_div">
			<div id="manage_magickeys_article_lang_text" class="input_text">Language: </div>
			<select id="manage_magickeys_article_lang" onchange="manage_magickeys_editMagicKey(<?php echo $id; ?>, this.value)">
				<option value="fr" <?php if($editLang == "fr") echo "selected"; ?>>Francais</option>
				<option value="en" <?php if($editLang == "en") echo "selected"; ?>>English</option>
			</select>
		</div>
	
		<div id="manage_magickeys_article_text_div">
			<div id="manage_magickeys_article_text_text" class="input_text">Magic key text:</div>
			<input type="text" id="manage_magickeys_article_text" class="input_box" value="<?php echo $cle_magique_text; ?>"/>
		</div>
		
		<div id="manage_magickeys_article_author_div">
			<div id="manage_magickeys_article_author_text" class="input_text">Magic key author:</div>
			<input type="text" id="manage_magickeys_article_author" class="input_box" value="<?php echo $cle_magique_author; ?>"/>
		</div>
		
		<div id="manage_magickeys_article_save_div">
			<input type="submit" id="manage_magickeys_article_save" value="Save changes" onclick="manage_magickeys_editMagicKey_save(<?php echo $id.", '".$editLang."'"; ?>)"/>
		</div>
	</div>
</div>