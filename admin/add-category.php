<?php include 'includes/admin-header.php' ?>

<?php include 'includes/admin-nav.php' ?>
<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>title:</td>
                    <td><input type="text" name="title" placeholder="category_title"></td>
                </tr>
                <tr>
                    <td>featured:</td>
                    <td>
                        <input type="radio" name="featured" value="yes">yes
                        <input type="radio" name="featured" value="no">no
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                       <input type="file" name="image">
                    </td>
                </tr>


                <tr>
                    <td>active:</td>
                    <td>
                        <input type="radio" name="active" value="yes">yes
                        <input type="radio" name="active" value="no">no
                    </td>
                </tr>
                <tr>

                    <td colspan="2">
                        <input type="submit" name="add-category" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <br><br>



    </div>
    <!-- main content section ends-->

    <?php addCategory() ?>
    <?php include 'includes/admin-footer.php' ?>