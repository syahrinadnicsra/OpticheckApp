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

<!-- Selanjutnya, Anda dapat menggunakan hasil query untuk menampilkan data -->
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
                                            echo "<tr>";
                                            echo "<td>" . $no++ . "</td>";
                                            echo "<td>" . $row_siswa['nis'] . "</td>";
                                            echo "<td>" . $row_siswa['nama_siswa'] . "</td>";
                                            echo "<td>" . $row_siswa['kelas'] . "</td>";
                                            echo "<td>" . $row_siswa['jurusan'] . "</td>";

                                            $attendance_percentage = ($total_days_in_month > 0) ? ($row['total_hadir'] / $total_days_in_month) * 100 : 0;
                                            echo "<td>" . number_format($attendance_percentage, 1) . "%</td>";

                                            echo "</tr>";
                                        }
                                    } else {
                                        // No attendance data found, display student information with 0% attendance
                                        echo "<tr>";
                                        echo "<td>" . $no++ . "</td>";
                                        echo "<td>" . $row_siswa['nis'] . "</td>";
                                        echo "<td>" . $row_siswa['nama_siswa'] . "</td>";
                                        echo "<td>" . $row_siswa['kelas'] . "</td>";
                                        echo "<td>" . $row_siswa['jurusan'] . "</td>";
                                        echo "<td>0%</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr>";
                                    echo "<td colspan='6'>No data found for the specified NIS.</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
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

<?php
$conn->close();
?>
