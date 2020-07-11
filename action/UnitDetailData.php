<?php
include('../config/db_conn.php');
//$act=isset($_GET['a'])?$_GET['a']:' ';

//get unit fundementail information
$result=$mysqli->query("SELECT * FROM `units` JOIN `user` ON units.uc_id=user.staff_id;");
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $unitCode[]=$row['unit_code'];
    $unitName[]=$row['unit_name'];
    $ucName[]=$row['fname'].' '.$row['lname'];
    $unitDes[]=$row['description'];
    $uID[]=$row['id'];
}


//foor loop go through each unit
foreach ($uID as $key =>$value){

    //get tutorials information  in each unitID
    $tutInfo=' ';
    $query="SELECT a.day,a.start_time,a.end_time,a.period, l.campus
            FROM `units` u
            JOIN `activity` a
            ON a.unit_id = u.id
            JOIN `location` l
            ON a.location_id = l.location_id
            WHERE a.type='tutorial' AND a.unit_id=$value;";
    $result=$mysqli->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $tutInfo.= $row['day'].':'.$row['start_time'].'-'.$row['end_time'].'('.$row['period'].'/' .$row['campus'].')'.',';
    }


    //get lecture information  in each unitID
    $lecInfo=' ';
    $lecturers=' ';
    $lecExinfo=' ';
    $query="SELECT u1.fname,u1.lname,a.day,a.start_time,a.end_time,a.period, l.campus
            FROM `units` u
            JOIN `activity` a
            ON a.unit_id = u.id
            JOIN `location` l
            ON a.location_id = l.location_id
            JOIN `teach` t
            ON a.activity_id=t.act_id
            JOIN `user` u1
            ON    t.staff_id=u1.staff_id
            WHERE a.type='lecture' AND a.unit_id=$value;";
    $result=$mysqli->query($query);

    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $lecInfo.= $row['day'].':'.$row['start_time'].'-'.$row['end_time'].'('.$row['period'].'/' .$row['campus'].')'.',';
        $lecturers.= $row['fname'].' '.$row['lname'].',';
        $lecExinfo.= '('.$row['period'].'/'.$row['campus'].'),';
    }

    ?>
    <tr class="brief-view">
        <td> <?php echo $unitCode[$key]; ?> </td>
        <td> <?php echo $unitName[$key];?> </td>
        <td> <?php echo  $ucName[$key];?>  </td>
        <td> <?php echo $lecturers; ?>  </td>
        <td> <?php echo $lecExinfo; ?> </td>
    </tr>
    <tr class="detail-view">
        <td colspan="2">
            <b>Lecutre:</b> <?php echo $lecInfo;?>
        </td>
        <td colspan="3">
            <b>Tutorial:</b> <?php echo  $tutInfo;?>
        </td>
    </tr>
    <tr class="detail-view">
        <td colspan="5">
            <b>Description(Detail):</b>
            <textarea class="form-control" readonly rows="6"> <?php echo $unitDes[$key]; ?></textarea>
        </td>
    </tr>
    <?php
}


$result->free();
$mysqli->close();

?>