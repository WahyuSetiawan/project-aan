<?php

if (!isset($_GET['act'])) {
    if (isset($_POST['tambahtonase'])) {
        simpanTonase($_POST['perusahaan'], $_POST['tanggal'], $_POST['tujuan'], $_POST['jenistarikan'], $_POST['sopir'], $_POST['uangjalan'], $_POST['bruto'], $_POST['tarra'], $_POST['tonase'], $_POST['keterangan']);
    } else if (isset($_POST['deleteTonase'])) {
        deleteTonase($_POST['deleteTonase']);
    }
    include 'page/tonase/index.php';
} else {
    switch ($_GET['act']) {
        case 'tambah':

            break;
        default:
            include 'page/error/error.php';
            break;
    }
}

