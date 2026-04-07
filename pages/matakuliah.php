<?php
session_start();

if(!isset($_SESSION['role'])){
    header("Location: /minisiakad/minisiakad/login.php");
    exit;
}

if(!isset($_SESSION['mk'])) $_SESSION['mk']=[];

if(isset($_POST['tambah'])){
    $_SESSION['mk'][]=[
        "kode"=>$_POST['kode'],
        "nama"=>$_POST['nama'],
        "sks"=>$_POST['sks']
    ];
}

if(isset($_GET['hapus'])){
    unset($_SESSION['mk'][$_GET['hapus']]);
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
<a href="/minisiakad/minisiakad/pages/matakuliah.php">Mata Kuliah</a>

<br>

<a class="btn-back" href="/minisiakad/minisiakad/dashboard_<?=$_SESSION['role']?>.php">
⬅️ Kembali
</a>

</div>

<div class="content">

<h2>Data Mata Kuliah</h2>

<form method="POST">
<input name="kode" placeholder="Kode">
<input name="nama" placeholder="Nama">
<input name="sks" placeholder="SKS">
<button name="tambah">Tambah</button>
</form>

<table>
<tr><th>Kode</th><th>Nama</th><th>SKS</th><th>Aksi</th></tr>

<?php foreach($_SESSION['mk'] as $i=>$m): ?>
<tr>
<td><?= $m['kode'] ?></td>
<td><?= $m['nama'] ?></td>
<td><?= $m['sks'] ?></td>
<td><a href="?hapus=<?= $i ?>">Hapus</a></td>
</tr>
<?php endforeach; ?>

</table>

</div>
</div>

</body>
</html>