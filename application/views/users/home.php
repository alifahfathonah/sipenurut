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

            <style>
                .guru-img {
                    /* width: 300px; */
                    height: 270px;
                    object-fit: cover;
                }
            </style>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">Daftar Guru</h2>
                    <?php foreach ($guru as $g) : ?>
                        <?php if ($g->jenjang == 'SD') {
                                $g->jenjang = 'Sekolah Dasar (SD)';
                            } else if ($g->jenjang == 'SMP') {
                                $g->jenjang = 'Sekolah Menengah Pertama (SMP)';
                            } else {
                                $g->jenjang = 'Sekolah Menengah Atas (SMA)';
                            } ?>
                        <a href="<?= base_url('home/show/') . "$g->guruid" ?>">
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img class="guru-img" src="<?= base_url('assets/img/foto/') . $g->foto ?>" alt="" />
                                            <h2><?= $g->nm_guru ?></h2>
                                            <p><?= $g->kota . '/' . $g->provinsi ?></p>
                                            <a href="<?= base_url('home/show/') . "$g->guruid" ?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Detail</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2><?= $g->nm_guru ?></h2>
                                                <p><?= $g->jns_kel ?></p>
                                                <p><?= $g->kota . '/' . $g->provinsi ?></p>
                                                <p><?= $g->jenjang ?></p>
                                                <p><?= $g->jurusan != null ? $g->jurusan : '&nbsp;' ?></p>
                                                <a href="<?= base_url('home/show/') . "$g->guruid" ?>" class="detail btn btn-default add-to-cart"><i class="fa fa-eye"></i>Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach ?>
                </div>
                <!--features_items-->
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {

        $('#homemenu').addClass('active');

    })
</script>