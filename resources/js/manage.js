$(document).ready(function(){
	
	resizeMainContent();
	$(window).resize(resizeMainContent);
	
	$('#logout-button').click(logout);
	
});

// center the login
function resizeMainContent() {
	var windowWidth = $(window).width();
	var marginLeft = parseInt($("#content").css("margin-left").replace("px",""));
	var contentWidth = windowWidth - marginLeft - 50;
	
	if(contentWidth > 600) {
		$("#content").css("width", (contentWidth) + "px");
	} else {
		$("#content").css("width", "600px");
	}
}

function refresh_media_files() {
	$.ajax({
		type: "POST",
		url: "scripts/manage_media/manage_media_get_files.php"
	})
	.done(function( html ) {
		$("#files_wrapper_table").html(html);
	});
}

// open a page
function openPage(url) {
	$.ajax({
		type: "POST",
		url: url
	})
	.done(function( html ) {
		$("#content_wrapper").html(html);
		
		// uploading file
		var options = { 
		    target:   '#output',   // target element(s) to be updated with server response 
		    beforeSubmit:  beforeSubmit,  // pre-submit callback 
		    success: afterSuccess,  // post-submit callback 
		    uploadProgress: OnProgress, //upload progress callback 
		    resetForm: true        // reset the form after successful submit 
		}; 
		        
		 $('#manage_media_uploadForm').submit(function() { 
		    $(this).ajaxSubmit(options);            
		    return false; 
		}); 
	});
}

//function after succesful file upload (when server response)
function afterSuccess()
{
	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button
	$('#progressbox').delay( 1000 ).fadeOut(); //hide progress bar
	refresh_media_files();
}


//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{
		
		if( !$('#FileInput').val()) //check empty input filed
		{
			$("#output").html("Are you kidding me?");
			return false
		}
		
		var fsize = $('#FileInput')[0].files[0].size; //get file size
		var ftype = $('#FileInput')[0].files[0].type; // get file type
		

		//allow file types 
		switch(ftype)
        {
            case 'image/png': 
			case 'image/gif': 
			case 'image/jpeg': 
			case 'image/pjpeg':
			case 'text/plain':
			case 'text/html':
			case 'application/x-zip-compressed':
			case 'application/pdf':
			case 'application/msword':
			case 'application/vnd.ms-excel':
			case 'video/mp4':
                break;
            default:
                $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
				return false
        }
        				
		$('#submit-btn').hide(); //hide submit button
		$('#loading-img').show(); //hide submit button
		$("#output").html("");  
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
}

//progress bar function
function OnProgress(event, position, total, percentComplete)
{
    //Progress bar
	$('#progressbox').show();
    $('#progressbar').width(percentComplete + '%') //update progressbar percent complete
    $('#statustxt').html(percentComplete + '%'); //update status text
    if(percentComplete>50)
    {
        $('#statustxt').css('color','#000'); //change status text to white after 50%
    }
}

// function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

// delete a file from the media manager
function deleteFile(file) {
	var conf = confirm("Are you sure you want to delete this file? (" + file + ")");
	if(conf) {
		$.ajax({
			type: "POST",
			url: "scripts/manage_media/manage_media_delete_file.php",
			data: { file: file }
		})
		.done(function( response ) {
			if(response == 1) {
				alert("The file has been deleted with success!");
				refresh_media_files();
			}
		});
	}
}

function manage_blog_action_bulk(selectedValue) {
	
	if(selectedValue == "delete") {
		var selectedArticles = "";
		$(".manage_blog_table_checkbox_input:checked").each(function(index) {
			selectedArticles += $(this).val() + ",";
		});
		selectedArticles = selectedArticles.substring(0, selectedArticles.length - 1);
		
		
		if(selectedArticles == "") {
			alert("Please select articles to delete.");
		} else {
			var conf = confirm("Are you sure you want to delete articles: "+selectedArticles+"?");
			if(conf) {
				$.ajax({
					type: "POST",
					url: "scripts/manage_blog/manage_blog_bulk_delete.php",
					data: { id: selectedArticles }
				})
				.done(function( response ) {
					if(response == 1) {
						alert("The articles have been deleted!");
						openPage("scripts/manage_blog/manage_blog.php");
					} else {
						alert("Error with the delete!");
					}
				});
			}
		}
	}
}

