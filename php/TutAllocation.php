<?php
    session_start();
    include('../config/db_conn.php');
    $unit_id=$_GET['p'];   //unit_id
    echo "<script>unitID=".$unit_id."</script>";
    $room_index=isset($_GET['i'])? $_GET['i']:'';
    if(isset($_GET['i'])) $index=intval($room_index);
    $unitCode=0;
    $TutTime_array=array();
    $TutRoom_array=array();
    $actvity_array=array();

    // get the the responding unit's activity information (lecture and tutorial)
    $query  =  "SELECT act.activity_id, act.type, act.day,act.start_time,act.end_time,u.unit_code,u.semester,loc.room_name,loc.capacity,loc.campus
    FROM activity act
    JOIN location loc
    ON   act.location_id=loc.location_id
    JOIN units u
    ON    act.unit_id=u.id
    WHERE u.id=".$unit_id.";";

    $result = $mysqli->query($query);
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $unitCode=$row['unit_code'];
        if($row['type']=="lecture"){
            $lectureTime.=$row['day'].'('.$row['start_time'].'-'.$row['end_time'].'),';

        }else if($row['type']=="tutorial"){
            $TutTime_array[]=$row['day'].'('.$row['start_time'].'-'.$row['end_time'].')';
            $TutRoom_array[]=$row['campus'].' '.$row['room_name'].'('.$row['capacity'].')';
            $actvity_array[]=$row['activity_id'];
        }
    }
    $result->free();
?>

<!doctype html>
<head> <link rel="stylesheet" href="../format/Timetable.css"></head>
<html lang="en">
<?php  include('head.php');?>
    <br>
    <br>
    <!-- Tutoral allocation -->
    <div class="container" id="tutAlloc_ct">
            <h2 class="text-muted">Tutoral Allocation System</h2>
            <table class="table table-hover bg-secondary" id="tutAlloc_tb">
                <thead>
                    <tr>
                    <th>Unit code</th>
                    <th>Lecture time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td id="hUnitCode"><?php echo $unitCode;?></td>
                    <td id="hUnitLecTime"><?php  echo  $lectureTime;?></td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                    <th>Tutoral time</th>
                    <th>Tutoral room</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>
                        <select class="custom-select mr-sm-2" id="Tut_time" name="tutTime">
                        <?php  foreach ($TutTime_array as $key => $value) {
                                if($key!=$room_index){
                                ?>
                                    <option class="tutTime" value="<?php echo $actvity_array[$key];?>" id="<?php echo $key;?>"><?php echo  $value;?></option>
                                <?php }
                                else {
                                ?>
                                    <option selected class="tutTime" value="<?php echo $actvity_array[$key];?>" id="<?php echo $key;?>"><?php echo  $value;?></option>
                                <?php
                                }
                        }?>
                    </td>
                    <!-- update room information -->
                    <td id="Tut_location"><?php if(isset($_GET['i'])) echo  $TutRoom_array[$index];?></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center">
                <button  id="enroll_btn" class="btn btn-success">enroll</button>
                <a type="button" class="btn btn-danger" href="Timetable.php"> Close</a>
            </div>
    </div>
    <?php  include('foot.php');?>
</html>
<script>
   //when click the timeslot, update the index and show room information
   $(".tutTime").click(function(){
        roomArray_index=this.id;
        window.location.href="./TutAllocation.php?i="+roomArray_index+"&p="+unitID;
    });

    //end tutorial enroll request
    $("#enroll_btn").click(function(){
       // alert($('#Tut_time').val());
        window.location.href="../action/tutEnroll.php?a=enroll&tutTime="+$('#Tut_time').val();
    });
</script>

