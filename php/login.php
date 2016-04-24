<?php
$host = "us-cdbr-iron-east-03.cleardb.net";
$port = "3306";
$user = "b9a1b6108596e9";
$pass = "cedf8312";
$db = "ad_e15d55d16dfba74";

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if(!$conn) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}

$username = $_POST['handle'];
$password = $_POST['password'];

$error = false;

if(!isset($name) || !isset($handle)) {
	$error = true;
}
$query = "select * from users where user_handle='" . $handle . "' and user_pass='" . md5($password) . "'";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) != 1) {
	$error = true;
}
if($error) {
	mysqli_close($conn);
	header('Location: ../create.php');
	exit();
} else {
	header('Location: ../index.php');
}

