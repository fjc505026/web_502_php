<?php
session_start();
include('../config/db_conn.php');
$accessLevel=$_SESSION['access'];
$staffID=$_SESSION['staff_id'];

$type=isset($_GET['a'])?$_GET['a']:' ';
$unitID=isset($_GET['uid'])?$_GET['uid']:' ';



//get the lecutures or tutorials
$query="SELECT * FROM `activity` a JOIN `location` USING(location_id) WHERE a.unit_id=$unitID AND a.type='$type' ;";
//echo $query;
$result=$mysqli->query($query);
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {

    $actID[]=$row['activity_id'];
    $Day[]=$row['day'];
    $Start[]=$row['start_time'];
    $End[]=$row['end_time'];
    $room[]=$row['room_name'];
    $capacity[]=$row['capacity'];
    $campus[]=$row['campus'];
    $semester[]=$row['period'];
}
?>

<!doctype html>
<head>
    <title>Enroll Student List</title>
</head>
<html lang="en">
    <?php  include('head.php');?>
    <div class="container">
    <h3><a href="./EnrollStudents.php"><i class="fa fa-arrow-circle-left text-info"></i></a></h3>
    <h2 class="text-light"><?php echo $type;?></h2>
    <?php
    //get the student list for each activity
    foreach($actID as $key=>$value){
        ?>
        <div class="row">
            <p class="col-sm-4 text-info"> TimeSlot: <?php  echo $Day[$key].' ('.$Start[$key].'-'.$End[$key].')   ';?> </p>
            <p class="col-sm-6 text-info"> Location: <?php  echo $room[$key].' ('.$campus[$key].','.$semester[$key].')';?><p>
        </div>
        <table class="table">
            <thead>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Contact Number</th>
                <th>Email</th>
            </thead>
            <tbody>
        <?php
        $query="SELECT * FROM `study` st JOIN `student` s USING(student_id) JOIN `user` u ON s.student_id= u.student_id WHERE st.act_id=$actID[$key] ;";
        $result=$mysqli->query($query);
        $counter=0;
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $counter++;
        ?>
        <tr>
            <td><?php echo $row['student_id'];?></td>
            <td><?php echo $row['fname'].' '.$row['lname'];?></td>
            <td><?php echo $row['phonenum'];?></td>
            <td><?php echo $row['email'];?></td>
        </tr>
        <?php
        }
        ?>
        </tbody>
        </table>
        <p class="col-sm-2 text-info"> Capacity: <?php  echo $counter.'/'.$capacity[$key];?><p>
        <?php
    }
    ?>

    </div>
    <?php  include('foot.php');?>
</html>
