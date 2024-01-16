<?php
// Mulai sesi (jika belum dimulai)
session_start();

// Hapus semua data sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login atau halaman lain yang sesuai
header("Location:../halamanUtama.php");
exit();
?>