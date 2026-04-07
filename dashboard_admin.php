<?php
session_start();

// proteksi login
if(!isset($_SESSION['role']) || $_SESSION['role']!='admin'){
    header("Location: /minisiakad/minisiakad/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard Admin</title>
<link rel="stylesheet" href="/minisiakad/minisiakad/assets/style.css">
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Campus System</h2>
        <a href="/minisiakad/minisiakad/dashboard_admin.php">Dashboard</a>
        <a href="/minisiakad/minisiakad/pages/mahasiswa.php">Mahasiswa</a>
        <a href="/minisiakad/minisiakad/pages/matakuliah.php">Mata Kuliah</a>
        <a href="/minisiakad/minisiakad/pages/nilai.php">Nilai</a>
        <a href="/minisiakad/minisiakad/pages/khs.php">KHS</a>
        <a href="/minisiakad/minisiakad/logout.php">Logout</a>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <h1>Dashboard Admin</h1>

        <div class="card">
            <h3>Selamat datang Admin 🎓</h3>
            <p>Kelola sistem akademik di sini</p>
        </div>

    </div>

</div>

</body>
</html>