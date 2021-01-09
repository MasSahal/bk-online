<?= $this->extend("admin/template"); ?>
<?= $this->section("content"); ?>
<div class="sale-statistic-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="box-content notika-shadow mg-t-30">
                    <?php if ($konsultasi->lampiran != "none") { ?>
                        <img src="<?= base_url("/public/konsultasi/" . $konsultasi->lampiran) ?>" alt="$konsultasi->lampiran">
                    <?php } ?>
                    <div class="mb-1 mt-3">
                        <h3><?= $konsultasi->subjek ?></h3>
                        <small><?= $konsultasi->nama ?> | <?= tanggal($konsultasi->created_at) ?></small>
                    </div>
                    <hr>
                    <p class="pt-2"><?= str_replace(array("\r\n", "\r", "\n"), "<br/>", $konsultasi->deskripsi) ?></p>
                    <br>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?= view('admin/sidebar-konsultasi') ?>
            </div>
        </div>
    </div>
</div>

<!-- modal konfirmasi hapus -->
<div class="modal fade" id="hapus_<?= $konsultasi->id ?>" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <h4> Yakin ingin menghapus materi "<span class="text-warning"><?= $konsultasi->id ?></span>" ?</h4>
                    <div class="my-3">
                        <img src="<?= base_url("/public/img/alert.png") ?>" alt="alert1.png">
                    </div>
                    <span>Tindakan tidak dapat diurungkan!</span><br><br>
                </center>
            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" data-dismiss="modal" class="btn btn-success btn-md notika-btn-success">Batalkan</button>
                    <a href="<?= base_url("/proses/delete-konsultasi/" . $konsultasi->id)  ?>" class="btn btn-danger btn-md notika-btn-danger">Hapus</a>
                </center>
            </div>
        </div>
    </div>
</div>

<!-- modal konfirmasi reset konsultasi -->
<div class="modal fade" id="reset_konsultasi" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <h4> Yakin ingin menghapus "<span class="text-warning">semua materi konsultasi</span>" ?</h4>
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