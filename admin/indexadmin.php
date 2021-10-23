<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
		<body>

 <?php include __DIR__.'/sidebar.php';?>

 <div class="section white-text center" style="background: #F3E4C9; margin-top: -120px; ">

 	<div class="row " style="padding: 200px; ">
 		<div class="col s12">

			 	<h1><div style = " text-align: center; margin-left: 220px; color:black; ">Dashboard </div> </h1>

 			<a class="dash-btn" href="manage-admin.php"><div class="sec white white-text" style="margin: 15px; margin-left: 220px;text-align: center; color:black; padding: 40px;border: 2px; border-radius: 20px; font-size: 20px; background: #FFAD6A;">Manage Admin</div></a>
 			<a class="dash-btn" href="manage-category.php"><div class="sec white white-text" style="margin: 15px; margin-left: 220px; text-align: center; color:black; padding: 40px;border: 2px; border-radius: 20px; font-size: 20px; background: #FFAD6A;">Category</div></a>
 			<a class="dash-btn" href="manage-dessert.php"><div class="sec white white-text" style="margin: 15px; margin-left: 220px; text-align: center; color:black; padding: 40px;border: 2px; border-radius: 20px; font-size: 20px; background: #FFAD6A;">Dessert</div></a>
 			<a class="dash-btn" href="manage-order.php"><div class="sec white white-text" style="margin: 15px; margin-left: 220px; text-align: center; color:black; padding: 40px;border: 2px; border-radius: 20px; font-size: 20px; background: #FFAD6A;">Order</div></a>




		</div>

 	</div>

 </div>


</body>
</html>
