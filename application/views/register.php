<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration Si Penurut</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/users/images/ico/favicon.png" type="image/png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>Si</b>Penurut</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Mendaftar menjadi guru?</p>

                <form action="<?= base_url('auth/reg') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nama" required placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" minlength="6" name="username" required placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-at"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" minlength="6" id="password" name="password" required class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <button type="button" id="passwordtrigger" class="input-group-text">
                                <span id="eye" class="fas fa-eye"></span>
                            </button>
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <a href="<?= base_url('auth') ?>" class="text-center">Sudah memiliki akun</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url() ?>assets/admin/plugins/toastr/toastr.min.js"></script>
    <?= $this->session->flashdata('message');  ?>

    <script>
        $(document).ready(function() {

            $('#passwordtrigger').on('click', function() {

                type = $('#password').attr('type');
                if (type == 'password') {
                    $('#password').attr('type', 'text');
                    $('#eye').removeClass();
                    $('#eye').addClass('fas fa-eye-slash');
                    console.log('hilang jalan');
                } else if (type == 'text') {
                    $('#password').attr('type', 'password');
                    $('#eye').removeClass();
                    $('#eye').addClass('fas fa-eye');
                    console.log('tampil jalan');
                }
            })
        })
    </script>
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