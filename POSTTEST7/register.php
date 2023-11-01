<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <div class="register-table">
        <h2>Register</h2>
        <form method="post" action="process_register.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <button type="submit">Register</button>
        </form>
    </div>
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
        // Password cocok, lanjutkan pendaftaran
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

        if (mysqli_query($conn, $sql)) {
            echo 'Registrasi berhasil. Silakan login.';
        } else {
            echo 'Registrasi gagal. Silakan coba lagi.';
        }
    }
}
?>