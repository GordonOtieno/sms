<?php

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "smsv2";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);
   
if (!$conn) {
	echo "Connection failed!";
}

//echo "connected efcaccasssssssssss to db  </br>";

?>