<!DOCTYPE html>
<?php include('partials-front/navbar.php');?>
<html lang="en" dir="ltr">
	<head>
		<link rel="stylesheet" href="css/index.css">
		<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
  		<link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<?php
			if(isset($_SESSION['order']))
			{
				echo $_SESSION['order'];
				unset ($_SESSION['order']);
			}
		?>

		<div class="circle1"></div>
		<section id="home">
    		<div class="content1">
      			<div class="title">
        			<h1>Quality Cake ...<br>with sweet, egg,<br>and breads</h1>
      			</div>
     			<div class="image"></div>
    		</div>
    		<div class="content2">
      			<div class="image"></div>
      			<div class="title">
					<p>Satisfy your taste with our delightful handmade dessert.</p>
        			<a href="category.php" class="btn-explore"><button>Explore</button></a>
      			</div>
    		</div>
    		<div class="social-container">
      			<ul class="social-icons">
        			<li><a href="https://www.facebook.com/"><i class="fa fa-facebook-f"></i></a></li>
        			<li><a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
        			<li><a href="https://twitter.com/home?lang=en"><i class="fa fa-twitter"></i></a></li>
      			</ul>
    		</div>
  		</section>
	</body>
	
<script src="https://kit.fontawesome.com/4f337ab72d.js" crossorigin="anonymous"></script>
</html>

<script src = "js/script.js"></script>
