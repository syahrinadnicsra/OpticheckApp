<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
    <!-- jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Instascan -->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../app/plugins/fontawesome-free/css/all.min.css">
    <script src="https://kit.fontawesome.com/79ba4adbee.js" crossorigin="anonymous"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../app/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../app/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../app/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../app/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../app/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../../app/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../app/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../app/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../app/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../../app/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!--<div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>-->

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="indexAdmin.php" class="brand-link">
                <img src="../../app/dist/img/logoapp.png" alt="Logo Opticheck"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light-bold">Opticheck</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../app/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $_SESSION['nama']; ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="?page=scan_in" class="nav-link">
                                <i class="nav-icon fa-solid fa-camera"></i>
                                <p>
                                    Scan CheckIn
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=scan_out" class="nav-link">
                                <i class="nav-icon fa-solid fa-camera"></i>
                                <p>
                                    Scan CheckOut
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=data_siswa" class="nav-link">
                                <i class="nav-icon fa-solid fa-graduation-cap"></i>
                                <p>
                                    Data Siswa
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=data_user" class="nav-link">
                                <i class="nav-icon fa-solid fa-users"></i>
                                <p>
                                    Data User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../conf/logout.php" class="nav-link">
                                <i class="nav-icon fas fa-sign-out"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

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
                            <!-- ... Bagian header card ... -->
                            <div class="card-header box-header">
                                <h2>Scan QR Code</h2>
                            </div>
                            <div class="card-body">
                                <!-- ... Bagian form ... -->
                                <div class="box-body">
                                    <p>Klik tombol dibawah ini untuk melakukan scan</p>
                                    <br>

                                    <!-- Tombol Aktifkan Kamera -->
                                    <button class='btn btn-primary' onclick="startScanner()">Aktifkan Kamera</button>

                                    <!-- Tombol Matikan Kamera -->
                                    <button class='btn btn-danger' onclick="stopScanner()">Matikan Kamera</button>
                                </div>

                                <div class="box-body">
                                    <br>
                                    <video id="preview" style="display: none;"></video>
                                </div>

                                <!-- <div class="box-body">
                                    <br>
                                    <div id="result"></div>
                                </div> -->
                                <!-- ... Bagian body card ... -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">

            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script>
    let scanner;

    function startScanner() {
        if (!scanner) {
            scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });

            scanner.addListener('scan', function(encodedContent) {
                let decryptedContent = atob(encodedContent);
                // document.getElementById('result').innerHTML = `Hasil (Dekripsi): ${decryptedContent}`;

                // Panggil fungsi simpanData secara otomatis
                simpanData(decryptedContent);
            });
        }

        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                document.getElementById('preview').style.display = 'block';
                scanner.start(cameras[0]);
            } else {
                console.error('Tidak ada kamera yang ditemukan.');
            }
        }).catch(function(e) {
            console.error(e);
        });
    }

    function simpanData(hasilScan) {
        var hasilArray = hasilScan.split('|');
        var nis = hasilArray[0];
        var tanggalJam = hasilArray[1];

        var tanggalJamArray = tanggalJam.split(' ');
        var tanggal = tanggalJamArray[0];
        var jam = tanggalJamArray[1];

        // console.log("Data yang akan dikirim:", {
        //     nis: nis,
        //     tanggal: tanggal,
        //     jam: jam
        // });

        // Melakukan pengecekan apakah data sudah ada sebelumnya
        $.ajax({
            type: 'POST',
            url: '../CheckOut/cek_data.php', // Ganti dengan URL yang sesuai untuk cek_data.php
            data: {
                nis: nis,
                tanggal: tanggal
            },
            success: function(response) {
                // Jika data sudah ada, tampilkan pesan
                if (response === 'sudah_absen') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Anda sudah melakukan absen!',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    // Set timeout untuk membersihkan hasil scan dan bersiap untuk scan berikutnya
                    setTimeout(function() {
                        document.getElementById('result').innerHTML = '';
                        startScanner();
                    }, 1500);
                } else {
                    // Jika data belum ada, lakukan penyimpanan
                    $.ajax({
                        type: 'POST',
                        url: '../CheckOut/simpan_data.php',
                        data: {
                            nis: nis,
                            tanggal: tanggal,
                            jam: jam
                        },
                        success: function(response) {
                            // Menampilkan SweetAlert berhasil
                            Swal.fire({
                                icon: 'success',
                                title: 'Absen berhasil disimpan!',
                                showConfirmButton: false,
                                timer: 1500
                            });

                            // Set timeout untuk membersihkan hasil scan dan bersiap untuk scan berikutnya
                            setTimeout(function() {
                                document.getElementById('result').innerHTML = '';
                                startScanner();
                            }, 1500);
                        },
                        error: function(error) {
                            console.error('Error:', error);

                            // Menampilkan SweetAlert gagal
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal menyimpan data!',
                                showConfirmButton: false,
                                timer: 1500
                            });

                            // Set timeout untuk membersihkan hasil scan dan bersiap untuk scan berikutnya
                            setTimeout(function() {
                                document.getElementById('result').innerHTML = '';
                                startScanner();
                            }, 1500);
                        }
                    });
                }
            },
            error: function(error) {
                console.error('Error:', error);

                // Menampilkan SweetAlert gagal
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal memeriksa data!',
                    showConfirmButton: false,
                    timer: 1500
                });

                // Set timeout untuk membersihkan hasil scan dan bersiap untuk scan berikutnya
                setTimeout(function() {
                    document.getElementById('result').innerHTML = '';
                    startScanner();
                }, 1500);
            }
        });
    }



    function stopScanner() {
        if (scanner) {
            scanner.stop();
            document.getElementById('preview').style.display = 'none';
            document.getElementById('result').innerHTML = ''; // Bersihkan hasil scan
        }
    }
</script>



    </script>

    <!-- jQuery -->
    <script src="../../app/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../app/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../../app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../../app/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../../app/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../../app/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../../app/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../../app/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../../app/plugins/moment/moment.min.js"></script>
    <script src="../../app/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../../app/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../../app/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../../app/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../app/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../app/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../app/dist/js/pages/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>