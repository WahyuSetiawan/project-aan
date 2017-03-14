<?php

if (session_status() == 1) {
    session_start();
}

if (isset($_SESSION['admin']) || isset($_SESSION['manajer'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "db_perusahaan_aan";

    mysql_connect($server, $username, $password) or exit(mysql_error());
    mysql_select_db($database) or exit(mysql_error());
} else {

}

