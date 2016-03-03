<?php

$con = mysql_connect("localhost","myname","mypassword","Saijacquard");
	if(!$con)
		echo "Database Connected Failure";
else {
	mysql_select_db("Saijaquard");
}

?>
