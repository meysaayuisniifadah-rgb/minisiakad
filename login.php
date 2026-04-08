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

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI', sans-serif;
        }

        body {
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background: linear-gradient(135deg,#1e3c72,#2a5298);
        }

        /* CARD */
        .login-box {
            width:380px;
            padding:40px;
            border-radius:20px;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.25);
            text-align:center;
        }

        /* LOGO */
        .logo-img {
            width:120px;
            margin-bottom:10px;
        }

        .logo-text {
            font-size:22px;
            font-weight:bold;
            color:#1e3c72;
        }

        .subtitle {
            font-size:14px;
            color:#64748b;
            margin-bottom:25px;
        }

        h2 {
            margin-bottom:20px;
            color:#1e293b;
        }

        /* INPUT */
        .input-group {
            position:relative;
            margin-bottom:15px;
        }

        .input-group i {
            position:absolute;
            top:50%;
            left:12px;
            transform:translateY(-50%);
            color:#888;
        }

        .input-group input {
            width:100%;
            padding:12px 12px 12px 35px;
            border-radius:10px;
            border:1px solid #ccc;
            outline:none;
            transition:0.3s;
        }

        .input-group input:focus {
            border-color:#2a5298;
            box-shadow:0 0 5px rgba(42,82,152,0.3);
        }

        /* BUTTON */
        button {
            width:100%;
            padding:12px;
            border:none;
            border-radius:10px;
            background: linear-gradient(135deg,#2a5298,#1e3c72);
            color:white;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover {
            transform:scale(1.05);
        }
    </style>

</head>
<body>

<div class="login-box">

    <img src="assets/logo.png" class="logo-img">

    <div class="logo-text">EduTrack</div>
    <div class="subtitle">Sistem Informasi Akademik</div>

    <h2>Masuk ke Sistem</h2>

    <form method="POST">

        <div class="input-group">
            <i class="fa-solid fa-user"></i>
            <input name="user" placeholder="Username">
        </div>

        <div class="input-group">
            <i class="fa-solid fa-lock"></i>
            <input name="pass" type="password" placeholder="Password">
        </div>

        <button name="login">Login</button>

    </form>

</div>

</body>
</html>