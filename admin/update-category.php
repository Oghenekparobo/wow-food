<?php include 'includes/admin-header.php' ?>

<?php include 'includes/admin-nav.php' ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = "SELECT * FROM tbl_category WHERE id =$id";
$query = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($query)) {

    $id = $row['id'];
    $title = $row['title'];
    $current_img = $row['img'];
    $featured = $row['featured'];
    $active = $row['active'];
}

if (isset($_POST['update-category'])) {
    $title = $_POST['title'];

    if (isset($_FILES['image']['name'])) {
        //    upload image;
        // image nameF
        $image_name = $_FILES['image']['name'];
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
            echo " <script> alert('failed to update image')</script>";
        } 

        if(!empty($current_img)){
            $remove_path =  '../images/category_img/'.$current_img;
            $remove = unlink($remove_path);
        }
    }else {
         $image_name = $current_img;
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

    $sql = "UPDATE tbl_category SET title ='$title' , img ='$image_name' , featured= '$featured' , active= '$active' WHERE id = $id";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        echo " <script> alert('query failed')</script>";
    }

    header('location:' . SITEURL . 'admin/manage-category.php');
}
?>

<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>title:</td>
                    <td><input type="text" name="title" value="<?php echo $title ?>" placeholder="category_title"></td>
                </tr>
                <tr>
                    <td>featured:</td>
                    <td>
                        <input <?php if ($featured === 'yes') {
                                    echo 'checked';
                                } ?> type="radio" name="featured" value="yes">yes
                        <input <?php if ($featured === 'no') {
                                    echo 'checked';
                                } ?> type="radio" name="featured" value="no">no
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <?php
                        if (!empty($current_img)) {
                        ?>
                            <img src='<?php echo SITEURL ?>images/category_img/<?php echo $current_img ?>' width='100px ' alt='image'>";
                        <?php
                        }



                        ?>
                        <input type="file" name="image">
                    </td>
                </tr>


                <tr>
                    <td>active:</td>
                    <td>
                        <input <?php if ($active === 'yes') {
                                    echo 'checked';
                                } ?> type="radio" name="active" value="yes">yes
                        <input <?php if ($active === 'no') {
                                    echo 'checked';
                                } ?> type="radio" name="active" value="no">no
                    </td>
                </tr>
                <tr>

                    <td colspan="2">
                        <input type="submit" name="update-category" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <br><br>



    </div>
    <!-- main content section ends-->


    <?php include 'includes/admin-footer.php' ?>