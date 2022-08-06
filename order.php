<?php include 'partials-front/header.php' ?>
<?php include 'functions.php' ?>
<?php

if (isset($_GET['food_id'])) {

    $food_id = $_GET['food_id'];
}





?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form method="POST" class="order">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                    <?php
                    $sql = "SELECT * FROM tbl_food WHERE id = $food_id";
                    $query = mysqli_query($conn, $sql);

                    if (!$query) {
                        die('query failed' . mysqli_error($conn));
                    }

                    $row = mysqli_fetch_assoc($query);
                    $food_title = $row['title'];
                    $food_image = $row['img'];
                    $price =  $row['price'];



                    ?>
                    <img src="images/category_img/<?php echo  $food_image  ?>" alt="<?php echo $food_title  ?>" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $food_title  ?></h3>
                    <p class="food-price">$<?php echo $price  ?></p>


                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>

                </div>

            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>
            <?php order() ?>
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<?php include 'partials-front/footer.php' ?>