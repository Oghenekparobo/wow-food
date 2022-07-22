<?php 
include '../db/db.php';
include './functions/functions.php';
session_destroy();

header('location:' . SITEURL . 'admin/login.php');



?>