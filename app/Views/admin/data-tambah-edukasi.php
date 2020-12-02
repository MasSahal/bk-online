<?= $this->extend("admin/template"); ?>
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
                                    <h2>Tambah Materi Edukasi - Administrator</h2>
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

<div class="sale-statistic-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="box-content notika-shadow mg-tb-30">
                    <form action="<?= base_url() ?>/proses/tambah-data-edukasi" method="post">
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Judul</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control" name="judul" placeholder="Judul Materi" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Video Materi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control" name="link_video" placeholder="Link Youtube" required>
                                            <small>Hanya bisa memasukan video dari Youtube</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Isi Materi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <textarea name="deskripsi" class="form-control auto-size" placeholder="Masukan deskripsi materi" rows="10" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                        <div class="mg-t-20 material-design-btn">
                                            <button type="submit" class="btn btn-success notika-btn-success btn-reco-mg btn-button-mg btn-block">Submit Materi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                                <li><a href="<?= base_url('/admin/data-edukasi/') ?>"><i class="notika-icon notika-menus"></i> List Materi</a></li>
                                <li><a href="<?= base_url('/admin/data-tambah-edukasi/') ?>"><i class="notika-icon notika-edit"></i> Tambah</a></li>
                                <li><a href="#" data-toggle="modal" data-target="delete_<?   ?>"><i class="notika-icon notika-trash"></i> Hapus Semua</a></li>
                            </ul>
                        </div>
                    </div>
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