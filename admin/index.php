<?php include 'includes/admin-header.php' ?>
  
<?php 
include 'includes/admin-nav.php';

// Autherizatio and access control
if(!$_SESSION['user']){
    header('location:' . SITEURL . 'admin/login.php');
    $_SESSION['login'] = "<div class='error'>you won sow where you no reap</div>";
}

?>

    <!-- main content section starts -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Dashboard</h1>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                food
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                order
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                admins
            </div>

            <div class="clearfix"></div>
        </div>

    </div>
    <!-- main content section ends-->

    <?php include 'includes/admin-footer.php' ?>