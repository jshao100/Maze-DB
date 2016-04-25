<?php include 'header.php'?>
<?php
$maze_id = $_GET['id'];
$path = "./mazes/" . $maze_id . ".txt";
$file = fopen($path, "r") or die("Unable to open file\n");

while (!feof($file)) {
	echo fgets($file)."<br>";
}
fclose($file);
?>
<?php include 'footer.php'?>
