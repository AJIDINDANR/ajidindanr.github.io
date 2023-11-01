<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data Hijab</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Daftar Data Hijab</h1>
    <table class="data-table">
        <tr>
            <th>ID</th>
            <th>Nama Pembeli</th>
            <th>Jenis Hijab</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>File</th>
        </tr>
        <?php
        include 'koneksi.php';
        $sql = "SELECT * FROM hijab";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nama_pembeli"] . "</td>";
            echo "<td>" . $row["jenis_hijab"] . "</td>";
            echo "<td>" . $row["harga"] . "</td>";
            echo "<td>" . $row["stok"] . "</td>";
            echo "<td><img src='uploads/" . $row["file"] . "' alt='Hijab Image'></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
