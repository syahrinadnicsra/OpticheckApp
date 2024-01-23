<?php
include __DIR__ . "/../../conf/conn.php";

if ($_POST) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Sesuaikan format tanggal dari input user (d-m-Y atau Y-m-d)
    $created_date = date('Y-m-d');

    // Gunakan parameterized query untuk mencegah SQL injection
    $query = "INSERT INTO user (id, nama, username, password, role, created_date) 
              VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssss", $id, $nama, $username, $password, $role, $created_date);

    if (!mysqli_stmt_execute($stmt)) {
        die(mysqli_error($conn)); // Tangani kesalahan dengan memberikan pesan yang jelas
    } else {
        echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="../Admin/indexAdmin.php?page=data_user"</script>';
    }

    mysqli_stmt_close($stmt);
}
