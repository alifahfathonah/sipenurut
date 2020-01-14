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
                    <th style="width: 200px;">Nama Murid</th>
                    <th style="width: 70px;">Tanggal Mulai</th>
                    <th style="width: 70px;">Tanggal Selesai</th>
                    <th>Pertemuan</th>
                    <th>Hari</th>
                    <th>Status</th>
                    <th style="width: 50px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($murid as $m) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $m->nm_murid ?></td>
                        <td><?= $m->tgl_mulai ?></td>
                        <td><?= $m->tgl_selesai ?></td>
                        <td><?= $m->jumlah ?> Kali/Minggu</td>
                        <td><?= $m->hari ?></td>
                        <td><?= $m->ajarstatus ?></td>
                        <td><a class="btn btn-primary" href="<?= base_url('guru/murid/detail/') . $m->ajarid ?>">Detail</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#gurumurid').addClass('active');

        $('#table').DataTable({
            responsive: true,
        });
    })
</script>