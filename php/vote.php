<?php
$host = "us-cdbr-iron-east-03.cleardb.net";
$port = "3306";
$user = "b9a1b6108596e9";
$pass = "cedf8312";
$db = "ad_e15d55d16dfba74";

$conn = mysqli_connect($host, $user, $pass, $db, $porT);

if(!$conn) {
	echo "Failed to connect: " . mysqli_connect_error();
	exit();
}

$ratingVote = $_POST['rating'];
$diffVote = $_POST['difficulty'];
$maze_id = 12;
#get maze id

