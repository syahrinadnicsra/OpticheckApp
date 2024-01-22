<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            DATA REKAP KEHADIRAN SISWA
        </h1>
        <ol class="breadcrumb">
            <li class="active">DATA REKAP KEHADIRAN SISWA</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card box box-primary">
                    <!--<div class="card-header box-header">
                        //<a href="#" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                    </div>-->
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
                                    <!--<th>Aksi</th>-->
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                require_once __DIR__ . "/../../conf/conn.php";
                                $no = 0;
                                $query = mysqli_query($conn, "SELECT checkin.*, checkout.jam FROM checkin LEFT JOIN checkout ON checkin.nis = checkout.nis ORDER BY id DESC");
                                //echo $query;
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no = $no + 1; ?></td>
                                        <td><?php echo $row['nis']; ?></td>
                                        <td>#NAMA</td>
                                        <td>#KELAS</td>
                                        <td>#JURUSAN</td>
                                        <td><?php echo $row['tanggal']; ?></td>
                                        <td><?php echo $row['jam']; ?></td>
                                        <td><?php echo $row['jam']; ?></td>
                                        <!--<td>
                                            <a href="?page=ubah_rekap&id=<?= $row['id']; ?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit">Edit</i></a>
                                            <a href="../dataUser/hapus_rekap.php?id=<?= $row['id']; ?>" class="btn btn-danger" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash">Hapus</i></a>
                                        </td>-->
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