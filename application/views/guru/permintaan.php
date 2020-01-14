<?php $no = 1; ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Permintaan</h3>
    </div>
    <div class="card-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 10px;">No</th>
                    <th>Nama Murid</th>
                    <th>Di Minta Tanggal</th>
                    <th>Pertemuan</th>
                    <th style="width: 250px;">Hari</th>
                    <th>Status</th>
                    <th style="width: 50px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($permintaan as $p) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->nm_murid ?></td>
                        <td><?= $p->tgl ?></td>
                        <td><?= $p->jumlah ?> Kali/Minggu</td>
                        <td><?= $p->hari ?></td>
                        <td><?= $p->status ?></td>
                        <td><a class="btn btn-primary" href="<?= base_url('guru/permintaan/detail/') . $p->permintaanid ?>">Detail</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#gurupermintaan').addClass('active');

        $('#table').DataTable({
            responsive: true,
        });
    })
</script>