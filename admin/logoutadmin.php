<?php

  //include constants.php for SITEURL
  include __DIR__.'/config/constants.php';
  //1.Destroy the _SESSION
  session_start();
  session_unset();
  session_destroy(); //unsets $_SESSION['user']

  //2.redirect to login page
  header("location: ../index.php");
  exit();

  ?>
