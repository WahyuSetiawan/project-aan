<div class="col-md-12">
    <div class="row">
        <h2>Halaman Admin Kendaraan</h2>
        <div class="col-md-12">
            <div class="col-sm-10">
                <button onclick="history.back()" class="btn btn-success">Back</button>
            </div>
            <div class="col-sm-2" style="text-align: right">
                <a href="laporan/kendaraan/semua.php" class="btn btn-primary">Print Semua</a>
            </div>
        </div>
        <div class="col-md-12" style="margin-top: 20px; text-align: center">
            <form class="form-horizontal" style="margin-bottom: 40px" method="post" action="?page=<?php echo $_GET['page'] ?>">
                <div>
                    <div class="col-sm-10" style="text-align: center">
                        <input type="text" name="caritext" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" name="caributton" class="btn btn-success">Cari</button>
                    </div>
                </div>
            </form>
            <table class="table table-striped">
                <tr>
                    <th>No Kendaraan</th>
                    <th>Jenis Kendaraan</th>
                    <th>Nama Pemelik</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
                <?php
                if (!isset($_POST['caributton'])) {
                    $a = ambilSemuaKendaraan();
                } else {
                    $where = "no_kendaraan like '%" . $_POST['caritext'] . "%' or jenis_kendaraan like '%" . $_POST['caritext'] . "%' or status_kendaraan like '%" . $_POST['caritext'] . "%' or keterangan_kendaraan like '%" . $_POST['caritext'] . "%'";
                    $a = ambilSemuaKendaraanDenganSyarat($where);
                }
                foreach ($a as $value) {
                    ?>
                    <tr>
                        <td><?php echo $value['no_kendaraan'] ?></td>
                        <td><?php echo $value['jenis_kendaraan'] ?></td>
                        <td><?php echo ambilPemilikKendaraan($value['pemilik_kendaraan'])['nama_pemilik'] ?></td>
                        <td><?php echo $value['status_kendaraan'] ?></td>
                        <td><?php echo $value['keterangan_kendaraan'] ?></td>
                        <td>
                            <a href="laporan/kendaraan/kendaraan.php?kendaraan=<?php echo $value['no_kendaraan'] ?>" class="btn btn-warning">Print</a>
                        </td>
                    </tr>
                <?php }
                ?>

            </table>
        </div>
    </div>
</div>