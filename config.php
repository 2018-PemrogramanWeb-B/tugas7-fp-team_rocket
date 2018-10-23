<?php

$servername ="localhost";
$username = "root";
$password = "";
$database = "myjon";

$conn=mysql_connect($servername,$username,$password);
$a=mysql_select_db($database, $conn);

if(!$conn) {
	echo "failed";
	die("Connection failed: " . mysql_error());	
}

?>