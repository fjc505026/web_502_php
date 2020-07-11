<?php
session_start();
include('../config/db_conn.php'); //db connection
?>

<!doctype html>
<head> <link rel="stylesheet" href="../format/Timetable.css"></head>
<html lang="en">
<?php  include('head.php');?>
  <!-- Enrolled table  -->
  <div class="container" id="timetable_ct">
  <h2 class="text-muted">Enrolled Unit</h2>
  <table class="table table-hover bg-secondary" id="timetable_tb">
    <thead>
    <tr>
    <th>Unit code</th>
    <th>Lecture time</th>
    <th>Available tutorial time</th>
    <th>Tutorial allocate</th>
    </tr>
    </thead>
    <tbody id="hUnits">
    <!-- content will be update by JS & AJAX -->
    </tbody>
    </table>
    </div>
    <!-- timetable -->
    <div class="container">
    <h2 class="text-muted">Timetable</h2>
    <table class="calendar table table-bordered  bg-secondary">
      <thead>
        <tr >
          <th>&nbsp;</th>
          <th width="20%">Monday</th>
          <th width="20%">Tuesday</th>
          <th width="20%">Wednesday</th>
          <th width="20%">Thursday</th>
          <th width="20%">Friday</th>
        </tr>
      </thead>
      <tbody  id="htimetable">
        <tr  id="8AM">
          <td class="timeLine">08:00</td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
        </tr>

        <tr id="9AM">
          <td class="timeLine"> 09:00</td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
        </tr>

        <tr id="10AM">
          <td class="timeLine">10:00</td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
        </tr>

        <tr>
          <td class="timeLine">11:00</td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
        </tr>

        <tr>
          <td class="timeLine">12:00</td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
        </tr>

        <tr>
          <td class="timeLine">13:00</td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
        </tr>

        <tr>
          <td class="timeLine">14:00</td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
        </tr>

        <tr>
          <td class="timeLine">15:00</td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
        </tr>

        <tr>
          <td class="timeLine">16:00</td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
        </tr>

        <tr>
          <td class="timeLine">17:00</td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
          <td class=" no-events" rowspan="1" ></td>
        </tr>
      </tbody>
  </table>
  </div>
<?php  include('foot.php');?>
</html>

<script>
//var demo_unit = {Day:"Monday", Start:"10:00", End:"12:00",Code:"<?php echo "test";?>",Name:"profession year", Coordinator:"Jingchen"};

function showData(){           //ajax request
  $.ajax({
    url: '../action/Timetabledata.php?a=view',
    method:'GET'
  }).done(function(data) {
    // console.log(data);
    $('#hUnits').html(data);
    //request for timetable data
    $.ajax({
      type:'GET',
      dataType: 'json',
      url:'../action/sample.json',
      success:function(data){
        //$("#hUnits").empty();
        reloadTimeable();
        $.each(data, function(i,unit){
          console.log(unit.Day);
          fillTimeable(unit);
        });
      }
    });

    //tutorial allocate button
    $(".alloc_btn").click(function(){
      window.location.href="./TutAllocation.php?p="+this.id;
    });
     //tutorial remove button
    $(".remv_btn").click(function(){
      window.location.href="../action/tutEnroll.php?a=withdraw&p="+this.id;
    });

  }) ;

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

</script>
