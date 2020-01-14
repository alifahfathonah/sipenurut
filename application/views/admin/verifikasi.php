<?php $no = 1; ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Verifikasi</h3>
    </div>
    <div class="card-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 10px;">No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th style="width: 100px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($verifikasi as $v) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $v->nm_guru ?></td>
                        <td><?= $v->tgl_update ?></td>
                        <td><?= $v->status ?></td>
                        <td>
                            <a href="<?= base_url('admin/verifikasi/detail/') . $v->verifikasiid ?>" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#verifikasimenu').addClass('active');
    })

    $('#table').DataTable({
        responsive: true
    });
</script>