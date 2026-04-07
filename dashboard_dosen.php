<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role']!='dosen'){
    header("Location: /minisiakad/minisiakad/login.php");
    exit;
}
?>

<link rel="stylesheet" href="/minisiakad/minisiakad/assets/style.css">

<div class="container">

<div class="sidebar">
    <h2>DOSEN</h2>
    <a href="/minisiakad/minisiakad/dashboard_dosen.php">Dashboard</a>
    <a href="/minisiakad/minisiakad/pages/nilai.php">Input Nilai</a>
    <a href="/minisiakad/minisiakad/logout.php">Logout</a>
</div>

<div class="content">
    <h1>Dashboard Dosen</h1>
    <p>Input nilai mahasiswa 📊</p>
</div>

</div>