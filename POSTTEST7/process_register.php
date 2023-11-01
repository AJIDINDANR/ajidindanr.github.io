<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi data
    if (empty($username) || empty($password) || empty($confirm_password)) {
        echo 'Semua field harus diisi. Silakan coba lagi.';
    } elseif ($password !== $confirm_password) {
        echo 'Konfirmasi kata sandi tidak cocok. Silakan coba lagi.';
    } else {
        // Cek duplikasi data
        $checkDuplicateSql = "SELECT username FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $checkDuplicateSql);

        if (mysqli_num_rows($result) > 0) {
            echo 'Username sudah digunakan. Silakan pilih username lain.';
        } else {
            // Password cocok, lanjutkan pendaftaran
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

            // Eksekusi perintah SQL
            if (mysqli_query($conn, $sql)) {
                echo 'Registrasi berhasil. Silakan login.';
                // Arahkan pengguna ke halaman login setelah registrasi berhasil
                header('Location: login.php');
                exit(); // Pastikan untuk keluar setelah mengalihkan pengguna
            } else {
                // Periksa dan tampilkan pesan kesalahan
                echo 'Registrasi gagal. Error: ' . mysqli_error($conn);
            }
        }
    }
}
?>