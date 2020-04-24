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
        <form name="Register_form"  method="post" onsubmit="validateFunc()">
            <div class="container">
                <div name="Register_form" class="form-group">
                    <fieldset>
                         <h3><a href="../index.php"><i class="fas fa-home text-dark"></i></a></h3>
                        <h1>Create an new account</h1><br> 
                        <div  class=row>
                            <div class="col-sm-6">
                                <label for="first_name">First Name: </label>
                                <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First Name..." >
                            </div>
                            <div class="col-sm-6">
                                <label for="last_name">Last Name: </label>
                                <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last Name..." >
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="staff_id">Staff ID: </label>
                                <div class="form-inline">
                                    <input class="form-control col-sm-6"  type="text" name="staff_id" id="staff_id" placeholder="Staff ID" > 
                                    <button class="btn btn-secondary col-sm-2 ml-2" id="check">Check</button>
                                    <label class="ml-2" id="output" for="staff_id"></label>
                                </div>
                                
                            </div>
                            <div class="col-sm-6">
                                <label for="phone_No">Phone number: </label>
                                <input class="form-control" type="text" name="phone_No" id="phone_No" placeholder="Phone number...">
                            </div>
                        </div>
                        <br>
                        <label for="Email">Email address: </label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="Your Email address" >
                        <div class="row">
                            <div class="col-sm-6">
                            <label class="mr-sm-2" for="qualification">Qualification</label>
                            <select class="custom-select mr-sm-2" id="qualification">
                            <option value="0" selected>Choose...</option>
                            <option value="PhD">PhD</option>
                            <option value="Master">Master</option>
                            <option value="Bachlor">Bachlor</option>
                            <option value="Other">Other...</option>
                            </select>
                            </div>
                            <div class="col-sm-6">
                            <label class="mr-sm-2" for="expertise">Expertise</label>
                            <select class="custom-select mr-sm-2" id="expertise">
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
                                <input class="form-control" type="password" id="psw1" name="psw" placeholder="Your password" ><br>
                            </div>
                            <div class="col-sm-6">
                                <label for="psw2">Comfirm Password : </label>
                                <input class="form-control" type="password" id="psw2" name="psw2" placeholder="Comfirm password" ><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address 2</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                            </div>
                            <div class="form-group col-md-2">
                            <label for="inputZip">Postcode</label>
                            <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <br>
                        <div class="text-center"> 
                            I agree to the terms and conditions 
                            <input type="checkbox" name="checkbox" value="check" id="agree"><br>
                            <br>
                            <div>
                                <button type="submit" class="btn btn-primary" id="submit_btn">Submit</button>
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
<script type="text/javascript" src="../JS/Reg_staff.js"></script>
</html>
    
