<?php
// Koneksi ke database
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data hijab
    $sql = "DELETE FROM hijab WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php"); // Redirect kembali ke halaman utama
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
