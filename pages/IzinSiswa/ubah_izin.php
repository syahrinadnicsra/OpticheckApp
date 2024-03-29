<?php
include __DIR__ . "/../../conf/conn.php";
$sql = "SELECT * FROM izinsiswa WHERE id='" . $_GET['id'] . "'";
//echo $sql;
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ubah Izin Siswa
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card box box-primary">
                    <!-- /.box-header -->   
                    <!-- form start -->
                    <form role="form" method="post" action="../../pages/izinSiswa/ubah_izin_proses.php">
                        <div class="card-body box-body">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <div class="form-group">
                                <label>Nomor Induk Siswa</label>
                                <input type="text" name="nis" class="form-control" value="<?php echo $row['nis']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <input type="text" name="nama_siswa" class="form-control" value="<?php echo $row['nama_siswa']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <input type="text" name="kelas" class="form-control" value="<?php echo $row['kelas']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="text" name="jurusan" class="form-control" value="<?php echo $row['jurusan']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input type="text" name="jenis_kelamin" class="form-control" value="<?php echo $row['jenis_kelamin']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Alasan Tidak Hadir</label>
                                <input type="text" name="alasan" class="form-control" value="<?php echo $row['alasan']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Upload Bukti</label>
                                <input type="file" name="bukti" class="form-control-file" accept="image/*" placeholder="Bukti" required>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="card-footer box-footer">
                            <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->