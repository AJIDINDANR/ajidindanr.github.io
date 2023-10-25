<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Hijab</title>
</head>
<body>
    <h1>Edit Data Hijab</h1>
    <a href="index.php">Kembali</a>
    <?php
    include 'koneksi.php';
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM hijab WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            ?>
            <form method="post" action="proses_edit.php">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <label for="nama_pembeli">Nama Pembeli:</label>
                <input type="text" name="nama_pembeli" value="<?= $row['nama_pembeli'] ?>" required>
                <br>
                <label for="jenis_hijab">Jenis Hijab:</label>
                <input type="text" name="jenis_hijab" value="<?= $row['jenis_hijab'] ?>" required>
                <br>
                <label for="harga">Harga:</label>
                <input type="number" name="harga" value="<?= $row['harga'] ?>" required>
                <br>
                <label for="stok">Stok:</label>
                <input type="number" name="stok" value="<?= $row['stok'] ?>" required>
                <br>
                <input type="submit" value="Simpan Perubahan">
            </form>
            <?php
        }
    }
    ?>
</body>
</html>