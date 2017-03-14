<div class="col-md-12">
    <div class="row">
        <h2>Halaman Admin Sopir</h2>
        <div class="col-md-12">
            <div class="col-sm-10">
                <button onclick="history.back()" class="btn btn-success">Back</button>
            </div>
            <div class="col-sm-2" style="text-align: right">
                <a href="?page=<?php echo $_GET['page'] ?>&act=tambah" class="btn btn-primary">Sopir Baru</a>
            </div>
        </div>
        <div class="col-md-12" style="margin-top: 20px">
            <table class="table table-striped">
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
                <?php foreach (ambilsemuaadmin() as $value) { ?>
                    <tr>
                        <td><?php echo $value['username'] ?></td>
                        <td><?php echo $value['password'] ?></td>
                        <td>
                            <form action="?page=<?php echo $_GET['page'] ?>&act=listadmin" method="post">
                                <a href="?page=<?php echo $_GET['page'] ?>&act=ubah&id=<?php echo $value['username'] ?>" class="btn btn-warning">Edit</a>
                                <button type="submit" name="hapusadmin" value="<?php echo $value['username'] ?>" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>