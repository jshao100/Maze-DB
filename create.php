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
			<div class="row save-button">
				<div class="medium-2 medium-centered">
					<a id="save-maze" class="button" href="#">Save Maze</a>
				</div>
			</div>
		</section>
		<?php include 'footer.php'?>
	</body>
</html>
