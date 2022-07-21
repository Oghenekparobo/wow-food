<?php

function addAdmin()
{
    global $conn;
    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        //   you can encrypt your password with md5
        $password = md5($_POST['password']);
        if (!empty($fullname)  && !empty($username) && !empty($password)) {
            $sql = "INSERT INTO tbl_admin (fullname , username , password) VALUES('$fullname' , '$username' , '$password')";
            $query = mysqli_query($conn, $sql);

            if (!$query) {
                echo " <script> alert('failed to insert data')</script>";
            }
            header('location:' . SITEURL . 'admin/manage-admin.php');
        } else {
            echo " <script> alert('hi, you no get name?')</script>";
        }
    }
}


function updateAdmin()
{
    global  $conn;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    if (isset($_POST['update'])) {
        $username =  $_POST['username'];
        $fullname = $_POST['fullname'];
        $password = md5($_POST['password']);


        $sql = "UPDATE tbl_admin SET  fullname = '$fullname' , username = '$username' , password = '$password' WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        if (!$query) {
            echo " <script> alert('update failed')</script>";
        }
        header('location:' . SITEURL . 'admin/manage-admin.php');
    }
}

function changeAdminPassword()
{
    global  $conn;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }



    if (isset($_POST['change'])) {
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password = '$current_password '";
        $query = mysqli_query($conn, $sql);

        if (!$query) {
            echo " <script> alert('operation  failed')</script>";
        } else {
            if ($new_password !== $confirm_password) {
                echo "<script> alert('password do not match')</script>";
            } else {
                $update_sql = "UPDATE tbl_admin SET password =  '$new_password' ";
                $update_query = mysqli_query($conn,   $update_sql);
                if (!$update_query) {
                    echo " <script> alert('update failed')</script>";
                 
                 
                }
            }
        }


        header('location:' . SITEURL . 'admin/manage-admin.php');
    }
}
