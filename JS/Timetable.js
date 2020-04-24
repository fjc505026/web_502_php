

var AddTut="<td><a class=\"btn btn-success text-white\" href=\"TutAllocation.php\" >allocate</a></td>";
var DeleTut="<td><a class=\"btn btn-danger text-white\" href=\"#\" >remove</a></td>";

$(function(){
  $.ajax({
    type:'GET',
    dataType: 'json',
    url:'https://raw.githubusercontent.com/fjc505026/web_dev_502/master/JSON/testdata.json',
    success:function(data){ 
      $.each(data, function(i,unit){
        var DemoTut1Info=unit.Tutorial1.Day+" "+unit.Tutorial1.Start+" - "+unit.Tutorial1.End+"\t"+unit.Tutorial1.location;
        var DemoTut2Info=unit.Tutorial2.Day+" "+unit.Tutorial2.Start+" - "+unit.Tutorial2.End+"\t"+unit.Tutorial2.location;
        if(i%2==0)
          $("#hUnits").append("<tr><td>"+unit.Code +"</td><td>"+unit.Day+" "+unit.Start+"-"+unit.End+"</td><td>"+DemoTut1Info+" / "+DemoTut2Info+"</td>"+AddTut);
        else
          $("#hUnits").append("<tr><td>"+unit.Code +"</td><td>"+unit.Day+" "+unit.Start+"-"+unit.End+"</td><td>"+DemoTut1Info+" / "+DemoTut2Info+"</td>"+DeleTut); 
          
        var weekday=0;
        var timeline=0;

        switch  (unit.Day){
          case "Monday":weekday=2;timeline=checktime(unit);break;
          case "Tuesday": weekday=3;timeline=checktime(unit);break;
          case "Wednesday":weekday=4; timeline=checktime(unit);break;
          case "Thursday": weekday=5;timeline=checktime(unit);;break;
          case "Friday": weekday=6;timeline=checktime(unit);
          default: break;
          }
          $("#htimetable tr:nth-of-type("+timeline+") td:nth-of-type("+weekday+")").removeClass("no-events").addClass("has-events row-fluid lecture bg-primary");
          $("#htimetable tr:nth-of-type("+timeline+") td:nth-of-type("+weekday+")").attr('rowspan','1');
          $("#htimetable tr:nth-of-type("+timeline+") td:nth-of-type("+weekday+")").text(unit.Code+"/"+unit.Name+"/"+unit.Coordinator);
     });
    }
  });
});




function checktime(x){
     switch (x.Start){
        case "8:00" : return 2;
        case "9:00" : return 3;
        case "10:00": return 4;
        case "11:00": return 5;
        case "12:00": return 6;
        case "13:00": return 7;
        case "14:00": return 8;
        case "15:00": return 9;
        case "16:00": return 10;
        case "17:00": return 11;
        default:      return 0;
     }
 }