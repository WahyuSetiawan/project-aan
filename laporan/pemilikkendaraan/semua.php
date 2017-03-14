<?php 
include '../../koneksi/koneksi.php';
include '../../control/pemilikkendaraan.php';
include '../layout/kop.php';?>
<link href="../../include/css/bootstrap.css" rel="stylesheet" type="text/css">

<div class="col-md-12" style="text-align:center">
    <h3>PRINT DAFTAR PEMILIK KENDARAAN</h3>
</div>

<p>&nbsp;</p>
<table width="959" border="1" class="table table-bordered">
    <tr>
        <th width="10" style="text-align: center">No</th>
        <th width="70" style="text-align: center">No Identitas</th>
        <th width="275" style="text-align: center">Nama</th>
        <th width="360" style="text-align: center">Alamat</th>
    </tr>
    <?php 
    $i = 1;
    foreach (ambilSemuaPemilikKendaraan() as $value) { ?>
        <tr>
            <td><?php echo $i++?></td>
            <td><?php echo $value['no_identitas'] ?></td>
            <td><?php echo $value['nama_pemilik'] ?></td>
            <td><?php echo $value['alamat_pemilik'] ?></td>
        </tr>
    <?php } ?>
</table>
<p>&nbsp;</p>

<button type="button" onClick="window.print()">Print</button>
