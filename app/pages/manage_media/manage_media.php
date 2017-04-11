<?php 

	session_start();

	// Import the config file	
	include '../../include/config.php';

	if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
  		header('Location: index.php');
	}

	if(!isset($_POST['manage_media_fileUpload']) || $_POST['manage_media_fileUpload'] == '') {
  		$uploaded_file = $_POST['manage_media_fileUpload'];
	}
	
?>

<div id="manage_media_wrapper">
	<h2>Manage medias</h2>
	<p>Hello! In this page, you will be able to import your pictures and medias in the website. You can then use the pictures in your website.</p>
	
	<!-- upload a file -->
	<div id="upload_wrapper_title">Upload a file</div>
	<div id="upload_wrapper">
		<form action="scripts/manage_media/manage_media_upload.php" method="post" enctype="multipart/form-data" id="manage_media_uploadForm">
			Upload a file: <input name="FileInput" id="FileInput" type="file" />
			<input type="submit" id="manage_media_submitUpload" value="Upload" />
			<div id="output"></div>
			<img src="img/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
		</form>
		<div id="progressbox" ><div id="progressbar"></div><div id="statustxt">0%</div></div>
	</div>
	
	<!-- your files -->
	<div id="files_wrapper_title">Your files</div>
	<div id="files_wrapper">
		<table id="files_wrapper_table">
		<?php
		
			include "manage_media_get_files.php";
			
		?>
		
		</table>
	</div>
</div>