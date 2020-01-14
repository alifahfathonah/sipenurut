<?php $no = 1; ?>
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Detail Lengkap Guru</h3>&nbsp;&nbsp;
        <button class="btn btn-success btn-xs notactive" id="editdata">Edit Data</button>
        <div class="card-tools">
            <a href="<?= base_url('admin/murid') ?>">Kembali</a>&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
    </div>
    <!-- /.card-header -->
    <form action="<?= base_url('admin/murid/update/') ?>" method="POST" id="formData">
        <input type="hidden" value="<?= $murid->id ?>" name="id">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Murid</label>
                        <input type="text" required class="form-control" value="<?= $murid->nm_murid ?>" name="nm_murid">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jns_kel" required="">
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option <?= ($murid->jns_kel == "Laki-laki") ? "selected" : "" ?>>Laki-laki</option>
                            <option <?= ($murid->jns_kel == "Perempuan") ? "selected" : "" ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" required class="form-control" value="<?= $murid->tmpt_lahir ?>" name="tmpt_lahir">
                    </div>
                    <div class="form-group">
                        <label for="nama">Tanggal Lahir</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" required id="tanggal" value="<?= $murid->tgl_lahir ?>" name="tgl_lahir">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="3" name="alamat" required><?= $murid->alamat ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <select class="form-control" name="agama" required="">
                            <option <?= ($murid->agama == "Islam") ? "selected" : "" ?>>Islam</option>
                            <option <?= ($murid->agama == "Kristen") ? "selected" : "" ?>>Kristen</option>
                            <option <?= ($murid->agama == "Katolik") ? "selected" : "" ?>>Katolik</option>
                            <option <?= ($murid->agama == "Buddha") ? "selected" : "" ?>>Buddha</option>
                            <option <?= ($murid->agama == "Hindu") ? "selected" : "" ?>>Hindu</option>
                            <option <?= ($murid->agama == "Konghucu") ? "selected" : "" ?>>Konghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nomor Handphone / WA</label>
                        <div class="input-group">
                            <input type="text" required class="form-control" value="<?= $murid->no_hp ?>" name="no_hp">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                            <input type="text" id="email" required class="form-control" value="<?= $murid->email ?>" name="email">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5>Daftar Permintaan</h5>
                    <hr>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Guru</th>
                                <th>Jumlah Hari</th>
                                <th style="width: 40px">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($permintaan as $p) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $p->nm_guru ?></td>
                                    <td><?= $p->jumlah ?> Hari/Minggu</td>
                                    <td><?= $p->status ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
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
        $('#muridmenu').addClass('active');

        $('#tanggal').datepicker({
            format: 'yyyy-mm-dd'
        })

        $('#formData :input').prop("disabled", true);

        $('#editdata').on('click', function() {
            $('#resetbtn').trigger('click');
            if ($('#editdata').text() == "Edit Data") {
                $('#formData :input').prop("disabled", false);
                $('#editdata').text('Cancel');
                $('#formData #email').prop("disabled", true);
                $('#editdata').removeClass();
                $('#editdata').addClass('btn btn-danger btn-xs active');
            } else if ($('#editdata').text() == "Cancel") {
                $('#formData :input').prop("disabled", true);
                $('#formData #email').prop("disabled", true);
                $('#editdata').text('Edit Data');
                console.log('jalan');
                $('#editdata').removeClass();
                $('#editdata').addClass('btn btn-success btn-xs notactive');
            }
        })
    })
</script>