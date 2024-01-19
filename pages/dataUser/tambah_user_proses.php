<?php
include __DIR__ . "/../../conf/conn.php";
if ($_POST) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password']; //md5($_POST['password']); untuk menyembunyikan password
    $role = $_POST['role'];
    // Sesuaikan format tanggal dari input user (d-m-Y atau Y-m-d)
    $created_date = date('Y-m-d', strtotime($_POST['created_date'])); //PERLU DIPERBAIKI KARENA JIKA INPUT DARI HALAMAN TAMBAH USER, TANGGAL BELUM BISA SESUAI ANTARA YANG DIPILIH DENGAN YANG TERSIMPAN

    $query = ("INSERT INTO user(id,nama,username,password,role,created_date) 
           VALUES ('" . $id . "','" . $nama . "','" . $username . "','" . $password . "','" . $role . "','" . $created_date . "')");
    if (!mysqli_query($conn, $query)) {
        die(mysql_error);
    } else {
        echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="../Admin/indexAdmin.php"</script>';
    }
}
