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

<div id="manage_media_wrapper">
	<h2>Manage users</h2>
	<p>Hello! In this page, you will be able to manage users.</p>
	
	<div id="manage_users_container">
	
		<div id="manage_users_add_user">
			<a href="#" onclick="manage_users_addUser()">Add a user &rarr;</a>
		</div>
		
		<?php
		
			// sort type
			$sortType = "DESC";
			if(isset($_POST['sortType'])) {
				$sortType = $_POST['sortType'];
				$_SESSION["manageUsersSortType"] = $sortType;
			}
			
			if($_SESSION["manageUsersSortType"]) {
				$sortType = $_SESSION["manageUsersSortType"];
			}
			
			$otherSortType = "DESC";
			if(isset($_POST['sortType']) && $sortType == "DESC") {
				$otherSortType = "ASC";
			}
			
			// sort value
			$sort = "id";
			if(isset($_POST['sortValue'])) {
				$sort = $_POST['sortValue'];
				$_SESSION["manageUsersSortValue"] = $sort;
			}
			
			if($_SESSION["manageUsersSortValue"]) {
				$sort = $_SESSION["manageUsersSortValue"];
			}
		
		?>
		
		<div id="manage_users_table_container">
			<table id="manage_users_table" class="admin_table">
				<tr class="table_line_header">
					<td id="manage_users_table_header_delete" class="table_header table_header_delete">Delete</td>
					<td id="manage_users_table_header_email" class="table_header"><a href="#" onclick="manage_users_sortTable('email','<?php echo $otherSortType; ?>')">Email <?php echo getArrowWhileSorting($_POST['sortValue'], "email", $sortType); ?></a></td>
					<td id="manage_users_table_header_firstname" class="table_header"><a href="#" onclick="manage_users_sortTable('firstname','<?php echo $otherSortType; ?>')">Firstname <?php echo getArrowWhileSorting($_POST['sortValue'], "firstname", $sortType); ?></a></td>
					<td id="manage_users_table_header_lastname" class="table_header"><a href="#" onclick="manage_users_sortTable('lastname','<?php echo $otherSortType; ?>')">Lastname <?php echo getArrowWhileSorting($_POST['sortValue'], "lastname", $sortType); ?></a></td>
					<td id="manage_users_table_header_active" class="table_header"><a href="#" onclick="manage_users_sortTable('active','<?php echo $otherSortType; ?>')">Active <?php echo getArrowWhileSorting($_POST['sortValue'], "active", $sortType); ?></a></td>
				</tr>
			
				<?php
				
					// change tr style each line
					$line = 1;
					
					$query = "SELECT ID, email, firstname, lastname, active FROM users ORDER BY " . $sort . " " . $sortType;
					$result = mysql_query($query, $con);
				
					while ($row = mysql_fetch_assoc($result)) {
						echo "<tr class=\"table_line table_line_".$line."\">";
						echo "	<td class=\"table_td manage_users_table_delete table_td_delete\"><a href=\"#\" onclick=\"manage_users_delete(".$row["ID"].")\">x</a></td>";
						echo "	<td class=\"table_td manage_users_table_email\"><a href=\"#\" onclick=\"manage_users_editUser(".$row["ID"].")\">".$row['email']."</a></td>";
						echo "	<td class=\"table_td manage_users_table_firstname\">".$row['firstname']."</td>";
						echo "	<td class=\"table_td manage_users_table_lastname\">".$row['lastname']."</a></span></td>";
						if ($row['active'] == 1) {
							echo "	<td class=\"table_td manage_users_table_active\">YES</a></span></td>";
						} else {
							echo "	<td class=\"table_td manage_users_table_active\">NO</a></span></td>";
						}
						echo "</tr>";
						
						if($line == 2) {
							$line = 1;
						} else {
							$line = 2;
						}
					}
					
				?>
		
		</table>
	</div>
</div>