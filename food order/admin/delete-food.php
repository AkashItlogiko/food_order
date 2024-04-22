<?php
 
 //Include Constants Pages
include ('../config/constants.php');


 
if(isset($_GET['id']) && isset($_GET['image_name']))//Either use '&&' or 'AND'

{
  //Process to Delete 
  // echo "Process to Delete";

 //1.Get ID and Image Name 
  $id = $_GET['id'];
  $image_name = $_GET['image_name'];

//2.Remove the Image if Available
//Check whether the image is availble or and Delete only if available

if($image_name !='')
{
  //If has image and need to remove from folder
  //Get the image Path 
    $path = "../images/food/" . $image_name;

//Remove Image File from Folder

    $remove = unlink($path);

    //Check whether the image is removed or not
    if ($remove == false)
    {
      //Failed to the Removed image
      $_SESSION['upload'] = "<div class='error'>Failed to Remove Image File.</div>";
      //Redirect to Manage Food
      header('location:' . SITEURL . 'admin/manage-food.php');
      //Stop the Process of Deleling Food
      die();

    }
 

}

//3.Delete Food from Database
  $sql = "DELETE FROM tbl_food WHERE id=$id";

  //Execute the Query
  $res = mysqli_query($conn, $sql);

//check whether the query executed or not and set the session message respectively
//4.Redirect to Manage Food with Session Message

if($res==true)
{
  //Food Delete
  $_SESSION['delete']="<div class='success'>Food Deleted Successfully</div>";

    header('location:' . SITEURL . 'admin/manage-food.php');

}
else
{
//Failed Delete Food
  $_SESSION['unauthorize']="<div class='error'>Failed to Delete Food.</div>";

   header('location:' . SITEURL . 'admin/manage-food.php');

}

} 
else 
{

//Redirect to Manage Food Page
  // echo "Redirect";
  $_SESSION['delete'] = "<div class= 'error'>Unauthorized Access.</div>";
  header('location:'.SITEURL.'admin/manage-food.php');


}   

?>
