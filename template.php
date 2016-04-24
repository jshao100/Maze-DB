<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Maze DB | Browse and Create</title>

		<link rel="stylesheet" href="./stylesheets/foundation.css"/>
		<link rel="stylesheet" href="./stylesheets/app.css"/>
	</head>
	<body>
		<section class="contain-to-grid sticky">
			<nav class="top-bar" data-topbar role="navigation" data-options="">
				<div class="row">
					<div class="top-bar-left">
						<ul class="menu">
							<li class="menu-text">aMAZEing DB</li>
							<li><a href="./create.php">CREATE</a></li>
							<li><a href="./index.php">SEARCH</a></li>
							<li><a href="#">RANDOM</a></li>
						</ul>
					</div>
					<div class="top-bar-right">
						<ul class="menu">
<?php
	if (isset($_COOKIE["handle"])) {
		echo "<li><a href='#'>".$_COOKIE["handle"]."'s Mazes</a></li>";
		echo "<li><a class='button' href='./logout.php'>Logout</a></li>";
	} else {
		echo '<li><a class="button" href="./login.php">Login/Sign Up</a></li>';
	}
?>
						</ul>
					</div>
				</div>
			</nav>
		</section>

		<section class="main">
		</section>

		<section class="footer">
			<div class="row column">
				<hr/>
				<div class="medium-6 column">
					<ul class="menu">
						<li>Maze DB</li>
					</ul>
				</div>
				<div class="medium-6 column">
					<ul class="menu right-footer">
						<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</div>
			</div>
		</section>
		<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="./js/vendor/foundation.min.js"></script>
		<script>
			$(document).foundation();
		</script>
	</body>
</html>
