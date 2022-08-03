<?php include 'partials-front/header.php' ?>


<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <?php

        if (isset($_GET['cat_id'])) {
            $cat_id = $_GET['cat_id'];

            $sql = "SELECT title FROM tbl_category WHERE  id = $cat_id  ";
            $query = mysqli_query($conn, $sql);

            if (!$query) {
                die('query failed' . mysqli_error($conn));
            }

            while ($row = mysqli_fetch_assoc($query)) {
            $title = $row['title']; 
            ?>

            <h2>Foods on <a href="#" class="text-white"><?php echo $title ?></a></h2>
<?php
             }
        }
        else{
            header('location'.SITEURL);
        }
        ?>

    
    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4>Food Title</h4>
                <p class="food-price">$2.3</p>
                <p class="food-detail">
                    Made with Italian Sauce, Chicken, and organice vegetables.
                </p>
                <br>

                <a href="#" class="btn btn-primary">Order Now</a>
            </div>
        </div>

        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/menu-burger.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4>Smoky Burger</h4>
                <p class="food-price">$2.3</p>
                <p class="food-detail">
                    Made with Italian Sauce, Chicken, and organice vegetables.
                </p>
                <br>

                <a href="#" class="btn btn-primary">Order Now</a>
            </div>
        </div>

        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/menu-burger.jpg" alt="Chicke Hawain Burger" class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4>Nice Burger</h4>
                <p class="food-price">$2.3</p>
                <p class="food-detail">
                    Made with Italian Sauce, Chicken, and organice vegetables.
                </p>
                <br>

                <a href="#" class="btn btn-primary">Order Now</a>
            </div>
        </div>

        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4>Food Title</h4>
                <p class="food-price">$2.3</p>
                <p class="food-detail">
                    Made with Italian Sauce, Chicken, and organice vegetables.
                </p>
                <br>

                <a href="#" class="btn btn-primary">Order Now</a>
            </div>
        </div>

        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4>Food Title</h4>
                <p class="food-price">$2.3</p>
                <p class="food-detail">
                    Made with Italian Sauce, Chicken, and organice vegetables.
                </p>
                <br>

                <a href="#" class="btn btn-primary">Order Now</a>
            </div>
        </div>

        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="images/menu-momo.jpg" alt="Chicke Hawain Momo" class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4>Chicken Steam Momo</h4>
                <p class="food-price">$2.3</p>
                <p class="food-detail">
                    Made with Italian Sauce, Chicken, and organice vegetables.
                </p>
                <br>

                <a href="#" class="btn btn-primary">Order Now</a>
            </div>
        </div>


        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include 'partials-front/footer.php' ?>