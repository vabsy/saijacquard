<html>
CREATE TABLE users (                     
      users_id int(11) NOT NULL auto_increment,  
      users_fname VARCHAR(60),     
      users_email VARCHAR(60),
      users_number VARCHAR(60),
      users_pass  VARCHAR(32),
      PRIMARY KEY  (users_id)
    );
<?php
echo 'thank you.';
// Define database credentials
$host = 'localhost';
$user = 'username';
$password = 'password';
$database = 'sai-ejacquard';
// Create db connection
$conn = mysql_connect($host,$user,$password) or die('Error: Could not connect to database - '.mysql_error());
// Once connected, we can select a database
mysql_select_db($database,$conn) or die('Error in selecting the database: '.mysql_error());

// Grab user input and sanitize 
$fname = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$pass = $_POST['comment'];

// Validate the user email
if(! $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)))
{     
    echo 'Please insert a valid email.';
    die();
}

$sql = 'INSERT INTO `$database`.`users` (
`users_id` ,
`users_fname` ,
`users_email` , 
`users_number`,
`users_pass`
)
VALUES (
NULL ,  ''.$fname.'', ''.$email.'',  ''.$number.'', ''.$pass.'')';

if(mysql_query($sql))
{
    echo 'User information saved successfully.';
}else
{
    echo 'Error: We encountered an error while inserting the new record.';
}
mysql_close($conn);
?>
</html>