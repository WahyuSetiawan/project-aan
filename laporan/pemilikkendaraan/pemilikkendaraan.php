<?php
include '../../koneksi/koneksi.php';
include '../../control/Perusahaan.php';
include '../../control/sopir.php';
include '../../control/kendaraan.php';
include '../../control/pemilikkendaraan.php';
include '../layout/kop.php';
?>
<link href="../../include/css/bootstrap.css" rel="stylesheet" type="text/css">

<div class="col-md-12" style="text-align:center">
    <h3>PRINT DAFTAR PEMILIK KENDARAAN DETAIL</h3>
</div>

<?php
if (isset($_GET['pemilikkendaraan'])) {
    $value = ambilPemilikKendaraan($_GET['pemilikkendaraan']);
}
?>
<p>&nbsp;</p>
<table class="table table-striped">
    <tbody>
        <tr>
            <td colspan="2">Detail daftar pemilik kendaraan : </td>
        </tr>
        <tr>
            <td width="250">No Identitas</td>
            <td>: <?php echo $value['no_identitas'] ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: <?php echo $value['nama_pemilik'] ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: <?php echo $value['alamat_pemilik'] ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: <?php echo count(ambilSemuaKendaraanberdasarkanpemilik($value['id'])) ?></td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<?php
if (isset($_GET['kendaraan'])) {
    if ($_GET['kendaraan'] == 'on') {
        ?>
        <div class="col-md-12" style="text-align: center">
            <h4>Daftar Kendaraan</h4>
        </div>

        <p>
            Berikut daftar kendaraan yang terdapat yang dimiliki oleh saudara <?php echo $value['nama_pemilik'] ?> :
        </p>
        <table width="959" class="table table-striped">
            <tr>
                <th width="10" style="text-align: center">No</th>
                <th width="70" style="text-align: center">No Kendaraan</th>
                <th width="275" style="text-align: center">Jenis Kendaraan</th>
                <th width="360" style="text-align: center">Nama Sopir</th>
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
                </tr>
        <?php } ?>
        </table>
    <?php }
} ?>
<p>&nbsp;</p>
<button type="button" onClick="window.print()">Print</button>