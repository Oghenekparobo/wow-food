<?php include 'partials-front/header.php' ?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>

        <?php

        $sql = "SELECT *FROM tbl_food WHERE active = 'yes' AND featured = 'yes' LIMIT 3";
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
            $id = $row['id'];
            $title = $row['title'];
            $img = $row['img'];
        ?>
            <a href="category-foods.php?cat_id=<?php echo $id  ?>">
                <div class="box-3 float-container">
                    <img src="images/category_img/<?php echo $img ?>" alt="<?php echo $title ?>" class="img-responsive img-curve">

                    <h3 class="float-text text-white"><?php echo $title ?></h3>
                </div>
            </a>

        <?php

        }

        ?>





        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php

        $sql = "SELECT *FROM tbl_food WHERE active = 'yes' AND featured = 'yes' LIMIT 6";
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
            $id = $row['id'];
            $title = $row['title'];
            $img = $row['img'];
            $description = $row['description'];
            $price = $row['description'];
        ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/category_img/<?php echo $img ?>" alt="<?php echo $title ?>" class="img-responsive img-curve">

                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title  ?></h4>
                    <p class="food-price"><?php echo $price ?></p>
                    <p class="food-detail">
                        <?php echo $description ?>
                    </p>
                    <br>

                    <a href="order.php" class="btn btn-primary">Order Now</a>
                </div>
            </div>

        <?php
        }

        ?>




        <div class="clearfix"></div>



    </div>

    <p class="text-center">
        <a href="#">See All Foods</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->

<?php include 'partials-front/footer.php' ?>