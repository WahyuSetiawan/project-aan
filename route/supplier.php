<?php

if (!isset($_GET['act'])) {//handle page bila tidak ada action
    include 'page/supplier/index.php';
} else {
    switch ($_GET['act']) {
        case "tambah":
            include 'page/supplier/tambah.php';
            break;
        default:
            break;
    }
}
