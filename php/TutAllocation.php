<?php 


?>

<!doctype html>
<head> <link rel="stylesheet" href="../format/Timetable.css"></head>
<html lang="en">
    <?php  include('../templates/header.php');?>
   
        <br>
        <br>
        <!-- Tutoral allocation -->
        <div class="container" id="tutAlloc_ct">
            <form action="">
                <h2 class="text-muted">Tutoral Allocation System</h2>          
                <table class="table table-hover bg-secondary" id="tutAlloc_tb">
                <thead>
                    <tr>
                    <th>Unit code</th>
                    <th>Lecture time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td id="hUnitCode"></td>
                    <td id="hUnitLecTime"></td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                    <th>Tutoral time</th>
                    <th>Tutoral room</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>
                        <select class="custom-select mr-sm-2" id="Tut_time">
                        <option selected>Choose...</option>
                        <option value="1" id="hTut1"></option>
                        <option value="2" id="hTut2"></option>
                    </td>
                    <td id="Tut_location">room</td>
                    </tr>
                </tbody>
                </table>
                <div class="text-center">
                    <button type="submit" id="enroll_btn" class="btn btn-success">enroll</button>
                    <a type="button" class="btn btn-danger" href="Timetable.php"> Close</a>
                </div>
            </form> 
        </div>
   
<?php  include('../templates/footer.php');?>
</html>
