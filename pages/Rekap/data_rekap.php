<?php
require_once __DIR__ . "/../../conf/conn.php";

$no = 0;

$query = mysqli_query($conn, "SELECT s.id, s.nis, s.nama_siswa, s.kelas, s.jurusan, c.tanggal, c.jam AS jam_masuk, co.jam AS jam_keluar
                               FROM checkin c
                               LEFT JOIN checkout co ON c.id_siswa = co.id_siswa AND c.tanggal = co.tanggal
                               LEFT JOIN siswa s ON c.id_siswa = s.id
                               ORDER BY c.tanggal DESC
                              ");
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            DATA REKAP KEHADIRAN SISWA
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
                                    <th>NO</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Tanggal</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no = $no + 1; ?></td>
                                        <td><?php echo $row['nis']; ?></td>
                                        <td><?php echo $row['nama_siswa']; ?></td>
                                        <td><?php echo $row['kelas']; ?></td>
                                        <td><?php echo $row['jurusan']; ?></td>
                                        <td><?php echo $row['tanggal']; ?></td>
                                        <td><?php echo $row['jam_masuk']; ?></td>
                                        <td><?php echo $row['jam_keluar']; ?></td>
                                    </tr>
                                <?php } ?>

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
