<?php include 'includes/admin-header.php' ?>

<?php
include 'includes/admin-nav.php';

// Autherizatio and access control
if (!$_SESSION['user']) {
    header('location:' . SITEURL . 'admin/login.php');
    $_SESSION['login'] = "<div class='error'>you won sow where you no reap</div>";
}

?>

<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <?php
        $sql = "SELECT * FROM tbl_category";
        $query = mysqli_query($conn, $sql);

        if (!$query) {
            die('query faile' . mysqli_error($conn));
        }
       
        $cat_num = mysqli_num_rows($query);
        ?>
        <div class="col-4 text-center">
            <h1><?php echo   $cat_num  ?></h1>
            <br />
            categories
        </div>

        <div class="col-4 text-center">
            <?php
            $sql = "SELECT * FROM tbl_food";
            $query = mysqli_query($conn, $sql);

            if (!$query) {
                die('query faile' . mysqli_error($conn));
            }
            // count the number of categories
            $food_num = mysqli_num_rows($query);
            ?>
            <h1><?php echo   $food_num  ?></h1>
            <br />
            foods
        </div>

        <div class="col-4 text-center">
            <?php
            $sql = "SELECT * FROM tbl_order";
            $query = mysqli_query($conn, $sql);

            if (!$query) {
                die('query faile' . mysqli_error($conn));
            }
            
            $order_num = mysqli_num_rows($query);
            ?>
            <h1><?php echo   $order_num  ?></h1>
            <br />
            total orders
        </div>

        <div class="col-4 text-center">
        <?php
        $sql = "SELECT SUM(total) as TOTAL FROM tbl_order WHERE status = 'delivered'";
        $query = mysqli_query($conn, $sql);
        
        if (!$query) {
            die('query failed' . mysqli_error($conn));
        }
       
        $row= mysqli_fetch_assoc($query);
        $rev_num = $row['TOTAL'];
        ?>
    <h1>$<?php echo $rev_num  ?></h1>
            <br />
            revenue generated
        </div>

        <div class="clearfix"></div>
    </div>

</div>
<!-- main content section ends-->

<?php include 'includes/admin-footer.php' ?>