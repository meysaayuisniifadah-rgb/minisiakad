<?php
session_start();

// tampilkan error (biar ga blank)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// proteksi login
if(!isset($_SESSION['role'])){
    header("Location: /minisiakad/minisiakad/login.php");
    exit;
}

// file JSON
$file = __DIR__ . "/../data/mahasiswa.json";

// ambil dari JSON (AMAN)
if(file_exists($file)){
    $data = json_decode(file_get_contents($file), true);
    if(is_array($data)){
        $_SESSION['mhs'] = $data;
    }
}

// data default
if(!isset($_SESSION['mhs'])) $_SESSION['mhs']=[];

// tambah
if(isset($_POST['tambah'])){
    $_SESSION['mhs'][]=[
        "nama"=>$_POST['nama'],
        "nim"=>$_POST['nim'],
        "jurusan"=>$_POST['jurusan'] // 🔥 tambahan
    ];

    file_put_contents($file, json_encode($_SESSION['mhs'], JSON_PRETTY_PRINT));

    header("Location: mahasiswa.php");
    exit;
}

// hapus
if(isset($_GET['hapus'])){
    unset($_SESSION['mhs'][$_GET['hapus']]);
    $_SESSION['mhs'] = array_values($_SESSION['mhs']);

    file_put_contents($file, json_encode($_SESSION['mhs'], JSON_PRETTY_PRINT));

    header("Location: mahasiswa.php");
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

<!-- 🔥 DROPDOWN JURUSAN -->
<select name="jurusan">
    <option value="">-- Pilih Jurusan --</option>
    <option value="Informatika">Informatika</option>
    <option value="Sistem Informasi">Sistem Informasi</option>
    <option value="Manajemen">Manajemen</option>
    <option value="Akuntansi">Akuntansi</option>
</select>

<button name="tambah">Tambah</button>
</form>

<table>
<tr>
<th>Nama</th>
<th>NIM</th>
<th>Jurusan</th> <!-- 🔥 -->
<th>Aksi</th>
</tr>

<?php if(!empty($_SESSION['mhs'])): ?>
<?php foreach($_SESSION['mhs'] as $i=>$m): ?>
<tr>
<td><?= $m['nama'] ?></td>
<td><?= $m['nim'] ?></td>
<td><?= $m['jurusan'] ?? '-' ?></td> <!-- 🔥 -->
<td>
<a href="?hapus=<?= $i ?>" onclick="return confirm('Hapus data?')">Hapus</a>
</td>
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