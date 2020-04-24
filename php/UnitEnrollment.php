<?php 


?>

<!doctype html>
<head> <link rel="stylesheet" href="../format/UnitEnrollment.css"></head>
<html lang="en">
    <?php  include('../templates/header.php');?>
    <div class="row" id="filterGroup">
        <div class="col-sm-3">
            <label class="mr-sm-2 text-secondary" for="campus"><b>Filter by campus</b></label>
            <select class="custom-select mr-sm-2" id="campus">
                <option selected>Choose...</option>
                <option value="1">Pandora</option>
                <option value="2">Rivendell</option>
                <option value="3">Neverland</option>
            </select>
        </div>
        <div class="col-sm-3">
            <label class="mr-sm-2 text-secondary" for="campus"><b>Filter by periods</b></label>
            <select class="custom-select mr-sm-2" id="studyPeriod">
                <option selected>Choose...</option>
                <option value="1">Semester 1</option>
                <option value="2">Semester 2</option>
                <option value="3">Winter School</option>
                <option value="3">Spring School</option>
            </select>
            </select>
        </div>
        <div class="col-sm-3">
            <label class="mr-sm-2 text-secondary" for="campus"><b>Filter by ...</b></label>
            <select class="custom-select mr-sm-2" id="campus">
                <option selected>Choose...</option>
                <option value="1">option1</option>
                <option value="2">option2</option>
                <option value="3">option3</option>
            </select>
            </select>
        </div>

    </div> 

    <!-- UnitEnrollment table  -->
    <div class="container" id="UnitEnrol_ct">
        <h2 class="text-muted">Unit Available</h2>          
        <table class="table table-hover bg-secondary" id="UnitEnrol_tb">
          <thead>
            <tr>
              <th>Unit code</th>
              <th>Unit coordinator</th>
              <th>Lecturer</th>
              <th>Description</th>
              <th>campus</th>
              <th>study periods</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <td>KIT001</td>
                <td>Doe</td>
                <td>john,harry</td>
                <th>...</th>
                <th>...</th>
                <th>...</th>
                <th>
                    <button class="btn btn-success">
                     enroll        
                    </button>
                </th>
            </tr>
            <tr>
                <td>KIT001</td>
                <td>Doe</td>
                <td>john,harry</td>
                <th>...</th>
                <th>...</th>
                <th>...</th>
                <th>
                    <button class="btn btn-success">
                     enroll        
                    </button>
                </th>
            </tr>
            <tr>
                <td>KIT001</td>
                <td>Doe</td>
                <td>john,harry</td>
                <th>...</th>
                <th>...</th>
                <th>...</th>
                <th>
                    <button class="btn btn-success">
                     enroll        
                    </button>
                </th>
            </tr>
            <tr>
                <td>KIT001</td>
                <td>Doe</td>
                <td>john,harry</td>
                <th>...</th>
                <th>...</th>
                <th>...</th>
                <th>
                    <button class="btn btn-success">
                     enroll        
                    </button>
                </th>
            </tr>
            <tr>
                <td>KIT001</td>
                <td>Doe</td>
                <td>john,harry</td>
                <th>...</th>
                <th>...</th>
                <th>...</th>
                <th>
                    <button class="btn btn-success">
                        enroll        
                    </button>
                    <button class="btn btn-danger">
                        withdraw        
                    </button>
                </th>
            </tr>
          </tbody>
        </table>
      </div>

  <?php  include('../templates/footer.php');?>
</html>
