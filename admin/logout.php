<?php
session_start();

// Hapus variabel sesi 'user' dan 'pass'
unset($_SESSION['user']);
unset($_SESSION['pass']);

// Hancurkan sesi
session_destroy();

// Pesan logout berhasil
echo "Logout success!";
echo "<meta http-equiv='refresh' content='2;url=index.php'>";
?>
