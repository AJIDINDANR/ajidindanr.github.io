<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload File</title>
</head>
<body>
    <h1>Upload File</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>

<?php
if (isset($_POST["submit"])) {
    $targetDirectory = "uploads/"; // Direktori tempat file akan disimpan
    $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1; // Variabel untuk menandai apakah pengunggahan berhasil

    // Periksa jika file sudah ada
    if (file_exists($targetFile)) {
        echo "Maaf, file tersebut sudah ada.";
        $uploadOk = 0;
    }

    // Batasi jenis file yang diizinkan (misalnya, hanya gambar)
    $allowedFileTypes = array("jpg", "png", "jpeg", "gif");
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (!in_array($fileType, $allowedFileTypes)) {
        echo "Maaf, hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.";
        $uploadOk = 0;
    }

    // Periksa apakah ada kesalahan selama pengunggahan
    if ($uploadOk == 0) {
        echo "Maaf, file Anda tidak diunggah.";
    } else {
        // Jika semuanya baik, coba unggah file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "File " . basename($_FILES["fileToUpload"]["name"]) . " telah berhasil diunggah.";
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    }
}
?>

