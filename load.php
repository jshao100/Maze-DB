<?php include 'header.php'?>
<?php
$host = "us-cdbr-iron-east-03.cleardb.net";
$port = "3306";
$user = "b9a1b6108596e9";
$pass = "cedf8312";
$db = "ad_e15d55d16dfba74";

$conn = mysqli_connect($host, $user, $pass, $db, $port);

$maze_id = $_GET['id'];
$author_id = 0;
$author_name = "";
$maze_date = "";
$maze_name = "";
$maze_data;
$maze_rating = 0;
$maze_diff = 0;

$query = "SELECT * FROM mazes WHERE maze_id=" . $maze_id;
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
	$author_id = $row['maze_author'];
	$maze_date = $row['maze_date'];
	$maze_name = $row['maze_name'];
	$maze_rating = $row['maze_rating'];
	$maze_diff = $row['maze_diff'];
	$maze_data = str_split($row['maze_data']);
}

$query1 = "SELECT user_handle FROM users WHERE user_id=" . $author_id;
$result1 = mysqli_query($conn, $query1);
while ($row = mysqli_fetch_assoc($result1)) {
	$author_name = $row['user_handle'];
}

$i;
$width = 0;
$height = 0;
for ($i = 0; $i < count($maze_data); $i++) {
	if ($maze_data[$i] == "\n") {
		$height++;	
	}	else {
		$width++;
	}
}
$width = $width / $height;

echo $author_name . "\n";
echo $author_id . "\n";
echo $maze_name . "\n";
echo $maze_id . "\n";
echo $maze_rating . "\n";
echo $maze_diff . "\n";
echo $maze_data . "\n";
echo $width;
echo $height;

$scale_factor = 1;
if ($height > $width)	$scale_factor = 600/$height;
else							$scale_factor = 600/$width;
$scale_factor = floor($scale_factor);

?>
<section class="main">
	<div class="row">
		<div class="maze medium-centerd">
<?php
echo "<div class='maze medium-centered' style='width:".($scale_factor*$width+2).";border:1px solid black;'>";
	$h;
	$w;
	for($h = 0; $h < $height; $h++) {
		echo "<div class='maze-row' style='height:".$scale_factor.";'>";
		for($w = 0; $w < $width; $w++) {
			$pos = $h*$height + $w + $h;
			if ($maze_data[$pos] == "X") {
				echo "<div class='maze-cell' style='height:".$scale_factor.";width:".$scale_factor.";background-color:black'></div>"	;
			} else if ($maze_data[$pos] == "S") {
				echo "<div class='maze-cell' style='height:".$scale_factor.";width:".$scale_factor.";background-color:green'></div>";
			} else if ($maze_data[$pos] == "E") {
				echo "<div class='maze-cell' style='height:".$scale_factor.";width:".$scale_factor.";background-color:red'></div>";
			} else {
				echo "<div class='maze-cell' style='height:".$scale_factor.";width:".$scale_factor.";background-color:white'></div>";
			}
		}
		echo "</div>";
	}
?>		
		</div>
	</div>
</section>
<?php include 'footer.php'?>
