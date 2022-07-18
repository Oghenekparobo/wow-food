<?php include 'includes/admin-header.php' ?>
  
<?php include 'includes/admin-nav.php' ?>
    <!-- main content section starts -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>fullname:</td>
                        <td><input type="text" name="fullname" placeholder="fullname"></td>
                    </tr>
                    <tr>
                        <td>username:</td>
                        <td><input type="text" name="username" placeholder="username"></td>
                    </tr>
                    <tr>
                        <td>password:</td>
                        <td><input type="password" name="password" placeholder="password"></td>
                    </tr>
                    <tr>

                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>

            <br><br>



        </div>
        <!-- main content section ends-->

        <?php addAdmin()?>
<?php include 'includes/admin-footer.php' ?>
