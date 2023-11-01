<?php
// Koneksi ke database jika diperlukan
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data file yang diunggah
    $gambar = $_FILES['gambar'];
    $namaFile = $gambar['name'];
    $ukuranFile = $gambar['size'];
    $tmpName = $gambar['tmp_name'];
    $error = $gambar['error'];

    // Lokasi penyimpanan file yang diunggah
    $lokasiPenyimpanan = 'uploads/';

    // Cek apakah pengguna memilih untuk mengunggah file
    if ($error === 0) {
        // Generate nama unik untuk file (misalnya, menggunakan timestamp)
        $namaFileBaru = date('Y-m-d') . ' ' . $namaFile;

        // Pindahkan file yang diunggah ke direktori penyimpanan
        if (move_uploaded_file($tmpName, $lokasiPenyimpanan . $namaFileBaru)) {
            // File berhasil diunggah, lakukan tindakan yang sesuai, seperti pembaruan database
            // Misalnya, tambahkan informasi file ke database
            $sql = "INSERT INTO hijab (file) VALUES ('$namaFileBaru')";
            if (mysqli_query($conn, $sql)) {
                // File berhasil diunggah dan data disimpan ke database
                header('Location: daftar.php'); // Redirect kembali ke halaman daftar.php
                exit();
            } else {
                echo 'Error: ' . mysqli_error($conn);
            }
        } else {
            echo 'Error: Gagal menyimpan file.';
        }
    } else {
        echo 'Error: Terjadi kesalahan saat mengunggah file.';
    }
}

// Tutup koneksi ke database jika diperlukan
mysqli_close($conn);
?>
