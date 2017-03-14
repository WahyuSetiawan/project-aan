<?php

function simpanTonase($perusahaan, $tanggal, $tujuan, $jenis_tarikan, $sopir, $uangjalan, $bruto, $tarra, $tonase, $keterangan) {

    $sql = "INSERT INTO `db_perusahaan_aan`.`tonase` ("
            . "`perusahaan`, "
            . "`tanggal`, "
            . "`tujuan`, "
            . "`jenis_tarikan`, "
            . "`sopir`, "
            . "`uangjalan`, "
            . "`bruto`, "
            . "`tarra`, "
            . "`tonase`, "
            . "`keterangan`"
            . ") "
            . "VALUES ("
            . "$perusahaan, "
            . "'$tanggal', "
            . "'$tujuan', "
            . "'$jenis_tarikan', "
            . "$sopir, "
            . "$uangjalan, "
            . "$bruto, "
            . "$tarra, "
            . "$tonase, "
            . "'$keterangan'"
            . ");";
    mysql_query($sql) or exit($sql . mysql_error());
}

function ambilSemuaTonase() {


    $return = array();

    $data = mysql_query("select * from tonase") or exit(mysql_error());

    while ($hasil = mysql_fetch_assoc($data)) {
        $return[] = $hasil;
    }

    return $return;
}

function ambilSemuaTonasedengansyarat($syarat) {
    $return = array();

    $data = mysql_query("select * from tonase join perusahaan on perusahaan.id = tonase.perusahaan join sopir on sopir.id = tonase.sopir where " . $syarat . "") or exit(mysql_error());

    while ($hasil = mysql_fetch_assoc($data)) {
        $return[] = $hasil;
    }

    return $return;
}

function ambilTonase($id) {


    $data = mysql_query("select * from tonase where id = " . $id . "") or exit(mysql_error());

    $return = mysql_fetch_assoc($data);

    return $return;
}

function editTonase($id, $perusahaan, $tanggal, $tujuan, $jenis_tarikan, $uangjalan, $bruto, $tarra, $sopir, $tonase, $keterangan) {


    mysql_query("UPDATE `db_perusahaan_aan`.`tonase` SET "
                    . "`perusahaan`='" . $perusahaan . "', "
                    . "`tanggal`='" . $tanggal . "', "
                    . "`tujuan`='" . $tujuan . "', "
                    . "`jenis_tarikan`='" . $jenis_tarikan . "', "
                    . "`sopir`='" . $sopir . "',"
                    . "`uangjalan`='" . $uangjalan . "',"
                    . "`tonase` = '" . $tonase . "', "
                    . "`bruto`='" . $bruto . "',"
                    . "`tarra` = '" . $tarra . "', "
                    . "`keterangan` = '" . $keterangan . "' "
                    . "WHERE  "
                    . "`id`='" . $id . "';") or exit(mysql_error());
}

function deleteTonase($id) {
    mysql_query("delete from tonase"
                    . " WHERE  "
                    . "`id`= '" . $id . "';") or exit(mysql_error());
}

function laporanTonase($filter) {
    $result = null;

    $data = mysql_query("select * from tonase join sopir on sopir.id = tonase.sopir join kendaraan on kendaraan.no_kendaraan = sopir.no_kendaraan join perusahaan on perusahaan.id = tonase.perusahaan where tonase.tanggal like '%" . $filter . "%'") or exit(mysql_error());
    while ($value = mysql_fetch_assoc($data)) {
        $result[] = $value;
    }
    return $result;
}

function laporanTonasePertanggal($tanggalawal, $tanggalakhir) {
    $result = null;

    $data = mysql_query("select * from tonase join sopir on sopir.id = tonase.sopir join kendaraan on kendaraan.no_kendaraan = sopir.no_kendaraan join perusahaan on perusahaan.id = tonase.perusahaan where tonase.tanggal >= '$tanggalawal' and tonase.tanggal <= '$tanggalakhir'") or exit(mysql_error());
    while ($value = mysql_fetch_assoc($data)) {
        $result[] = $value;
    }
    return $result;
}

