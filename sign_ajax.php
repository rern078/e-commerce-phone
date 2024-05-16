<?php
require_once('admin/db/connection.php');

$account_name = $_POST['account_name'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$email = $_POST['email'];
$phone = $_POST['phone'];
// $position = $_POST['position'];
// $gender = $_POST['gender'];

// $hashed_password = password_hash($password, PASSWORD_DEFAULT);

if ($password !== $repassword) {
    echo "Two Password Not The Same";
    exit;
}

$stmt = $conn->prepare("INSERT INTO user (account_name, password, email, phone) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $account_name, $password, $email, $phone);

if ($stmt->execute()) {
    // echo "Registration successful!";
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
