<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Hijab</title>
</head>
<body>
    <h1>Tambah Data Hijab</h1>
    <a href="index.php">Kembali</a>
    <form action="process_upload.php" method="post" enctype="multipart/form-data">
        <label for="nama_pembeli">Nama Pembeli:</label>
        <input type="text" name="nama_pembeli" required>
        <br>
        <label for="jenis_hijab">Jenis Hijab:</label>
        <input type="text" name="jenis_hijab" required>
        <br>
        <label for="harga">Harga:</label>
        <input type="number" name="harga" required>
        <br>
        <label for="stok">Stok:</label>
        <input type="number" name="stok" required>
        <br>
        <label for="gambar">Gambar Hijab:</label>
        <input type="file" id="gambar" name="gambar" required>
        <br>
        <input type="submit" value="Tambah">
    </form>
</body>
</html>
