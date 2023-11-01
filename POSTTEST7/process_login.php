<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa kredensial pengguna (misalnya, dengan kueri database)

    // Jika kredensial benar, set session dan arahkan ke halaman utama
    $_SESSION['username'] = $username;
    header('Location: index.php');
    exit();

    if (mysqli_query($conn, $sql)) {
        echo 'Data berhasil disimpan.';
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}