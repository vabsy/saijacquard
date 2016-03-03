<?php
include_once('connection1.php');
echo "baaa";
session_start();
if(isset($_POST['login']))
{

	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql = "SELECT * FROM `Login` where Email = '$email' AND Password ='$password'";
	$mydata=mysql_query($sql);
	while($record = mysql_fetch_array($mydata))
	{
		echo $uesr_id = $record['UserID'];
		$Fname = $record['Fname'];
		$Lname = $record['Lname'];
	}
	
	
		if($uesr_id == '')
		{
			$msg = "<p>Invalid Email Id and Password</p>";
			$_SESSION['msg'] = $msg;
		}
		else
		{
		     header('Location:customer.php');
			$msg = "<p>Successfull Login.</p>";
			$_SESSION['msg'] = $msg;
			$_SESSION['uesr_id'] = $uesr_id;
			$_SESSION['cust_name'] = $Fname." ".$Lname;
			$_SESSION['password1']=$password;
		}




}
?>