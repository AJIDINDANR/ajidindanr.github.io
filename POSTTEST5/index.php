<?php
// Koneksi ke database
include 'koneksi.php';

$sql = "SELECT * FROM hijab";
$result = mysqli_query($conn, $sql);
?>

<!-- Sisipkan HTML Anda di sini -->

<table>
    <tr>
        <th>ID</th>
        <th>Nama Pembeli</th>
        <th>Jenis Hijab</th>
        <th>Harga</th>
        <th>Stok</th>
    </tr>
    <?php
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Hijab</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
            <input type="text" id="nama_pembeli" name="nama_pembeli" placeholder="Contoh: Bella Square" required>
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