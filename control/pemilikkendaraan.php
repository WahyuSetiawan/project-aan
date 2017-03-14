<?php

function simpanPemilikKendaraan($id, $no_identitas, $nama, $alamat) {


    mysql_query("INSERT INTO `db_perusahaan_aan`.`pemilikkendaraan` ("
                    . "`id`,"
                    . " `no_identitas`,"
                    . " `nama_pemilik`,"
                    . " `alamat_pemilik`)"
                    . " VALUES "
                    . "(" . $id . ", "
                    . "'" . $no_identitas . "', "
                    . "'" . $nama . "', "
                    . "'" . $alamat . "'"
                    . ");") or exit(mysql_error());
}

function ambilSemuaPemilikKendaraan() {


    $return = array();

    $data = mysql_query("select * from pemilikkendaraan") or exit(mysql_error());

    while ($hasil = mysql_fetch_assoc($data)) {
        $return[] = $hasil;
    }

    return $return;
}

function ambilSemuaPemilikKendaraanDenganSyarat($syarat) {


    $return = array();

    $data = mysql_query("select * from pemilikkendaraan where " . $syarat) or exit(mysql_error());

    while ($hasil = mysql_fetch_assoc($data)) {
        $return[] = $hasil;
    }

    return $return;
}

function ambilPemilikKendaraan($id) {


    $return = array();

    $data = mysql_query("select * from pemilikkendaraan where id = " . $id . "") or exit(mysql_error());

    $return = mysql_fetch_assoc($data);

    return $return;
}

function editPemilikKendaraan($id, $no_identitas, $nama, $alamat) {


    mysql_query("UPDATE `db_perusahaan_aan`.`pemilikkendaraan` SET "
                    . "`no_identitas`='" . $no_identitas . "', "
                    . "`nama_pemilik`='" . $nama . "', "
                    . "`alamat_pemilik`='" . $alamat . "' "
                    . "WHERE  "
                    . "`id`=" . $id . ";") or exit(mysql_error());
}

function deletePemilikKendaraan($id) {


    mysql_query("delete from pemilikkendaraan"
                    . " WHERE  "
                    . "`id`=" . $id . ";") or exit(mysql_error());
}
