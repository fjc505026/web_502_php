
var RegExpPsd= new RegExp("(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^])(?=.{6,12})");///^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^])(?=.{6,12})+$/
var RegExpID=  new RegExp (/^(\d{8})+$/);
var RegExpPhoneNo =  /^(\d{10})+$/;
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
var Bool_submit = false; 

function validateFunc() {
    if(Bool_submit){
        alert("The form was submitted");
        Bool_submit=false;
        var   firstName     =   $("#first_name").val();
        var   lastName      =   $("#last_name").val();
        var   staffID       =   $("#staff_id").val();
        var   Password      =   $("#psw2").val();
        var   PhoneNo       =   $("#phone_No").val();
        var   Email         =   $("#email").val();
        var   Qualification =   $("#qualification").val();
        var   Expertise     =   $("#expertise").val();
        var   Address1      =   $("#inputAddress").val();  
        var   Address2      =   $("#inputAddress2").val();  
        var   city          =   $("#inputCity").val();
        var   State          =  $("#inputState").val();
        var   Pcode          =  $("#inputPcode").val();
       
        $.post(
            "../action/Reg_acc_submit.php",
            {role:'staff',
            firstname: firstName, 
            lastname:lastName, 
            id:staffID,
            psd:Password,
            phonenum:PhoneNo,
            email:Email,
            qual:Qualification,
            exper:Expertise,
            Adr1:Address1,
            Adr2:Address2,
            city:city,
            State:State,
            Pcode:Pcode}
            ).done(function( data ) {
            console.log(data);
            alert("Account created!");
           // window.location.href="../action/Reg_acc_submit.php";
        }); 
    }    
}

$().ready(function() {
    
    $("#check").click(function () {
        var staffID = $("#staff_id").val();
        if  (!staffID)
        {
            alert("Please type in 8 digtial id");
        }
        else
        {
            $.get( "../action/check.php", 
                    { role:'staff',
                        id: staffID} 
                ).done(function( data ) {
                $("#output").html(data);
                console.log(data);
                });   
        }  
    });
       
    $('button[type!=submit]').click(function(){
        return false;
    });	


    $("#submit_btn").click(function(){
        if((!$("#first_name").val())&&((!$("#last_name").val())))
             alert("please enter your username");
        else if(!RegExpID.test($("#staff_id").val()))
            alert("please enter correct staff id (8 digital)");   
        else if(!RegExpPhoneNo.test($("#phone_No").val()))
            alert("please enter correct phone number (10 digital)");    
        else if(!(mailformat.test($("#email").val())))
            alert("invalid email address");
        else if($("#qualification").val()==0)
            alert("please select qualification");
        else if($("#expertise").val()==0)
            alert("please select expertise");
        else if(!RegExpPsd.test($("#psw1").val()))
            alert("Password must contain 6-12 length, Contains at least 1 lower case letter, 1 uppercase letter, 1 number and one of following special characters ! @ # $ % ^");
        else if(!$("#psw2").val())
            alert("please re-type the Password");
        else if ($("#psw2").val()!=$("#psw1").val())
             alert("Passwords do not match");    
        else if(!$("#agree").prop('checked'))
            alert("you must agree the terms and conditions");
        else  Bool_submit=true;
    })

})

