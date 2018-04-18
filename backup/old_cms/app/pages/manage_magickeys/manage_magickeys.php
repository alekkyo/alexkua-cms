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

<div id="manage_magickeys_wrapper">

	<h2>Manage magic keys</h2>
	<p>Hello! In this page, you will be able to manage your magic keys.</p>
	
	<div id="manage_magickeys_lang">
		<select id="manage_magickeys_lang_select" onchange="manage_magickeys_change_lang(this.value)">
			<option value="">-- Change language --</option>
			<option value="fr">Francais</option>
			<option value="en">English</option>
		</select>
	</div>
	
	<div id="manage_magickeys_add_container">
		<a href="#" id="manage_magickeys_add_text" onclick="manage_magickeys_add_toggle()">Add a magic key &rarr;</a>
		<div id="manage_magickeys_add_form">
			<div id="manage_magickeys_add_form_desc_text" class="input_text">Magic key text:</div>
			<input type="text" id="manage_magickeys_add_form_text_input">
		
			<div id="manage_magickeys_add_form_url_text" class="input_text">Magic key author:</div>
			<input type="text" id="manage_magickeys_add_form_author_input">
			
			<div id="manage_magickeys_add_save_div">
				<input type="submit" id="manage_magickeys_add_save" value="Add magic key" onclick="manage_magickeys_add()"/>
			</div>
		</div>
	</div>
	
	<?php
	
		// sort type
		$sortType = "DESC";
		if(isset($_POST['sortType'])) {
			$sortType = $_POST['sortType'];
			$_SESSION["manageMagicKeysSortType"] = $sortType;
		}
		
		if($_SESSION["manageMagicKeysSortType"]) {
			$sortType = $_SESSION["manageMagicKeysSortType"];
		}
		
		$otherSortType = "DESC";
		if(isset($_POST['sortType']) && $sortType == "DESC") {
			$otherSortType = "ASC";
		}
		
		// sort value
		$sort = "id";
		if(isset($_POST['sortValue'])) {
			$sort = $_POST['sortValue'];
			$_SESSION["manageMagicKeysSortValue"] = $sort;
		}
		
		if($_SESSION["manageMagicKeysSortValue"]) {
			$sort = $_SESSION["manageMagicKeysSortValue"];
		}
	
	?>
	
	<div id="manage_magickeys_table_container">
		<table id="manage_magickeys_table">
			<tr class="table_line_header">
				<td id="manage_magickeys_table_header_delete" class="table_header">Delete</td>
				<td id="manage_magickeys_table_header_cle_magique_text" class="table_header"><a href="#" onclick="manage_magickeys_sortTable('cle_magique_text', '<?php echo $editLang; ?>','<?php echo $otherSortType; ?>')">Magic key text <?php echo getArrowWhileSorting($_POST['sortValue'], "cle_magique_text", $sortType); ?></a></td>
				<td id="manage_magickeys_table_header_cle_magique_author" class="table_header"><a href="#" onclick="manage_magickeys_sortTable('firstname, lastname', '<?php echo $editLang; ?>','<?php echo $otherSortType; ?>')">Magic key author <?php echo getArrowWhileSorting($_POST['sortValue'], "firstname, lastname", $sortType); ?></a></td>
				<td id="manage_magickeys_table_header_author" class="table_header"><a href="#" onclick="manage_magickeys_sortTable('auteur', '<?php echo $editLang; ?>','<?php echo $otherSortType; ?>')">Author <?php echo getArrowWhileSorting($_POST['sortValue'], "auteur", $sortType); ?></a></td>
				<td id="manage_magickeys_table_header_date" class="table_header"><a href="#" onclick="manage_magickeys_sortTable('date_posted', '<?php echo $editLang; ?>','<?php echo $otherSortType; ?>')">Date created <?php echo getArrowWhileSorting($_POST['sortValue'], "date_posted", $sortType); ?></a></td>
			</tr>
			
			<?php
			
				// change tr style each line
				$line = 1;
				
				mysql_query("SET NAMES UTF8", $con);
				$query = "SELECT i.ID, i.cle_magique_text, j.firstname, j.lastname, i.auteur, i.date_posted FROM cle_magiques_".$editLang." as i INNER JOIN users as j ON i.user_id = j.ID ORDER BY " . $sort . " " . $sortType;
				$result = mysql_query($query, $con);
			
				while ($row = mysql_fetch_assoc($result)) {
					echo "<tr class=\"table_line_".$line."\">";
					echo "	<td class=\"table_td manage_magickeys_table_delete\"><a href=\"#\" onclick=\"manage_magickeys_delete(".$row["ID"].")\">x</a></td>";
					echo "	<td class=\"table_td manage_magickeys_table_cle_magique_text\"><a href=\"#\" onclick=\"manage_magickeys_editMagicKey(".$row["ID"].",'".$editLang."')\">".$row["cle_magique_text"]."</a></td>";
					echo "	<td class=\"table_td manage_magickeys_table_cle_magique_author\">".$row['firstname']." ".$row['lastname']."</td>";
					echo "	<td class=\"table_td manage_magickeys_table_author\">".$row["auteur"]."</td>";
					echo "	<td class=\"table_td manage_magickeys_table_date\">".$row["date_posted"]."</td>";
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