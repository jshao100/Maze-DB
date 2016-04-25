<?php
$file = fopen("../mazes/test.txt","w");
$arr = json_decode(str_replace('\\', '', $_POST['saveData']));
$name = $_POST['mazename'];

$host = "us-cdbr-iron-east-03.cleardb.net";
$port = "3306";
$user = "b9a1b6108596e9";
$pass = "cedf8312";
$db = "ad_e15d55d16dfba74";

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if(!$conn) {
	fwrite($file, "Failed to connect\n");
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}

if (!isset($_COOKIE['handle'])) {
	fwrite($file, "COOKIE[handle] not set\n");
	mysqli_close($conn);
	header('Location: http://maze.mybluemix.net/login.php');
	exit();
}

fwrite($file, "Check if name exists\n");
//check if name exists already
$query = "select * from mazes where maze_name='" . $name . "'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
	fwrite($file, "Name exists\n");
	mysqli_close($conn);
	header('Location: http://maze.mybluemix.net/create.php');
	exit();
}
fwrite($file, "Name does not exist\n Query for user_id");
/*

$query = "select user_id from users where user_name = '" . $_COOKIE['handle'] . "'";
$result1 = mysqli_query($conn, $query);
$res1 = mysqli_fetch_array($result1, MYSQLI_NUM);
$user_id = $res1[0];

$query = "INSERT INTO mazes (maze_name, maze_author) VALUES ('" . $name . "','" . $user_id . "')";
if(mysqli_query($conn, $query)) {
	$query = "SELECT maze_id FROM mazes WHERE maze_name = '" . $name . "'";
	$result = mysqli_query($conn, $query);
	$res = mysqli_fetch_array($result, MYSQLI_NUM);
	$id = $res[0];
 */
	//$path = "../mazes/" . $id . ".txt";
//$file = fopen($path ,"w");
	foreach ($arr as $value) {
		fwrite($file, $value);
		fwrite($file, "\n");
	}
	fwrite($file, $name);
	fclose($file);
	/*
} else {
	echo "unsuccessful entry into mazes\n";
}
	 */
mysqli_close($conn);
header('Location: http://maze.mybluemix.net');
?>
