<!DOCTYPE html>
<html>
	<head>
		<title>Submit result</title>
	</head>
	<body>
		<?php
        //    if(empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty ($_POST["staffID"])
        //    {
        //         echo("it must contain username, password and valid email address");    
        //    }
        //    else
        //    {
            $firstName=htmlspecialchars($_POST["firstname"]);
            $lastName=htmlspecialchars($_POST["lastname"]);
            $staffID=htmlspecialchars($_POST["id"]);
            $Password=htmlspecialchars($_POST["psd"]);
            $Mobile=htmlspecialchars($_POST["phonenum"]);
            $Email=htmlspecialchars($_POST["email"]);
            $Qualification=htmlspecialchars($_POST["qual"]);
            $Expertise=htmlspecialchars($_POST["exper"]);

            include ('db_conn.php');
      
            $query = "INSERT INTO `staffaccnt` (`FirstName`, `LastName`, `StaffID`,`Password`,`PhoneNum`,`Email`,`Qualification`,`expertise`)
                      VALUES ('$firstName', '$lastName', '$staffID','$Password','$Mobile','$Email','$Qualification',' $Expertise');";
            //echo   $query;        
            $result = $mysqli->query($query);
            
            $query="SELECT * FROM  `staffaccnt` WHERE `StaffID`=$staffID ";
            $result = $mysqli->query($query);
            while ($row = $result->fetch_array(MYSQLI_ASSOC))
            { echo "Full name",  $row['FirstName'], $row['LastName'], "<br>";
              echo "Staff ID",  $row['StaffID'], "<br>";
    
            }
           
            $result->free();
            $mysqli->close();

        // }
		?>
	</body>
</html>
