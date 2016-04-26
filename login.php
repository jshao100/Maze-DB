<!doctype html>
<html class="no-js" lang="en">
		<?php include 'header.php'?>
		<section class="main">
			<div class="medium-6 large-4 large-push-2 column">
				<div class="signup-panel">
					<p class="welcome">Hello, new user!</p>
					<form action = "./php/signup.php" method="post" class="medium-8 medium-push-2">
						<div class="row collapse">
							<div class="small-12  columns">
								<input type="text" placeholder="Full Name (First Last)" name="name">
							</div>
						</div>
						<div class="row collapse">
							<div class="small-12  columns">
								<input type="text" placeholder="Username" name="handle">
							</div>
						</div>
						<div class="row collapse">
							<div class="small-12 columns ">
								<input type="password" placeholder="Password (minimum 8 characters)" name="password">
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
			<div class="medium-6 large-4 large-pull-2 column">
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
		<?php include 'footer.php'?>
	</body>
</html>
