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
$query2 = "";
if ($type == "on") {
	$query = "select user_id from users where user_handle = '" . $searchText . "'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$uid = $row['user_id'];
	$query2 = "select * from mazes where maze_author = " . $uid  . "and maze_rating > " . $rating . " and maze_diff > " . $difficulty;
} else {
	$query2 = "select * from mazes where INSTR(maze_name, '" . $searchText . "') and maze_rating > " . $rating . " and maze_diff > " . $difficulty;

}

$result2 = mysqli_query($conn, $query2);
while($row = mysql_fetch_assoc($result2)) {
	echo $row['maze_name'] . "\n";
}
$mysqli_close($conn);
?>
