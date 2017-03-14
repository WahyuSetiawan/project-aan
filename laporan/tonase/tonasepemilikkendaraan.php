
<?php
include '../../koneksi/koneksi.php';
include '../../control/tonase.php';
include '../layout/kop.php';
?>

<html>
    <head>
        <title>Laporan Tonase Perbulan</title>
        <link href="../../include/css/bootstrap.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="col-md-12" style="text-align: center">
            <h2>Laporan Tonase Bulan Berdasarkan <?php echo $_GET['jenislaporan'] ?> </h2>
        </div>
        <div class="col-md-12">
            <table cellspacing="0" cellpadding="0" class="table table-bordered" style="font-size: small">
                <col width="32">
                <col width="106">
                <col width="100">
                <col width="132">
                <col width="118">
                <col width="132">
                <col width="59">
                <col width="57">
                <col width="124">
                <tr>
                    <td rowspan="2" width="32">NO</td>
                    <td rowspan="2" width="106">TANGGAL</td>
                    <td rowspan="2" width="100">NO POLISI</td>
                    <td rowspan="2" width="132">DRIVER</td>
                    <td rowspan="2" width="118">PABRIK</td>
                    <td rowspan="2" width="132">TUJUAN</td>
                    <td colspan="3" width="240">TONASE</td>
                </tr>
                <tr>
                    <td>BRUTO</td>
                    <td>TARRA</td>
                    <td>NET</td>
                </tr>
                <?php
                if (isset($_GET['tonase'])) {
                    $i = 1;
                    $tonase = laporanTonaseBerdasarkanPemilikKendaraan(substr($_GET['tonase'], 0, 7),$_GET['pemilikkendaraan']);
                    if ($tonase != NULL) {
                        foreach ($tonase as $value) {
                            ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $value['tanggal'] ?></td>
                                <td><?php echo $value['no_kendaraan'] ?></td>
                                <td><?php echo $value['nama'] ?></td>
                                <td><?php echo $value['nama_perusahaan'] ?></td>
                                <td><?php echo $value['tujuan'] ?></td>
                                <td><?php echo $value['bruto'] ?></td>
                                <td><?php echo $value['tarra'] ?></td>
                                <td><?php echo (((int) $value['bruto']) - ((int) $value['tarra'])) ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="6">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><?php echo (jumlahTonase($tonase, "bruto") + jumlahTonase($tonase, "tarra")) ?></td>
                        </tr>
                        <tr>
                            <td colspan="3">TOTAL UANG JALAN</td>
                            <td><?php echo count($tonase) ?></td>
                            <td>X</td>
                            <td> Rp             350,000 </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>Total : <?php echo (count($tonase) * 350000) ?> </td>
                        </tr>
                    <?php }
                }
                ?>
            </table>
        </div>
        <button type="button" onclick="window.print()">Print</button>
    </body>
</html>






<?php

