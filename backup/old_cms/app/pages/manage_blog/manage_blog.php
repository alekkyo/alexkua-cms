<?php 

	session_start();

	// Import the config file	
	include '../../include/config.php';

	if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
  		header('Location: index.php');
	}
	
	if(isset($_POST['editLang'])) {
		$editLang = $_POST['editLang'];
	} else {
		$editLang = $lang;	
	}
	
	function getArrowWhileSorting($postSortValue, $sortValue, $sortType) {
		if(($postSortValue == $sortValue) && $sortType == "DESC") {
			return "&darr;";
		} else if(($postSortValue == $sortValue) && $sortType == "ASC") {
			return "&uarr;";
		}
	}
?>

<div id="manage_blog_wrapper">

	<h2>Manage blog articles</h2>
	<p>Hello! In this page, you will be able to manage your blogs and their content.</p>
	
	<div id="manage_blog_lang">
		<select id="manage_blog_lang_select" onchange="manage_blog_change_lang(this.value)">
			<option value="">-- Change language --</option>
			<option value="fr">Francais</option>
			<option value="en">English</option>
		</select>
	</div>
	
	<div id="manage_blog_action">
		<div id="manage_blog_action_bulk">
			<select id="manage_blog_action_bulk_select" onchange="manage_blog_action_bulk(this.value)">
				<option value="">-- Bulk actions --</option>
				<option value="delete">Delete</option>
				<!--<option value="publish">Publish</option>
				<option value="unpublish">Unpublish</option>-->
			</select>
		</div>
		
		<div id="manage_blog_add_article">
			<a href="#" onclick="manage_blog_addBlogArticle()">Add a article &rarr;</a>
		</div>
	</div>
	
	<?php
	
		// sort type
		$sortType = "DESC";
		if(isset($_POST['sortType'])) {
			$sortType = $_POST['sortType'];
			$_SESSION["manageBlogSortType"] = $sortType;
		}
		
		if($_SESSION["manageBlogSortType"]) {
			$sortType = $_SESSION["manageBlogSortType"];
		}
		
		$otherSortType = "DESC";
		if(isset($_POST['sortType']) && $sortType == "DESC") {
			$otherSortType = "ASC";
		}
		
		// sort value
		$sort = "id";
		if(isset($_POST['sortValue'])) {
			$sort = $_POST['sortValue'];
			$_SESSION["manageBlogSortValue"] = $sort;
		}
		
		if($_SESSION["manageBlogSortValue"]) {
			$sort = $_SESSION["manageBlogSortValue"];
		}
	
	?>
	
	<div id="manage_blog_table_container">
		<table id="manage_blog_table">
			<tr class="table_line_header">
				<td id="manage_blog_table_header_checkbox" class="table_header"></td>
				<td id="manage_blog_table_header_title" class="table_header"><a href="#" onclick="manage_blog_sortTable('title', '<?php echo $editLang; ?>','<?php echo $otherSortType; ?>')">Title <?php echo getArrowWhileSorting($_POST['sortValue'], "title", $sortType); ?></a></td>
				<td id="manage_blog_table_header_author" class="table_header"><a href="#" onclick="manage_blog_sortTable('firstname, lastname', '<?php echo $editLang; ?>','<?php echo $otherSortType; ?>')">Author <?php echo getArrowWhileSorting($_POST['sortValue'], "firstname, lastname", $sortType); ?></a></td>
				<td id="manage_blog_table_header_active" class="table_header"><a href="#" onclick="manage_blog_sortTable('active', '<?php echo $editLang; ?>','<?php echo $otherSortType; ?>')">Is active? <?php echo getArrowWhileSorting($_POST['sortValue'], "active", $sortType); ?></a></td>
				<td id="manage_blog_table_header_date" class="table_header"><a href="#" onclick="manage_blog_sortTable('date_posted', '<?php echo $editLang; ?>','<?php echo $otherSortType; ?>')">Date created <?php echo getArrowWhileSorting($_POST['sortValue'], "date_posted", $sortType); ?></a></td>
			</tr>
			
			<?php
			
				// change tr style each line
				$line = 1;
				
				mysql_query("SET NAMES UTF8", $con);
				$query = "SELECT i.ID, i.title, j.firstname, j.lastname, i.active, i.date_posted FROM blog_articles_".$editLang." as i INNER JOIN users as j ON i.author_id = j.ID ORDER BY " . $sort . " " . $sortType;
				$result = mysql_query($query, $con);
			
				while ($row = mysql_fetch_assoc($result)) {
					echo "<tr class=\"table_line_".$line."\">";
					echo "	<td class=\"table_td manage_blog_table_checkbox\"><input type=\"checkbox\" class=\"manage_blog_table_checkbox_input\" value=\"".$row["ID"]."\"/></td>";
					echo "	<td class=\"table_td manage_blog_table_title\"><a href=\"#\" onclick=\"manage_blog_editBlogArticle(".$row["ID"].",'".$editLang."')\">".urldecode($row["title"])."</a></td>";
					echo "	<td class=\"table_td manage_blog_table_author\">".$row['firstname']." ".$row['lastname']."</td>";
					echo "	<td class=\"table_td manage_blog_table_active\">";
					
					if($row['active'] == 1) { 
						echo "<span class=\"active\"><a href=\"#\" onclick=\"manage_blog_setActiveStatus(".$row["ID"].", this.innerHTML, '".$editLang."')\">YES"; 
					} else { 
						echo "<span class=\"notactive\"><a href=\"#\" onclick=\"manage_blog_setActiveStatus(".$row["ID"].", this.innerHTML, '".$editLang."')\">NO";
					}
					
					echo "		</a></span></td>";
					echo "	<td class=\"table_td manage_blog_table_date\">".$row["date_posted"]."</td>";
					echo "</tr>";
					
					if($line == 2)
						$line = 1;
					else
						$line = 2;
				}
				
			?>
		
		</table>
	</div>
</div>