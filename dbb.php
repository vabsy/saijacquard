<?php 
	$con = mysqli_connect("localhost","myname","mypassword","Saijacquard");
	if(!$con)
		echo "Database Connected Failure";
	$sql = "CREATE TABLE Feedback(No INT(10) AUTO_INCREMENT PRIMARY KEY, Name VARCHAR(50) NOT NULL, Email VARCHAR(50) NOT NULL, Number VARCHAR(20) NOT NULL, Comments TEXT NOT NULL)";
	if(mysqli_query($con,$sql))
	{
		echo "Table Created Successfully";
	}
	else
	{
		echo "Failure in creating Table".mysqli_error($con);
	}
	mysqli_close($con);
?>