<?php $no = 1; ?>
<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/foto/') . $this->session->userdata('foto') ?>" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $this->session->userdata('nama') ?></h3>

                <p class="text-muted text-center"><?= ucwords($this->session->userdata('level')) ?>
                </p>

                <hr>

                <strong><i class="fas fa-user mr-1"></i> Username</strong>
                <p class="float-right" style="display: inline;"><?= $admin->username ?></p>

            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#dataadmin" data-toggle="tab">Data Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pribadi" data-toggle="tab">Data Pribadi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="dataadmin">
                        <?php if ($this->session->userdata('level') == "superadmin") : ?>
                            <button style="margin-bottom: 10px;" type="button" class="btn btn-primary" id="tambah" data-toggle="modal" data-target="#modal">
                                Tambah Admin
                            </button>
                        <?php endif ?>
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataadmin as $w) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $w->nm_admin ?></td>
                                        <td><?= $w->username ?></td>
                                        <td><?php if ($this->session->userdata('level') == "superadmin") : ?>
                                                <button class="edit btn btn-xs btn-primary" name="edit" id="<?= $w->id ?>">Edit</button>
                                                <a href="<?= base_url('admin/dashboard/delete/') . $w->id ?>" onclick="return confirm('Anda yakin ingin menghapus admin ini?');" class="btn btn-xs btn-danger">Hapus</a>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="pribadi">
                        <form action="<?= base_url('admin/dashboard/updatepribadi') ?>" method="POST">
                            <div class="form-group">
                                <label for="provinsi_id">Nama</label>
                                <input type="text" required class="form-control" value="<?= $admin->nm_admin ?>" name="nama" placeholder="Masukan Nama">
                            </div>
                            <div class="form-group">
                                <label for="kota_id">Username</label>
                                <input type="text" disabled required class="form-control" value="<?= $admin->username ?>" name="username" placeholder="Masukan Username">
                            </div>
                            <hr>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane" id="password">
                        <form action="<?= base_url('admin/dashboard/password') ?>" method="POST">
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
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modaltitle">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="formModal">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="provinsi_id">Nama</label>
                        <input type="text" required class="form-control" name="nama" id="nama_id" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group">
                        <label for="kota_id">Username</label>
                        <input type="text" required class="form-control" name="username" id="username_id" placeholder="Masukan Username">
                    </div>
                    <input type="hidden" name="id" id="hidden_id">
                    <input type="hidden" name="status" id="statuserror">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="sumbit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    $(document).ready(function() {
        $('#dashboardmenu').addClass('active');

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

        setTimeout(function() {
            status();
            console.log('jalan');
        }, 100);

        function status() {
            stat = $('#statuserror').val();
            if ((stat == "error")) {
                $('#formModal').attr('action', '<?= base_url('admin/dashboard/insert') ?>');
                console.log(stat);
            }
        }

        $('#tambah').on('click', function() {
            $('#formModal').attr('action', '<?= base_url('admin/dashboard/insert') ?>');
            $('#formModal')[0].reset();
            $('#username_id').removeAttr('disabled');
            $('.modal-title').text("Tambah Data");
        });

        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');
            console.log('OK')
            $.ajax({
                url: "<?= base_url('admin/dashboard/edit/') ?>" + id,
                dataType: "json",
                success: function(html) {
                    console.log(html.nm_admin);
                    $('#nama_id').val(html.nm_admin);
                    $('#username_id').val(html.username);
                    $('#username_id').attr('disabled', 'disabled');
                    $('#hidden_id').val(html.id);
                    $('.modal-title').text("Edit Data");
                    $('#formModal').attr('action', '<?= base_url('admin/dashboard/update') ?>')
                    $('#modal').modal('show');
                }
            })
        })
    })
</script>