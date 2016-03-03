<html><body>
<?php
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("test") or die(mysql_error());
mysql_query("CREATE TABLE website(id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id),name VARCHAR(30),email VARCHAR(50),number INT,comments VARCHAR(300))")or die(mysql_error()); 
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$comments = $_POST['comments'];


// Insert a row of information into the table "example"
mysql_query("INSERT INTO example 
(name,email,number,comments) VALUES(name,email,number,comments) ") 
or die(mysql_error());  
echo "your data has been stored";
 ?>
</body>
</html>
