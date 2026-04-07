<?php
session_start();

if(!isset($_SESSION['role'])){
    header("Location: /minisiakad/minisiakad/login.php");
    exit;
}

/* ================= DATA JSON ================= */
$file_mhs   = __DIR__ . "/../data/mahasiswa.json";
$file_mk    = __DIR__ . "/../data/matakuliah.json";
$file_nilai = __DIR__ . "/../data/nilai.json";

$mhs   = file_exists($file_mhs)   ? json_decode(file_get_contents($file_mhs), true)   : [];
$mk    = file_exists($file_mk)    ? json_decode(file_get_contents($file_mk), true)    : [];
$nilai = file_exists($file_nilai) ? json_decode(file_get_contents($file_nilai), true) : [];

if(!is_array($mhs)) $mhs=[];
if(!is_array($mk)) $mk=[];
if(!is_array($nilai)) $nilai=[];

/* ================= PILIH MAHASISWA ================= */
$nama = $_GET['mhs'] ?? '';

/* ================= BOBOT ================= */
function bobot($n){
    $n = trim($n);

    if(is_numeric($n)){
        if($n >= 85) return 4;
        if($n >= 70) return 3;
        if($n >= 60) return 2;
        if($n >= 50) return 1;
        return 0;
    }

    $n = strtoupper($n);
    if($n=='A') return 4;
    if($n=='B') return 3;
    if($n=='C') return 2;
    if($n=='D') return 1;
    return 0;
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
<a href="/minisiakad/minisiakad/pages/khs.php">KHS</a>

<br>

<a class="btn-back" href="/minisiakad/minisiakad/dashboard_<?=$_SESSION['role']?>.php">
⬅️ Kembali
</a>
</div>

<div class="content">

<h2>Kartu Hasil Studi (KHS)</h2>

<!-- ================= LIST MAHASISWA (UI BARU) ================= -->
<?php if(!$nama): ?>
<div class="card">

<h3>Pilih Mahasiswa</h3>

<div class="mhs-list">
<?php foreach($mhs as $m): ?>
<a class="mhs-card" href="khs.php?mhs=<?= urlencode($m['nama']) ?>">
    <div class="mhs-avatar">👨‍🎓</div>
    <div class="mhs-name"><?= $m['nama'] ?></div>
</a>
<?php endforeach; ?>
</div>

</div>
<?php endif; ?>

<!-- ================= TAMPIL KHS ================= -->
<?php if($nama): ?>

<div class="card">

<div class="khs-header">
    <h2>SISTEM INFORMASI AKADEMIK</h2>
    <p>Kartu Hasil Studi (KHS)</p>
</div>

<div class="khs-info">
    <p><b>Nama:</b> <?= $nama ?></p>
    <p><b>NIM:</b> 
        <?php 
        foreach($mhs as $m){
            if($m['nama']==$nama) echo $m['nim'];
        }
        ?>
    </p>
</div>

<table>
<tr>
<th>Mata Kuliah</th>
<th>SKS</th>
<th>Nilai</th>
</tr>

<?php 
$total_sks = 0;
$total_bobot = 0;
$ada = false;

foreach($nilai as $n):
if(strtolower(trim($n['mhs'])) == strtolower(trim($nama))):
    $ada = true;

    $sks = 0;
    foreach($mk as $mat){
        if(strtolower(trim($mat['nama'])) == strtolower(trim($n['mk']))){
            $sks = (int)$mat['sks'];
        }
    }

    if($sks == 0) $sks = 1;

    $b = bobot($n['nilai']);
    $total_sks += $sks;
    $total_bobot += ($sks * $b);
?>

<tr>
<td><?= $n['mk'] ?></td>
<td><?= $sks ?></td>
<td><?= strtoupper($n['nilai']) ?></td>
</tr>

<?php endif; endforeach; ?>

<?php if(!$ada): ?>
<tr><td colspan="3">Belum ada nilai</td></tr>
<?php endif; ?>

</table>

<div class="ipk-box">
IPK: <?= ($total_sks > 0) ? number_format($total_bobot/$total_sks,2) : '0.00' ?>
</div>

<br>

<button onclick="window.print()" class="btn-print">🖨️ Print</button>

</div>

<?php endif; ?>

</div>
</div>

</body>
</html>