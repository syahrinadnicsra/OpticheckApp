<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            TAMBAH USER
        </h1>
        <ol class="breadcrumb">
            <li class="active">TAMBAH USER </li>
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
                        <h2>Tambah User</h2>
                    </div>
                    <div class="card-body">
                        <!-- form start -->
                        <form role="form" method="post" action="../../pages/dataUser/tambah_user_proses.php"> <!--setting aksi untuk tombol simpan-->
                            <div class="box-body">
                                <!-- <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="id" class="form-control" placeholder="ID" required>
                                </div> -->
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label>username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6">
                                    <label for="role">Role</label>
                                    <select id="role" name="role" class="form-control custom-select">
                                        <option selected disabled>Pilih role</option>
                                        <option value="admin">admin</option>
                                        <option value="siswa">siswa</option>
                                        <option value="guru">guru</option>
                                    </select>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Dibuat</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control float-right" id="created_date">
                                    </div>
                                </div> -->

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