<?php
$host = "us-cdbr-iron-east-03.cleardb.net";
$port = "3306";
$user = "b9a1b6108596e9";
$pass = "cedf8312";
$db = "ad_e15d55d16dfba74";

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if(!conn) {
	echo "Failed to connect to MySQL: " . mysqli_conect_error();
}

$searchText = $_POST['search_text'];
$type = $_POST['search_type']; //on if USER
$rating = $_POST['rating'];
$difficulty = $_POST['difficulty'];

if ($searchText == null || $searchText == "") {
	header('Location: http://maze.bluemix.net/');
	exit();
}

if ($type == "on") {
	$type = "user_handle";
} else {
	$type = "maze_name";
}

echo $searchText."\n";
echo $type."\n";
echo $rating."\n";
echo $difficulty."\n";

$query = "select * from mazes where INSTR(" . $type . ", '" . $searchText . "') and maze_rating > " . $rating . " and maze_diff > " . $difficulty;

$result = mysqli_query($conn, $query);

$mysqli_close($conn);
?>
