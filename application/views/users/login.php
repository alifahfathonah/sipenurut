<?= $this->session->flashdata('message1');  ?>
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Login User/Guru</h2>
                    <form action="<?= base_url('login/auth') ?>" method="POST">
                        <input type="text" name="username" placeholder="Username/Email" />
                        <input type="password" name="password" placeholder="Password" />
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Daftar Sebagai User</h2>
                    <form action="<?= base_url('login/register') ?>" method="POST">
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" value="<?= set_value('nama') ?>" name="nama" required placeholder="Nama" />
                                <input type="email" value="<?= set_value('email') ?>" name="email" required placeholder="Alamat Email" />
                                <input type="tel" value="<?= set_value('no_hp') ?>" name="no_hp" required pattern="^\d{10}$|^\d{11}$|^\d{12}$|^\d{13}$" id="no_hp" placeholder="Nomor Handphone" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-9">
                                <input type="password" name="password" minlength="6" id="password" placeholder="Password" />
                            </div>
                            <div class="col-xs-3">
                                <button type="button" style="height: 37px;" id="passwordtrigger" class="btn btn-default"><i id="eye" class="fa fa-eye"></i></button>
                            </div>
                        </div>
                        <span class="pull-right">
                            <a href="<?= base_url('auth/register') ?>">
                                Daftar Sebagai Guru
                            </a>
                        </span>
                        <button type="submit" id="submit" class="btn btn-default">Signup</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#loginmenu').addClass('active');

        function refresh() {
            $('#passwordtrigger').blur();
        }

        $('#passwordtrigger').on('click', function() {
            type = $('#password').attr('type');
            if (type == 'password') {
                $('#password').attr('type', 'text');
                $('#eye').removeClass();
                $('#eye').addClass('fa fa-eye-slash');
                $('#passwordtrigger').addClass('btn btn-default');
                refresh();
                console.log('hilang jalan');
            } else if (type == 'text') {
                $('#password').attr('type', 'password');
                $('#eye').removeClass();
                $('#eye').addClass('fa fa-eye');
                $('#passwordtrigger').addClass('btn btn-default');
                refresh();
                console.log('tampil jalan');
            }
        })
    })
</script>