<?php include '../db/db.php' ?>
<?php include './functions/functions.php' ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Login to wowfood-Admin Panel</title>
</head>
<body>

<div class="login">
<h1 class="text-center">login</h1> <br>

<form action="" method="post" class="text-center">
<?php 

if(isset($_SESSION['login'])){
    echo $_SESSION['login'];
    unset($_SESSION['login']);

}


?>
<label for="username">Username</label> <br>
<input type="text" name="username" placeholder="enter username"><br><br>

<label for="password">password</label><br>
<input type="password" name="password" placeholder="enter password"><br><br>

<input type='submit' name='login' value='Login' class="btn-primary">

<?php login() ?>
</form>
</div>

</body>
</html>