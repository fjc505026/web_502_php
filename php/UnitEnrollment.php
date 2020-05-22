<?php
session_start();
include('../config/db_conn.php'); //db connection
echo "<script> sid=".$_SESSION['stu_id'].";</script>"
?>

<!doctype html>
<head> <link rel="stylesheet" href="../format/UnitEnrollment.css"></head>
<html lang="en">
    <?php  include('head.php');?>
    <title>Unit Enrolment</title>
  
    <div class="row" id="filterGroup">
            <div class="col-sm-3">
                <label class="mr-sm-2 text-secondary" for="campus"><b>Filter by campus</b></label>
                <select class="custom-select mr-sm-2" id="campus">
                    <option selected value="0">Choose...</option>
                    <option value="Pandora">Pandora</option>
                    <option value="Rivendell">Rivendell</option>
                    <option value="Neverland">Neverland</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label class="mr-sm-2 text-secondary" for="studyPeriod"><b>Filter by periods</b></label>
                <select class="custom-select mr-sm-2" id="studyPeriod">
                    <option selected value="0">Choose...</option>
                    <option value="Semester 1">Semester 1</option>
                    <option value="Semester 2">Semester 2</option>
                    <option value="Winter School">Winter School</option>
                    <option value="Spring School">Spring School</option>
                </select>
            </div>
        </div> 

        <!-- UnitEnrollment table  -->
        <div class="container" id="UnitEnrol_ct">
            <h2 class="text-muted">Unit Available</h2>          
            <table class="table table-hover bg-secondary" id="UnitEnrol_tb">
                <thead>
                <tr>
                    <th>Unit code</th>
                    <th>Unit coordinator</th>
                    <th>Lecturer</th>
                    <th>Description</th>
                    <th>campus</th>
                    <th>study periods</th>
                    <th class="act_btn">Action</th>
                </tr>
                </thead>
                <tbody id="UnitEnrol_body">
                </tbody>
            </table>
        </div>

        <!-- Modal for enroll-->
        <div class="modal fade" id="enroll_modal" tabindex="-1" role="dialog" aria-labelledby="enrollModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-muted">Enrollment</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Are you sure to enroll this unit?</h3>
                        <div class="modal-footer">
                            <button type="submit" id="enrollCfm_btn" class="btn btn-success" data-dismiss="modal">Continue to enroll</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Determine later</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal for withdraw-->
        <div class="modal fade" id="withdra_modal" tabindex="-1" role="dialog" aria-labelledby="withdrawModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-muted">Withdraw unit</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>Are you sure to withdraw this unit?</h3>
                        <div class="modal-footer">
                            <button type="submit" id="withdrawCfm_btn" class="btn btn-danger" data-dismiss="modal">Withdraw</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    <?php  include('foot.php');?>
</html>



<script>
    var last_campus_value='*'; 
    var last_period_value='*';
    var rowID_selected;

    function showData(){           //ajax request
        $.ajax({
            url: '../action/UnitEnrolldata.php?a=view',
            method:'GET' 
        }).done(function(data) {
            $('tbody').html(data);
            if(Accesslevel==0)
                $('.act_btn').hide();
            else  $('.act_btn').show();

            $('.en_btn').click(function(){
                actID_selected=this.id;
            });

            $('.wd_btn').click(function(){
                    actID_selected=this.id;
            });
        }) 
    };

    $('.custom-select').click(function(){
        var campus_value=$('#campus').val();
        var period_value=$('#studyPeriod').val();
        if(campus_value!=last_campus_value||period_value!=last_period_value)
        {
            var str_value="&cam="+campus_value+"&per="+period_value;
            var str ='../action/UnitEnrolldata.php?a=filter'+str_value;
            //alert(str);
            $.ajax({
                url:str ,
                method:'GET' 
            }).done(function(data) {
                //console.log(data);
                $('tbody').html(data);
                if(Accesslevel==0)
                    $('.act_btn').hide();
                else  $('.act_btn').show();
            })     
        }
        last_campus_value=campus_value;
        last_period_value=period_value;
    });

 
   
    $(function() {
        $('#enrollCfm_btn').click(function(){
            var str_value="&sid="+sid+"&actid="+actID_selected;
            var str ='../action/UnitEnrolldata.php?a=enroll'+str_value;
            //alert(str);
            $.ajax({
                url:str ,
                method:'GET' 
            }).done(function(data) {
                //console.log(data);
                $('tbody').html(data);
                if(Accesslevel==0)
                    $('.act_btn').hide();
                else  $('.act_btn').show();
               
            });
            window.location.href="./UnitEnrollment.php";     
        });

        
        $('#withdrawCfm_btn').click(function(){
            var str_value="&sid="+sid+"&actid="+actID_selected;
            var str ='../action/UnitEnrolldata.php?a=wtd'+str_value;
            //alert(str);
            $.ajax({
                url:str ,
                method:'GET' 
            }).done(function(data) {
                //console.log(data);
                $('tbody').html(data);
                if(Accesslevel==0)
                    $('.act_btn').hide();
                else  $('.act_btn').show();
               
            });
            window.location.href="./UnitEnrollment.php";    
        });
    });

</script> 




     

