
<?php
include "../../db/db.php";



if(isset($_GET['id'])){
    $id = $_GET['id'];
}

if(isset($_GET['image_name'])){
    $image_name= $_GET['image_name'];
    if(!empty($image_name)){ 
        $path = '../images/category_img/'.$image_name;
        $remove = unlink($path);

        if(!$remove){
            echo "<script>alert('failed to remove')<script>";
        }
        
    }
}


$sql = "DELETE FROM tbl_food WHERE id =  $id";
$query = mysqli_query( $conn ,  $sql);

if(!$query){
    echo "<script>alert('failed to delete')<script>";

}

header('location:'.SITEURL.'admin/manage-food.php');
