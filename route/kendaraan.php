<?php

if (!isset($_GET['act'])) {
    if (isset($_POST['tambahkendaraan'])) {
        simpanKendaraan($_POST['nokendaraan'], $_POST['jeniskendaraan'], $_POST['pemilikkendaraan'], $_POST['status_kendaraan'], $_POST['keterangan']);
    } else if (isset($_POST['editkendaraan'])) {
        editKendaraan($_POST['nokendaraan'], $_POST['jeniskendaraan'], $_POST['pemilikkendaraan'], $_POST['nokendaraanold'], $_POST['status_kendaraan'], $_POST['keterangan']);
    } else if (isset($_POST['hapuskendaraan'])) {
        deleteKendaraan($_POST['hapuskendaraan']);
    }
    include 'page/kendaraan/listKendaraan.php';
} else {
    switch ($_GET['act']) {
        case 'tambah':
            include 'page/kendaraan/tambahKendaraan.php';
            break;
        case 'edit':
            include 'page/kendaraan/editKendaraan.php';
            break;
        default :
            include 'page/error/error.php';
            break;
    }
}

