<?php include 'includes/admin-header.php' ?>

<?php include 'includes/admin-nav.php' ?>
<!-- main content section starts -->
<div class="main-content">
    <div>
        <h1>manage order</h1>
        <br> <br> <br>
        <table class="tbl-full">
            <tr>
                <th>s/n</th>
                <th>food</th>
                <th>price</th>
                <th>qty</th>
                <th>total</th>
                <th>order date</th>
                <th>status</th>
                <th>customer name</th>
                <th>contact</th>
                <th>email</th>
                <th>address</th>
                <th>actions</th>
            </tr>

            <!-- <tr> -->
                <?php displayOrder() ?>
            <!-- </tr> -->
        </table>
    </div>


</div>
<!-- main content section ends-->

<?php include 'includes/admin-footer.php' ?>