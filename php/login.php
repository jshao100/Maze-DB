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

if(!isset($username) || !isset($password)) {
	$error = true;
}
$query = "select * from users where user_handle='" . $username . "' and user_pass='" . md5($password) . "'";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) != 1) {
	$error = true;
}

$query = "select user_id from users where user_handle = '" . $_POST['handle'] . "'";
$result1 = mysqli_query($conn, $query);
$user_id = 0;
while ($row = mysqli_fetch_assoc($result1)) {
	$user_id = $row['user_id'];	
}

mysqli_close($conn);
if($error) {
	header('Location: ../login.php');
} else {
	setcookie("handle", $_POST["handle"], time()+3600*3, "/"); //set cookie handle
	setcookie("uid", $user_id, time()+3600*3, "/");
	header('Location: ../create.php');
}
exit();
?>
