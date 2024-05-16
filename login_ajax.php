<?php
session_start();
require_once('admin/db/connection.php');

$account_name = $_POST['account_name'];
$password = $_POST['password'];

// $hashed_password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("SELECT * FROM user WHERE account_name = ? AND password = ?");
$stmt->bind_param("ss", $account_name, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    if ($user['user_roles'] == '1') {
        $_SESSION['account_name'] = $account_name;
        // echo "Login successful!";
        header("Location: admin/index.php");
        exit();
    } else {
        header("Location:include/header.php");
        exit();
    }
} else {
    echo "Invalid account_name or password!";
}

$stmt->close();
$conn->close();
