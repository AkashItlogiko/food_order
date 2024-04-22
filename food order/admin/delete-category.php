<?php
//Include Constants File
include('../config/constants.php');


// echo"Delete Page";
//Check whether the id image_name value is set or not
if(isset($_GET['id'])AND isset($_GET['image_name']))
{
//Get the value and Delete
  // echo "Get Value and Delete";
  $id = $_GET['id'];
  $image_name = ['image_name'];
  //Remove the physical image file is available 
if($imae_name !="")
{
//Image is Available.so removed it
    $path = "../images/category/".$image_name;
    //Removed the Image
    $remove = unlink($path);

    //IF failed to remove image then add an error message and stop the process.
    if($remove==false)
    {
//set the session Message
      $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";
//Redirect to Manage Category page
      header('location:' . SITEURL . 'admin/mange-category.php');
//Stop the Peocess
      die();
    }

}
  //Delete Data from Database 
  //SQL Query ti Delete data from Database
  $sql = "DELETE FROM tbl_category WHERE id=$id";

//Execute the Query
  $res = mysqli_query($conn, $sql);

  //Check whether the data is delete from database or not
  if($res==true) 
  {
    //set success Message and Redirect
    $_SESSION['delete']="<div class='success'>Category Deleted Successfully.</div>";
    //Redirect to Manage Category
    header("location:" . SITEURL . 'admin/manage-category.php');

  }
  else
  {
//Set Fail Message and Redirect
 $_SESSION['delete']="<div class='error'>Failed to Delete catagory.</div>";
  }

  
}
else
{
  //Redirect to manage Category Page
  header('location:' . SITEURL . 'admin/manage-category.php');
}


?>