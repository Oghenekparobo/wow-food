<?php include 'includes/admin-header.php' ?>

<?php include 'includes/admin-nav.php' ?>
<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>manage food</h1>

        <br> <br>

        <a href="add-food.php" class="btn-primary">Add Food</a>
        <br> <br> <br>
        <table class="tbl-full">
            <tr>
                <th>s/n</th>
                <th>title</th>
                <th>price</th>
                <th>image</th>
                <th>featured</th>
                <th>active</th>
                <th>actions</th>
            </tr>


            <?php
            $sql = "SELECT * FROM tbl_food";
            $query = mysqli_query($conn, $sql);
            $sn = 1;

            if (!$query) {
                echo  "<script>alert('operation failed') </script>";
            }

            while ($row = mysqli_fetch_assoc($query)) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $img = $row['img'];
                $featured = $row['featured'];
                $active = $row['active'];
            ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $title ?></td>
                    <td><?php echo $price ?></td>
                    <td>
                        <?php

                        if (!empty($img)) {
                        ?>
                            <img src="<?php echo SITEURL ?>images/category_img/<?php echo $img ?>" width="100px" alt="img">
                        <?php
                        } else {
                            echo "<img src='' alt='img'>";
                        }

                        ?>
                    </td>
                    <td><?php echo $featured ?></td>
                    <td><?php echo $active ?></td>
                    <td>
                        <a href="" class="btn-secondary">update</a>
                        <a href="" class="btn-danger">delete</a>
                    </td>
                </tr>
            <?php
            }


            ?>


        </table>
    </div>

</div>
<!-- main content section ends-->

<?php include 'includes/admin-footer.php' ?>?
"