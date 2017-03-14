<?php

if (!isset($_GET['act'])) {
    //
    if (isset($_POST['tambahpemilikkendaraan'])) {
        simpanPemilikKendaraan($_POST['nopemilikkendaraan'], $_POST['noIdentitas'], $_POST['namapemilikkendaraan'], $_POST['alamatpemilikkendaraan']);
    } else if (isset($_POST['editpemilikkendaraan'])) {
        editPemilikKendaraan($_POST['nopemilikkendaraan'], $_POST['noIdentitas'], $_POST['namapemilikkendaraan'], $_POST['alamatpemilikkendaraan']);
    } else if (isset($_POST['deletepemilikkendaraan'])) {
        deletePemilikKendaraan($_POST['deletepemilikkendaraan']);
    }
    //
    include 'page/pemilikkendaraan/listpemilikkendaraan.php';
} else {
    switch ($_GET['act']) {
        case 'tambah':
            include 'page/pemilikkendaraan/tambahPemilikKendaraan.php';
            break;
        case 'edit':
            include 'page/pemilikkendaraan/editPemilikKendaraan.php';
            break;
        default:
            include 'page/error/error.php';
            break;
    }
}
?>

