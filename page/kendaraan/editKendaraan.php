
<div class="col-md-12">
    <h1>Halaman Admin Tambah Kendaraan</h1>
    <?php $value = ambilKendaraan($_GET['id']) ?>
    <br>
    <form class="form-horizontal" id="kendaraan" method="post" action="?page=<?php echo $_GET['page'] ?>">
        <input type="hidden" name="nokendaraanold" value="<?php echo $_GET['id'] ?>">
        <div class="form-group">
            <label for="nokendaraan" class="col-sm-2 control-label">No Kendaraan</label>
            <div class="col-sm-10">
                <input class="form-control" value="<?php echo $value['no_kendaraan'] ?>" name="nokendaraan" type="text" id="nokendaraan" placeholder="No Kendaraan">
            </div>
        </div>
        <div class="form-group">
            <label for="jeniskendaraan" class="col-sm-2 control-label">Jenis Kendaraan</label>
            <div class="col-sm-10">
                <input class="form-control" value="<?php echo $value['jenis_kendaraan'] ?>" name="jeniskendaraan" type="text" id="jeniskendaraan" placeholder="Jenis Kendaraan">
            </div>
        </div>
        <div class="form-group">
            <label for="pemilikkendaraan" class="col-sm-2 control-label">Pemilik Kendaraan</label>
            <div class="col-sm-10">
                <select class="form-control" name="pemilikkendaraan" id="pemilikkendaraan">
                    <?php
                    foreach (ambilSemuaPemilikKendaraan() as $valuep) {
                        if ($valuep['id'] == $value['pemilik_kendaraan']) {
                            ?>
                            <option value="<?php echo $valuep['id'] ?>" selected="true"><?php echo $valuep['nama_pemilik'] ?></option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $valuep['id'] ?>"><?php echo $valuep['nama_pemilik'] ?></option>
                            <?php
                        }
                    } 
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="pemilikkendaraan" class="col-sm-2 control-label">Status Kendaraan</label>
            <div class="col-sm-10">
                <select class="form-control" name="status_kendaraan" id="pemilikkendaraan">
                    <?php
                    if ($value['status_kendaraan'] == 'Baik') {
                        ?>
                        <option value="Baik" selected="true">Baik</option>
                        <option value="Rusak">Rusak</option>
                        <option value="Sedang Beroperasi">Sedang Beroperasi</option>
                        <?php
                    } else if ($value['status_kendaraan'] == 'Rusak') {
                        ?>
                        <option value="Baik">Baik</option>
                        <option value="Rusak" selected=true"">Rusak</option>
                        <option value="Sedang Beroperasi">Sedang Beroperasi</option>
                        <?php
                    } else {
                        ?>
                        <option value="Baik">Baik</option>
                        <option value="Rusak">Rusak</option>
                        <option value="Sedang Beroperasi" selected="true">Sedang Beroperasi</option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="jeniskendaraan" class="col-sm-2 control-label">Keterangan</label>
            <div class="col-sm-10">
                <input class="form-control" name="keterangan" value="<?php echo $value['keterangan_kendaraan'] ?>" type="text" id="jeniskendaraan" placeholder="Jenis Kendaraan">
            </div>
        </div>
        <div>
            <div class="col-sm-offset-5 col-sm-1">
                <button type="submit" name="editkendaraan" class="btn btn-success" onclick="submitKendaraan()">Simpan</button>                            
            </div>
            <div class="col-sm-1">
                <button type="button" class="btn btn-danger" onclick="window.history.back()">Batal</button>
            </div>
        </div>
    </form>

    <script>
        function submitKendaraan() {
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