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

    // Tangkap data gambar upload bukti izin
    $bukti = $_FILES['bukti']['name'];
    $bukti_temp = $_FILES['bukti']['tmp_name'];
    $bukti_path = "../../IzinSiswa/images" . $bukti;

    // Memindahkan gambar ke direktori yang ditentukan
    move_uploaded_file($bukti_temp, $bukti_path);

    // Cek apakah data dengan id tersebut sudah ada di database
    $check_query = "SELECT * FROM izinSiswa WHERE id = '$id'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        // Jika data sudah ada, update data
        $update_query = "UPDATE izinSiswa SET 
                         nis = '$nis', 
                         nama_siswa = '$nama_siswa', 
                         kelas = '$kelas', 
                         jurusan = '$jurusan', 
                         jenis_kelamin = '$jenis_kelamin', 
                         alasan = '$alasan', 
                         bukti = '$bukti' 
                         WHERE id = '$id'";

        if (mysqli_query($conn, $update_query)) {
            echo '<script>alert("Data Berhasil Diupdate !!!"); window.location.href="../Siswa/indexSiswa.php"</script>';
        } else {
            die(mysqli_error($conn));
        }
    } else {
        // Jika data belum ada, tampilkan pesan kesalahan
        echo '<script>alert("Data dengan ID tersebut tidak ditemukan."); window.location.href="../Siswa/indexSiswa.php"</script>';
    }
}