// sort table in manage blog by selected row
function manage_blog_sortTable(value, editLang, sortType) {
	$.ajax({
		type: "POST",
		url: "scripts/manage_blog/manage_blog.php",
		data: { sortValue: value, editLang: editLang, sortType: sortType }
	})
	.done(function( html ) {
		$("#content_wrapper").html(html);
	});
}

// set active status
function manage_blog_setActiveStatus(id, currentValue, editLang) {
	var newValue = "";
	
	if(currentValue.trim() == "YES") {
		newValue = "NO";
	} else {
		newValue = "YES";
	}
	
	$.ajax({
		type: "POST",
		url: "scripts/manage_blog/manage_blog_set_active.php",
		data: { id: id, value: newValue }
	})
	.done(function( response ) {
		if(response == 1) {
			manage_blog_sortTable("id", editLang);
		} else {
			alert("Error with the request!");
		}
	});
}

// add a new article
function manage_blog_addBlogArticle() {
	$.ajax({
		type: "POST",
		url: "scripts/manage_blog/manage_blog_add.php"
	})
	.done(function( html ) {
		$("#content_wrapper").html(html);
		$("#manage_blog_article_text").ckeditor();
	});
}

// manage selected blog article
function manage_blog_editBlogArticle(id, lang) {
	$.ajax({
		type: "POST",
		url: "scripts/manage_blog/manage_blog_edit.php",
		data: { id: id, editLang: lang }
	})
	.done(function( html ) {
		$("#content_wrapper").html(html);
		$("#manage_blog_article_text").ckeditor();
	});
}

function manage_blog_add_goback(lang) {
	var conf = confirm("Are you sure you want to go back? All your modifications will be erased!");
	if(conf) {
		manage_blog_change_lang(lang);
	}
}

// change lang for manage blog page
function manage_blog_change_lang(value) {
	$.ajax({
		type: "POST",
		url: "scripts/manage_blog/manage_blog.php",
		data: { editLang: value }
	})
	.done(function( html ) {
		$("#content_wrapper").html(html);
	});
}

// add article
function manage_blog_add_article() {
	var title = encodeURI($("#manage_blog_article_title").val());
	var tags = encodeURI($("#manage_blog_article_tags").val());
	var article_text = encodeURI($("#manage_blog_article_text").val());
	
	$.ajax({
		type: "POST",
		url: "scripts/manage_blog/manage_blog_add_article.php",
		data: { title: title, tags: tags, article_text: article_text }
	})
	.done(function( response ) {
		if(response == 1) {
			alert("The article has been added!");
			openPage("scripts/manage_blog/manage_blog.php");
		} else {
			alert("Error with the add!");
		}
	});
}

// save article
function manage_blog_save_article(id, editLang) {
	var title = encodeURI($("#manage_blog_article_title").val());
	var tags = encodeURI($("#manage_blog_article_tags").val());
	var article_text = encodeURI($("#manage_blog_article_text").val());
	var active = $("#manage_blog_article_active").val();

	var active_send = 0;
	if(active == "on")
		active_send = 1;
		
	$.ajax({
		type: "POST",
		url: "scripts/manage_blog/manage_blog_save_article.php",
		data: { id: id, lang: editLang, title: title, tags: tags, active: active_send, article_text: article_text }
	})
	.done(function( response ) {
		if(response == 1) {
			alert("The article has been saved!");
			openPage("scripts/manage_blog/manage_blog.php");
		} else {
			alert("Error with the save!");
		}
	});
}

// add article
function manage_publicity_add_toggle() {
	if($("#manage_publicity_add_form").css("display") == "none") {
		$("#manage_publicity_add_form").fadeIn(1000);
	} else {
		$("#manage_publicity_add_form").fadeOut(500);
	}
}

// sort table in manage blog by selected row
function manage_publicity_sortTable(value, sortType) {
	$.ajax({
		type: "POST",
		url: "scripts/manage_publicity/manage_publicity.php",
		data: { sortValue: value, sortType: sortType }
	})
	.done(function( html ) {
		$("#content_wrapper").html(html);
	});
}

