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
                $update_sql = "UPDATE tbl_admin SET password =  '$new_password' WHERE id =$id";
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

// function to add food
function addFood()
{
    global $conn;
    if (isset($_POST['add-food'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];

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
                $image_name = "food_name" . rand(000, 999) . '.' . $ext;

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

        if (!empty($title) && !empty($description) && !empty($price) && !empty($category) && !empty($featured) && !empty($active)) {

            $sql = "INSERT INTO tbl_food (title, description , price, category_id , featured, active , img) VALUES('$title','$description','$price' , '$category' , '$featured' , '$active' , '$image_name')";
            $query = mysqli_query($conn, $sql);
            if (!$query) {
                echo " <script> alert('failed to add food')</script>";
            }
        } else {
            echo " <script> alert('please fill in the required team')</script>";
        }

        header('location:' . SITEURL . 'admin/manage-food.php');
    }
}



// function to update food

function updateFood()
{
    global $conn;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    if (isset($_POST['update-food'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];

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
                $image_name = "food_name" . rand(000, 999) . '.' . $ext;

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
                echo $active = 'no';
            }
        }

        if (!empty($title) && !empty($description) && !empty($price) && !empty($category) && !empty($featured) && !empty($active)) {

            $sql = "UPDATE tbl_food SET title ='$title', description='$price' , price = '$price'  ,  category_id = '$category' , featured ='$featured'  , active  ='$active' , img ='$image_name' WHERE id =$id";
            $query = mysqli_query($conn, $sql);
            if (!$query) {
                echo " <script> alert('failed to update food')</script>";
            } else {
                header('location:' . SITEURL . 'admin/manage-food.php');
            }
        } else {
            echo " <script> alert('please fill in the required team')</script>";
        }
    }
}

// function to display order
function displayOrder()
{
    global $conn;

    $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        die('query failed' . mysqli_error($conn));
    }

    $sn = 1;

    while ($row = mysqli_fetch_assoc($query)) {

        $id =  $row['id'];
        $food =  $row['food'];
        $price =  $row['price'];
        $quantity =  $row['quantity'];
        $total =  $row['total'];
        $order_date =  $row['order_date'];
        $status =  $row['status'];
        $customer_name =  $row['customer_name'];
        $customer_email =  $row['customer_email'];
        $customer_address =  $row['customer_address'];
        $customer_contact =  $row['customer_contact'];



?>
        <tr>

            <td><?php echo  $sn++ ?></td>
            <td><?php echo  $food ?></td>
            <td><?php echo  $price ?></td>
            <td><?php echo  $quantity ?></td>
            <td><?php echo  $total ?></td>
            <td><?php echo  $order_date ?></td>
            <td><?php
                if ($status === 'ordered') {
                    echo "<label style='color:orange'> $status</label>";
                } elseif ($status === 'canceled') {
                    echo "<label style='color:red'> $status</label>";
                } elseif ($status === 'delivered') {
                    echo "<label style='color:green'> $status</label>";
                } else {
                    echo 'pending';
                }

                ?></td>
            <td><?php echo  $customer_name ?></td>
            <td><?php echo  $customer_contact ?></td>
            <td><?php echo  $customer_email ?></td>
            <td><?php echo  $customer_address ?></td>

            <td>
                <a href="<?php echo SITEURL ?>admin/includes/delete-order.php?id=<?php echo $id ?>" class="btn-danger">delete</a>
                <a href="<?php echo SITEURL ?>admin/update-order.php?update_id=<?php echo $id ?>" class="btn-primary">update</a>

                <!-- <a href="@" class="btn-danger">delete</a> -->
            </td>
        </tr>
<?php

    }
}


// function to update order
function updateOrder()
{
    global $conn;

    if (isset($_GET['update_id'])) {
        $id = $_GET['update_id'];
    }

    if (isset($_POST['update-order'])) {

        $quantity =  $_POST['quantity'];
        $customer_name =  $_POST['name'];
        $customer_email =  $_POST['email'];
        $customer_address =  $_POST['address'];
        $customer_contact =  $_POST['contact'];



        if (isset($_POST['status'])) {
            if ($_POST['status'] === 'ordered') {
                $status = $_POST['status'];
            } else if ($_POST['status'] === 'canceled') {
                $status = $_POST['status'];
            } else if ($_POST['status'] === 'delivered') {
                $status = $_POST['status'];
            } else {
                $status = 'pending';
            }
        }

        $sql = "UPDATE tbl_order set quantity = '$quantity', status = '$status', customer_name = '$customer_name', customer_email = '$customer_email' , customer_address = '$customer_address' , customer_contact  = '$customer_contact' WHERE id = $id";
        $query = mysqli_query($conn , $sql);

        if (!$query) {
            die('query failed' . mysqli_error($conn));
        }

        header('location:' . SITEURL . 'admin/manage-order.php');
    }
}
