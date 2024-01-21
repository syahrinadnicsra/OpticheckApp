<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Opticheck</title>

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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script QR Code using qrcode.js -->
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!--<div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>-->

        <!-- Navbar -->

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
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
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-book-open-reader"></i>
                                <p>
                                    Presentase(%)
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../CheckIn/qrcode.php" class="nav-link">
                                <i class="nav-icon fa-solid fa-qrcode"></i>
                                <p>
                                    Buat QrCode
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=data_izin" class="nav-link">
                                <i class="nav-icon fa-solid fa-chalkboard-user"></i>
                                <p>
                                    Form Izin / Tidak Hadir
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
                            <!-- /.box-header -->
                            <div class="card-header box-header">
                                <h2>Tampilkan QR Code</h2>
                            </div>
                            <div class="card-body">
                                <!-- form start -->
                                <div class="box-body">
                                    <p>Masukkan Nomor Induk Siswa kalian untuk menampilkan QR Code Anda.</p>
                                    <input class='form-control' type="text" id="inputText" placeholder="Masukkan NIS" />
                                    <br>
                                    <button class='btn btn-primary' onclick="generateQRCode()">Buat QR Code</button>
                                </div>

                                <!-- Modal untuk menampilkan QR Code -->
                                <div class="modal fade" id="qrCodeModal" tabindex="-1" role="dialog"
                                    aria-labelledby="qrCodeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document" style="z-index: 1050;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 text-align="center;" class="modal-title" id="qrCodeModalLabel">QR
                                                    Code</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <!-- QR Code akan ditampilkan di sini -->
                                                <div id="qrcode"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.box-body -->
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
    function generateQRCode() {
        // Get text from the input element
        var textToEncode = document.getElementById("inputText").value;

        // Check if the input is empty
        if (textToEncode.trim() === "") {
            alert("Masukkan NIS sebelum melakukan klik Generate");
            return;
        }

        // Get the current date and time
        var currentDate = new Date();

        // Format date and time in the desired format (e.g., YYYY-MM-DD HH:mm:ss)
        var formattedDateTime = currentDate.getFullYear() + "-" +
            ("0" + (currentDate.getMonth() + 1)).slice(-2) + "-" +
            ("0" + currentDate.getDate()).slice(-2) + " " +
            ("0" + currentDate.getHours()).slice(-2) + ":" +
            ("0" + currentDate.getMinutes()).slice(-2) + ":" +
            ("0" + currentDate.getSeconds()).slice(-2);

        // Combine text, date, and time
        var textWithDateTime = textToEncode + "|" + formattedDateTime;
        console.log("Text with Date and Time: " + textWithDateTime);

        // Encrypt text using Base64
        var encryptedText = btoa(textWithDateTime);
        console.log("Encrypted Text: " + encryptedText);

        // Create QR Code with encrypted text
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: encryptedText,
            width: 250,
            height: 250,
        });

        // Show modal after the QR Code is generated
        $('#qrCodeModal').modal('show');

        // Attach an event listener to the modal close button
        $('#qrCodeModal').on('hidden.bs.modal', function(e) {
            // Clear the QR Code and input field
            document.getElementById("qrcode").innerHTML = '';
            document.getElementById("inputText").value = '';
        });
    }
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

</body>

</html>