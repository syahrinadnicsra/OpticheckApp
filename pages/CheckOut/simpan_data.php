<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "opticheck";

$conn = mysqli_connect($host, $user, $password, $db);

// Cek Koneksi
if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

// Terima data dari AJAX
$nis = isset($_POST['nis']) ? $_POST['nis'] : '';
$tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';

// Menggunakan CURRENT_TIME() untuk mendapatkan waktu saat ini di sisi database
$sql = "INSERT INTO checkout (nis, tanggal, jam) VALUES ('$nis', '$tanggal', CURRENT_TIME())";

if (!empty($nis) && !empty($tanggal)) {
    // Lakukan penyimpanan data ke dalam tabel (gantilah sesuai dengan struktur tabel Anda)
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Data tidak lengkap";
}

// Tutup koneksi
$conn->close();
?>
