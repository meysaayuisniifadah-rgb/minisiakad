<?php
session_start();

if(!isset($_SESSION['role'])){
    header("Location: /minisiakad/minisiakad/login.php");
    exit;
}

if(!isset($_SESSION['nilai'])) $_SESSION['nilai']=[];

if(isset($_POST['tambah'])){
    $_SESSION['nilai'][]=[
        "mhs"=>$_POST['mhs'],
        "mk"=>$_POST['mk'],
        "nilai"=>$_POST['nilai']
    ];
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
<?php foreach($_SESSION['mhs'] ?? [] as $m): ?>
<option><?= $m['nama'] ?></option>
<?php endforeach; ?>
</select>

<select name="mk">
<?php foreach($_SESSION['mk'] ?? [] as $m): ?>
<option><?= $m['nama'] ?></option>
<?php endforeach; ?>
</select>

<input name="nilai" placeholder="Nilai">
<button name="tambah">Tambah</button>

</form>

<table>
<tr><th>Mahasiswa</th><th>Mata Kuliah</th><th>Nilai</th></tr>

<?php foreach($_SESSION['nilai'] as $n): ?>
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