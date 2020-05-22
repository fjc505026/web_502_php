var urlLocal='../JSON/testdata.json';
var urlRemote='https://raw.githubusercontent.com/fjc505026/web_dev_502/develop/JSON/testdata.json';
var jsonDateSrc=urlRemote; //urlLocal



var AddTut="<td><a class=\"btn btn-success  text-white\"  href=\"#.html\" >enroll</a></td>";
var DeleTut="<td><a class=\"btn btn-danger  text-white\" href=\"#\" >remove</a></td>";

var val_campus=0;
var val_Period=0;

//window.setTimeout("window.location='../Timetable.php'", 0);
$(function(){
    //initial load
    $.ajax({
      type:'GET',
      dataType: 'json',
      url:jsonDateSrc,
      success:function(data){
        $.each(data, function(i,unit){
            if((val_campus==0)&&(val_Period==0))
            {
                $("#UnitEnrol_body").append("<tr><td>"+unit.Code +"</td><td>"+unit.Coordinator +"</td><td>"+unit.Lecuter+"</td><td>"+unit.Description+"</td><td>"+unit.Campus+"</td><td>"+unit.Period+"</td>"+AddTut+"</tr>");
            }
        });
        btn_act(); //need to improve
      }
    });
    //campus filter reload
    $("#campus").click(function(){
        val_campus=$("#campus").val(); 
        var name_campus;
        switch(val_campus){
         case "1": name_campus="Pandora";break;
         case "2": name_campus="Rivendell";  break;
         case "3": name_campus="Neverland";break;
         case "0": name_campus="All";break;
        }
        $("#UnitEnrol_body").empty(); 
        $.ajax({
            type:'GET',
            dataType: 'json',
            url:jsonDateSrc,
            success:function(data){
              $.each(data, function(i,unit){
                if (name_campus=="All")
                   $("#UnitEnrol_body").append("<tr><td>"+unit.Code +"</td><td>"+unit.Coordinator +"</td><td>"+unit.Lecuter+"</td><td>"+unit.Description+"</td><td>"+unit.Campus+"</td><td>"+unit.Period+"</td>"+AddTut+"</tr>");
                else if(unit.Campus==name_campus)
                    $("#UnitEnrol_body").append("<tr><td>"+unit.Code +"</td><td>"+unit.Coordinator +"</td><td>"+unit.Lecuter+"</td><td>"+unit.Description+"</td><td>"+unit.Campus+"</td><td>"+unit.Period+"</td>"+AddTut+"</tr>");
              });
            }
          });
        }
    );
    //Period filter reload
    $("#studyPeriod").click(function(){
        val_Period=$("#studyPeriod").val(); 
        var name_Periods;
        switch(val_Period){
         case "1": name_Periods="S1";break;
         case "2": name_Periods="S2";  break;
         case "3": name_Periods="Winter School";break;
         case "4": name_Periods="Spring School";break;
         case "0": name_Periods="All";break;
        }
        $("#UnitEnrol_body").empty(); 
        $.ajax({
            type:'GET',
            dataType: 'json',
            url:jsonDateSrc,
            success:function(data){
                $.each(data, function(i,unit){
                if (name_Periods=="All")
                   $("#UnitEnrol_body").append("<tr><td>"+unit.Code +"</td><td>"+unit.Coordinator +"</td><td>"+unit.Lecuter+"</td><td>"+unit.Description+"</td><td>"+unit.Campus+"</td><td>"+unit.Period+"</td>"+AddTut+"</tr>");
                else if(unit.Period==name_Periods)
                    $("#UnitEnrol_body").append("<tr><td>"+unit.Code +"</td><td>"+unit.Coordinator +"</td><td>"+unit.Lecuter+"</td><td>"+unit.Description+"</td><td>"+unit.Campus+"</td><td>"+unit.Period+"</td>"+AddTut+"</tr>");
              })
            }
          });
        }
    );
});

//  function to handle with enroll and withdraw event
function btn_act(){
    $("#enrollCfm_btn").click(function(){
        $(".en_btn").hide();
        $(".wd_btn").show()
    });

    $("#withdrawCfm_btn").click(function(){
      $(".wd_btn").hide();
      $(".en_btn").show()
    });

}