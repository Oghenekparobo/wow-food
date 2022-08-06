<?php include 'includes/admin-header.php' ?>

<?php
if (isset($_GET['update_id'])) {
    $order_id = $_GET['update_id'];
}

$sql = "SELECT * FROM tbl_order WHERE id = $order_id";
$query = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($query)) {

    $id =  $row['id'];
    $food =  $row['food'];
    $price =  $row['price'];
    $quantity =  $row['quantity'];
    $total =  $row['total'];
    $order_date =  $row['order_date'];
    $status =  $row['status'];
    $customer_name =  $row['customer_name'];
    $customer_email =  $row['customer_email'];
    $customer_address =  $row['customer_address'];
    $customer_contact =  $row['customer_contact'];
}


?>

<?php include 'includes/admin-nav.php' ?>
<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1> <br>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>foodname:</td>
                    <td>
                        <h3><?php echo $food  ?></h3>
                    </td>
                </tr>
                <tr>
                    <td>price:</td>
                    <td>
                        <h3><?php echo $price  ?></h3>
                    </td>
                </tr>
                <tr>
                    <td>Qty:</td>
                    <td><input type="number" name="quantity" value="<?php echo $quantity  ?>"></td>
                </tr>
                <tr>
                    <td>status:</td>
                    <td>
                        <select name="status">

                            <?php
                            if ($status === 'ordered') {
                                echo  "<option value='ordered'> $status</option>";;
                            } elseif ($status === 'canceled') {
                                echo  "<option value='canceled'> $status</option>";
                            } elseif ($status === 'delivered') {
                                echo  "<option value='delivered'> $status</option>";
                            } else {
                                echo 'pending';
                            }
                            ?>
                            <option value='canceled'> canceled</option>
                            <option value='delivered'>delivered</option>
                            <?php
                            ?>
                <tr>
                    <td>customer name:</td>
                    <td><input type="text" name="name" value="<?php echo  $customer_name ?>"></td>
                </tr>
                <tr>
                    <td>customer contact:</td>
                    <td><input type="text" name="contact" value="<?php echo  $customer_contact ?>"></td>
                </tr>
                <tr>
                    <td>customer email:</td>
                    <td><input type="email" name="email" placeholder="<?php echo  $customer_email ?>" class="input-responsive" required></td>
                </tr>
                <tr>

                    <td>customer address:</td>
                    <td> <textarea name="address" rows="10" placeholder="<?php echo  $customer_address ?>" class="input-responsive" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="update-order" value="Update Order" class="btn-secondary">
                    </td>
                </tr>

                </tr>
            </table>
        </form>

        <br><br>



    </div>
    <!-- main content section ends-->

    <?php updateOrder() ?>
    <?php include 'includes/admin-footer.php' ?>