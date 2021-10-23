<?php include ('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<body>

 <?php include __DIR__.'/sidebar.php';?>
	<link rel="stylesheet" type="text/css" href="css/addForm.css">
      <?php
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];

            $sql = "SELECT * FROM tbl_order WHERE id=$id";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count==1)
            {
                $row=mysqli_fetch_assoc($res);

                $food = $row['food'];
                $price = $row['price'];
                $qty = $row['qty'];
                $total = $row['total'];
                $status = $row['status'];
                $customer_name = $row['customer_name'];
                $customer_contact = $row['customer_contact'];
                $customer_email = $row['customer_email'];
                $customer_address = $row['customer_address'];
            }
            else
            {
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        }
        else
        {
            header('location:'.SITEURL.'admin/manage-order.php');
        }
      ?>

        <div class="container">
		    <div class="title">Update Order</div>
		    <form action="" method="post">
			    <div class="user-details">
				    <div class="input-box">
					    <span class="details">Dessert Name</span>
					    <input type = "text" value= "<?php echo $food; ?>">
				    </div>

				    <div class="input-box">
				    	<span class="details">Price</span>
				    	<input type = "text" value= "RM <?php echo $price; ?>">
				    </div>

                    <div class="input-box">
				    	<span class="details">Quantity</span>
				    	<input type="number" name="qty" value="<?php echo $qty; ?>">
				    </div>

                    <div class="input-box">
				    	<span class="details">Customer Name</span>
				    	<input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
				    </div>

                    <div class="input-box">
				    	<span class="details">Contact</span>
				    	<input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
				    </div>

                    <div class="input-box">
				    	<span class="details">Customer Email</span>
				    	<input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
				    </div>

                    <div class="input-box">
				    	<span class="details">Customer Address</span>
				    	<textarea  name="customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea>
				    </div>

                    <div class="input-box">
				    	<span class="details"> Order Status</span>
				    	<select name="status">
                            <option <?php if($status=="Ordered"){echo "selected";}?>value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){echo "selected";}?>value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";}?>value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";}?>value="Cancelled">Cancelled</option>
                        </select>
				    </div>

                    <div class="input-box">
				    	<span class="details">Status</span>
				    	<select name="service">
                            <option <?php if($status=="Pick Up"){echo "selected";}?>value="Pick Up">Pick Up</option>
                            <option <?php if($status=="Delivery"){echo "selected";}?>value="Delivery">Delivery</option>
                        </select>
				    </div>

			    </div>
			    <div class="button">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    <input type="submit" name="submit" value="Update Order" class="btn-update">
			    </div>
		    </form>

      <?php
        if(isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];

            $total = $price * $qty;

            $status = $_POST['status'];
            $service = $_POST['service'];

            $customer_name = $_POST['customer_name'];
            $customer_contact = $_POST['customer_contact'];
            $customer_email = $_POST['customer_email'];
            $customer_address = $_POST['customer_address'];

            //save order to database
            //create sql
        $sql2 = "UPDATE tbl_order SET
            qty = $qty,
            total = $total,
            status = '$status',
            service = '$service',
            customer_name = '$customer_name',
            customer_contact = '$customer_contact',
            customer_email = '$customer_email',
            customer_address = '$customer_address'
            WHERE id=$id
            ";

            $res2 = mysqli_query($conn, $sql2);

            if($res2==true)
            {
                $_SESSION['update'] = "<div class='success'>Order updated successfully.</div>";
                header('location:'.SITEURL.'admin/manage-order.php');
            }
            else
            {
                $_SESSION['update'] = "<div class='error'>Order failed to update.</div>";
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        }
      ?>
      </body>
</html>

<script src = "js/script.js"></script>
