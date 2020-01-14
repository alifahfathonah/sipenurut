<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/foto/') . $this->session->userdata('foto') ?>" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $this->session->userdata('nama') ?></h3>

                <p class="text-muted text-center"><?= ucwords($this->session->userdata('level')) ?> <aa <?= $guru->verifikasi == 'Terverifikasi' ? "style='color: #18f500;'" : "style='color: red;'"; ?>>(<?= $guru->verifikasi ?>)</aa>
                </p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b><a href="<?= base_url('guru/permintaan') ?>"> Permintaan Murid</b> <a class="float-right"><?= $permintaan ?></a></a>
                    </li>
                    <li class="list-group-item">
                        <b><a href="<?= base_url('guru/murid') ?>"> Murid Aktif</b> <a class="float-right"><?= $muridaktif ?></a></a>
                    </li>
                    <li class="list-group-item">
                        <b><a href="<?= base_url('guru/murid') ?>">Murid Selesai</b> <a class="float-right"><?= $muridselesai ?></a></a>
                    </li>
                </ul>

                <?php if ($guru->verifikasi == "Belum Terverifikasi" || $guru->verifikasi == "Permintaan Ditolak") : ?>
                    <a href="<?= base_url('guru/dashboard/verif') ?>" class="btn btn-success btn-block"><b>Ajukan Verifikasi</b></a>
                <?php endif ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tentang Saya</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Pendidikan</strong>

                <p class="text-muted">
                    <?= $guru->pddterakhir != null ? $guru->jurusanpdd . " / " . $guru->pddterakhir : "Data belum lengkap" ?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Wilayah Ajar</strong>

                <p class="text-muted"><?= $wilayah != null ? $wilayah->kota . " / " . $wilayah->provinsi : "Belum memilih wilayah" ?></p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Alamat</strong>

                <p class="text-muted"><?= $guru->alamat != null ? $guru->alamat : "Data belum lengkap" ?></p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#pribadi" data-toggle="tab">Data Pribadi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pendidikan" data-toggle="tab">Pendidikan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
                    <li class="nav-item"><a class="nav-link" href="#lainnya" data-toggle="tab">Lainnya</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="pribadi">
                        <form action="<?= base_url('guru/dashboard/datapribadi') ?>" method="POST" enctype="multipart/form-data" id="formPribadi">
                            <input type="hidden" value="<?= $guru->foto ?>" name="foto_lama">
                            <div class="form-group">
                                <label>Nama Guru</label>
                                <input type="text" placeholder="Masukan nama" required class="form-control" value="<?= $guru->nm_guru ?>" name="nama">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jns_kel" required="">
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option <?= ($guru->jns_kel == "Laki-laki") ? "selected" : "" ?>>Laki-laki</option>
                                    <option <?= ($guru->jns_kel == "Perempuan") ? "selected" : "" ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" placeholder="Masukan tempat lahir" required class="form-control" value="<?= $guru->tmpt_lahir ?>" name="tmpt_lahir">
                            </div>
                            <div class="form-group">
                                <label for="nama">Tanggal Lahir</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" placeholder="Masukan tanggal lahir" class="form-control" required id="tanggal" value="<?= $guru->tgl_lahir ?>" name="tgl_lahir">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" placeholder="Masukan alamat" rows="3" name="alamat" required><?= $guru->alamat ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Agama</label>
                                <select class="form-control" name="agama" required="">
                                    <option value="" selected disabled>Pilih Agama</option>
                                    <option <?= ($guru->agama == "Islam") ? "selected" : "" ?>>Islam</option>
                                    <option <?= ($guru->agama == "Kristen") ? "selected" : "" ?>>Kristen</option>
                                    <option <?= ($guru->agama == "Katolik") ? "selected" : "" ?>>Katolik</option>
                                    <option <?= ($guru->agama == "Buddha") ? "selected" : "" ?>>Buddha</option>
                                    <option <?= ($guru->agama == "Hindu") ? "selected" : "" ?>>Hindu</option>
                                    <option <?= ($guru->agama == "Konghucu") ? "selected" : "" ?>>Konghucu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nomor Handphone / WA</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+62</span>
                                    </div>
                                    <input type="text" id="no_hp" required class="form-control" value="<?= $guru->no_hp ?>" placeholder="Masukan Nomor Hp atau Nomor Whatsapp" name="no_hp">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi (Jelaskan Tentang Dirimu)</label>
                                <textarea class="form-control" rows="3" name="deskripsi" required><?= $guru->deskripsi ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <div class="input-group">
                                    <a href="<?= base_url('assets/img/foto/') . $guru->foto ?>" target="blank"><img class="img-thumbnail" width="200" src="<?= base_url('assets/img/foto/') . $guru->foto ?>" alt=""></a> &nbsp;&nbsp;
                                    <input type="file" accept="image/png, .jpeg, .jpg, .bmp, image/gif" name="foto" class="file-input" id="exampleInputFile">
                                </div>
                            </div>
                            <hr>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" id="resetbtn1" class="btn btn-default">Reset</button>
                            </div>
                            <button type="button" class="btn btn-success" id="editdata1">Edit Data</button>
                        </form>
                    </div>
                    <div class="tab-pane" id="pendidikan">
                        <form action="<?= base_url('guru/dashboard/datapendidikan') ?>" method="POST" enctype="multipart/form-data" id="formPendidikan">
                            <input type="hidden" value="<?= $guru->nilai ?>" name="nilai_lama">
                            <input type="hidden" value="<?= $guru->ijazah ?>" name="ijazah_lama">
                            <div class="form-group">
                                <label>Pendidikan Terakhir</label>
                                <select class="form-control" name="pddterakhir" id="pddterakhir" required="">
                                    <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                                    <option <?= ($guru->pddterakhir == "Sedang Kuliah") ? "selected" : "" ?>>Sedang Kuliah</option>
                                    <option <?= ($guru->pddterakhir == "D3") ? "selected" : "" ?>>D3</option>
                                    <option <?= ($guru->pddterakhir == "S1/D4") ? "selected" : "" ?>>S1/D4</option>
                                    <option <?= ($guru->pddterakhir == "S2") ? "selected" : "" ?>>S2</option>
                                    <option <?= ($guru->pddterakhir == "S3") ? "selected" : "" ?>>S3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="text" required placeholder="Tulis jurusan" class="form-control" required value="<?= $guru->jurusanpdd ?>" name="jurusanpdd">
                            </div>
                            <div class="form-group" id="ijazahhtml">
                                <label>Ijazah</label>
                                <div class="input-group">
                                    <a href="<?= base_url('assets/img/ijazah/') . $guru->ijazah ?>" target="blank"><img class="img-thumbnail" width="200" src="<?= base_url('assets/img/ijazah/') . $guru->ijazah ?>" alt=""></a> &nbsp;&nbsp;
                                    <input type="file" accept="image/png, .jpeg, .jpg, .bmp, image/gif" name="ijazah" id="ijazah" class="file-input" id="exampleInputFile">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nilai Terakhir</label>
                                <div class="input-group">
                                    <a href="<?= base_url('assets/img/nilai/') . $guru->nilai ?>" target="blank"><img class="img-thumbnail" width="200" src="<?= base_url('assets/img/nilai/') . $guru->nilai ?>" alt=""></a> &nbsp;&nbsp;
                                    <input type="file" accept="image/png, .jpeg, .jpg, .bmp, image/gif" name="nilai" class="file-input" id="exampleInputFile">
                                </div>
                            </div>
                            <hr>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" id="resetbtn2" class="btn btn-default">Reset</button>
                            </div>
                            <button type="button" class="btn btn-success float-left" id="editdata2">Edit Data</button>
                        </form>
                    </div>

                    <div class="tab-pane" id="password">
                        <form action="<?= base_url('guru/dashboard/password') ?>" method="POST">
                            <div class="form-group">
                                <label>Password Lama</label>
                                <input type="password" name="passlama" required class="form-control" placeholder="Password lama">
                            </div>
                            <div class="form-group">
                                <label>Password Baru</label>
                                <div class="input-group mb-3">
                                    <input type="password" minlength="6" id="password1" name="passbaru" required class="form-control" placeholder="Password baru">
                                    <div class="input-group-append">
                                        <button type="button" id="passwordtrigger" class="input-group-text">
                                            <span id="eye" class="fas fa-eye"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="lainnya">
                        <form action="<?= base_url('guru/dashboard/lainnya') ?>" method="POST" id="formLainnya">
                            <div class="form-group">
                                <label>Jenjang</label>
                                <select class="form-control" name="jenjang" id="jenjang" required="">
                                    <option value="" selected disabled>Pilih Jenjang</option>
                                    <option <?= ($guru->jenjang == "SD") ? "selected" : "" ?>>SD</option>
                                    <option <?= ($guru->jenjang == "SMP") ? "selected" : "" ?>>SMP</option>
                                    <option <?= ($guru->jenjang == "SMA") ? "selected" : "" ?>>SMA</option>
                                </select>
                            </div>
                            <div class="form-group" id="jurusanhtml" style="display: none;">
                                <label>Jurusan</label>
                                <select class="form-control" name="jurusan" id="jurusan">
                                    <option value="" disabled="" selected="">Pilih Jurusan</option>
                                    <option <?= ($guru->jurusan == "IPA") ? "selected" : "" ?>>IPA</option>
                                    <option <?= ($guru->jurusan == "IPS") ? "selected" : "" ?>>IPS</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Wilayah</label>
                                <select class="form-control" required name="wilayah">
                                    <?php if ($wilayah == null) : ?>
                                        <option value="" disabled="" selected="">Pilih Wilayah</option>
                                    <?php else : ?>
                                        <option value="<?= $wilayah->id ?>"><?= $wilayah->kota . '/' . $wilayah->provinsi ?></option>
                                    <?php endif ?>
                                    <?php foreach ($wilayah1 as $w) : ?>
                                        <option value="<?= $w->id ?>"><?= $w->kota . '/' . $w->provinsi ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <hr>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" id="resetbtn3" class="btn btn-default">Reset</button>
                            </div>
                            <button type="button" class="btn btn-success float-left" id="editdata3">Edit Data</button>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#gurudashboard').addClass('active');

        $('#tanggal').datepicker({
            format: 'yyyy-mm-dd'
        })

        $('#formPribadi :input').prop("disabled", true);
        $('#formPribadi #editdata1').prop("disabled", false);

        $('#editdata1').on('click', function() {
            $('#resetbtn1').trigger('click');
            if ($('#editdata1').text() == "Edit Data") {
                $('#formPribadi :input').prop("disabled", false);
                $('#editdata1').text('Cancel');
                $('#editdata1').removeClass();
                $('#editdata1').addClass('btn btn-danger active');
                $('#formPribadi #editdata1').prop("disabled", false);
            } else if ($('#editdata1').text() == "Cancel") {
                $('#formPribadi :input').prop("disabled", true);
                $('#editdata1').text('Edit Data');
                console.log('jalan');
                $('#editdata1').removeClass();
                $('#editdata1').addClass('btn btn-success notactive');
                $('#formPribadi #editdata1').prop("disabled", false);
            }
        })

        $('#formPendidikan :input').prop("disabled", true);
        $('#formPendidikan #editdata2').prop("disabled", false);

        $('#editdata2').on('click', function() {
            $('#resetbtn2').trigger('click');
            if ($('#editdata2').text() == "Edit Data") {
                $('#formPendidikan :input').prop("disabled", false);
                $('#editdata2').text('Cancel');
                $('#editdata2').removeClass();
                $('#editdata2').addClass('btn btn-danger active');
                $('#formPendidikan #editdata2').prop("disabled", false);
            } else if ($('#editdata2').text() == "Cancel") {
                $('#formPendidikan :input').prop("disabled", true);
                $('#editdata2').text('Edit Data');
                console.log('jalan');
                $('#editdata2').removeClass();
                $('#editdata2').addClass('btn btn-success notactive');
                $('#formPendidikan #editdata2').prop("disabled", false);
            }
        })

        $('#formLainnya :input').prop("disabled", true);
        $('#formLainnya #editdata3').prop("disabled", false);

        $('#editdata3').on('click', function() {
            $('#resetbtn3').trigger('click');
            if ($('#editdata3').text() == "Edit Data") {
                $('#formLainnya :input').prop("disabled", false);
                $('#editdata3').text('Cancel');
                $('#editdata3').removeClass();
                $('#editdata3').addClass('btn btn-danger active');
                $('#formLainnya #editdata3').prop("disabled", false);
            } else if ($('#editdata3').text() == "Cancel") {
                $('#formLainnya :input').prop("disabled", true);
                $('#editdata3').text('Edit Data');
                console.log('jalan');
                $('#editdata3').removeClass();
                $('#editdata3').addClass('btn btn-success notactive');
                $('#formLainnya #editdata3').prop("disabled", false);
            }
        })

        setInterval(function() {
            jenjangfunc();
            pddterakhir();
        }, 100);

        $('#resetbtn2').on('click', function() {
            setInterval(function() {
                jenjangfunc();
                pddterakhir();
            }, 100);
        });


        function pddterakhir() {
            pdd = $('#pddterakhir').val();

            if (pdd == "Sedang Kuliah") {
                $('#ijazahhtml').attr('style', 'display: none;');
            } else {
                $('#ijazahhtml').attr('style', 'display: block;');
            }
        }

        function jenjangfunc() {
            jenjang = $('#jenjang').val();

            if (jenjang == "SMA") {
                $('#jurusanhtml').attr('style', 'display: block;');
            }
        }

        $('#jenjang').on('change', function() {
            if ($('#jenjang').val() != "SMA") {
                $('#jurusanhtml').attr('style', 'display: none;');
                $('#jurusan').removeAttr('required');
                $('select[name="jurusan"]').val("");
            } else if ($('#jenjang').val() == "SMA") {
                $('#jurusanhtml').attr('style', 'display: block;');
                $('#jurusan').attr('required', 'required');
            }
        })

        $('#pddterakhir').on('change', function() {
            if ($('#pddterakhir').val() != "Sedang Kuliah") {
                $('#ijazahhtml').attr('style', 'display: block;');
                $('#ijazah').attr('required', 'required');
            } else if ($('#pddterakhir').val() == "Sedang Kuliah") {
                $('#ijazahhtml').attr('style', 'display: none;');
                $('#ijazah').removeAttr('required', 'required');
                $('#ijazah').val("");
            }
        })

        $('#passwordtrigger').on('click', function() {
            type = $('#password1').attr('type');
            if (type == 'password') {
                $('#password1').attr('type', 'text');
                $('#eye').removeClass();
                $('#eye').addClass('fas fa-eye-slash');
                console.log('hilang jalan');
            } else if (type == 'text') {
                $('#password1').attr('type', 'password');
                $('#eye').removeClass();
                $('#eye').addClass('fas fa-eye');
                console.log('tampil jalan');
            }
        })
    })
</script>