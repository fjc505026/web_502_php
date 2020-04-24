<?php
	include ('../config/db_conn.php');	
	//get the q parameter from URL
	$StaffID=$_GET["id"];
	//echo $StaffID;
	$result=$mysqli->query("SELECT `StaffID` FROM `staffaccnt` WHERE `StaffID` = $StaffID;");
    $result_cnt = $result->num_rows;
	if ($result_cnt!=0) {
		echo "<p class=\"text-danger\">ID exists</p>";
	} else {
		echo "<p>ID available</p>";		
	}

?> 