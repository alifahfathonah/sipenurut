<style>
    .filter {
        color: #696763 !important;
        font-family: 'Roboto', sans-serif !important;
        font-size: 14px !important;
        text-decoration: none !important;
        text-transform: uppercase !important;
    }

    .filter2 {
        color: #696763 !important;
        font-family: 'Roboto', sans-serif !important;
        font-size: 12px !important;
        text-transform: uppercase !important;
    }

    .filter3 {
        background-color: #FFFFFF !important;
        color: #696763 !important;
        font-family: 'Roboto', sans-serif !important;
        font-size: 14px !important;
        padding: 5px 25px !important;
        text-decoration: none !important;
        text-transform: uppercase !important;
    }

    .filter4 {
        background: #F0F0E9;
        border: medium none;
        color: #B2B2B2;
        font-family: 'roboto';
        font-size: 12px;
        font-weight: 300;
        height: 35px;
        outline: medium none;
        padding-left: 10px;
        width: 215px;
        background-repeat: no-repeat;
        background-position: 130px;
    }
</style>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <form action="<?= base_url('cari') ?>" method="GET">
                        <h2>Nama</h2>
                        <div class="panel-group category-products">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><input class="filter4" placeholder="Nama" type="text" name="nama"></h4>
                                </div>
                            </div>
                        </div>
                        <h2>Jenjang Ajar</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title filter"><input type="radio" name="jenjang" value="SD"> Sekolah Dasar (SD)</h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title filter"><input type="radio" name="jenjang" value="SMP"> Sekolah Menengah Pertama (SMP)</h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title  filter">
                                        <a data-toggle="collapse" data-parent="#accordian" href="<?= base_url() ?>assets/users/#sportswear">
                                            <span class="badge pull-right"></span>
                                            Sekolah Menengah Atas (SMA)
                                        </a>
                                    </h4>
                                </div>
                                <div id="sportswear" class="panel-collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li class="filter2"><input type="radio" class="jurusaninput" name="jurusan" value="IPA"> IPA</li>
                                            <li class="filter2"><input type="radio" class="jurusaninput" name="jurusan" value="IPS"> IPS</li>
                                            <input type="hidden" id="jenjang">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/category-products-->
                        <div class="brands_products">
                            <!--brands_products-->
                            <h2>Wilayah</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked filter3">
                                    <?php foreach ($wilayah as $w) : ?>
                                        <li><input type="radio" value="<?= $w->id ?>" name="wilayah"> <?= $w->kota . '/' . $w->provinsi ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>

                        <br><br>
                        <div class="brands_products">
                            <!--brands_products-->
                            <h2>Jurusan Guru</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked filter3">
                                    <?php foreach ($jurusan as $j) : ?>
                                        <li><input type="radio" value="<?= $j->jurusanpdd ?>" name="pendidikan"> <?= $j->jurusanpdd ?></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Cari</button>
                        <button type="button" id="reset" style="border-radius: 0px !important;" class="btn btn-block">Reset</button>
                        <br><br>
                    </form>
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
                    <?php if ($guru == null) : ?>
                        <h1 style="text-align: center; color: #FE980F">Data Tidak Ditemukan</h1>
                    <?php else : ?>
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
                    <?php endif ?>
                </div>
                <!--features_items-->
            </div>
        </div>
    </div>
    <a href="<?= base_url('cari') ?>" id="link" style="display: block;">OK</a>
</section>

<script>
    $(document).ready(function() {

        $('#carimenu').addClass('active');

        $('input:radio[name=jurusan]').change(function() {
            if (this.checked) {
                $('#jenjang').val('SMA');
                $('#jenjang').attr('name', 'jenjang');
                $('input:radio[name=jenjang]').prop('checked', false);
            }
        })

        $('input:radio[name=jenjang]').change(function() {
            if (this.checked) {
                $('#jenjang').val('');
                $('#jenjang').removeAttr('name');
                $('input:radio[name=jurusan]').prop('checked', false);
            }
        })

        $('#reset').on('click', function() {
            $('#link')[0].click();
        })

    })
</script>