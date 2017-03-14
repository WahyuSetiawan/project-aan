<div class="col-md-12">
    <div class="row">
        <h2>Halaman Admin Perusahaan</h2>
        <div class="col-md-12">
            <div class="col-sm-10">
                <button type="button" onclick="history.back()" class="btn btn-success">Back</button>
            </div>
            <div class="col-sm-2" style="text-align: right">
                <a href="?page=<?php echo $_GET['page'] ?>&act=tambah" class="btn btn-primary">Tambah</a>
            </div>
        </div>
        <div class="col-md-12">
            <table class="table table-striped">
                <tr>
                    <th>ID Perusahaan</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat Perusahaan</th>
                    <th>Action</th>
                </tr>
                <?php
                foreach (ambilSemuaPerusahaan() as $value) {
                    ?>
                    <tr>
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['nama_perusahaan'] ?></td>
                        <td><?php echo $value['alamat_perusahaan'] ?></td>
                        <td>
                            <form action="?page=<?php echo $_GET['page'] ?>" method="post">
                                <a href="?page=<?php echo $_GET['page'] ?>&act=edit&id=<?php echo $value['id'] ?>" class="btn btn-warning">Edit</a>
                                <button type="submit" name="hapusperusahaan" value="<?php echo $value['id'] ?>" class="btn btn-danger">Delete</button>
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