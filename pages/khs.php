<?php
session_start();

if(!isset($_SESSION['role'])){
    header("Location: /minisiakad/minisiakad/login.php");
    exit;
}

if(!isset($_SESSION['mhs'])) $_SESSION['mhs']=[];

// Tambahkan NIM mahasiswa login jika role mahasiswa
$nim_login = $_SESSION['role'] === 'mahasiswa' ? ($_SESSION['nim'] ?? '') : '';

if(isset($_POST['tambah'])){
    $_SESSION['mhs'][]=[
        "nama"=>$_POST['nama'],
        "nim"=>$_POST['nim']
    ];
}

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

<div class="sidebar">
<h2><?= strtoupper($_SESSION['role']) ?></h2>

<a href="/minisiakad/minisiakad/dashboard_<?=$_SESSION['role']?>.php">Dashboard</a>
<a href="/minisiakad/minisiakad/pages/mahasiswa.php">Mahasiswa</a>

<br>

<a class="btn-back" href="/minisiakad/minisiakad/dashboard_<?=$_SESSION['role']?>.php">
⬅️ Kembali
</a>

</div>

<div class="content">

<h2><?= $_SESSION['role']==='mahasiswa' ? 'KHS Saya' : 'Data Mahasiswa' ?></h2>

<?php if($_SESSION['role']!=='mahasiswa'): ?>
<form method="POST">
<input name="nama" placeholder="Nama">
<input name="nim" placeholder="NIM">
<button name="tambah">Tambah</button>
</form>
<?php endif; ?>

<table>
<tr><th>Nama</th><th>NIM</th><th>Aksi</th></tr>

<?php foreach($_SESSION['mhs'] as $i=>$m): ?>
    <?php
    // Filter: kalau mahasiswa, tampilkan hanya data miliknya
    if($_SESSION['role']==='mahasiswa' && $m['nim'] !== $nim_login) continue;
    ?>
<tr>
<td><?= $m['nama'] ?></td>
<td><?= $m['nim'] ?></td>
<td>
<?php if($_SESSION['role']!=='mahasiswa'): ?>
<a href="?hapus=<?= $i ?>">Hapus</a>
<?php endif; ?>
</td>
</tr>
<?php endforeach; ?>

</table>

</div>
</div>

</body>
</html>