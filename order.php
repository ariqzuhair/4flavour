<!DOCTYPE html>


<?php include('admin/config/constants.php'); ?>
<html lang="en" dir="ltr">
    <?php
        //check dessert is set
        if(isset($_GET['food_id']))
        {
            //Get the Food id and details
            $food_id = $_GET['food_id'];

            //Get detail
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";

            //Execute
            $res = mysqli_query($conn, $sql);

            //count rows
            $count = mysqli_num_rows($res);
            //Check availablity
            if($count==1)
            {
                //Data available
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                header('location:'.SITEURL);
            }
        }
        else
        {
            //home
            header('location:'.SITEURL);
        }
    ?>
	<head>
        <link rel="stylesheet" href="css/form.css">
	</head>
	<body>
        <div class="container" margin-top="100">
			<div class="title">Booking Form</div>
			<form action="" method="post">


            <div class="food-menu-img">
                <?php
                    //Check img availablity
                    if($image_name=="")
                    {
                        //no
                         echo "<div class='error'>Image not available.</div>";
                    }
                    else
                        {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100" height="100" class="center">
                            <?php
                        }
                    ?>
            </div>

            <div class="food-menu-desc">
                <h3 style="text-align:center"><?php echo $title; ?></h3>
                <input type="hidden" name="food" value="<?php echo $title; ?>">
                    <p style="text-align:center" class="food-price">RM<?php echo $price; ?></p>
                <input type="hidden" name="price" value="<?php echo $price; ?>">

                <div style="text-align:center; margin-top:20px" >Quantity</div>
                    <input style="text-align:center; margin-left:35%" type="number" name="qty" value="1"required>
            </div>

			    <div class="user-details">
					<div class="input-box">
						<span class="details">Name</span>
						<input type="text" name="full-name" placeholder="E.g Ali" required>
					</div>

					<div class="input-box">
						<span class="details">Phone Number</span>
						<input type="tel" name="contact" placeholder="E.g 012 3xxxxxx" required>
					</div>

					<div class="input-box">
						<span class="details">Email</span>
						<input type="email" name="email" placeholder="E.g abc@gmail.com" required>
					</div>

					<div class="input-box">
						<span class="details">Address</span>
						<input type="address" name="address" placeholder="E.g Street,City,Country" required>
					</div>
				</div>

                <br>
                    <td>Service</td>
                    <td>
                      <select name="service" style = "margin-left:33%; margin-top:10px; margin-bottom:10px">
                        <option value="Pick Up">Pick Up</option>
                        <option value="Delivery">Delivery</option>
                      </select>
                    </td>
                  </br>

				<div class="button">
					<input type = "submit" name="submit" value="Order">
				</div>
				<a href="category.php">Cancel Order? Click here!</a>

                <?php
            //check submit button clicked or not
            if(isset($_POST['submit']))
            {
                $food = $_POST['food'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                $total = $price * $qty;

                $order_date = date("Y-m-d h:i:sa");

                $status = "Ordered";
                $service = $_POST['service'];

                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address = $_POST['address'];

                //save order to database
                //create sql
            $sql2 = "INSERT INTO tbl_order SET
                food = '$food',
                price = '$price',
                qty = '$qty',
                total = '$total',
                order_date = '$order_date',
                status = '$status',
                service = '$service',
                customer_name = '$customer_name',
                customer_contact = '$customer_contact',
                customer_email = '$customer_email',
                customer_address = '$customer_address'
                ";
            //execute query

            $res2 = mysqli_query($conn,$sql2);

            //check if executed or not
            if($res2==true)
                {
                    $_SESSION['order'] = "<div class='success text-center'>Dessert ordered successfully.</div>";
                    header('location:'.SITEURL.'order.php');
                }
            else
                {
                    $_SESSION['order'] = "<div class='error text-center'>Failed to order dessert</div>";
                    header('location:'.SITEURL.'order.php');
                }

            }
            ?>
			</form>
		</div>


        <div class="clearfix"></div>
    </body>
</html>
