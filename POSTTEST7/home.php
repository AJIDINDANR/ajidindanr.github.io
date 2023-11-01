<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, tampilkan form login dan register
    // Anda dapat menambahkan form register di sini
    include 'register.php';
    include 'login.php';
    
} else {
    // Jika pengguna sudah login, tampilkan konten dashboard
    include 'dashboard.php';
}
?>