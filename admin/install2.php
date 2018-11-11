<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	require_once("../main/dbconnect.php");
	
	$con = mysqli_connect($host, $login, $pass);
	
	if ($con)
	{
		mysqli_query($con, "INSERT INTO $dbname.`user` (`login`, `password`) VALUES ('test', '123')");
	}
	else
	{
		echo mysqli_error($con);
		die("error in database connection");
		mysqli_close($con);
	}
	
?>