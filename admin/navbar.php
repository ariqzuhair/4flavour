<?php
 session_start();
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>4 Flavour Desserts</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/styles.css">
    </head>
<body>

  <body>
        <header>
            <img class="logo" src="images/textlogo.png" alt="logo">
            <nav>
                <ul class="nav_links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="category.php">Category</a></li>
                    <li><a href="dessert.php">Desserts</a></li>

                </ul>
            </nav>
            <nav>
      </li>
    </ul>


    <ul class="nav_users">

		<?php
			if(isset($_SESSION["usersuid"])) {
				echo "<li><a href='profile.php'><span class='glyphicon glyphicon-user'> </span> Profile page</a></li>";
			    echo "<li><a href='includes/logout_incl.php'><span class='glyphicon glyphicon-log-in'></span> Log Out</a></li>";
			}
			else {
				echo "<li><a href='signup.php'><span class='glyphicon glyphicon-user'> </span> Sign Up</a></li>";
			     echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
			}
	?>
</ul>


      </nav>
      <a class="cta" href="contactus.php"><button>Contact Us</button></a>
  </header>
  </div>

</body>
</html>
