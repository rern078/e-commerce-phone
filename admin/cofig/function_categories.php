<?php
// include("db/connection.php");

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST["create"])) {
//         $category_code = htmlspecialchars($_POST["category_code"]);
//         $category_name = htmlspecialchars($_POST["category_name"]);
//         $status = $_POST["status"];

//         $sql = "INSERT INTO categories (category_code, category_name, status) VALUES ('$category_code', '$category_name', '$status')";

//         if ($conn->query($sql) === TRUE) {
//             echo "New category added successfully";
//         } else {
//             echo "Error: " . $sql . "<br>" . $conn->error;
//         }
//     }

// }
// $conn->close();
