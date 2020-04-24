<?php 


?>

<!doctype html>
<head> <link rel="stylesheet" href="../format/#.css"></head>
<html lang="en">
    <?php  include('../templates/header.php');?>
    <br><br>

    <!-- UnitDetail table  -->
    <div class="container" id="Unit_ct">
        <h2 class="text-muted">Unit Details</h2>          
        <table class="table table-hover bg-secondary" id="Unit_tb">
          <thead>
            <tr>
              <th>Unit code</th>
              <th>Unit coordinator</th>
              <th>lecturer</th>
              <th>Description</th>
              <th>Available semester and campus</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>KIT001</td>
              <td>Doe</td>
              <td>john,harry</td>
              <th>Description pattern Description pattern Description pattern </th>
              <th> <a class="text-dark" href="UnitEnrollment.php">Pandora(S1),Rivendell(Winter School),Neverland(S2)</a></th>
            </tr>
            <tr>
              <td>KIT002</td>
              <td>Moe</td>
              <td>mary,pattern</td>
              <th>Description pattern Description pattern Description pattern </th>
              <th><a class="text-dark" href="UnitEnrollment.php">Pandora(S1),Rivendell(Winter School),Neverland(S2)</a></th>
            </tr>
            <tr>
              <td>KIT003</td>
              <td>Dooley</td>
              <td>pattern,pattern</td>
              <th>Description pattern Description pattern Description pattern </th>
              <th><a class="text-dark" href="UnitEnrollment.php">Pandora(S1),Rivendell(Winter School),Neverland(S2)</a></th>
            </tr>
            <tr>
                <td>KIT003</td>
                <td>Dooley</td>
                <td>pattern,pattern</td>
                <th>Description pattern Description pattern Description pattern </th>
                <th><a class="text-dark" href="UnitEnrollment.php">Pandora(S1),Rivendell(Winter School),Neverland(S2)</a></th>
            </tr>
            <tr>
            <td>KIT003</td>
            <td>Dooley</td>
            <td>pattern,pattern</td>
            <th>Description pattern Description pattern Description pattern </th>
            <th><a class="text-dark" href="UnitEnrollment.php">Pandora(S1),Rivendell(Winter School),Neverland(S2)</a></th>
            </tr>
          </tbody>
        </table>
      </div>

<?php  include('../templates/footer.php');?>
</html>
