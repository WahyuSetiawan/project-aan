<div class="col-md-12">

    <h1>Halaman Manajer Tambah Admin</h1>
    <br>
    <form class="form-horizontal" id="sopir" action="?page=<?php echo $_GET['page']?>&act=listadmin" method="post">
        <div class="form-group">
            <label for="noidentitas" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
                <input class="form-control" name="username" type="text" id="noidentitas" placeholder="Username">
            </div>
        </div>
        <div class="form-group">
            <label for="nama" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input class="form-control" name="password" type="text" id="nama" placeholder="Password">
            </div>
        </div>
        <div>
            <div class="col-sm-offset-5 col-sm-1">
                <button type="submit" name="tambahadmin" class="btn btn-success" onclick="submitSopir()">Simpan</button>
            </div>
            <div class="col-sm-1">
                <button type="button" class="btn btn-danger" onclick="window.history.back()">Batal</button>
            </div>
        </div>
    </form>

    <script>
        function submitSopir() {
            var form = document.getElementById('sopir');

            if (confirm("Apakah anda ingin menyimpan data admin ini ?")) {
                form.submit();
            }
        }
    </script>

</div>