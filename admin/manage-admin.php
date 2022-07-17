<?php include 'includes/admin-header.php' ?>

<?php include 'includes/admin-nav.php' ?>
<!-- main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>manage admin</h1>
        <br> <br>
        <!-- button to add admin -->
        <a href="./includes/add-admin.php" class="btn-primary">Add Admin</a>
        <br> <br> <br>
        <table class="tbl-full">
            <tr>
                <th>s/n</th>
                <th>fullname</th>
                <th>username</th>
                <th>actions</th>
            </tr>

            <tr>
                <td>1</td>
                <td>stephen</td>
                <td>pablo</td>
                <td>
                    <a href="" class="btn-secondary">update</a>
                    <a href="@" class="btn-danger">delete</a>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>stephen</td>
                <td>pablo</td>
                <td>
                    <a href="" class="btn-secondary">update</a>
                    <a href="@" class="btn-danger">delete</a>
                </td>

            </tr>
            <tr>
                <td>1</td>
                <td>stephen</td>
                <td>pablo</td>
                <td>
                    <a href="" class="btn-secondary">update</a>
                    <a href="@" class="btn-danger">delete</a>
                </td>
            </tr>
        </table>
    </div>

</div>
<!-- main content section ends-->

<?php include 'includes/admin-footer.php' ?>