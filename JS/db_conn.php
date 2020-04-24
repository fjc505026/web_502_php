<?php
$servername = "localhost";
$username = 'Jingchen';
$password =  'Fjc070910';
$dbname='jfan6';

$mysqli = new mysqli($servername , $username, $password, $dbname); 
//check connection
if (mysqli_connect_errno()){ 
	printf("Connect failed: %s\n", mysqli_connect_error()); 
	exit(); 
} 
// else{ 
// 	echo "communication connected!<br>";
// }
?>