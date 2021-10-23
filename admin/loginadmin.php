<?php include ('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<body>
		<link rel="stylesheet" type="text/css" href="css/adminform.css">
		<div class="container">
			<div class="title">Admin Login</div>
			<form action="" method="post">
				<div class="user-details">
					<div class="input-box">
						<span class="details">Username</span>
						<input type="text" name="username" placeholder="Enter username">
					</div>

					<div class="input-box">
						<span class="details">Password</span>
						<input type="password" name="password" placeholder="Enter Password">
					</div>
				</div>

				<div class="button">
						<input type = "submit" name="submitadmin" value="Login">
					</div>
			</form>
		</div>
	</body>
</html>
<?php
	//check wether submit button is click or no
	if (isset($_POST["submitadmin"])) {
	//process for login
	//1.get data from login form
	$adminName = $_POST['username'];
	$adminPwd = md5($_POST['password']);

	//2. sql to check wether the user with username and password exists or not
	$sql = "SELECT * FROM tbl_admin WHERE username = '$adminName' AND password ='$adminPwd' ";

	//3. execute the Query
	$res = mysqli_query($conn, $sql);

	//4. Count rows to check wheter the user exists or not
	$count = mysqli_num_rows($res);

	if($count==1)
	{
		//user available and login sucess
		$_SESSION['login'] = "<div class = 'success' >Login Successful.</div>";
		$_SESSION['username'] = $adminName; //To check either the user is logged in or not and logout will unset it.
		//redirect to Home page
		header('location:'.SITEURL.'admin/indexadmin.php');
	}
	else
		{
			//user not available and login success
			$_SESSION['login'] = "<div class ='error' >Username or Password is not match.</div>";
			//redirect to Home page
			header('location:'.SITEURL.'admin/loginadmin.php');
			}
		}
?>
