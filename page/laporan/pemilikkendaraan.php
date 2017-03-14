
<div class="col-md-12">
    <div class="row">
        <h2>Halaman Admin Pemilik Kendaraan</h2>
        <div class="col-md-12">
            <div class="col-sm-10">
                <button onclick="history.back()" class="btn btn-success">Back</button>
            </div>
            <div class="col-sm-2" style="text-align: right">
                <a href="laporan/pemilikkendaraan/semua.php" class="btn btn-primary">Print Semua</a>
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
                    <th>ID Identitas</th>
                    <th>Nama Pemilik</th>
                    <th>Alamat Pemilik</th>
                    <th>Action</th>
                </tr>
                <?php
                if (!isset($_POST['caributton'])) {
                    $a = ambilSemuaPemilikKendaraan();
                } else {
                    $where = "no_identitas like '%" . $_POST['caritext'] . "%' or nama_pemilik like '%" . $_POST['caritext'] . "%' or alamat_pemilik like '%" . $_POST['caritext'] . "%'";
                    $a = ambilSemuaPemilikKendaraanDenganSyarat($where);
                }
                foreach ($a as $value) {
                    ?>
                    <tr>
                        <td><?php echo $value['no_identitas'] ?></td>
                        <td><?php echo $value['nama_pemilik'] ?></td>
                        <td><?php echo $value['alamat_pemilik'] ?></td>
                        <td>
                            <a href="laporan/pemilikkendaraan/pemilikkendaraan.php?pemilikkendaraan=<?php echo $value['id']?>" class="btn btn-warning btn-sm">Print</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>