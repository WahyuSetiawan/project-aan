<?php

function simpanPerusahaan($id, $nama_perusahaan, $alamat_perusahaan) {


    mysql_query("INSERT INTO `db_perusahaan_aan`.`perusahaan` ("
                    . "`id`,"
                    . " `nama_perusahaan`,"
                    . " `alamat_perusahaan`)"
                    . " VALUES "
                    . "(" . $id . ", "
                    . "'" . $nama_perusahaan . "', "
                    . "'" . $alamat_perusahaan . "'"
                    . ");") or exit(mysql_error());
}

function ambilSemuaPerusahaan() {


    $return = array();

    $data = mysql_query("select * from perusahaan") or exit(mysql_error());

    while ($hasil = mysql_fetch_assoc($data)) {
        $return[] = $hasil;
    }

    return $return;
}

function ambilSemuaPerusahaanDenganSyarat($syarat) {


    $return = array();

    $data = mysql_query("select * from perusahaan where " . $syarat) or exit(mysql_error());

    while ($hasil = mysql_fetch_assoc($data)) {
        $return[] = $hasil;
    }

    return $return;
}

function ambilPerusahaan($id) {


    $return = array();

    $data = mysql_query("select * from perusahaan where id = " . $id . "") or exit(mysql_error());

    $return = mysql_fetch_assoc($data);

    return $return;
}

function editPerusahaan($id, $nama_perusahaan, $alamat_perusahaan) {


    mysql_query("UPDATE `db_perusahaan_aan`.`perusahaan` SET "
                    . "`nama_perusahaan`='" . $nama_perusahaan . "', "
                    . "`alamat_perusahaan`='" . $alamat_perusahaan . "' "
                    . "WHERE  "
                    . "`id`=" . $id . ";") or exit(mysql_error());
}

function deletePerusahaan($id) {


    mysql_query("delete from perusahaan"
                    . " WHERE  "
                    . "`id`=" . $id . ";") or exit(mysql_error());
}
