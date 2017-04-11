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
	
?>

<div id="manage_blog_article_wrapper">
	<h3><a class="goback" href="#" onclick="manage_blog_add_goback('<?php echo $editLang; ?>')">&larr; Go Back</a></h3>

	<h2>Creating a article</h2>

	<div id="manage_blog_article_container">
		<div id="manage_blog_article_author">
			The article shall be added in both languages. To modify, another language, go back to the menu and modify it. Also, it is inactive by default. You have to activate it in both languages for them to be published.
		</div>
	
		<div id="manage_blog_article_title_div">
			<div id="manage_blog_article_title_text" class="input_text">Title:</div>
			<input type="text" id="manage_blog_article_title" class="input_box" value=""/>
		</div>

		<div id="manage_blog_article_metatitle_div">
			<div id="manage_blog_article_metatitle_text" class="input_text">Meta title (Max 66 characters):</div>
			<input type="text" id="manage_blog_article_metatitle" class="input_box" maxlength="66" value=""/>
		</div>
		
		<div id="manage_blog_article_metadesc_div">
			<div id="manage_blog_article_metadesc_text" class="input_text">Meta description (Max 200 characters):</div>
			<input type="text" id="manage_blog_article_metadesc" class="input_box" maxlength="200" value=""/>
		</div>
		
		<div id="manage_blog_article_tags_div">
			<div id="manage_blog_article_tags_text" class="input_text">Tags (separate tags by a comma):</div>
			<input type="text" id="manage_blog_article_tags" class="input_box" value=""/>
		</div>
		
		<div id="manage_blog_article_text_div">
			<textarea class="ckeditor" name="manage_blog_article_text" id="manage_blog_article_text"></textarea>
		</div>
		
		<div id="manage_blog_article_save_div">
			<input type="submit" id="manage_blog_article_save" value="Add article" onclick="manage_blog_add_article()"/>
		</div>
	</div>
</div>