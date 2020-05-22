
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
                        <form name="LogIn_form"  method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" >
                            <div class="form-group">
                                <label for="Email">username: </label>
                                <input class="form-control" type="text" id="username0" value="JFan" name="username" placeholder="Your username" required>
                                <label for="psw1">Password: </label>
                                <input class="form-control" type="password" id="psw0" value="Fjc070910@" name="psw" placeholder="Your password" required><br>
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
                        <form action="./action/logout.php" method="GET">
                            <div class="modal-footer">
                                <button type="submit" id="lg_outCfm_btn" class="btn btn-success" data-dismiss="modal" >Log out</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <footer>
        <center>
        <div class="text-light">
            Copy right @ Jingchen fan 2020
        </div>
        </center>
    </footer>
 </body>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../JS/subpage.js"></script>

<?php
    if(isset($_SESSION['name'])){
        //echo "<script>alert('".$_SESSION['session_user']."');</script>" ;
        //echo "<script>alert('".$_SESSION['name']."');</script>" ;
        echo "<script>$('#Logged_banner').html('Hello(".$_SESSION['name'].")');</script>" ;
        //$access= $_SESSION['access'];
        echo "<script>$('.afterlog').show();$('.beforelog').hide(); AccountValid=true;</script>" ;
        echo "<script>var Accesslevel=".$_SESSION['access'].";</script>" ;
       // echo "<script>alert(".$_SESSION['access'].");</script>" ;
    }
?>