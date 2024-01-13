<?php
include __DIR__ . "/../../conf/conn.php";
if ($_POST) {
    $id = $_POST['id'];

    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alasan = $_POST['alasan'];
    $bukti = $_POST['bukti'];
    $query = ("UPDATE izinSiswa SET nis='$nis',nama_siswa='$nama_siswa',kelas='$kelas',jurusan='$jurusan',jenis_kelamin='$jenis_kelamin',alasan='$alasan',bukti='$bukti' WHERE id ='$id'");
    if (!mysqli_query($conn, $query)) {
        die(mysql_error);
    } else {
        echo '<script>alert("Data Berhasil Diubah !!!");window.location.href="../Siswa/indexSiswa.php?page=data_izin"</script>';
    }
}
