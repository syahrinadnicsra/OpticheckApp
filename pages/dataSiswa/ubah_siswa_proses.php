<?php
include __DIR__ . "/../../conf/conn.php";
if ($_POST) {
    $id = $_POST['id'];

    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $query = ("UPDATE siswa SET nis='$nis',nama_siswa='$nama_siswa',kelas='$kelas',jurusan='$jurusan',jenis_kelamin='$jenis_kelamin' WHERE id ='$id'");
    if (!mysqli_query($conn, $query)) {
        die(mysql_error);
    } else {
        echo '<script>alert("Data Berhasil Diubah !!!");window.location.href="../Admin/indexAdmin.php?page=data_siswa"</script>';
    }
}
