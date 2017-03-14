<?php

function simpanSopir($noidentitas, $namasopir, $alamatsopir, $nokendaraan) {


    mysql_query("INSERT INTO `db_perusahaan_aan`.`sopir` ("
                    . "`noidentitas`, "
                    . "`nama`, "
                    . " `alamat`,"
                    . " `no_kendaraan`)"
                    . " VALUES "
                    . "(" . $noidentitas . ", "
                    . "'" . $namasopir . "', "
                    . "'" . $alamatsopir . "', "
                    . "'" . $nokendaraan . "'"
                    . ");") or exit(mysql_error());
}

function ambilSemuaSopir() {
    $return = array();

    $data = mysql_query("select * from sopir") or exit(mysql_error());

    while ($hasil = mysql_fetch_assoc($data)) {
        $return[] = $hasil;
    }

    return $return;
}

function ambilSemuaSopirDenganSyarat($syarat) {
    $return = array();

    $data = mysql_query("select * from sopir where " . $syarat) or exit(mysql_error());

    while ($hasil = mysql_fetch_assoc($data)) {
        $return[] = $hasil;
    }

    return $return;
}

function ambilSopir($id) {


    $return = array();

    $data = mysql_query("select * from sopir where id = " . $id . "") or exit(mysql_error());

    $return = mysql_fetch_assoc($data);

    return $return;
}

function ambilSopirdarikendaraan($id) {


    $return = array();

    $data = mysql_query("select * from sopir where no_kendaraan = '" . $id . "'") or exit(mysql_error());

    $return = mysql_fetch_assoc($data);

    return $return;
}

function editSopir($id, $noidentitas, $nama, $alamat, $nokendaraan) {


    mysql_query("UPDATE `db_perusahaan_aan`.`sopir` SET "
                    . "`noidentitas`='" . $noidentitas . "', "
                    . "`nama`='" . $nama . "', "
                    . "`alamat`='" . $alamat . "', "
                    . "`no_kendaraan`='" . $nokendaraan . "' "
                    . "WHERE  "
                    . "`id`='" . $id . "';") or exit(mysql_error());
}

function deleteSopir($id) {
    mysql_query("delete from sopir"
                    . " WHERE  "
                    . "`id`= '" . $id . "';") or exit(mysql_error());
}
