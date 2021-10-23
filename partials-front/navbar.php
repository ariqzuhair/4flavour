<?php include('admin/config/constants.php'); ?>

<?php session_start();?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>4 Flavour Desserts</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/index.css">
		    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
  	  	<link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    </head>
    <header>
        <nav class="navbar">
    		<div class="inner-width">
      			<a href="index.php" class="logo">4Flavour</a>
      			<div class="navbar-menu">
        			<a href="index.php">Home</a>
       				<a href="category.php">Menu</a>
					<a href="dessert.php">Dessert</a>
					<a href="contactus.php">contact</a>
          <?php
            if(isset($_SESSION["usersuid"])) {
              echo "<a href='booking.php'><span class='glyphicon glyphicon-user'>";
                echo "<a href='includes/logout_incl.php'><span class='glyphicon glyphicon-log-in'></span> Log Out</a>";
            }
            else {
              echo "<a href='signup.php'><span class='glyphicon glyphicon-user'> </span> Sign Up</a>";
                 echo "<a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a>";
            }
          ?>
     			</div>
    		</div>
        </nav>
    </header>
</html>
