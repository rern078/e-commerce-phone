<?php
include("admin/db/connection.php");

if (isset($_POST['cart_id'])) {
    $cartId = $_POST['cart_id'];

    $deleteQuery = "DELETE FROM carts WHERE cart_id = ?";
    $stmt = mysqli_prepare($conn, $deleteQuery);
    mysqli_stmt_bind_param($stmt, "i", $cartId);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "success";
    } else {
        echo "failure";
    }
} else {
    echo "No cart_id provided.";
}