<div class="col-md-12">
    <div class="row">
        <h2>Halaman Admin Pemilik Mobil</h2>
        <div class="col-md-12">
            <div class="col-sm-10">
                <button onclick="history.back()" class="btn btn-success">Back</button>
            </div>
            <div class="col-sm-2" style="text-align: right">
                <a href="?page=<?php echo $_GET['page'] ?>&act=tambah" class="btn btn-primary">Mobil Pemilik Baru</a>
            </div>
        </div>
        <div class="col-md-12">
            <table class="table table-striped">
                <tr>
                    <th>ID Identitas</th>
                    <th>Nama Pemilik</th>
                    <th>Alamat Pemilik</th>
                    <th>Action</th>
                </tr>
                <?php
                foreach (ambilSemuaPemilikKendaraan() as $value) {
                    ?>
                    <tr>
                        <td><?php echo $value['no_identitas'] ?></td>
                        <td><?php echo $value['nama_pemilik'] ?></td>
                        <td><?php echo $value['alamat_pemilik'] ?></td>
                        <td>
                            <form action="?page=<?php echo $_GET['page'] ?>" method="POST">
                                <a href="?page=<?php echo $_GET['page'] ?>&act=edit&id=<?php echo $value['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <button type="submit" name="deletepemilikkendaraan" value="<?php echo $value['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>

    </div>

</div>