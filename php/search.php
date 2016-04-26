<?php
$host = "us-cdbr-iron-east-03.cleardb.net";
$port = "3306";
$user = "b9a1b6108596e9";
$pass = "cedf8312";
$db = "ad_e15d55d16dfba74";

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if(!$conn) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$searchText = $_POST['search_text'];
$type = $_POST['search_type']; //on if USER
$rating = $_POST['rating'];
$difficulty = $_POST['difficulty'];

echo $searchText . "\n";
echo $type . "\n";
echo $rating . "\n";
echo $difficulty . "\n";

if ($searchText == null || $searchText == "") {
	header('Location: http://maze.bluemix.net/');
	exit();
}
$query2 = "";
$result2 = "";
if ($type == "on") {
	$query2 = "select user_handle from users where INSTR(user_handle, '" . $searchText . "') > 0";
	$result2 = mysqli_query($conn, $query2);

} else {
	$query2 = "select * from mazes where INSTR(maze_name, '" . $searchText . "') and maze_rating > " . $rating . " and maze_diff > " . $difficulty;
	$result2 = mysqli_query($conn, $query2);
}

echo $query2 . "\n";

while($row = mysqli_fetch_assoc($result2)) {
	echo $row['maze_name'] . "\n";
}

$mysqli_close($conn);
exit();
?>
