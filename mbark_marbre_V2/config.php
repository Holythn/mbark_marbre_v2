<?php
$host = "localhost";
$user = "root"; 
$pass = ""; 
$dbname = "mbark_marbre1"; // Using your new database name

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset to utf8 for special characters
mysqli_set_charset($conn, "utf8");
session_start();
?>
