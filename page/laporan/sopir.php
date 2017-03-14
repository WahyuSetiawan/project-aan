
<div class="col-md-12">
    <div class="row">
        <h2>Halaman Admin Sopir</h2>
        <div class="col-md-12">
            <div class="col-sm-10">
                <button onclick="history.back()" class="btn btn-success">Back</button>
            </div>
            <div class="col-sm-2" style="text-align: right">
                <a href="laporan/sopir/semua.php" class="btn btn-primary">Print Semua</a>
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
                    <th>No Identitas</th>
                    <th>Nama Sopir</th>
                    <th>Alamat</th>
                    <th>No Kendaraan</th>
                    <th>Action</th>
                </tr>
                <?php
                if (!isset($_POST['caributton'])) {
                    $a = ambilSemuaSopir();
                } else {
                    $where = "nama like '%" . $_POST['caritext'] . "%' or alamat like '%" . $_POST['caritext'] . "%' or no_kendaraan like '%" . $_POST['caritext'] . "%' or noidentitas like '%" . $_POST['caritext'] . "%'";
                    $a = ambilSemuaSopirDenganSyarat($where);
                }
                foreach ($a as $value) {
                    ?>
                    <tr>
                        <td><?php echo $value['noidentitas'] ?></td>
                        <td style="text-align: left"><?php echo $value['nama'] ?></td>
                        <td><?php echo $value['alamat'] ?></td>
                        <td><?php echo $value['no_kendaraan'] ?></td>
                        <td>
                            <a href="laporan/sopir/sopir.php?sopir=<?php echo $value['id'] ?>" class="btn btn-warning">Print</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>