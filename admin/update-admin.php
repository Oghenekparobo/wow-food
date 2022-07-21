<?php include 'includes/admin-header.php' ?>
<?php
$sql = "SELECT * FROM tbl_admin";
$query = mysqli_query($conn, $sql);


if (!$query) return "<script>alert('operation failed')</script>";


while ($row = mysqli_fetch_assoc($query)) {
    $id =  $row['id'];
    $fullname = $row['fullname'];
    $username = $row['username'];
    $password = $row['password'];
}
?>
<?php include 'includes/admin-nav.php' ?>
<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Upate Admin</h1>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>fullname:</td>
                    <td><input type="text" name="fullname" placeholder="fullname" value=<?php echo $fullname ?>></td>
                </tr>
                <tr>
                    <td>username:</td>
                    <td><input type="text" name="username" placeholder="username" value=<?php echo $username ?>></td>
                </tr>
                <tr>
                    <td>password:</td>
                    <td><input type="password" name="password" placeholder="password" value=<?php echo $password ?>></td>
                </tr>
                <tr>

                    <td colspan="2">
                        <input type="submit" name="update" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <br><br>



    </div>
    <!-- main content section ends-->

    <?php updateAdmin() ?>
    <?php include 'includes/admin-footer.php' ?>