<?php
// Ambil data nis dan tanggal dari POST request
$nis = $_POST['nis'];
$tanggal = $_POST['tanggal'];

require_once __DIR__ . "/../../conf/conn.php";

// Ambil id_siswa dari tabel siswa berdasarkan nis
$sqlSiswa = "SELECT id FROM siswa WHERE nis = '$nis'";
$resultSiswa = $conn->query($sqlSiswa);

if ($resultSiswa->num_rows > 0) {
    // Ambil id_siswa dari hasil query
    $rowSiswa = $resultSiswa->fetch_assoc();
    $id_siswa = $rowSiswa['id'];

    // Query untuk memeriksa apakah data sudah ada
    $sqlCheckin = "SELECT * FROM checkin WHERE id_siswa = '$id_siswa' AND tanggal = '$tanggal'";
    $resultCheckin = $conn->query($sqlCheckin);

    // Jika data sudah ada, kirim respons 'sudah_absen'
    if ($resultCheckin->num_rows > 0) {
        echo '1';
    } else {
        // Jika data belum ada, kirim respons lain (misalnya 'belum_absen')
        echo '0';
    }
} else {
    // Jika nis tidak ditemukan di tabel siswa
    echo '2';
}

$conn->close();
?>
