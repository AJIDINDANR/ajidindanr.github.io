<?php
$servername = "localhost";
$user = "root";
$pass = "" ;
$db = "tokohijab";

$conn = mysqli_connect($servername, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal". mysqli_connect_error());
}
//echo "connected successfully";
?>