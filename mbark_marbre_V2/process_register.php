<?php
include 'config.php';

$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Check if email already exists
$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
if(mysqli_num_rows($check) > 0) {
    echo "<script>alert('Cet email est déjà utilisé.'); window.location='register.php';</script>";
    exit();
}

$sql = "INSERT INTO users (fullname, email, password, role, account_status) VALUES ('$fullname', '$email', '$password', 'Customer', 'Active')";

if(mysqli_query($conn, $sql)) {
    echo "<script>alert('Compte créé avec succès !'); window.location='login.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
