<?php

if (!isset($_GET['act'])) {
    if (isset($_POST['tambahperusahaan'])) {
        simpanPerusahaan($_POST['idperusahaan'], $_POST['namaperusahaan'], $_POST['alamatperusahaan']);
    } elseif (isset($_POST['editperusahaan'])) {
        editPerusahaan($_POST['idperusahaan'], $_POST['namaperusahaan'], $_POST['alamatperusahaan']);
    } elseif (isset($_POST['hapusperusahaan'])) {
        deletePerusahaan($_POST['hapusperusahaan']);
    }

    include 'page/perusahaan/listPerusahaan.php';
} else {
    switch ($_GET['act']) {
        case 'tambah':
            include 'page/perusahaan/tambahPerusahaan.php';
            break;
        case 'edit':
            include 'page/perusahaan/editperusahaan.php';
            break;
        default:
            include 'page/error/error.php';
            break;
    }
}
