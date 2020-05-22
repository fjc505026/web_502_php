
var RegExpPsd= new RegExp("(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^])(?=.{6,12})");///^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^])(?=.{6,12})+$/
var RegExpID=  new RegExp (/^(\d{6})+$/);
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  


// function for checking the duplicate ID
$("#check").click(function () {
    var studentID = $("#student_id").val();
    if  (!studentID)
    {
        alert("Please type in 6 digtial id");
    }
    else
    {
        $.get( "../action/check.php", 
                {role:'student',
                id: studentID} 
            ).done(function( data ) {
            $("#output").html(data);
            console.log(data);
            });   
    }  
});

// check validation of each value in form before sumbit
$("#submit_btn").click(function(){
    if((!$("#first_name").val())&&((!$("#last_name").val())))
        alert("please enter your full name");
    else if(!RegExpID.test($("#student_id").val()))
        alert("please enter correct student id (6 digital)");   
    else if(!(mailformat.test($("#email").val())))
        alert("invalid email address");
    else if(!RegExpPsd.test($("#psw1").val()))
        alert("Password must contain 6-12 length, Contains at least 1 lower case letter, 1 uppercase letter, 1 number and one of following special characters ! @ # $ % ^");
    else if(!$("#psw2").val())
        alert("please re-type the Password");
    else if ($("#psw2").val()!=$("#psw1").val())
            alert("Passwords do not match");    
    else if(!$("#agree").prop('checked'))
        alert("you must agree the terms and conditions");
    else {
            $("#Register_form").submit();
    }
});

