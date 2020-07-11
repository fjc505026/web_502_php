<?php
//include the file session.php
include("../config/session.php");
//include the file db_conn.php
include("../config/db_conn.php");

//if the session for username has not been saved, automatically go back to signin_form.php
if ($session_user==""){
	 header('Location: register.php');
}else{
	$query="SELECT * FROM `user`WHERE `username`='$session_user';";
	$result = $mysqli->query($query);
	$row = $result->fetch_array(MYSQLI_ASSOC);

}

if(isset($_GET['psd']))
{
	$password=$_GET['psd'];
}
?>
<html>
<head>
<title>Success</title>
</head>
<!-- once register succss, show account information -->
<body>
<b>Accounter successfully created!.</b><br/>
<p> Username:<?php echo $session_user;?></p> <br/>
<p> Password:<?php echo $password;?></p> <br/>
<p> Email:<?php echo $row['email'];?></p> <br/>
<p> Phone:<?php echo $row['phonenum'];?></p> <br/>

	<!--if the user clicks "sign out" button, go to signout.php-->
	<form action="../index.php" method="post">
		<input type="submit" name="submit" value="Comfirm">
	</form>
</body>
</html>