<?php include 'includes/admin-header.php' ?>

<?php include 'includes/admin-nav.php' ?>


<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>manage admin</h1>
        <br> <br>
        <!-- button to add admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br> <br> <br>

        <table class="tbl-full">
            <tr>
                <th>s/n</th>
                <th>fullname</th>
                <th>username</th>
                <th>actions</th>
            </tr>
            <?php
            // get admin data from database
            $sql = "SELECT * FROM tbl_admin";
            $query = mysqli_query($conn, $sql);
            $i = 1;

            if (!$query) return "<script>alert('operation failed')</script>";

            // display admin data on page

            while ($row = mysqli_fetch_assoc($query)) {
                $id =  $row['id'];
                $fullname = $row['fullname'];
                $username = $row['username'];
            ?>
                <tr>
                    <td><?php echo  $i++ ?></td>
                    <td><?php echo  $fullname ?></td>
                    <td><?php echo  $username ?></td>
                    <td>
                        <a href="<?php echo SITEURL ?>admin/update-admin.php?id=<?php echo $id ?>" class="btn-secondary">update</a>
                        <a href="<?php echo SITEURL ?>admin/change-password.php?id=<?php echo $id ?>" class="btn-primary">change password</a>
                        <a href="<?php echo SITEURL ?>admin/includes/delete-admin.php?id=<?php echo $id ?>" class="btn-danger">delete</a>
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