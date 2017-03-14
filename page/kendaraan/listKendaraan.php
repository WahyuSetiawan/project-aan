<div class="col-md-12">
    <div class="row">
        <h2>Halaman Admin Kendaraan</h2>
        <div class="col-md-12">
            <div class="col-sm-10">
                <button onclick="history.back()" class="btn btn-success">Back</button>
            </div>
            <div class="col-sm-2" style="text-align: right">
                <a href="?page=<?php echo $_GET['page'] ?>&act=tambah" class="btn btn-primary">Kendaraan Baru</a>
            </div>
        </div>
        <div class="col-md-12" style="margin-top: 20px">
            <table class="table table-striped">
                <tr>
                    <th>No Kendaraan</th>
                    <th>Jenis Kendaraan</th>
                    <th>Nama Pemelik</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
                <?php foreach (ambilSemuaKendaraan() as $value) {
                    ?>
                    <tr>
                        <td><?php echo $value['no_kendaraan'] ?></td>
                        <td><?php echo $value['jenis_kendaraan'] ?></td>
                        <td><?php echo ambilPemilikKendaraan($value['pemilik_kendaraan'])['nama_pemilik'] ?></td>
                        <td><?php echo $value['status_kendaraan'] ?></td>
                        <td><?php echo $value['keterangan_kendaraan'] ?></td>
                        <td>
                            <form action="?page=<?php echo $_GET['page'] ?>" method="post" >
                                <a href="?page=<?php echo $_GET['page'] ?>&act=edit&id=<?php echo $value['no_kendaraan'] ?>" class="btn btn-warning">Edit</a>
                                <button type="submit" value="<?php echo $value['no_kendaraan'] ?>" name="hapuskendaraan" class="btn btn-danger">Delete</a>
                            </form>
                        </td>
                    </tr>
                <?php }
                ?>

            </table>
        </div>
    </div>
</div>