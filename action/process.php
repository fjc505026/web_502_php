<?php
include('../config/db_conn.php');
$act=isset($_GET['a'])?$_GET['a']:' ';

if($act=='view'){ //display data
    $query="SELECT * FROM `units` WHERE `deleted`!='1';";     // I add a deleted colunm in unit table for recovering data in future
    $result=$mysqli->query($query);
    //$result=$mysqli->query("SELECT * FROM `units` WHERE `deleted`!='1';");
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        ?>
        <tr>
           <td> <?php echo $row['id'] ?> </td>
           <td> <?php echo $row['unit_code'] ?></td>
           <td> <?php echo $row['unit_name'] ?></td>
           <td> <?php echo $row['lecturer'] ?></td>
           <td> <?php echo $row['semester'] ?></td>
        </tr>
<?php
    }
    $result->free();
}
else if($act=='modify'){  // modify data interaction
    //PHP script to handle with jQuery-Tabledit plug-in.
    //header('Content-Type: application/json');
    $input = filter_input_array(INPUT_POST);
    if ($input['action'] == 'edit') {
        $mysqli->query("UPDATE units SET unit_code='" . $input['unit_code'] . "', unit_name='" . $input['unit_name'] . "', lecturer='" . $input['lecturer'] . "', semester='" . $input['semester'] . "' WHERE id='" . $input['id'] . "'");
    } else if ($input['action'] == 'delete') {
        $mysqli->query("UPDATE units SET deleted=1 WHERE id='" . $input['id'] . "'");
    } else if ($input['action'] == 'restore') {
        $mysqli->query("UPDATE units SET deleted=0 WHERE id='" . $input['id'] . "'");
    }
    echo json_encode($input);

}
else if($act=='add'){  // modify data interaction
    $unitC  =   isset($_GET['uc'])?$_GET['uc']:' ';
    $unitN  =   isset($_GET['un'])?$_GET['un']:' ';
    $lect   =   isset($_GET['l'])?$_GET['l']:' ';
    $sems   =   isset($_GET['s'])?$_GET['s']:' ';
    $desc   =   isset($_GET['desc'])?$_GET['desc']:' ';

    $unitCodeExist=false;
    $preQuery="SELECT `unit_code` FROM `units`WHERE `deleted`!='1';";             //pre query for checking unit code conflict
    if($result=$mysqli->query($preQuery)){
         while ($row = $result->fetch_array(MYSQLI_ASSOC)){
            if($row['unit_code'] == strtoupper($unitC))
                $unitCodeExist=true;
         }
         $result->free();

         if($unitCodeExist)
            echo "Unit code already existed, please retry!";
         else{
            $query="INSERT INTO `units` ( `unit_code`, `unit_name`, `uc_id`, `semester`, `description`) VALUES  ('$unitC', '$unitN', '$lect', '$sems', '$desc');";     // I add a deleted colunm in unit table for recovering data in future

            if($result=$mysqli->query($query)){

                $query="SELECT `fname`, `lname` FROM `user` WHERE `staff_id`='$lect'; ";
                $result=$mysqli->query($query);
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $ucName=$row['fname'].' '.$row['lname'];
                $mysqli->query("UPDATE `units` SET `lecturer` = '$ucName' WHERE `unit_code`='$unitC' ");

                echo "You have added a unit sucessfully!";
               // $result->free();
            }else{
                echo "Error: ".$query."<br>".mysqli_connect_error();
            }

        }
    }
}
else if($act=='search') { //return search result
    $var1=strtolower($_GET['s']);
    //$query = "SELECT * FROM `units`;";   //WHERE `unit_code` lIKE `%$var1%` OR `unit_name` lIKE `%$var1%`
    $query = "SELECT * FROM `units` WHERE `unit_code` LIKE '%$var1%' OR `unit_name` LIKE '%$var1%' OR `lecturer` LIKE '%$var1%' OR `semester` LIKE '%$var1%';";
    $result = $mysqli->query($query);
    $result_counter=0;                   // $result->num_rows
    ?>
    <p>we found <span id="counter"><?php $result->num_rows ?> </span> result(s)</p>
    <?php
        while ($row = $result->fetch_array(MYSQLI_ASSOC)){
            //$stringFromArr= strtolower(implode('',$row));
           // if (strpos($stringFromArr, $var1) !== false) {
                $result_counter++;
            ?>
            <table  class="table  table-bordered">
                <tbody>
                    <tr>
                        <td>ID</td><td><?php echo  $row['id']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:30%">Unit Code</td>
                        <td style="width:70%"><?php echo  $row['unit_code'] ?></td>
                    </tr>
                    <tr>
                        <td>Unit Name</td>
                        <td><?php echo  $row['unit_name'] ?></td>
                    </tr>
                    <tr>
                        <td>Lecturer</td>
                        <td><?php echo  $row['lecturer'] ?></td>
                    </tr>
                    <tr>
                        <td>Semester</td>
                        <td><?php echo  $row['semester'] ?></td>
                    </tr>
                </tbody>
            </table>
            <?php
           // }
        }
        if( $result_counter==0){
        echo "<script>alert('No record found!')</script>";
    }
    echo "<script>$('#counter').html('". $result_counter ."');</script>";
    $result->free();
}
$mysqli->close();
?>

