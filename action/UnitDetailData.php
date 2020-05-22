<?php
include('../config/db_conn.php'); 
//$act=isset($_GET['a'])?$_GET['a']:' ';

$query="SELECT u.unit_code,u.unit_name,u.lecturer,u.description,a.day,a.start_time,a.end_time,a.period,  l.campus
        FROM `units` u 
        JOIN `activity` a 
        ON a.unit_id = u.id 
        JOIN `location` l
        ON a.location_id = l.location_id
        WHERE a.type='lecture';";    
$result=$mysqli->query($query);
//$result=$mysqli->query("SELECT * FROM `units` WHERE `deleted`!='1';");  
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    ?>
    <tr class="brief-view">
        <td> <?php echo $row['unit_code']; ?> </td>
        <td> <?php echo $row['unit_name'] ;?> </td>
        <td> <?php echo $row['lecturer'];?>  </td>
        <td> <?php echo $row['lecturer']; ?>  </td>
        <td> <?php echo $row['period'].'('.$row['campus'].')'; ?> </td>
    </tr>
    <tr class="detail-view">
        <td colspan="2">
        <b>Lecutre:</b> <?php echo $row['day'].':'.$row['start_time'].'-'.$row['end_time'];?>
        </td>
        <td colspan="3">
        <b>Tutorial:</b> Tut1 Day:Start-END /Tut2: Day:Start-END 
        </td>
    </tr>
    <tr class="detail-view">
        <td colspan="5">
        <b>Description(Detail):</b> 
        <textarea class="form-control" readonly rows="6"> <?php echo $row['description']; ?></textarea>
        </td>
    </tr>
<?php 
}
    
$result->free();
$mysqli->close();

?>