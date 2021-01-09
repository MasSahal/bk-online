<?= $this->extend("siswa/template") ?>

<?= $this->section("content"); ?>
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
                                    <h2>Materi Edukasi - BK Online</h2>
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
<div class="box-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <div class="box-content notika-shadow mg-tb-30">
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
                        <hr>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <div class="right-bar notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <center>
                        <img src="<?= base_url() ?>/public/attention/<?= rand(1, 8) ?>.gif" alt="<?= rand(1, 8) ?>.gif">
                    </center>
                </div>
                <div class="statistic-right-area mg-tb-30 p-20 ">
                    <h5>Hari ini pukul</h5>
                    <hr>
                    <center>
                        <h4 id="realtime"></h4>
                    </center>
                </div>
                <div class="right-bar notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <center>
                        <img src="<?= base_url() ?>/public/attention/<?= rand(1, 8) ?>.gif" alt="<?= rand(1, 8) ?>.gif">
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Sale Statistic area-->
<?= $this->endSection(""); ?>