<?php
ob_start();
session_start();
define('SITEURL' , 'http://localhost/wow-food/');
$conn = mysqli_connect('localhost' , 'root' , '' , 'food-order');
if(!$conn){
    echo "<script>alert('connection failed')</script>";
}
 ?>