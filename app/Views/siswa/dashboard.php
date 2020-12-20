<?= $this->extend("siswa/template") ?>

<?= $this->section("content"); ?>
<!-- jika sudah ada sesi -->

<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="notika-icon notika-house"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Selamat Datang <?= session('nama') ?> Di Aplikasi Bk Online</h2>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Sale Statistic area-->
<div class="sale-statistic-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <div class="box-content notika-shadow mg-tb-30 ">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $edukasi->id_pemutaran ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="my-3">
                        <h3><?= $edukasi->judul ?></h3>
                        <small>Admin | <?= time_elapsed_string($edukasi->created_at) ?></small>
                    </div>
                    <p class="pt-2"><?= str_replace(array("\r\n", "\r", "\n"), "<br/>", $edukasi->deskripsi) ?></p>
                </div>

                <div class="box-content notika-shadow mg-t-30">
                    <?php foreach ($list_edukasi as $le) { ?>
                        <div class="box-content text-link-ads">
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="hovereffect">
                                        <img class="img-responsive" src="https://img.youtube.com/vi/<?= $le->id_pemutaran ?>/hqdefault.jpg" class="img-fluid" alt="hqdefault.jpg">
                                        <div class="overlay">
                                            <h2>Youtube</h2>
                                            <a class="info" href="<?= base_url('/siswa/edukasi/' . $le->id) ?>">Tonton Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-12">
                                    <a href="<?= base_url('/siswa/edukasi/' . $le->id) ?>">
                                        <h4 class="py-3"><?= $le->judul ?></h4>
                                    </a>
                                    <p><?php echo get_small_char($le->deskripsi, 250) ?><span>...</span></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <a href="<?= base_url() ?>/siswa/riwayat-pelanggaran" class="text-dark">
                    <div class="right-bar notika-shadow mg-tb-30 sm-res-mg-t-0">
                        <h5>Poin Pelanggaran Saya</h5>
                        <hr>
                        <center>
                            <?php if ($saya->poin_pelanggaran >= 0 && $saya->poin_pelanggaran <= 20) { ?>
                                <h4 class="counter"><?= $saya->poin_pelanggaran ?></h4>
                            <?php } elseif ($saya->poin_pelanggaran >= 21 && $saya->poin_pelanggaran <= 50) { ?>
                                <h4 class="counter text-info"><?= $saya->poin_pelanggaran ?></h4>
                            <?php } elseif ($saya->poin_pelanggaran >= 51 && $saya->poin_pelanggaran <= 80) { ?>
                                <h4 class="counter text-warning"><?= $saya->poin_pelanggaran ?></h4>
                            <?php } elseif ($saya->poin_pelanggaran >= 81) { ?>
                                <h4 class="counter text-danger"><?= $saya->poin_pelanggaran ?></h4>
                            <?php } ?>
                        </center>
                    </div>
                </a>
                <div class="right-bar notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <h5>Status Pelanggaran Saya</h5>
                    <hr>
                    <center>
                        <?php if ($saya->poin_pelanggaran >= 0 && $saya->poin_pelanggaran <= 20) { ?>
                            <h4 class="text-dark">Aman</h4>
                        <?php } elseif ($saya->poin_pelanggaran >= 21 && $saya->poin_pelanggaran <= 50) { ?>
                            <h4 class="text-info">Cukup Aman</h4>
                        <?php } elseif ($saya->poin_pelanggaran >= 51 && $saya->poin_pelanggaran <= 80) { ?>
                            <h4 class="text-warning">Berbahaya</h4>
                        <?php } elseif ($saya->poin_pelanggaran >= 81) { ?>
                            <h4 class="text-danger">Sangat Fatal</h4>
                        <?php } ?>
                    </center>
                </div>
                <div class="right-bar notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <center>
                        <img src="<?= base_url() ?>/public/attention/<?= rand(1, 8) ?>.gif" alt="<?= rand(1, 8) ?>.gif">
                    </center>
                </div>
                <div class="right-bar-default nk-deep-purple notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <center>
                        <img src="<?= base_url() ?>/public/img/hope.gif" alt="hope.gif">
                    </center>
                </div>
                <div class="right-bar notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <h5>Donasi Pengembang</h5>
                    <hr>
                    <center>
                        <img src="<?= base_url() ?>/public/img/donasi.gif" alt="donasi.gif">
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Sale Statistic area-->
<?= $this->endSection(""); ?>