<html>
CREATE TABLE users (                     
      users_id int(11) NOT NULL auto_increment,  
      users_fname VARCHAR(60),     
      users_lname VARCHAR(60),
      users_email VARCHAR(60),
      users_pass  VARCHAR(32),
      PRIMARY KEY  (users_id)
    );
<?php
// Define database credentials
$host = 'localhost';
$user = 'username';
$password = 'password';
$database = 'mydb_name';
// Create db connection
$conn = mysql_connect($host,$user,$password) or die('Error: Could not connect to database - '.mysql_error());
// Once connected, we can select a database
mysql_select_db($database,$conn) or die('Error in selecting the database: '.mysql_error());

// Grab user input and sanitize 
$fname = mysql_real_escape_string(filter_var(trim($_POST['fname']), FILTER_SANITIZE_STRING));
$lname = mysql_real_escape_string(filter_var(trim($_POST['lname']), FILTER_SANITIZE_STRING));
$pass = mysql_real_escape_string(filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING));

// Validate the user email
if(! $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)))
{     
    echo 'Please insert a valid email.';
    die();
}

$sql = 'INSERT INTO `$database`.`users` (
`users_id` ,
`users_fname` ,
`users_lname` , 
`users_email`,
`users_pass`
)
VALUES (
NULL ,  ''.$fname.'', ''.$lname.'',  ''.$email.'', ''.$pass.'')';

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