<?php $no = 1; ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Guru</h3>
    </div>
    <div class="card-body">
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 10px;">No</th>
                    <th>Nama</th>
                    <th>Jenjang Ajar</th>
                    <th>Jurusan</th>
                    <th>Verifikasi</th>
                    <th>Wilayah</th>
                    <th style="width: 150px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($guru as $g) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $g->nm_guru ?></td>
                        <td><?= $g->jenjang ?></td>
                        <td><?= $g->jurusan ?></td>
                        <td><?= $g->verifikasi ?></td>
                        <td><?= $g->kota . '/' . $g->provinsi ?></td>
                        <td><a class="btn btn-primary" href="<?= base_url('admin/guru/detail/') . $g->guruid ?>">Detail</a>
                            <a href="<?= base_url('admin/guru/delete/') . $g->guruid ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#gurumenu').addClass('active');

        $('#table').DataTable({
            responsive: true,
        });
    })
</script>