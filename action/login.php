<?php
	include ('../config/db_conn.php');	
	$username=isset($_POST['username'])?$_POST['username']:' ';
    $password=isset($_POST['psw'])?$_POST['psw']:' ';
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);
    //echo  $hashpassword;
  
   $result=$mysqli->query("SELECT `username`, `password`,`fname`,`lname` FROM `user` WHERE `username` = '$username';");
   while($row =$result->fetch_array(MYSQLI_ASSOC))
   {
      // echo  $row['password'];  //shoud use this , has error
    if (password_verify($password, $hashpassword)) {  //success
            echo "true";
            $h_firstname= $row['fname'];
            $h_lastname= $row['lname'];
        }
    else 
        echo "false";
   }
	$result->free();
	$mysqli->close();
	
?> 