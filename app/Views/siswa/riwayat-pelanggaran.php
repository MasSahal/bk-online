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
                                    <i class="notika-icon notika-edit"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Riwayat Pelanggaran - BK Online</h2>
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
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="data-table-basic">
                            <thead style="color:#fff;background:#bbbbbb">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis pelanggaran</th>
                                    <th>Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;

                                // dd($riwayat_pelanggaran);
                                foreach ($riwayat_pelanggaran as $r) { ?>
                                    <tr id="<?= $r->id ?>">
                                        <td><?= $i += 1; ?></td>
                                        <td><?= $r->siswa ?></td>
                                        <td><?= $r->jenis_pelanggaran ?></td>
                                        <td><?= $r->poin_pelanggaran ?></td>
                                    </tr>

                                    <!-- modal detail riwayat pelanggaran -->
                                    <div class="modal fade" id="detail_<?= $r->id ?>" role="dialog">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="view-mail-hd">
                                                        <div class="view-mail-hrd">
                                                            <h4><?= "j" ?></h4>
                                                        </div>
                                                        <div class="view-ml-rl">
                                                            <p><?= "l" ?> Poin</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <p class="pt-2"><?= "l" ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal konfirmasi hapus -->
                                    <div class="modal fade" id="hapus_<?= $r->id ?>" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <center>
                                                        <h4> Yakin ingin menghapus riwayat pelanggaran "<span class="text-warning"><?= "l" ?></span>" ?</h4>
                                                        <div class="my-3">
                                                            <img src="<?= base_url("/public/img/alert.png") ?>" alt="alert1.png">
                                                        </div>
                                                        <span>Tindakan tidak dapat diurungkan!</span><br><br>
                                                    </center>
                                                </div>
                                                <div class="modal-footer">
                                                    <center>
                                                        <button type="button" data-dismiss="modal" class="btn btn-success btn-md notika-btn-success">Batalkan</button>
                                                        <a href="<?= base_url("/proses/delete_riwayat pelanggaran/" . $r->id)  ?>" class="btn btn-danger btn-md notika-btn-danger">Hapus</a>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="curved-inner-pro">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
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
                <div class="statistic-right-area mg-tb-30 p-20 ">
                    <h5>Hari ini</h5>
                    <hr>
                    <center>
                        <?php date_default_timezone_set('ASIA/JAKARTA') ?>
                        <h4><?= date('D, d M Y') ?></h4>
                    </center>
                    <center>
                        <h4 id="realtime"></h4>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Sale Statistic area-->
<?= $this->endSection(""); ?>