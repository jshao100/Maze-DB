<?php
$host = "us-cdbr-iron-east-03.cleardb.net";
$port = "3306";
$user = "b9a1b6108596e9";
$pass = "cedf8312";
$db = "ad_e15d55d16dfba74";


$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}
echo "Connected successfully";

$name = explode(" ", $_POST['name']); //split on space
$handle = $_POST['handle'];
$password = $_POST['password'];
$password2 = $_POST['password'];
/*
echo $name[0];
echo $name[1];
echo $handle;
echo $password;
echo $password2;
echo "vars done printing";
echo "\n";
 */

$error = false;

//null input
if (!isset($name) || !isset($handle) || !isset($password)) {
	$error = true;
}
//did not provide first and last name OR space in username
else if (count($name) < 2 || strpos($handle, " ")) {
	$error = true;
}
//password not the same
else if (strcmp($password, $password2) !== 0) {
	$error = true;	
}
//password checks
else {
	if (strlen($password) < 8)				$error = true;
	else if (strpos($password, " "))		$error = true;
	else {
		//check if handle exists already
		$query = "select count(*) from users where user_handle='" . $handle . "'";
		$result = mysqli_query($conn, $query);

		if ($result > 0)						$error = true;
	}
}

if ($error) {
	mysqli_close($conn);
	header('Location: ../create.php');
	exit();
} else {
	$query = "INSERT INTO users (user_first, user_last, user_handle, user_pass) VALUES ('"
		. $name[0] . "','" . $name[count($name)-1] . "','" . $handle . "','" . md5($password) . "')";

	if (mysqli_query($conn, $query)) {
		//success
		echo $query . " success!";
	} else {
		//not successful
		echo $query . " unsuccessful";
	}
}

mysqli_close($conn);
header('Location: ../index.php');
exit();
?>
