<!doctype html>
<html class="no-js" lang="en">
	<?php include 'header.php'?>
	<section class="main">
		<div class="medium-4 medium-centered column">
			<form>
				<div class="row maze-dimension">
					<input id="width" class="medium-4 column" type="text" placeholder="Width" value="15"/>
					<p>x</p>
					<input id="height" class="medium-4 column" type="text" placeholder="Height" value = "15"/>
					<a id="create-maze" class="medium-4 column button">Create</a>
				</div>
			</form>
		</div>
		<div class="row">
			<div class="maze medium-centered"></div>
		</div>
		<div class="row">
			<div class="maze-votes search-options medium-6 medium-centered">
				<div class="small-2 columns slider-label">
					<p>Rating:</p>
				</div>
				<div class="small-8 columns">
					<div class="slider" data-slider data-initial-start="3" data-step="1" data-end="5">
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
			<div class="maze-votes search-options medium-6 medium-centered">
				<div class="small-2 columns slider-label">
					<p>Difficulty:</p>
				</div>
				<div class="small-8 columns">
					<div class="slider" data-slider data-initial-start="3" data-step="1" data-end="5">
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
		<div class="row save-button medium-4 medium-centered">
			<div class="medium-6 column">
				<input id="maze-name" type="text" placeholder="Name"/>
			</div>
			<div class="medium-6 column">
				<a id="save-maze" class="button" href="#">Save Maze</a>
			</div>
		</div>
	</section>
	<?php include 'footer.php'?>
</body>
</html>
