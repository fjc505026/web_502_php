<?php
session_start();
include('../config/db_conn.php'); 
$act=isset($_GET['a'])?$_GET['a']:' ';

unlink("sample.json");
if(isset($_SESSION['stu_id']))
{
  $act_array=array();
  $actquery="SELECT `act_id` FROM `study` WHERE  `student_id`=".$_SESSION['stu_id'].";";
  $result = $mysqli->query($actquery); 
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
      $act_array[]=$row['act_id'];   //acitivity id enrolled for stu_id
  }
  $result->free();
}

$unitID_array=array();  //enrolled unit_id
$unitCode_array=array();
$lectureTime_array=array();
$TutTime_array=array();

$query  =  "SELECT act.activity_id ,act.day,act.start_time,act.end_time,u.id,u.unit_code,u.unit_name,u.lecturer,u.semester,loc.room_name,loc.capacity,loc.campus
            FROM activity act 
            JOIN location loc
            ON   act.location_id=loc.location_id
            JOIN units u
            ON    act.unit_id=u.id
            WHERE act.type='lecture';";   //OR type=tutoril
$result = $mysqli->query($query); 

//$index=0;
while ($row = $result->fetch_array(MYSQLI_ASSOC)){ 
    if(in_array($row['activity_id'], $act_array,true)) {  //only display enrolled acitvity
      $unitID_array[]= $row['id'];
      $unitCode_array[]= $row['unit_code'];
      $lectureTime_array[]=$row['day'].'('.$row['start_time'].'-'.$row['end_time'].')';
      $myArr[] = array('Day'=>$row['day'], 'Start'=>$row['start_time'],"End"=>$row['end_time'],"Code"=>$row['unit_code'],"Name"=>$row['unit_name'], "Coordinator"=>$row['lecturer']);
      }
}

foreach ($unitID_array as $key => $value) {      //place to display table 
  $query="SELECT   act.activity_id, act.day,act.start_time,act.end_time FROM activity act  WHERE act.type='tutorial'AND act.unit_id=".$value.";";  
  $result = $mysqli->query($query); 
  $Tut_allocated=false;
  while ($row = $result->fetch_array(MYSQLI_ASSOC)){ 
    $Tutstr.=$row['day'].'('.$row['start_time'].'-'.$row['end_time'].'),';
    if(in_array($row['activity_id'], $act_array,true)){ 
        $Tutstr2=$row['day'].'('.$row['start_time'].'-'.$row['end_time'].'),';
        $myArr[] = array('Day'=>$row['day'], 'Start'=>$row['start_time'],"End"=>$row['end_time'],"Code"=>"none","Name"=>"tutoria;", "Coordinator"=>"none");
        $Tut_allocated=true;
      }
  }
  $TutTime_array[]=$Tutstr;
  $Tutstr='';
  if($act=='view'){ 
  ?>     
  <tr>
      <td> <?php echo $unitCode_array[$key];?></td>
      <td> <?php echo $lectureTime_array[$key];?></td>
      <td> <?php  if(!$Tut_allocated){ echo $TutTime_array[$key];} else {echo $Tutstr2; }?></td>
      <?php   if(!$Tut_allocated){?>
      <td><button class="btn btn-success text-white alloc_btn" id="<?php echo $value?>">allocate</button></td>
      <?php } else {?>
      <td><button class="btn btn-danger text-white remv_btn" id="<?php echo $value?>">remove</button></td>
      <?php }?>
  </tr>
  <?php 
  }

    $myJSON = json_encode($myArr);  
    //echo $myJSON;

  
}
session_start();
$_SESSION['one']=$unitCode_array[1];

$result->free();

$mysqli->close();

?>

<!DOCTYPE html>
<html>

	<body>
		<?php
			function fileWrite( $fileName, $str ) {
        $handle = fopen( $fileName, "r+" );
        // clear content to 0 bits
        ftruncate($handle, 0);
				fwrite( $handle, $str );
				fclose( $handle );
			}
    chmod("sample.json",0777);
    fileWrite( "sample.json", $myJSON );
    
			
		?>
    </body>
</html>


