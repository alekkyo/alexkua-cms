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
	$title = "";
	$author = "";
	$active = "";
	$date_posted = "";
	$article_text = "";
	$meta_title = "";
	$meta_description = "";
	$img_link = "";
	$tags = "";
	
	mysql_query("SET NAMES UTF8", $con);
	$query = "SELECT i.ID, i.title, i.meta_title, i.meta_description, j.firstname, j.lastname, i.active, i.date_posted, i.article_text, i.img_link, i.tags FROM blog_articles_".$editLang." as i INNER JOIN users as j ON i.author_id = j.ID WHERE i.ID = " . $id;
	$result = mysql_query($query, $con);
	
	if($row = mysql_fetch_assoc($result)) {
		$title = urldecode($row["title"]);
		$author = $row["firstname"] . " " . $row["lastname"];
		$active = $row["active"];
		$date_posted = $row["date_posted"];
		$article_text = urldecode($row["article_text"]);
		$meta_title = urldecode($row["meta_title"]);
		$meta_description = urldecode($row["meta_description"]);
		$img_link = $row["img_link"];
		$tags = urldecode($row["tags"]);
	} else {
		die("Error with the page. Please contact a administrator.");
	}
?>

<div id="manage_blog_article_wrapper">
	<h3><a class="goback" href="#" onclick="manage_blog_change_lang('<?php echo $editLang; ?>')">&larr; Go Back</a></h3>

	<h2>Editing article #<?php echo $id; ?></h2>

	<div id="manage_blog_article_container">
		<div id="manage_blog_article_author">
			Article created by <b><?php echo $author; ?></b> on <b><?php echo $date_posted; ?></b>.
		</div>
	
		<div id="manage_blog_article_lang_div">
			<div id="manage_blog_article_lang_text" class="input_text">Language: </div>
			<select id="manage_blog_article_lang" onchange="manage_blog_editBlogArticle(<?php echo $id; ?>, this.value)">
				<option value="fr" <?php if($editLang == "fr") echo "selected"; ?>>Francais</option>
				<option value="en" <?php if($editLang == "en") echo "selected"; ?>>English</option>
			</select>
		</div>
	
		<div id="manage_blog_article_title_div">
			<div id="manage_blog_article_title_text" class="input_text">Title:</div>
			<input type="text" id="manage_blog_article_title" class="input_box" value="<?php echo $title; ?>"/>
		</div>

		<div id="manage_blog_article_metatitle_div">
			<div id="manage_blog_article_metatitle_text" class="input_text">Meta title (Max 66 characters):</div>
			<input type="text" id="manage_blog_article_metatitle" class="input_box" maxlength="66" value="<?php echo $meta_title; ?>"/>
		</div>
		
		<div id="manage_blog_article_metadesc_div">
			<div id="manage_blog_article_metadesc_text" class="input_text">Meta description (Max 200 characters):</div>
			<input type="text" id="manage_blog_article_metadesc" class="input_box" maxlength="200" value="<?php echo $meta_description; ?>"/>
		</div>
		
		<div id="manage_blog_article_tags_div">
			<div id="manage_blog_article_tags_text" class="input_text">Tags (separate tags by a comma):</div>
			<input type="text" id="manage_blog_article_tags" class="input_box" value="<?php echo $tags; ?>"/>
		</div>
		
		<div id="manage_blog_article_active_div">
		<div id="manage_blog_article_active_text" class="input_text_checkbox">Is active?</div>
			<input type="checkbox" name="manage_blog_article_active" id="manage_blog_article_active" <?php if($active == 1) echo "checked"; ?>>
		</div>
		
		<div id="manage_blog_article_text_div">
			<textarea class="ckeditor" name="manage_blog_article_text" id="manage_blog_article_text"><?php echo $article_text; ?></textarea>
		</div>
		
		<div id="manage_blog_article_save_div">
			<input type="submit" id="manage_blog_article_save" value="Save changes" onclick="manage_blog_save_article(<?php echo $id.", '".$editLang."'"; ?>)"/>
		</div>
	</div>
</div>