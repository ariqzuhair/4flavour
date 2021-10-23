<?php
    //Include config
    include ('config/constants.php');

    //Get ID to delete
    $id = $_GET['id'];

    //Create SQL Query
    $sql = "DELETE FROM tbl_order WHERE id = $id";

    //Execute Query
    $res = mysqli_query($conn, $sql);
    //Check if it executed

    if($res==TRUE)
    {
        //Successful
        $_SESSION['delete'] ="Order Deleted Successfully.";
        header('location:'.SITEURL.'admin/manage-order.php');
    }
    else
    {
        //Failed
        $_SESSION['delete'] = "Failed to Delete.";
        header('location:'.SITEURL.'admin/manage-order.php');
    }
    //Redirect to Manage Admin with message
?>
