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

$query = "SELECT maze_id FROM mazes ORDER BY RAND() LIMIT 1";
$result = mysqli_query($conn, $query);
$maze_id = 262;
while($row = mysqli_fetch_assoc($result)) {
	$maze_id = $row['maze_id'];
}

mysqli_close($conn);

header('Location: ../load.php?id='.$maze_id);
exit();
?>
