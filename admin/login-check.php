<?php
    //autherization user control
    //check either the user login or no
    if(!isset($_SESSION['user'])) //if user session not set
    {
      //user not log in
      //redirect to login page with message
      $_SESSION['no-login-message'] = "<div> class='error'>Please login to access admin panel</div>";
      //redirect to login page
      header('location:' .SITEURL. 'loginadmin.php');
    }
?>
