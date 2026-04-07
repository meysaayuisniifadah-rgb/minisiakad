<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role']!='mahasiswa'){
    header("Location: /minisiakad/minisiakad/login.php");
    exit;
}
?>

<link rel="stylesheet" href="/minisiakad/minisiakad/assets/style.css">

<div class="container">

<div class="sidebar">
    <h2>MAHASISWA</h2>
    <a href="/minisiakad/minisiakad/dashboard_mahasiswa.php">Dashboard</a>
    <a href="/minisiakad/minisiakad/pages/khs.php">KHS</a>
    <a href="/minisiakad/minisiakad/logout.php">Logout</a>
</div>

<div class="content">
    <h1>Dashboard Mahasiswa</h1>
    <p>Lihat nilai & IPK 🎓</p>
</div>

</div>