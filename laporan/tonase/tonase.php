<?php

if (isset($_GET['tonase']) & isset($_GET['jenislaporan'])) {
    switch ($_GET['jenislaporan']) {
        case 'Pemilik Kendaraan':
            include './tonasepemilikkendaraan.php';
            break;
        case 'Kendaraan':
            include './tonasekendaraan.php';
            break;
        case 'Perusahaan':
            include './.php';
            break;
        case 'Sopir':
            include './tonasesopir.php';
            break;
        case 'Perbulan':
            include './tonaseperbulan.php';
            break;
        case 'Pertanggal':
            include './tonasetanggal.php';
            break;
        case 'Pertahun':
            include './tonasepertahun.php';
            break;
        default :
            include './tonaseperbulan.php';
    }
}