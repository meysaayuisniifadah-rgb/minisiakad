<?php
session_start();

// proteksi login
if(!isset($_SESSION['role'])){
    header("Location: /minisiakad/minisiakad/login.php");
    exit;
}

// data
if(!isset($_SESSION['mhs'])) $_SESSION['mhs']=[];

// tambah
if(isset($_POST['tambah'])){
    $_SESSION['mhs'][]=[
        "nama"=>$_POST['nama'],
        "nim"=>$_POST['nim']
    ];
}

// hapus
if(isset($_GET['hapus'])){
    unset($_SESSION['mhs'][$_GET['hapus']]);
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/minisiakad/minisiakad/assets/style.css">
</head>
<body>

<div class="container">

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>ADMIN</h2>
    <a href="/minisiakad/minisiakad/dashboard_admin.php">Dashboard</a>
    <a href="/minisiakad/minisiakad/pages/mahasiswa.php">Mahasiswa</a>
    <a href="/minisiakad/minisiakad/pages/matakuliah.php">Mata Kuliah</a>
    <a href="/minisiakad/minisiakad/pages/nilai.php">Nilai</a>
    <a href="/minisiakad/minisiakad/pages/khs.php">KHS</a>
    <a href="/minisiakad/minisiakad/logout.php">Logout</a>
</div>

<!-- CONTENT -->
<div class="content">

<h2>Data Mahasiswa</h2>

<form method="POST">
<input name="nama" placeholder="Nama">
<input name="nim" placeholder="NIM">
<button name="tambah">Tambah</button>
</form>

<table>
<tr>
<th>Nama</th>
<th>NIM</th>
<th>Aksi</th>
</tr>

<?php foreach($_SESSION['mhs'] as $i=>$m): ?>
<tr>
<td><?= $m['nama'] ?></td>
<td><?= $m['nim'] ?></td>
<td>
<a href="?hapus=<?= $i ?>">Hapus</a>
</td>
</tr>
<?php endforeach; ?>

</table>

</div>
</div>

</body>
</html>