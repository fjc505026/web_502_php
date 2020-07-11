<?php
	include ('../config/db_conn.php');
	$role=isset($_GET['role'])?$_GET['role']:' ';
	$ID=isset($_GET['id'])?$_GET['id']:' ';
    //check whether the student ID or staff ID is existed or not
	if($role=='student'){
		$result=$mysqli->query("SELECT `student_id` FROM `student` WHERE `student_id` = $ID;");
		$result_cnt = $result->num_rows;

		$result_cnt = $result->num_rows;
		if ($result_cnt!=0) {
			echo "<p class=\"text-danger\">ID exists</p>";
		} else {
			echo "<p>ID available</p>";
		}
	}
	else if ($role=='staff'){
		//echo $StaffID;
		$result=$mysqli->query("SELECT `staff_id` FROM `staff` WHERE `staff_id` = $ID;");
		$result_cnt = $result->num_rows;
		if ($result_cnt!=0) {
			echo "<p class=\"text-danger\">ID exists</p>";
		} else {
			echo "<p>ID available</p>";
		}
	}
	$result->free();
	$mysqli->close();

?>