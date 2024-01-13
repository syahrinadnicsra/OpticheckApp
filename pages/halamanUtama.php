<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Opticheck QR Code</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
    <script src="https://kit.fontawesome.com/79ba4adbee.js" crossorigin="anonymous"></script>
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="app/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="hold-transition login-page">
    <div class="container-fluid flex bg-sky-600 flex-col justify-center items-center text-white p-5" style="height: 300px;">
        <h1 class="font-weight-bold mb-3">Opticheck QR Code</h1>
        <img src="app/dist/img/logoapp.png" alt="Logo App" style="width: 150px; height: 150px; border-radius: 100px;">
        <br>
        <h5>"Presensi Siswa SMK Pancasila Purwodadi menggunakan QR Code"</h5>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-lg-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <i class="fa-solid fa-graduation-cap fa-fw mb-3 text-primary" style="font-size: 34px;"></i>
                        <h3>Siswa</h3>
                        <p class="card-text">Apabila anda adalah seorang Siswa, silahkan Login sebagai Siswa. Jika belum memiliki akun, silahkan lakukan registrasi terlebih dahulu.</p>
                        <a href="pages/Siswa/loginSiswa.php" class="btn btn-primary btn-block">Login sebagai Siswa</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <i class="fa-solid fa-chalkboard-user fa-fw mb-3 text-primary" style="font-size: 34px;"></i>
                        <h3>Guru</h3>
                        <p class="card-text">Apabila anda adalah seorang Guru, silahkan Login terlebih dahulu untuk melihat rekap data kehadiran siswa.</p>
                        <div class="d-grid">
                            <a href="pages/Guru/loginGuru.php" class="btn btn-primary btn-block">Login sebagai Guru</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <i class="fa-solid fa-user-tie fa-fw mb-3 text-primary" style="font-size: 34px;"></i>
                        <h3>Admin</h3>
                        <p class="card-text">Apabila anda adalah seorang Admin, silahkan login untuk mengelola data</p>
                        <div class="d-grid">
                            <a href="pages/Admin/loginAdmin.php" class="btn btn-primary btn-block">Login sebagai Admin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="app/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="app/dist/js/adminlte.min.js"></script>
</body>

</html>