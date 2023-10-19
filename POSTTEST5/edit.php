<?php
// Koneksi ke database
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menampilkan data hijab yang akan diedit
    $sql = "SELECT * FROM hijab WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $nama_pembeli = $row['nama_pembeli'];
        $jenis_hijab = $row["jenis_hijab"];
        $harga = $row['harga'];
        $stok = $row['stok'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_pembeli = $_POST["nama_pembeli"];
    $jenis_hijab = $_POST["jenis_hijab"];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Perbarui data hijab
    $sql = "UPDATE hijab SET nama_pembeli = '$nama_pembeli', jenis_hijab = '$jenis_hijab', harga = '$harga', stok = '$stok' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php"); // Redirect kembali ke halaman utama
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<!-- Sisipkan form HTML di sini sesuai dengan kebutuhan Anda -->