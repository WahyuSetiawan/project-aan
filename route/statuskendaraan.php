<?php

if (!isset($_GET['act'])) {
    if (isset($_POST['ubahstatuskendaraan'])) {
        ubahstatuskendaraan($_POST['kendaraan'], $_POST['status'], $_POST['waktu'], $_POST['perusahaan'], $_POST['keterangan']);
    }

    include 'page/statuskendaraan/index.php';
}