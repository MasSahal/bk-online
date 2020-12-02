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
                                    <h2>Jenis Pelanggaran - Administrator</h2>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
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
                <div class="box-content notika-shadow mg-tb-30">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="data-table-basic">
                            <thead style="color:#fff;background:#bbbbbb">
                                <tr>
                                    <th>No</th>
                                    <th>Pelanggaran</th>
                                    <th>Poin Pelanggaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($list_pelanggaran as $r) : ?>
                                    <tr id="<?= $r->id ?>">
                                        <td><?= $i += 1; ?></td>
                                        <td><?= $r->pelanggaran ?></td>
                                        <td><?= $r->poin_pelanggaran ?></td>
                                        <td>
                                            <button type="button" class="badge badge-default" data-toggle="modal" data-target="#detail_<?= $r->id ?>">Detail</button>
                                            <button type="button" class="badge badge-warning" data-toggle="modal" data-target="#edit_<?= $r->id ?>">Edit</button>
                                            <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#hapus_<?= $r->id ?>">Hapus</button>
                                        </td>
                                    </tr>

                                    <!-- modal detail pelanggaran -->
                                    <div class="modal fade" id="detail_<?= $r->id ?>" role="dialog">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="view-mail-hd">
                                                        <div class="view-mail-hrd">
                                                            <h4><?= $r->pelanggaran ?></h4>
                                                        </div>
                                                        <div class="view-ml-rl">
                                                            <p><?= $r->poin_pelanggaran ?> Poin</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <p class="pt-2"><?= $r->keterangan ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal edit pelanggaran -->
                                    <div class="modal fade" id="edit_<?= $r->id ?>" role="dialog">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <form action="<?= base_url() ?>/proses/edit-data-pelanggaran" method="post">
                                                    <div class="modal-body">
                                                        <div class="form-group ic-cmp-int">
                                                            <div class="form-ic-cmp">
                                                                <i class="notika-icon notika-mail"></i>
                                                            </div>
                                                            <div class="nk-int-st">
                                                                <input type="hidden" name="id" value="<?= $r->id ?>" required>
                                                                <input type="text" class="form-control" name="pelanggaran" placeholder="Subjek Pelanggaran" value="<?= $r->pelanggaran ?>" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group ic-cmp-int">
                                                            <div class="form-ic-cmp">
                                                                <i class="notika-icon notika-edit"></i>
                                                            </div>
                                                            <div class="nk-int-st">
                                                                <input type="number" class="form-control" min="1" max="10" name="poin_pelanggaran" placeholder="Poin Pelanggaran" value="<?= $r->poin_pelanggaran ?>" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group ic-cmp-int">
                                                            <div class="form-ic-cmp">
                                                                <i class="notika-icon notika-edit"></i>
                                                            </div>
                                                            <div class="nk-int-st">
                                                                <textarea class="form-control auto-size" rows="6" name="keterangan" placeholder="Keterangan" required><?= $r->keterangan ?></textarea>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning notika-btn-warning" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success notika-btn-success">Simpan Perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal konfirmasi hapus -->
                                    <div class="modal fade" id="hapus_<?= $r->id ?>" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <center>
                                                        <h4> Yakin ingin menghapus pelanggaran "<span class="text-warning"><?= $r->pelanggaran ?></span>" ?</h4>
                                                        <div class="my-3">
                                                            <img src="<?= base_url("/public/img/alert.png") ?>" alt="alert1.png">
                                                        </div>
                                                        <span>Tindakan tidak dapat diurungkan!</span><br><br>
                                                    </center>
                                                </div>
                                                <div class="modal-footer">
                                                    <center>
                                                        <button type="button" data-dismiss="modal" class="btn btn-success btn-md notika-btn-success">Batalkan</button>
                                                        <a href="<?= base_url("/proses/delete_pelanggaran/" . $r->id)  ?>" class="btn btn-danger btn-md notika-btn-danger">Hapus</a>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="pt-3">
                        <button type="button" class="btn btn-success notika-btn-success" data-toggle="modal" data-target="#tambah_pelanggaran">Tambah Jenis Pelanggaran</button> &nbsp;
                        <button type="button" class="btn btn-warning notika-btn-warning" data-toggle="modal" data-target="#reset_pelanggaran">Reset Semua</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <div class="right-bar notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <h5>pelanggaran Siswa</h5>
                    <hr>
                    <center>
                        <h4 class="counter"><?= $pelanggaran ?></h4>
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

<!-- modal reset pelanggaran-->
<div class="modal fade" id="reset_pelanggaran" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <center>
                    <h4> Yakin ingin menghapus semua data pelanggaran ?</h4>
                    <div class="my-3">
                        <img src="<?= base_url("/public/img/alert.png") ?>" alt="alert1.png">
                    </div>
                    <span>Tindakan tidak dapat diurungkan!</span><br><br>
                </center>
            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" data-dismiss="modal" class="btn btn-success btn-md notika-btn-success">Batalkan</button>
                    <a href="<?= base_url("/proses/cdfd837e007a6f036c70b58f5b2603da") ?>" class="btn btn-danger btn-md notika-btn-danger">Hapus Semua</a>
                </center>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah data pelanggaran -->
<div class="modal fade" id="tambah_pelanggaran" role=" dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= base_url("") ?>/proses/kirim-pelanggaran" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group ic-cmp-int">
                        <div class="form-ic-cmp">
                            <i class="notika-icon notika-mail"></i>
                        </div>
                        <div class="nk-int-st">
                            <input type="text" class="form-control" name="pelanggaran" placeholder="Subjek Pelanggaran" required>
                        </div>
                    </div>

                    <div class="form-group ic-cmp-int">
                        <div class="form-ic-cmp">
                            <i class="notika-icon notika-edit"></i>
                        </div>
                        <div class="bootstrap-select fm-cmp-mg">
                            <select class="selectpicker" name="poin_pelanggaran">
                                <option value="0">Pilih Poin Pelanggaran</option>
                                <?php
                                $n = 0;
                                for ($x = 1; $x <= 10; $x++) { ?>
                                    <option value="<?= $n + $x ?>"><?= $n + $x ?> Poin</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group ic-cmp-int">
                        <div class="form-ic-cmp">
                            <i class="notika-icon notika-edit"></i>
                        </div>
                        <div class="nk-int-st">
                            <textarea class="form-control auto-size" rows="6" name="keterangan" placeholder="Keterangan" required></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning notika-btn-warning" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success notika-btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Sale Statistic area-->
<?= $this->endSection(""); ?>