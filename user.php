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

$handle = $_GET['handle'];
$user_id = 0;

$query1 = "SELECT user_id FROM users WHERE user_handle = '" .$handle . "'";

$result1 = mysqli_query($conn, $query1);

if (mysqli_num_rows($result1) < 1) {
	mysqli_close($conn);
	header("Location: http://maze.mybluemix.net/");
	exit();
}
while ($row1 = mysqli_fetch_assoc($result1)) {
	$user_id = $row1['user_id'];
}
?>
<?php include 'header.php';?>
<section class="main">
	<div class="row">
		<div class="result-title">
			<h2><?php echo strtolower($handle) . "'s Mazes";?></h2>
		</div>
	</div>
	<div>
		<div class="result-table">
			<table id="searchTable" class="tablesorter medium-8 medium-centered"> 
				<thead> 
					<tr> 
						<th>Maze Name</th> 
						<th>Creation Date</th> 
						<th>Rating</th> 
						<th>Difficulty</th> 
						<th>Popularity</th> 
					</tr> 
				</thead> 
				<tbody>
<?php
$query2 = "SELECT * FROM mazes WHERE maze_author = " . $user_id;
$result2 = mysqli_query($conn, $query2);
while($row = mysqli_fetch_assoc($result2)) {
	echo "<tr>";
	echo "<td><a href='./load.php?id=".$row['maze_id']."'>".$row['maze_name']."</a></td>";
	echo "<td>".$row['maze_date']."</td>";
	echo "<td>".$row['maze_rating']."</td>";
	echo "<td>".$row['maze_diff']."</td>";
	echo "<td>".$row['maze_pop']."</td>";
	echo "</tr>";
}

?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<?php include 'footer.php';?>
<script>
	$(document).ready(function() { 
		$("#searchTable").tablesorter(); 
	});
</script>
<?php
mysqli_close($conn);
?>
