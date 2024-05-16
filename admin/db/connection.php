<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shop-project';

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("Could not connect to MySQL database:" . mysqli_connect());
}
