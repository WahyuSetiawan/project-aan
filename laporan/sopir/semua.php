<?php 
include '../../koneksi/koneksi.php';
include '../../control/sopir.php';
include '../layout/kop.php';?>
<link href="../../include/css/bootstrap.css" rel="stylesheet" type="text/css">

<div class="col-md-12" style="text-align:center">
    <h3>PRINT DAFTAR SOPIR</h3>
</div>

<p>&nbsp;</p>
<table width="959" border="1" class="table table-bordered">
    <tr>
        <th width="10" style="text-align: center">No</th>
        <th width="70" style="text-align: center">No Identitas</th>
        <th width="150" style="text-align: center">Nama Perusahaan</th>
        <th width="275" style="text-align: center">Alamat Perusahaan</th>
        <th width="360" style="text-align: center">No Kendaraan</th>
    </tr>
    <?php 
    $i = 1;
    foreach (ambilSemuaSopir() as $value) { ?>
        <tr>
            <td><?php echo $i++?></td>
            <td><?php echo $value['noidentitas'] ?></td>
            <td><?php echo $value['nama'] ?></td>
            <td><?php echo $value['alamat'] ?></td>
            <td><?php echo $value['no_kendaraan'] ?></td>
        </tr>
    <?php } ?>
</table>
<p>&nbsp;</p>

<button type="button" onClick="window.print()">Print</button>
