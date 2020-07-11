<?php
session_start();

//get roles from $_SESSION
?>

<!doctype html>
<head> <link rel="stylesheet" href="../format/UnitMgnt.css"></head>
<html lang="en">
  <?php  include('head.php');?>
  <!-- Unit Management table  -->
  <div class="container" id="UnitMagmnt_ct">
    <h2 class="text-light">Unit Management</h2>
    <table class="table table-hover bg-dark" id="UnitMagmnt_tb">
      <thead>
        <tr>
          <th>Unit Code</th>
          <th>Unit Coordinator</th>
          <th>Unit Name</th>
          <th> </th>
        </tr>
      </thead>
      <tbody id="unit_body">

      </tbody>
    </table>
  </div>

    <!-- UnitDetail modal -->
    <div class="modal fade" id="UnitDetail" tabindex="-1" role="dialog" aria-labelledby="UnitDetailLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="UnitDetailLabel">Unit staff allocation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th style="width:20%;">Lecutrer(staffID)</th>
                <th>Day</th>
                <th>Start</th>
                <th>End</th>
                <th>Semester</th>
                <th>location</th>
                <th>Consulting</th>
                <th> </th>
              </tr>
            </thead>
            <tbody id="lecturer_info">
              <tr class="sub-view">
                <td>Jack</td>
                <td>DAY start-end</td>
                <td>S1</td>
                <td>newham</td>
                <td>DAY start-end</td>
              </tr>
            </tbody>
            <thead>
              <tr>
                <th style="width:20%;">Tutor(staffID)</th>
                <th>Day</th>
                <th>Start</th>
                <th>End</th>
                <th>Semester</th>
                <th>Location</th>
                <th>Consulting</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="tutor_info">
              <tr class="sub-view">
                <td>Jack</td>
                <td>DAY start-end</td>
                <td>S1</td>
                <td>newham</td>
                <td>DAY start-end</td>
              </tr>
            </tbody>
          </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>
  <?php  include('foot.php');?>
</html>

<script>
function showData(){           //ajax request
  $.ajax({
    url: '../action/UnitMgntData.php?a=unit',
    method:'GET'
  }).done(function(data) {
    //console.log(data);
    //show unit managment table data
    $('#unit_body').html(data);
    //request data in unit detail modal
    $('.unitDetail_btn').click(function(){
      unitID=this.id;
      //update the lecturer info.
      $.ajax({
        url: '../action/UnitMgntData.php?a=lec&uid='+unitID,
        method:'GET'
      }).done(function(data){
        $('#lecturer_info').html(data);
      })

      //update the tutor info.
      $.ajax({
        url: '../action/UnitMgntData.php?a=tut&uid='+unitID,
        method:'GET'
      }).done(function(data){
        $('#tutor_info').html(data);
         //chang button send the information
         $('.act_edit').click(function(){
              actID=this.value;
              LecName='#'+actID+'LecName';
              LecDay='#'+actID+'LecDay';
              LecStart='#'+actID+'LecStart';
              LecEnd='#'+actID+'LecEnd';
              LecSemester='#'+actID+'LecSemester';
              LecCampus='#'+actID+'LecCampus';
              LecConsult='#'+actID+'LecConsult';
              $.ajax({
                url: '../action/UnitMgnt_unitChange.php?a='+actID+'&b='+$(LecName).val()+'&c='+$(LecDay).val()+'&d='+$(LecStart).val()+'&e='+$(LecEnd).val()+'&f='+$(LecSemester).val()+'&g='+$(LecCampus).val()+'&h='+$(LecConsult).val(),
                method:'GET'
              }).done(function(data){
                console.log(data);
                location.reload();
              })

         })
      })

    });
  })

}

</script>
