<?php include 'includes/admin-header.php' ?>

<?php include 'includes/admin-nav.php' ?>
<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br> <br>
        <a href="add-category.php" class="btn-primary">Add Category</a>
        <br> <br><br>

        <table class="tbl-full">
            <tr>
                <th>s/n</th>
                <th>title</th>
                <th>image</th>
                <th>featured</th>
                <th>active</th>
                <th>actions</th>
            </tr>

            <?php

            $sql = "SELECT * FROM tbl_category";
            $query = mysqli_query($conn, $sql);
            $sn = 1;

            if (!$query) {
                echo " <script> alert('query failed')</script>";
            }

            while ($row = mysqli_fetch_assoc($query)) {
                $id = $row['id'];
                $title = $row['title'];
                $img = $row['img'];
                $featured = $row['featured'];
                $active = $row['active'];
            ?>

                <tr>
                    <td><?php echo $sn++ ?></td>
                    <td><?php echo $title ?></td>
                    <td><?php

                        if (!empty($img)) {
                        ?>
                            <img src="<?php echo SITEURL?>images/category_img/<?php echo $img ?>" width="100px" alt="img">
                        <?php
                        } else {
                            echo "<img src='' alt='img'>";
                        }

                        ?>
                    </td>
                    <td><?php echo $featured ?></td>
                    <td><?php echo $active ?></td>
                    <td>
                        <a href="<?php echo SITEURL ?>admin/update-category.php?id=<?php echo $id ?>&image_name =<?php echo $img ?>  "   class="btn-secondary">update</a>
                        <a href="<?php echo SITEURL ?>admin/includes/delete-category.php?id=<?php echo $id ?>"  class="btn-danger">delete</a>
                    </td>
                </tr>
            <?php
            }


            ?>


        </table>
    </div>



</div>
<!-- main content section ends-->

<?php include 'includes/admin-footer.php' ?>