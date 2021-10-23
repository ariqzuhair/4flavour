<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="css/addForm.css">
  </head>
  <body>
    <?php include __DIR__.'/sidebar.php';?>

    <?php
      if(isset($_SESSION['upload']))
      {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
      }
     ?>

    <div class="container">
		  <div class="title">Add Dessert</div>
		    <form action="" method="post" enctype="multipart/form-data">
			    <div class="user-details">
				    <div class="input-box">
					    <span class="details">Dessert Name</span>
					    <input type="text" name="title" placeholder="Name">
			    	</div>

          <div class="input-box w100">
            <span>Describe the Food!</span>
              <textarea required="" style="width: 276px; height: 49px;"></textarea>
          </div>

          <div class="input-box">
					    <span class="details">Price</span>
					    <input type="number" name="price" placeholder="Name">
			    </div>

          <div class="input-box">
					    <span class="details">Select Image</span>
					    <input type="file" name="image">
				   </div>

          <div class="input-box">
					    <span class="details">Category</span>
					    <select name="category" >

                <?php
                  //create PHP code to display categories from database
                  //1/ Create SQL to get all active categories from database
                  $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                  //Executing query
                  $res = mysqli_query($conn, $sql);

                  //Count rows to check whether we have categories or not
                  $count = mysqli_num_rows($res);

                  //If count is greater than zero, we have categories else we do not have categories
                  if($count>0)
                  {
                    //We have categories
                    while($row = mysqli_fetch_assoc($res))
                    {
                      //get the details of categories
                      $id = $row['id'];
                      $title = $row['title'];

                      ?>

                      <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                      <?php
                    }
                  }
                  else
                  {
                      //We do not have categories
                      ?>
                      <option value="0">No Categories Found</option>
                      <?php

                  }
                  //2. Display on dropdown
                 ?>
              </select>
			    </div>

          <div class="featured-details">
              <input type="radio" name="featured" id="dot-1">
              <input type="radio" name="featured" id="dot-2">
              <span class="featured-title">Featured</span>
              <div class="category">
                <label for="dot-1">
                  <span class="dot one"></span>
                  <span class="yn">Yes</span>
                </label>

                <label for="dot-2">
                  <span class="dot two"></span>
                  <span class="yn">No</span>
                </label>
              </div>
          </div>

          <div class="featured-details">
              <input type="radio" name="active" id="dot-3">
              <input type="radio" name="active" id="dot-4">
              <span class="featured-title">Active</span>
              <div class="category">
                <label for="dot-3">
                  <span class="dot three"></span>
                  <span class="yn">Yes</span>
                </label>

                <label for="dot-4">
                  <span class="dot four"></span>
                  <span class="yn">No</span>
                </label>
              </div>
          </div>
          <div class="button">
				    <input type = "submit" name="submit" value="Add Dessert">
			    </div>
        </form>
      </div>

      <?php

        //Check whether the button is clicked or not
        if (isset($_POST['submit']))
        {
            //Add the Food in database
            //echo "Clicked";

            //1. Get the data from form
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            //Check whether radion button for feature and active are checked or not
            if (isset($_POST['featured']))
            {
             $featured = $_POST['featured'];
            }
            else
            {
              $featured = "No"; //Setting the default value
            }

            if(isset($_POST['active']))
            {
              $active = $_POST['active'];
            }
            else
            {
              $active = "No"; //Setting default value
            }

            //2. Upload the image if selected
            //Check whether the select image is clicked or not and upload the image only if the image is selected
            if(isset($_FILES['image']['name']))
            {
              //Get the details of the selected image
              $image_name = $_FILES['image']['name'];

              //Check whether the image is selected or not and upload image only if selected
              if($image_name!= "")
              {
                //Image is selected
                //1. Rename the image
                //Get the extension of selected image


                //Create new name for image
                //New image name

                //2. Upload the image
                //Get the src path and destination path

                //Source path is the current location of the image
                $src = $_FILES['image']['tmp_name'];

                //Destination path for the image to be uploaded
                $dst = "../images/food/".$image_name;

                //Finally upload food image
                $upload = move_uploaded_file($src,  $dst);

                //Check whether image uploaded or not
                if($upload==false)
                {
                  //Failde to upload image
                  //Redirect to Add Order page with error message
                  $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                  header('location:'.SITEURL.'admin/add-dessert.php');
                  //Stop process
                  die();
                }
              }
            }
            else
            {
              $image_name = "";
            }

            //3. Insert into Database

            //Create an SQL query to save or add food
            //For numerical we do not need to pass value inside quotes '' but for string value it is compulsory to add quotes ''
            $sql2 = "INSERT INTO tbl_food SET
            title = '$title',
            description = '$description',
            price = $price,
            image_name = '$image_name',
            category_id = $category,
            featured = '$featured',
            active = '$active'
            ";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);
            //Check whether data inserted or not

            //4. Redirect with Message to manage food page
            if($res2 == true)
            {
              //Data inserted Successfully
              $_SESSION['add'] = "<div class = 'success'>Food added successfully.</div>";
              header ('location:'.SITEURL.'admin/manage-dessert.php');
            }
            else
            {
              //Failed to insert data
              $_SESSION['add'] = "<div class = 'failed'>Failed to add food.</div>";
              header ('location:'.SITEURL.'admin/manage-dessert.php');
            }
        }
     ?>
  </div>
</div>
