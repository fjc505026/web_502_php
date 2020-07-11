<?php
include('../config/db_conn.php');
session_start();
$uid=$_SESSION['user_id'];
$query="SELECT * FROM `user` ur JOIN `address` adr USING (address_id)  WHERE ur.user_id=$uid;";
$result=$mysqli->query($query);
if($row =$result->fetch_array(MYSQLI_ASSOC)){
  $username=$row['username'];
    $fname=$row['fname'];
    $lname=$row['lname'];
    $email=$row['email'];
    $phonenum=$row['phonenum'];
    $DOB=$row['DOB'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="../format/Reg.css">
        <title>Account Detail</title>
    </head>
    <body class="jumbotron bg-secondary" >
        <div class="container bg-light ">
            <h3><a href="../index.php"><i class="fas fa-home text-dark"></i></a></h3>
            <!-- Actual scrollspy markup: -->
            <nav id="navbar-example2" class="navbar navbar-light">
                <h4 class="navbar-brand text-dark"> <b><?php echo $_SESSION['name'];?>'s Account Information</b></h4><br>
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link btn-outline-info" href="#userInfo">User info</a></li>
                    <li class="nav-item"><a class="nav-link btn-outline-info" href="#roleInfo">Role info</a></li>
                    <!-- study or teaching Information will show depending on staffid or student id -->
                    <?php if(!empty($_SESSION['stu_id'])){?>
                    <li class="nav-item"><a class="nav-link btn-outline-info" href="#stuInfo">Study info</a></li>
                    <?php
                    }
                    if(!empty($_SESSION['staff_id'])){
                    ?>
                    <li class="nav-item"><a class="nav-link btn-outline-info" href="#teachInfo">Teaching info</a></li>
                    <?php }?>
                </ul>
            </nav>
            <div data-spy="scroll" data-target="#navbar-example2" data-offset="0" class="scrollspy-example">
                <!-- user info verse1 -->
                <p class="text-info" id="userInfo"><b>User info. :</b></p>
                    <div  class="row">
                        <div class="col-sm-6 form-inline">
                            <label  class="col-sm-3" for="username"><b>User name:</b></label>
                            <p class="col-sm-4"><?php echo  $username;?></p>
                            <button class="btn btn-outline-secondary col-sm-4 ml-4" data-toggle="modal" data-target="#changPsd_modal">Change password</button>
                        </div>

                        <div class="col-sm-6 form-inline">
                            <label  class="col-sm-3"  for="DOB"><b>DOB: </b> </label>
                            <input readonly class="form-control" type="text" name="DOB" id="dob" value="<?php echo $DOB;?>" >
                            <button class="btn btn-outline-secondary col-sm-2 ml-2" id="dob_modify" value="dob">Modify</button>
                        </div>
                    </div>
                    <div  class="row">
                        <div class="col-sm-6 form-inline">
                                <label  class="col-sm-3"  for="first_name"><b>First Name: </b> </label>
                                <input readonly class="form-control" type="text" name="firstname" id="fname" value="<?php echo  $fname;?>" >
                                <button class="btn btn-outline-secondary col-sm-2 ml-2 " id="fname_modify" value="fname">Modify</button>
                        </div>
                        <div class="col-sm-6 form-inline">
                                <label   class="col-sm-3" for="last_name"><b>Last Name:</b>  </label>
                                <input  readonly class="form-control" type="text" name="lastname" id="lname" value="<?php echo  $lname;?>" >
                                <button class="btn btn-outline-secondary col-sm-2 ml-2 " id="lname_modify" value="lname">Modify</button>
                        </div>
                    </div>
                    <div  class="row">
                        <div class="col-sm-6 form-inline">
                            <label class="col-sm-3" for="email"><b>Email: </b> </label>
                            <input readonly class="form-control" type="text" name="email" id="email" value="<?php echo  $email;?>" >
                            <button class="btn btn-outline-secondary col-sm-2 ml-2 " id="email_modify" value="email">Modify</button>
                        </div>
                        <div class="col-sm-6 form-inline">
                            <label  class="col-sm-3" for="last_name"><b>Phone No.:</b>  </label>
                            <input readonly class="form-control" type="text" name="phonenum" id="phone" value="<?php echo  $phonenum;?>" >
                            <button class="btn btn-outline-secondary col-sm-2 ml-2 " id="phone_modify" value="phone">Modify</button>
                        </div>
                    </div>
                </div>
                <br>

                <!-- Role info verse2 -->
                <p class="text-info" id="roleInfo"><b>Role info. :</b></p>

                <!-- for student role -->
                <?php
                if(!empty($_SESSION['stu_id'])){
                    $sid=$_SESSION['stu_id'];    //get student ID from $_SESSION
                    $query="SELECT * FROM `student` s JOIN `discipline` d ON s.discipline_id= d.disc_id WHERE s.student_id=$sid;";
                    $result=$mysqli->query($query);
                    if($row =$result->fetch_array(MYSQLI_ASSOC)){
                        $startDate=$row['start_date'];
                        $expireDate=$row['expire_date'];
                        $discName=$row['disc_name'];
                    }
                ?>
                <div  class="row">
                <div class="col-sm-2 ">
                        <label   for="startDate"><b>Student ID:</b></label>
                        <p><?php echo  $sid;?></p>
                    </div>

                    <div class="col-sm-2 ">
                        <label   for="startDate"><b>Start date:</b></label>
                        <p><?php echo  $startDate;?></p>
                    </div>
                    <div class="col-sm-2 ">
                        <label   for="expireDate"><b>Expire date:</b></label>
                        <p><?php echo  $expireDate;?></p>
                    </div>
                    <div class="col-sm-6 ">
                            <label    for="discName"><b>Discipline Name: </b> </label>
                            <p><?php echo  $discName;?></p>
                    </div>
                </div>
                <?php
                }

                //for staff role
                if(!empty($_SESSION['staff_id'])){
                    $sid=$_SESSION['staff_id'];    //get student ID from $_SESSION
                    $query="SELECT * FROM `staff` s JOIN `discipline` d USING (disc_id) WHERE s.staff_id=$sid;";
                    $result=$mysqli->query($query);
                    if($row =$result->fetch_array(MYSQLI_ASSOC)){
                        $role=$row['role'];
                        $exp=$row['expertise'];
                        $qual=$row['qualification'];
                        $discName=$row['disc_name'];
                        $avaDay=$row['ava_day'];
                        $avaStart=$row['ava_start_time'];
                        $avaEnd=$row['ava_end_time'];

                    }
                ?>
                <div  class="row">
                    <div class="col-sm-2 ">
                        <label   for="role"><b>Staff ID:</b></label>
                        <p><?php echo $sid;?></p>
                    </div>
                    <div class="col-sm-1 ">
                        <label   for="role"><b>Role:</b></label>
                        <p><?php echo  $role;?></p>
                    </div>

                    <div class="col-sm-2 ">
                        <label   for="expertise"><b>Expertise:</b></label>
                        <p><?php echo  $exp;?></p>
                    </div>
                    <div class="col-sm-2 ">
                        <label   for="qualification"><b>Qualification:</b></label>
                        <p><?php echo  $qual;?></p>
                    </div>
                    <div class="col-sm-5 ">
                            <label    for="discName"><b>Discipline Name: </b> </label>
                            <p><?php echo  $discName;?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2 ">
                      <label for="">Available hours:</label>
                    </div>
                    <div class="col-sm-2 ">
                      <input readonly class="form-control avaDate" type="text" name="avaDay" id="avaDay" value="<?php echo  $avaDay;?>" >
                    </div>
                    <div class="col-sm-3">
                        <input readonly class="form-control avaDate" type="text" name="avaStart" id="avaStart" value="<?php echo  $avaStart;?>" >
                    </div>
                    <div class="col-sm-3">
                        <input readonly class="form-control avaDate" type="text" name="avaEnd" id="avaEnd" value="<?php echo  $avaEnd;?>" >
                    </div>
                    <div class="col-sm-2 ">
                        <button class="btn btn-outline-secondary  ml-2" id="ava_modify" value="">Modify</button>
                    </div>
                </div>
                <?php
                }
                if(!empty($_SESSION['stu_id'])){
                ?>
                <!-- Study info verse3 -->
                <p class="text-info" id="stuInfo"><b>Study info. :</b></p>
                <table  class="table">
                    <thead>
                        <tr>
                            <th><label>Type</label></th>
                            <th><label >UnitCode</label></th>
                            <th><label >Time Slot</label></th>
                            <th><label >Location</label></th>
                        </tr>
                    </thead>
                <tbody>
                <?php
                //for student activitity
                    $sid=$_SESSION['stu_id'];    //get student ID from $_SESSION
                    $query="SELECT * FROM `study` s
                            JOIN `activity` a
                            ON s.act_id=a.activity_id
                            JOIN `units` u
                            ON a.unit_id=u.id
                            JOIN `location`
                            USING(location_id)
                            WHERE s.student_id=$sid;";
                    $result=$mysqli->query($query);
                    while($row =$result->fetch_array(MYSQLI_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo  $row['type'];?></td>
                        <td><?php echo  $row['unit_code'];?></td>
                        <td><?php echo $row['day'].'('.$row['start_time'].'-'.$row['end_time'].')';?></td>
                        <td><?php echo  $row['campus'].'('.$row['room_name'].')';?></td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                    <?php
                }

                if(!empty($_SESSION['staff_id'])){
                ?>
                <!-- Teaching info verse4 -->
                <p class="text-info" id="teachnfo"><b>Teaching info. :</b></p>
                <table  class="table">
                    <thead>
                        <tr>
                            <th><label>Type</label></th>
                            <th><label >UnitCode</label></th>
                            <th><label >Time Slot</label></th>
                            <th><label >Location</label></th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                //for staff activitity
                    $sid=$_SESSION['staff_id'];    //get staff ID from $_SESSION
                    $query="SELECT * FROM `teach` t
                            JOIN `activity` a
                            ON t.act_id=a.activity_id
                            JOIN `units` u
                            ON a.unit_id=u.id
                            JOIN `location`
                            USING(location_id)
                            WHERE t.staff_id=$sid;";
                    $result=$mysqli->query($query);
                    while($row =$result->fetch_array(MYSQLI_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo  $row['type'];?></td>
                        <td><?php echo  $row['unit_code'];?></td>
                        <td><?php echo  $row['day'].'('.$row['start_time'].'-'.$row['end_time'].')';?></td>
                        <td><?php echo  $row['campus'].'('.$row['room_name'].')';?></td>
                    </tr>
                    <?php
                    }
                    ?>
                        </tbody>
                    <?php
                }

                ?>

            </div>
        </div>

        <!-- Modal for chang password-->
        <div class="modal fade" id="changPsd_modal" tabindex="-1" role="dialog" aria-labelledby="changPsdModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-muted">Password change</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="passwordChange_form"  id="passwordChange_form" method="post" action="../action/psdChange.php">
                            <div class="col-sm-12">
                                <label for="psw1">Current Password: </label>
                                <input class="form-control" type="password" id="oldpsd" name="oldpsd" placeholder="current password..." ><br>
                            </div>
                            <div class="col-sm-12">
                                <label for="psw2">New Password : </label>
                                <input class="form-control" type="password" id="newpsd" name="newpsd" placeholder="new password..." ><br>
                            </div>

                            <div class="modal-footer">
                                <button id="psd_Change_Cfm_btn" class="btn btn-danger" data-dismiss="modal">Change</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>


<script>

//password change
var RegExpPsd= new RegExp("(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^])(?=.{6,12})");
$('#psd_Change_Cfm_btn').click(function(){
    if(!RegExpPsd.test($("#oldpsd").val()))
        alert("Password must contain 6-12 length, Contains at least 1 lower case letter, 1 uppercase letter, 1 number and one of following special characters ! @ # $ % ^");
    else if(!$("#newpsd").val())
        alert("please type the Password");
    else if (!RegExpPsd.test($("#newpsd").val()))
        alert("Password must contain 6-12 length, Contains at least 1 lower case letter, 1 uppercase letter, 1 number and one of following special characters ! @ # $ % ^");
    else if ($("#oldpsd").val()==$("#newpsd").val())
         alert("Passwords do not change");
    else {
        $("#passwordChange_form").submit();
        header("location: ../action/psdChange.php");
    }
})

//modify DOB
bool_dob_modify=false;
$('#dob_modify').click(function(){

    if(bool_dob_modify==false){
        $('#dob').prop("readonly",false);
        bool_dob_modify=true;
        $('#dob_modify').html('Confirm');
    }else if (bool_dob_modify==true){
        bool_dob_modify=false;
        $('#dob_modify').html('Modify');
        $('#dob').prop("readonly",true);

        $.ajax({
            url:'../action/infoChange.php?a=dob&val='+$('#dob').val(),
            method:'GET'
        }).done(function(data) {
            console.log(data);
            location.reload();
        })
    }
})

//modify firstname
bool_fname_modify=false;
$('#fname_modify').click(function(){
    if(bool_fname_modify==false){
        $('#fname').prop("readonly",false);
        bool_fname_modify=true;
        $('#fname_modify').html('Confirm');
    }else if (bool_fname_modify==true){
        bool_fname_modify=false;
        $('#fname_modify').html('Modify');
        $('#fname').prop("readonly",true);

        $.ajax({
            url:'../action/infoChange.php?a=fname&val='+$('#fname').val(),
            method:'GET'
        }).done(function(data) {
            console.log(data);
            location.reload();
        })
    }
})

//modify last name
bool_lname_modify=false;
$('#lname_modify').click(function(){
    if(bool_lname_modify==false){
        $('#lname').prop("readonly",false);
        bool_lname_modify=true;
        $('#lname_modify').html('Confirm');
    }else if (bool_lname_modify==true){
        bool_lname_modify=false;
        $('#lname_modify').html('Modify');
        $('#lname').prop("readonly",true);

        $.ajax({
            url:'../action/infoChange.php?a=lname&val='+$('#lname').val(),
            method:'GET'
        }).done(function(data) {
            console.log(data);
            location.reload();
        })
    }
})


//modify email
bool_email_modify=false;
$('#email_modify').click(function(){
    if(bool_email_modify==false){
        $('#email').prop("readonly",false);
        bool_email_modify=true;
        $('#email_modify').html('Confirm');
    }else if (bool_email_modify==true){
        bool_email_modify=false;
        $('#email_modify').html('Modify');
        $('#email').prop("readonly",true);

        $.ajax({
            url:'../action/infoChange.php?a=email&val='+$('#email').val(),
            method:'GET'
        }).done(function(data) {
            console.log(data);
            location.reload();
        })
    }
})

//modify phone
bool_phone_modify=false;
$('#phone_modify').click(function(){
    if(bool_phone_modify==false){
        $('#phone').prop("readonly",false);
        bool_phone_modify=true;
        $('#phone_modify').html('Confirm');
    }else if (bool_phone_modify==true){
        bool_phone_modify=false;
        $('#phone_modify').html('Modify');
        $('#phone').prop("readonly",true);

        $.ajax({
            url:'../action/infoChange.php?a=phone&val='+$('#phone').val(),
            method:'GET'
        }).done(function(data) {
            console.log(data);
            location.reload();
        })
    }
})

//modify avaHours
bool_avaHours=false;
$('#ava_modify').click(function(){
    if(bool_avaHours==false){
        $('.avaDate').prop("readonly",false);
        bool_avaHours=true;
        $('#ava_modify').html('Confirm');
    }else if (bool_avaHours==true){
        bool_avaHours=false;
        $('#ava_modify').html('Modify');
        $('.avaDate').prop("readonly",true);

        $.ajax({
            url:'../action/infoChange.php?a=ahour&day='+$('#avaDay').val()+'&start='+$('#avaStart').val()+'&end='+$('#avaEnd').val(),
            method:'GET'
        }).done(function(data) {
            console.log(data);
            location.reload();
        })
    }
})




</script>