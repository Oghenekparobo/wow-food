<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../css/admin.css">
    <title>Admin Panel</title>
</head>

<body>
    <?php include 'admin-nav.php' ?>
    <!-- main content section starts -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1>

            <form action="" method="post">
                <table class="tbl-30">
                    <tr>
                        <td>fullname:</td>
                        <td><input type="text" name="fullname" placeholder="enter your fullname"></td>
                    </tr>
                    <tr>
                        <td>username:</td>
                        <td><input type="text" name="username" placeholder="enter your username"></td>
                    </tr>
                    <tr>
                        <td>password:</td>
                        <td><input type="password" name="password" placeholder="enter your password"></td>
                    </tr>
                </table>
            </form>

            <br><br>



        </div>
        <!-- main content section ends-->

        <?php include 'admin-footer.php' ?>