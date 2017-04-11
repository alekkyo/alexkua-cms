<?php

	// Import the config file	
	include '../../include/config.php';
	
	$tr_class = "one";
	$filesInDirectory = glob($imgDirectory.'/*.*');
	
	// header
	echo "<tr><td class=\"header\">Delete</td><td class=\"header\">File</td><td class=\"header\">Date modified</td></tr>";
	
	if(count($filesInDirectory) == 0) {
	
		echo "<tr><td>No files in directory!</td></tr>";
		
	} else {
	
		foreach($filesInDirectory as $file) {
		
			echo "<tr class=\"row ".$tr_class."\">";
			
			if($tr_class == "one") {
				$tr_class = "two";
			} else {
				$tr_class = "one";
			}
			
			$filename = str_replace($imgDirectory, "", $file);
			$fileurl = str_replace($imgDirectory, $imgDirectoryUrl, $file);
			
		    echo "<td class=\"delete\"><a href=\"#\" onclick=\"deleteFile('".$file."')\">delete</a></td>";
		    echo "<td><a target=\"_blank\" href=\"".$fileurl."\">".$filename."</a></td>";
		    echo "<td class=\"date_modified\">".date("F d Y, H:i:s", filemtime($file))."</td>";
		    
		    echo "</tr>";
		}
	}

?>