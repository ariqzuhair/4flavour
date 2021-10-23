<?php include ('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<body>
 <?php include __DIR__.'/sidebar.php';?>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
  	<link rel="stylesheet" type="text/css" href="css/table.css">
      <body style='background-color:#F3E4C9'>";
			<br><br>
			<h2>Manage Admin</h2>
			<!--add admin-->
			<br/>

			<?php
			if(isset($_SESSION['add']))
				{
					echo $_SESSION['add'];//Display message
					unset($_SESSION['add']);//Remove message
				}

			if(isset($_SESSION['delete']))
				{
					echo $_SESSION['delete'];
					unset ($_SESSION['delete']);
				}

			if(isset($_SESSION['update']))
				{
					echo $_SESSION['update'];
					unset ($_SESSION['update']);
				}
			if(isset($_SESSION['user-not-found']))
				{
					echo $_SESSION['user-not-found'];
					unset ($_SESSION['user-not-found']);
				}
			if(isset($_SESSION['pwd-not-match']))
				{
					echo $_SESSION['pwd-not-match'];
					unset ($_SESSION['pwd-not-match']);
				}
			if(isset($_SESSION['pwd-not-match']))
				{
					echo $_SESSION['change-pwd'];
					unset ($_SESSION['change-pwd']);
				}
			?>
			<br><br>
			<a href="add-admin.php" class="btn-add">Add Admin</a>
			<br/><br/>
			<table class="styled-table">
        <thead>
				<tr>
					<th>S.N.</th>
					<th>Full Name</th>
					<th>Username</th>
					<th>Actions</th>
				</tr>
      </thead>

				<?php
					//Query to Get all Admin
					$sql = "SELECT * FROM tbl_admin";

					//Execute the Query
					$res = mysqli_query($conn, $sql);

					//Check wether the Query is Executed or not
					if($res==TRUE)
					{
						//Data in database
						$count = mysqli_num_rows($res);//Get all the rows in database

						$sn=1; //Create variable and assign value

						//check num of row
						if($count>0)
						{
							while($rows=mysqli_fetch_assoc($res))
							{
							//Get individual data
								$adminId=$rows['id'];
								$adminName=$rows['full_name'];
								$adminUid=$rows['username'];

								//Display in Table

								?>
									<tr>
										<td><?php echo $sn++;?></td>
										<td><?php echo $adminName;?></td>
										<td><?php echo $adminUid;?></td>
										<td>
											<a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $adminId; ?>" class="btn-add">Change Password</a>
											<a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $adminId; ?>" class="btn-update">Update</a>
											<a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $adminId; ?>" class="btn-delete">Delete</a>
										</td>
									</tr>

								<?php

								}
							}
							else
							{
								//Data we dont have
							}
						}
						?>

			</table>


</body>
</html>

<script src = "js/script.js"></script>
