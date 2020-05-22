<?php
session_start();
include('../config/db_conn.php'); //db connection
$query = "SELECT `id` ,`unit_code`,`unit_name`,`lecturer`,`semester` FROM `units`;";
$result = $mysqli->query($query);     
?>

<!doctype html>
<head>  <link rel="stylesheet" href="../format/MasterStaff.css"></head>
<html lang="en">
<?php  include('head.php');?>
    <br><br>
    <!-- Staff list  -->
    <div class="container_fluid " id="Staff_ct">
        <h2 class="text-dark">Staff list</h2>          
        <table class="table table-hover bg-secondary" id="Staff_tb">
          <thead>
            <tr>
              <th>Name</th>
              <th>Qualification</th>
              <th>Expertise</th>
              <th>Preferred days of teaching</th>
              <th>Consultation hours</th>
              <th>Current teaching units</th>
              <th id="tut_col">Allocation</th>
            </tr>
          </thead>
          <tbody  id="Staff_body" >
          </tbody>
        </table>
      </div>
      <!-- Modal for staff allcoat-->
      <div class="modal fade" id="alloc_modal" tabindex="-1" role="dialog" aria-labelledby="RegModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-muted">Allocation Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form name="UnitAlloc_form" action=""  onsubmit="">
                      <div class="form-group">
                        <table  class="table secondary">
                          <thead>
                            <tr>
                              <th><label for="UnitCode">UnitCode: </label></th>
                              <th><label for="campus">Campus: </label></th>
                              <th><label for="studyPeriod">Semester: </label></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <select class="custom-select " id="UnitCode" name="UnitCode">
                                <!-- ajax request  -->
                                </select>
                              </td>
                              <td>
                                <select class="custom-select " id="campus" name="campus">
                                  <option selected value="Pandora">Pandora</option>
                                  <option value="Rivendell">Rivendell</option>
                                  <option value="Neverland">Neverland</option>
                                </select>
                              </td>
                              <td>
                                <select class="custom-select " id="studyPeriod" name="studyPeriod">
                                  <option selected value="Semester 1">Semester 1</option>
                                  <option value="Semester 2">Semester 2</option>
                                  <option value="Winter School">Winter School</option>
                                  <option value="Spring School">Spring School</option>
                                </select>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
              
                      <div class="row">
                        <p class="col-sm"><b>Category</b></p>
                        <label class="form-check form-check-label col-sm DConly">
                          <input type="radio" class="form-check-input DConly" name="roleSelect" id="radio_UC" value="unit coordinator">UC
                        </label>
                        <label class="form-check form-check-label col-sm">
                          <input type="radio" class="form-check-input" name="roleSelect" id="radio_lec" value="lecture">Lecture
                        </label>
                        <label class="form-check form-check-label col-sm">
                          <input type="radio" class="form-check-input" name="roleSelect"  id="radio_tut" value="tutor">Tutorial
                        </label>
                      </div>
                      <div id="timeAlloc">
                        <!-- allocate lecture and tutorial will show data  -->
                      </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button  id="btn_alloc_cfm" class="btn btn-success" data-dismiss="modal">Comfirm</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
              
          </div>
        </div>
      </div>

      <!-- Modal for staff reomve-->
      <div class="modal fade" id="remv_modal" tabindex="-1" role="dialog" aria-labelledby="RegModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-muted">Current Allocation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="UnitAlloc_form" action="staffAlloc.php"  onsubmit="">
                        <div class="form-group">
                          <table  class="table secondary">
                            <thead>
                              <tr>
                                <th><label for="UnitCode"># </label></th>
                                <th><label for="Category">Category</label></th>
                                <th><label for="UnitCode">UnitCode</label></th>
                                <th><label for="studyPeriod">Time Slot</label></th>
                                <th><label for="Location">Location</label></th>
                              </tr>
                            </thead>
                            <tbody id="current_alloc">
                             
                            </tbody>
                          </table>
                        </div>
                    </form>
               </div>
               <div class="modal-footer">
                <button type="submit" id="btn_alloc_remv_cfm" class="btn btn-danger">Comfirm</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               </div>
          </div>
        </div>
      </div>

<?php  include('foot.php');?>
</html>

<script>

