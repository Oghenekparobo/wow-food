<?php include 'partials-front/header.php' ?>


<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <?php

        if (isset($_GET['cat_id'])) {
            $cat_id = $_GET['cat_id'];

            $sql = "SELECT id FROM tbl_category WHERE id=$cat_id";
            $query = mysqli_query($conn, $sql);

            if (!$query) {
                die('query failed' . mysqli_error($conn));
            }
                $row = mysqli_fetch_row($query);
                $title = $row['title'];
            

           
        }
        ?>

        <h2>Foods on <a href="#" class="text-white"><?php echo $title ?></a></h2>


    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php 
       
         $sql = "SELECT * FROM tbl_food WHERE id =  $cat_id";
         $query = mysqli_query( $conn ,  $sql);
         if(!$query){
            die('query failed'.mysqli_error($conn));
         }
 
        
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

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include 'partials-front/footer.php' ?>