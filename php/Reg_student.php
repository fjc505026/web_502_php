<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
    <link rel="stylesheet" href="../format/Reg.css">
    <title>Registration</title>
</head>
<body class="jumbotron">
    <form name="Register_form" onclick="validateFunc()" >
        <div class="container">
            <div name="Register_form" class="form-group">
                <fieldset>
                    <h3><a href="../index.php"><i class="fas fa-home text-dark"></i></a></h3>
                    <h1></i>Create an new account</h1><br> 
                    <div class="row">
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
                            <label for="student_id">Student ID: </label>
                            <input class="form-control" type="text" name="student_id" id="student_id" placeholder="Student ID" >
                        </div>
                        <div class="col-sm-6">
                            <label for="phone_No">Phone number: </label>
                            <input class="form-control" type="text" name="phone_No" id="phone_No" placeholder="Phone number...">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="DOB">DOB:</label>
                            <input type="date" class="form-control" id="DOB" name="DOB" >
                        </div>
                        <div class="col-sm-6">
                            <label for="Email">Email address: </label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="Your Email address" ><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="psw1">Password: </label>
                            <input class="form-control" type="password" id="psw1" name="psw" placeholder="Your password" >

                        </div>
                        <div class="col-sm-6">
                            <label for="psw2">Comfirm Password: </label>
                            <input class="form-control" type="password" id="psw2" name="psw" placeholder="Your password" >
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
                            <button type="submit" class="btn btn-primary" id="submit_btn" >Submit</button>
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
<script type="text/javascript" src="../JS/Reg_student.js"></script>
</html>
    
