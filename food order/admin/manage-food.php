<?php include('partials/menu.php');?>

<div class="main-content">
  
  <div class="wrapper">
  <h1>Manage Food</h1>
<br /><br />

<!-- Button to And Admin -->
<a href="<?php echo SITEURL;  ?>admin/add-food.php" class="btn-primary">Add Food</a>

<br /><br /><br />

<?php
if(isset($_SESSION['add']))
{
  echo $_SESSION['add'];
  unset($_SESSION['add']);
}
if(isset($_SESSION['delete']))
{
  echo $_SESSION['delete'];
  unset($_SESSION['delete']);
}

if(isset($_SESSION['upload']))
{
  echo $_SESSION['upload'];
  unset($_SESSION['upload']);
}

if(isset($_SESSION['unauthorize']))
{
  echo $_SESSION['unauthorize'];
  unset($_SESSION['unauthorize']);
}
if(isset($_SESSION['update']))
{
  echo $_SESSION['update'];
  unset($_SESSION['update']);
}


?>

<table class="tbl-full table">

<tr class="tr">

<th class="th">S.N</th>
<th class="th">Title</th>
<th class="th">Price</th>
<th class="th">Image</th>
<th class="th">Featured</th>
<th class="th">Active</th>
<th class="th">Action</th>

</tr>

<?php
//Create a SQL Query to Get all the food
$sql = "SELECT * FROM tbl_food";

//Execute the query
$res = mysqli_query($conn, $sql);

//Count Rows to check whether we have foods or not
$count = mysqli_num_rows($res);

//Create Serial Number variable and Default value as 1
$sn = 1;

if($count>0)
{
//we have food in database
//Get the Food from Database and Display
while($row=mysqli_fetch_assoc($res)){
  //Get the values from indicidual columns
    $id = $row['id'];
    $title = $row['title'];
    $price = $row['price'];
    $image_name = $row['image_name'];
    $featured = $row['featured'];
    $active = $row['active'];
    ?>

              <tr class="tr">
                  <td class="td"><?php echo $sn++;?></td>

                <td class="td"> <?php echo $title; ?></td>

                <td class="td">$<?php echo  $price; ?></td>

                <td class="td"><?php  //Chack whether we have image or not
                if($image_name=="")
                {
                  //We Do not have image ,Display Error Message
                      echo "<div class='error'>Image not Added.</div>";
                }
                else
                {//we have Image,Display Image
                  ?>
                  <img src="<?php echo SITEURL;  ?>images/food/<?php echo $image_name; ?>" width="100">

                  <?php

                }
                
                ?></td>

                <td class="td"><?php echo $featured; ?></td>

                <td class="td"><?php echo $active; ?></td>
                <td class="td">
                                    

                  <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>

                  <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger"> Delete Food</a>
                
                </td>
              </tr>

          <?php
     }
    }
else
{
  //Food not Added in Database
  echo "<tr> <td colspan='7' class='error'>Food not Added Yet.</td> </tr>";
}


?>

 
</table>

  </div>

</div>

<?php include('partials/footer.php');?>