<?php
	$host = "localhost";
	$login = "root";
	$pass = "";
	$dbname = "ppfinder";

	$con = mysqli_connect($host, $login, $pass);
	
	if ($con)
	{
		mysqli_select_db($con, $dbname);
	}
	else
	{
		echo mysqli_error();
		die("error in database connection");
		mysqli_close($con);
	}
	
?>