<?php
session_start();
include('conn.php');
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM loginGuru WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_assoc($query);
if (mysqli_num_rows($query) == 1) { //artinya datanya ada
    $_SESSION['nama'] = $_POST['username'];
    header('Location:../pages/Guru/indexGuru.php'); //Jika login berhasil akan lanjut ke halaman dashboard
} else {
    header('Location:../'); //Jika login gagal akan kembali
}
