
var urlLocal='../JSON/testdata.json';
var urlRemote='https://raw.githubusercontent.com/fjc505026/web_dev_502/master/JSON/testdata.json';
var jsonDateSrc=urlRemote; //urlLocal

var AccountValid=false;
var AddTut="<td><a class=\"btn btn-success text-white\" href=\"TutAllocation.html\" >allocate</a></td>";
var DeleTut="<td><a class=\"btn btn-danger text-white\" href=\"#\" >remove</a></td>";
var Detail="<td><a class=\"btn btn-warning text-white\" href=\"UnitDetail.html\" >Detail</a></td>";

$(function(){
  loadData();
 //log in 
  $("#lg_btn").click(function(){
    AccountValid=true;
    $(".afterLog").show();
    $(".beforeLog").hide();
    $("#th4").text("Tutorial"); //change 4th table head 
    $("#timetable_ct_title").text("Enrolled Units"); 
    $("#timetable_title").text("Demo's Timetable"); 
    loadData();
  });

 //log out 
  $("#lg_out").click(function(){
    AccountValid=false;
    $(".afterLog").hide();
    $(".beforeLog").show();
    $("#th4").html("&nbsp;");
    $("#timetable_ct_title").text("Available Units"); 
    $("#timetable_title").text("Timetable"); 
    loadData();
  });

});


function  loadData(){
  $.ajax({
    type:'GET',
    dataType: 'json',
    url:jsonDateSrc,
    success:function(data){ 
      $("#hUnits").empty();
      reloadTimeable();
      $.each(data, function(i,unit){
        var DemoTut1Info=unit.Tutorial1.Day+" "+unit.Tutorial1.Start+" - "+unit.Tutorial1.End+"\t"+unit.Tutorial1.location;
        var DemoTut2Info=unit.Tutorial2.Day+" "+unit.Tutorial2.Start+" - "+unit.Tutorial2.End+"\t"+unit.Tutorial2.location;
        if(!AccountValid)  // not log in, show all 
          {
            $("#hUnits").append("<tr><td>"+unit.Code +"</td><td>"+unit.Day+" "+unit.Start+"-"+unit.End+"</td><td>"+DemoTut1Info+" / "+DemoTut2Info+"</td>"+Detail); 
            fillTimeable(unit);
          }
          else if(i<=2){    //log in , show part of unit(enrolled units)
            $("#hUnits").append("<tr><td>"+unit.Code +"</td><td>"+unit.Day+" "+unit.Start+"-"+unit.End+"</td><td>"+DemoTut1Info+" / "+DemoTut2Info+"</td>"+AddTut);
            fillTimeable(unit);
          }
     });
    }
  });
};

//when user change, reload timetable
function reloadTimeable(){
  $("#htimetable tr td").removeClass("has-events row-fluid lecture bg-primary").addClass("no-events");
  $("#htimetable tr td").attr('rowspan','1');
  $("#htimetable tr td:not(.timeLine)").text("");
};

//the fcuntion to change the timetable <table>'s descendant
function fillTimeable(unit){
  var weekday=0;
  var timeline=0;
  var timespan=0;
  switch  (unit.Day){
    case "Monday":weekday=2;timeline=checktime(unit.Start);timespan=checktime(unit.End)-timeline;break;
    case "Tuesday": weekday=3;timeline=checktime(unit.Start);timespan=checktime(unit.End)-timeline;break;
    case "Wednesday":weekday=4; timeline=checktime(unit.Start);timespan=checktime(unit.End)-timeline;break;
    case "Thursday": weekday=5;timeline=checktime(unit.Start);timespan=checktime(unit.End)-timeline;break;
    case "Friday": weekday=6;timeline=checktime(unit.Start);timespan=checktime(unit.End)-timeline;
    default: break;
    }
    $("#htimetable tr:nth-of-type("+timeline+") td:nth-of-type("+weekday+")").removeClass("no-events").addClass("has-events row-fluid lecture bg-primary");
    $("#htimetable tr:nth-of-type("+timeline+") td:nth-of-type("+weekday+")").text(unit.Code+"/"+unit.Name+"/"+unit.Coordinator);
    $("#htimetable tr:nth-of-type("+timeline+") td:nth-of-type("+weekday+")").attr('rowspan','1');

    if(timespan>1){
      for(var i=1; i<timespan;i++)
        {  
          var tmp=timeline+i;
          $("#htimetable tr:nth-of-type("+tmp+") td:nth-of-type("+weekday+")").removeClass("no-events").addClass("has-events row-fluid lecture bg-primary");
        }
      }
};

//function convert the time string to number
function checktime(timeLine){
    switch (timeLine){
      case "8:00" : return 1;
      case "9:00" : return 2;
      case "10:00": return 3;
      case "11:00": return 4;
      case "12:00": return 5;
      case "13:00": return 6;
      case "14:00": return 7;
      case "15:00": return 8;
      case "16:00": return 9;
      case "17:00": return 10;
      default:      return 0;
    }
 }