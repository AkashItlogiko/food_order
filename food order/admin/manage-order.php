<?php include('partials/menu.php');?>

<div class="main-content">
  
  <div class="wrapper">
  <h1>Manage Order</h1>


<br /><br /><br />

<?php  
if(isset($_SESSION['update']))
{
  echo $_SESSION['update'];
  unset($_SESSION['update']);
}

?>

<table class="table2"> <!--Display the latest order at first-->

<tr class="tr">

<th class="th">S.N</th>    
<th class="th">Food</th>
<th class="th" style="padding-left: 5px;">Price</th>
<th class="th" style="padding-left: 5px;">Qty</th>
<th class="th" style="padding-left: 5px;">Total</th>
<th class="th">Order Date</th>
<th class="th" style="padding-left: 5px;">Status</th>
<th class="th">Customer Name</th>
<th class="th">Customer Contact</th>
<th class="th">Email</th>
<th class="th">Address</th>
<th class="th">Actions</th>

</tr>

<?PHP  
//Get all the orders from database
$sql = "SELECT * FROM tbl_order ORDER BY id DESC";
//Exexute Query
$res = mysqli_query($conn, $sql);
//count the Rows
$count = mysqli_num_rows($res);

$sn = 1; //Create a serial Number and set its initail value as 1

if($count>0)
{
  //Order Available
  while($row=mysqli_fetch_assoc($res))
  {
    //Get All the order details
    $id = $row['id'];
    $food = $row['food'];
    $price = $row['price'];
    $qty = $row['qty'];
    $total = $row['total'];
    $order_date = $row['order_date'];
    $status = $row['status'];
    $customer_name = $row['customer_name'];
    $customer_contact = $row['customer_contact'];
    $customer_email = $row['customer_email'];
    $customer_address = $row['customer_address'];

    ?>
            <tr class="tr">
              <td class="td"><?php echo $sn++ ;?>.</td>
              <td class="td"><?php echo $food ;?></td>
              <td class="td"><?php echo $price ;?></td>
              <td class="td"><?php echo $qty ;?></td>
              <td class="td"><?php echo $total;?></td>
              <td class="td"><?php echo $order_date;?></td>
             
              <td class="td" style="padding-left: 5px;">
              
              <?php 
              //Ordered,on Delivery,Delivered,Cancelled
             if($status=="ordered")
             {
              echo "<label>$status</label>";
             }
             elseif($status=="On Delivery")
             {
              echo "<label style='color: orange;'>
              $status</label>";
             }
            elseif($status=="Delivered")
             {
              echo "<label style='color: green;'>
              $status</label>";
             }
           elseif($status=="Cancelled")
             {
              echo "<label style='color: red;'>
              $status</label>";
             }
         
              ?>
            
            </td>

              <td class="td"><?php echo $customer_name ;?></td>
              <td class="td"><?php echo $customer_contact ;?></td>
              <td class="td"><?php echo $customer_email ;?></td>
              <td class="td"><?php echo $customer_address ;?></td>
              <td class="td">

                <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
            
              
              </td>
            </tr>
    <?php
  }
}
else
{
//Order Not Available  
  echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
}

?> 


</table>

  </div>

</div>

<?php include('partials/footer.php');?>