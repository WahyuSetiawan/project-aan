<?php

if (!isset($_GET['act'])) {
    if (isset($_POST['tambahsopir'])) {
        simpanSopir($_POST['noidentitas'], $_POST['namasopir'], $_POST['alamatsopir'], $_POST['nokendaraan']);
    } elseif (isset($_POST['hapussopir'])) {
        deleteSopir($_POST['hapussopir']);
    } elseif (isset($_POST['ubahsopir'])) {
        editSopir($_POST['id'], $_POST['noidentitas'], $_POST['namasopir'], $_POST['alamatsopir'], $_POST['nokendaraan']);
    }
    include 'page/sopir/listsopir.php';
} else if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case "tambah":
            include 'page/sopir/tambahsopir.php';
            break;
        case "ubah":
            include 'page/sopir/ubahsopir.php';
            break;
        default :
            include 'page/error/error.php';
    }
}

