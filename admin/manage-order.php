<?php include ('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<body>

 <?php include __DIR__.'/sidebar.php';?>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
      echo "<body style='background-color:#F3E4C9'>";

			<h2>Manage Order</h2>
      <br>
      <?php
          if(isset($_SESSION['update']))
          {
            echo $_SESSION['update'];
            unset ($_SESSION['update']);
          }
        ?>
            <table class="styled-table">
          <thead>
				  <tr>
                    <th>S.N.</th>
                    <th>Dessert</th>
                    <th>Price</th>
                    <th>Qty.</th>
                    <th>&nbsp&nbspTotal</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Service</th>
                    <th>Customer Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
				  </tr>
        </thead>
<?php
    $sql = "SELECT * FROM tbl_order ORDER BY id DESC";//display latest order

    $res = mysqli_query($conn,$sql);

    $count = mysqli_num_rows($res);

    $sn = 1;

    if($count>0)
    {
      while($row=mysqli_fetch_assoc($res))
      {
        $id = $row['id'];
        $food = $row['food'];
        $price = $row['price'];
        $qty = $row['qty'];
        $total = $row['total'];
        $order_date = $row['order_date'];
        $status = $row['status'];
        $service = $row['service'];
        $customer_name = $row['customer_name'];
        $customer_contact = $row['customer_contact'];
        $customer_email = $row['customer_email'];
        $customer_address = $row['customer_address'];
        ?>
        <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $food; ?></td>
            <td>&nbsp&nbspRM<?php echo $price; ?></td>
            <td>&nbsp&nbsp<?php echo $qty; ?></td>
            <td>RM<?php echo $total; ?></td>
            <td><?php echo $order_date; ?></td>

            <td>
              <?php
                if($status=="Ordered")
                {
                  echo "<label>$status</label>";
                }
                else if($status=="On Delivery")
                {
                  echo "<label>$status</label>";
                }
                else if($status=="Delivered")
                {
                  echo "<label>$status</label>";
                }
                else if($status=="Cancelled")
                {
                  echo "<label>$status</label>";
                }
              ?>
            </td>

            <td>&nbsp&nbsp<?php echo $service; ?></td>
            <td><?php echo $customer_name; ?></td>
            <td><?php echo $customer_contact; ?>&nbsp</td>
            <td><?php echo $customer_email; ?></td>
            <td><?php echo $customer_address; ?></td>
            <td>
              <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id ?>" class="btn-update">Update</a>
            	<a href="<?php echo SITEURL; ?>admin/delete-order.php?id=<?php echo $id; ?>" class="btn-delete">Delete</a>
            </td>
          </tr>
          <?php
      }
    }
    else
    {
      echo "<tr><td colspan='12' class='error'>Orders not available</tr></td>";
    }
  ?>
        </table>
</body>
</html>

<script src = "js/script.js"></script>
