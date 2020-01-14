<?php $no = 1; ?>
<div class="row">
    <div class="col-md-3">
        <button style="margin-bottom: 10px;" type="button" class="btn btn-primary" id="tambah" data-toggle="modal" data-target="#modal">
            Tambah Data
        </button>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Wilayah</h3>
    </div>
    <div class="card-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 10px;">No</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th style="width: 150px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($wilayah as $w) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $w->provinsi ?></td>
                        <td><?= $w->kota ?></td>
                        <td><button class="edit btn btn-primary" name="edit" id="<?= $w->id ?>">Edit</button>
                            <a href="<?= base_url('admin/wilayah/delete/') . $w->id ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
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
                        <label for="provinsi_id">Provinsi</label>
                        <input type="text" required class="form-control" name="provinsi" id="provinsi_id" placeholder="Masukan Provinsi">
                    </div>
                    <div class="form-group">
                        <label for="kota_id">Kota</label>
                        <input type="text" required class="form-control" name="kota" id="kota_id" placeholder="Masukan Provinsi">
                    </div>
                    <input type="hidden" name="id" id="hidden_id">
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
        $('#wilayahmenu').addClass('active');

        $('#table').DataTable({
            responsive: true
        });

        $('#tambah').on('click', function() {
            $('#formModal').attr('action', '<?= base_url('admin/wilayah/insert') ?>');
            $('#formModal')[0].reset();
            $('.modal-title').text("Tambah Data");
        });

        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');
            console.log('OK')
            $.ajax({
                url: "<?= base_url('admin/wilayah/edit/') ?>" + id,
                dataType: "json",
                success: function(html) {
                    console.log(html.provinsi);
                    $('#provinsi_id').val(html.provinsi);
                    $('#kota_id').val(html.kota);
                    $('#hidden_id').val(html.id);
                    $('.modal-title').text("Edit Data");
                    $('#formModal').attr('action', '<?= base_url('admin/wilayah/update') ?>')
                    $('#modal').modal('show');
                }
            })
        })
    })
</script>