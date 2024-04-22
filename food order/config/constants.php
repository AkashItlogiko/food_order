<?php  
// Start session 
session_start();


// Create constants to store Non Repating values

define('SITEURL','http://localhost/food%20order/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food-order');
 
try {
 $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME) ;  
} catch (\Throwable $th) {
 echo "database not connected";
}
 

?>