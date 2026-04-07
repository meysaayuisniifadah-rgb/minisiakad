<?php
session_start();

// kalau sudah login → arahkan sesuai role
if(isset($_SESSION['role'])){
    
    if($_SESSION['role'] == "admin"){
        header("Location: dashboard_admin.php");
        exit;
    }

    elseif($_SESSION['role'] == "dosen"){
        header("Location: dashboard_dosen.php");
        exit;
    }

    elseif($_SESSION['role'] == "mahasiswa"){
        header("Location: dashboard_mahasiswa.php");
        exit;
    }
}

// kalau belum login → ke login
header("Location: login.php");
exit;