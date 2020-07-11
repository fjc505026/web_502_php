<?php
session_start();
include('../config/db_conn.php');
$accessLevel=$_SESSION['access'];
$staffID=$_SESSION['staff_id'];
?>

<!doctype html>
<head>
    <link rel="stylesheet" href="../format/UnitMgnt.css">
    <title>Enroll Student Detail</title>
</head>
<html lang="en">
  <?php  include('head.php');?>
  <!-- Unit Management table  -->
  <div class="container" id="UnitMagmnt_ct">
    <h2 class="text-light">Unit list</h2>
    <table class="table table-hover bg-dark" id="UnitMagmnt_tb">
        <thead>
            <tr>
                <th>Unit Code</th>
                <th>Unit Coordinator</th>
                <th>Unit Name</th>
                <th> </th>
            </tr>
        </thead>
        <tbody id="unit_body">
        <?php
            //requset for the related units info.
            if($accessLevel==5)
                $query="SELECT `id`,`unit_code`,`unit_name`,`lecturer` FROM `units`;";   //DC show all units
            else if ($accessLevel==4)
                $query="SELECT `id`,`unit_code`,`unit_name`,`lecturer` FROM `units` WHERE uc_id=$staffID;";   //UC only show the unit he is the UC
            else if ($accessLevel==3||$accessLevel==2){  //tutor or lecturer
                $query="SELECT u.id, u.unit_code,u.unit_name,u.lecturer
                        FROM `teach` t
                        JOIN`activity` a
                        ON t.act_id=a.activity_id
                        JOIN `units` u
                        ON  a.unit_id=u.id
                        WHERE t.staff_id=$staffID ;";
            }
            $result=$mysqli->query($query);
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            ?>
            <tr class="bg-secondary brief-view">
                <td> <?php echo $row['unit_code'];?></td>
                <td> <?php echo $row['lecturer'];?></td>
                <td> <?php echo $row['unit_name'] ;?></td>
                <td><button type="button" class="btn btn-sm btn-info EnrollDetail_btn" data-toggle="modal" data-target="#EnrollDetail" id="<?php echo $row['id'];?>">Enrolled List</button></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
  </div>

    <!-- EnrollDetail modal -->
    <div class="modal fade" id="EnrollDetail" tabindex="-1" role="dialog" aria-labelledby="EnrollDetailLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="EnrollDetailLabel">Choose the teaching type!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body row">
                <button class="btn btn-success col-sm-5 ml-3" id="lecBtn">Lecture</button>
                <button class="btn btn-info col-sm-5 ml-3" id="tutBtn">Tutorial</button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>
  <?php  include('foot.php');?>
</html>

<script>
unitID=0;
//enrolllist btn give the unit id from the button id
$('.EnrollDetail_btn').click(function(){
    unitID=this.id;
})

//send the unit id and lecture type heading to new page
$('#lecBtn').click(function(){

  window.location.href='./EnrollStudentsList.php?a=lecture&uid='+unitID;

})


//send the unit id and tutroal type heading to new page
$('#tutBtn').click(function(){

  window.location.href='./EnrollStudentsList.php?a=tutorial&uid='+unitID;

})




</script>
