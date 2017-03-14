<?php 
include '../../koneksi/koneksi.php';
include '../../control/Perusahaan.php';
include '../layout/kop.php';?>
<link href="../../include/css/bootstrap.css" rel="stylesheet" type="text/css">

<div class="col-md-12" style="text-align:center">
    <h3>PRINT DAFTAR PERUSAHAAN</h3>
</div>

<p>&nbsp;</p>
<table width="959" border="1" class="table table-bordered">
    <tr>
        <th width="10" style="text-align: center">No</th>
        <th width="275" style="text-align: center">Nama Perusahaan</th>
        <th width="360" style="text-align: center">Alamat Perusahaan</th>
    </tr>
    <?php 
    $i = 1;
    foreach (ambilSemuaPerusahaan() as $value) { ?>
        <tr>
            <td><?php echo $i++?></td>
            <td><?php echo $value['nama_perusahaan'] ?></td>
            <td><?php echo $value['alamat_perusahaan'] ?></td>
        </tr>
    <?php } ?>
</table>
<p>&nbsp;</p>

<button type="button" onClick="window.print()">Print</button>
