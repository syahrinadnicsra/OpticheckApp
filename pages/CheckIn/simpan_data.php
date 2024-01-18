<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "opticheck";

$conn = mysqli_connect($host, $user, $password, $db);

//Cek Koneksi
if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
//echo "Koneksi ke database sukses..";

// Terima data dari AJAX
// Terima data dari AJAX
$nis = isset($_POST['nis']) ? $_POST['nis'] : '';
$tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
$jam = isset($_POST['jam']) ? $_POST['jam'] : '';

// Lakukan penyimpanan data ke dalam tabel (gantilah sesuai dengan struktur tabel Anda)
$sql = "INSERT INTO checkin (nis, tanggal, jam) VALUES ('$nis', '$tanggal', '$jam')";

if (!empty($nis) && !empty($tanggal) && !empty($jam)) {
    // Lakukan penyimpanan data ke dalam tabel (gantilah sesuai dengan struktur tabel Anda)
    $sql = "INSERT INTO checkin (nis, tanggal, jam) VALUES ('$nis', '$tanggal', '$jam')";

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
