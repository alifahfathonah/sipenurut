<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Si Penurut Page</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/users/images/ico/favicon.png" type="image/png">
    <!-- BootStrap -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/adminlte.min.css">
    <!-- pace-progress -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/newdatatables/datatables.bundle.css">
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"> -->
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/toastr/toastr.min.css">
</head>

<!-- jQuery -->
<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/admin/plugins/newdatatables/datatables.bundle.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<body class="hold-transition sidebar-mini pace-primary">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="<?= base_url() ?>assets/admin/#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url() ?>home" class="nav-link">Home</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="<?= base_url() ?>assets/users/images/ico/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Si Penurut</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/img/foto/') . $this->session->userdata('foto') ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $this->session->userdata('nama') . ' (' . ucwords($this->session->userdata('level')) . ')' ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'superadmin') : ?>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/dashboard') ?>" class="nav-link" id="dashboardmenu">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/wilayah') ?>" class="nav-link" id="wilayahmenu">
                                    <i class="nav-icon fas fa-map-marked-alt"></i>
                                    <p>
                                        Wilayah
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/guru') ?>" class="nav-link" id="gurumenu">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Guru
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/murid') ?>" class="nav-link" id="muridmenu">
                                    <i class="nav-icon fas fa-user-graduate"></i>
                                    <p>
                                        Murid
                                    </p>
                                </a>
                            </li>
                            <?php $count = $this->db->query("SELECT COUNT(*) AS jumlah FROM verifikasi WHERE status = 'Proses'")->row('jumlah') ?>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/verifikasi') ?>" class="nav-link" id="verifikasimenu">
                                    <i class="nav-icon fas fa-check"></i>
                                    <p>
                                        Verifikasi Guru
                                        <?php if ($count != '0') : ?>
                                            <span class="badge badge-info right"><?= $count ?></span>
                                        <?php endif ?>
                                    </p>
                                </a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a href="<?= base_url('guru/dashboard') ?>" class="nav-link" id="gurudashboard">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <?php
                                $id = $this->session->userdata('id');
                                $count = $this->db->query("SELECT COUNT(*) AS jumlah FROM permintaan WHERE status = 'Proses' AND id_guru = '$id'")->row('jumlah') ?>
                            <li class="nav-item">
                                <a href="<?= base_url('guru/murid') ?>" class="nav-link" id="gurumurid">
                                    <i class="nav-icon fas fa-user-graduate"></i>
                                    <p>
                                        Murid
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('guru/permintaan') ?>" class="nav-link" id="gurupermintaan">
                                    <i class="nav-icon fas fa-user-check"></i>
                                    <p>
                                        Permintaan
                                        <?php if ($count != '0') : ?>
                                            <span class="badge badge-info right"><?= $count ?></span>
                                        <?php endif ?>
                                    </p>
                                </a>
                            </li>
                        <?php endif ?>
                        <li class="nav-item">
                            <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><?= $title; ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Admin</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/') . $this->uri->segment(2) ?>"><?= ucwords($this->uri->segment(2)) ?></a></li>
                                <?php if ($this->uri->segment(3) != null) : ?>
                                    <li class="breadcrumb-item"><?= ucwords($this->uri->segment(3)) ?></li>
                                <?php endif ?>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?= $contents; ?>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2019 <a href="<?= base_url() ?>assets/admin/https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
    <!-- pace-progress -->
    <script src="<?= base_url() ?>assets/admin/plugins/pace-progress/pace.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url() ?>assets/admin/plugins/toastr/toastr.min.js"></script>
    <?= $this->session->flashdata('message');  ?>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
</body>

</html>