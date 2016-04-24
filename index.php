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
							<li><a href="#">MY MAZES</a></li>
							<li><a class="button" href="./login.php">Login/Sign Up</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</section>

		<section class="main">
			<div class="row">
				<div class="title medium-centered medium-6 column">
					<h2>Get Started</h2>
				</div>	
			</div>
			<div class="row">
				<form method="post">
					<div class="search medium-centered medium-6 column">
						<div class="row">
							<div class="medium-9 column search-bar no-padding">
								<input id="search_field" type="search" placeholder="Search database..." autocomplete="off" name="search_text">
							</div>
							<div class="medium-3 column search-button no-padding">
								<input id="search_button" class="button" type="submit" value="Search">
							</div>
						</div>
						<div class="row">
							<div class="switch large medium-2 medium-centered">
								<input class="switch-input" id="user-maze" type="checkbox" name="search_type">
								<label class="switch-paddle" for="user-maze">
									<span class="switch-active" aria-hidden="true">User</span>
									<span class="switch-inactive" aria-hidden="true">Maze</span>
								</label>
							</div>
						</div>
						<div class="row">
							<div class="search-options">
								<div class="small-2 columns slider-label">
									<p>Rating:</p>
								</div>
								<div class="small-8 columns">
									<div class="slider" data-slider data-initial-start="0" data-step="1" data-end="5">
										<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput1"></span>
										<span class="slider-fill" data-slider-fill></span>
									</div>
								</div>
								<div class="small-2 columns span-label">
									<input type="number" id="sliderOutput1" name="rating">
									<span>& up</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="search-options">
								<div class="small-2 columns slider-label">
									<p>Difficulty:</p>
								</div>
								<div class="small-8 columns">
									<div class="slider" data-slider data-initial-start="0" data-step="1" data-end="5">
										<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
										<span class="slider-fill" data-slider-fill></span>
									</div>
								</div>
								<div class="small-2 columns span-label">
									<input type="number" id="sliderOutput2" name="difficulty">
									<span>& up</span>
								</div>
							</div>
						</div>
					</div>
				</form>
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
