<?php 


?>

<!doctype html>
<head> <link rel="stylesheet" href="../format/Timetable.css"></head>
<html lang="en">
    <?php  include('../templates/header.php');?>

    <!-- Enrolled table  -->
    <div class="container" id="timetable_ct">
        <h2 class="text-muted">Enrolled Unit</h2>          
        <table class="table table-hover bg-secondary" id="timetable_tb">
          <thead>
            <tr>
              <th>Unit code</th>
              <th>Lecture time</th>
              <th>Available tutorial time</th>
              <th> &nbsp;</th>
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
              <tr>
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
                  <td>08:00</td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
              </tr>
             
              <tr id="9AM">
                  <td>09:00</td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
              </tr>
            
              <tr id="10AM">
                  <td>10:00</td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
              </tr>

              <tr>
                  <td>11:00</td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
              </tr>

              <tr>
                  <td>12:00</td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
              </tr>

              <tr>
                  <td>13:00</td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
              </tr>

              <tr>
                  <td>14:00</td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
              </tr>
            
              <tr>
                  <td>15:00</td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
              </tr>

              <tr>
                  <td>16:00</td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
              </tr>
  
              <tr>
                  <td>17:00</td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
                  <td class=" no-events" rowspan="1" ></td>
              </tr>
              
          </tbody>
      </table>
  </div>

  <?php  include('../templates/footer.php');?>
</html>

