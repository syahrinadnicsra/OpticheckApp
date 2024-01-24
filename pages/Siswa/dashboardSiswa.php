<?php

require_once __DIR__ . "/../../conf/conn.php";

// Dapatkan tanggal awal dan akhir bulan saat ini
$today = getdate();
$start_date = date('Y-m-01', strtotime($today['year'] . '-' . $today['mon'] . '-01'));
$end_date = date('Y-m-t', strtotime($today['year'] . '-' . $today['mon'] . '-01'));

// Hitung total hari pada bulan ini
$total_days_in_month = cal_days_in_month(CAL_GREGORIAN, $today['mon'], $today['year']);

if ($_SESSION['role'] === 'siswa') {
    $nis_session = isset($_SESSION['nis']) ? $_SESSION['nis'] : '';
    $query = "SELECT siswa.nis, siswa.nama_siswa, siswa.kelas, siswa.jurusan, COUNT(*) as total_hadir
          FROM siswa
          LEFT JOIN checkin ON siswa.nis = checkin.nis AND checkin.tanggal BETWEEN '$start_date' AND '$end_date'
          WHERE siswa.nis = '$nis_session'
          GROUP BY siswa.nis";
} else {
    $query = "SELECT siswa.nis, siswa.nama_siswa, siswa.kelas, siswa.jurusan, COUNT(*) as total_hadir
          FROM siswa
          LEFT JOIN checkin ON siswa.nis = checkin.nis AND checkin.tanggal BETWEEN '$start_date' AND '$end_date'
          GROUP BY siswa.nis";
}
$result = $conn->query($query);

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
                            while ($row = $result->fetch_assoc()) {
                                $attendance_percentage = ($total_days_in_month > 0) ? ($row['total_hadir'] / $total_days_in_month) * 100 : 0;
                                echo "<h3>" . number_format($attendance_percentage, 2) . "<sup style=\"font-size: 20px\">%</sup></h3>";
                            }
                            ?>


                            <p>Hadir</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-check-double"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>3</h3>

                            <p>Izin</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-person-booth"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>2</h3>

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