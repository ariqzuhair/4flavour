<!DOCTYPE html>

<html lang="en" dir="ltr">
	<body>
		<link rel="stylesheet" type="text/css" href="css/form.css">
		<div class="container">
			<div class="title">Login</div>
			<form action="includes/login_incl.php" method="post">
				<div class="user-details">
					<div class="input-box">
						<span class="details">Username</span>
						<input type="text" name="uid" placeholder="Username">
					</div>

					<div class="input-box">
						<span class="details">Password</span>
						<input type="password" name="pwd" placeholder="Password">
					</div>

					<div class="question">
						<a href="admin/loginadmin.php">Are you an admin? Click here</a>
					</div>
				</div>

				<div class="button">
						<input type = "submit" name="submit" value="Login">
					</div>

				<?php
					if (isset($_GET["error"])) {
						if ($_GET["error"] == "emptyinput") {
							echo "<p>Fill in all fields!</p>";
						}
						else if ($_GET["error"] == "wronglogin") {
							echo "<p>Incorrect login information!</p>";

						}
					}
				?>
			</form>
		</div>
	</body>
</html>
