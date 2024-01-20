<?php
include __DIR__ . "/../../conf/conn.php";
if ($_POST) {
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $query = ("INSERT INTO siswa(id,nis,nama_siswa,kelas,jurusan,jenis_kelamin) 
           VALUES ('" . $id . "','" . $nis . "','" . $nama_siswa . "','" . $kelas . "','" . $jurusan . "','" . $jenis_kelamin . "')");
    if (!mysqli_query($conn, $query)) {
        die(mysql_error);
    } else {
        echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="../Admin/indexAdmin.php"</script>';
    }
}
