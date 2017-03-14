<div class="col-md-12">
    <div class="row">
        <h2>Halaman Admin Status Kendaraan</h2>
        <div class="col-md-12">
            <button onclick="history.back()" class="btn btn-success">Back</button>
            <br>
            <form class="form-horizontal" id="Tonase" action="?page=<?php echo $_GET['page'] ?>" method="post">
                <div class="form-group">
                    <label for="Keterangan" class="col-sm-2 control-label">Waktu</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="waktu" type="text" id="Ketererangan" onkeypress="insert(event)" value="<?php echo date("y-m-d h:m:s") ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pemilikkendaraan" class="col-sm-2 control-label">Kendaraan</label>
                    <div class="col-sm-10">
                        <select class="form-control" type="text" id="pemilikkendaraan" name="kendaraan">
                            <?php foreach (ambilSemuaKendaraan() as $value) { ?>
                                <option value="<?php echo $value['no_kendaraan'] ?>"><?php echo $value['no_kendaraan'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pemilikkendaraan" class="col-sm-2 control-label">Status Kendaraan</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="status" id="statuskendaraan">
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                            <option value="Sedang Beroperasi">Sedang Beroperasi</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pemilikkendaraan" class="col-sm-2 control-label">Tujuan Perusahaan</label>
                    <div class="col-sm-10">
                        <select class="form-control" type="text" id="pemilikkendaraan" name="perusahaan">
                            <?php foreach (ambilSemuaPerusahaan() as $value) { ?>
                                <option value="<?php echo $value['nama_perusahaan'] ?>"><?php echo $value['nama_perusahaan'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>    
                <div class="form-group">
                    <label for="Keterangan" class="col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="keterangan" type="text" id="keterangan" onkeypress="insert(event)" placeholder="Keterangan">
                    </div>
                </div>
                <div>
                    <div class="col-sm-offset-5 col-sm-1">
                        <button type="submit" name="ubahstatuskendaraan" class="btn btn-success" onclick="submitSopir()">Simpan</button>
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="btn btn-danger" onclick="window.history.back()">Batal</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12" style="margin-top: 10px">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-md-11">
                        <div class="form-group">
                            <input class="form-control" name="search" type="text">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <input class="btn btn-success" type="submit" value="Search"></input>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-12">
            <table class="table table-striped">
                <tr>
                    <th>No Kendaraan</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                </tr>
                <?php foreach (ambilSemuaKendaraan() as $value) { ?>
                    <tr onclick="changeOption('pemilikkendaraan', '<?php echo $value['no_kendaraan'] ?>', '<?php echo $value['no_kendaraan'] ?>')">
                        <td><?php echo $value['no_kendaraan'] ?></td>
                        <td><?php echo $value['status_kendaraan'] ?></td>
                        <td><?php echo $value['keterangan_kendaraan'] ?></td>
                    </tr>
                <?php } ?>
            </table>

            <p>Mobil Baik : <?php echo jumlahkendaraanyangtersedia() ?> </p>
            <p>Mobil Rusak : <?php echo ambilKendaraanYangDalamKeadaanRusak() ?></p>
            <p>Mobil Sedang Beroperasi : <?php echo ambilKendaraanYangDalamKeadaanBeroperasi() ?></p>
        </div>
    </div>
</div>

<script>
    function deleteTonase() {
        var form = document.getElementById('deleteTonase');

        if (confirm('Anda yakin dengan data ini?')) {
            form.submit();
        }
    }

    function changeOption(nama, value, text) {
        var ob = document.getElementById(nama).options[0];
        ob.value = value;
        ob.text = text;
    }

    function insert(event) {
        if (event.keyCode === 13) {
            var form = document.getElementById('Tonase');
            form.submit();
        }
    }
</script>
<script type="text/javascript">

    $().ready(function () {
        $("#tanggal").datepicker({
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