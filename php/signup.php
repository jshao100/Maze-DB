<?php
$host = "us-cdbr-iron-east-03.cleardb.net";
$port = "3306";
$user = "b9a1b6108596e9";
$pass = "cedf8312";
$db = "ad_e15d55d16dfba74";


$conn = new mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}
echo "Connected successfully";

mysqli_close($conn);
?>
