<?php
include('../config/db_conn.php'); 

$action=isset($_GET['a'])?$_GET['a']:' ';

$staffID=isset($_GET['sid'])?$_GET['sid']:' ';
$Ucode=isset($_GET['ucode'])?$_GET['ucode']:' ';
$campus=isset($_GET['cam'])?$_GET['cam']:' ';
$period=isset($_GET['period'])?$_GET['period']:' ';
$role=isset($_GET['role'])?$_GET['role']:' ';
$activityID=isset($_GET['actID'])?$_GET['actID']:' ';


if($action=="add"){//add allocation

    if($role=="UC"){


        //insert into units
    
    }
    else {  
        $query="INSERT INTO `teach`(staff_id, act_id) VALUES ($staffID, $activityID);";
        echo $query;
        $result=$mysqli->query($query);
    }
}
else if($action=="remv"){  //remove allocation
    $query="DELETE FROM `teach` WHERE staff_id= $staffID AND act_id=$activityID";
    echo $query;
    $result=$mysqli->query($query);
   
}

//$result->free();
$mysqli->close();
?>

