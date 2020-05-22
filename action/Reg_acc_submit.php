<!DOCTYPE html>
<html>
	<head>
		<title>Submit result</title>
	</head>
	<body>
		<?php
          include ('../config/db_conn.php');
          session_start();

          $_POST["firstname"]=isset($_POST["firstname"])?$_POST["firstname"]:' ';
          $_POST["lastname"]=isset($_POST["lastname"])?$_POST["lastname"]:' ';
          $_POST["psw1"]=isset($_POST["psw1"])?$_POST["psw1"]:' ';
          $_POST["phonenum"]=isset($_POST["phonenum"])?$_POST["phonenum"]:' ';
          $_POST["email"]=isset($_POST["email"])?$_POST["email"]:' ';
          $_POST["Adr1"]=isset($_POST["Adr1"])?$_POST["Adr1"]:' ';
          $_POST["Adr2"]=isset($_POST["Adr2"])?$_POST["Adr2"]:' ';
          $_POST["city"]=isset($_POST["city"])?$_POST["city"]:' ';
          $_POST["State"]=isset($_POST["State"])?$_POST["State"]:' ';
          $_POST["Pcode"]=isset($_POST["Pcode"])?$_POST["Pcode"]:' ';


          if(isset($_POST["studentID"])){
            $role="student";
            $ID=$mysqli->real_escape_string(strip_tags(substr($_POST["studentID"],0,10)));
          }
          else if(isset($_POST["staffID"])){
            $role="staff";
            $ID=$mysqli->real_escape_string(strip_tags(substr($_POST["staffID"],0,10)));
          }
          //echo  $role;
          //echo   $ID;
          $firstName=$mysqli->real_escape_string(strip_tags(substr($_POST["firstname"],0,50)));
          $lastName=$mysqli->real_escape_string(strip_tags(substr($_POST["lastname"],0,50)));
          $Password=$mysqli->real_escape_string(strip_tags(substr($_POST["psw1"],0,20)));

          $hashpassword=crypt($Password,'$2y$07$SuperSecretSaltIsSexy$');

          $Mobile=$mysqli->real_escape_string(strip_tags(substr($_POST["phonenum"],0,15)));
          $Email=$mysqli->real_escape_string(strip_tags(substr($_POST["email"],0,50)));
          $Address1=$mysqli->real_escape_string(strip_tags(substr($_POST["Adr1"],0,50)));
          $Address2=$mysqli->real_escape_string(strip_tags(substr($_POST["Adr2"],0,50)));
          $city=$mysqli->real_escape_string(strip_tags(substr($_POST["city"],0,20)));
          $State=$mysqli->real_escape_string(strip_tags(substr($_POST["State"],0,20)));
          $Pcode=$mysqli->real_escape_string(strip_tags(substr($_POST["Pcode"],0,10)));
          $Username=strtolower(substr($firstName, 0, 1 ).$lastName).$ID;
          $currentTime=date("Y-m-d");
          $expiredTime= date("Y-m-d",strtotime('+1 year'));

          //check whether the username existed!
          $query="SELECT `username` FROM `user`WHERE `username`='$Username';";
          $result = $mysqli->query($query);
          $row = $result->fetch_array(MYSQLI_ASSOC);
          // echo "row".$row['username'];
          //echo "username".$Username;

          if ($Username ==$row['username']){     //handle the username existed
            if($role=="student")
              header('Location:../php/Reg_student.php?error=UsernameExisted!');
            else if($role=="staff")
              header('Location:../php/Reg_staff.php?error=UsernameExisted!');
          }
          else
          {
            $result->free();
            // get max address_id and insert address info.
            $query = "SELECT MAX(`address_id`) AS max_id FROM `address`;";
            //echo  $query;
            $result = $mysqli->query($query);
            while ($row =$result->fetch_array(MYSQLI_ASSOC))
            {$address_id=$row['max_id']+1;}
            $query = "INSERT INTO `address` (`address_id`,`address_detail1`,`address_detail2`, `city`, `state`,`country`,`postcode`)
            VALUES ($address_id,'$Address1', '$Address2', '$city','$State','Australia', '$Pcode');";
            $result = $mysqli->query($query);

            if($role=='student'){
              //$studentID=$mysqli->real_escape_string($_POST["id"]);
              $DOB=$mysqli->real_escape_string(strip_tags(substr($_POST["DOB"],0,15)));

              // insert user table
              $query = "INSERT INTO `user` (`username`,`fname`, `lname`, `student_id`,`password`,`phonenum`,`email`,`DOB`,`address_id`,`access`) VALUES ('$Username','$firstName', '$lastName', '$ID','$hashpassword','$Mobile','$Email', '$DOB', $address_id,1);"; //DOB
              //echo  $query;
              $result = $mysqli->query($query);

              //insert student table
              $query = "INSERT INTO `student` (`student_id`,`start_date`,`expire_date`) VALUES ('$ID','$currentTime','$expiredTime');";
              echo  $query;
              $result = $mysqli->query($query);


              $_SESSION['session_user']=$Username;
              header('Location:./register_success.php?psd='.$Password);

            }
            else if ($role=='staff'){
              $Qualification=$mysqli->real_escape_string($_POST["qual"]);
              $Expertise=$mysqli->real_escape_string($_POST["exper"]);
              // insert user table
              $query = "INSERT INTO `user` (`username`,`fname`, `lname`, `staff_id`,`password`,`phonenum`,`email`,`address_id`,`access`)
                        VALUES ('$Username','$firstName', '$lastName', '$ID','$hashpassword','$Mobile','$Email', $address_id,2);";
              //echo  $query;
              $result = $mysqli->query($query);

              // insert staff table
              $query = "INSERT INTO `staff` (`staff_id`,`role`,`expertise`,`qualification`)
                        VALUES ('$ID','staff','$Expertise', '$Qualification');";
              $result = $mysqli->query($query);

              $_SESSION['session_user']=$Username;
              header('Location:./register_success.php?psd='.$Password);

            }
          }
          $mysqli->close();
		?>
	</body>
</html>
