<?php include 'includes/admin-header.php' ?>

<?php include 'includes/admin-nav.php' ?>
<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>title:</td>
                    <td><input type="text" name="title" placeholder="title of food"></td>
                </tr>
                <tr>
                    <td>description:</td>
                    <td><textarea name="description" placeholder="food description" cols="30" rows="5"></textarea>
                </tr>
                <tr>
                    <td>price:</td>
                    <td><input type="number" name="price"></td>
                </tr>
                <tr>
                    <td>select image:</td>
                    <td>
                        <input type="file" name="image" id="">
                    </td>
                </tr>
                <tr>
                    <td>category:</td>
                    <td>
                        <select name="category">
                        <option value="">select category</option>
                            <?php
                            $cat_sql = 'SELECT * FROM tbl_category WHERE active = "yes"';
                            $cat_query = mysqli_query($conn, $cat_sql);

                            while ($cat_row = mysqli_fetch_assoc($cat_query)) {
                                $cat_id = $cat_row['id'];
                                $cat_title = $cat_row['title'];
                            ?>
                                <option value="<?php echo   $cat_id  ?>"><?php echo   $cat_title  ?></option>

                            <?php
                            }



                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>featured:</td>
                    <td>
                        <input type="radio" name="featured" value="yes">yes
                        <input type="radio" name="featured" value="no">no
                    </td>
                </tr>
                <tr>
                    <td>active:</td>
                    <td>
                        <input type="radio" name="active" value="yes">yes
                        <input type="radio" name="active" value="no">no
                    </td>
                </tr>


                <td colspan="2">
                    <input type="submit" name="add-food" value="Add Food" class="btn-secondary">
                </td>
                </tr>
            </table>
        </form>

        <br><br>



    </div>
    <!-- main content section ends-->

    <?php addFood() ?>
    <?php include 'includes/admin-footer.php' ?>