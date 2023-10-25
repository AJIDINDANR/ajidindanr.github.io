<?php
// Koneksi ke database
include 'koneksi.php';

$sql = "SELECT * FROM hijab";
$result = mysqli_query($conn, $sql);
?>

<?php
// Koneksi ke database
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_pembeli = $_POST['nama_pembeli'];
    $jenis_hijab = $_POST['jenis_hijab'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Insert the submitted data into the database
    $insertQuery = "INSERT INTO hijab (nama_pembeli, jenis_hijab, harga, stok) VALUES ('$nama_pembeli', '$jenis_hijab', $harga, $stok)";
    if (mysqli_query($conn, $insertQuery)) {
        header('Location: your-page.php'); // Redirect back to your page
        exit();
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}
?>

</table>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        #date-time {
            background-color: #fff;
            border: 2px solid #333;
            border-radius: 10px;
            padding: 10px;
            font-size: 24px;
            box-shadow: 2px 2px 5px #999;
        }
    </style>
    <script>
        function displayDateTime() {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', timeZoneName: 'short' };
            const dateTime = new Date().toLocaleString('id-ID', options);

            const dateTimeElement = document.getElementById('date-time');
            dateTimeElement.textContent = dateTime;
        }

        // Panggil fungsi displayDateTime() setiap detik
        setInterval(displayDateTime, 1000);
    </script>
</head>
<body>
    <h1>Dashboard</h1>
    <div id="date-time">Mengambil waktu...</div>
</body>
</head>
<body>
    <h1>Dashboard</h1>
    <p id="date-time"></p>
</body>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data Di Toko Hijab</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        .btn {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        form {
            margin: 20px 0;
        }

        .form-group {
            margin: 10px 0;
        }

        label {
            display: block;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        </style>
</head>
<body>
    <h2>Daftar Data Di Toko Hijab</h2>
    <a href="file_gallery.php">Lihat File yang Sudah Diunggah</a>
    <td>
    <img src="uploads/<?php echo $row['file']; ?>" alt="Hijab Image">
    </td>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pembeli</th>
                <th>Jenis Hijab</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Koneksi ke database
            include 'koneksi.php';

            // Query SQL untuk mengambil data hijab
            $sql = "SELECT * FROM hijab";
            $result = mysqli_query($conn, $sql);

            // Perulangan untuk menampilkan data hijab dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nama_pembeli'] . "</td>";
                echo "<td>" . $row['jenis_hijab'] . "</td>";
                echo "<td>" . $row['harga'] . "</td>";
                echo "<td>" . $row['stok'] . "</td>";
                echo "<td>";
                echo "<a href='edit.php?id=" . $row['id'] . "' class='btn-edit'><button>Edit</button></a>";
                echo "&nbsp;"; // Menambahkan spasi di sini
                echo "<a href='delete.php?id=" . $row['id'] . "' class='btn-delete'><button>Hapus</button></a>";
                echo "</td>";
                echo "</tr>";
            }
            
            // Tutup koneksi ke database
            mysqli_close($conn);
            ?>
        </tbody>
    </table>

    <h2>Tambah Data Hijab</h2>
    <form method="post" action="process.php">
        <div class="form-group">
            <label for="nama_pembeli">Nama Pembeli:</label>
            <input type="text" id="nama_pembeli" name="nama_pembeli" required>
        </div>
        <div class="form-group">
            <label for="jenis_hijab">Jenis Hijab:</label>
            <input type="text" id="jenis_hijab" name="jenis_hijab" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga Hijab:</label>
            <input type="number" id="harga" name="harga" required>
        </div>
        <div class="form-group">
            <label for="stok">Stok:</label>
            <input type="number" id="stok" name="stok" required>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar Hijab:</label>
            <input type="file" id="gambar" name="gambar">
        </div>
        <button type="submit">Tambah Data</button>
    </form>
</body>
</html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Hijab</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Data Hijab</h1>
    <a href="tambah.php">Tambah Data</a>
    <table class="data-table">
        <tr>
            <th>ID</th>
            <th>Nama Pembeli</th>
            <th>Jenis Hijab</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
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
            echo "<td><a href='edit.php?id=" . $row["id"] . "'>Edit</a> | <a href='hapus.php?id=" . $row["id"] . "'>Hapus</a></td>";
            echo "</tr>";
        }
        ?>
