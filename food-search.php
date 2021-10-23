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
        <?php
            $search=$_POST['search'];
        ?>
        <h2 class ="round" style = "margin-top: 60px; text-align:center; color:black" class="text-center">Desserts on Search</h2>
					 <h2> <div style = "margin-top: 20px; text-align:center; color:black" >"<?php echo $search;?>"</div></h2>
        <?php

            //Get search keyword
            $search = $_POST['search'];

            //SQL Query to get food
            $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

            //Execute Query
            $res = mysqli_query($conn,$sql);

            //count rows
            $count = mysqli_num_rows($res);

            //Check dessert availablity
            if($count>0)
            {
                //food available
                while($row= mysqli_fetch_assoc($res))
                {
                    //Get details
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>
                    <div class="food-menu-box" style = "margin-left: 80px; width:90%;">
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
							<img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>"class="img-responsive img-curve" style = "margin-left: 70px; width:100px; height=50%">
						<?php
						}
					?>
					</div>

					<div class="food-menu-desc" >
						<h4><?php echo $title?></h4>
						<p class="food-price">RM <?php echo $price?></p>
						<p class="food-detail"><?php echo $description?></p>
						<br>

						<a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
					</div>
				</div>
                    <?php


                }
            }
            else
            {
                echo "<div class = 'error'>Dessert not found.</div>";
            }
        ?>

            <div class="clearfix"></div>

    </div>
		  </div>
</section>

    </body>
    </html>

<?php include('partials-front/footer.php');?>
