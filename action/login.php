<?php
    session_start();
    include ('../config/db_conn.php');
    $uname=isset($_POST['username'])?$_POST['username']:' ';
    $psword=isset($_POST['psw'])?$_POST['psw']:' ';
	$username=$mysqli->real_escape_string(strip_tags(substr($uname,0,32)));
    $password=$mysqli->real_escape_string(strip_tags(substr($psword,0,32)));
    $hashpassword=crypt($password,'$2y$07$SuperSecretSaltIsSexy$');
    //echo $password;

   $result=$mysqli->query("SELECT `user_id`,`username`,`password`,`fname`,`lname`,`access`,`student_id`,`staff_id` FROM `user` WHERE `username` = '$username';");
   while($row =$result->fetch_array(MYSQLI_ASSOC))
   {
    if (hash_equals($row['password'],$hashpassword)) {  //success password_verify($password, $row['password'])

            $h_firstname=$row['fname'];
            $h_lastname= $row['lname'];

            echo "true";

            $_SESSION['session_user']= $username;
            $_SESSION['name']=  $h_firstname.' '. $h_lastname;
            $_SESSION['access']=$row['access'];
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION['stu_id']=$row['student_id'];
            $_SESSION['staff_id']=$row['staff_id'];
        }
    else
        echo "false";
   }
	$result->free();
    $mysqli->close();

?>

