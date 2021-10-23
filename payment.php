<!DOCTYPE html>

<?php include('partials-front/navbar.php');?>

<html lang="en" dir="ltr">

			<head>
				<link rel="stylesheet" href="css/cat.css">
			</head>

      <?php
        if(isset($_SESSION['add']))
        {
          echo $_SESSION['add'];
          unset($_SESSION['add']);
        }

        if(isset($_SESSION['upload']))
        {
          echo $_SESSION['upload'];
          unset($_SESSION['upload']);
        }

       ?>

    <section class="food-menu">
		<div class="container">
			<h2 class="text-center">Fill the form to confirm your order.</h2>

            <form action="" method="POST" class="order" enctype="multipart/form-data">

                <fieldset>
                    <legend>Please fill up all the detail</legend>

                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g Ali" class="input-responsive"required>

                    <div class="order-label">Account Bank Number</div>
                    <input type="text" name="account" placeholder="E.g 0123xxxxxx" class="input-responsive"required>

                    <div class="order-label">Bank Type</div>
                    <input type="text" name="bank" placeholder="E.g maybank" class="input-responsive"required>
                    <br>

                    <tr>
                        <td>Please upload the receipt : </td>
                        <td>
                          <input type="file" name="image" required style = " margin-top:10%">
                        </td>
                    </tr>

                    <input type="submit" name="submit" value="Confirm Order" class= "btn btn-primary" style = "margin-left:37%; margin-top:10%">
                  </br>

                </fieldset>
            </form>

            <?php

            if(isset($_POST['submit']))
            {
                $customer_bankname = $_POST['full-name'];
                $customer_accbank = $_POST['account'];
                $customer_banktype = $_POST['bank'];
                $payment = "Complete";

                if(isset($_FILES['image']['name']))
                {
                  //upload the image
                  //To upload image we need image name, source path and destination path
                  $image_name = $_FILES['image']['name'];

                  //Upload image only if image is selected
                  if($image_name != "")
                  {


                    //Auto rename our image
                    //Get the extension of our image


                    //Rename the image
                     // e.g. Food_Category_834.jpg

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/payment/".$image_name;

                    //Finally upload the image
                    $upload = move_uploaded_file($src,  $dst);

                    //Check whether the image is uploaded or not
                    //And if the image is not uploaded then we will stop the process and redirect with error message
                    if($upload==false)
                    {
                      //Set message
                      $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                      //Redirect to Add Category Page
                      header('location:'.SITEURL.'payment.php');
                      //Stop the process
                      die();
                    }

                }

                }
                else
                {
                  //Don't upload image and set the image_name value as blank
                  $image_name="";
                }



                //save order to database
                //create sql
            $sql = "INSERT INTO tbl_payment SET
                customer_bankname = '$customer_bankname',
                customer_accbank = '$customer_accbank',
                customer_banktype = '$customer_banktype',
                payment = '$payment',
                image_name = '$image_name',
                ";
            //execute query

            $res = mysqli_query($conn,$sql);

            //check if executed or not
            if($res==true)
                {
                    $_SESSION['payment'] = "<div class='success text-center'>Dessert ordered successfully.</div>";
                    header('location:'.SITEURL.'order.php');
                }
            else
                {
                    $_SESSION['payment'] = "<div class='error text-center'>Failed to order dessert</div>";
                    header('location:'.SITEURL.'order.php');
                }

            }
            ?>
		<body>
        <div class="clearfix"></div>
        </body>
</html>

<?php include('partials-front/footer.php');?>
