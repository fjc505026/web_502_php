<?php
// $myArr[] = array('Day'=>"Monday", 'Start'=>"10:00","End"=>"12:00","Code"=>"test","Name"=>"profession year", "Coordinator"=>"Jingchen");

// $myJSON = json_encode($myArr);

// echo $myJSON;
?> 

<!DOCTYPE html>
<html>
	<head>
		<title>Self-Study 6</title>
	</head>

	<body>
		<?php
			function fileWrite( $fileName, $str ) {
				$handle = fopen( $fileName, "a+" );
				fwrite( $handle, $str );
				fclose( $handle );
			}

			fileWrite( "sample.txt", "Hello World!\n" );
			fileWrite( "sample.txt", "Hello Australia!\n" );
			fileWrite( "sample.txt", "Hello Tasmania!\n" );
			fileWrite( "sample2.txt", "Hello Launceston!\n" );
			fileWrite( "sample2.txt", "Hello Newnham!\n" );
			fileWrite( "sample2.txt", "Hello UTas!\n" );
			
		?>
    </body>
</html>