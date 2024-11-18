<?php
session_start();
session_unset();
session_destroy();
// Mengarahkan pengguna kembali ke halaman login.php setelah logout
header("Location: login.php");
exit();
?>
