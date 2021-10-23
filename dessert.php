<!DOCTYPE html>

<?php include('partials-front/navbar.php');?>

<html lang="en" dir="ltr">

	<head>
		<link rel="stylesheet" href="css/cat.css">
	</head>

	<body>
		<div class="circle1"></div>
		<section class="food-menu">
			<div class="container">
				<h2 class ="round" style = "margin-top: 60px; text-align:center; color:black" class="text-center">Desserts</h2>

				<form action="<?php echo SITEURL; ?>food-search.php"method="POST">
					<input style = "margin-left: 500px;" type="search" name="search" placeholder="Search for Desserts..." required>
					<input type="submit" name="submit" value="search" class="btn btn-primary">
				</form>

				<?php
				//Getting data from database
				$sql="SELECT * FROM tbl_food WHERE active='Yes'";

				$res=mysqli_query($conn,$sql);
				$count=mysqli_num_rows($res);

				//check data exist or not
				if($count>0)
				{
					//Data exist
					while($row=mysqli_fetch_assoc($res))
					{
						//Declare Value
						$id=$row['id'];
						$title=$row['title'];
						$price=$row['price'];
						$description=$row['description'];
						$image_name=$row['image_name'];
						?>

						<div class="food-menu-box"style = "margin-left: 70px; width:90%;">
							<div class="food-menu-img">
								<?php
									//Checi if image is availble
									if($image_name=="")
									{
										echo"<div class='error'>Image not Available</div>";
									}
									else
									{
										?>
										<img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" class="img-responsive img-curve" style = "margin-left: 70px; width:100px; height=50%">
										<?php
									}
									?>
							</div>
							<div class="food-menu-desc" >
								<h4><?php echo $title?></h4>
								<p class="food-price">RM <?php echo $price?></p>
								<p class="food-detail"><?php echo $description?></p><br>
								<a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
							</div>
						</div>
						<?php
					}
				}
				else
				{
					echo"<div class='error'>Desert Not Available</div>";
				}
				?>
				<div class="clearfix"></div>
			</div>
		</section>
	</body>
</html>