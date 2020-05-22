<?php

define('DB_server','Utas');  //myDB

if (DB_server=='myDB'){
	define('DB_servername','localhost');
	define('DB_username','Jingchen');
	define('DB_password','Fjc070910');
	define('DB_dbname','jfan6');
}
elseif(DB_server=='Utas'){
	define('DB_servername','localhost');
	define('DB_username','jfan6');
	define('DB_password','505026');
	define('DB_dbname','jfan6');
}


$mysqli = new mysqli(DB_servername , DB_username, DB_password,DB_dbname); 
//check connection
if (mysqli_connect_errno())
 { 
	printf("Connect failed: %s\n", mysqli_connect_error()); 
	exit(); 
} 
?>