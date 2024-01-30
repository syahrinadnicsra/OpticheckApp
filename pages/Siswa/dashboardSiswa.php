<?php
require_once __DIR__ . "/../../conf/conn.php";

// Dapatkan tanggal awal dan akhir bulan saat ini
$today = getdate();
$start_date = date('Y-m-01', strtotime($today['year'] . '-' . $today['mon'] . '-01'));
$end_date = date('Y-m-t', strtotime($today['year'] . '-' . $today['mon'] . '-01'));

// Hitung total hari pada bulan ini
$total_days_in_month = cal_days_in_month(CAL_GREGORIAN, $today['mon'], $today['year']);

$nis_session = isset($_SESSION['nis']) ? $_SESSION['nis'] : '';

// Query to get student information
$id_siswa_query = "SELECT id, nis, nama_siswa, kelas, jurusan
                   FROM siswa
                   WHERE nis = '$nis_session'";

$result_siswa = $conn->query($id_siswa_query);

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
                            if ($result_siswa->num_rows > 0) {
                                $row_siswa = $result_siswa->fetch_assoc();
                                $id_siswa = $row_siswa['id'];

                                // Query to get attendance information
                                $query = "SELECT s.id_siswa, s.tanggal, s.jam, COUNT(s.id_siswa) as total_hadir
                                            FROM checkin s
                                            INNER JOIN siswa m ON s.id_siswa = m.id
                                            WHERE s.id_siswa = '$id_siswa' AND s.tanggal BETWEEN '$start_date' AND '$end_date'
                                            GROUP BY s.id_siswa";

                                $result = $conn->query($query);

                                // var_dump($id_siswa, $nis_session);
                                // var_dump($row_siswa);
                                $no = 1;

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $attendance_percentage = ($total_days_in_month > 0) ? ($row['total_hadir'] / $total_days_in_month) * 100 : 0;
                                        echo "<h3>" . number_format($attendance_percentage, 1) . "<sup style=\"font-size: 20px\">%</sup></h3>";
                                    }
                                } else {
                                    // Jika tidak ada data, tampilkan 0%
                                    echo "<h3>0<sup style=\"font-size: 20px\">%</sup></h3>";
                                }
                            } else {
                                echo "<tr>";
                                echo "<td colspan='6'>-</td>";
                                echo "</tr>";
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
                            // Query untuk mendapatkan data izin dan menghitung jumlahnya
                            $query_izin = "SELECT COUNT(*) as jumlah_izin
                                        FROM izinsiswa
                                        WHERE nis = '$nis_session'";

                            $result_izin = $conn->query($query_izin);

                            // Cek apakah query berhasil dieksekusi
                            if ($result_izin) {
                                // Ambil hasil query
                                $row_izin = $result_izin->fetch_assoc();

                                // Ambil jumlah izin
                                $jumlah_izin = $row_izin['jumlah_izin'];
                            } else {
                                // Jika query gagal, tampilkan pesan kesalahan
                                echo "Error: " . $conn->error;
                                // Inisialisasi jumlah izin menjadi 0
                                $jumlah_izin = 0;
                            }
                            ?>
                            <h3><?php echo $jumlah_izin; ?></h3>
                            <p>Izin</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-person-booth"></i>
                        </div>
                        <a href="?page=data_izin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- <div class="col-lg-3 col-6"> -->
                    <!-- small box -->
                    <!-- <div class="small-box bg-danger"> -->
                        <!-- <div class="inner"> -->
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
                            <!-- <h3>0</h3> -->

                            <!-- <p>Tidak Hadir</p> -->
                        <!-- </div> -->
                        <!-- <div class="icon"> -->
                            <!-- <i class="fa-solid fa-person-circle-question"></i> -->
                        <!-- </div> -->
                        <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                    <!-- </div> -->
                <!-- </div> -->
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