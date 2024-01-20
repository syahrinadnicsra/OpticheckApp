<?php
include __DIR__ . "/../../conf/conn.php";
$sql = "SELECT * FROM user WHERE id='" . $_GET['id'] . "'";
//echo $sql;
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            UBAH DATA USER
        </h1>
        <ol class="breadcrumb">
            <li class="active">UBAH USER</li>
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
                        <h2>Ubah Data User</h2>
                    </div>
                    <!-- form start -->
                    <form role="form" method="post" action="../../pages/dataUser/ubah_user_proses.php">
                        <div class="card-body box-body">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
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