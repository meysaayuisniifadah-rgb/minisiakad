<?php
session_start();

// hapus semua session
$_SESSION = [];
session_destroy();

// redirect ke login (PASTI BENAR)
header("Location: /minisiakad/minisiakad/login.php");
exit;