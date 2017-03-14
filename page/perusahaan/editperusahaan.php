]<div class="col-md-12">
    <h2>Halaman Admin Edit Perusahaan</h2>
    <div class="col-md-12">
        <?php $value = ambilPerusahaan($_GET['id']) ?>
        <form class="form-horizontal" id="sopir" method="post" action="?page=<?php echo $_GET['page'] ?>">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="idperusahaan">ID Perusahaan</label>
                <div class="col-sm-10">
                    <input class="form-control" name="idperusahaan" value="<?php echo $value['id'] ?>" type="text" id="idperusahaan" placeholder="ID Perusahaan">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="namaperusahaan">Nama Perusahaan</label>
                <div class="col-sm-10">
                    <input class="form-control" value="<?php echo $value['nama_perusahaan'] ?>" name="namaperusahaan" type="text" id="namaperusahaan" placeholder="Nama Perusahaan">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="alamatperusahaan">Alamat Perusahaan</label>
                <div class="col-sm-10">
                    <input class="form-control" value="<?php echo $value['alamat_perusahaan'] ?>" name="alamatperusahaan" type="text" id="alamatperusahaan" placeholder="Alamat Perusahaan">
                </div>
            </div>
            <div>
                <div class="col-sm-offset-5 col-sm-1">
                    <button type="submit" name="editperusahaan" class="btn btn-success" onclick="submitSopir()">Simpan</button>
                </div>
                <div class="col-sm-1">
                    <button type="button" class="btn btn-danger" onclick="window.history.back()">Batal</button>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        function submitSopir() {

            $("#perusahaan").validate({
                rules: {
                    idperusahaan: {
                        required: true
                    },
                    namaperusahaan: {
                        required: true
                    },
                    alamatperusahaan: {
                        required: true
                    }
                },
                messages: {
                    idperusahaan:
                            {
                                required: "Id perusahaan harus diisi",
                            },
                    namaperusahaan:
                            {
                                required: "Nama perusahaan harus diisi",
                            },
                    alamatperusahaan:
                            {
                                required: "Alamat perusahaan harus diisi",
                            }
                }
            });

        }</script>
</div>