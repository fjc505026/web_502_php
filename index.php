<?php
include('./config/db_conn.php');
session_start();
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
        </div>
    <?php  include('templates/footer.php');?>
</html>
