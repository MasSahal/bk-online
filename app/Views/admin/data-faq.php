<?= $this->extend("admin/template") ?>

<?= $this->section("content"); ?>
<div class="breadcomb-area mg-b-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="notika-icon notika-support"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Frequently Asked Questions - Administrator</h2>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <button type="button" class="btn btn-primary notika-btn-primary" data-toggle="modal" data-target="#tambah_faq">Tambah FAQ</button> &nbsp;
                                <button type="button" class="btn btn-warning notika-btn-warning" data-toggle="modal" data-target="#reset_faq">Reset Semua</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- konten faq -->
<div class="sale-statistic-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box-content notika-shadow mg-b-30">
                    <div class="accordion-stn sm-res-mg-t-30">
                        <div class="panel-group" data-collapse-color="nk-blue" id="accordionBlue" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-collapse notika-accrodion-cus">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordionBlue" href="#accordionBlue-one" aria-expanded="true">
                                            FAQ - Aplikasi Bk-Online
                                        </a>
                                    </h4>
                                </div>
                                <div id="accordionBlue-one" class="collapse animated flipInX in" role="tabpanel">
                                    <div class="panel-body">
                                        <p>Aplikasi Bk Online adalah salah satu sarana yang dibuat oleh salah satu siswa dalam rangka mempermudah urusan bimbingan konseling untuk penerapannya di kehidupan sehari-hari</p>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $i = 0;
                            foreach ($list_faq as $r) { ?>

                                <div class="panel panel-collapse notika-accrodion-cus">
                                    <div class="panel-heading" role="tab">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionBlue" href="#accordion<?= $r->id ?>" aria-expanded="false">
                                                <?= $r->pertanyaan ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="accordion<?= $r->id ?>" class="collapse animated flipInX" role="tabpanel">
                                        <div class="panel-body">
                                            <p style="width:auto"><?= str_replace("\n", "&nbsp;", $r->jawaban) ?></p>
                                            <hr>
                                            <div class="mt-1">
                                                <button type="button" class="btn btn-sm btn-warning notika-btn-warning" data-toggle="modal" data-target="#edit_<?= $r->id ?>">Edit</button> &nbsp;
                                                <button type="button" class="btn btn-sm btn-danger notika-btn-danger" data-toggle="modal" data-target="#hapus_<?= $r->id ?>">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- modal edit faq -->
                                <div class="modal fade" id="edit_<?= $r->id ?>" role="dialog">
                                    <div class="modal-dialog modals-default ">
                                        <div class="modal-content">
                                            <form action="<?= base_url() ?>/proses/edit-data-faq" method="post">
                                                <div class="modal-body">
                                                    <center style="margin-bottom:30px" class="mg-b-20">
                                                        <h4>Edit Faq <?= $r->pertanyaan ?> </h4>
                                                    </center>
                                                    <div class="form-example-int form-horizental">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                    <label class="hrzn-fm" for="pertanyaan">Pertanyaan</label>
                                                                </div>
                                                                <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                                    <div class="nk-int-st">
                                                                        <input type="text" name="pertanyaan" id="pertanyaan" class="form-control" placeholder="Masukan pertanyaan" value="<?= $r->pertanyaan ?>" required>
                                                                        <input type="hidden" name="id" value="<?= $r->id ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                    <label class="hrzn-fm" for="jawaban">Jawaban</label>
                                                                </div>
                                                                <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                                    <div class="nk-int-st">
                                                                        <textarea name="jawaban" id="jawaban" rows="7" class="form-control" placeholder="Masukan jawaban" required><?= $r->jawaban ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer mt-3">
                                                    <button type="button" class="btn btn-warning notika-btn-warning" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success notika-btn-success">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah faq -->
<div class="modal fade" id="tambah_faq" role="dialog">
    <div class="modal-dialog modals-default ">
        <div class="modal-content">
            <form action="<?= base_url() ?>/proses/tambah-data-faq" method="post">
                <div class="modal-body">
                    <center style="margin-bottom:30px" class="mg-b-20">
                        <h4>Tambah FAQ</h4>
                    </center>
                    <div class="form-example-int form-horizental">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm" for="pertanyaan">Pertanyaan</label>
                                </div>
                                <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="text" name="pertanyaan" id="pertanyaan" class="form-control" placeholder="Masukan pertanyaan" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm" for="jawaban">Jawaban</label>
                                </div>
                                <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <textarea name="jawaban" id="jawaban" rows="7" class="form-control" placeholder="Masukan jawaban" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-3">
                    <button type="button" class="btn btn-warning notika-btn-warning" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success notika-btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal reset faq-->
<div class="modal fade" id="reset_faq" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <center>
                    <h4> Yakin ingin menghapus semua data FAQ ?</h4>
                    <div class="my-3">
                        <img src="<?= base_url("/public/img/alert.png") ?>" alt="alert1.png">
                    </div>
                    <span>Tindakan tidak dapat diurungkan!</span><br><br>
                </center>
            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" data-dismiss="modal" class="btn btn-success btn-md notika-btn-success">Batalkan</button>
                    <a href="<?= base_url("/proses/1fa71442e69554cbd67fecd52f7ced91") ?>" class="btn btn-danger btn-md notika-btn-danger">Hapus Semua</a>
                </center>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(""); ?>