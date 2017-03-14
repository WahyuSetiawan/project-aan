<div class="col-md-12">

    <h1>Halaman Admin Tambah Pemilik Kendaraan</h1>
    <?php $value = ambilPemilikKendaraan($_GET['id']) ?>
    <br>
    <form class="form-horizontal" id="pemilikkendaraan" method="POST" action="?page=<?php echo $_GET['page'] ?>">
        <div class="form-group">
            <label for="noidentitas" class="col-sm-3 control-label">No Pemilik Kendaraan</label>
            <div class="col-sm-9">
                <input class="form-control" type="text" value="<?php echo $value['id'] ?>" name="nopemilikkendaraan" id="noidentitas" placeholder="No Pemilik Kendaraan (Dapat Dikosongkan)">
            </div>
        </div>
        <div class="form-group">
            <label for="noidentitas" class="col-sm-3 control-label">No Identitas</label>
            <div class="col-sm-9">
                <input class="form-control" value="<?php echo $value['no_identitas'] ?>" name="noIdentitas" name="noidentitas" type="text" id="noidentitas" placeholder="No Identitas">
            </div>
        </div>
        <div class="form-group">
            <label for="noidentitas" class="col-sm-3 control-label">Nama Pemilik Kendaraan</label>
            <div class="col-sm-9">
                <input class="form-control" value="<?php echo $value['nama_pemilik'] ?>" type="text" name="namapemilikkendaraan" id="noidentitas" placeholder="Nama Pemilik Kendaraan">
            </div>
        </div>
        <div class="form-group">
            <label for="noidentitas" class="col-sm-3 control-label">Alamat Pemilik Kendaraan</label>
            <div class="col-sm-9">
                <input class="form-control" value="<?php echo $value['alamat_pemilik'] ?>" type="text" name="alamatpemilikkendaraan" id="noidentitas" placeholder="Alamat Pemilik Kendaraan">
            </div>
        </div>
        <div>
            <div class="col-sm-offset-5 col-sm-1">
                <button type="submit" class="btn btn-success" name="editpemilikkendaraan" onclick="submitSopir()">Simpan</button>
            </div>
            <div class="col-sm-1">
                <button type="button" class="btn btn-danger" onclick="window.history.back()">Batal</button>
            </div>
        </div>
    </form>

    <script>
        function submitSopir() {
            $("#pemilikkendaraan").validate({
                rules: {
                    nopemilikkendaraan: {
                        required: true
                    },
                    noIdentitas: {
                        required: true
                    },
                    namapemilikkendaraan: {
                        required: true
                    },
                    alamatpemilikkendaraan: {
                        required: true
                    }
                },
                messages: {
                    nopemilikkendaraan:
                            {
                                required: "Id pemilik kendaraan harus diisi",
                            },
                    noIdentitas:
                            {
                                required: "Nama pemilik kendaraan harus diisi",
                            },
                    namapemilikkendaraan:
                            {
                                required: "Nama pemilik kendaraan harus diisi",
                            },
                    alamatpemilikkendaraan:
                            {
                                required: "Alamat pemilik kendaraan harus diisi",
                            }
                }
            });
        }
    </script>

</div>