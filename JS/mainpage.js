var RegExpPsd= new RegExp("(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^])(?=.{6,12})");
//var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  

// var defaultEmail="demo@gmail.com";
// var defaultpassword="Demo1234@";
var defaultName="fan";
var AccountValid=false;

$(document).ready(function() {

  $(".priority").on('click',function () {
    AccountValid=true;  //for debug
    if(AccountValid){ 
      $("#MyTimetable_hylink").attr("href","../php/Timetable.php");
      $("#MasterStaff_hylink").attr("href","../php/MasterStaff.php");
      $("#MasterUnit_hylink").attr("href","../php/MasterUnits.php");
    }
    else
      alert("please log in your account!")    
  });

  $("#SignIn_btn").click(function(){
   
    if(!$("#username0").val()) 
        alert("please type in username");
    else if(!RegExpPsd.test($("#psw0").val()))
        alert("Password must contain 6-12 length, Contains at least 1 lower case letter, 1 uppercase letter, 1 number and one of following special characters ! @ # $ % ^");
    else { 
        var username= $("#username0").val();
        var password =$("#psw0").val();
        $.ajax('./action/login.php', {
          type: 'POST',  // http method
          data:{username: username, psw:password},  // data to submit
          success: function (data, status, xhr) {
              //alert('status: ' + status + ', data: ' + data);
              alert("log in success");    
              AccountValid=true;
             // $("#Logged_banner").text("Hello ("+defaultName+")");
              $(".afterlog").show();
              $(".beforelog").hide();
          },
          error: function (jqXhr, textStatus, errorMessage) {
            alert('Error' + errorMessage);
          }
      });

    }
  })



  $("#lg_outCfm_btn").click(function(){
        AccountValid=false;
        $("#Logged_banner").text("");
        $("#lg_btn").show();
        $("#rg_btn").show();
        $("#lg_out").hide();
   });

     
 });
    