<!DOCTYPE html>
<html>
	<head>
		<title>Submit result</title>
	</head>
	<body>
		<?php
          //  if(empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty ($_POST["staffID"])
          //  {
          //       echo("it must contain username, password and valid email address");    
          //  }
          //  else
          //  {
            $firstName=htmlspecialchars($_POST["firstname"]);
            $lastName=htmlspecialchars($_POST["lastname"]);
            $staffID=htmlspecialchars($_POST["id"]);
            $Password=htmlspecialchars($_POST["psd"]);
            $Mobile=htmlspecialchars($_POST["phonenum"]);
            $Email=htmlspecialchars($_POST["email"]);
            $Qualification=htmlspecialchars($_POST["qual"]);
            $Expertise=htmlspecialchars($_POST["exper"]);
            
            $Username=substr($firstName, 0, 1 ).$lastName;
   
            include ('../config/db_conn.php');
            $query = "INSERT INTO `user` (`username`,`fname`, `lname`, `staff_id`,`password`,`phonenum`,`email`)
                       VALUES ('$Username','$firstName', '$lastName', '$staffID','$Password','$Mobile','$Email');"; 
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
                      VALUES ('$staffID','none','$Expertise', '$Qualification');";  
               
            
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

         //}
		?>
	</body>
</html>
