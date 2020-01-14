<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Detail Lengkap Guru&nbsp;</h3>
        <h3 class="card-title" id="statusverif">(<?= $status ?>)</h3>
        <div class="card-tools">
            <a href="<?= base_url('admin/verifikasi') ?>">Kembali</a>&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
    </div>
    <div class="card-body">
        <form id="formData">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <input type="text" required class="form-control" value="<?= $guru->nm_guru ?>" name="nama">
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
                    <div class="form-group" style="display: none;" id="jurusanhtml">
                        <label>Jurusan Ajar</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                            <option disabled="" value="" selected=""></option>
                            <option <?= ($guru->jurusan == "IPA") ? "selected" : "" ?>>IPA</option>
                            <option <?= ($guru->jurusan == "IPS") ? "selected" : "" ?>>IPS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Wilayah</label>
                        <select class="form-control" name="wilayah">
                            <option value="<?= $guru->wilayahid ?>"><?= $guru->kota . '/' . $guru->provinsi ?></option>
                        </select>
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
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nilai Terakhir</label>
                        <div class="input-group">
                            <a href="<?= base_url('assets/img/nilai/') . $guru->nilai ?>" target="blank"><img class="img-thumbnail" width="200" src="<?= base_url('assets/img/nilai/') . $guru->nilai ?>" alt=""></a> &nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <div class="input-group">
                            <a href="<?= base_url('assets/img/foto/') . $guru->foto ?>" target="blank"><img class="img-thumbnail" width="200" src="<?= base_url('assets/img/foto/') . $guru->foto ?>" alt=""></a> &nbsp;&nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <form method="post" id="confirmForm" action="<?= base_url('admin/verifikasi/process') ?>">
            <input type="hidden" name="id" value="<?= $guru->guruid ?>">
            <input type="submit" name="submitform" onclick="return confirm('Anda yakin ingin menerima guru ini?');" value="Terima" class="btn btn-success">
            <input type="submit" name="submitform" onclick="return confirm('Anda yakin ingin menolak guru ini?');" value="Tolak" id="resetbtn" class="btn btn-danger">
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#verifikasimenu').addClass('active');

        $('#formData :input').prop("disabled", true);

        setTimeout(function() {
            jenjangfunc();
            pddterakhir();
            status();
        }, 100);

        function status() {
            stat = $('#statusverif').text();
            if ((stat == "(Tolak)") || (stat == "(Terima)")) {
                $('#confirmForm :input').prop("disabled", true);
            }
        }

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

    })
</script>