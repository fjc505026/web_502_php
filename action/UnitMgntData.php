<?php
session_start();
include('../config/db_conn.php');

$accessLevel=$_SESSION['access'];
$staffID=$_SESSION['staff_id'];
// echo "<script>alert(".$accessLevel.");</script>";
// echo  "<script>alert(".$staffID.");</script>";
$act=isset($_GET['a'])?$_GET['a']:' ';
$uid=isset($_GET['uid'])?$_GET['uid']:' ';
if($act=="unit"){
    if($accessLevel==5)
        $query="SELECT `id`,`unit_code`,`unit_name`,`lecturer` FROM `units`;";   //DC show all units
    else if ($accessLevel==4)
        $query="SELECT `id`,`unit_code`,`unit_name`,`lecturer` FROM `units` WHERE uc_id=$staffID;";   //UC only show the unit he is the UC
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
else if($act=="lec"){    //update the lecturer info.
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

    //get  lecturers info
    foreach ($lecturer_id as $key=>$value){
        //get name
        $query="SELECT u.fname, u.lname
                FROM `user` u
                WHERE u.staff_id=$lecturer_id[$key];";
        $result=$mysqli->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $lecturerName=$row['fname'].' '.$row['lname'];
        //get lecutre activity info
        $query="SELECT a.activity_id, a.type, a.day, a.start_time, a.end_time,a.period, l.campus
                FROM `teach` t
                JOIN `activity` a
                ON t.act_id=a.activity_id
                JOIN `location` l
                USING(`location_id`)
                WHERE t.staff_id=$lecturer_id[$key] AND a.type='lecture' ;";
        $result=$mysqli->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        //$lecturerTime=$row['day'].'('.$row['start_time'].'-'.$row['end_time'].')';
        $lecDay=$row['day'];
        $lecStart=$row['start_time'];
        $lecEnd=$row['end_time'];
        $Semester=$row['period'];
        $Campus=$row['campus'];
        $actID=$row['activity_id'];
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
                <td> <input style="width:100%;" name="lecName"  id="<?php echo $actID.'LecName';?>" type="text" value="<?php echo $lecturerName;?>"></td>
                <td> <input style="width:120%;" name="lecDay"   id="<?php echo $actID.'LecDay';?>" type="text" value="<?php echo $lecDay;?>"> </td>
                <td> <input style="width:100%;"  name="lecStart" id="<?php echo $actID.'LecStart';?>"  type="text" value="<?php echo $lecStart;?>"></td>
                <td> <input style="width:100%;"  name="lecEnd"   id="<?php echo $actID.'LecEnd';?>" type="text" value="<?php echo $lecEnd;?>"></td>
                <td> <input style="width:120%;" name="Semester" id="<?php echo $actID.'LecSemester';?>"  type="text" value="<?php echo $Semester;?>"></td>
                <td> <input style="width:100%;" name="Campus"   id="<?php echo $actID.'LecCampus';?>"  type="text" value="<?php echo $Campus;?>"></td>
                <td> <input style="width:50%;"  name="consultTime" id="<?php echo $actID.'LecConsult';?>" type="text" value="<?php echo $consultTime;?>"></td>
                <td> <button type="submit" class="btn btn-danger act_edit" name="actID" id="<?php echo $actID;?>" value="<?php echo $actID;?>">change</button></td>
            </tr>
        <?php
    }
}
else if($act=='tut'){   //update the tutor info.
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
                WHERE t.staff_id=$tutor_id[$key] AND a.type='tutorial';";
        $result=$mysqli->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        //$tutorialTime=$row['day'].'('.$row['start_time'].'-'.$row['end_time'].')';
        $tutDay=$row['day'];
        $tutStart=$row['start_time'];
        $tutEnd=$row['end_time'];
        $Semester=$row['period'];
        $Campus=$row['campus'];
        $actID=$row['activity_id'];
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
                <td> <input style="width:100%;" name="lecName"  id="<?php echo $actID.'LecName';?>" type="text" value="<?php echo $tutorName;?>"></td>
                <td> <input style="width:120%;" name="lecDay"   id="<?php echo $actID.'LecDay';?>" type="text" value="<?php echo $tutDay;?>"> </td>
                <td> <input style="width:100%;"  name="lecStart" id="<?php echo $actID.'LecStart';?>"  type="text" value="<?php echo $tutStart;?>"></td>
                <td> <input style="width:100%;"  name="lecEnd"   id="<?php echo $actID.'LecEnd';?>" type="text" value="<?php echo $tutEnd;?>"></td>
                <td> <input style="width:120%;" name="Semester" id="<?php echo $actID.'LecSemester';?>"  type="text" value="<?php echo $Semester;?>"></td>
                <td> <input style="width:100%;" name="Campus"   id="<?php echo $actID.'LecCampus';?>"  type="text" value="<?php echo $Campus;?>"></td>
                <td> <input style="width:50%;"  name="consultTime" id="<?php echo $actID.'LecConsult';?>" type="text" value="<?php echo $consultTime;?>"></td>
                <td> <button type="submit" class="btn btn-danger act_edit" name="actID" id="<?php echo $actID;?>" value="<?php echo $actID;?>">change</button></td>
            </tr>
        <?php
    }
}
$mysqli->close();
?>