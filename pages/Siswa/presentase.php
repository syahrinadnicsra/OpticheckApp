<?php

require_once __DIR__ . "/../../conf/conn.php";

// Dapatkan tanggal awal dan akhir bulan saat ini
$today = getdate();
$start_date = date('Y-m-01', strtotime($today['year'] . '-' . $today['mon'] . '-01'));
$end_date = date('Y-m-t', strtotime($today['year'] . '-' . $today['mon'] . '-01'));

// Hitung total hari pada bulan ini
$total_days_in_month = cal_days_in_month(CAL_GREGORIAN, $today['mon'], $today['year']);

if($_SESSION['role'] === 'siswa'){
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
    <section class="content-header">
        <h1>
            PRESENTASE KEHADIRAN SISWA
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card box box-primary">
                    <div class="card-body box-body table-responsive">
                        <?php 
                        // var_dump($today, $start_date, $end_date);
                        ?>
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Induk Siswa</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Presentase</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . $row['nis'] . "</td>";
                                echo "<td>" . $row['nama_siswa'] . "</td>";
                                echo "<td>" . $row['kelas'] . "</td>";
                                echo "<td>" . $row['jurusan'] . "</td>";

                                $attendance_percentage = ($total_days_in_month > 0) ? ($row['total_hadir'] / $total_days_in_month) * 100 : 0;
                                echo "<td>" . number_format($attendance_percentage, 2) . "%</td>";

                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                            <?php
                            $conn->close();
                            ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
