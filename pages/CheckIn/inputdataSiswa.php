<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
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
                        <h2>Tampilkan QR Code</h2>
                    </div>
                    <div class="card-body">
                        <!-- form start -->
                        <form role="form" method="post" action="../../pages/dataSiswa/tambah_siswa_proses.php"> <!--setting aksi untuk tombol simpan-->
                            <div class="box-body">
                                <p>Masukkan Nomor Induk Siswa kalian untuk menampilkan QR Code Anda.</p>
                                <div class="form-group">
                                    <label>Nomor Induk Siswa</label>
                                    <input type="text" name="nis" class="form-control" placeholder="NIS" required>
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