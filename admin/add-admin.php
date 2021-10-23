<?php include ('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<body>

  <?php include __DIR__.'/sidebar.php';?>
     <link rel="stylesheet" type="text/css" href="css/addForm.css">
     
     <br><br>
    <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];//Display Message
            unset ($_SESSION['add']);//Remove Message
        }
    ?>

    <div class="container">
		<div class="title">Add admin</div>
		<form action="" method="post">
			<div class="user-details">
				<div class="input-box">
					<span class="details">Full Name</span>
					<input type="text" name="full_name" placeholder="Full Name">
				</div>

				<div class="input-box">
					<span class="details">Username</span>
					<input type="text" name="username" placeholder="Username">
				</div>

                <div class="input-box">
					<span class="details">Password</span>
					<input type="password" name="password" placeholder="Password">
				</div>
			</div>
			<div class="button">
				<input type = "submit" name="add-adminbtn" value="Add Admin">
			</div>

            <?php
                if(isset($_POST['add-adminbtn']))
                {
                    $adminName = $_POST['full_name'];
                    $adminUid = $_POST['username'];
                    $adminPwd= md5($_POST['password']);

                    $sql = "INSERT INTO tbl_admin SET
                    full_name ='$adminName',
                    username ='$adminUid',
                    password ='$adminPwd'
                    ";
                    $res = mysqli_query($conn, $sql)or die(mysqli_error($conn));

                    if($res==TRUE)
                    {
                        //Data Insert
                        //Create a Session Variable to Display Message
                        $_SESSION['add'] = "Admin Added Successfully";
                        //redirect Admin to Manage Admin
                        header("location: manage-admin.php");
                    }
                    else
                    {
                        //Failed to Insert Data
                        $_SESSION['add'] = "Failed to Add Admin";
                        //redirect Admin to Manage Admin
                        header("location: /manage-admin.php");
                        
                    }
                }
            ?>
		</form>
	</div>




















