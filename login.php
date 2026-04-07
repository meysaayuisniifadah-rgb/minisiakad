<?php
session_start();

if(isset($_POST['login'])){
    $u = $_POST['user'];
    $p = $_POST['pass'];

    if($u=="admin" && $p=="123"){
        $_SESSION['role']="admin";
        header("Location: dashboard_admin.php");
    }
    elseif($u=="dosen" && $p=="123"){
        $_SESSION['role']="dosen";
        header("Location: dashboard_dosen.php");
    }
    elseif($u=="mahasiswa" && $p=="123"){
        $_SESSION['role']="mahasiswa";
        header("Location: dashboard_mahasiswa.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>EduTrack - Login</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="login">

    <div class="card login-box">

        <h1 class="logo">EduTrack</h1>
        <p class="subtitle">Sistem Informasi Akademik</p>

        <h2>Masuk ke Sistem</h2>

        <form method="POST">
            <input name="user" placeholder="Username">
            <input name="pass" type="password" placeholder="Password">
            <button name="login">Login</button>
        </form>

    </div>

</div>

</body>
</html>