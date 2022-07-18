<?php

function addAdmin()
{

    global $conn;
    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        //   you can encrypt your password with md5
        $password = md5($_POST['password']);

        $sql = "INSERT INTO tbl_admin (fullname , username , password) VALUES('$fullname' , '$username' , '$password')";
        $query = mysqli_query($conn, $sql);
    }
}
