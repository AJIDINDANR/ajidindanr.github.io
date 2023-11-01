<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pembeli = $_POST['nama_pembeli'];
    $jenis_hijab = $_POST['jenis_hijab'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $sql = "INSERT INTO hijab (nama_pembeli, jenis_hijab, harga, stok) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssdi", $nama_pembeli, $jenis_hijab, $harga, $stok);
        if (mysqli_stmt_execute($stmt)) {
            header('Location: index.php');
            exit();
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}
?>
