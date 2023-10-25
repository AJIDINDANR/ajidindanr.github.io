<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_pembeli = $_POST['nama_pembeli'];
    $jenis_hijab = $_POST['jenis_hijab'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $sql = "UPDATE hijab SET nama_pembeli=?, jenis_hijab=?, harga=?, stok=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssdii", $nama_pembeli, $jenis_hijab, $harga, $stok, $id);
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
