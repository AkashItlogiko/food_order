<?php include('partials/menu.php') ;?>

<div class="main-content">
  <div class="wrapper">
    <h1> Add Admin</h1>

<br><br>

<?php
if(isset($_SESSION['add'])) //chaking wheter the session is set of Not

{

  echo $_SESSION['add']; //Dispaly the session massage if set
  unset($_SESSION['add']);//Removed session Massage
 
}



?>


<form action="" method="POST">

<table class="tbl-30">
<tr>
  <td>Full Name :</td>
  <td><input type="text" name="full_name" placeholder="Enter Your Name">
</td>
</tr>

<tr>
<td>Username :</td>
<td>
  <input type="text" name="username" placeholder="Username">
</td>

</tr>

<tr>
<td>Passowrd :</td>
<td>

  <input type="password" name="password" placeholder="Your Password">

</td>
</tr>

<tr>
  <td colspan="2">
<input type="submit" name="submit" value="Add Admin" class="btn-secondary">
  </td>
</tr>



</table>

</form>

  </div>
</div>

<?php include('partials/footer.php') ;?>



<?php
// Process the value from Form and Save it in Database

// Check whether the submit button is clicked or not

if(isset($_POST['submit']))
{
  // button clicked
  // echo "Button clicked";

  //1. Get the Data from form 
$full_name = $_POST['full_name'];
$username = $_POST['username'];
$password = md5($_POST['password']);//Password Encryption with MD5
  
   
//2. SQL Query to save the data into database

$sql = "INSERT INTO tbl_admin SET
full_name ='$full_name',
username ='$username',
password ='$password'

";

// Executing Query and saving Data into Database.

$res = mysqli_query($conn,$sql)  ;
 
//4. Check whether the (Query is Executed)data is inserted or not and display appropriate message.
if($res==TRUE)
{
  // Data Inserted. 
  // echo "Data Inseted";
  // Create a session variable to Dispaly massage.
  $_SESSION['add']="<div class='admin-successfully'>Admin Added Successfully. </div>";

  // Redirect Page to  admin
header("location:".SITEURL.'admin/manage-admin.php');


}else{

// Faild to Inser Data.
// echo "Faild to Insert Data";
// Create a session variable to Dispaly massage.
  $_SESSION['add']="Faild to Add Admin";

  // Redirect Page to  admin
header("location:".SITEURL.'admin/add-admin.php');

}



}





?>