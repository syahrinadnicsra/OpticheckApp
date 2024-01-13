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

    //Tangkap data gambar upload bukti izin
    $bukti = $_FILES['bukti']['name'];
    $bukti_temp = $_FILES['bukti']['tmp_name'];
    $bukti_path = "../../IzinSiswa/images" . $bukti;

    //Memindahkan gambar ke direktori yang ditentukan
    move_uploaded_file($bukti_temp, $bukti_path);

    // Setting query
    $query = ("INSERT INTO izinSiswa(id,nis,nama_siswa,kelas,jurusan,jenis_kelamin,alasan,bukti) 
           VALUES ('" . $id . "','" . $nis . "','" . $nama_siswa . "','" . $kelas . "','" . $jurusan . "','" . $jenis_kelamin . "','" . $alasan . "','" . $bukti . "')");
    if (!mysqli_query($conn, $query)) {
        die(mysql_error);
    } else {
        echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="../Siswa/indexSiswa.php"</script>';
    }
}
