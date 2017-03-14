<?php
include '../../koneksi/koneksi.php';
include '../../control/Perusahaan.php';
include '../../control/kendaraan.php';
include '../../control/pemilikkendaraan.php';
include '../layout/kop.php';
?>
<link href="../../include/css/bootstrap.css" rel="stylesheet" type="text/css">

<div class="col-md-12" style="text-align:center">
    <h3>PRINT DAFTAR KENDARAAN DETAIL</h3>
</div>

<?php
if (isset($_GET['kendaraan'])) {
    $value = ambilKendaraan($_GET['kendaraan']);
}
?>
<p>&nbsp;</p>
<table class="table table-striped">
    <tbody>
        <tr>
            <td colspan="2">Detail daftar Kendaraan : </td>
        </tr>
        <tr>
            <td width="250">No Kendaraan</td>
            <td>: <?php echo $value['no_kendaraan'] ?></td>
        </tr>
        <tr>
            <td>Jenis Kendaraan</td>
            <td>: <?php echo $value['jenis_kendaraan'] ?></td>
        </tr>
        <tr>
            <td>Status Kendaraan</td>
            <td>: <?php echo $value['status_kendaraan'] ?></td>
        </tr>
        <tr>
            <td>Keterangan Kendaraan</td>
            <td>: <?php echo $value['keterangan_kendaraan'] ?></td>
        </tr>
        <tr>
            <td colspan="2">Pemilik Kendaraan    : </td>
        </tr>
        <tr>
            <td>- No Identitas</td>
            <td>: <?php echo ambilPemilikKendaraan($value['pemilik_kendaraan'])['no_identitas'] ?></td>
        </tr>
        <tr>
            <td>- Nama Pemilik Kendaraan</td>
            <td>: <?php echo ambilPemilikKendaraan($value['pemilik_kendaraan'])['nama_pemilik'] ?></td>
        </tr>
        <tr>
            <td>- Alamat Pemilik Kendaraan</td>
            <td>: <?php echo ambilPemilikKendaraan($value['pemilik_kendaraan'])['alamat_pemilik'] ?></td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<button type="button" onClick="window.print()">Print</button>