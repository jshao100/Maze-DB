<?php
$host = "us-cdbr-iron-east-03.cleardb.net";
$port = "3306";
$user = "b9a1b6108596e9";
$pass = "cedf8312";
$db = "ad_e15d55d16dfba74";

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if(!$conn) {
	echo "Failed to connect: " . mysqli_connect_error();
	exit();
}
$user = $_COOKIE['uid'];
$ratingVote = $_POST['rating'];
$diffVote = $_POST['difficulty'];
$maze_id = $_POST['id'];
#get maze id
//check if vote exists
$query = "select * from votes where maze_id = '" . $maze_id . "' and user_id = '" . $user . "'";

$result1 = mysqli_query($conn, $query);

$query2 = "INSERT INTO votes(maze_id, user_id, rating, difficulty) values(" . $maze_id . ", " . $_COOKIE['uid'] . ", " . $ratingVote . ", " . $diffVote . ")";

if(mysqli_num_rows($result1) > 0) 
	$query2 = "UPDATE votes set rating = " . $ratingVote . ", difficulty= " . $diffVote . "where maze_id = " . $maze_id . " and user_id = " . $user;


//insert vote

mysqli_query($conn, $query2);

$query3 = "select SUM(rating), SUM(difficulty), COUNT(rating) from votes where maze_id = " . $maze_id;
$result3 = mysqli_query($conn, $query3);
$rateSum = $ratingVote;
$diffSum = $diffVote;
$count = 1;
while($row = mysqli_fetch_assoc($result3)) {
	$rateSum = $row['SUM(rating)'];
	$diffSum = $row['SUM(difficulty)'];
	$count = $row['COUNT(rating)'];
}

$newRate = $rateSum / $count;
$newDiff = $diffSum / $count;

$query4 = "update mazes set maze_rating=" . $newRate . ", maze_diff = " . $newDiff . " where maze_id=" . $maze_id;
mysqli_query($conn, $query4);

mysqli_close($conn);
exit();
?>

