<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<link rel="stylesheet" href="css/form.css">
		<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
  		<link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div class="container">
			<div class="title">Registration Form</div>
			<form action="includes/signup_incl.php" method="post">
				<div class="user-details">
					<div class="input-box">
						<span class="details">Full Name</span>
						<input type="text" name="name" placeholder="Full name">
					</div>

					<div class="input-box">
						<span class="details">Email</span>
						<input type="text" name="email" placeholder="Email">
					</div>

					<div class="input-box">
						<span class="details">Username</span>
						<input type="text" name="uid" placeholder="Username">
					</div>

					<div class="input-box">
						<span class="details">Password</span>
						<input type="password" name="pwd" placeholder="Password">
					</div>

					<div class="input-box">
						<span class="details">Repeat Password</span>
						<input type="password" name="pwdrepeat" placeholder="Repeat Password">
					</div>
				</div>

				<div class="button">
					<input type = "submit" name="submit" value="Register">
				</div>
				<a href="login.php">Already a member? Login here!</a>

			</form>
			<?php
			if (isset($_GET["error"])) {
				if ($_GET["error"] == "emptyinput") {
					echo "<p>Fill in all fields!</p>";
				}
				else if ($_GET["error"] == "invaliduid") {
					echo "<p>Choose a proper username!</p>";

				}else if ($_GET["error"] == "invalidemail") {
					echo "<p>Choose a proper email</p>";
				}
				else if ($_GET["error"] == "passwordsdontmatch") {
					echo "<p>Password doesn't match!</p>";
				}
				else if ($_GET["error"] == "stmtfailed") {
					echo "<p>Something went wrong, try again!</p>";
				}
				else if ($_GET["error"] == "usernametaken") {
					echo "<p>Username exist!</p>";
				}
				else if ($_GET["error"] == "none") {
					echo "<p>You have signed up!</p>";
				}
			}
		?>
		</div>
	</body>
</html>
