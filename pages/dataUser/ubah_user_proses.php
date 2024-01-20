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
    $query = "UPDATE user 
              SET nama = ?, username = ?, password = ?, role = ?, created_date = ?
              WHERE id = ?";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssss", $nama, $username, $password, $role, $created_date, $id);

    if (!mysqli_stmt_execute($stmt)) {
        die(mysqli_error($conn)); // Tangani kesalahan dengan memberikan pesan yang jelas
    } else {
        echo '<script>alert("Data Berhasil Diupdate !!!"); window.location.href="../Admin/indexAdmin.php"</script>';
    }

    mysqli_stmt_close($stmt);
}
