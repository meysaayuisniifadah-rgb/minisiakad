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
        <a href="/minisiakad/minisiakad/logout.php">Logout</a>
    </div>

    <div class="content">

    <h1 class="title">Dashboard Admin</h1>
    <p class="subtitle">Sistem Informasi Akademik</p>

    <div class="welcome-box">
        👋 Selamat datang, Admin
    </div>

    <div class="cards">
        <div class="card-box">
            <h3>👨‍🎓 Mahasiswa</h3>
            <p>120</p>
        </div>

        <div class="card-box">
            <h3>📚 Mata Kuliah</h3>
            <p>25</p>
        </div>
    </div>

</div>
