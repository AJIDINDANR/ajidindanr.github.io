<?php
// Hanya tampilkan konten dashboard jika pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Redirect ke halaman login jika sesi belum aktif
    header('Location: login.php');
    exit();
}

// Konten halaman dashboard
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat datang, <?php echo $_SESSION['username']; ?>!</h1>
    <!-- Tambahkan konten dashboard sesuai kebutuhan -->
</body>
</html>