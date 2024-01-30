<?php
require_once __DIR__ . "/../../conf/conn.php";

$no = 0;

$nis_session = isset($_SESSION['nis']) ? $_SESSION['nis'] : '';

// Query untuk mendapatkan data izinsiswa
$query = "SELECT * FROM izinsiswa
          WHERE nis = '$nis_session'";
$result = $conn->query($query);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Form Izin Tidak Hadir
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card box box-primary">
                    <div class="card-header box-header">
                        <a href="?page=tambah_izin" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                    </div>
                    <div class="card-body box-body table-responsive">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Induk Siswa</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Jenis Kelamin</th>
                                <th>Alasan Tidak Hadir</th>
                                <th>Upload Bukti Izin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $no++;
                                echo "<tr>";
                                echo "<td>{$no}</td>";
                                echo "<td>{$row['nis']}</td>";
                                echo "<td>{$row['nama_siswa']}</td>";
                                echo "<td>{$row['kelas']}</td>";
                                echo "<td>{$row['jurusan']}</td>";
                                echo "<td>{$row['jenis_kelamin']}</td>";
                                echo "<td>{$row['alasan']}</td>";
                                echo "<td><img src='../IzinSiswa/images/{$row['bukti']}' style='width: 100px'></td>";
                                echo "<td>";
                                echo "<a href='?page=ubah_izin&id={$row['id']}' class='btn btn-success' role='button' title='Ubah Data'><i class='glyphicon glyphicon-edit'></i>Edit</a>";
                                echo "<a href='../IzinSiswa/hapus_izin.php?id={$row['id']}' class='btn btn-danger' role='button' title='Hapus Data'><i class='glyphicon glyphicon-trash'></i>Hapus</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
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