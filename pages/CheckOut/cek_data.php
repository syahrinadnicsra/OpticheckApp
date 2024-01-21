<?php
// Ambil data NIS dan tanggal dari POST request
$nis = $_POST['nis'];
$tanggal = $_POST['tanggal'];

$host = "localhost";
$user = "root";
$password = "";
$db = "opticheck";

$conn = mysqli_connect($host, $user, $password, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk memeriksa apakah data sudah ada
$sql = "SELECT * FROM checkout WHERE nis = '$nis' AND tanggal = '$tanggal'";
$result = $conn->query($sql);

// Jika data sudah ada, kirim respons 'sudah_absen'
if ($result->num_rows > 0) {
    echo 'sudah_absen';
} else {
    // Jika data belum ada, kirim respons lain (misalnya 'belum_absen')
    echo 'belum_absen';
}

$conn->close();
?>
