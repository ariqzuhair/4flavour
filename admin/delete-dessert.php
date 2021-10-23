<?php
include ('config/constants.php');

//Check whether the id and image_name value is set or not
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
  //Get the value and delete
  $id = $_GET['id'];
  $image_name = $_GET['image_name'];

  //Remove the physical image file is available
  if($image_name != "")
  {
    //Image is available. So remove it
    $path = "../images/food/".$image_name;
    //Remove the image
    $remove = unlink($path);

    //If failed to remove image then add error message and stop process
    if($remove==false)
    {
      //Set the session message
      $_SESSION['upload'] = "<div class='error'>Failed to Remove Dessert Image.</div>";
      //Redirect to manage category page
      header('location:'.SITEURL.'admin/manage-dessert.php');
      //Stop the process
      die();

    }

  }
  //Delete data from database
  //SQL query delete data from database
  $sql = "DELETE FROM tbl_food WHERE id = $id";

  //Execute Query
  $res = mysqli_query($conn, $sql);

  //Check whether the data is delete form database or not
  if($res==TRUE)
  {
      //Successful
      $_SESSION['delete'] ="<div class='success'>Dessert Deleted Successfully.</div>";
      header('location:'.SITEURL.'admin/manage-dessert.php');
  }
  else
  {
      //Failed
      $_SESSION['delete'] = "<div class='error'>Failed to Delete Dessert.</div>";
      header('location:'.SITEURL.'admin/manage-dessert.php');
  }

  //Redirect to manage dessert page with message


}
else
{
    //Redirect to manage dessert page
    $_SESSION['unauthorize'] = "<div class= 'error'>Unauthorized Access. </div>";
    header('location:'.SITEURL.'admin/manage-dessert.php');
}


?>
