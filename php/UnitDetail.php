<?php
session_start();
include('../config/db_conn.php'); //db connection
//request all units info
$query = "SELECT `id` ,`unit_code`,`unit_name`,`lecturer`,`semester` FROM `units`;";
$result = $mysqli->query($query);
?>

<!doctype html>
<head> <link rel="stylesheet" href="../format/UnitDetail.css"></head>
<html lang="en">
    <?php  include('head.php');?>
  <!-- UnitDetail table  -->
  <div class="container" id="Unit_ct">
    <h2 class="text-muted">Unit Details</h2>
    <table class="table table-hover bg-secondary" id="Unit_tb">
      <thead>
        <tr>
          <th>Unit code</th>
          <th>Unit name</th>
          <th>Unit coordinator</th>
          <th>lecturer</th>
          <th>Available semester and campus</th>
        </tr>
      </thead>

      <tbody id="Unit_body">

      </tbody>
    </table>
  </div>

  <?php  include('foot.php');?>
  <script type="text/javascript" src="../JS/#.js"></script>
</html>

<script>
function showData(){           //ajax request
        $.ajax({
            url: '../action/UnitDetailData.php',
            method:'GET'
        }).done(function(data) {
            $('#Unit_body').html(data);
            // when click the unit row, show the detail view
            $(".brief-view").click(function(){
              if($(this).next().is(":hidden")) {
                  $(this).next().show();
                  $(this).next().next().show();}
              else {
                  $(this).next().hide();
                  $(this).next().next().hide();}
            });
        })
    };

</script>