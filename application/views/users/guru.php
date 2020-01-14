<?= $this->session->flashdata('message1');  ?>
<style>
    .keluar {
        float: right;
        font-size: 21px;
        font-weight: bold;
        line-height: 0;
        color: #000000;
        text-shadow: 0 1px 0 #ffffff;
        opacity: 0.2;
        filter: alpha(opacity=20);
    }

    .keluar:hover,
    .keluar:focus {
        color: #000000;
        text-decoration: none;
        cursor: pointer;
        opacity: 0.5;
        filter: alpha(opacity=50);
    }

    button.keluar {
        padding: 0;
        cursor: pointer;
        background: transparent;
        border: 0;
        -webkit-appearance: none;
    }

    #hari {
        width: 555% !important;
    }

    @media only screen and (max-width: 400px) {
        #hari {
            width: 300% !important;
        }
    }
</style>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Jenjang Ajar</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="<?= base_url('cari?jenjang=SD') ?>">Sekolah Dasar (SD)</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="<?= base_url('cari?jenjang=SMP') ?>">Sekolah Menengah Pertama (SMP)</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="<?= base_url() ?>assets/users/#sportswear">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Sekolah Menengah Atas (SMA)
                                    </a>
                                </h4>
                            </div>
                            <div id="sportswear" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="<?= base_url('cari?jenjang=SMA&jurusan=IPA') ?>">IPA </a></li>
                                        <li><a href="<?= base_url('cari?jenjang=SMA&jurusan=IPS') ?>">IPS </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="brands_products">
                        <h2>Wilayah</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <?php foreach ($wilayah as $w) : ?>
                                    <li><a href="<?= base_url('cari?wilayah=') . $w->id ?>"> <span class="pull-right">(<?= $w->jumlah ?>)</span><?= $w->kota . '/' . $w->provinsi ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>

                    <br><br>
                    <div class="brands_products">
                        <!--brands_products-->
                        <h2>Jurusan Guru</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <?php foreach ($jurusan as $j) : ?>
                                    <li><a href="<?= base_url('cari?pendidikan=') . $j->jurusanpdd ?>"> <span class="pull-right">(<?= $j->jumlah ?>)</span><?= $j->jurusanpdd ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    <br><br>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="<?= base_url('assets/img/foto/') . $guru->foto ?>" alt="" />
                            <h3>Terverifikasi</h3>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information">
                            <h2><?= $guru->nm_guru ?></h2>
                            <tr>
                                <td><b>Jenis Kelamin</b> </td>
                                <td>:</td>
                                <td><?= $guru->jns_kel ?></td>
                            </tr><br>
                            <tr>
                                <td><b>Jenjang Ajar</b> </td>
                                <td>:</td>
                                <td><?= $guru->jenjang ?></td>
                            </tr><br>
                            <?php if ($guru->jurusan != null) : ?>
                                <tr>
                                    <td><b>Jurusan Ajar</b> </td>
                                    <td>:</td>
                                    <td><?= $guru->jurusan ?></td>
                                </tr><br>
                            <?php endif ?>
                            <tr>
                                <td><b>Wilayah Ajar</b> </td>
                                <td>:</td>
                                <td><?= $guru->kota . '/' . $guru->provinsi ?></td>
                            </tr><br>
                            <span>
                                <label>Les Private</label><br>
                                <form action="<?= base_url('home/permintaan') ?>" method="POST">
                                    <input type="hidden" name="guruid" value="<?= $guru->guruid ?>">
                                    <input type="number" id="jumlahhari" name="hari" required min="1" max="7" value="1" />
                                    <p style="display: inline;">Kali / Minggu</p>
                                    <button type="button" id="btnmodal" data-toggle="modal" data-target="#exampleModal" class="btn btn-default cart">
                                        <i class="fa fa-envelope"></i>
                                        Kirim Permintaan
                                    </button>
                                </form>
                            </span>
                        </div>
                        <!--/product-information-->
                    </div>
                </div>
                <!--/product-details-->

                <div class="category-tab shop-details-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                            <li><a href="#reviews" data-toggle="tab">Reviews</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="details">

                            <div class="col-md-12">
                                <h3>Detail Lengkap Guru</h3>
                                <table class="table table-hover">
                                    <tr>
                                        <td style="width: 200px;"><b>Nama</b></td>
                                        <td style="width: 5px;">:</td>
                                        <td><?= $guru->nm_guru ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jenis Kelamin</b></td>
                                        <td>:</td>
                                        <td><?= $guru->jns_kel ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tempat Lahir</b></td>
                                        <td>:</td>
                                        <td><?= $guru->tmpt_lahir ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tanggal Lahir</b></td>
                                        <td>:</td>
                                        <td id="tgl"><?= $guru->tgl_lahir ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Alamat</b></td>
                                        <td>:</td>
                                        <td><?= $guru->alamat ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Agama</b></td>
                                        <td>:</td>
                                        <td><?= $guru->agama ?></td>
                                    </tr>
                                    <?php if ($guru->jenjang == 'SD') {
                                        $guru->jenjang = 'Sekolah Dasar (SD)';
                                    } else if ($guru->jenjang == 'SMP') {
                                        $guru->jenjang = 'Sekolah Menengah Pertama (SMP)';
                                    } else {
                                        $guru->jenjang = 'Sekolah Menengah Atas (SMA)';
                                    } ?>
                                    <tr>
                                        <td><b>Jenjang Ajar</b></td>
                                        <td>:</td>
                                        <td><?= $guru->jenjang ?></td>
                                    </tr>
                                    <?php if ($guru->jurusan != null) : ?>
                                        <tr>
                                            <td><b>Jurusan</b></td>
                                            <td>:</td>
                                            <td><?= $guru->jurusan ?></td>
                                        </tr>
                                    <?php endif ?>
                                    <tr>
                                        <td><b>Wilayah Ajar</b></td>
                                        <td>:</td>
                                        <td><?= $guru->kota . '/' . $guru->provinsi ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Pendidikan</b></td>
                                        <td>:</td>
                                        <td><?= $guru->pddterakhir ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jurusan Pendidikan</b></td>
                                        <td>:</td>
                                        <td><?= $guru->jurusanpdd ?></td>
                                    </tr>
                                    <?php if ($guru->pddterakhir != 'Sedang Kuliah') : ?>
                                        <tr>
                                            <td><b>Ijazah</b></td>
                                            <td>:</td>
                                            <td><a target="blank" href="<?= base_url('assets/img/ijazah/') . $guru->ijazah ?>">Klik untuk melihat</a></td>
                                        </tr>
                                    <?php endif ?>
                                    <tr>
                                        <td><b>Nilai Terakhir</b></td>
                                        <td>:</td>
                                        <td><a target="blank" href="<?= base_url('assets/img/nilai/') . $guru->nilai ?>">Klik untuk melihat</a></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tentang Guru</b></td>
                                        <td>:</td>
                                        <td><?= $guru->deskripsi ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Status</b></td>
                                        <td>:</td>
                                        <td style="color: green;"><i class="fa fa-check"></i> <b><u><?= $guru->verifikasi ?></u></b></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="reviews">
                            <div class="response-area">
                                <h2><?= $jumlahreview ?> REVIEW (<i style="color: #FE980F;" class="fa fa-star"> <?= $rerata ?></i>)</h2>

                                <?php if ($review != null) : ?>
                                    <ul class="media-list">
                                        <?php foreach ($review as $r) : ?>
                                            <li class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object" src="<?= base_url('assets/img/foto/default.png') ?>" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <ul class="sinlge-post-meta">
                                                        <li><i class="fa fa-user"></i> <?= $r->nm_murid ?></li>
                                                        <li><i class="fa fa-star"></i> <?= $r->rate ?></li>
                                                        <li><i class="fa fa-calendar"></i> <?= $r->tgl ?></li>
                                                    </ul>
                                                    <p><?= $r->ulasan ?></p>
                                                    <p>Tanggal Belajar: <?= $r->tgl_mulai ?> sampai dengan <?= $r->tgl_selesai  ?></p>
                                                </div>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                <?php else : ?>
                                    <h2>Belum Ada Data</h2>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Permintaan</h5>
                <button type="button" class="keluar" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/permintaan') ?>" method="POST">
                <div class="modal-body">
                    <div id="warning">

                    </div>
                    <input type="hidden" name="jumlah" id="hariasli">
                    <input type="hidden" name="guruid" value="<?= $guru->guruid ?>">
                    <label for="">Hari</label>
                    <select multiple="multiple" name="hari[]" id="hari" aria-placeholder="Pilih Hari">
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                    <button type="button" id="action" class="btn btn-primary">Kirim</button>
                    <button style="display: none;" id="submit" type="submit"></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#homemenu').addClass('active');

        var jumlahhari;

        $('#btnmodal').on('click', function() {
            jumlahhari = $('#jumlahhari').val();
            $('#hariasli').val(jumlahhari);
            $('#hari').select2({
                maximumSelectionLength: jumlahhari,
                multiple: true,
                tokenSeparators: [",", " "],
            });
        });

        $('#action').on('click', function() {
            var count = $("#hari :selected").length;
            console.log(count);

            if (jumlahhari != count) {
                $('#warning').append("<div class='alert alert-warning' role='alert'>Anda kurang memilih hari.</div>");
            } else {
                $('#submit').click();
            }
        })

        tgl = $('#tgl').text();

        tahun = tgl.slice(0, 4);
        bulan = tgl.slice(5, 7);
        hari = tgl.slice(8, 10);

        newformat = hari + '-' + bulan + '-' + tahun;

        setTimeout(function() {
            $('#tgl').text(newformat);
        }, 10);
    })
</script>