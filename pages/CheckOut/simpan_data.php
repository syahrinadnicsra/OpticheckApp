<?php
require_once __DIR__ . "/../../conf/conn.php";

// Terima data dari AJAX
$nis = isset($_POST['nis']) ? $_POST['nis'] : '';
$tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';

// Temukan id_siswa berdasarkan nis
$id_siswa_query = "SELECT id FROM siswa WHERE nis = '$nis'";
$id_siswa_result = $conn->query($id_siswa_query);

if ($id_siswa_result->num_rows > 0) {
    $row = $id_siswa_result->fetch_assoc();
    $id_siswa = $row['id'];
    // Gunakan id_siswa yang ditemukan untuk operasi INSERT INTO
    $sql = "INSERT INTO checkout (id_siswa, tanggal, jam) VALUES ('$id_siswa', '$tanggal', CURRENT_TIME())";

    if (!empty($nis) && !empty($tanggal)) {
        // Lakukan penyimpanan data ke dalam tabel checkin
        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Data tidak lengkap";
    }
} else {
    echo "ID siswa tidak ditemukan untuk NIS $nis";
}

// Tutup koneksi
$conn->close();
?>
