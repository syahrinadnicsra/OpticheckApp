<?php

require_once __DIR__ . "/../../conf/conn.php";

// Dapatkan tanggal awal dan akhir bulan saat ini
$today = getdate();
$start_date = date('Y-m-01', strtotime($today['year'] . '-' . $today['mon'] . '-01'));
$end_date = date('Y-m-t', strtotime($today['year'] . '-' . $today['mon'] . '-01'));

// Hitung total hari pada bulan ini
$total_days_in_month = cal_days_in_month(CAL_GREGORIAN, $today['mon'], $today['year']);

$nis_session = isset($_SESSION['nis']) ? $_SESSION['nis'] : '';
$query = "SELECT siswa.nis, siswa.nama_siswa, siswa.kelas, siswa.jurusan, COUNT(*) as total_hadir
        FROM siswa
        LEFT JOIN checkin ON siswa.nis = checkin.nis AND checkin.tanggal BETWEEN '$start_date' AND '$end_date'
        WHERE siswa.nis = '$nis_session'
        GROUP BY siswa.nis";

$result = $conn->query($query);




// query tidak hadir
// Query SQL untuk menghitung data berdasarkan nis
// $sql = "SELECT
//             c.nis,
//             COUNT(c.nis) AS total_checkin,
//             COUNT(co.nis) AS total_checkout
//         FROM
//             checkin c
//         LEFT JOIN
//             checkout co ON c.nis = co.nis
//         WHERE
//             c.nis = '$nis_session'
//         GROUP BY
//             c.nis";
// $tidak_hadir = mysqli_query($conn, $sql);
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard Siswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard Siswa</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Buat QR</h3>

                            <p>Untuk presensi masuk</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-qrcode"></i>
                        </div>
                        <a href="?page=qrcode" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                        <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $attendance_percentage = ($total_days_in_month > 0) ? ($row['total_hadir'] / $total_days_in_month) * 100 : 0;
                                    echo "<h3>" . number_format($attendance_percentage, 1) . "<sup style=\"font-size: 20px\">%</sup></h3>";
                                }
                            } else {
                                // Jika tidak ada data, tampilkan 0%
                                echo "<h3>0.0<sup style=\"font-size: 20px\">%</sup></h3>";
                            }
                            ?>
                            <p>Hadir</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-check-double"></i>
                        </div>
                        <a href="?page=presentase" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                        <?php
                        if ($_SESSION['role'] === 'siswa') {
                            $nis = mysqli_real_escape_string($conn, $_SESSION['nis']);

                            // Menghitung jumlah izin berdasarkan nis
                            $query_count = mysqli_query($conn, "SELECT COUNT(*) as total_izin FROM izinSiswa WHERE nis = '$nis'");
                            $row_count = mysqli_fetch_assoc($query_count);
                            $total_izin = $row_count['total_izin'];

                            if ($total_izin > 0) {
                                // Ambil data izin
                                $query = mysqli_query($conn, "SELECT * FROM izinSiswa WHERE nis = '$nis' ORDER BY id DESC");

                                while ($row = mysqli_fetch_assoc($query)) {
                                    echo "<h3>$total_izin</h3>";
                                }
                            } else {
                                echo "<h3>0</h3>";
                            }
                        }
                        ?>
                            <p>Izin</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-person-booth"></i>
                        </div>
                        <a href="?page=data_izin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                        <?php
                        // // Memeriksa apakah query berhasil dieksekusi
                        // if ($tidak_hadir) {
                        //     // Mengambil data dari hasil query
                        //     $row = mysqli_fetch_assoc($tidak_hadir);

                        //     // Memeriksa apakah ada baris yang diambil
                        //     if ($row) {
                        //         // Menampilkan hasil
                        //         echo "NIS: " . $row['nis'] . "<br>";
                        //         echo "Total Checkin: " . $row['total_checkin'] . "<br>";
                        //         echo "Total Checkout: " . $row['total_checkout'] . "<br>";
                        //     } else {
                        //         // Menampilkan pesan jika tidak ada baris yang cocok
                        //         echo "<h3>Data tidak ditemukan.</h3>";
                        //     }
                        // } else {
                        //     // Menampilkan pesan kesalahan jika query tidak berhasil dieksekusi
                        //     echo "Error: " . mysqli_error($conn);
                        // }
                        ?>
                            <h3>0</h3>

                            <p>Tidak Hadir</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-person-circle-question"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->


            <!-- /Setting Link Halaman -->
        </div>
    </section>
    <!-- /Conten-->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->


<!-- Control sidebar content goes here -->

<!-- /.control-sidebar -->
<!--</div>-->
<!-- ./wrapper -->