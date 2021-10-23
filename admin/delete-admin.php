<?php
    //Include config
    include ('config/constants.php');

    //Get ID to delete
    $adminId = $_GET['id'];

    //Create SQL Query
    $sql = "DELETE FROM tbl_admin WHERE id = $adminId";

    //Execute Query
    $res = mysqli_query($conn, $sql);
    //Check if it executed

    if($res==TRUE)
    {
        //Successful
        $_SESSION['delete'] ="Admin Deleted Successfully.";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed
        $_SESSION['delete'] = "Failed to Delete.";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    //Redirect to Manage Admin with message 
?>