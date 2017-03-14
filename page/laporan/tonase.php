
<div class="col-md-12">
    <div class="row">
        <h2>Halaman Admin Tonase</h2>
        <div class="col-md-12">
            <div class="col-sm-10">
                <button onclick="history.back()" class="btn btn-success">Back</button>
            </div>
        </div>
        <div class="col-md-12" style="margin-top: 20px; text-align: center">
            <form action="laporan/tonase/tonase.php" method="get" class="form-horizontal">
                <div class="form-group">
                    <label for="alamat" class="col-sm-2 control-label">Laporan Berdasarkan </label>
                    <div class="col-sm-10">
                        <select name="jenislaporan" class="form-control">
                            <option value="Pemilik Kendaraan">Pemilik Kendaraan</option>
                            <option value="Kendaraan">Kendaraan</option>
                            <option value="Perusahaan">Perusahaan</option>
                            <option value="Sopir">Sopir</option>
                            <option value="Perbulan">Perbulan</option>
                            <option value="Pertanggal">Pertanggal</option>
                            <option value="Pertahun">Pertahun</option>
                        </select>
                    </div>
                </div>    
                <div class="form-group">
                    <label for="alamat" class="col-sm-2 control-label">Tanggal </label>
                    <div class="col-sm-4">
                        <input name="tonase" id="tanggal" class="form-control" type="text" value="<?php echo date('Y-m-d')?>">
                    </div>
                    <label for="alamat" class="col-sm-2 control-label">Tanggal Akhir</label>
                    <div class="col-sm-4">
                        <input name="tonaseakhir" id="tanggalakhir" class="form-control" type="text" value="<?php echo date('Y-m-d')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nokendaraan" class="col-sm-2 control-label">No Kendaraan</label>
                    <div class="col-sm-10">
                        <select id="nokendaraan" name="nokendaraan" class="form-control">
                            <?php foreach (ambilSemuaKendaraan() as $value) { ?>
                                <option value="<?php echo $value['no_kendaraan'] ?>"><?php echo $value['no_kendaraan'] ?></option>
                            <?php } ?>
                        </select>
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
                    <label for="alamat" class="col-sm-2 control-label">Perusahaan</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="perusahaan" type="text" id="jeniskendaraan" >
                            <?php foreach (ambilSemuaPerusahaan() as $value) { ?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['nama_perusahaan'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pemilikkendaraan" class="col-sm-2 control-label">Sopir</label>
                    <div class="col-sm-10">
                        <select class="form-control" type="text" id="pemilikkendaraan" name="sopir">
                            <?php foreach (ambilSemuaSopir() as $value) { ?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['noidentitas'] . " - " . $value['nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>    
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-warning">Print</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $().ready(function () {
        $("#tanggal").datepicker({
            dateFormat: "yy-m-d",
            yearRange: '-25:+2',
            changeMonth: true,
            changeYear: true
        });
        $("#tanggalakhir").datepicker({
            dateFormat: "yy-m-d",
            yearRange: '-25:+2',
            changeMonth: true,
            changeYear: true
        });
        $("#validasi").validate({
            rules: {
                nis: {
                    required: true,
                    minlength: 9,
                    maxlength: 9
                },
                nama: {
                    required: true
                },
                angkatan: {
                    required: true
                },
                id_kelas: {
                    required: true
                },
                jenis_kelamin: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                nis:
                        {
                            required: "NIS belum diisi",
                            minlength: "NIS Yang Valid Harus 9 Karakter",
                            maxlength: "NIS Yang Valid Harus 9 Karakter"
                        },
                nama:
                        {
                            required: "Nama Siswa belum diisi",
                        },
                angkatan:
                        {
                            required: "Angkatan belum diisi",
                        },
                id_kelas:
                        {
                            required: "Kelas belum dipilih",
                        },
                jenis_kelamin:
                        {
                            required: "Jenis Kelamin belum dipilih"
                        },
                email: "Mohon Masukkan alamat email dengan valid"
            }
        });
    });
</script>