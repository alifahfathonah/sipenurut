<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Detail Lengkap Guru</h3>&nbsp;&nbsp;
        <button class="btn btn-success btn-xs notactive" id="editdata">Edit Data</button>
        <div class="card-tools">
            <a href="<?= base_url('admin/guru') ?>">Kembali</a>&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
    </div>
    <!-- /.card-header -->
    <form action="<?= base_url('admin/guru/update/') ?>" method="POST" id="formData" enctype="multipart/form-data">
        <input type="hidden" value="<?= $guru->guruid ?>" name="id">
        <input type="hidden" value="<?= $guru->nilai ?>" name="nilai_lama">
        <input type="hidden" value="<?= $guru->ijazah ?>" name="ijazah_lama">
        <input type="hidden" value="<?= $guru->foto ?>" name="foto_lama">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <input type="text" required class="form-control" value="<?= $guru->nm_guru ?>" name="nama">
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
                        <input type="text" required class="form-control" value="<?= $guru->tmpt_lahir ?>" name="tmpt_lahir">
                    </div>
                    <div class="form-group">
                        <label for="nama">Tanggal Lahir</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" required id="tanggal" value="<?= $guru->tgl_lahir ?>" name="tgl_lahir">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="3" name="alamat" required><?= $guru->alamat ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <select class="form-control" name="agama" required="">
                            <option <?= ($guru->agama == "Islam") ? "selected" : "" ?>>Islam</option>
                            <option <?= ($guru->agama == "Kristen") ? "selected" : "" ?>>Kristen</option>
                            <option <?= ($guru->agama == "Katolik") ? "selected" : "" ?>>Katolik</option>
                            <option <?= ($guru->agama == "Buddha") ? "selected" : "" ?>>Buddha</option>
                            <option <?= ($guru->agama == "Hindu") ? "selected" : "" ?>>Hindu</option>
                            <option <?= ($guru->agama == "Konghucu") ? "selected" : "" ?>>Konghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jenjang</label>
                        <select class="form-control" name="jenjang" id="jenjang" required="">
                            <option <?= ($guru->jenjang == "SD") ? "selected" : "" ?>>SD</option>
                            <option <?= ($guru->jenjang == "SMP") ? "selected" : "" ?>>SMP</option>
                            <option <?= ($guru->jenjang == "SMA") ? "selected" : "" ?>>SMA</option>
                        </select>
                    </div>
                    <div class="form-group" id="jurusanhtml" style="display: none;">
                        <label>Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                            <option disabled="" value="" selected="">Pilih Jurusan</option>
                            <option <?= ($guru->jurusan == "IPA") ? "selected" : "" ?>>IPA</option>
                            <option <?= ($guru->jurusan == "IPS") ? "selected" : "" ?>>IPS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Wilayah</label>
                        <select class="form-control" name="wilayah">
                            <option value="<?= $guru->wilayahid ?>"><?= $guru->kota . '/' . $guru->provinsi ?></option>
                            <?php foreach ($wilayah as $w) : ?>
                                <option value="<?= $w->id ?>"><?= $w->kota . '/' . $w->provinsi ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nomor Handphone / WA</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+62</span>
                            </div>
                            <input type="text" required class="form-control" value="<?= $guru->no_hp ?>" name="no_hp">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" rows="3" name="deskripsi" required><?= $guru->deskripsi ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Verifikasi</label>
                        <select class="form-control" name="verifikasi">
                            <option <?= ($guru->verifikasi == "Belum Terverifikasi") ? "selected" : "" ?>>Belum Terverifikasi</option>
                            <option <?= ($guru->verifikasi == "Terverifikasi") ? "selected" : "" ?>>Terverifikasi</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pendidikan Terakhir</label>
                        <select class="form-control" name="pddterakhir" id="pddterakhir" required="">
                            <option <?= ($guru->pddterakhir == "Sedang Kuliah") ? "selected" : "" ?>>Sedang Kuliah</option>
                            <option <?= ($guru->pddterakhir == "D3") ? "selected" : "" ?>>D3</option>
                            <option <?= ($guru->pddterakhir == "S1/D4") ? "selected" : "" ?>>S1/D4</option>
                            <option <?= ($guru->pddterakhir == "S2") ? "selected" : "" ?>>S2</option>
                            <option <?= ($guru->pddterakhir == "S3") ? "selected" : "" ?>>S3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" required class="form-control" required value="<?= $guru->jurusanpdd ?>" name="jurusanpdd">
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
                    <div class="form-group">
                        <label>Foto</label>
                        <div class="input-group">
                            <a href="<?= base_url('assets/img/foto/') . $guru->foto ?>" target="blank"><img class="img-thumbnail" width="200" src="<?= base_url('assets/img/foto/') . $guru->foto ?>" alt=""></a> &nbsp;&nbsp;
                            <input type="file" accept="image/png, .jpeg, .jpg, .bmp, image/gif" name="foto" class="file-input" id="exampleInputFile">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="sumbit" class="btn btn-primary">Simpan</button>&nbsp;&nbsp;
            <button type="reset" id="resetbtn" class="btn btn-default">Reset</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#gurumenu').addClass('active');

        setInterval(function() {
            jenjangfunc();
            pddterakhir();
        }, 100);

        $('#tanggal').datepicker({
            format: 'yyyy-mm-dd'
        })

        $('#formData :input').prop("disabled", true);

        $('#editdata').on('click', function() {
            $('#resetbtn').trigger('click');
            if ($('#editdata').text() == "Edit Data") {
                $('#formData :input').prop("disabled", false);
                $('#editdata').text('Cancel');
                $('#editdata').removeClass();
                $('#editdata').addClass('btn btn-danger btn-xs active');
            } else if ($('#editdata').text() == "Cancel") {
                $('#formData :input').prop("disabled", true);
                $('#editdata').text('Edit Data');
                console.log('jalan');
                $('#editdata').removeClass();
                $('#editdata').addClass('btn btn-success btn-xs notactive');
            }
        })

        $('#resetbtn').on('click', function() {
            setInterval(function() {
                jenjangfunc();
                pddterakhir();
            }, 100);
        });

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

        function pddterakhir() {
            pdd = $('#pddterakhir').val();

            if (pdd == "Sedang Kuliah") {
                $('#ijazahhtml').attr('style', 'display: none;');
            } else {
                $('#ijazahhtml').attr('style', 'display: block;');
            }
        }

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
    })
</script>