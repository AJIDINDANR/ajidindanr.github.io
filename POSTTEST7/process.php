<?php
// Inisialisasi koneksi ke database
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pembeli = $_POST["nama_pembeli"];
    $jenis_hijab = $_POST["jenis_hijab"];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    // Dapatkan informasi file yang diunggah
    $gambar = $_FILES['gambar'];
    $namaFile = $gambar['name'];
    $ukuranFile = $gambar['size'];
    $tmpName = $gambar['tmp_name'];
    $error = $gambar['error'];
    $editFile = $_POST['edit_file'];
    $hapusFile = $_POST['hapus_file'];

// Lokasi penyimpanan file di server
    $direktoriSimpan = 'lokasi_penyimpanan_file/';  // Gantilah dengan lokasi penyimpanan yang sesuai

    // Cek apakah pengguna memilih untuk mengedit atau menghapus file
    if ($editFile) {
        // Lakukan proses pengeditan file di sini
        // Misalnya, simpan file yang diunggah oleh pengguna ke lokasi penyimpanan
        if (move_uploaded_file($tmpName, $direktoriSimpan . $namaFile)) {
            // File berhasil diunggah, Anda bisa memperbarui data file dalam database jika diperlukan
            // Misalnya, mengganti nama file yang lama dengan nama baru di database
            // $namaFile adalah nama file yang baru

            // Contoh penggunaan:
            // $namaFileBaru = 'yyyy-mm-dd ' . $namaFile; // Sesuaikan dengan format nama yang Anda inginkan
            // Update data file dalam database dengan $namaFileBaru
            // mysqli_query($conn, "UPDATE nama_tabel SET nama_file = '$namaFileBaru' WHERE kondisi = sesuai");
        } else {
            // Gagal mengunggah file
            // Handle kesalahan di sini
        }
    }

    if ($hapusFile) {
        // Lakukan proses penghapusan file di sini
        // Misalnya, hapus file dari server dan data file dalam database jika perlu
        // Anda dapat menggunakan unlink() untuk menghapus file dari server
        if (unlink($direktoriSimpan . $namaFile)) {
            // File berhasil dihapus dari server
            // Anda juga perlu menghapus data file yang sesuai dalam database jika ada
            // Misalnya, hapus data file dengan query DELETE
            // mysqli_query($conn, "DELETE FROM nama_tabel WHERE kondisi = sesuai");
        } else {
            // Gagal menghapus file
            // Handle kesalahan di sini
        }
    }



// Cek apakah ada file yang diunggah
if ($error === 0) {
    $lokasiUpload = 'uploads/'; // Lokasi untuk menyimpan file yang diunggah

// Pindahkan file ke lokasi yang ditentukan
if (move_uploaded_file($tmpName, $lokasiUpload . $namaFile)) {
    // File berhasil diunggah
} else {
    echo 'Gagal mengunggah file.';
}
} else {
echo 'Terjadi kesalahan saat mengunggah file.';
}

// Buat nama file baru dengan format yyyy-mm-dd_nama-file.ekstensi
$namaFileBaru = date('Y-m-d') . '_' . str_replace(" ", "_", $namaFile);

// Gabungkan nama file baru dengan lokasi upload
$tujuan = $lokasiUpload . $namaFileBaru;

// Pindahkan file ke lokasi yang ditentukan
if (move_uploaded_file($tmpName, $tujuan)) {
    // File berhasil diunggah
} else {
    echo 'Gagal mengunggah file.';
}
} else {
echo 'Terjadi kesalahan saat mengunggah file.';
}

    // Gunakan prepared statement untuk menghindari SQL injection
    $sql = "INSERT INTO hijab (nama_pembeli, jenis_hijab, harga, stok) VALUES (?, ?, ?, ?)";

    // Persiapkan statement
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        // Bind parameter ke prepared statement
        mysqli_stmt_bind_param($stmt, "ssdi", $nama_pembeli, $jenis_hijab, $harga, $stok);

        // Eksekusi statement
        if (mysqli_stmt_execute($stmt)) {
            $last_insert_id = mysqli_insert_id($conn);
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header("Location: hasil.php?id=" . $last_insert_id); // Mengalihkan ke halaman hasil.php dengan ID data yang baru
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        

        // Tutup prepared statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

// Membaca data hijab
$sql = "SELECT * FROM hijab";
$result = mysqli_query($conn, $sql);

if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['gambar']['tmp_name'];
    $fileName = $_FILES['gambar']['name'];
    $fileSize = $_FILES['gambar']['size'];
    $fileType = $_FILES['gambar']['type'];

    // Tempat penyimpanan file yang diunggah
    $uploadDirectory = 'uploads/'; // Pastikan folder 'uploads' ada dan memiliki izin yang benar

    // Pindahkan file yang diunggah ke folder penyimpanan
    $destPath = $uploadDirectory . $fileName;

    if (move_uploaded_file($fileTmpPath, $destPath)) {
        // File berhasil diunggah, lakukan penyimpanan data ke database
        $insertQuery = "INSERT INTO hijab (nama_pembeli, jenis_hijab, harga, stok, file) VALUES ('$nama_pembeli', '$jenis_hijab', $harga, $stok, '$fileName')";
        if (mysqli_query($conn, $insertQuery)) {
            header('Location: your-page.php'); // Redirect kembali ke halaman Anda
            exit();
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    } else {
        echo 'Gagal mengunggah file.';
    }
}

?>