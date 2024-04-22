 <?php
//Include constants.php SITURL
 include('../config/constants.php');

//1.Destory the session.
 session_destroy();
    
//2.Redirect in login Page.
header('location: '.SITEURL.'admin/login.php');
 exit();

?>