<?= $this->extend("siswa/template") ?>

<?= $this->section("content"); ?>

<!-- Start Sale Statistic area-->
<div class="breadcomb-area mg-b-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="breadcomb-wp">
                        <div class="breadcomb-icon">
                            <i class="notika-icon notika-support"></i>
                        </div>
                        <div class="breadcomb-ctn">
                            <h2>Profile Siswa Terdaftar - Bk Online</h2>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="sale-statistic-area" style=" min-height:250px">
    <div class="container">
        <div class="row">
            <?php foreach ($list_siswa as $s) { ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="contact-list mg-b-30 sm-res-mg-t-0">
                        <div class="contact-win">
                            <div class="contact-img">
                                <?php if ($s->jenis_kelamin == "L") { ?>
                                    <img src="<?= base_url() ?>/public/profile/default-lk.png" alt="default-lk.png">
                                <?php } elseif ($s->jenis_kelamin == "P") { ?>
                                    <img src="<?= base_url() ?>/public/profile/default-pr.png" alt="default-pr.png">
                                <?php } ?>
                            </div>
                            <div class="conct-sc-ic">
                                <a href="#" class=" btn btn-teal teal-icon-notika"><i class="notika-icon notika-menu"></i></a>
                                <a href="#" class=" btn btn-warning warning-icon-notika" data-toggle="modal" data-target="#email_<?= $s->id ?>"><i class="notika-icon notika-mail"></i></a>
                            </div>
                        </div>
                        <div class="contact-ctn" style="min-height:200px !important">
                            <div class="contact-ad-hd">
                                <h2><?= $s->username ?></h2>
                                <p class="ctn-ads"><?= $s->alamat ?></p>
                            </div>
                            <p>Saya adalah siswa SMK Informatika Al Irsyad Al Islamiyyah. Saya duduk di bangku kelas <?= $s->kelas ?> jurusan <?= $s->jurusan ?></p>
                        </div>
                        <div class="social-st-list">
                            <div class="social-sn">
                                <h2>Poin Pelanggaran:</h2>
                                <?php if ($s->poin_pelanggaran >= 0 && $s->poin_pelanggaran <= 20) { ?>
                                    <p class="counter"><?= $s->poin_pelanggaran ?></p>
                                <?php } elseif ($s->poin_pelanggaran >= 21 && $s->poin_pelanggaran <= 50) { ?>
                                    <p class="counter text-info"><?= $s->poin_pelanggaran ?></p>
                                <?php } elseif ($s->poin_pelanggaran >= 51 && $s->poin_pelanggaran <= 80) { ?>
                                    <p class="counter text-warning"><?= $s->poin_pelanggaran ?></p>
                                <?php } elseif ($s->poin_pelanggaran >= 81) { ?>
                                    <p class="counter text-danger"><?= $s->poin_pelanggaran ?></p>
                                <?php } ?>
                            </div>
                            <div class="social-sn">
                                <h2>Health:</h2>
                                <p><span class="counter"><?= rand(1, 99) ?></span> / <span class="counter">100</span>%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal email-->
                <div class="modal fade" id="email_<?= $s->id ?>" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <center>
                                    <div class="my-3">
                                        <img src="<?= base_url("/public/img/hello.gif") ?>" alt="alert1.png">
                                    </div>
                                    <span>Email : <?= $s->email ?></span><br><br>
                                </center>
                            </div>
                            <div class="modal-footer">
                                <center>
                                    <button type="button" data-dismiss="modal" class="btn btn-default">Tutup</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>


            <?php } ?>
        </div>
    </div>
</div>

<?= $this->endSection(""); ?>