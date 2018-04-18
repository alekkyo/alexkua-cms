<?php

	$file = $_POST["file"];
	
	if (file_exists($file)) { 

	    unlink($file); // delete it here only if it exists
	    echo 1;
	
	} else { 
	    echo 0;
	} 
?>