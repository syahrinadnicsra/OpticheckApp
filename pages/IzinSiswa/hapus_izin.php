<?php
include __DIR__ . "/../../conf/conn.php";
$id = $_GET['id'];
$query = ("DELETE FROM izinSiswa WHERE id ='$id'");
if (!mysqli_query($conn, $query)) {
    die(mysql_error);
} else {
    echo '<script>alert("Data Berhasil Dihapus !!!");
		window.location.href="../Admin/indexAdmin.php?page=data_izin"</script>';
}
