<?php
//include the file session.php
include("session.php");

//if there is any received error message 
if(isset($_GET['error']))
{
	$errormessage=$_GET['error'];
	//show error message using javascript alert
	echo "<script>alert('$errormessage');</script>";
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
        <title>Registration</title>
    </head>
    <body class="jumbotron">
    <!-- action ="../action/staffsubmit.php" -->
        <form name="Register_form"  id="Register_form" method="post" action="../action/Reg_acc_submit.php">
            <div class="container">
                <div name="Register_form" class="form-group">
                    <fieldset>
                         <h3><a href="../index.php"><i class="fas fa-home text-dark"></i></a></h3>
                        <h1>Create an new account</h1><br> 
                        <div  class=row>
                            <div class="col-sm-6">
                                <label for="first_name">First Name: </label>
                                <input class="form-control" type="text" name="firstname" id="first_name" placeholder="First Name..." >
                            </div>
                            <div class="col-sm-6">
                                <label for="last_name">Last Name: </label>
                                <input class="form-control" type="text" name="lastname" id="last_name" placeholder="Last Name..." >
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="staffID">Staff ID: </label>
                                <div class="form-inline">
                                    <input class="form-control col-sm-6"  type="text" name="staffID" id="staff_id" placeholder="Staff ID" > 
                                    <input class="btn btn-secondary col-sm-2 ml-2" id="check" value="Check"></input>
                                    <label class="ml-2" id="output" for="staffID"></label>
                                </div>
                                
                            </div>
                            <div class="col-sm-6">
                                <label for="phone_No">Phone number: </label>
                                <input class="form-control" type="text" name="phonenum" id="phone_No" placeholder="Phone number...">
                            </div>
                        </div>
                        <br>
                        <label for="Email">Email address: </label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="Your Email address" >
                        <div class="row">
                            <div class="col-sm-6">
                            <label class="mr-sm-2" for="qualification">Qualification</label>
                            <select class="custom-select mr-sm-2" id="qualification" name="qual">
                            <option value="0" selected>Choose...</option>
                            <option value="PhD">PhD</option>
                            <option value="Master">Master</option>
                            <option value="Bachlor">Bachlor</option>
                            <option value="Other">Other...</option>
                            </select>
                            </div>
                            <div class="col-sm-6">
                            <label class="mr-sm-2" for="expertise">Expertise</label>
                            <select class="custom-select mr-sm-2" id="expertise" name="exper">
                            <option value="0" selected>Choose...</option>
                            <option value="Information Systems">Information Systems</option>
                            <option value="Human Computer Interaction">Human Computer Interaction</option>
                            <option value="Network Administration">Network Administration</option>
                            <option value="Other">Other...</option>
                            </select>
                            </div>
                        </div>
                        <br>
                        <div  class="row">
                            <div class="col-sm-6">
                                <label for="psw1">Password: </label>
                                <input class="form-control" type="password" id="psw1" name="psw1" placeholder="Your password" ><br>
                            </div>
                            <div class="col-sm-6">
                                <label for="psw2">Comfirm Password : </label>
                                <input class="form-control" type="password" id="psw2" name="psw2" placeholder="Comfirm password" ><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" name="Adr1" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address 2</label>
                            <input type="text" class="form-control" id="inputAddress2" name="Adr2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity" name="city" >
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control" name="State">
                                <option selected>Choose...</option>
                                <option value="NSW">NSW</option>
                                <option value="VIC">VIC</option>
                                <option value="QLD">QLD</option>
                                <option value="WA">WA</option>
                                <option value="TAS">TAS</option>
                                <option value="SA">SA</option>
                                <option value="ACT">ACT</option>
                                <option value="NT">NT</option>
                            </select>
                            </div>
                            <div class="form-group col-md-2">
                            <label for="inputPcode">Postcode</label>
                            <input type="text" class="form-control" id="inputPcode" name="Pcode">
                            </div>
                        </div>
                        <br>
                        <div class="text-center"> 
                            I agree to the terms and conditions 
                            <input type="checkbox" name="checkbox" value="check" id="agree"><br>
                            <br>
                            <div>
                            <input type="button" value="Submit" class="btn btn-primary" id="submit_btn"></input>
                                <a type="button" class="btn btn-danger" href="../index.php"> Close</a>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </form>
    </body> 

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../JS/reg_staff.js"></script>
</html>
    
