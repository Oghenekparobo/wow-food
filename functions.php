
<?php 


function order(){
    global $conn;

    
if (isset($_GET['food_id'])) {

    $food_id = $_GET['food_id'];
    $sql = "SELECT * FROM tbl_food WHERE id = $food_id";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        die('query failed' . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($query);
    $price =  $row['price'];
    $food_title = $row['title'];
    

}



if(isset($_POST['submit'])){
    $qty = $_POST['qty'];
    $fullname = $_POST['full-name'];
    $phone_no =$_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $total =  $price * $qty;
    $status = 'ordered'; //ordered delivered,cancelled
    $date = date('Y-m-d h:i"sa');

    $sql = "INSERT INTO tbl_order(food , price ,   quantity, total , status , customer_name, customer_email , customer_address , customer_contact , order_date )";
    $sql .=" VALUES (' $food_title','$price', '$qty' , '$total' , '$status', ' $fullname', ' $email', '$address' , '$phone_no' , '$date')";

    $query = mysqli_query($conn , $sql);

    if(!$query){
    die('order unable to complete'.mysqli_error($conn));
    echo "<script>alert('your order failed) </script>";
    }else{
        echo "<script>alert('your order has been collected successfully </script>";
    }

header('location:'.SITEURL);

}







}