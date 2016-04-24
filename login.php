<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Maze DB | Browse and Create</title>

		<link rel="stylesheet" href="./stylesheets/foundation.css"/>
		<link rel="stylesheet" href="./stylesheets/app.css"/>
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
							<li><a href="#">MY MAZES</a></li>
							<li><a href="./login.php" class="button">Login/Sign Up</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</section>

		<section class="main">
			<div class="medium-6 column">
				<div class="signup-panel">
					<p class="welcome">Hello, new user!</p>
					<form action = "./php/signup.php" method="post" class="medium-8 medium-push-2">
						<div class="row collapse">
							<div class="small-12  columns">
								<input type="text" placeholder="Full Name" name="name">
							</div>
						</div>
						<div class="row collapse">
							<div class="small-12  columns">
								<input type="text" placeholder="Username" name="handle">
							</div>
						</div>
						<div class="row collapse">
							<div class="small-12 columns ">
								<input type="password" placeholder="Password" name="password">
							</div>
						</div>
						<div class="row collapse">
							<div class="small-12 columns ">
								<input type="password" placeholder="Re-type Password" name="password2">
							</div>
						</div>
						<button type="submit" class="button medium-4 medium-push-4">Sign Up!</button>
					</form>
				</div>
			</div>
			<div class="medium-6 column">
				<div class="signup-panel">
					<p class="welcome">Welcome back!</p>
					<form action="./php/login.php" method="post" class="medium-8 medium-push-2">
						<div class="row collapse">
							<div class="small-12  columns">
								<input type="text" placeholder="Username" name="handle">
							</div>
						</div>
						<div class="row collapse">
							<div class="small-12 columns ">
								<input type="password" placeholder="Password" name="password">
							</div>
						</div>
						<button type="submit" class="button medium-4 medium-push-4">Login In</button>
					</form>
				</div>
			</div>
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
