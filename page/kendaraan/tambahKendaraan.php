
<div class="col-md-12">
    <h1>Halaman Admin Tambah Kendaraan</h1>

    <br>
    <form class="form-horizontal" id="kendaraan" method="post" action="?page=<?php echo $_GET['page'] ?>">
        <div class="form-group">
            <label for="nokendaraan" class="col-sm-2 control-label">No Kendaraan</label>
            <div class="col-sm-10">
                <input class="form-control" name="nokendaraan" type="text" id="nokendaraan" placeholder="No Kendaraan">
            </div>
        </div>
        <div class="form-group">
            <label for="jeniskendaraan" class="col-sm-2 control-label">Jenis Kendaraan</label>
            <div class="col-sm-10">
                <input class="form-control" name="jeniskendaraan" type="text" id="jeniskendaraan" placeholder="Jenis Kendaraan">
            </div>
        </div>
        <div class="form-group">
            <label for="pemilikkendaraan" class="col-sm-2 control-label">Pemilik Kendaraan</label>
            <div class="col-sm-10">
                <select class="form-control" name="pemilikkendaraan" id="pemilikkendaraan">
                    <?php foreach (ambilSemuaPemilikKendaraan() as $value) {
                        ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['nama_pemilik'] ?></option>
                    <?php } 
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="pemilikkendaraan" class="col-sm-2 control-label">Status Kendaraan</label>
            <div class="col-sm-10">
                <select class="form-control" name="status_kendaraan" id="pemilikkendaraan">
                    <option value="Baik">Baik</option>
                    <option value="Rusak">Rusak</option>
                    <option value="Sedang Beroperasi">Sedang Beroperasi</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="jeniskendaraan" class="col-sm-2 control-label">Keterangan</label>
            <div class="col-sm-10">
                <input class="form-control" name="keterangan" type="text" id="jeniskendaraan" placeholder="Jenis Kendaraan">
            </div>
        </div>
        <div>
            <div class="col-sm-offset-5 col-sm-1">
                <button type="submit" name="tambahkendaraan" class="btn btn-success" onclick="submitSopir()">Simpan</button>                            
            </div>
            <div class="col-sm-1">
                <button type="button" class="btn btn-danger" onclick="window.history.back()">Batal</button>
            </div>
        </div>
    </form>

    <script>
        function submitKendaraan() {
            var form = document.getElementById('kendaraan');

            if (confirm('Anda yakin dengan data ini?')) {
                form.submit();
            }
        }
    </script>
    
    <script>
        function submitSopir() {
            $("#kendaraan").validate({
                rules: {
                    nokendaraan: {
                        required: true
                    },
                    jeniskendaraan: {
                        required: true
                    },
                    pemilikkendaraan: {
                        required: true
                    },
                    status_kendaraan: {
                        required: true
                    }
                },
                messages: {
                    nokendaraan:
                            {
                                required: "No kendaraan belum diisi",
                            },
                    jeniskendaraan:
                            {
                                required: "Jenis kendaraan belum diisi",
                            },
                    pemilikkendaraan:
                            {
                                required: "Pemilik kendaraan belum diisi",
                            },
                    status_kendaraan:
                            {
                                required: "Status kendaraan belum dipilih",
                            }
                }
            });
        }
    </script>
</div>