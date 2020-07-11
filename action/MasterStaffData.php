<?php
include('../config/db_conn.php');
$act=isset($_GET['a'])?$_GET['a']:' ';
if($act==="view"){
    $query="SELECT u.fname,u.lname,s.expertise,s.qualification,u.staff_id, s.ava_day,s.ava_start_time,s.ava_end_time
            FROM `user` u
            JOIN `staff` s
            ON u.staff_id = s.staff_id;";

    $result=$mysqli->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $temp_name[]=$row['fname'].' '.$row['lname'];
        $temp_qual[]= $row['qualification'];
        $temp_expe[]= $row['expertise'];
        $temp_id[]=$row['staff_id'];
        $temp_day[]=$row['ava_day'];
        $temp_hours[]=$row['ava_start_time'].'-'.$row['ava_end_time'];
    }
    $result->free();

    foreach ($temp_id as $key => $value){
    ?>
    <tr>
        <td> <?php echo $temp_name[$key];?> </td>
        <td> <?php echo $temp_qual[$key];?> </td>
        <td> <?php echo $temp_expe[$key];?> </td>
        <td> <?php echo $temp_day[$key];?> </td>
        <td> <?php echo $temp_hours[$key];?> </td>
            <?php
            //check whether it is the UC
            $isUC=false;
            $query="SELECT `unit_code`,`uc_id` FROM `units` WHERE uc_id = $temp_id[$key];";
            $result=$mysqli->query($query);
            $UCunitCode=' ';
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                $UCunitCode.= $row['unit_code'].'(UC),';
                $isUC=true;
            }

            //teaching unit determine by activity
            $query="SELECT t.act_id, a.type, u.unit_code
                    FROM `teach` t
                    JOIN`activity` a
                    ON  t.act_id=a.activity_id
                    JOIN `units`u
                    ON   a.unit_id=u.id
                    WHERE t.staff_id= $temp_id[$key];";
            $result=$mysqli->query($query);
            if((!$row = $result->fetch_array(MYSQLI_ASSOC))&&(!$isUC)) {
            ?>  <td> <?php echo "None";?> </td>
                <td>
                <div class="row">
                <button class="btn btn-warning btn_alloc" id="<?php echo $temp_id[$key];?>" data-toggle="modal" data-target="#alloc_modal">Allocate</button>
            <?php } else { ?>
                <td> <?php  if(!$isUC) echo $row['unit_code'].'('.$row['type'].')'; else echo $UCunitCode ;?> </td>
                <td>
                <div class="row">
                <button class="btn btn-warning btn_alloc" id="<?php echo $temp_id[$key];?>" data-toggle="modal" data-target="#alloc_modal">Allocate</button>
                <button class="btn btn-danger btn_remv" id="<?php echo $temp_id[$key];?>" data-toggle="modal" data-target="#remv_modal">Remove</button>
            <?php } ?>
            </div>
        </td>
    </tr>
    <?php
    }
}
else if($act==="DCalloc"){
    $query="SELECT unit_code  FROM `units`;";
    $result=$mysqli->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        ?>
        <option value="<?php echo $row['unit_code'];?>"><?php echo $row['unit_code'];?></option>
        <?php
    }
    $result->free();
}
else if($act==="DCremv"){             //show remove modal data
    $staffID=isset($_GET['sid'])?$_GET['sid']:' ';
    //show UC
    $query="SELECT `unit_code`, `unit_name`  FROM `units`  WHERE uc_id=$staffID; ";
    $result=$mysqli->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    ?>
        <tr>
            <td> <input value='<?php echo $row['unit_code']?>' id="alloc_selected" type="checkbox"> </td>
            <td> <?php echo 'UC'?> </td>
            <td> <?php echo $row['unit_code']?></td>
            <td> <?php echo $row['unit_name'];?>  </td>
            <td> <?php echo "UC can't be removed" ;?> </td>
        </tr>
    <?php
    }
    //show lecture and tutoral
    $query="SELECT a.activity_id, a.type, a.day, a.start_time, a.end_time,a.period, u.unit_code, l.campus
            FROM `teach` t
            JOIN `activity` a
            ON t.act_id=a.activity_id
            JOIN `location` l
            ON    a.location_id=l.location_id
            JOIN `units` u
            ON  a.unit_id=u.id
            WHERE  t.staff_id= $staffID;";
    $result=$mysqli->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    ?>
        <tr>
            <td> <input value='<?php echo $row['activity_id']?>' id="alloc_selected" type="checkbox"> </td>
            <td> <?php echo $row['type']?> </td>
            <td> <?php echo $row['unit_code']?></td>
            <td> <?php echo $row['day'].'('.$row['start_time'].'-'.$row['end_time'].')';?>  </td>
            <td> <?php echo $row['campus'].'('.$row['period'].')';?> </td>
        </tr>
    <?php
    }
    $result->free();
}
else if($act==="lectime"){ //in allocation modal, click lecuture, show lecutre time
    $uCode=isset($_GET['ucode'])?$_GET['ucode']:' ';
    $campus=isset($_GET['cam'])?$_GET['cam']:' ';
    $period=isset($_GET['period'])?$_GET['period']:' ';
    $query="SELECT a.activity_id, a.day, a.start_time, a.end_time,u.unit_code, l.campus
            FROM `activity` a
            JOIN `units` u
            ON a.unit_id=u.id
            JOIN `location` l
            ON a.location_id=l.location_id
            WHERE a.type='lecture' AND u.unit_code='$uCode' AND l.campus='$campus' AND a.period ='$period';";
    $result=$mysqli->query($query);
    ?>
    <label for="timeAlloc"><b>Select time slot</b></label>
    <select class="custom-select" id="allocTime" name="allocTime">
    <?php

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        ?>
        <option value="<?php echo $row['activity_id'];?>"><?php echo $row['day'].'('. $row['start_time'].'-'. $row['end_time'].')';?></option>
        <?php
    }
    ?>
   </select>
    <?php
    $result->free();
}
else if($act==="tuttime"){  //in allocation modal, click tutorial, show tutorial time
    $uCode=isset($_GET['ucode'])?$_GET['ucode']:' ';
    $campus=isset($_GET['cam'])?$_GET['cam']:' ';
    $period=isset($_GET['period'])?$_GET['period']:' ';
    $query="SELECT a.activity_id, a.day, a.start_time, a.end_time,u.unit_code, l.campus
            FROM `activity` a
            JOIN `units` u
            ON a.unit_id=u.id
            JOIN `location` l
            ON a.location_id=l.location_id
            WHERE a.type='tutorial' AND u.unit_code='$uCode' AND l.campus='$campus' AND a.period ='$period';";
    $result=$mysqli->query($query);
    ?>
    <label for="timeAlloc"><b>Select time slot</b></label>
    <select class="custom-select" id="allocTime" name="allocTime">
    <?php
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        ?>
        <option value="<?php echo $row['activity_id'];?>"><?php echo $row['day'].'('. $row['start_time'].'-'. $row['end_time'].')';?></option>
        <?php
    }
    ?>
   </select>
    <?php
    $result->free();
}
$mysqli->close();
?>


