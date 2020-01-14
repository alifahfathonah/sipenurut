<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Permintaan</h3>
        <div class="card-tools">
            <a href="<?= base_url('guru/permintaan') ?>">Kembali</a>&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h4 style="text-align: center;">Detail Murid</h4>
                <table class="table table-hover">
                    <tr>
                        <td style="width: 200px;">Nama Murid</td>
                        <td style="width: 1px;">:</td>
                        <td><?= $permintaan->nm_murid ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?= $permintaan->jns_kel ?></td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>:</td>
                        <td><?= $permintaan->tmpt_lahir ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td id="tgl"><?= $permintaan->tgl_lahir ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= $permintaan->alamat ?></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td><?= $permintaan->agama ?></td>
                    </tr>
                    <tr>
                        <td>Nomor Handphone / WA</td>
                        <td>:</td>
                        <td id="no_hp1"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?= $permintaan->email ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <h4 style="text-align: center;">Detail Permintaan</h4>
                <table class="table table-hover">
                    <tr>
                        <td style="width: 230px;">Jumlah Pertemuan Perminggu</td>
                        <td style="width: 1px;">:</td>
                        <td><?= $permintaan->jumlah ?></td>
                    </tr>
                    <tr>
                        <td>Hari</td>
                        <td>:</td>
                        <td>
                            <ul style="padding: 0;" id="hari">
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Permintaan</td>
                        <td>:</td>
                        <td id="tglpermintaan"><?= $permintaan->tgl ?></td>
                    </tr>
                    <tr>
                        <td>Jam</td>
                        <td>:</td>
                        <td id="jam"></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td id="status"><?= $permintaan->status ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="float-right">
            <form id="form" action="<?= base_url('guru/permintaan/action') ?>" method="POST">
                <input type="hidden" name="id" value="<?= $permintaan->permintaanid ?>">
                <button class="btn btn-success" type="submit" name="submit" value="terima" onclick="return confirm('Anda yakin Menerima Permintaan ini?');">Terima</button>
                <button class="btn btn-danger" type="submit" name="submit" value="tolak" onclick="return confirm('Anda yakin Menolak Permintaan ini?');">Tolak</button>
            </form>
        </div>
    </div>
</div>

<p id="no_hp" style="display: none;"><?= $permintaan->no_hp ?></p>
<p style="display: none;" id="hidehari"><?= $permintaan->hari ?></p>
<script>
    $(document).ready(function() {
        $('#gurupermintaan').addClass('active');

        no_hp = $('#no_hp').text();
        wa = '62' + no_hp.slice(1, 15);

        $('#no_hp1').append("<a href='tel:" + no_hp + " '>" + no_hp + "</a>");
        $('#no_hp1').append(" / <a target='blank' href='https://api.whatsapp.com/send?phone=" + wa + "&text=Hallo%20saya%20guru%20private%20dari%20sipenurut%2C'>WhatsApp</a>");

        tgl = $('#tgl').text();

        tahun = tgl.slice(0, 4);
        bulan = tgl.slice(5, 7);
        hari = tgl.slice(8, 10);

        newformat = hari + '-' + bulan + '-' + tahun;

        hari = $('#hidehari').text();
        arrayhari = hari.split(", ");

        for (let i = 0; i < arrayhari.length; i++) {
            $('#hari').append("<li>" + arrayhari[i] + "</li>")
        }

        tglpermintaan = $('#tglpermintaan').text();
        tahun1 = tglpermintaan.slice(0, 4);
        bulan1 = tglpermintaan.slice(5, 7);
        hari1 = tglpermintaan.slice(8, 10);
        tglpermintaanformat = hari1 + "-" + bulan1 + "-" + tahun1;

        jam = tglpermintaan.slice(11, 13);
        menit = tglpermintaan.slice(14, 16);
        detik = tglpermintaan.slice(17, 19);
        jamformat = jam + ":" + menit + ":" + detik + " GMT +7";

        setTimeout(function() {
            $('#tgl').text(newformat);
            $('#tglpermintaan').text(tglpermintaanformat);
            $('#jam').text(jamformat);
        }, 10);


        status = $('#status').text();

        if (status != "Proses") {
            $('#form :input').prop("disabled", true);
        }
    })
</script>