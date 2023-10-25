<?php
// Koneksi ke database
include 'koneksi.php';

// Ambil ID data yang baru
$id = $_GET['id'];

// Query untuk mengambil data dengan ID yang sesuai
$sql = "SELECT * FROM hijab WHERE id = " . $id;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "Data hijab berhasil disimpan. Berikut rinciannya:<br>";
    echo "ID: " . $row["id"] . "<br>";
    echo "Nama Pembeli: " . $row["nama_pembeli"] . "<br>";
    echo "Jenis Hijab: " . $row["jenis_hijab"] . "<br>";
    echo "Harga: " . $row["harga"] . "<br>";
    echo "Stok: " . $row["stok"] . "<br>";
} else {
    echo "Data tidak ditemukan.";
}
?>