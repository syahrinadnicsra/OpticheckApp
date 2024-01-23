<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            TAMBAH DATA SISWA
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
                    <!-- <div class="card-header box-header">
                        <h2>Tambah Data Siswa</h2>
                    </div> -->
                    <div class="card-body">
                        <!-- form start -->
                        <form role="form" method="post" action="../../pages/dataSiswa/tambah_siswa_proses.php"> <!--setting aksi untuk tombol simpan-->
                            <div class="box-body">
                                <!-- <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="id" class="form-control" placeholder="ID" required>
                                </div> -->
                                <div class="form-group">
                                    <label>Nomor Induk Siswa</label>
                                    <input type="text" name="nis" class="form-control" placeholder="NIS" required>
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
                            </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="card-footer box-footer">
                        <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i>Simpan</button>
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