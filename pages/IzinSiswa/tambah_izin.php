<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            TAMBAH DATA SISWA
        </h1>
        <ol class="breadcrumb">
            <li class="active">TAMBAH DATA SISWA </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card box box-primary">
                    <!-- /.box-header -->
                    <div class="card-header box-header">
                        <h2>Tambah Data Siswa</h2>
                    </div>
                    <div class="card-body">
                        <!-- form start -->
                        <form role="form" method="post" action="../../pages/izinSiswa/tambah_izin_proses.php" enctype="multipart/form-data">
                            <div class="box-body">
                            <div class="form-group">
                                <label for="nis">Nomor Induk Siswa</label>
                                <input type="text" id="nis" name="nis" class="form-control" placeholder="Enter NIS" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <input type="text" name="nama_siswa" class="form-control" placeholder="Nama Siswa" required>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <input type="text" name="kelas" class="form-control" placeholder="Kelas" required>
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input type="text" name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" required>
                            </div>
                            <div class="form-group">
                                <label>Alasan Tidak Hadir</label>
                                <input type="text" name="alasan" class="form-control" placeholder="Alasan" required>
                            </div>
                            <div class="form-group">
                                <label for="bukti">Upload Bukti</label>
                                <input type="file" id="bukti" name="bukti" class="form-control-file" accept="image/*" required>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="card-footer box-footer">
                        <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i>Kirim</button>
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
</body>

</html>