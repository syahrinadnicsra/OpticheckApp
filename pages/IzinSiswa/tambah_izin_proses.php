<?php
include __DIR__ . "/../../conf/conn.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alasan = $_POST['alasan'];

    // Validate and handle file upload
    if (isset($_FILES['bukti']) && $_FILES['bukti']['error'] === 0) {
        $bukti = $_FILES['bukti']['name'] ?? 'unknown_file';
        $bukti_temp = $_FILES['bukti']['tmp_name'];
        $bukti_path = "images" . DIRECTORY_SEPARATOR . $bukti;

        if (move_uploaded_file($bukti_temp, $bukti_path)) {
            // Database connection
            if ($conn) {
                // Use prepared statements to prevent SQL injection
                $query = $conn->prepare("INSERT INTO izinSiswa(nis, nama_siswa, kelas, jurusan, jenis_kelamin, alasan, bukti) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)");
                $query->bind_param("sssssss", $nis, $nama_siswa, $kelas, $jurusan, $jenis_kelamin, $alasan, $bukti);

                
                if ($query->execute()) {
                    echo '<script>alert("Data Berhasil Ditambahkan !!!"); window.location.href="../Siswa/indexSiswa.php"</script>';
                } else {
                    echo "Error: " . $query->error;
                }

                // Close the prepared statement and connection
                $query->close();
                $conn->close();
            } else {
                echo "Database connection error.";
            }
        } else {
            echo "Error uploading file. Details: " . $_FILES['bukti']['error'];
        }
    } else {
        echo "Error uploading file. Details: " . $_FILES['bukti']['error'];
    }
}
?>
