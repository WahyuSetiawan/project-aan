<div class="row">

    <h1>Halaman Manajer Manajemen Password</h1>
    <div class="col-md-2 col-md-offset-10">
        <a href="?page=admin&act=listadmin" class="btn btn-primary">Tambah Admin</a>
    </div>
    <br>
    <div class="col-md-12" style="margin-top: 10px">
        <form class="form-horizontal" id="sopir" action="?page=<?php echo $_GET['page'] ?>" method="post">
            <div class="form-group">
                <label for="noidentitas" class="col-sm-3 control-label">Username</label>
                <div class="col-sm-9">
                    <input class="form-control" name="usernamelama" type="text" id="noidentitas" placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <label for="noidentitas" class="col-sm-3 control-label">Username Baru</label>
                <div class="col-sm-9">
                    <input class="form-control" name="usernamebaru" type="text" id="noidentitas" placeholder="Username Baru (dapat dikosongkan)">
                </div>
            </div>
            <div class="form-group">
                <label for="nama" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                    <input class="form-control" name="password" type="text" id="nama" placeholder="Password Lama">
                </div>
            </div>
            <div class="form-group">
                <label for="alamat" class="col-sm-3 control-label">Password Baru</label>
                <div class="col-sm-9">
                    <input class="form-control" name="passwordbaru1" type="text" id="alamat" placeholder="Password Baru">
                </div>
            </div>
            <div class="form-group">
                <label for="nokendaraan" class="col-sm-3 control-label">Ulangi Password Baru</label>
                <div class="col-sm-9">
                    <input class="form-control" name="passwordbaru2" type="text" id="alamat" placeholder="Ulangi Password Baru">
                </div>
            </div>
            <div>
                <div class="col-sm-offset-5 col-sm-1">
                    <button type="submit" name="ubahpassword" class="btn btn-success" onclick="submitSopir()">Simpan</button>
                </div>
                <div class="col-sm-1">
                    <button type="button" class="btn btn-danger" onclick="window.history.back()">Batal</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function submitSopir() {
            var form = document.getElementById('sopir');

            if (confirm("Apakah anda ingin mengubah data admin ini ?")) {
                form.submit();
            }
        }
    </script>

</div>