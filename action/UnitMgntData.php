<?php
include('../config/db_conn.php');
$act=isset($_GET['a'])?$_GET['a']:' ';
$uid=isset($_GET['uid'])?$_GET['uid']:' ';
if($act=="unit"){
    $query="SELECT `id`,`unit_code`,`unit_name`,`lecturer` FROM `units`;";
    $result=$mysqli->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        ?>
        <tr class="bg-secondary brief-view">
            <td> <?php echo $row['unit_code'];?></td>
            <td> <?php echo $row['lecturer'];?></td>
            <td> <?php echo $row['unit_name'] ;?></td>
            <td><button type="button" class="btn btn-sm btn-success unitDetail_btn" data-toggle="modal" data-target="#UnitDetail" id="<?php echo $row['id'];?>">Detail</button></td>
        </tr>
    <?php
    }
    $result->free();
}
else if($act=="lec"){
    //acquire the staff_id of this unit lecturers
    $query="SELECT t.staff_id
            FROM `teach` t
            JOIN `activity` a
            ON t.act_id=a.activity_id
            WHERE a.unit_id= $uid AND a.type='lecture';";
    $result=$mysqli->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $lecturer_id[]=$row['staff_id'];
    }
    $result->free();

    //get info of the lecturers
    foreach ($lecturer_id as $key=>$value){
        //get name
        $query="SELECT u.fname, u.lname
                FROM `user` u
                WHERE u.staff_id=$lecturer_id[$key];";
        $result=$mysqli->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $lecturerName=$row['fname'].' '.$row['lname'];
        //get lecutre info
        $query="SELECT a.activity_id, a.type, a.day, a.start_time, a.end_time,a.period, l.campus
                FROM `teach` t
                JOIN `activity` a
                ON t.act_id=a.activity_id
                JOIN `location` l
                USING(`location_id`)
                WHERE t.staff_id=$lecturer_id[$key] AND a.type='lecture' ;";
        $result=$mysqli->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $lecturerTime=$row['day'].'('.$row['start_time'].'-'.$row['end_time'].')';
        $Semester=$row['period'];
        $Campus=$row['campus'];
        //get consutling time
        $query="SELECT a.activity_id, a.type, a.day, a.start_time, a.end_time
                FROM `teach` t
                JOIN `activity` a
                ON t.act_id=a.activity_id
                JOIN `location` l
                USING(`location_id`)
                WHERE t.staff_id=$lecturer_id[$key] AND a.type='consulting';";
        $result=$mysqli->query($query);
        if($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $consultTime=$row['day'].'('.$row['start_time'].'-'.$row['end_time'].')';
        }else{
            $consultTime='none';
        }
        ?>
            <tr class="sub-view">
                <td> <?php echo $lecturerName;?></td>
                <td> <?php echo $lecturerTime;?></td>
                <td> <?php echo $Semester;?></td>
                <td> <?php echo $Campus;?></td>
                <td> <?php echo $consultTime;?></td>
            </tr>
        <?php
    }
}
else if($act=='tut'){
     //acquire the staff_id of this unit tutor
    $query="SELECT t.staff_id
            FROM `teach` t
            JOIN `activity` a
            ON t.act_id=a.activity_id
            WHERE a.unit_id= $uid AND a.type='tutorial';";
    $result=$mysqli->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $tutor_id[]=$row['staff_id'];
    }
    $result->free();

    //get info of the tutors
    foreach ($tutor_id as $key=>$value){
    //get name
    $query="SELECT u.fname, u.lname
            FROM `user` u
            WHERE u.staff_id=$tutor_id[$key];";
    $result=$mysqli->query($query);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $tutorName=$row['fname'].' '.$row['lname'];
    //get tutor info
    $query="SELECT a.activity_id, a.type, a.day, a.start_time, a.end_time,a.period, l.campus
            FROM `teach` t
            JOIN `activity` a
            ON t.act_id=a.activity_id
            JOIN `location` l
            USING(`location_id`)
            WHERE t.staff_id=$tutor_id[$key] AND a.type='tutorial' ;";
    $result=$mysqli->query($query);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $tutorialTime=$row['day'].'('.$row['start_time'].'-'.$row['end_time'].')';
    $Semester=$row['period'];
    $Campus=$row['campus'];
    //get consutling time
    $query="SELECT a.activity_id, a.type, a.day, a.start_time, a.end_time
            FROM `teach` t
            JOIN `activity` a
            ON t.act_id=a.activity_id
            JOIN `location` l
            USING(`location_id`)
            WHERE t.staff_id=$tutor_id[$key] AND a.type='consulting';";
    $result=$mysqli->query($query);
    if($row = $result->fetch_array(MYSQLI_ASSOC))
    {
        $consultTime=$row['day'].'('.$row['start_time'].'-'.$row['end_time'].')';
    }else{
        $consultTime='none';
    }
    ?>
        <tr class="sub-view">
            <td> <?php echo $tutorName;?></td>
            <td> <?php echo $tutorialTime;?></td>
            <td> <?php echo $Semester;?></td>
            <td> <?php echo $Campus;?></td>
            <td> <?php echo $consultTime;?></td>
        </tr>
    <?php
    }
}
$mysqli->close();
?>