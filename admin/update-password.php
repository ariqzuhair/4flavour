<?php include ('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<body>
 <?php include __DIR__.'/sidebar.php';?>
	<link rel="stylesheet" type="text/css" href="css/addForm.css">
            <?php
                if(isset($_GET['id']))
                {
                    $id=$_GET['id'];
                }
            ?>

    <div class="container">
		<div class="title">Update Password</div>
		<form action="" method="post">
			<div class="user-details">
				<div class="input-box">
					<span class="details">Old Password</span>
					<input type="password" name="current_pwd" placeholder="Old Password">
				</div>

				<div class="input-box">
					<span class="details">New Password</span>
					<input type="password" name="new_pwd" placeholder="New Password">
				</div>

                <div class="input-box">
					<span class="details">Confirm Password</span>
					<input type="password" name="confirm_pwd" placeholder="Confirm Password">
				</div>
			</div>
			<div class="button">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Change Password" class="btn-update">
			</div>
		</form>
        <?php
            if(isset($_POST['submit']))
            {
                //Get data
                $adminId = $_POST['id'];
                $adminPowd = md5($_POST['current_pwd']);
                $new_pwd =  md5($_POST['new_pwd']);
                $confirm_pwd = md5($_POST['confirm_pwd']);

                //Check User and Password exist
                $sql = "SELECT * FROM tbl_admin
                WHERE id='$adminId'
                AND password='$adminPowd'
                ";

                //Check New and Confirm match
                $res = mysqli_query($conn, $sql);

                if($res==true)
                {
                    $count = mysqli_num_rows($res);

                    if($count==1)
                    {
                        if($new_pwd==$confirm_pwd)
                        {
                            echo "Password Match";
                            $sql2 = "UPDATE tbl_admin SET
                            password = '$new_pwd'
                            WHERE id= $adminId
                            ";

                            $res2 = mysqli_query($conn, $sql2);
                            if ($res2==true)
                            {
                                $_SESSION['change-pwd'] = "Password Changed Successfully.";
                                header('location:'.SITEURL.'admin/manage-admin.php');
                            }
                            else
                            {
                                $_SESSION['change-pwd'] = "Failed to change Password.";
                                header('location:'.SITEURL.'admin/manage-admin.php');
                            }
                        }
                        else
                        {
                            $_SESSION['pwd-not-match'] = "Password did not match.";
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                    }
                    else
                    {
                        $_SESSION['user-not-found'] = "User not Found.";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }

                }
                //Change Password
            }
        ?>
	</div>
<script src = "js/script.js"></script>
