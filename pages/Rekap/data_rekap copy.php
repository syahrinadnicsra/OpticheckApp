<?php
require_once __DIR__ . "/../../conf/conn.php";

$no = 0;

// Get filter values from the form
$filter_kelas = isset($_GET['filter_kelas']) ? $_GET['filter_kelas'] : '';
$filter_jurusan = isset($_GET['filter_jurusan']) ? $_GET['filter_jurusan'] : '';

// Modify the SQL query based on filters
// $sql = "SELECT c.nis, s.nama_siswa, s.kelas, s.jurusan, c.tanggal, c.jam AS jam_masuk, co.jam AS jam_keluar
//         FROM checkin c
//         LEFT JOIN checkout co ON c.nis = co.nis AND c.tanggal = co.tanggal
//         LEFT JOIN siswa s ON c.nis = s.nis";
        
$result = mysqli_query($conn, "SELECT s.id, s.nis, s.nama_siswa, s.kelas, s.jurusan, c.tanggal, c.jam AS jam_masuk, co.jam AS jam_keluar
FROM checkin c
LEFT JOIN checkout co ON c.id_siswa = co.id_siswa AND c.tanggal = co.tanggal
LEFT JOIN siswa s ON c.id_siswa = s.id
ORDER BY c.tanggal DESC");

if ($filter_kelas != '') {
    $sql .= " WHERE s.kelas = '$filter_kelas'";
}

if ($filter_jurusan != '') {
    $sql .= ($filter_kelas != '') ? " AND" : " WHERE";
    $sql .= " s.jurusan = '$filter_jurusan'";
}

$query = mysqli_query($conn, $result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Rekap Kehadiran Siswa</title>
</head>
<body>

<!-- Filter form -->
<form method="GET" action="">
    <label for="filter_kelas">Filter by Kelas:</label>
    <select name="filter_kelas">
        <option value="">KELAS</option>
        <option value="X">X</option>
        <option value="XI">XI</option>
        <option value="XII">XII</option>
        <!-- Add more class options as needed -->
    </select>

    <label for="filter_jurusan">Filter by Jurusan:</label>
    <select name="filter_jurusan">
    <option value="">JURUSAN</option>
    <option value="TE">Teknik Elektro (TE)</option>
    <option value="TM">Teknik Mesin (TM)</option>
    <option value="TO">Teknik Otomotif (TO)</option>
    <option value="TAV">Teknik Audio Video (TAV)</option>
    <option value="TP">Teknik Penerbangan (TP)</option>
    <option value="TKR">Teknik Kendaraan Ringan (TKR)</option>
    <option value="TKRO">Teknik Kendaraan Ringan Otomotif (TKRO)</option>
    <option value="TBSM">Teknik Bisnis Sepeda Motor (TBSM)</option>
    <option value="TSM">Teknik Sepeda Motor (TSM)</option>
    <!-- Add more major options as needed -->
</select>


    <button type="submit">Apply Filter</button>
</form>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            DATA REKAP KEHADIRAN SISWA
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card box box-primary">
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no = $no + 1; ?></td>
                                        <td><?php echo $row['nis']; ?></td>
                                        <td><?php echo $row['nama_siswa']; ?></td>
                                        <td><?php echo $row['kelas']; ?></td>
                                        <td><?php echo $row['jurusan']; ?></td>
                                        <td><?php echo $row['tanggal']; ?></td>
                                        <td><?php echo $row['jam_masuk']; ?></td>
                                        <td><?php echo $row['jam_keluar']; ?></td>
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

</body>
</html>