function laporanTonasePertahun($tahun) {
    $result = null;

    $data = mysql_query("select MONTHNAME(tanggal) as tanggal,kendaraan.no_kendaraan, sopir.nama,perusahaan.nama_perusahaan,tonase.tujuan,sum(tonase.bruto) as bruto, sum(tonase.tarra) as tarra from tonase join sopir on sopir.id = tonase.sopir join kendaraan on kendaraan.no_kendaraan = sopir.no_kendaraan join perusahaan on perusahaan.id = tonase.perusahaan where tonase.tanggal like '%" . $tahun . "%' group BY month(tanggal),kendaraan.no_kendaraan,sopir.nama,perusahaan.nama_perusahaan,tonase.tujuan") or exit(mysql_error());
    while ($value = mysql_fetch_assoc($data)) {
        $result[] = $value;
    }
    return $result;
}

function laporanTonaseBerdasarkanPemilikKendaraan($filter, $filterpemilik) {
    $result = null;
    $sql = "select * from tonase join sopir on sopir.id = tonase.sopir join kendaraan on kendaraan.no_kendaraan = sopir.no_kendaraan join perusahaan on perusahaan.id = tonase.perusahaan join pemilikkendaraan on pemilikkendaraan.id = kendaraan.pemilik_kendaraan where pemilikkendaraan.id = " . $filterpemilik . "";
    $data = mysql_query($sql . " and tonase.tanggal like '%" . $filter . "%'") or exit(mysql_error());
    while ($value = mysql_fetch_assoc($data)) {
        $result[] = $value;
    }
    return $result;
}

function laporanTonaseBerdasarkanKendaraan($filter, $filterpemilik) {
    $result = null;
    $sql = "select * from tonase join sopir on sopir.id = tonase.sopir join kendaraan on kendaraan.no_kendaraan = sopir.no_kendaraan join perusahaan on perusahaan.id = tonase.perusahaan join pemilikkendaraan on pemilikkendaraan.id = kendaraan.pemilik_kendaraan where kendaraan.no_kendaraan = '" . $filterpemilik . "'";
    $data = mysql_query($sql . " and tonase.tanggal like '%" . $filter . "%'") or exit(mysql_error());
    while ($value = mysql_fetch_assoc($data)) {
        $result[] = $value;
    }
    return $result;
}

function laporanTonaseBerdasarkanSopir($filter, $filterpemilik) {
    $result = null;
    $sql = "select * from tonase join sopir on sopir.id = tonase.sopir join kendaraan on kendaraan.no_kendaraan = sopir.no_kendaraan join perusahaan on perusahaan.id = tonase.perusahaan join pemilikkendaraan on pemilikkendaraan.id = kendaraan.pemilik_kendaraan where sopir.id = " . $filterpemilik . "";
    $data = mysql_query($sql . " and tonase.tanggal like '%" . $filter . "%'") or exit(mysql_error());
    while ($value = mysql_fetch_assoc($data)) {
        $result[] = $value;
    }
    return $result;
}

function laporanTonaseBerdasarkanPerusahaan($filter, $filterpemilik) {
    $result = null;
    $sql = "select * from tonase join sopir on sopir.id = tonase.sopir join kendaraan on kendaraan.no_kendaraan = sopir.no_kendaraan join perusahaan on perusahaan.id = tonase.perusahaan join pemilikkendaraan on pemilikkendaraan.id = kendaraan.pemilik_kendaraan where perusahaan.id = " . $filterpemilik . "";
    $data = mysql_query($sql . " and tonase.tanggal like '%" . $filter . "%'") or exit(mysql_error());
    while ($value = mysql_fetch_assoc($data)) {
        $result[] = $value;
    }
    return $result;
}

function jumlahTonase($array, $key) {
    $result = 0;

    foreach ($array as $value) {
        $result = $result + $value[$key];
    }

    return $result;
}
