<?php

$servername ="localhost";
$username = "root";
$password = "";
$database = "myjon";

$conn=new mysqli($servername, $username, '', $database);

if(!$conn) {
	echo "failed";
	die("Connection failed: " . mysql_error());
}

?>
