<!-- <?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// $servername = "localhost";
// $username = "root";
// $password = ""; // Password database Anda
// $dbname = "tokohijab";

// // Membuat koneksi
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Memeriksa koneksi
// if ($conn->connect_error) {
//     die("Koneksi gagal: " . $conn->connect_error);
// } 
// ?> -->

<!-- <?php
// $server = "localhost"; // Ganti dengan nama server Anda
// $username = "root"; // Ganti dengan nama pengguna MySQL Anda
// $password = ""; // Ganti dengan kata sandi MySQL Anda
// $database = "tokohijab"; // Ganti dengan nama database Anda

// // Membuat koneksi ke database
// $conn = mysqli_connect($server, $username, $password, $database);

// // Periksa koneksi
// if (!$conn) {
//     die("Koneksi ke database gagal: " . mysqli_connect_error());
// }
?>
 -->

 <?php
$host = 'localhost'; // Ganti dengan host database Anda
$username = 'root'; // Ganti dengan nama pengguna database Anda
$password = ''; // Ganti dengan kata sandi database Anda
$database = 'tokohijab'; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// Periksa koneksi
if (!$conn) {
    die('Koneksi database gagal: ' . mysqli_connect_error());
}
?>
