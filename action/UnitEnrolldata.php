<?php
session_start();
include('../config/db_conn.php'); 
$act=isset($_GET['a'])?$_GET['a']:' ';

$act_array=array();
$actquery="SELECT `act_id` FROM `study` WHERE  `student_id`=".$_SESSION['stu_id'].";";
$result = $mysqli->query($actquery); 
while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $act_array[]=$row['act_id'];
}
//echo "<script> alert(".$act_array.");</script>";
$result->free();

if($act=='view'){ 
   
$query  =  "SELECT act.activity_id ,u.unit_code,u.unit_name,u.lecturer,u.semester,loc.campus
            FROM activity act 
            JOIN location loc
            ON   act.location_id=loc.location_id
            JOIN units u
            ON    act.unit_id=u.id
            WHERE act.type='lecture';"; 
$result = $mysqli->query($query); 

//$index=0;
while ($row = $result->fetch_array(MYSQLI_ASSOC)){ ?>     
    <tr>
        <td> <?php echo $row['unit_code'];?></td>
        <td> <?php echo "UC demo";?></td>
        <td> <?php echo $row['lecturer'];?></td>
        <td> <?php echo "Desc haven't created in units";?></td>
        <td> <?php echo $row['campus'];?></td>
        <td> <?php echo $row['semester'];?></td>
        <td class="act_btn">
        <?php if (!in_array($row['activity_id'], $act_array,true)) {?>
            <button class="btn btn-success en_btn" id="<?php echo  $row['activity_id']; ?>" data-toggle="modal" data-target="#enroll_modal">enroll</button>
        <?php } else    { ?>
            <button class="btn btn-danger wd_btn" id="<?php echo  $row['activity_id']; ?>" data-toggle="modal" data-target="#withdra_modal">withdraw</button>
        <?php }?>
        </td>
    </tr>
<?php 
       // $index++;  //activity id as btn id
    } 
    $result->free();
}
else if($act=='filter'){
    $campus_value=isset($_GET['cam'])?$_GET['cam']:' ';
    $period_value=isset($_GET['per'])?$_GET['per']:' ';

    if (strcmp($campus_value,'0')==0) $str1=' ';
    else $str1 ="AND loc.campus='". $campus_value. "'";

    if (strcmp($period_value,'0')==0) $str2=' ';
    else $str2 ="AND u.semester='".$period_value."'";
    $pre_query="SELECT act.activity_id ,u.unit_code,u.unit_name,u.lecturer,u.semester,loc.campus FROM activity act  JOIN location loc ON   act.location_id=loc.location_id JOIN units u ON  act.unit_id=u.id WHERE act.type='lecture'";
    $query  =  $pre_query.$str1.$str2.";";

//echo "<script>console.log(\"".$query ."\");</script>";
$result = $mysqli->query($query); 
while ($row = $result->fetch_array(MYSQLI_ASSOC)){ ?>
    <tr>
        <td> <?php echo $row['unit_code'];?></td>
        <td> <?php echo "UC demo";?></td>
        <td> <?php echo $row['lecturer'];?></td>
        <td> <?php echo "Desc haven't created in units";?></td>
        <td> <?php echo $row['campus'];?></td>
        <td> <?php echo $row['semester'];?></td>
        <td class="act_btn">
        <?php if (!in_array($row['activity_id'], $act_array,true)) {?>
            <button class="btn btn-success en_btn" id="<?php echo  $row['activity_id']; ?>" data-toggle="modal" data-target="#enroll_modal">enroll</button>
        <?php } else    { ?>
            <button class="btn btn-danger wd_btn" id="<?php echo  $row['activity_id']; ?>" data-toggle="modal" data-target="#withdra_modal">withdraw</button>
        <?php }?>
        </td>
    </tr>
<?php 
    } 
    $result->free();
}
else if($act=='enroll'){
   // $campus_value=isset($_GET['cam'])?$_GET['cam']:' ';
    //$period_value=isset($_GET['per'])?$_GET['per']:' ';
    $sid=isset($_GET['sid'])?$_GET['sid']:' ';
    $actid=isset($_GET['actid'])?$_GET['actid']:' ';
    $query="INSERT INTO `study`(`student_id`,`act_id`)VALUES ('$sid','$actid')";
    $result=$mysqli->query($query);
    $result->free();
}
else if($act=='wtd'){
    //$campus_value=isset($_GET['cam'])?$_GET['cam']:' ';
   // $period_value=isset($_GET['per'])?$_GET['per']:' ';
    $sid=isset($_GET['sid'])?$_GET['sid']:' ';
    $actid=isset($_GET['actid'])?$_GET['actid']:' ';
    $query="DELETE FROM `study` WHERE `student_id` = '$sid' AND `act_id`='$actid';";
    $result=$mysqli->query($query);
    $result->free();
}
$mysqli->close();
?>

