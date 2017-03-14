<?php
include '../../koneksi/koneksi.php';
include '../../control/sopir.php';
include '../../control/kendaraan.php';
include '../layout/kop.php';
?>
<link href="../../include/css/bootstrap.css" rel="stylesheet" type="text/css">

<div class="col-md-12" style="text-align:center">
    <h3>PRINT DAFTAR SOPIR</h3>
</div>

<?php
if (isset($_GET['sopir'])) {
    $value = ambilSopir($_GET['sopir']);
}
?>
<p>&nbsp;</p>
<table class="table table-striped">
  <tbody>
    <tr>
      <td colspan="2">Detail daftar Sopir : </td>
    </tr>
    <tr>
      <td width="250">NO Identitas</td>
      <td>: <?php echo $value['noidentitas']?></td>
    </tr>
    <tr>
      <td>Nama Sopir</td>
      <td>: <?php echo $value['nama']?></td>
    </tr>
    <tr>
      <td>Alamat sopir</td>
      <td>: <?php echo $value['alamat']?></td>
    </tr>
    <tr>
      <td colspan="2">Kendaraan Detail     : </td>
    </tr>
    <tr>
      <td>- No Kendaraan</td>
      <td>: <?php echo ambilKendaraan($value['no_kendaraan'])['no_kendaraan']?></td>
    </tr>
    <tr>
      <td>- Jenis Kendaraan</td>
      <td>: <?php echo ambilKendaraan($value['no_kendaraan'])['jenis_kendaraan']?></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<button type="button" onClick="window.print()">Print</button>