function showData(){           //staff list table ajax request
        $.ajax({
            url: '../action/MasterStaffData.php?a=view',
            method:'GET' 
        }).done(function(data) {
            // show staff list
            $('#Staff_body').html(data);
             // request data in  allocation model
            $('.btn_alloc').click(function(){
              staff_id=this.id;  //btn_id is the staff_id
              $.ajax({
                      url: '../action/MasterStaffData.php?a=DCalloc',
                      method:'GET' 
                  }).done(function(data) {
                      $('#UnitCode').html(data);
                  })
              //clear lecture timeslot  when select UC
              $('#radio_UC').click(function(){   
                role="UC";
                $('#timeAlloc').html('');   
              });

              //show lecture timeslot in staff allocation model
              $('#radio_lec').click(function(){
                role="lec";
                $.ajax({
                      url: '../action/MasterStaffData.php?a=lectime&ucode='+$('#UnitCode').val()+'&cam='+$('#campus').val()+'&period='+$('#studyPeriod').val(),
                      method:'GET' 
                  }).done(function(data) {
                    $('#timeAlloc').html(data);    
                  })    
              });

              //show tutorial timeslot in staff allocation model 
              $('#radio_tut').click(function(){ 
                role="tut";
                $.ajax({
                      url: '../action/MasterStaffData.php?a=tuttime&ucode='+$('#UnitCode').val()+'&cam='+$('#campus').val()+'&period='+$('#studyPeriod').val(),
                      method:'GET' 
                  }).done(function(data) {
                    $('#timeAlloc').html(data); 
                  })    
              });

              $('#btn_alloc_cfm').click(function(){ 
                $.ajax({
                    url: '../action/staffAlloc.php?a=add&sid='+staff_id+'+&ucode='+$('#UnitCode').val()+'&cam='+$('#campus').val()+'&period='+$('#studyPeriod').val()+'&role='+role+'&actID='+$('#allocTime').val(),
                    method:'GET' 
                  }).done(function(data) {
                    console.log(data); 
                    location.reload();
                  }) 
              });        
            });


            // request data in  remove unit model
            $('.btn_remv').click(function(){
              staff_id=this.id;  //btn_id is the staff_id
              $.ajax({
                      url: '../action/MasterStaffData.php?a=DCremv&sid='+staff_id,
                      method:'GET' 
                  }).done(function(data) {
                      $('#current_alloc').html(data);
                      //remove modal confirm button
                      $('#btn_alloc_remv_cfm').click(function(){
                        if($("#alloc_selected"). prop("checked"))
                        {
                          //alert($("#alloc_selected").val());
                          $.ajax({
                            url: '../action/staffAlloc.php?a=remv&sid='+staff_id+'+&actID='+$("#alloc_selected").val(),
                            method:'GET' 
                          }).done(function(data) {
                            console.log(data); 
                            location.reload();

                          }) 
                        }else {
                          alert("please choose a option!");

                        }

                      })

              


                  })
            })
        });    
    }
 
//default: DC log in
$(function(){

    //log out 
    $("#lg_out").click(function(){
        AccountValid=false;
        $(".afterLog").hide();
        $(".beforeLog").show();
       // window.setTimeout("window.location='../index.html'", 0); //log out return to main page
    });

    //DClog in 
    $("#DC_btn").click(function(){
      AccountValid=true;
      $(".afterLog").show();
      $(".beforeLog").hide();
      $("#Logged_banner").text("Hello (DC)");
      $("#Staff_body").empty();
      $.ajax({
        type:'GET',
        dataType: 'json',
        url:jsonDateSrc,
        success:function(data){
          $.each(data, function(i,staff){
              $("#Staff_body").append("<tr><td>"+staff.Name +"</td><td>"+staff.qualification +"</td><td>"+staff.expertise +"</td><td>"+staff.preferDay+"</td><td>"+staff.consult_time+"</td><td>None</td><td><div class=\"row\"><button class=\"btn btn-warning btn_alloc\" data-toggle=\"modal\" data-target=\"#alloc_modal\">Allocate</button><button class=\"btn btn-danger no_techUnit\">Remove</button></div></td></tr>");
          });
       }
      });
    });

    //UC log in 
    $("#UC_btn").click(function(){
      AccountValid=true;
      $(".afterLog").show();
      $(".beforeLog").hide();
      $(".DConly").hide();
      
       $("#Logged_banner").text("Hello (UC)");
       $("#Staff_body").empty();
       $.ajax({
        type:'GET',
        dataType: 'json',
        url:jsonDateSrc,
        success:function(data){
          $.each(data, function(i,staff){
              if(i<2)   //less staff to allocate ,different access right
              $("#Staff_body").append("<tr><td>"+staff.Name +"</td><td>"+staff.qualification +"</td><td>"+staff.expertise +"</td><td>"+staff.preferDay+"</td><td>"+staff.consult_time+"</td><td>None</td><td><div class=\"row\"><button class=\"btn btn-warning btn_alloc\" data-toggle=\"modal\" data-target=\"#alloc_modal\">Allocate</button><button class=\"btn btn-danger no_techUnit\">Remove</button></div></td></tr>");
          });
       }
      });
     
    });
});

</script>