<?php 

	session_start();

	// Import the config file	
	include '../../include/config.php';

	if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '') {
  		header('Location: index.php');
	}
	
	function getArrowWhileSorting($postSortValue, $sortValue, $sortType) {
		if(($postSortValue == $sortValue) && $sortType == "DESC") {
			return "&darr;";
		} else if(($postSortValue == $sortValue) && $sortType == "ASC") {
			return "&uarr;";
		}
	}
	
?>

<div id="manage_publicity_wrapper">
	<h2>Manage publicity</h2>
	<p>Hello! In this page, you will be able to manage your publicity. </p>
	<p>The max publicity in a page is 3. If you add more than 3, random 3 publicity will be generated each page loading. Ideal width for each publicity is under 400px.</p>
	
	<div id="manage_publicity_container">
	
		<div id="manage_publicity_add_container">
			<a href="#" id="manage_publicity_add_text" onclick="manage_publicity_add_toggle()">Add a publicity &rarr;</a>
			<div id="manage_publicity_add_form">
				<div id="manage_publicity_add_form_desc_text" class="input_text">Description:</div>
				<input type="text" id="manage_publicity_add_form_desc_input">
			
				<div id="manage_publicity_add_form_url_text" class="input_text">Publicity url:</div>
				<input type="text" id="manage_publicity_add_form_url_input">
				
				<div id="manage_publicity_add_form_imglink_text" class="input_text">Publicity image url:</div>
				<input type="text" id="manage_publicity_add_form_imglink_input">
				
				<div id="manage_publicity_add_save_div">
					<input type="submit" id="manage_publicity_add_save" value="Add publicity" onclick="manage_publicity_add()"/>
				</div>
			</div>
		</div>
		
		<?php
		
			// sort type
			$sortType = "DESC";
			if(isset($_POST['sortType'])) {
				$sortType = $_POST['sortType'];
				$_SESSION["managePublicitySortType"] = $sortType;
			}
			
			if($_SESSION["managePublicitySortType"]) {
				$sortType = $_SESSION["managePublicitySortType"];
			}
			
			$otherSortType = "DESC";
			if(isset($_POST['sortType']) && $sortType == "DESC") {
				$otherSortType = "ASC";
			}
			
			// sort value
			$sort = "id";
			if(isset($_POST['sortValue'])) {
				$sort = $_POST['sortValue'];
				$_SESSION["managePublicitySortValue"] = $sort;
			}
			
			if($_SESSION["managePublicitySortValue"]) {
				$sort = $_SESSION["managePublicitySortValue"];
			}
		
		?>
		
		<div id="manage_publicity_table_container">
			<table id="manage_publicity_table">
				<tr class="table_line_header">
					<td id="manage_publicity_table_header_delete" class="table_header">Delete</td>
					<td id="manage_publicity_table_header_desc" class="table_header"><a href="#" onclick="manage_publicity_sortTable('description','<?php echo $otherSortType; ?>')">Description <?php echo getArrowWhileSorting($_POST['sortValue'], "description", $sortType); ?></a></td>
					<td id="manage_publicity_table_header_imglink" class="table_header"><a href="#" onclick="manage_publicity_sortTable('img_link','<?php echo $otherSortType; ?>')">Image link <?php echo getArrowWhileSorting($_POST['sortValue'], "img_link", $sortType); ?></a></td>
					<td id="manage_publicity_table_header_url" class="table_header"><a href="#" onclick="manage_publicity_sortTable('link','<?php echo $otherSortType; ?>')">Publicity link <?php echo getArrowWhileSorting($_POST['sortValue'], "link", $sortType); ?></a></td>
				</tr>
			
				<?php
				
					// change tr style each line
					$line = 1;
					
					mysql_query("SET NAMES UTF8", $con);
					$query = "SELECT ID, img_link, link, description FROM publicite ORDER BY " . $sort . " " . $sortType;
					$result = mysql_query($query, $con);
				
					while ($row = mysql_fetch_assoc($result)) {
						echo "<tr class=\"table_line_".$line."\">";
						echo "	<td class=\"table_td manage_publicity_table_delete\"><a href=\"#\" onclick=\"manage_publicity_delete(".$row["ID"].")\">x</a></td>";
						echo "	<td class=\"table_td manage_publicity_table_desc\">".$row['description']."</td>";
						echo "	<td class=\"table_td manage_publicity_table_imglink\"><a target=\"blank\" href=\"".$row['img_link']."\">".$row['img_link']."</td>";
						echo "	<td class=\"table_td manage_publicity_table_url\"><a target=\"blank\" href=\"".$row['link']."\">".$row['link']."</a></span></td>";
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
</div>