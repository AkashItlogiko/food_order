<?php include('partials/menu.php');?>
 

<div class="main-content">
  <div class="wrapper">
    <h1>Add Category</h1>

<br><br>

<?php
if(isset($_SESSION['add']))
{
  echo $_SESSION['add'];
  unset($_SESSION['add']);
}

if(isset($_SESSION['upload']))
{
  echo $_SESSION['upload'];
  unset($_SESSION['upload']);
}

?>
<br><br>

<!-- Add Category Form starts -->
<form action="" method="POST" enctype="multipart/form-data">

<table class="tbl-30">
<tr>
  <td>Title:</td>
  <td>
    <input type="text" name="title" placeholder="Category Title">
  </td>
</tr>

<tr>
  <td>Select Image</td>
  <td>
    <input type="file" name="image">
  </td>
</tr>


<tr>

<td>Featured:</td>
<td>
  <input type="radio" name="featured" value="Yes">Yes
  <input type="radio" name="featured" value="NO">No
</td>

</tr>

<tr>
  <td>Active: </td>
  <td>
    <input type="radio" name="active" value="Yes">Yes

    <input type="radio" name="active" value="No">No
  </td>
</tr>

<tr>
 <td colspan="2">
<input type="submit" name="submit" value="Add Category" class="btn-secondary">
 </td> 
</tr>


</table>

</form>
<!-- Add Category Form Ends-->

<?php
//Check whether the submit Button is Clicked or Not
if(isset($_POST['submit']))
{
  // echo "Clicked"; 
  //1.Get the value Categoy form
  $title=$_POST['title'];

  //For Radip input,we need to check whether the button is selected or not
  if(isset($_POST['featured']))
  {
//Get the value from form 
    $featured =$_POST['featured'];
  }
  else
  {
//Set the Default value
    $featured = "No";
  }
if(isset($_POST["active"]))
{
    $active = $_POST['active'];
}
else
{
    $active = "No";
}
//check whether the image is selected or not and set the value for image name accoridingly
  // print_r($_FILES['image']);
  // die();  

if(isset($_FILES['image']['name']))
{
  //Upload the Image
  //To upload image we need image name,source path and destination path
    $image_name = $_FILES['image']['name'];

    //Upload the Image only if image is selected
  if($image_name !="")
  {

  

            //Auto Rename our Image
            //Get the extension of our image(jpg,png,gf,etc)e.g."spcefood.jpg"

            $ext= (explode('.',$image_name));

        
            
            //Rename the Image
            $image_name = "Food_Category_".rand(000, 999).'.'.$ext;//e.g. Food_category_834.jpg

            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "../images/category/".$image_name;

            //Finally Upload the image
            $upload = move_uploaded_file($source_path, $destination_path);
        // exit($upload);
            //Check whether the image is uploaded or not
            //And if the image is not uploded then we will stop the process and redirect with error message
        if($upload==false)
        {
          //set message
          $_SESSION['upload'] ="<div class='error'>Failed to Upload Image.</div>";
          //Redirect to add category Page
          header('location:'.SITEURL.'admin/add-category.php');
          //Stop the Process
              die();
          }

  }

  }
else
{
  //Don't Upload Image and set image_name value as blank
    $image_name = "";
}



//2.Create SQL Query to insert Categoty into Database
 
  $sql = "INSERT INTO tbl_category SET 
title='$title',
image_name='$image_name',
featured='$featured',
active='$active'
";

//3.Execute the Query and save in Database
  $res = mysqli_query($conn, $sql);

//4.Check wheter the query executed or not and data added or not
if($res==true)
{
  //Query Executed and category Added
  $_SESSION['add'] = "<div class='success'>Category Added Successfully</div>";

  //Redirect to Manage Category Page
    header('location:'.SITEURL.'admin/manage-category.php');
 
}
else
{
  //Failed to Add Category
   $_SESSION['add'] = "<div class='error'>Failed to Add Category</div>";

    header('location:' . SITEURL . 'admin/add-category.php');
 
}


}


?>

  </div>
</div>
<?php include('partials/footer.php');?>