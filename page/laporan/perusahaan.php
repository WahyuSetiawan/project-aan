
<div class="col-md-12">
    <div class="row">
        <h2>Halaman Admin Perusahaan</h2>
        <div class="col-md-12">
            <div class="col-sm-10">
                <button onclick="history.back()" class="btn btn-success">Back</button>
            </div>
            <div class="col-sm-2" style="text-align: right">
                <a href="laporan/perusahaan/semua.php" class="btn btn-primary">Print Semua</a>
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
                    <th>ID Perusahaan</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat Perusahaan</th>
                    <th>Action</th>
                </tr>
                <?php
                if (!isset($_POST['caributton'])) {
                    $a = ambilSemuaPerusahaan();
                } else {
                    $where = "id like '%" . $_POST['caritext'] . "%' or nama_perusahaan like '%" . $_POST['caritext'] . "%' or alamat_perusahaan like '%" . $_POST['caritext'] . "%'";
                    $a = ambilSemuaPerusahaanDenganSyarat($where);
                }
                foreach ($a as $value) {
                    ?>
                    <tr>
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['nama_perusahaan'] ?></td>
                        <td><?php echo $value['alamat_perusahaan'] ?></td>
                        <td>
                            <a href="laporan/perusahaan/perusahaan.php?perusahaan=<?php echo $value['id'] ?>" class="btn btn-warning">Print</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>