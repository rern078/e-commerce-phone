<?php
include("db/connection.php");
$message_de = "";
$brand_id = $_GET['brand_id'];
$sql_query = "DELETE FROM `brands` WHERE brand_id = '$brand_id'";

$data = mysqli_query($conn, $sql_query);
if ($data) {
    $message_de = "Brands Delete Sucessfully";
    // echo "<script>swal.fire('Success!', 'Brands Delete Sucessfully', 'success');</script>";
    header('location: brands_list.php');
} else {
    $message_de = "Failed to delete";
}
