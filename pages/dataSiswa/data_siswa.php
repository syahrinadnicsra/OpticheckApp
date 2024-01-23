<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            DATA SISWA
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card box box-primary">
                    <div class="card-header box-header">
                        <a href="?page=tambah_siswa" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                require_once __DIR__ . "/../../conf/conn.php";
                                $no = 0;
                                $query = mysqli_query($conn, "SELECT * FROM siswa ORDER BY id DESC");
                                //echo $query;
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no = $no + 1; ?></td>
                                        <td><?php echo $row['nis']; ?></td>
                                        <td><?php echo $row['nama_siswa']; ?></td>
                                        <td><?php echo $row['kelas']; ?></td>
                                        <td><?php echo $row['jurusan']; ?></td>
                                        <td><?php echo $row['jenis_kelamin']; ?></td>
                                        <td>
                                            <a href="?page=ubah_siswa&id=<?= $row['id']; ?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit">Edit</i></a>
                                            <a href="../dataSiswa/hapus_siswa.php?id=<?= $row['id']; ?>" class="btn btn-danger" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash">Hapus</i></a>
                                        </td>
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