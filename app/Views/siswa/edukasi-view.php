<?= $this->extend("siswa/template"); ?>
<?= $this->section("content"); ?>

<div class="box-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="box-content notika-shadow mg-tb-30">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $edukasi->id_pemutaran ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="mb-2 mt-4">
                        <h3><?= $edukasi->judul ?></h3>
                        Admin | <?= date('D, d M Y', strtotime($edukasi->waktu_upload)) ?>
                    </div>
                    <hr>
                    <p><?= str_replace(array("\r\n", "\r", "\n"), "<br/>", $edukasi->deskripsi) ?></p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="right-bar notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <div class="inbox-left-sd">
                        <div class="compose-ml">
                            <h5>Pengaturan Data</h5>
                            <hr>
                        </div>
                        <div class="inbox-status">
                            <ul class="inbox-st-nav">
                                <li><a href="<?= base_url('/siswa/edukasi/') ?>"><i class="notika-icon notika-menus"></i> List Materi</a></li>
                            </ul>
                            <hr>
                            <ul class="inbox-st-nav">
                                <li>
                                    <span>Perubahan Terakhir</span>
                                    <br>
                                    <small><?= date('D, d M Y', strtotime($edukasi->waktu_upload)) ?></small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
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
            </div>
        </div>
    </div>
</div>

<!-- modal konfirmasi hapus -->
<div class="modal fade" id="hapus_<?= $edukasi->id ?>" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <h4> Yakin ingin menghapus materi "<span class="text-warning"><?= $edukasi->judul ?></span>" ?</h4>
                    <div class="my-3">
                        <img src="<?= base_url("/public/img/alert.png") ?>" alt="alert1.png">
                    </div>
                    <span>Tindakan tidak dapat diurungkan!</span><br><br>
                </center>
            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" data-dismiss="modal" class="btn btn-success btn-md notika-btn-success">Batalkan</button>
                    <a href="<?= base_url("/proses/delete-edukasi/" . $edukasi->id)  ?>" class="btn btn-danger btn-md notika-btn-danger">Hapus</a>
                </center>
            </div>
        </div>
    </div>
</div>

<!-- modal konfirmasi reset edukasi -->
<div class="modal fade" id="reset_edukasi" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <h4> Yakin ingin menghapus "<span class="text-warning">semua materi edukasi</span>" ?</h4>
                    <div class="my-3">
                        <img src="<?= base_url("/public/img/alert.png") ?>" alt="alert1.png">
                    </div>
                    <span>Tindakan tidak dapat diurungkan!</span><br><br>
                </center>
            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" data-dismiss="modal" class="btn btn-success btn-md notika-btn-success">Batalkan</button>
                    <a href="<?= base_url("/proses/3912f6b5a6108033e736062e64bddb5f")  ?>" class="btn btn-danger btn-md notika-btn-danger">Hapus</a>
                </center>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>