<?php
include("admin/db/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['productId'], $_POST['productQuantity'], $_POST['productName'], $_POST['productImage'])) {
        $productId = $_POST['productId'];
        $brandId = $_POST['brandId'];
        $catId = $_POST['catId'];
        $productName = htmlspecialchars($_POST['productName']);
        $productQuantity = $_POST['productQuantity'];
        $productPrice = $_POST['productPrice'];
        $productDiscount = $_POST['productDiscount'];
        $productImage = $_POST['productImage'];

        $sql = "INSERT INTO carts (pro_id, brand_id, cat_id, pro_name, pro_price, pro_discount, pro_quantity, pro_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "iiiiiiis", $productId, $brandId, $catId, $productName, $productPrice, $productDiscount, $productQuantity, $productImage);

        if (mysqli_stmt_execute($stmt)) {
            echo "Product added to cart successfully!";
            // echo "<script>swal.fire('Success!', 'Category Added Successfully', 'success');</script>";
        } else {
            echo "Error: Unable to add product to cart. " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: Missing parameters.";
    }
}
