<?php include 'partials-front/header.php' ?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>


        <?php

        $sql = "SELECT *FROM tbl_food WHERE active = 'yes' AND featured = 'yes'";
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
            $id = $row['id'];
            $title = $row['title'];
            $img = $row['img'];
        ?>
              <a href="category-foods.php?cat_id=<?php echo $id ?>">
                <div class="box-3 float-container">
                    <img src="images/category_img/<?php echo $img ?>" alt="<?php echo $title ?>" class="img-responsive img-curve">


                    <h3 class="float-text text-white"><?php echo $title  ?></h3>
                </div>
            </a>
        <?php
        }

        ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<?php include 'partials-front/footer.php' ?>