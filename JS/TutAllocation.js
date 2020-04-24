$(function(){

  $.ajax({
    type:'GET',
    dataType: 'json',
    url:'https://raw.githubusercontent.com/fjc505026/web_dev_502/master/JSON/testdata.json',
    success:function(data){
        var unitDetails_Demo=data[0];
        $("#hUnitCode") .text(unitDetails_Demo.Code); 
        $("#hUnitLecTime").text(unitDetails_Demo.Day+" "+unitDetails_Demo.Start+" - "+unitDetails_Demo.End);
        $("#hTut1").text(unitDetails_Demo.Tutorial1.Day+" "+unitDetails_Demo.Tutorial1.Start+" - "+unitDetails_Demo.Tutorial1.End+"\t"+unitDetails_Demo.Tutorial1.location+" "+unitDetails_Demo.Tutorial1.current+"/"+unitDetails_Demo.Tutorial1.max);
        $("#hTut2").text(unitDetails_Demo.Tutorial2.Day+" "+unitDetails_Demo.Tutorial2.Start+" - "+unitDetails_Demo.Tutorial2.End+"\t"+unitDetails_Demo.Tutorial2.location+" "+unitDetails_Demo.Tutorial2.current+"/"+unitDetails_Demo.Tutorial2.max);
    
    
        $("#Tut_time").click(function(){
            switch ($("#Tut_time").val()){
                case "1": $("#Tut_location").text(unitDetails_Demo.Tutorial1.location); break;
                case "2": $("#Tut_location").text(unitDetails_Demo.Tutorial2.location);break;
                default:$("#Tut_location").text("room");break;
    
            }
        })
    
        $("#enroll_btn").click(function(){
    
            switch ($("#Tut_time").val()){
                case "1": Demo_UserInfo.enroll_unit1.Tutoral=unitDetails_Demo.Tutorial1;
                        Demo_UserInfo.enroll_unit1.Tutoral_allocate=1;
                        break;
                case "2": Demo_UserInfo.enroll_unit1.Tutoral=unitDetails_Demo.Tutorial2;
                        Demo_UserInfo.enroll_unit1.Tutoral_allocate=2;
                        break;
                default:  break;
            }
    
            window.setTimeout("window.location='../Timetable.php'", 0);
        })
     
    }

  })
});




