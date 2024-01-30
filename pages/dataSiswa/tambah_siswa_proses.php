<?php
include __DIR__ . "/../../conf/conn.php";

if ($_POST) {
    $id = $_POST['id'];
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    // Gunakan parameterized query untuk mencegah SQL injection
    $query = "INSERT INTO siswa (id, nis, nama_siswa, kelas, jurusan, jenis_kelamin) 
              VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssss", $id, $nis, $nama_siswa, $kelas, $jurusan, $jenis_kelamin);

    if (!mysqli_stmt_execute($stmt)) {
        die(mysqli_error($conn)); // Tangani kesalahan dengan memberikan pesan yang jelas
    } else {
        echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="../Admin/indexAdmin.php?page=data_siswa"</script>';
    }

    mysqli_stmt_close($stmt);
}
?>
