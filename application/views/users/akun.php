<style>
    .box {
        border: 1px solid #F0F0E9;
        padding: 5px;
        margin: 5px;
    }

    .margin {
        margin: 10px;
        margin-left: 10px;
    }

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

    .top {
        bottom: 100%;
        left: 0;
    }
</style>
<?php

$no = 1;

if (isset($_GET['open'])) {
    if ($_GET['open'] == 'guru') {
        echo "<p style='display: none;' id='guruaktif'>guru</p>";
    }
}

?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs" style="margin-bottom: 0px;">
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li class="active">Akun</li>
            </ol>
        </div>
        <?php if ($jumlahdata != 10) : ?>
            <div class="register-req">
                <p>Mohon Lengkapi Data Anda</p>
            </div>
        <?php endif ?>
        <!--/register-req-->
        <div class="row">
            <div class="col-sm-12">
                <div class="category-tab shop-details-tab">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#datadiri" id="datatrigger" data-toggle="tab">Data Diri</a></li>
                        <li><a href="#password" id="passwordtrigger" data-toggle="tab">Password</a></li>
                        <li><a id="gurulist" href="#guru" data-toggle="tab">Daftar Guru</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active fade" id="datadiri">
                            <?= $this->session->flashdata('message1');  ?>
                            <div class="col-sm-11">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-11">
                                    <div class="shopper-informations">
                                        <div class="shopper-info">
                                            <p style="display: inline;">Data Diri</p>
                                            <form method="POST" action="<?= base_url('akun/update') ?>">
                                                <label for="">Nama</label>
                                                <input type="text" name="nm_murid" required value="<?= $murid->nm_murid ?>" placeholder="Nama">
                                                <label for="">Jenis Kelamin</label>
                                                <select name="jns_kel" required="">
                                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                    <option <?= ($murid->jns_kel == "Laki-laki") ? "selected" : "" ?>>Laki-laki</option>
                                                    <option <?= ($murid->jns_kel == "Perempuan") ? "selected" : "" ?>>Perempuan</option>
                                                </select>
                                                <label style="margin-top: 10px;">Tempat Lahir</label>
                                                <input type="text" name="tmpt_lahir" required value="<?= $murid->tmpt_lahir ?>" placeholder="Tempat Lahir">
                                                <label for="">Tanggal Lahir</label>
                                                <input type="text" required placeholder="Masukan tanggal lahir" required id="tanggal" value="<?= $murid->tgl_lahir ?>" name="tgl_lahir">
                                                <label>Alamat</label>
                                                <textarea name="alamat" required placeholder="Alamat" rows="3"><?= $murid->alamat ?></textarea>
                                                <label>Agama</label>
                                                <select name="agama" required="">
                                                    <option value="" selected disabled>Pilih Agama</option>
                                                    <option <?= ($murid->agama == "Islam") ? "selected" : "" ?>>Islam</option>
                                                    <option <?= ($murid->agama == "Kristen") ? "selected" : "" ?>>Kristen</option>
                                                    <option <?= ($murid->agama == "Katolik") ? "selected" : "" ?>>Katolik</option>
                                                    <option <?= ($murid->agama == "Buddha") ? "selected" : "" ?>>Buddha</option>
                                                    <option <?= ($murid->agama == "Hindu") ? "selected" : "" ?>>Hindu</option>
                                                    <option <?= ($murid->agama == "Konghucu") ? "selected" : "" ?>>Konghucu</option>
                                                </select>
                                                <label style="margin-top: 10px;" for="">No Handphone/WA</label>
                                                <input type="tel" pattern="^\d{10}$|^\d{11}$|^\d{12}$|^\d{13}$" name="no_hp" required value="<?= $murid->no_hp ?>" placeholder="Nomor Handphone atau WA">
                                                <label for="">Email</label>
                                                <input type="email" readonly name="email" value="<?= $murid->email ?>" placeholder="Alamat Email">
                                                <button class="btn btn-primary" type="submit">Simpan</button>
                                                <button class="btn btn-primary" type="reset">Reset</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                        </div>
                        <div class="tab-pane active fade" id="password">
                            <div id="notif"></div>
                            <div class="col-sm-11">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-11">
                                    <div class="shopper-informations">
                                        <div class="shopper-info">
                                            <p>Password</p>
                                            <form method="POST" action="<?= base_url('akun/password') ?>">
                                                <label for="">Password Lama</label>
                                                <input type="password" name="passwordlama" minlength="6" placeholder="Password Lama" />
                                                <label for="">Password Baru</label>
                                                <input type="password" name="passwordbaru" id="passbaru" minlength="6" placeholder="Password Baru" />
                                                <label for="">Konfirmasi Password</label>
                                                <input type="password" name="passwordbaru" id="passkonfir" minlength="6" placeholder="Password Baru" />
                                                <button type="button" id="submit" class="btn btn-primary">Simpan</button>
                                                <button type="submit" id="realsubmit" style="display: none;"></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                        </div>
                        <div class="tab-pane active fade" id="guru">
                            <div class="col-sm-11 margin">
                                <div class="shopper-informations">
                                    <div class="shopper-info">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-11">
                                            <p>Daftar Guru</p>
                                            <div class="box">
                                                <?php if ($guru != null) : ?>
                                                    <table class="table table-hover table-striped table-bordered" style="size: 100%;">
                                                        <tr>
                                                            <th style="width: 30px;">No</th>
                                                            <th style="width: 100px;">Nama Guru</th>
                                                            <th>Nomor Hp</th>
                                                            <th class="hidden-xs">Tanggal Mulai</th>
                                                            <th class="hidden-xs">Tanggal Selesai</th>
                                                            <th class="hidden-xs">Pertemuan</th>
                                                            <th>Hari</th>
                                                            <th class="hidden-xs">Status</th>
                                                            <td style="width: 50px;">Action</td>
                                                        </tr>
                                                        <?php foreach ($guru as $g) : ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><a href="<?= base_url('home/show/') . $g->guruid ?>"><?= $g->nm_guru ?></a></td>
                                                                <td class="hidden-xs"><a href="tel:+62<?= $g->no_hp ?>">+62<?= $g->no_hp ?></a></td>
                                                                <td class="hidden-xs"><?= $g->tgl_mulai ?></td>
                                                                <td class="hidden-xs"><?= $g->tgl_selesai ?></td>
                                                                <td class="hidden-xs"><?= $g->jumlah ?></td>
                                                                <td><?= $g->hari ?></td>
                                                                <td class="hidden-xs"><?= $g->statusajar ?></td>
                                                                <td><?php if ($g->statusajar == "Selesai" && $g->review == null) : ?><button data-toggle="modal" id="<?= $g->ajarid ?>" data-target="#exampleModal" class="ulasan btn btn-xs btn-default">Tulis Review</button><?php endif ?></td>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </table>
                                                <?php else : ?>
                                                    <p>Belum ada data</p>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
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
            <form action="<?= base_url('akun/ulasan') ?>" method="POST">
                <div class="modal-body">
                    <input class="form-control" name="ajarid" type="hidden" id="ajarid">
                    <div class="form-group">
                        <label>Ulasan</label>
                        <textarea class="form-group" required name="ulasan" rows="3"></textarea>
                    </div>
                    <label>Rating</label>
                    <div class="form-check">
                        <input class="form-check-input" required value="1" type="radio" name="radio1">&nbsp;
                        <label class="form-check-label">1</label>&nbsp;&nbsp;&nbsp;
                        <input class="form-check-input" value="2" type="radio" name="radio1">&nbsp;
                        <label class="form-check-label">2</label>&nbsp;&nbsp;&nbsp;
                        <input class="form-check-input" value="3" type="radio" name="radio1">&nbsp;
                        <label class="form-check-label">3</label>&nbsp;&nbsp;&nbsp;
                        <input class="form-check-input" value="4" type="radio" name="radio1">&nbsp;
                        <label class="form-check-label">4</label>&nbsp;&nbsp;&nbsp;
                        <input class="form-check-input" value="5" type="radio" name="radio1">&nbsp;
                        <label class="form-check-label">5</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                    <button type="submit" id="action" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#accountmenu').addClass('active');

        $('#tanggal').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
        })

        var guruaktif = $('#guruaktif').text();

        console.log(guruaktif);

        setTimeout(function() {
            if (guruaktif == "guru") {
                $('#gurulist').click();
            }
        }, 50);

        $('#passwordtrigger').trigger('click');
        $('#datatrigger').trigger('click');
        console.log('jalan');

        $('#submit').on('click', function() {
            passbaru = $('#passbaru').val();
            passkonfir = $('#passkonfir').val();
            if (passbaru != passkonfir) {
                $('#notif').addClass('col-sm-10 col-sm-offset-1');
                $('#notif').append("<div class='alert alert-danger' role='alert'>Password Konfirmasi Tidak Sama</div>")
                $('#passbaru').val('');
                $('#passkonfir').val('');
            } else {
                $('#realsubmit').click();
            }
        })

        $('.ulasan').on('click', function() {
            var ajarid = $(this).attr('id');
            $('#ajarid').val(ajarid);
        })

    });
</script>