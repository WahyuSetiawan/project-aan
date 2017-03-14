<?php

if (!isset($_GET['act'])) {
    if (isset($_POST['ubahpassword'])) {
        ubahpasswordmanajer($_POST['usernamelama'], $_POST['usernamebaru'], $_POST['password'], $_POST['passwordbaru1'], $_POST['passwordbaru2']);
    }
    include 'page/laporan/index.php';
} else {
    switch ($_GET['act']) {
        case 'listadmin':
            if (isset($_POST['tambahadmin'])) {
                tambahadmin($_POST['username'], $_POST['password']);
            }elseif (isset($_POST['ubahadmin'])) {
                ubahadmin($_POST['id'],$_POST['Username'], $_POST['Password']);
            }elseif (isset ($_POST['hapusadmin'])) {
                deleteAdmin($_POST['hapusadmin']);
            }
            include 'page/laporan/manajemenadmin/listadmin.php';
            break;
        case 'tambah':
            include 'page/laporan/manajemenadmin/tambahadmin.php';
            break;
        case 'ubah':
            include 'page/laporan/manajemenadmin/ubahadmin.php';
            break;
        default:
            include 'page/error/error.php';
            break;
    }
}