

<?php include 'includes/admin-header.php' ?>

<?php include 'includes/admin-nav.php' ?>
<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>current password:</td>
                    <td><input type="text" name="current_password"></td>
                </tr>
                <tr>
                    <td>new password</td>
                    <td><input type="text" name="new_password"></td>
                </tr>
                <tr>
                    <td>confirm password:</td>
                    <td><input type="password" name="confirm_password"></td>
                </tr>
                <tr>

                    <td colspan="2">
                        <input type="submit" name="change" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <br><br>



    </div>
    <!-- main content section ends-->

    <?php changeAdminPassword() ?>
    <?php include 'includes/admin-footer.php' ?>