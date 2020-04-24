<?php
   if(isset($_POST['submit'])){
      echo $_POST['email'];
      echo $_POST['psw'];
   }
?>

<!doctype html>
<html lang="en">
    <?php  include('templates/header.php');?>

    <div class="jumbotron big-banner">
            <div>
                <div class="col-sm-12">
                    <h1  id="Uni_name">The University of DoWell in Wonderland</h1><br>
                </div>  
                <div class="col-sm-12">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <br><br><br>
                </div>
                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary">Unit Enrolment</button>
                    <button type="button" class="btn btn-success">Handbook</button>
                    <button type="button" class="btn btn-success">MyTimetable</button>
                    <br><br>
                </div>
            </div>
        </div>
        <img id="robot" src="images/robot1.jfif" alt="" data-toggle="tooltip" title="Need help?">
        <!-- banner2 -->
        <div class="jumbotron" id="big-banner1">
        </div>
        <!-- banner3 -->
        <div class="jumbotron" id="big-banner2">
                <div class="text-light" id="cpright">@Copyright 2020 geunis</div>
        </div>

        <!-- Modal for Register-->
        <div class="modal fade" id="roleSelect" tabindex="-1" role="dialog" aria-labelledby="logInModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logInModalLabel">Role Selection</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3> You are student or staff?</h3>
                </div>
                <div class="modal-footer">
                    <a href="php/Reg_student.php" class="btn btn-success text-white"><b>Student</b></a>
                    <a href="php/Reg_staff.php" class="btn btn-warning text-white"><b>Staff</b></a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Modal for log in-->
        <div class="modal fade" id="log_modal" tabindex="-1" role="dialog" aria-labelledby="RegModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-muted">Log in</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="LogIn_form" action="index.php"  method="GET"  onsubmit="checkLoginValid()">
                            <div name="LogIn_form" class="form-group">
                                <label for="Email">Email address: </label>
                                <input class="form-control" type="email" id="email0" value="demo@gmail.com" name="email" placeholder="Your Email address" required>
                                <label for="psw1">Password: </label>
                                <input class="form-control" type="password" id="psw0" value="Demo1234@" name="psw" placeholder="Your password" required><br>
                                <div class="modal-footer">
                                    <button type="submit" id="SignIn_btn" class="btn btn-success" data-dismiss="modal">sign in</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal for logout-->
        <div class="modal fade" id="logout_modal" tabindex="-1" role="dialog" aria-labelledby="logOutModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-muted">Log Out</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Are you sure to log out?</h3>
                        <div class="modal-footer">
                            <button type="submit" id="lg_outCfm_btn" class="btn btn-success" data-dismiss="modal">Log out</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
            </div>
        </div>
    <?php  include('templates/footer.php');?>
</html>