<!-- popup -->
<script>
    alert("WELCOME TO MY HIJAB SHOP");
    </script>
  <!-- akhir popup -->
    <header>
        <div class="container">
            <h1>Toko Hijab</h1>
        </div>
    </header>

    <nav>
        <div class="container">
            <ul>
                <li><a href="#beranda">Beranda</a></li>
                <li><a href="#tentang-saya">Tentang Saya</a></li>
                <li><a href="#toko-hijab">Toko Hijab</a></li>
                <li><a href="#daftar-hijab">Daftar Hijab</a></li>
                <li class="theme-switch">
                    <button id="theme-toggle-btn">Dark Mode</button>
                    <input type="checkbox" id="theme-toggle">
                </li>
            </ul>
        </div>
    </nav>
    
    <main>
        <section id="INPUT DATA HIJAB" class="form">
        <form method="post" action="process.php" class="form">
    <div class="form-group">
        <label for="nama_pembeli">Nama Pembeli:</label>
        <div class="input-icon">
            <input type="text" id="nama_pembeli" name="nama_pembeli" required>
            <i class="fas fa-user"></i>
        </div>
    </div>

    <div class="form-group">
        <label for="jenis_hijab">Jenis Hijab:</label>
        <div class="input-icon">
            <input type="text" id="jenis_hijab" name="jenis_hijab" placeholder="Contoh: Bergo" required>
            <i class="fas fa-user"></i>
        </div>
    </div>

    <div class="form-group">
        <label for="harga">Harga Hijab:</label>
        <div class="input-icon">
            <input type="number" id="harga" name="harga" placeholder="Contoh: 100000" required>
            <i class="fas fa-money"></i>
        </div>
    </div>

    <div class="form-group">
        <label for="stok">Stok:</label>
        <div class="input-icon">
            <input type="number" id="stok" name="stok" placeholder="Contoh: 10" required>
            <i class="fas fa-money"></i>
        </div>
    </div>

    <button type="submit" class="btn-submit">Submit</button>
</form>
<!-- Menampilkan tabel data -->
<table>
<tr>
        <th>ID</th>
        <th>Nama Pembeli</th>
        <th>Jenis Hijab</th>
        <th>Harga</th>
        <th>Stok</th>
    </tr>
    <?php
    // Membaca data hijab dari database
    $sql = "SELECT * FROM hijab";
    $result = mysqli_query($conn, $sql);
    
    // Menampilkan data dalam tabel
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nama_pembeli"] . "</td>";
        echo "<td>" . $row["jenis_hijab"] . "</td>";
        echo "<td>" . $row["harga"] . "</td>";
        echo "<td>" . $row["stok"] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
        </form>
        </section>

        <section id="beranda" class="section">
            <div class="container">
                <h2>Selamat datang di Toko Hijab</h2>
                <p>Selamat berbelanja hijab terbaru di toko kami.</p>
                <!-- manipulasi dom -->
            <div id="elemen" style="display: block;">Menu Beranda Toko Hijab</div>
  
            <button onclick="toggleElemen()">HIDE</button>
  
            <script>
            function toggleElemen() {
              // Mengambil elemen dengan ID 'elemen'
              var elemen = document.getElementById('elemen');
  
              // Memeriksa apakah elemen saat ini tersembunyi atau ditampilkan
              if (elemen.style.display === 'none') {
                  // Jika tersembunyi, tampilkan elemen
                  elemen.style.display = 'block';
              } else {
                  // Jika ditampilkan, sembunyikan elemen
                  elemen.style.display = 'none';
          }
        }
      </script>
      <!-- akhir manipulasi dom -->
            </div>
        </section>

        <section id="tentang-saya" class="section">
            <div class="container">
                <h2>Tentang Saya</h2>
                <div class="about-me">
                    <img src="Foto-Aji-Dinda.jpeg" alt="Foto Saya">
                </div>
            </div>
            <!-- AddEventListener -->
            <button id="btn-info">Klik jika ingin tahu tentang owner</button>
            <p id="info" style="display: none;">Ini adalah halaman tentang saya. Saya adalah pemilik toko hijab ini. 
                Selain menjadi pengusaha saya juga seorang mahasiswa di salah satu universitas terbaik di Kalimantan Timur, 
                Universitas Mulawarman, Fakultas Teknik, Program Studi Informatika.
            </p>
            <!-- akhir AddEventListener -->
            </section>

        <section id="toko-hijab" class="section">
            <div class="container">
                <h2>Toko Hijab</h2>
                <p>Lokasi toko kami: Jl. Kemakmuran, kota Samarinda</p>
                <p>Contact person: 0812 3456 7890</p>
            </div>
        </section>

        <section id="daftar-hijab" class="section">
            <div class="container">
                <h2>Daftar Hijab</h2>
                <div class="hijab-list">
                    <img src="Hijab Bella_Square.jpg" alt="Hijab 1">
                    <img src="Hijab_bergo.jfif" alt="Hijab 2">
                    <img src="Hijab_Pashmina.jpg" alt="Hijab 3">
                </div>
                <p>Kami menyediakan berbagai jenis hijab dengan stok yang banyak dan warna hijab yang beragam. 
                    Dengan kualitas terbaik yang kami sediakan, mudah dibentuk, tidak mudah kusut, dan nyaman saat digunakan.
                </p>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2023 Toko Hijab</p>
        </div>
    </footer>
</body>
<script src="script.js"></script>
</html>