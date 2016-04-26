
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
						<li><a class="image create-image" href="./create.php"></a></li>
						<li><a class="image search-image" href="./index.php"></a></li>
						<li><a class="image random-image" href="./php/random.php"></a></li>
					</ul>
				</div>
				<div class="top-bar-right">
					<ul class="menu">
<?php
if (isset($_COOKIE["handle"])) {
	echo "<li><a href='./user.php?handle=".$_COOKIE['handle']."'>My Mazes</a></li>";
	echo "<li><a class='button' href='./php/logout.php'>Logout</a></li>";
} else {
	echo '<li><a class="button" href="./login.php">Login/Sign Up</a></li>';
}
?>
				</ul>
			</div>
		</div>
	</nav>
</section>
