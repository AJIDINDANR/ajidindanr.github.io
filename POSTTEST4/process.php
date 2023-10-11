<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_hijab = $_POST["nama"];
    $harga_hijab = $_POST["harga"];
    $password = $_POST["password"];

    // Di sini Anda dapat melakukan apa yang Anda inginkan dengan data yang dikirim dari formulir
    // Misalnya, menyimpannya dalam database atau menampilkan pesan

    echo "<h2>Data Hijab yang di input:</h2>";
    echo "Nama Hijab: " . $nama_hijab . "<br>";
    echo "Harga Hijab: " . $harga_hijab . "<br>";

    // Pastikan untuk tidak menampilkan password dalam bentuk teks biasa
    // Sebaiknya Anda memprosesnya dengan aman, misalnya dengan hashing.

    echo "Password: " . $password . "<br>";
}
?>