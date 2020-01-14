<?php $no = 1; ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Murid</h3>
    </div>
    <div class="card-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 10px;">No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Email</th>
                    <th style="width: 150px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($murid as $m) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $m->nm_murid ?></td>
                        <td><?= $m->jns_kel ?></td>
                        <td><?= $m->alamat ?></td>
                        <td><?= $m->no_hp ?></td>
                        <td><?= $m->email ?></td>
                        <td><a class="btn btn-primary" href="<?= base_url('admin/murid/detail/') . $m->id ?>">Detail</a>
                            <a href="<?= base_url('admin/murid/delete/') . $m->id ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#muridmenu').addClass('active');

        $('#table').DataTable({
            responsive: true,
        });
    })
</script>