<?php
if (isset($_GET['page'])) {
    if ($_GET['page'] === 'dashboard') {
        include_once('./dashboard/index.php');
    } else if ($_GET['page'] === 'obat') {
        include_once('./obat/index.php');
    }
} else {
    include_once('./dashboard/index.php');
}
?>

<!--    $page = $_GET['page'];
    switch ($page) {
        case 'data_obat':
            include 'pages/obat/data_obat.php';
            break;
        case 'tambah_obat':
            include 'pages/obat/tambah_obat.php';
            break;
        case 'ubah_obat':
            include 'pages/obat/ubah_obat.php';
            break;
    }
} else {
    include 'pages/home.php';
}
-->