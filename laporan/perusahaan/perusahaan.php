<?php
include '../../koneksi/koneksi.php';
include '../../control/Perusahaan.php';
include '../../control/kendaraan.php';
include '../layout/kop.php';
?>
<link href="../../include/css/bootstrap.css" rel="stylesheet" type="text/css">

<div class="col-md-12" style="text-align:center">
    <h3>PRINT DAFTAR PERUSAHAAN DETAIL</h3>
</div>

<?php
if (isset($_GET['perusahaan'])) {
    $value = ambilPerusahaan($_GET['perusahaan']);
}
?>
<p>&nbsp;</p>
<table class="table table-striped">
  <tbody>
    <tr>
      <td colspan="2">Detail daftar Perusahaan : </td>
    </tr>
    <tr>
      <td width="250">Nama Perushaaan</td>
      <td>: <?php echo $value['nama_perusahaan']?></td>
    </tr>
    <tr>
      <td>Alamat Perusahaan</td>
      <td>: <?php echo $value['alamat_perusahaan']?></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<button type="button" onClick="window.print()">Print</button>