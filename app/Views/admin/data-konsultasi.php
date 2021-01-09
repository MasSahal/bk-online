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
                                    <h2>Data Konsultasi Siswa - Administrator</h2>
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
                <div class="box-content notika-shadow mg-t-30">
                    <div class="curved-inner-pro">
                        <div class="curved-ctn">
                            <h4>Filter Data Konsultasi</h4>
                            <hr>
                        </div>
                    </div>
                    <form method="GET">
                        <div class=" row">
                            <div class="col-lg-3 mt-2">
                                <div class="form-group nk-datapk-ctm form-elet-mg">
                                    <label>Nama</label>
                                    <div class=" input-group nk-int-st">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukan nama..." autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mt-2">
                                <div class="form-group nk-datapk-ctm form-elet-mg" id="date_pick">
                                    <label>Tanggal Awal</label>
                                    <div class=" input-group date nk-int-st">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" name="awal" placeholder="yyyy/mm/dd" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mt-2">
                                <div class="form-group nk-datapk-ctm form-elet-mg" id="date_pick">
                                    <label>Tanggal Akhir</label>
                                    <div class=" input-group date nk-int-st">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" name="akhir" placeholder="dd/mm/yyyy" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mt-2">
                                <!-- <label>&nbsp;</label> -->
                                <div class="text-left mt-4">
                                    <a href="<?= base_url('admin/data-konsultasi'); ?>" class=" btn btn-success notika-btn-success">Refresh</a> &nbsp;
                                    <button type="submit" class="btn btn-primary notika-btn-primary" id="tombol_cari_data"> Cari Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-content notika-shadow mg-tb-30">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="data-table-basic">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Subjek</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($list_konsultasi as $r) : ?>
                                    <tr id="link">
                                        <td><?= $i += 1; ?></td>
                                        <td data-href="<?= base_url('/admin/dashboard'); ?>">
                                            <span>
                                                <?= $r->nama ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('/admin/data-konsultasi-view/' . $r->id); ?>" class="text-link">
                                                <?= get_small_char($r->subjek, 20); ?>
                                            </a>
                                        </td>
                                        <td><?= tanggal($r->created_at) ?></td>
                                        <td id="no-link">
                                            <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#hapus_<?= $r->id ?>"><i class="fa fa-trash-o"></i></button>
                                            <button type="button" class="badge badge-default" data-toggle="modal" data-target="#detail_<?= $r->id ?>"><i class="fa fa-eye"></i></button>
                                            <?php if ($r->status != 'dibaca') {; ?>
                                                <span data-toggle="tooltip" data-placement="bottom" title="Tandai sudah di baca!">
                                                    <button type="button" class="badge badge-success dibaca" data-toggle="modal" data-target="#dibaca_<?= $r->id ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                </span>
                                            <?php } ?>
                                        </td>
                                    </tr>

                                    <!-- modal detail konsultasi -->
                                    <div class="modal fade" id="detail_<?= $r->id ?>" role="dialog">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="view-mail-hd">
                                                        <div class="view-mail-hrd">
                                                            <h4><?= $r->subjek ?></h4>
                                                        </div>
                                                        <div class="view-ml-rl">
                                                            <p><?= time_elapsed_string($r->created_at) ?></p>
                                                        </div>
                                                    </div>
                                                    <small><?= $r->nama ?> | <?= $r->created_at ?></small>
                                                    <hr>
                                                    <?php if ($r->lampiran != "none") { ?>
                                                        <img src="<?= base_url("/public/konsultasi/" . $r->lampiran) ?>" alt="$r->lampiran">
                                                    <?php } ?>
                                                    <p class="pt-2"><?= str_replace(array("\r\n", "\r", "\n"), "<br/>", $r->deskripsi) ?></p>
                                                </div>
                                                <!-- <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal konfirmasi dibaca -->
                                    <div class="modal fade" id="dibaca_<?= $r->id ?>" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <center>
                                                        <h4> Tandai telah dibaca konsultasi "<span class="text-warning"><?= $r->subjek ?></span>" ?</h4>
                                                        <br><br>
                                                    </center>
                                                </div>
                                                <div class="modal-footer">
                                                    <center>
                                                        <button type="button" data-dismiss="modal" class="btn btn-warning notika-btn-warning">Batalkan</button>
                                                        <a href="<?= base_url("/proses/delete_konsultasi/" . $r->id)  ?>" class="btn btn-success notika-btn-success">Hapus</a>
                                                    </center>
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
                                                        <h4> Yakin ingin menghapus konsultasi "<span class="text-warning"><?= $r->subjek ?></span>" ?</h4>
                                                        <center class="my-3">
                                                            <img src="<?= base_url("/public/img/alert.png") ?>" alt="alert1.png">
                                                        </center>
                                                        <span>Tindakan tidak dapat diurungkan!</span><br><br>
                                                    </center>
                                                </div>
                                                <div class="modal-footer">
                                                    <center>
                                                        <button type="button" data-dismiss="modal" class="btn btn-success btn-md notika-btn-success">Batalkan</button>
                                                        <a href="<?= base_url("/proses/delete_konsultasi/" . $r->id)  ?>" class="btn btn-danger btn-md notika-btn-danger">Hapus</a>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="pt-3 material-design-btn">
                        <span data-toggle="tooltip" data-placement="bottom" title="Tambah data"><button type="button" class="btn btn-success notika-btn-success" data-toggle="modal" data-target="#tambah">Tambah</button></span>
                        &nbsp;
                        <span data-toggle="tooltip" data-placement="bottom" title="Reset semua data"><button type="button" class="btn btn-warning warning-icon-notika" data-toggle="modal" data-target="#reset">Reset All</button></span>
                        &nbsp;
                        <a href="<?= base_url('admin/data-konsultasi-pdf?nama=' . $nama . '&awal=' . $awal . '&akhir=' . $akhir); ?>" target="_blank" class="btn btn-lightblue lightblue-icon-notika" data-toggle="tooltip" data-placement="bottom" title="Export to Pdf">Pdf</a>
                        &nbsp;
                        <a href="<?= base_url('admin/data-konsultasi-excell?nama=' . $nama . '&awal=' . $awal . '&akhir=' . $akhir); ?>" target="_blank" class="btn btn-teal teal-icon-notika" data-toggle="tooltip" data-placement="bottom" title="Export to Excell">Excell</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <div class="right-bar notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <h5>Konsultasi Siswa</h5>
                    <hr>
                    <center>
                        <h4 class="counter"><?= $jml_konsultasi ?></h4>
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

