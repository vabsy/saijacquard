<?php 
	$con = mysqli_connect("localhost","myname","mypassword","Saijacquard");
	if(!$con)
		echo "Database Connected Failure";
	$name = $_POST['name'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$comment = $_POST['comment'];
	$sql = "INSERT INTO Feedback VALUES($name, $email, $number, $comment)";
	if(mysqli_query($con,$sql))
	{
		echo "Thank you for submitting your request";
	}
	else
	{
		echo "Error while inserting";
	}
	mysqli_close($con);
?>