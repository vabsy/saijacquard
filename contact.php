<?php 
	$con = mysqli_connect("localhost","myname","mypassword","Saijacquard");
	if(!$con)
		echo "Database Connected Failure";
	$name = $_POST['name'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$comment = $_POST['comment'];
	$sql = "INSERT INTO Feedback VALUES('','$name', '$email', $number, '$comment')";
	$emailto = "admin@sai-ejacquard.com"; 
$subject = "Information - Customer enquiry"; 
$headers = "From: $email" . "\r\n" . "CC: $emailto"; 

// prepare email body text 
$body .= "--------------------------------------\n"; 
$body .= "Customer Enquiry Details\n"; 
$body .= "--------------------------------------\n"; 
$body .= "Customer name: $name" . "\n"; 
$body .= "Email ID: $email" . "\n"; 
$body .= "Customer number: $number" . "\n";
$body .= "Comments: $comment" . "\n";  
$body .= "\n--------------------------------------\n"; 

// send email 
$send = mail($emailto, $subject . ' ' , $body, $headers); 

mysql_close($con); 
$con = mysqli_connect("localhost","myname","mypassword","Saijacquard");
// redirect to success page 
if ($send){ 
echo "successfully sent";
} 
else{ 
echo "We encountered an error sending your mail."; 
} 
	if(mysqli_query($con,$sql))
	{
		echo "<b><h1>Thank you for submitting your request</h1></b>";
	}
	else
	{
		echo "Error while inserting";
	}
	mysqli_close($con);
<a href="http://sai-ejacquard.com/contact.html">Click here to go Back</a>



?>