<?php
include("db/connection.php");
$message_de = "";
$cat_id = $_GET['cat_id'];
$sql_query = "DELETE FROM `categories` WHERE cat_id = '$cat_id'";

$data = mysqli_query($conn, $sql_query);
if ($data) {
    $message_de = "Successfully deleted";
    header('location: categories_list.php');
    // echo "<script>swal.fire('Success!', 'Category Deleted Successfully', 'success');</script>";
} else {
    $message_de = "Failed to delete";
}
