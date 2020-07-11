var RegExpPsd = new RegExp("(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^])(?=.{6,12})");

if (AccountValid == null) var AccountValid = false;
if (Accesslevel == null) var Accesslevel = 0;

$(document).ready(function () {

  $(".priority").on('click', function () {

    //alert( Accesslevel);
    if (Accesslevel > 0) {
      $("#MyTimetable_hylink").attr("href", "./php/Timetable.php");
      $("#MasterStaff_hylink").attr("href", "./php/MasterStaff.php");
      $("#MasterUnit_hylink").attr("href", "./php/MasterUnits.php");
    }
    else
      alert("please log in your account!")
  });

  $("#SignIn_btn").click(function () {
    if (!$("#username0").val())
      alert("please type in username");
    else if (!RegExpPsd.test($("#psw0").val()))
      alert("Password must contain 6-12 length, Contains at least 1 lower case letter, 1 uppercase letter, 1 number and one of following special characters ! @ # $ % ^");
    else {
      var username = $("#username0").val();
      var password = $("#psw0").val();

      $.ajax('./action/login.php', {
        type: 'POST',  // http method
        data: { username: username, psw: password },  // data to submit
        success: function (data, status, xhr) {
          console.log(data);
          if (data.indexOf("true") != -1) {
            AccountValid = true;
            $(".afterlog").show();
            $(".beforelog").hide();
            window.location.href = "./index.php"
          } else {
            alert("Invalid password!");
          }
        },
        error: function (jqXhr, textStatus, errorMessage) {
          alert('Error' + errorMessage);
        }
      });
    }
  })


  $("#lg_outCfm_btn").click(function () {
    AccountValid = false;
    $(".afterlog").hide();
    $(".beforelog").show();
    window.location.href = "./action/logout.php"
  });


});
