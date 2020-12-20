<?= $this->extend("admin/template") ?>

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
                                    <h2>Data Edukasi - Administrator</h2>
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

<?= $this->renderSection('content') ?>

<!-- Start Sale Statistic area-->
<div class="sale-statistic-area">
    <div class="container">
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <div class="box-content notika-shadow mg-tb-30">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="data-table-basic">
                            <thead style="color:#fff;background:#bbbbbb">
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($list_edukasi as $le) { ?>
                                    <tr>
                                        <td><?= $i += 1 ?></td>
                                        <td><a href="<?= base_url('/admin/data-edukasi/view/' . $le->id_pemutaran) ?>" class="text-link" style="pading:100%"><?= $le->judul ?></a></td>
                                        <td>
                                            <!-- <a href="<?= base_url('/admin/data-edukasi-view/' . $le->id) ?>" class="badge badge-success">Lihat Detail</a> -->
                                            <a href="<?= base_url('/admin/data-edukasi/view-edit/' . $le->id_pemutaran) ?>" class="badge badge-warning"><i class="notika-icon notika-edit"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#hapus_<?= $le->id ?>" class="badge badge-danger"><i class="notika-icon notika-trash"></i></a>
                                        </td>
                                    </tr>

                                    <!-- modal konfirmasi hapus -->
                                    <div class="modal fade" id="hapus_<?= $le->id ?>" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <center>
                                                        <h4> Yakin ingin menghapus materi "<span class="text-warning"><?= $le->judul ?></span>" ?</h4>
                                                        <div class="my-3">
                                                            <img src="<?= base_url("/public/img/alert.png") ?>" alt="alert1.png">
                                                        </div>
                                                        <span>Tindakan tidak dapat diurungkan!</span><br><br>
                                                    </center>
                                                </div>
                                                <div class="modal-footer">
                                                    <center>
                                                        <button type="button" data-dismiss="modal" class="btn btn-success btn-md notika-btn-success">Batalkan</button>
                                                        <a href="<?= base_url("/proses/delete-edukasi/" . $le->id)  ?>" class="btn btn-danger btn-md notika-btn-danger">Hapus</a>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="pt-3">
                        <button type="button" class="btn btn-primary notika-btn-primary" data-toggle="modal" data-target="#tambah_edukasi">Tambah Materi</button> &nbsp;
                        <button type="button" class="btn btn-warning notika-btn-warning" data-toggle="modal" data-target="#reset_edukasi">Reset Semua</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <div class="right-bar notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <h5>Materi Edukasi</h5>
                    <hr>
                    <center>
                        <h4 class="counter"><?= $jml_edukasi ?></h4>
                    </center>
                </div>
                <div class="right-bar notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <div class="inbox-left-sd">
                        <div class="compose-ml">
                            <h5>Pengaturan Data</h5>
                            <hr>
                        </div>
                        <div class="inbox-status">
                            <ul class="inbox-st-nav">
                                <li><a href="<?= base_url('/admin/data-tambah-edukasi/') ?>"><i class="notika-icon notika-draft"></i> Tambah</a></li>
                                <li><a href="<?= base_url('/admin/data-edukasi/') ?>"><i class="notika-icon notika-menus"></i> List Materi</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#reset_edukasi"><i class="notika-icon notika-trash"></i> Hapus Semua</a></li>
                                <!-- <li><a href="#" data-toggle="modal" data-target="#tag_<?     ?>"><i class="notika-icon notika-flag"></i> Tag</a></li> --->
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

<!-- Modal tambah edukasi-->
<div class="modal fade" id="tambah_edukasi" role="dialog">
    <div class="modal-dialog modals-default" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/proses/tambah-data-edukasi" method="post">
                <div class="modal-body">
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
                                    <label class="hrzn-fm">Tag</label>
                                </div>
                                <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="text" neme="tag" data-role="tagsinput" id="tags_input">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning notika-btn-warning" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success notika-btn-success">Submit Materi</button>
                </div>
            </form>
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
<?= $this->endSection(""); ?>