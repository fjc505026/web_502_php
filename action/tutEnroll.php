<?php
session_start();
include ('../config/db_conn.php');
$ID=$_SESSION['stu_id'];
$action=isset($_GET['a'])?$_GET['a']:' ';
if($action=='enroll'){
    $actID=isset($_GET['tutTime'])?$_GET['tutTime']:' ';
    
   // echo $actID;
   // echo $ID;
    $alreadyEnrolled=false;
    $pre_query="SELECT * FROM`study` WHERE `student_id`= '$ID';";
    $result=$mysqli->query($pre_query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){ 
        if($actID== $row['act_id'])
            $alreadyEnrolled=true;
    }
    $result->free();
    if(!$alreadyEnrolled){
        $query="INSERT INTO `study` (`student_id`,`act_id`) VALUES ( $ID, $actID);";
        echo $query;
        if($result=$mysqli->query($query))
            echo "success";
        else  echo "fail";
        //$result->free();
    }
    else echo "error: already enrolled!";
    header('Location:../php/Timetable.php');
}
else if ($action=='withdraw'){
   
    $unit_id=isset($_GET['p'])?$_GET['p']:' ';
  
    $query="SELECT s.act_id FROM `study` s JOIN `activity` a ON s.act_id=a.activity_id  WHERE student_id=$ID AND a.type='tutorial' AND a.unit_id=$unit_id;";
    //echo $query;
    $result=$mysqli->query($query);
    if($row = $result->fetch_array(MYSQLI_ASSOC)){ 
             $actID_enrolledtut=$row['act_id'];
     }
     $result->free();

    $query="DELETE  FROM `study` WHERE `student_id`=$ID AND `act_id`= $actID_enrolledtut";
    $result=$mysqli->query($query);
    echo "delete record success!";
    //$result->free();
    header('Location:../php/Timetable.php');

}
    $mysqli->close();
?> 