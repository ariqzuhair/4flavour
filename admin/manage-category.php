<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<body>
 <?php include __DIR__.'/sidebar.php';?>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
  <link rel="stylesheet" type="text/css" href="css/table.css">
      echo "<body style='background-color:#F3E4C9'>";
			<br><br>
			<h2>Manage Category</h2>
			<!--add order-->
			<br/>

      <?php
        if(isset($_SESSION['add']))
        {
          echo $_SESSION['add'];
          unset($_SESSION['add']);
        }

        if(isset($_SESSION['remove']))
        {
          echo $_SESSION['remove'];
          unset($_SESSION['remove']);
        }

        if(isset($_SESSION['delete']))
        {
          echo $_SESSION['delete'];
          unset($_SESSION['delete']);
        }

        if(isset($_SESSION['no-category-found']))
        {
          echo $_SESSION['no-category-found'];
          unset($_SESSION['no-category-found']);
        }

        if(isset($_SESSION['update']))
        {
          echo $_SESSION['update'];
          unset($_SESSION['update']);
        }

        if(isset($_SESSION['upload']))
        {
          echo $_SESSION['upload'];
          unset($_SESSION['upload']);
        }

        if(isset($_SESSION['failed-remove']))
        {
          echo $_SESSION['failed-remove'];
          unset($_SESSION['failed-remove']);
        }

       ?>

			<br><br>
			<a href="add-category.php" class="btn-add">Add Category</a>
			<br/><br/>

      <table class="styled-table">
          <thead>
				<tr>
					<th>S.N.</th>
					<th>Title</th>
					<th>Image</th>
          <th>Featured</th>
          <th>Active</th>
          <th>Actions</th>


				</tr>
      </thead>

        <?php

            //Query to get all categories from database
            $sql = "SELECT * FROM tbl_category";

            //Execute query
            $res = mysqli_query($conn, $sql);

            //Count rows
            $count = mysqli_num_rows($res);

            //Count serial number variable
            $sn=1;

            //Check whether we have data in database or not
            if($count>0)
            {
              //We have data in database
              while($row=mysqli_fetch_assoc($res))
              {
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];

                ?>
                <tr>
                  <td><?php echo $sn++; ?></td>
                  <td><?php echo $title; ?></td>
                  <td>
                    <?php
                      //Check whether image name is available or not
                      if($image_name!="")
                      {
                        //Display the image
                        ?>
                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>"width="150px">
                        <?php
                      }
                      else
                      {
                        //Display the message
                        echo "<div class ='error'>Image not added.</div>";
                      }
                    ?>

                  </td>
                  <td><?php echo $featured; ?></td>
                  <td><?php echo $active; ?></td>

                  <td>
                    <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-update">Update</a>
                    <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete</a>

                  </td>

                </tr>
                <?php
              }
            }
            else
            {
              //We don't have data
              ?>

              <tr>
                <td colspan="6"><div class="error">No Categories Added.</div></td>
              </tr>

              <?php
            }

         ?>

      </table>
    </body>
  </html>
