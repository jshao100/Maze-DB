<?php
$file = fopen("../mazes/test.txt","w");
$arr = json_decode(str_replace('\\', '', $_POST['saveData']));
$name = $_POST['mazename'];
$user_id = $_COOKIE['uid'];

$host = "us-cdbr-iron-east-03.cleardb.net";
$port = "3306";
$user = "b9a1b6108596e9";
$pass = "cedf8312";
$db = "ad_e15d55d16dfba74";

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if(!$conn) {
	fwrite($file, "Failed to connect\n");
	fclose($file);
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}

if (!isset($_COOKIE['handle'])) {
	fwrite($file, "COOKIE[handle] not set\n");
	fclose($file);
	mysqli_close($conn);
	header('Location: http://maze.mybluemix.net/login.php');
	exit();
}

$debug = fopen("../mazes/debug.txt","w");

fwrite($debug, "Check if name exists\n");
//check if name exists already
$query = "select * from mazes where maze_name='" . $name . "'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
	fwrite($debug, "Name exists\n");
	fclose($debug);
	mysqli_close($conn);
	header('Location: http://maze.mybluemix.net/create.php');
	exit();
}

fwrite($debug, "User id is " . $user_id . "\n");

$query = "INSERT INTO mazes (maze_name, maze_author) VALUES ('" . $name . "','" . $user_id . "')";
if(mysqli_query($conn, $query)) {
	$query = "SELECT maze_id FROM mazes WHERE maze_name = '" . $name . "'";
	$result = mysqli_query($conn, $query);
	$maze_id = 0;
	while ($row = mysqli_fetch_assoc($result)) {
		$maze_id = $row['maze_id'];
	}

	fwrite($debug, "maze_id is " . $maze_id . "\n");

	$path = "../mazes/" . $id . ".txt";
	$f = fopen($path ,"w");
	foreach ($arr as $value) {
		fwrite($f, $value . "\n");
		fwrite($file, $value);
		fwrite($file, "\n");
	}
	fwrite($file, $name);
	fclose($f);
	fclose($file);

} else {
	echo "unsuccessful entry into mazes\n";
}

mysqli_close($conn);
header('Location: http://maze.mybluemix.net');
?>
