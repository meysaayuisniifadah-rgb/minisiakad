<?php
session_start();

if(!isset($_SESSION['role'])){
    header("Location: /minisiakad/minisiakad/login.php");
    exit;
}

/* ================= FILE JSON ================= */
$file_nilai = __DIR__ . "/../data/nilai.json";
$file_mhs   = __DIR__ . "/../data/mahasiswa.json";
$file_mk    = __DIR__ . "/../data/matakuliah.json";

/* ================= AMBIL DATA ================= */
$nilai = file_exists($file_nilai) ? json_decode(file_get_contents($file_nilai), true) : [];
$mhs   = file_exists($file_mhs)   ? json_decode(file_get_contents($file_mhs), true)   : [];
$mk    = file_exists($file_mk)    ? json_decode(file_get_contents($file_mk), true)    : [];

if(!is_array($nilai)) $nilai=[];
if(!is_array($mhs)) $mhs=[];
if(!is_array($mk)) $mk=[];

/* ================= TAMBAH NILAI ================= */
if(isset($_POST['tambah'])){
    if(!empty($_POST['mhs']) && !empty($_POST['mk'])){
        
        $nilai[]=[
            "mhs"=>$_POST['mhs'],
            "mk"=>$_POST['mk'],
            "nilai"=>$_POST['nilai']
        ];

        file_put_contents($file_nilai, json_encode($nilai, JSON_PRETTY_PRINT));

        header("Location: nilai.php");
        exit;
    }
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
<a href="/minisiakad/minisiakad/pages/nilai.php">Nilai</a>

<br>

<a class="btn-back" href="/minisiakad/minisiakad/dashboard_<?=$_SESSION['role']?>.php">
⬅️ Kembali
</a>
</div>

<div class="content">

<h2>Input Nilai</h2>

<form method="POST">

<select name="mhs">
<option value="">-- Pilih Mahasiswa --</option>
<?php foreach($mhs as $m): ?>
<option><?= $m['nama'] ?></option>
<?php endforeach; ?>
</select>

<select name="mk">
<option value="">-- Pilih Mata Kuliah --</option>
<?php foreach($mk as $m): ?>
<option value="<?= $m['nama'] ?>">
<?= $m['nama'] ?> (<?= $m['sks'] ?> SKS)
</option>
<?php endforeach; ?>
</select>

<input name="nilai" placeholder="Nilai (A / 90)">

<button name="tambah">Tambah</button>

</form>

<table>
<tr>
<th>Mahasiswa</th>
<th>Mata Kuliah</th>
<th>Nilai</th>
</tr>

<?php foreach($nilai as $n): ?>
<tr>
<td><?= $n['mhs'] ?></td>
<td><?= $n['mk'] ?></td>
<td><?= $n['nilai'] ?></td>
</tr>
<?php endforeach; ?>

</table>

</div>
</div>

</body>
</html>