// add a publicity
function manage_publicity_add() {
	var description = $("#manage_publicity_add_form_desc_input").val();
	var img_link = $("#manage_publicity_add_form_imglink_input").val();
	var link = $("#manage_publicity_add_form_url_input").val();
	
	$.ajax({
		type: "POST",
		url: "scripts/manage_publicity/manage_publicity_add.php",
		data: { description: description, img_link: img_link, link: link }
	})
	.done(function( response ) {
		if(response == 1) {
			alert("The publicity has been added!");
			openPage("scripts/manage_publicity/manage_publicity.php");
		} else {
			alert("Error with the add!");
		}
	});
}

// delete a publicity
function manage_publicity_delete(id) {

	var conf = confirm("Are you sure you want to delete this publicity?");
	if(conf) {
		$.ajax({
			type: "POST",
			url: "scripts/manage_publicity/manage_publicity_delete.php",
			data: { id: id }
		})
		.done(function( response ) {
			if(response == 1) {
				alert("The publicity has been removed!");
				openPage("scripts/manage_publicity/manage_publicity.php");
			} else {
				alert("Error with the delete!");
			}
		});
	}
}

// sort magic keys
function manage_magickeys_sortTable(value, editLang, sortType) {
	alert(sortType);
	$.ajax({
		type: "POST",
		url: "scripts/manage_magickeys/manage_magickeys.php",
		data: { sortValue: value, editLang: editLang, sortType: sortType }
	})
	.done(function( html ) {
		$("#content_wrapper").html(html);
	});
}

// add magic key
function manage_magickeys_add_toggle() {
	if($("#manage_magickeys_add_form").css("display") == "none") {
		$("#manage_magickeys_add_form").fadeIn(1000);
	} else {
		$("#manage_magickeys_add_form").fadeOut(500);
	}
}

// change lang for manage magic key page
function manage_magickeys_change_lang(value) {
	$.ajax({
		type: "POST",
		url: "scripts/manage_magickeys/manage_magickeys.php",
		data: { editLang: value }
	})
	.done(function( html ) {
		$("#content_wrapper").html(html);
	});
}

// add a magic key
function manage_magickeys_add() {
	var text = $("#manage_magickeys_add_form_text_input").val();
	var author = $("#manage_magickeys_add_form_author_input").val();
	
	$.ajax({
		type: "POST",
		url: "scripts/manage_magickeys/manage_magickeys_add.php",
		data: { text: text, author: author }
	})
	.done(function( response ) {
		if(response == 1) {
			alert("The magic key has been added!");
			openPage("scripts/manage_magickeys/manage_magickeys.php");
		} else {
			alert("Error with the add!");
		}
	});
}

// delete a magic key
function manage_magickeys_delete(id) {

	var conf = confirm("Are you sure you want to delete this magic key?");
	if(conf) {
		$.ajax({
			type: "POST",
			url: "scripts/manage_magickeys/manage_magickeys_delete.php",
			data: { id: id }
		})
		.done(function( response ) {
			if(response == 1) {
				alert("The magic key has been removed!");
				openPage("scripts/manage_magickeys/manage_magickeys.php");
			} else {
				alert("Error with the delete!");
			}
		});
	}
}

// manage selected magickey article
function manage_magickeys_editMagicKey(id, lang) {
	$.ajax({
		type: "POST",
		url: "scripts/manage_magickeys/manage_magickeys_edit.php",
		data: { id: id, editLang: lang }
	})
	.done(function( html ) {
		$("#content_wrapper").html(html);
	});
}

// save article
function manage_magickeys_editMagicKey_save(id, editLang) {
	var text = $("#manage_magickeys_article_text").val();
	var author = $("#manage_magickeys_article_author").val();
		
	$.ajax({
		type: "POST",
		url: "scripts/manage_magickeys/manage_magickeys_edit_save.php",
		data: { id: id, lang: editLang, text: text, author: author }
	})
	.done(function( response ) {
		if(response == 1) {
			alert("The magic key has been saved!");
			openPage("scripts/manage_magickeys/manage_magickeys.php");
		} else {
			alert("Error with the save!");
		}
	});
}

// set logout
function logout() {
	$.ajax({
		type: "POST",
		url: "scripts/logout.php"
	})
	.done(function( msg ) {
		if(msg == "1") {
			window.location.href = "index.php";
		} else {
			alert("Error with the logout!");
		}
	});
}