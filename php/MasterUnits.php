<?php
session_start();
include('../config/db_conn.php'); //db connection
$query = "SELECT `id` ,`unit_code`,`unit_name`,`lecturer`,`semester` FROM `units`;";
$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<head> <link rel="stylesheet" href="../format/#.css"></head>
<html lang="en">
    <?php  include('head.php');?>
    <br><br>

    <!-- UnitDetail table  -->
    <div class ="container">
        <h2 align ="center">Unit Master list</h2>
        <!-- <a href="tute7_main.php"> Back to Main</a> -->
        <button class="btn btn-dark float-right"  data-toggle="modal" data-target="#search_modal">Search</button>

        <table class="table table-striped table-hover" id="Unit_tb">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Unit Code</th>
                    <th>Unit Name</th>
                    <th>Unit Coordinator</th>
                    <th>Semester</th>
                </tr>
            </thead>
            <tbody> </tbody>
        </table>
        <button class="btn btn-primary float-right" id="mange_btn" onClick="'">Manage Unit Details</button>
    </div>
<?php include('../action/searchModal.php'); ?>
<?php  include('foot.php');?>
</html>
<script>
    function showData(){           //ajax request
        $.ajax({
            url: '../action/process.php?a=view',
            method:'GET'
        }).done(function(data) {
            $('tbody').html(data);
        })
    };

    //Modal dialog Return key to exec search function
    function returnKeySearch(){
        if (event.keyCode==13)
        $("#Search_btn").click();
    }

    $("#mange_btn").click(function(){
        if(Accesslevel<4)    // only DC can accesss
        alert("you do not have the access right");
        if(Accesslevel>=4)
        window.location.href="./MasterUnits_manage.php";
    });

    // search button to call Process.php
    $("#Search_btn").click(function(){
        $var1= $("#searchVal").val();
        if(!$var1){
            alert("please input search content!");
            return false;
        }
        else{
        $str="../action/process.php?a=search&s="+$var1;       //added by adding variable at the end of url
        $.ajax({
                url: $str,
                method:'GET'
                //,data:$var1,       //add by ajax type
                // dataType:"html"
                //success:function(output){if (output!="No"){$('#showContent').html(data);} else {alert {"No result!"}}}
            }).done(function(data) {
                console.log(data);
                $('#searchBar').hide();
                $('#showContent').html(data);
            })
        }
    })

    // close button to initalise search bar interface
    $(".modalClose").click(function (){
        $('#showContent').html("");
            $('#searchBar').show();

    })
</script>


