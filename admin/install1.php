<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	require_once("../main/dbconnect.php");
	
	if ($con)
	{
		$q = "DROP SCHEMA $dbname";
		echo $q . "<br>";
		mysqli_query($con, $q);
		echo mysqli_error($con) . "<br>";
		
		$q = "CREATE SCHEMA $dbname";
		echo $q . "<br>";
		mysqli_query($con, $q);
        echo mysqli_error($con) . "<br>";
		
		$q = "CREATE  TABLE $dbname.`user` (
			  `id` INT NOT NULL AUTO_INCREMENT ,
			  `active` TINYINT(1) NULL ,
			  `login` VARCHAR(20) NULL ,
			  `password` VARCHAR(20) NULL ,
			  `surname` VARCHAR(80) NULL ,
			  `name` VARCHAR(60) NULL ,
			  `email` VARCHAR(50) NULL ,			  
			  PRIMARY KEY (`id`) );";
        mysqli_query($con, $q);
		echo $q . "<br>";
        echo mysqli_error($con) . "<br>";

		$q = "ALTER TABLE $dbname.`user` CHARACTER SET = greek , COLLATE = greek_general_ci";
        mysqli_query($con, $q);
        echo mysqli_error($con) . "<br>";
	}
	else
	{
        echo mysqli_error($con) . "<br>";
    	mysqli_close($con);
        die("error in database connection");
	}
?>