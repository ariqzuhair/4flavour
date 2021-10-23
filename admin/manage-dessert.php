<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<body>
 <?php include __DIR__.'/sidebar.php';?>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
      echo "<body style='background-color:#F3E4C9'>";
			<br><br>
			<h2>Manage Dessert</h2>
			<!--add order-->
			<br/>

      <?php
      if(isset($_SESSION['add']))
      {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }

      if(isset($_SESSION['delete']))
      {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
      }

      if(isset($_SESSION['upload']))
      {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
      }

      if(isset($_SESSION['unauthorize']))
      {
        echo $_SESSION['unauthorize'];
        unset($_SESSION['unauthorize']);
      }

      if(isset($_SESSION['no-dessert-found']))
      {
        echo $_SESSION['no-dessert-found'];
        unset($_SESSION['no-dessert-found']);
      }

      if(isset($_SESSION['failed_remove']))
      {
        echo $_SESSION['failed_remove'];
        unset($_SESSION['failed_remove']);
      }

      if(isset($_SESSION['update']))
      {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
      }
      ?>


			<br><br>
			<a href="add-dessert.php" class="btn-add">Add Dessert</a>
			<br/><br/>

			<table class="styled-table">
        <thead>
				<tr>
					<th>S.N.</th>
					<th>Title</th>
					<th>Price</th>
					<th>Image</th>
          <th>Featured</th>
          <th>Active</th>
          <th>Actions</th>

				</tr>
      </thead>

				<?php
					//Create SQL query to get all the food
					$sql = "SELECT * FROM tbl_food";

					//Execute the Query
					$res = mysqli_query($conn, $sql);

          //Count rows to check whether we have foods or not
          $count = mysqli_num_rows($res);

          //Create serial number variable and set default value as 1
          $sn=1;

          if($count>0)
          {
            //We have food in database
            //Get the food from database and Display
            while($row=mysqli_fetch_assoc($res))
            {
              //get the values from individual columns
              $id = $row['id'];
              $title = $row['title'];
              $price = $row['price'];
              $image_name = $row['image_name'];
              $featured = $row['featured'];
              $active = $row['active'];

              ?>

            <tr>
              <td><?php echo $sn++; ?> </td>
              <td><?php echo $title; ?></td>
              <td><?php echo $price; ?></td>
              <td>
                <?php
                  //Check whether we have image or not
                  if($image_name=="")
                  {
                    //We do not have image, display error message
                    echo "<div class = 'error'> Image not added.</div>";
                  }
                  else
                  {
                    //We have image, display image
                    ?>
                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>"width="100px">
                    <?php
                  }
                 ?>
              </td>
              <td><?php echo $featured; ?></td>
              <td><?php echo $active; ?></td>
              <td>
                <a href="<?php echo SITEURL; ?>admin/update-dessert.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-update">Update</a>
                <a href="<?php echo SITEURL; ?>admin/delete-dessert.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete</a>

              </td>
            </tr>

              <?php

            }

          }
          else
          {
            //Food not added in Database
            echo "<tr><td colspan='7' class='error'> Food not added yet </td></tr>";
          }

				?>

			</table>


</body>
</html>

<script src = "js/script.js"></script>
