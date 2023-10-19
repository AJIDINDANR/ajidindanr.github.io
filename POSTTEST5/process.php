<?php
$id = $nama_pembeli = $jenis_hijab = $harga = $stok = "";

// Inisialisasi koneksi ke database
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah 'id' ada dalam $_POST sebelum mengaksesnya
    if (isset($_POST['id'])) {
    $id = $_POST['id'];
    }

    // Inisialisasi variabel
    $nama_pembeli = $_POST["nama_pembeli"];
    $jenis_hijab = $_POST["jenis_hijab"];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Gunakan prepared statement untuk menghindari SQL injection
    $sql = "INSERT INTO hijab (nama_pembeli, jenis_hijab, harga, stok) VALUES (?, ?, ?, ?)";

    // Persiapkan statement
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameter ke prepared statement
        mysqli_stmt_bind_param($stmt, "ssdi", $nama_pembeli, $jenis_hijab, $harga, $stok);

        // Eksekusi statement
        if (mysqli_stmt_execute($stmt)) {
            $last_insert_id = mysqli_insert_id($conn);
            echo "Data hijab berhasil disimpan. ID data baru adalah: " . $last_insert_id;
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Tutup prepared statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Membaca data hijab
$sql = "SELECT * FROM hijab";
$result = mysqli_query($conn, $sql);
?>
