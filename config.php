<?php

$servername ="localhost";
$username = "root";
$password = "";
$database = "myjon";

$conn=new mysqli($servername, $username, '', $database);
// $a=mysqli_select_db($database, $conn);

if(!$conn) {
	echo "failed";
	die("Connection failed: " . mysql_error());
}

?>
