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
/*
echo $searchText . "\n";
echo $type . "\n";
echo $rating . "\n";
echo $difficulty . "\n";
 */

if ($searchText == null || $searchText == "") {
	header('Location: http://maze.bluemix.net/');
	exit();
}
$query2 = "";
$result2 = "";
if ($type == "on") {
	$query2 = "select * from users where INSTR(user_handle, '" . $searchText . "') > 0";
	$result2 = mysqli_query($conn, $query2);

} else {
	$query2 = "select * from mazes where INSTR(maze_name, '" . $searchText . "') and maze_rating > " . $rating . " and maze_diff > " . $difficulty;
	$result2 = mysqli_query($conn, $query2);
}
?>
<?php include 'header.php';?>
<section class="main">
	<div class="row">
		<div class="result-title">
			<h2>Search Results for <?php echo $searchText;?></h2>
		</div>
	</div>
	<div>
		<div class="result-table">
			<table id="searchTable" class="tablesorter medium-8 medium-centered"> 
				<thead> 
					<tr>
<?php
if ($type == "on") {
	echo "<th>First Name</th>";
	echo "<th>Last Name</th>";
	echo "<th>Handle</th>";
} else {
	echo "<th>Maze Name</th>";
	echo "<th>Author</th>";
	echo "<th>Creation Date</th>";
	echo "<th>Rating</th>";
	echo "<th>Difficulty</th>";
	echo "<th>Popularity</th>";
}
?>
					</tr> 
				</thead> 
				<tbody>
<?php
if ($type == "on") {
	while($row = mysqli_fetch_assoc($result2)) {
		echo "<tr>";
		echo "<td>".$row['user_first']."</td>";
		echo "<td>".$row['user_last']."</td>";
		echo "<td><a href='./user.php?id=".$row['user_id']."'>".$row['user_handle']."</a></td>";
		echo "</tr>";
	}

} else {
	while($row = mysqli_fetch_assoc($result2)) {
		$query3 = "SELECT user_handle FROM users where user_id=".$row['maze_author'];
		$result3 = mysqli_query($conn, $query3);
		$author = "";
		while ($row2 = mysqli_fetch_assoc($result3)) {
			$author = $row2['user_handle'];
		}

		echo "<tr>";
		echo "<td><a href='./load.php?id=".$row['maze_id']."'>".$row['maze_name']."</a></td>";
		echo "<td><a href='./user.php?id=".$row['maze_author']."'>".$author."</td>";
		echo "<td>".$row['maze_date']."</td>";
		echo "<td>".$row['maze_rating']."</td>";
		echo "<td>".$row['maze_diff']."</td>";
		echo "<td>".$row['maze_pop']."</td>";
		echo "</tr>";
	}
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
$mysqli_close($conn);
?>
