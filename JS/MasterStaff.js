var urlLocal='../JSON/staffsample.json';
var urlRemote='https://raw.githubusercontent.com/fjc505026/web_dev_502/develop/JSON/staffsample.json';
var jsonDateSrc=urlRemote; //urlLocal



//default: DC log in
$(function(){
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