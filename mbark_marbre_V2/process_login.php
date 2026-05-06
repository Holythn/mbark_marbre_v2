<?php
include 'config.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {
    // Check Soft-Delete/Archive status
    if($user['account_status'] !== 'Active') {
        die("Your account has been disabled. Please contact administration.");
    }

    $_SESSION['userid'] = $user['userid'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['fullname'] = $user['fullname'];

    if($user['role'] == 'Admin') {
        header("Location: admin/dashboard.php");
    } else {
        header("Location: index.php");
    }
    exit();
} else {
    echo "<script>alert('Email ou mot de passe incorrect.'); window.location='login.php';</script>";
}
?>
