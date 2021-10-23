<?php include ('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<body>

 <?php include __DIR__.'/sidebar.php';?>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
      echo "<body style='background-color:#FFAD6A'>";

			<h2>Manage Payment</h2>
      <br>
      <?php
          if(isset($_SESSION['update']))
          {
            echo $_SESSION['update'];
            unset ($_SESSION['update']);
          }
        ?>
            <table class="tbl-full">
				  <tr>
                    <th>S.N.</th>
                    <th>Customer Name</th>
                    <th>Account bank number</th>
                    <th>Bank Type</th>
                    <th>Receipt</th>
                    <th>Actions</th>
				  </tr>
<?php
    $sql= "SELECT * FROM tbl_payment ORDER BY id DESC";//display latest order

    $res= mysqli_query($conn,$sql);

    $count = mysqli_num_rows($res);

    $sn = 1;

    if($count>0)
    {
      while($row=mysqli_fetch_assoc($res))
      {
        $id = $row['id'];
        $customer_bankname = $row['full-name'];
        $customer_accbank = $row['account'];
        $customer_banktype = $row['bank'];
        $payment = $row['payment'];
        $image_name = $row['image_name'];
        ?>
        <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $customer_bankname; ?></td>
            <td>&nbsp<?php echo $customer_accbank; ?></td>
            <td>&nbsp<?php echo $customer_banktype; ?></td>
            <td><?php echo $payment; ?></td>
            <td>
              <?php
                //Check whether image name is available or not
                if($image_name!="")
                {
                  //Display the image
                  ?>
                  <img src="<?php echo SITEURL; ?>images/payment/<?php echo $image_name; ?>"width="150px">
                  <?php
                }
                else
                {
                  //Display the message
                  echo "<div class ='error'>Image not added.</div>";
                }
              ?>

            </td>

            <td>
            	<a href="<?php echo SITEURL; ?>admin/delete-payment.php?id=<?php echo $id; ?>" class="btn-delete">Delete</a>
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
