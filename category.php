<!DOCTYPE html>

<?php include('partials-front/navbar.php');?>
<html lang="en" dir="ltr">
			<head>
			<link rel="stylesheet" href="css/cat.css">
			</head>

<!-- Category Section start here -->
		<div class="circle1"></div>
<body>
<section class="food-menu">
	<div class="container">
		<h2 class ="round" style = "margin-top: 60px; text-align:center; color:black" class="text-center">Explore Desserts</h2>
        <br>
</div>
		<?php
            //Display All categories that are active
            $sql="SELECT * FROM tbl_category WHERE active='Yes'";

            $res=mysqli_query($conn,$sql);
            //count rows
            $count=mysqli_num_rows($res);

            //check data exist or not
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    //Declare Value
                    $id=$row['id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    ?>
                        <a href="<?php echo SITEURL;?>category-dessert.php?category_id=<?php echo $id;?>">
                            <div class="box-3 float-container">
                            <?php
							//Check if image is available
							if($image_name=="")
                                {
                                    echo"<div class='error'>Image not available</div>";
                                }
							else
							{
							?>
								<img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" class="img-responsive img-curve" height="250px">
							<?php
							}
							?>
                                <h3 class='float-text text-white'><?php echo $title; ?></h3>
                            </div>
                        </a>
                    <?php
                }
            }
            else
            {
                echo"<div class='error'>Category Not Found</div>";
            }
        ?>
        <div class="clearfix"></div>
    </div>
</section>

<section class="food-menu">
	<div class="container">
		<h2 class ="round" style = " text-align:center; color:black" class="text-center"">Featured Desserts</h2>
<?php
//Getting data from database
$sql="SELECT * FROM tbl_food WHERE featured='Yes'";

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

		<div class="food-menu-box"style = "margin-left: 70px;">
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
					<img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" class="img-responsive img-curve" style = "width:100px; height=50%">
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
	echo"<div class='error'>Desert Not Available</div>";
}

?>
<div class="clearfix"></div>

</div>
    		</div>
</section>

</body>
</body>
</html>
<!-- Category Section end here -->

<?php include('partials-front/footer.php');?>
