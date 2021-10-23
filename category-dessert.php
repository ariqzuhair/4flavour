<!DOCTYPE html>

<?php include('partials-front/navbar.php');?>
<html lang="en" dir="ltr">
<?php
    //Check wether id is passed or not
    if(isset($_GET['category_id']))
        {
            //set and get id
            $category_id = $_GET['category_id'];

            //Get title category
            $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

            //execute query
            $res = mysqli_query($conn, $sql);

            //get value
            $row = mysqli_fetch_assoc($res);

            //get title
            $category_title = $row['title'];
        }
    else
        {
            //did not get id back to home
            header('location:'.SITEURL);
        }
        ?>
		<head>
			<link rel="stylesheet" href="css/cat.css">
		</head>

        <body>
          	<div class="circle1"></div>
            <section class="food-menu">
	            <div class="container">
		            <h2 class ="round" style = "margin-top: 60px; text-align:center; color:black" class="text-center">Desserts category</h2>
                    <h3 style = "margin-top: 20px; text-align:center; color:black"> Desserts on <div style = "margin-top: 20px; text-align:center; color:black" "class="text-center"> "<?php echo $category_title; ?>"</h3>
                    <?php
                        //create sql to get dessert
                        $sql2 = "SELECT * FROM tbl_food WHERE category_id=$category_id";
                        //execute
                        $res2 = mysqli_query($conn,$sql2);
                        //count
                        $count2 = mysqli_num_rows($res2);

                        //check dessert availablity
                        if($count2>0)
                        {
                            while($row2=mysqli_fetch_assoc($res2))
                            {
                                $id = $row2['id'];
                                $title = $row2['title'];
                                $price = $row2['price'];
                                $description = $row2['description'];
                                $image_name = $row2['image_name'];
                                ?>

                        <div class="food-menu-box" style = "magrin-top: 50px; margin-left: 50px;">
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
								<img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Cake" class="img-responsive img-curve">
							<?php
							}
						?>
						</div>

						<div class="food-menu-desc" >
							<h4><?php echo $title?></h4>
							<p class="food-price">RM<?php echo $price?></p>
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
    </html>

<?php include('partials-front/footer.php');?>
