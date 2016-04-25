<?php
$arr = json_decode(str_replace('\\', '', $_POST['saveData']));
$name = $_POST['mazename'];
$user_id = $_COOKIE['uid'];
$rating = $_POST['rating'];
$difficulty = $_POST['difficulty'];

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

if (!isset($_COOKIE['handle'])) {
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

$str = "";
foreach ($arr as $value) {
	$str .= $value . "\n";
}

$query = "INSERT INTO mazes (maze_name, maze_author, maze_rating, maze_diff, maze_data) VALUES ('" . $name . "','" . $user_id . "','" . $rating . "','" . $difficulty . "','" . $str . "')";

if(mysqli_query($conn, $query)) {
	$query = "SELECT maze_id FROM mazes WHERE maze_name = '" . $name . "'";
	$result = mysqli_query($conn, $query);
	$maze_id = 0;
	while ($row = mysqli_fetch_assoc($result)) {
		$maze_id = $row['maze_id'];
	}

	$query2 = "INSERT INTO votes (maze_id, user_id, rating, difficulty) VALUES ('" . $maze_id . "','" . $user_id . "','" . $rating . "','" . $difficulty . "')";
	if(mysqli_query($conn, $query2)) {
		fwrite($debug, "Successful entry into votes\n");
	} else {
		fwrite($debug, "No entry into votes\n");
	}

	fwrite($debug, "maze_id is " . $maze_id . "\n");
	fclose($debug);
} else {
	echo "unsuccessful entry into mazes\n";
}

mysqli_close($conn);
header('Location: http://maze.mybluemix.net');
?>
