<?php 
session_start();

// 🔥 biar error keliatan (anti blank)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// proteksi login
if(!isset($_SESSION['role'])){
    header("Location: /minisiakad/minisiakad/login.php");
    exit;
}

// 🔥 file JSON
$file = __DIR__ . "/../data/matakuliah.json";

// 🔥 ambil data JSON (AMAN)
if(file_exists($file)){
    $data = json_decode(file_get_contents($file), true);
    if(is_array($data)){
        $_SESSION['mk'] = $data;
    }
}

// data default
if(!isset($_SESSION['mk'])) $_SESSION['mk']=[];

// tambah
if(isset($_POST['tambah'])){
    $_SESSION['mk'][]=[
        "kode"=>$_POST['kode'],
        "nama"=>$_POST['nama'],
        "sks"=>$_POST['sks']
    ];

    // 🔥 simpan ke JSON
    file_put_contents($file, json_encode($_SESSION['mk'], JSON_PRETTY_PRINT));

    header("Location: matakuliah.php");
    exit;
}

// hapus
if(isset($_GET['hapus'])){
    unset($_SESSION['mk'][$_GET['hapus']]);

    // 🔥 rapikan index
    $_SESSION['mk'] = array_values($_SESSION['mk']);

    // 🔥 update JSON
    file_put_contents($file, json_encode($_SESSION['mk'], JSON_PRETTY_PRINT));

    header("Location: matakuliah.php");
    exit;
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

<?php if(!empty($_SESSION['mk'])): ?>
<?php foreach($_SESSION['mk'] as $i=>$m): ?>
<tr>
<td><?= $m['kode'] ?></td>
<td><?= $m['nama'] ?></td>
<td><?= $m['sks'] ?></td>
<td><a href="?hapus=<?= $i ?>" onclick="return confirm('Hapus data?')">Hapus</a></td>
</tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
<td colspan="4">Belum ada data</td>
</tr>
<?php endif; ?>

</table>

</div>
</div>

</body>
</html>