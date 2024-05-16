<?php
include("db/connection.php");
$message_de = "";
$pro_id = $_GET['pro_id'];
$sql_query = "DELETE FROM `products` WHERE pro_id = '$pro_id'";

$data = mysqli_query($conn, $sql_query);
if ($data) {
    $message_de = "Products Delete Sucessfully";
    // echo "<script>swal.fire('Success!', 'Product Added Successfully ! ', 'success');</script>";
    header('location: products_list.php');
} else {
    $message_de = "Failed to delete";
}
