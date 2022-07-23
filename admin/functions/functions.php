<?php

// function to display admin
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

// function to update admin

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

// function to change admin password
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


// function to login
function login()
{
    global $conn;

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM tbl_admin  WHERE password = '$password' AND username = '$username'";
        $query = mysqli_query($conn, $sql);

        if (!$query) {
            echo " <script> alert('hi, you no get name?')</script>";
        }

        $login_check = mysqli_num_rows($query);
        if ($login_check === 1) {
            header('location:' . SITEURL . 'admin');
            $_SESSION['user'] = $username;
        } else {
            echo " <script> alert('password do not match')</script>";
        }
    }
}


// function to add category
function addCategory()
{

    global $conn;

    if (isset($_POST['add-category'])) {
        $title = $_POST['title'];

        if (isset($_FILES['image']['name'])) {
            //    upload image;
            // image nameF
            $image_name = $_FILES['image']['name'];

            if (!empty($image_name)) {
                // auto rename our image
                // get the extension of our image .jpg .gif .png e.t.c
                $ext1 = explode('.', $image_name);
                $ext = end($ext1);

                // rename the image
                $image_name = "food_category" . rand(000, 999) . '.' . $ext;

                // source path
                $source_path = $_FILES['image']['tmp_name'];
                // destination path
                $destination_path = '../images/category_img/' . $image_name;

                // function to upload the image
                $upload = move_uploaded_file($source_path, $destination_path);
                if (!$upload) {
                    echo " <script> alert('failed to upload image')</script>";
                }
            }
        }

        if (isset($_POST['featured'])) {
            if ($_POST['featured'] === 'yes') {
                $featured = $_POST['featured'];
            } else {
                $featured = 'no';
            }
        }
        if (isset($_POST['active'])) {
            if ($_POST['active'] === 'yes') {
                $active = $_POST['active'];
            } else {
                $active = 'no';
            }
        }

        if (!empty($title) && !empty($featured) && !empty($active)  && !empty($image_name)) {
            $sql = "INSERT INTO tbl_category (title ,img, featured , active) VALUES('$title','$image_name','$featured','$active')";
            $query = mysqli_query($conn, $sql);

            if (!$query) {
                echo " <script> alert('query failed')</script>";
            }
        } else {
            echo " <script> alert('please fill in the required feild')</script>";
        }

        header('location:' . SITEURL . 'admin/manage-category.php');
    }
}

