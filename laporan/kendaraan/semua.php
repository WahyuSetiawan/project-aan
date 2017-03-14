<?php
include '../../koneksi/koneksi.php';
include '../../control/kendaraan.php';
include '../../control/sopir.php';
include '../../control/pemilikkendaraan.php';
include '../layout/kop.php';
?>
<link href="../../include/css/bootstrap.css" rel="stylesheet" type="text/css">

<div class="col-md-12" style="text-align:center">
    <h3>PRINT DAFTAR KENDARAAN</h3>
</div>

<p>&nbsp;</p>
<table width="959" border="1" class="table table-bordered">
    <tr>
        <th width="10" style="text-align: center">No</th>
        <th width="70" style="text-align: center">No Kendaraan</th>
        <th width="275" style="text-align: center">Jenis Kendaraan</th>
        <th width="360" style="text-align: center">Nama Sopir</th>
        <th>Status</th>
        <th>Keterangan</th>
    </tr>
    <?php
    $i = 1;
    foreach (ambilSemuaKendaraan() as $value) {
        ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $value['no_kendaraan'] ?></td>
            <td><?php echo $value['jenis_kendaraan'] ?></td>
            <td><?php echo ambilSopirdarikendaraan($value['no_kendaraan'])['nama'] . ' (' . ambilSopirdarikendaraan($value['no_kendaraan'])['noidentitas'] . ')' ?></td>
            <td><?php echo $value['status_kendaraan']?></td>
            <td><?php echo $value['keterangan_kendaraan']?></td>
        </tr>
<?php } ?>
</table>
<p>&nbsp;</p>

<button type="button" onClick="window.print()">Print</button>
