<?php include('partials/menu.php');?>

<div class="main-content">
  <div class="wrapper">
    <h1>Change Password</h1>
    <br><br>

    <?php

     if(isset($_GET['id']))
     {
      $id = $_GET['id'];
     }

    ?>

<form action="" method="POST">

<table class="tbl-30">
  <tr>
    <td>Current Password:</td>
    <td>
      <input type="password" name="current_password" placeholder="Current password">
    </td>
  </tr>

<tr>
  <td>New Password:</td>
  <td>
    <input type="password" name="new_password" placeholder="New Password">
  </td>
</tr>

<tr>
  <td>Confirm Password:</td>
  <td>
    <input type="password" name="confirm_password" placeholder="Confirm Password">
  </td>
</tr>

<tr>
 <td colspan="2">
  <input type="hidden" name="id" value="<?php echo $id; ?>">

  <input type="submit" name="submit" value="Change Password" class="btn-secondary">
 </td> 
</tr>

</table>

</form>

  </div>
</div>

<?php
//Check whether the submit Button is clicked on Not
 if(isset($_POST[_('submit')]))
 {
//echo "Clicked"

//1.Get the Data from Form
  $id = $_POST['id'];
  $current_password = md5($_POST['current_password']);
  $new_password = md5 ($_POST['new_password']);
$confirm_password = md5($_POST['confirm_password']);

//2.Check whether the user with current Id and Current Password Exists or Not

  $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

  //Execute the Query 
  $res = mysqli_query($conn, $sql);

  if($res==true)
  {
// Check whether data is available or not
    $count = mysqli_num_rows($res);

    if($count==1)
    {
      //User Exists and Password Can be Changed
      // echo "User Found";

      //Check whether the new password and confirm match or not
      if($new_password==$confirm_password)
      {
        //Update the Password
        $sql2 = "UPDATE tbl_admin SET
    password='$new_password'
    WHERE id=$id
     ";

//Execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Check whether the query exeuted or not
        if($res2==true)
        {
          //Display Success Massage
          //Redirect to Manage Admin Page with Success Massage
           $_SESSION['change-pwd'] = "<div class='success'>Password Change Successfully .</div>";
      header('location:' . SITEURL . 'admin/manage-admin.php');
        }
        else
        {
//Display Error Message
  //Redirect to Manage Admin Page with Error Massage
   $_SESSION['change-pwd'] = "<div class='error'>Failed to Change Password .</div>";
      header('location:' . SITEURL . 'admin/manage-admin.php');

        }

      }
      else
      {
//Redirect to Manage Admin Page with Error Massage
  $_SESSION['pwd-not-match'] = "<div class='error'>Password did Not Match .</div>";
      header('location:' . SITEURL . 'admin/manage-admin.php');
      }
    }
    else
    {
//User Does not exist Set Massage and Redirect
      $_SESSION['user-not-found'] = "<div class='error'>User Not Found .</div>";
      header('location:' . SITEURL . 'admin/manage-admin.php');

    }
  }

//3.Check whether the New Password and confirm Password Match or not.

//4.Change PAssword id all above is true


 }
  

 


?>


<?php include('partials/footer.php');?>