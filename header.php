
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Maze DB | Browse and Create</title>

	<link rel="stylesheet" href="./stylesheets/foundation.css"/>
	<link rel="stylesheet" href="./stylesheets/app.css"/>
	<link rel="stylesheet" href="./stylesheets/maze.css"/>
	<link rel="stylesheet" href="./stylesheets/login.css"/>
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
