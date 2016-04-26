<!doctype html>
<html class="no-js" lang="en">
		<?php include 'header.php'?>
		<section class="main">
			<div class="row">
				<div class="title medium-centered medium-6 column">
					<h2>Start searching mazes.</h2>
				</div>	
			</div>
			<div class="row">
				<form action="./search.php" method="post">
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

		<?php include 'footer.php'?>

	</body>
</html>
