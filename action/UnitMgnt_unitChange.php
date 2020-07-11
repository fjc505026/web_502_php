<?php
session_start();
include('../config/db_conn.php');
$actID=isset($_GET['a'])?$_GET['a']:' ';
$staff_id=isset($_GET['b'])?$_GET['b']:' '; //this is staff ID
//echo   $staff_id;
$lecDay=isset($_GET['c'])?$_GET['c']:' ';
$lecStart=isset($_GET['d'])?$_GET['d']:' ';
$lecEnd=isset($_GET['e'])?$_GET['e']:' ';
$Semester=isset($_GET['f'])?$_GET['f']:' ';
$Campus=isset($_GET['g'])?$_GET['g']:' ';
$consultTime=isset($_GET['h'])?$_GET['h']:' ';

$regEx = '|^\d{8}$|';  //check whether 8 digtal staff ID


$query="UPDATE `activity` SET `day`= '$lecDay', `start_time`='$lecStart ',`end_time`='$lecEnd ',`period`='$Semester ' WHERE `activity_id`=$actID ;";
//echo  $query;
$result=$mysqli->query($query);
if(preg_match($regEx,$staff_id)) //if input is 8 digtal staff ID , change the teaching staff
{
    $query="SELECT * FROM `staff`  WHERE `staff_id`=$staff_id ;";  //check if it is existing staff id
    $result=$mysqli->query($query);
    if($row = $result->fetch_array(MYSQLI_ASSOC)){  // staff id existed then update
        $query="UPDATE `teach` SET `staff_id`= $staff_id WHERE `act_id`=$actID ;";
        echo  $query;
        $result=$mysqli->query($query);
    }
}

// $result->free();
// $mysqli->close();
?>



