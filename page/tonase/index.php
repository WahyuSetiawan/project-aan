<div class="col-md-12">
    <div class="row">
        <h2>Halaman Admin Tonase</h2>
        <div class="col-md-12">
            <button onclick="history.back()" class="btn btn-success">Back</button>
            <br>
            <form class="form-horizontal" id="Tonase" action="?page=<?php echo $_GET['page'] ?>" method="post">
                <input type="hidden" name="tambahtonase" value="982374">
                <div class="form-group">
                    <label for="nokendaraan" class="col-sm-2 control-label">Tanggal</label>
                    <div class="col-sm-4">
                        <input class="form-control" name="tanggal" value="<?php
                        date_default_timezone_set("Asia/Jakarta");
                        echo date("Y-m-d")
                        ?>" type="text" id="tanggal" placeholder="No Tonase (dapat dikosongkan)">
                    </div> 
                    <label for="jeniskendaraan" class="col-sm-1 control-label">Perusahaan  </label>
                    <div class="col-sm-5">
                        <select class="form-control" name="perusahaan" type="text" id="jeniskendaraan" >
                            <?php foreach (ambilSemuaPerusahaan() as $value) { ?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['nama_perusahaan'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="uangjalan" class="col-sm-2 control-label">Tujuan</label>
                    <div class="col-sm-10">
                        <select class="form-control" type="text" name="tujuan" id="uangjalan" placeholder="Tujuan" value="WINA">
                            <option>WINA</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pemilikkendaraan" class="col-sm-2 control-label">Jenis Tarikan</label>
                    <div class="col-sm-10">
                        <select class="form-control" type="text" id="pemilikkendaraan" name="jenistarikan">
                            <option>Jauh</option>
                            <option>Dekat</option>
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
                    <label for="uangjalan" class="col-sm-2 control-label">Bruto</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="bruto_text" type="text" onkeyup="filltonase()" name="bruto" id="uangjalan" placeholder="Bruto">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Tonase" class="col-sm-2 control-label">Tarra</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="tarra_text" name="tarra" onkeyup="filltonase()" type="text" id="Tonase" placeholder="Tarra">
                    </div>
                </div>
                <div class="form-group">
                    <label for="uangjalan" class="col-sm-2 control-label">Uang Jalan</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="uangjalan" id="uangjalan" placeholder="Uang Jalan">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Tonase" class="col-sm-2 control-label">Tonase</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="tonase_text" name="tonase" type="text" id="Tonase" placeholder="Tonase">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Keterangan" class="col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="keterangan" type="text" id="Ketererangan" onkeypress="insert(event)" placeholder="Keterangan">
                    </div>
                </div>
                <div>
                    <div class="col-sm-12" style="text-align: center">
                        <button type="submit" class="btn btn-success" onclick="submittonase()">Simpan</button>
                        <button type="button" class="btn btn-danger">Batal</button>
                    </div>
                </div>
                <div>
                    <div class="col-sm-1" style="margin-top: 20px">
                        <button type="button" class="btn btn-danger" onclick="window.history.back()">Batal</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12" style="margin-top: 10px">
            <form class="form-horizontal" style="margin-bottom: 20px" method="post" action="?page=<?php echo $_GET['page'] ?>">
                <div>
                    <div class="col-sm-10" style="text-align: center">
                        <input type="text" name="caritext" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" name="caributton" class="btn btn-success">Cari</button>
                    </div>
                </div>
            </form>
            <table class="table table-striped">
                <tr>
                    <th>Tanggal</th>
                    <th>Perusahaan</th>
                    <th>Jenis Tarikan</th>
                    <th>Sopir</th>
                    <th>Uang Jalan</th>
                    <th>Tonase</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
                <?php
                if (!isset($_POST['caributton'])) {
                    $a = ambilSemuaTonase();
                } else {
                    $where = "perusahaan.nama_perusahaan like '%" . $_POST['caritext'] . "%' or sopir.nama like '%" . $_POST['caritext'] . "%' or tonase.keterangan like '%" . $_POST['caritext'] . "%'";
                    $a = ambilSemuaTonasedengansyarat($where);
                }

                foreach ($a as $value) {
                    ?>
                    <tr>
                        <td><?php echo $value['tanggal'] ?></td>
                        <td><?php echo ambilPerusahaan($value['perusahaan'])['nama_perusahaan'] ?></td>
                        <td><?php echo $value['jenis_tarikan'] ?></td>
                        <td><?php echo ambilSopir($value['sopir'])['nama'] ?></td>
                        <td><?php echo $value['uangjalan'] ?></td>
                        <td><?php echo $value['tonase'] ?></td>
                        <td><?php echo $value['keterangan'] ?></td>
                        <td>
                            <form id="deleteTonase" action="?page=<?php echo $_GET['page'] ?>" method="post">
                                <a href="" class="btn btn-warning">Edit</a>
                                <button type="submit" name="deleteTonase" value="<?php echo $value['id'] ?>" onsubmit="deleteTonase()" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<script>
    function submittonase() {
        $("#Tonase").validate({
            rules: {
                tanggal: {
                    required: true
                },
                perusahaan: {
                    required: true
                },
                tujuan: {
                    required: true
                },
                jenistarikan: {
                    required: true
                },
                sopir: {
                    required: true
                },
                tarra: {
                    required: true,
                    number: true
                },
                uangjalan: {
                    required: true
                },
                tonase: {
                    required: true
                },
                bruto: {
                    required: true,
                    number: true
                }
            },
            messages: {
                tanggal: {
                    required: "Tanggal harus diisi"
                },
                perusahaan: {
                    required: "Perusahaan harus ada"
                },
                tujuan: {
                    required: "Tujuan harus diisi"
                },
                jenistarikan: {
                    required: "Jenis tarikan harus diisi"
                },
                sopir: {
                    required: "Sopir harus diisi"
                },
                tarra: {
                    required: "Tarra harus diisi",
                    number: "Tarra harus number"
                },
                uangjalan: {
                    required: "Uang jalan harus diisi"
                },
                tonase: {
                    required: "tonase harus diisi",
                    number: "Tonase harus number"
                },
                bruto: {
                    required: "Bruto Harus diisi",
                    number: "Bruto harus number"
                }
            }
        });
    }

    function insert(event) {
        if (event.keyCode === 13) {
            submittonase();
        }
    }

    function filltonase() {
        var bruto = parseInt(document.getElementById('bruto_text').value);
        var tarra = parseInt(document.getElementById('tarra_text').value);

        var tonase = document.getElementById('tonase_text');
        tonase.value = bruto + tarra;
        if (tonase.value === 'NaN') {
            tonase.value = 0;
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