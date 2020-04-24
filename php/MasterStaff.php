<?php 


?>

<!doctype html>
<head> <link rel="stylesheet" href="../format/#.css"></head>
<html lang="en">
    <?php  include('../templates/header.php');?>
    <br><br>
    <!-- Staff list  -->
    <div class="container_fluid" id="Staff_ct">
        <h2 class="text-muted">Staff list</h2>          
        <table class="table table-hover bg-secondary" id="Staff_tb">
          <thead>
            <tr>
              <th>Name</th>
              <th>qualification</th>
              <th>expertise</th>
              <th>preferred days of teaching</th>
              <th>consultation hours</th>
              <th id="tut_col">Tutorial allocation</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Doe</td>
              <td>Doe</td>
              <td>john,harry</td>
              <td>Description pattern Description  </td>
              <td>Pandora(S1),Rivendell</td>
              <td>
                <div class="row">
                    <div class="col">
                    <select class="custom-select " id="campus">
                        <option selected>Choose campus</option>
                        <option value="1">Pandora</option>
                        <option value="2">Rivendell</option>
                        <option value="3">Neverland</option>
                    </select>
                     </div>
                     <div class="col">
                    <select class="custom-select " id="studyPeriod">
                        <option selected>Choose Semester</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Winter School</option>
                        <option value="3">Spring School</option>
                    </select>
                    </div>
                    <div class="col">
                    <button class="btn btn-warning">Allocate</button>
                    </div>
                </div>      
              </td>
            </tr>
            <tr>
              <td>john</td>
              <td>Moe</td>
              <td>mary,pattern</td>
              <td>Description pattern Description  </td>
              <td>Pandora(S1),Rivendell</td>
              <td>
                <div class="row">
                    <div class="col">
                    <select class="custom-select " id="campus">
                        <option selected>Choose campus</option>
                        <option value="1">Pandora</option>
                        <option value="2">Rivendell</option>
                        <option value="3">Neverland</option>
                    </select>
                     </div>
                     <div class="col">
                    <select class="custom-select " id="studyPeriod">
                        <option selected>Choose Semester</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Winter School</option>
                        <option value="3">Spring School</option>
                    </select>
                    </div>
                    <div class="col">
                    <button class="btn btn-warning">Allocate</button>
                    </div>
                </div>      
              </td>
            </tr>
            <tr>
              <td>mary</td>
              <td>Dooley</td>
              <td>pattern,pattern</td>
              <td>Description pattern Description </td>
              <td>Pandora(S1),Rivendell</td>
              <td>
                <div class="row">
                    <div class="col">
                    <select class="custom-select " id="campus">
                        <option selected>Choose campus</option>
                        <option value="1">Pandora</option>
                        <option value="2">Rivendell</option>
                        <option value="3">Neverland</option>
                    </select>
                     </div>
                     <div class="col">
                    <select class="custom-select " id="studyPeriod">
                        <option selected>Choose Semester</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Winter School</option>
                        <option value="3">Spring School</option>
                    </select>
                    </div>
                    <div class="col">
                    <button class="btn btn-warning">Allocate</button>
                    </div>
                </div>      
              </td>
            </tr>
            <tr>
                <td>harry</td>
                <td>Dooley</td>
                <td>pattern,pattern</td>
                <td>Description pattern Description  </td>
                <td>Pandora(S1),Rivendell</td>
                <td>
                    <div class="row">
                        <div class="col">
                        <select class="custom-select " id="campus">
                            <option selected>Choose campus</option>
                            <option value="1">Pandora</option>
                            <option value="2">Rivendell</option>
                            <option value="3">Neverland</option>
                        </select>
                         </div>
                         <div class="col">
                        <select class="custom-select " id="studyPeriod">
                            <option selected>Choose Semester</option>
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                            <option value="3">Winter School</option>
                            <option value="3">Spring School</option>
                        </select>
                        </div>
                        <div class="col">
                            <button class="btn btn-warning">Allocate</button>
                        </div>
                    </div>      
                  </td>
            </tr>
            <tr>
            <td>Jack</td>
            <td>Dooley</td>
            <td>pattern,pattern</td>
            <td>Description pattern Description  </td>
            <td>Pandora(S1),Rivendell</td>
            <td>
                <div class="row">
                    <div class="col">
                    <select class="custom-select " id="campus">
                        <option selected>Choose campus</option>
                        <option value="1">Pandora</option>
                        <option value="2">Rivendell</option>
                        <option value="3">Neverland</option>
                    </select>
                     </div>
                     <div class="col">
                    <select class="custom-select " id="studyPeriod">
                        <option selected>Choose Semester</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Winter School</option>
                        <option value="3">Spring School</option>
                    </select>
                    </div>
                    <div class="col">
                    <button class="btn btn-warning">Allocate</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-danger">Remove</button>
                    </div>
                </div>      
              </td>
            </tr>
          </tbody>
        </table>
      </div>


<?php  include('../templates/footer.php');?>
</html>

