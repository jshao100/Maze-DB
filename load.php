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
	$maze_data = $row['maze_data'];
}

$query1 = "SELECT user_handle FROM users WHERE user_id=" . $author_id;
$result1 = mysqli_query($conn, $query1);
while ($row = mysqli_fetch_assoc($result1)) {
	$author_name = $row['user_handle'];
}

$maze_dim = explode("\n", $maze_data);
$height = sizeof($maze_dim);
$width = strlen($maze_dim[0]);

$scale_factor = 1;
if ($height > $width)	$scale_factor = 600/$height;
else							$scale_factor = 600/$width;
$scale_factor = floor($scale_factor);

?>
<section class="main">
	<div class="medium-4 medium-centered maze-title">
		<h2>
			<?php echo $maze_name;?>
		</h2>
	</div>
	<div class="medium-4 medium-centered maze-subtitle">
		<div class="medium-6 column">
			<p>
				<?php echo strtolower($author_name);?>
			</p>
		</div>
		<div class="medium-6 column">
			<p>
				<?php echo $maze_date;?>
			</p>
		</div>
	</div>
	<div class="medium-5 medium-centered maze-subtitle">
		<div class="maze-votes search-options medium-6 column">
			<div class="small-4 columns slider-label">
				<p>Rating:</p>
			</div>
			<div class="small-8 columns">
				<div class="slider" data-slider data-initial-start="<?php echo $maze_rating;?>" data-step="1" data-end="5">
					<span class="slider-handle"  data-slider-handle role="slider" tabindex="1"></span>
					<span class="slider-fill" data-slider-fill></span>
					<input type="hidden">
				</div>
			</div>
		</div>
		<div class="maze-votes search-options medium-6 column">
			<div class="small-4 columns slider-label">
				<p>Difficulty:</p>
			</div>
			<div class="small-8 columns">
				<div class="slider" data-slider data-initial-start="<?php echo $maze_diff;?>" data-step="1" data-end="5">
					<span class="slider-handle"  data-slider-handle role="slider" tabindex="1"></span>
					<span class="slider-fill" data-slider-fill></span>
					<input type="hidden">
				</div>
			</div>
		</div>

	</div>
	<div class="row">
<?php
echo "<div class='maze medium-centered' style='width:".($scale_factor*$width+4).";'>";
$h;
$w;
for($h = 0; $h < $height; $h++) {
	echo "<div class='maze-row' style='height:".$scale_factor.";'>";
	$str = str_split($maze_dim[$h]);
	for($w = 0; $w < $width; $w++) {
		if ($str[$w] == "X") {
			echo "<div class='maze-cell' style='height:".$scale_factor.";width:".$scale_factor.";background-color:black'></div>"	;
		} else if ($str[$w] == "S") {
			echo "<div class='maze-cell' style='height:".$scale_factor.";width:".$scale_factor.";background-color:green'></div>";
		} else if ($str[$w] == "E") {
			echo "<div class='maze-cell' style='height:".$scale_factor.";width:".$scale_factor.";background-color:red'></div>";
		} else {
			echo "<div class='maze-cell' style='height:".$scale_factor.";width:".$scale_factor.";background-color:white'></div>";
		}
	}
	echo "</div>";
}
?>		
	</div>
</section>
<?php include 'footer.php'?>
