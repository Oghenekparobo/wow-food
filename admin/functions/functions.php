<?php

function addAdmin()
{
    global $conn;
    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        //   you can encrypt your password with md5
        $password = md5($_POST['password']);
        if(!empty( $fullname)  && !empty( $username) && !empty( $password)  ){
            $sql = "INSERT INTO tbl_admin (fullname , username , password) VALUES('$fullname' , '$username' , '$password')";
            $query = mysqli_query($conn, $sql);
    
            if(!$query){
                echo" <script> alert('failed to insert data')</script>";
            }
            header('location:'.SITEURL.'admin/manage-admin.php');
        }else{
            echo" <script> alert('hi, you no get name?')</script>";
        }
     
    }
}