<!-- modal reset konsultasi-->
<div class="modal fade" id="reset" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <center>
                    <h4> Yakin ingin menghapus semua data konsultasi ?</h4><br>
                    <div class="my-3">
                        <img src="<?= base_url("/public/img/alert.png") ?>" alt="alert.png">
                    </div>
                    <span>Tindakan tidak dapat diurungkan!</span><br><br>
                </center>
            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" data-dismiss="modal" class="btn btn-success btn-md notika-btn-success">Batalkan</button>
                    <a href="<?= base_url("/proses/bfd3e581b43029e82c36b4b4976c1ea7") ?>" class="btn btn-danger btn-md notika-btn-danger">Hapus Semua</a>
                </center>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah konsultasi -->
<div class="modal fade" id="tambah" role="dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= base_url("") ?>/proses/kirim-konsultasi" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group ic-cmp-int">
                        <div class="form-ic-cmp">
                            <i class="notika-icon notika-support"></i>
                        </div>
                        <div class="bootstrap-select fm-cmp-mg">
                            <select class="selectpicker" name="nis">
                                <option value="NULL">Pilih - Siswa</option>

                                <?php foreach ($list_siswa as $r) : ?>
                                    <option value="<?= $r->nis ?>"><?= $r->nama ?></option>

                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ic-cmp-int">
                        <div class="form-ic-cmp">
                            <i class="notika-icon notika-mail"></i>
                        </div>
                        <div class="nk-int-st">
                            <input type="text" class="form-control" name="subjek" placeholder="Subjek Konsultasi" required>
                        </div>
                    </div>
                    <div class="form-group ic-cmp-int">
                        <div class="form-ic-cmp">
                            <i class="notika-icon notika-edit"></i>
                        </div>
                        <div class="nk-int-st">
                            <textarea class="form-control auto-size" rows="6" name="deskripsi" placeholder="Deskripsi" required></textarea>
                        </div>
                    </div>
                    <div class="form-group ic-cmp-int">
                        <div class="form-ic-cmp">
                            <i class="notika-icon notika-file"></i>
                        </div>
                        <div class="nk-int-st">
                            <input type="file" name="lampiran">
                            <small>*Max 10 MB | JPG, JPEG, PNG</small>
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
<?= $this->endSection(); ?>