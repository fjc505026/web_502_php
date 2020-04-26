<!DOCTYPE html>
<html>
	<head>
		<title>Submit result</title>
	</head>
	<body>
		<?php
          include ('../config/db_conn.php');
          
          //  if(empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty ($_POST["staffID"])
          //  {
          //       echo("it must contain username, password and valid email address");    
          //  }
          //  else
          //  {
          $role=isset($_POST['role'])?$_POST['role']:' ';
          $firstName=htmlspecialchars($_POST["firstname"]);
          $lastName=htmlspecialchars($_POST["lastname"]);
       
          $Password=htmlspecialchars($_POST["psd"]);
          $hashpassword = password_hash($password, PASSWORD_DEFAULT);
          $Mobile=htmlspecialchars($_POST["phonenum"]);
          $Email=htmlspecialchars($_POST["email"]);
          $Address1=htmlspecialchars($_POST["Adr1"]);
          $Address2=htmlspecialchars($_POST["Adr2"]);
          $city=htmlspecialchars($_POST["city"]);
          $State=htmlspecialchars($_POST["State"]);
          $Pcode=htmlspecialchars($_POST["Pcode"]);
          $Username=substr($firstName, 0, 1 ).$lastName;
          $currentTime=date("Y-m-d"); 
          $expiredTime= date("Y-m-d",strtotime('+1 year')); 

          // need to check the duplicate of username
          // $query = "SELECT `username` FROM `user`;"; //DOB  
          // $result = $mysqli->query($query);
          // $counter=
          // while ($row = $result->fetch_array(MYSQLI_ASSOC))
          // { 
          //   if($row['username']== $Username)
          //   $Username
          // }

          $query = "SELECT MAX(`address_id`) AS max_id FROM `address`;"; 
          echo  $query;
          $result = $mysqli->query($query);
          while ($row =$result->fetch_array(MYSQLI_ASSOC))
          {$address_id=$row['max_id']+1;}
          //$address_id=3;
          $query = "INSERT INTO `address` (`address_id`,`address_detail1`,`address_detail2`, `city`, `state`,`country`,`postcode`)
          VALUES ($address_id,'$Address1', '$Address2', '$city','$State','Austrlia', $Pcode);"; 
          $result = $mysqli->query($query);
  
          if($role=='student'){
            $studentID=htmlspecialchars($_POST["id"]);
            $DOB=htmlspecialchars($_POST["DOB"]);
  
            $query = "INSERT INTO `user` (`username`,`fname`, `lname`, `student_id`,`password`,`phonenum`,`email`,`DOB`,`address_id`)
            VALUES ('$Username','$firstName', '$lastName', '$studentID','$hashpassword','$Mobile','$Email', '$DOB',1);"; //DOB
            echo  $query;
            $result = $mysqli->query($query);

            $query="SELECT * FROM  `user` WHERE `student_id`= $studentID ;";
            //echo  $query;
            $result = $mysqli->query($query);
            while ($row = $result->fetch_array(MYSQLI_ASSOC))
            { echo "Full name:".$row['fname'].$row['lname']."<br>";
              echo "Student ID:".$row['student_id']."<br>";
              echo "Password:".$row['password']."<br>";
              echo "phone Number:".$row['phonenum']."<br>";
              echo "Email:".$row['email']."<br>";
            }
             
            $query = "INSERT INTO `student` (`student_id`,`start_date`,`expire_date`)
                      VALUES ('$studentID',' $currentTime','$expiredTime');";  
            $result = $mysqli->query($query);
            $result->free();

            $query="SELECT * FROM  `student` WHERE `student_id`=$studentID ;";
            $result = $mysqli->query($query);
            while ($row = $result->fetch_array(MYSQLI_ASSOC))
            { echo "start_date:".$row['start_date']."<br>";
              echo "expire_date:".$row['expire_date']."<br>";
            }
            $result->free();
            $mysqli->close();

          }
          else if ($role=='staff'){

            $staffID=htmlspecialchars($_POST["id"]);
            $Qualification=htmlspecialchars($_POST["qual"]);
            $Expertise=htmlspecialchars($_POST["exper"]);
                 
            $query = "INSERT INTO `user` (`username`,`fname`, `lname`, `staff_id`,`password`,`phonenum`,`email`,`address_id`)
                       VALUES ('$Username','$firstName', '$lastName', '$staffID','$hashpassword','$Mobile','$Email', $address_id);"; 
            //echo  $query;
            $result = $mysqli->query($query);

            $query="SELECT * FROM  `user` WHERE `staff_id`= $staffID ;";
            //echo  $query;
            $result = $mysqli->query($query);
            while ($row = $result->fetch_array(MYSQLI_ASSOC))
            { echo "Full name:".$row['fname'].$row['lname']."<br>";
              echo "Staff ID:".$row['staff_id']."<br>";
              echo "Password:".$row['password']."<br>";
              echo "phone Number:".$row['phonenum']."<br>";
              echo "Email:".$row['email']."<br>";
            }

            $query = "INSERT INTO `staff` (`staff_id`,`role`,`expertise`,`qualification`)
                      VALUES ('$staffID','staff','$Expertise', '$Qualification');";  
               
            
            $result = $mysqli->query($query);
            $result->free();
      
            $query="SELECT * FROM  `staff` WHERE `staff_id`=$staffID ;";
            $result = $mysqli->query($query);
            while ($row = $result->fetch_array(MYSQLI_ASSOC))
            { echo "expertise:".$row['expertise']."<br>";
              echo "qualification:".$row['qualification']."<br>";
            }
        
            $result->free();
            $mysqli->close();

         }
		?>
	</body>
</html>
