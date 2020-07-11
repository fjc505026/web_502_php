<?php
session_start();
include ('../config/db_conn.php');
$uid=$_SESSION['user_id'];
$act=isset($_GET['a'])?$_GET['a']:' ';
$value=isset($_GET['val'])?$_GET['val']:' ';

//change various information of the user
if($act=='dob'){
    $query="UPDATE `user` SET `DOB` = '$value' WHERE`user_id` =$uid;";
    $result=$mysqli->query($query);
    echo $query;
}else if($act=='fname'){
    $query="UPDATE `user` SET `fname` ='$value' WHERE`user_id` =$uid;";
    $result=$mysqli->query($query);
    echo $query;
}else if($act=='lname'){
    $query="UPDATE `user` SET `lname` ='$value' WHERE`user_id` =$uid;";
    $result=$mysqli->query($query);
    echo $query;
}else if($act=='email'){
    $query="UPDATE `user` SET `email` ='$value' WHERE`user_id` =$uid;";
    $result=$mysqli->query($query);
    echo $query;
}else if($act=='phone'){
    $query="UPDATE `user` SET `phonenum` =$value WHERE`user_id` =$uid;";
    $result=$mysqli->query($query);
    echo $query;
}else if($act=='ahour'){
    $sid=$_SESSION['staff_id'];
    $day=isset($_GET['day'])?$_GET['day']:' ';
    $start=isset($_GET['start'])?$_GET['start']:' ';
    $end=isset($_GET['end'])?$_GET['end']:' ';
    $query="UPDATE `staff` SET `ava_day` ='$day',`ava_start_time` ='$start',`ava_end_time` ='$end' WHERE`staff_id` =$sid;";
    $result=$mysqli->query($query);
    echo $query;
}


$mysqli->close();

?>