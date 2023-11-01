<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="register.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo 'Konfirmasi kata sandi tidak cocok. Silakan coba lagi.';
    } else {
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo 'Registrasi berhasil. Silakan login.';
        } else {
            echo 'Registrasi gagal. Silakan coba lagi.';
        }
    }
}
?>