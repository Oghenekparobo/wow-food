
<?php
include "../../db/db.php";



if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql = "DELETE FROM  tbl_admin WHERE id =  $id";
$query = mysqli_query( $conn ,  $sql);

if(!$query){
    echo "<script>alert('failed to delete')<script>";

}

header('location:'.SITEURL.'admin/manage-admin.php');
