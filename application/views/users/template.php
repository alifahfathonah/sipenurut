<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php if ($this->uri->segment(1) == null) {
                echo 'Home';
            } else if ($this->uri->segment(2) == 'show') {
                echo "Guru Private";
            } else {
                echo ucwords($this->uri->segment(1));
            } ?> | Si Penurut</title>
    <link href="<?= base_url() ?>assets/users/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/users/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/users/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/users/css/price-range.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/users/css/animate.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/users/css/main.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/users/css/responsive.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/users/css/select2.min.css" rel="stylesheet">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <!--[if lt IE 9]>
    <script src="<?= base_url() ?>assets/users/js/html5shiv.js"></script>
    <script src="<?= base_url() ?>assets/users/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/users/images/ico/favicon.png" type="image/png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url() ?>assets/users/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url() ?>assets/users/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url() ?>assets/users/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url() ?>assets/users/images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<script src="<?= base_url() ?>assets/users/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/users/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/users/js/jquery.scrollUp.min.js"></script>
<script src="<?= base_url() ?>assets/users/js/price-range.js"></script>
<script src="<?= base_url() ?>assets/users/js/jquery.prettyPhoto.js"></script>
<script src="<?= base_url() ?>assets/users/js/main.js"></script>
<script src="<?= base_url() ?>assets/users/js/select2.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="tel:+6281212309812"><i class="fa fa-phone"></i> +62 812 123 098 12</a></li>
                                <li><a href="mailto: info@sipenurut.com"><i class="fa fa-envelope"></i> info@sipenurut.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="<?= base_url() ?>#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="<?= base_url() ?>#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="<?= base_url() ?>#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="<?= base_url() ?>#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="<?= base_url() ?>#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="<?= base_url() ?>"><img width="139" width="39" src="<?= base_url() ?>assets/users/images/home/logo.png" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a id="accountmenu" href="<?= base_url() ?>akun"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="<?= base_url() ?>akun?open=guru"><i class="fa fa-star"></i> Guru</a></li>
                                <li><a id="permintaanmenu" href="<?= base_url() ?>permintaan"><i class="fa fa-crosshairs"></i> Permintaan</a></li>
                                <?php if ($this->session->userdata('aktif') != TRUE) : ?>
                                    <li><a id="loginmenu" href="<?= base_url() ?>login"><i class="fa fa-lock"></i> Login</a></li>
                                <?php else : ?>
                                    <li><a id="loginmenu" href="<?= base_url() ?>auth/logout"><i class="fa fa-lock"></i> Logout</a></li>
                                <?php endif ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="<?= base_url() ?>" id="homemenu">Home</a></li>
                                <li><a href="<?= base_url('cari') ?>" id="carimenu">Search</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <form action="<?= base_url('cari') ?>" method="GET">
                                <input type="text" title="Tekan Enter Setelah Menuliskan Nama" id="cari" data-toggle="tooltip" name="nama" placeholder="Search" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->

    <section id="advertisement">
        <div class="container">
            <img src="<?= base_url() ?>assets/users/images/home/SiPenurut.png" alt="" />
        </div>
    </section>

    <?= $contents; ?>

    <footer id="footer">
        <!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>Si</span>&nbsp;Penurut</h2>
                            <p style="font-size: 15px;">Sistem Informasi Pencari Guru Privat</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="<?= base_url() ?>assets/users/images/home/map.png" alt="" />
                            <p>Pontianak, Kalimantan Barat, Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2019 Si Penurut. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="<?= base_url() ?>assets/users/http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>

    </footer>
</body>

<script>
    $(document).ready(function() {

        $(function() {
            $('[data-toggle="tooltip"]').tooltip({
                'trigger': 'focus',
                'title': 'Tekan Enter Setelah Menuliskan Nama'
            })
        })

    })
</script>

</html>