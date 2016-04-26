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

$maze_rating_f = floor($maze_rating);
$maze_diff_f = floor($maze_diff);

$query1 = "SELECT user_handle FROM users WHERE user_id=" . $author_id;
$result1 = mysqli_query($conn, $query1);
while ($row = mysqli_fetch_assoc($result1)) {
	$author_name = $row['user_handle'];
}

$user_rating = null;
$user_diff = null;
if (isset($_COOKIE['uid'])) {
	$query2 = "SELECT rating, difficulty FROM votes WHERE maze_id=".$maze_id." AND user_id=".$_COOKIE['uid'];
	$result2 = mysqli_query($conn, $query2);
	while ($row = mysqli_fetch_assoc($result2)) {
		$user_rating = $row['rating'];
		$user_diff = $row['difficulty'];
	}
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
	<div class="row medium-4 medium-centered maze-title">
		<h2>
			<?php echo $maze_name;?>
		</h2>
	</div>
	<div class="row medium-4 medium-centered maze-subtitle pad-bot">
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
		<div class="medium-6 column">
			<p>
				Rating: <b><?php echo number_format($maze_rating, 1);?></b>
			</p>
		</div>
		<div class="medium-6 column">
			<p>
				Difficulty: <b><?php echo number_format($maze_diff, 1);?></b>
			</p>
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
</div>
<div class="row medium-5 medium-centered maze-subtitle" style="
<?php 
if(!isset($_COOKIE['handle'])) { 
	echo 'display:none;';
}
?>">
	<form action="./php/vote.php" method="post">
		<div class="row">
			<div class="maze-votes search-options medium-6 column">
				<div class="small-4 columns slider-label">
					<p>Rating:</p>
				</div>
				<div class="small-8 columns">
					<div class="slider" data-slider data-initial-start="<?php 
if ($user_rating == null) {	
	echo $maze_rating_f;
} else {
	echo $user_rating;
}
?>" data-step="1" data-end="5">
						<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput1"></span>
						<span class="slider-fill" data-slider-fill></span>
					</div>
				</div>
				<div class="small-2 columns span-label" style="display:none;">
					<input type="number" id="sliderOutput1" name="rating">
				</div>
			</div>
			<div class="maze-votes search-options medium-6 column">
				<div class="small-4 columns slider-label">
					<p>Difficulty:</p>
				</div>
				<div class="small-8 columns">
					<div class="slider" data-slider data-initial-start="<?php
if ($user_diff == null) {	
	echo $maze_diff_f;
} else {
	echo $user_diff;
}
?>" data-step="1" data-end="5">
						<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
						<span class="slider-fill" data-slider-fill></span>
					</div>
				</div>
				<div class="small-2 columns span-label" style="display:none;">
					<input type="number" id="sliderOutput2" name="difficulty">
				</div>
				<input type="number" name="id" value="<?php echo $maze_id;?>" style="display:none;">
			</div>
		</div>
		<div class="row">
			<div class="medium-3 medium-centered">
				<button class="button" type="submit">
<?php
if ($user_diff == null) {
	echo "Submit Vote";
} else {
	echo "Update Vote";
}
?></button>
			</div>
		</div>
	</form>
</div>
</section>
<?php include 'footer.php'?>
