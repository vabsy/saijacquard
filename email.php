<?php
// $email and $message are the data that is being
// posted to this page from our html contact form
//storing data in database
if($_POST) {
session_start();
if($_POST['captcha'] != $_SESSION['digit']) die("Sorry, the CAPTCHA code entered was incorrect!");
session_destroy();
    
$con = mysqli_connect("localhost","myname","mypassword", "Saijacquard");
if(!$con)
echo "Database Connected Failure";
$name = $_POST['name'];   
$email = $_POST['email'];
$number = $_POST['number'];
$location=$_POST['location'];
$comment = $_POST['comment'];
$sql = "INSERT INTO Feedback VALUES('' , '$name' , '$email' , '$number' , '$location' , '$comment')";
if(mysqli_query($con,$sql))
{
echo "<b><h1>Thank you for submitting your request</h1></b>";
}
else
{
echo " Error while inserting";
}
mysqli_close($con);

// When we unzipped PHPMailer, it unzipped to
// public_html/PHPMailer_5.2.0
require("/home/vivekkb/public_html/PHPMailer_5.2.0/class.phpmailer.php");

$mail = new PHPMailer();

// set mailer to use SMTP
$mail->IsSMTP();

// As this email.php script lives on the same server as our email server
// we are setting the HOST to localhost
$mail->Host = "localhost";  // specify main and backup server

$mail->SMTPAuth = true;     // turn on SMTP authentication

// When sending email using PHPMailer, you need to send from a valid email address
// In this case, we setup a test email account with the following credentials:
// email: send_from_PHPMailer@bradm.inmotiontesting.com
// pass: password
$mail->Username = "admin@sai-ejacquard.com";  // SMTP username
$mail->Password = "bang@BANG1"; // SMTP password

// $email is the user's email address the specified
// on our contact us page. We set this variable at
// the top of this page with:
// $email = $_REQUEST['email'] ;
$mail->From = $email;

// below we want to set the email address we will be sending our email to.
$mail->AddAddress("admin@sai-ejacquard.com", "vivekkb");

// set word wrap to 50 characters
$mail->WordWrap = 100;
// set email format to HTML
$mail->IsHTML(true);

$mail->Subject = "You have received feedback from your website!";

// $message is the user's message they typed in
// on our contact us page. We set this variable at
// the top of this page with:
// $message = $_REQUEST['message'] ;
$body .= "--------------------------------------\n"; 
$body .= "Customer Enquiry Details\n"; 
$body .= "--------------------------------------\n"; 
$body .= "Customer name: $name" . "\n"; 
$body .= "Email ID: $email" . "\n"; 
$body .= "Customer number: $number" . "\n";
$body .= "Comments: $comment" . "\n";  
$body .= "\n--------------------------------------\n"; 
$mail->Body    = $body;
$mail->AltBody = $body;

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
}
?>