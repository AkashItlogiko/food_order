<?php include('partials/menu.php'); ?>

<!-- Main Content section starts -->

<div class="main-content">
  <div class="wrapper">
    
<h1>Manage Admin</h1>

<br/> 

<?php    
if(isset($_SESSION['add'])){

  echo $_SESSION['add'];//Displaying session Massage.
  unset($_SESSION['add']); //Removing session Massage.
}
if(isset($_SESSION['delete']))
{
  echo $_SESSION['delete'];
   unset($_SESSION['delete']);
}

if (isset ($_SESSION['update'])) 
{
  echo $_SESSION['update']; 

  unset($_SESSION['update']);
}
if (isset($_SESSION['user-not-found']))
{
  echo $_SESSION['user-not-found']; 

  unset($_SESSION['user-not-found']);
}
if (isset($_SESSION['pwd-not-match']))
{
  echo $_SESSION['pwd-not-match'];
  unset($_SESSION['pwd-not-match']);
}

if (isset($_SESSION['change-pwd']))
{
  echo $_SESSION['change-pwd'];
  unset($_SESSION['change-pwd']);
}
    

?>
<br><br><br>

<!-- Button to And Admin -->
<a href="add-admin.php" class="btn-primary">Add Admin</a>

<br /><br /><br />

<table class="tbl-full table">

<tr class="tr">

<th class="th">S.N</th>
<th class="th">Full Name</th>
<th class="th">Username</th>
<th class="th">Actions</th>

</tr>

<?php
//Query to Get all Admin
$sql = "SELECT * FROM tbl_admin";
//Execute the Query 
$res = mysqli_query($conn, $sql);

//CHECK whether the Query is Ececuted of Not.
if($res==TRUE)
{
//count Rows to check whether we date in database or not

  $count = mysqli_num_rows($res);//Function to get all the rows in database

  $sn = 1;//create a variable and Assing the value

//chack the num of rows
if($count> 0)
{
//we not have data in Database
while($rows = mysqli_fetch_array($res))
{
//using while loop to get all the data from database
//And while loop run as long as we have data in database

// Get individual Data 
$id=$rows["id"];
$full_name=$rows['full_name'];
$username=$rows['username'];

//Dispaly the values in our Table

?>

<tr class="tr">
  <td class="td"><?php echo $sn++; ?></td>
  <td class="td"><?php echo $full_name ;?></td>
  <td class="td"><?php echo $username ;?></td>
  <td class="td">akashsaha</td>
  <td class="td">

    <a href="<?php echo SITEURL;  ?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>

    <a href="<?php echo SITEURL;  ?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a>

    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger"> Delete Admin</a>
   
  </td>
</tr>

<?php
}
}
else
{
//We Do not Have Data in Database
}

}

?>



</table>
 
  

</div>
</div>
<!-- Menu Content section Ends -->

<?php include('partials/footer.php') ?>


</body>


</html>