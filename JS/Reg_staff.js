
var RegExpPsd = new RegExp("(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^])(?=.{6,12})");///^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^])(?=.{6,12})+$/
var RegExpID = new RegExp(/^(\d{8})+$/);
var RegExpPhoneNo = /^(\d{10})+$/;
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;


$("#check").click(function () {
    var staffID = $("#staff_id").val();
    if (!staffID) {
        alert("Please type in 8 digtial id");
    }
    else {
        $.get("../action/check.php",
            {
                role: 'staff',
                id: staffID
            }
        ).done(function (data) {
            $("#output").html(data);
            console.log(data);
        });
    }
});



$("#submit_btn").click(function () {
    if ((!$("#first_name").val()) && ((!$("#last_name").val())))
        alert("please enter your username");
    else if (!RegExpID.test($("#staff_id").val()))
        alert("please enter correct staff id (8 digital)");
    else if (!RegExpPhoneNo.test($("#phone_No").val()))
        alert("please enter correct phone number (10 digital)");
    else if (!(mailformat.test($("#email").val())))
        alert("invalid email address");
    else if ($("#qualification").val() == 0)
        alert("please select qualification");
    else if ($("#expertise").val() == 0)
        alert("please select expertise");
    else if (!RegExpPsd.test($("#psw1").val()))
        alert("Password must contain 6-12 length, Contains at least 1 lower case letter, 1 uppercase letter, 1 number and one of following special characters ! @ # $ % ^");
    else if (!$("#psw2").val())
        alert("please re-type the Password");
    else if ($("#psw2").val() != $("#psw1").val())
        alert("Passwords do not match");
    else if (!$("#agree").prop('checked'))
        alert("you must agree the terms and conditions");
    else $("#Register_form").submit();
})


