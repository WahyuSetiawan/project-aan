<?php

function simpanKendaraan($no_kendaraan, $jenis_kendaraan, $pemilik_kendaraan, $status_kendaraan, $keterangan) {
    mysql_query("INSERT INTO `db_perusahaan_aan`.`kendaraan` ("
                    . "`no_kendaraan`,"
                    . " `jenis_kendaraan`,"
                    . " `pemilik_kendaraan`,"
                    . "`status_kendaraan`,"
                    . "`keterangan_kendaraan`)"
                    . " VALUES "
                    . "('" . $no_kendaraan . "', "
                    . "'" . $jenis_kendaraan . "', "
                    . "'" . $pemilik_kendaraan . "',"
                    . "'" . $status_kendaraan . "',"
                    . "'" . $keterangan . "'"
                    . ");") or exit(mysql_error());
}

function ambilSemuaKendaraan() {
    $return = array();

    $data = mysql_query("select * from kendaraan") or exit(mysql_error());

    while ($hasil = mysql_fetch_assoc($data)) {
        $return[] = $hasil;
    }

    return $return;
}

function ambilSemuaKendaraanDenganSyarat($syarat) {
    $return = array();

    $data = mysql_query("select * from kendaraan where " . $syarat) or exit(mysql_error());

    while ($hasil = mysql_fetch_assoc($data)) {
        $return[] = $hasil;
    }

    return $return;
}

function ambilSemuaKendaraanberdasarkanpemilik($nama) {
    $return = array();

    $data = mysql_query("select * from kendaraan where pemilik_kendaraan = '" . $nama . "'") or exit(mysql_error());

    while ($hasil = mysql_fetch_assoc($data)) {
        $return[] = $hasil;
    }

    return $return;
}

function ambilKendaraan($id) {


    $return = array();

    $data = mysql_query("select * from kendaraan where no_kendaraan = '" . $id . "'") or exit(mysql_error());

    $return = mysql_fetch_assoc($data);

    return $return;
}

function editKendaraan($no_kendaraan, $jenis_kendaraan, $pemilik_kendaraan, $no_kendaraan_old, $status_kendaraan, $keterangan_kendaraan) {


    mysql_query("UPDATE `db_perusahaan_aan`.`kendaraan` SET "
                    . "`jenis_kendaraan`='" . $jenis_kendaraan . "', "
                    . "`no_kendaraan`='" . $no_kendaraan . "',"
                    . "`status_kendaraan` = '" . $status_kendaraan . "',"
                    . "`keterangan_kendaraan` = '" . $keterangan_kendaraan . "',"
                    . "`pemilik_kendaraan`='" . $pemilik_kendaraan . "' "
                    . "WHERE  "
                    . "`no_kendaraan`='" . $no_kendaraan_old . "';") or exit(mysql_error());
}

function deleteKendaraan($id) {


    mysql_query("delete from kendaraan"
                    . " WHERE  "
                    . "`no_kendaraan`= '" . $id . "';") or exit(mysql_error());
}

function jumlahkendaraanyangtersedia() {
    $i = 0;
    $result = mysql_query("select * from kendaraan where status_kendaraan = 'Baik'") or exit(mysql_error());
    while ($data = mysql_fetch_assoc($result)) {
        $i++;
    }
    return $i;
}

function ambilKendaraanYangDalamKeadaanBaik() {
    $i = 0;
    $result = mysql_query("select * from kendaraan where status_kendaraan = 'Baik'") or exit(mysql_error());
    while ($data = mysql_fetch_assoc($result)) {
        $i++;
    }
    return $i;
}

function ambilKendaraanYangDalamKeadaanRusak() {
    $i = 0;
    $result = mysql_query("select * from kendaraan where status_kendaraan = 'Rusak'") or exit(mysql_error());
    while ($data = mysql_fetch_assoc($result)) {
        $i++;
    }
    return $i;
}

function ambilKendaraanYangDalamKeadaanBeroperasi() {
    $i = 0;
    $result = mysql_query("select * from kendaraan where status_kendaraan = 'Sedang Beroperasi'") or exit(mysql_error());
    while ($data = mysql_fetch_assoc($result)) {
        $i++;
    }
    return $i;
}

function ubahstatuskendaraan($nokendaraan, $status, $waktu, $perusahaan, $keterangan) {
    if ($status == "Sedang Beroperasi") {
        mysql_query("UPDATE `db_perusahaan_aan`.`kendaraan` SET "
                        . "`status_kendaraan` = '" . $status . "',"
                        . "`keterangan_kendaraan` = '" . $waktu . " - " . $perusahaan . "' "
                        . "WHERE  "
                        . "`no_kendaraan`='" . $nokendaraan . "';") or exit(mysql_error());
    } else {
        mysql_query("UPDATE `db_perusahaan_aan`.`kendaraan` SET "
                        . "`status_kendaraan` = '" . $status . "',"
                        . "`keterangan_kendaraan` = '" . $keterangan . "' "
                        . "WHERE  "
                        . "`no_kendaraan`='" . $nokendaraan . "';") or exit(mysql_error());
    }
}
