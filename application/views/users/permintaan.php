<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li class="active">Permintaan</li>
            </ol>
        </div>
        <?= $this->session->flashdata('message1');  ?>

        <div class="review-payment">
            <h2>Daftar Permintaan</h2>
        </div>
        <style>
            .img {
                /* width: 300px; */
                height: 150px;
                object-fit: cover;
            }

            .button {
                background: #F0F0E9;
                color: #696763;
                display: inline-block;
                font-size: 16px;
                height: 28px;
                overflow: hidden;
                text-align: center;
                width: 35px;
                float: left;
                border: 0;
                box-shadow: none;
                border-radius: 0px;
            }

            .button:hover {
                background: #FE980F;
                color: #FFFFFF;
            }
        </style>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image" style="width: 200px;">Foto</td>
                        <td class="description">Nama</td>
                        <td class="price">Pertemuan</td>
                        <td class="quantity" style="width: 200px;">Hari</td>
                        <td class="total">Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($permintaan as $p) : ?>
                        <?php if ($p->jenjang == 'SD') {
                                $p->jenjang = 'Sekolah Dasar (SD)';
                            } else if ($p->jenjang == 'SMP') {
                                $p->jenjang = 'Sekolah Menengah Pertama (SMP)';
                            } else {
                                $p->jenjang = 'Sekolah Menengah Atas (SMA)';
                            } ?>
                        <tr>
                            <td class="cart_product">
                                <a href="#"><img class="img" src="<?= base_url('assets/img/foto/') . $p->foto ?>" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="<?= base_url('home/show/') . $p->guruid ?>"><?= $p->nm_guru ?></a></h4>
                                <p><?= $p->jenjang ?></p>
                                <p><?= $p->jurusan != null ? $p->jurusan : null ?></p>
                            </td>
                            <td class="cart_price">
                                <p><?= $p->jumlah ?> Kali/Minggu</p>
                            </td>
                            <td class="cart_quantity">
                                <p><?= $p->hari ?></p>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"><?= $p->status ?></p>
                            </td>
                            <td class="cart_delete">
                                <?php if ($p->status == 'Proses') : ?>
                                    <form method="POST" action="<?= base_url('permintaan/delete') ?>">
                                        <input type="hidden" name="permintaanid" value="<?= $p->permintaanid ?>">
                                        <button title="Hapus" class="button" type="submit" onclick="return confirm('Anda yakin ingin membatalkan permintaan ajar ini?');"><i class="fa fa-times"></i></button>
                                    </form>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {

        $('#permintaanmenu').addClass('active');

    })
</script>