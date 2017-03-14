<div class="col-md-12">
    <h1>Halaman Admin Ubah Sopir</h1>
    <br>
    <?php $valueubah = ambilSopir($_GET['id']) ?>
    <form class="form-horizontal" id="sopir" action="?page=<?php echo $_GET['page'] ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
        <div class="form-group">
            <label for="noidentitas" class="col-sm-2 control-label">No Identitas</label>
            <div class="col-sm-10">
                <input class="form-control" name="noidentitas" value="<?php echo $valueubah['noidentitas'] ?>" type="text" id="noidentitas" placeholder="No Identitas">
            </div>
        </div>
        <div class="form-group">
            <label for="nama" class="col-sm-2 control-label">Nama Sopir</label>
            <div class="col-sm-10">
                <input class="form-control" name="namasopir" value="<?php echo $valueubah['nama'] ?>" type="text" id="nama" placeholder="Nama Sopir">
            </div>
        </div>
        <div class="form-group">
            <label for="alamat" class="col-sm-2 control-label">Alamat Sopir</label>
            <div class="col-sm-10">
                <input class="form-control" name="alamatsopir" value="<?php echo $valueubah['alamat'] ?>" type="text" id="alamat" placeholder="Alamat Sopir">
            </div>
        </div>
        <div class="form-group">
            <label for="nokendaraan" class="col-sm-2 control-label">No Kendaraan</label>
            <div class="col-sm-10">
                <select id="nokendaraan" name="nokendaraan" class="form-control">
                    <?php
                    foreach (ambilSemuaKendaraan() as $value) {
                        if ($valueubah['no_kendaraan'] == $value['no_kendaraan']) {
                            ?>
                            <option value="<?php echo $value['no_kendaraan'] ?>" selected="true"><?php echo $value['no_kendaraan'] ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $value['no_kendaraan'] ?>"><?php echo $value['no_kendaraan'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div>
            <div class="col-sm-offset-5 col-sm-1">
                <button type="submit" name="ubahsopir" class="btn btn-success" onclick="submitSopir()">Simpan</button>
            </div>
            <div class="col-sm-1">
                <button type="button" class="btn btn-danger" onclick="window.history.back()">Batal</button>
            </div>
        </div>
    </form>

    <script>
        function submitSopir() {
            $("#sopir").validate({
                rules: {
                    noidentitas: {
                        required: true
                    },
                    namasopir: {
                        required: true
                    },
                    alamatsopir: {
                        required: true
                    },
                    nokendaraan: {
                        required: true
                    }
                },
                messages: {
                    noidentitas:
                            {
                                required: "No identitas belum diisi",
                            },
                    namasopir:
                            {
                                required: "Nama Sopir belum diisi",
                            },
                    alamatsopir:
                            {
                                required: "Alamat belum diisi",
                            },
                    nokendaraan:
                            {
                                required: "Kelas belum dipilih",
                            }
                }
            });
        }
    </script>

</div>