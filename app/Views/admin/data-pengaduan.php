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
                                    <h2>Data Pengaduan Siswa - Administrator</h2>
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
<div class="sale-statistic-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <div class="box-content notika-shadow mg-t-30">
                    <div class="curved-inner-pro">
                        <div class="curved-ctn">
                            <h4>Filter Data Riwayat</h4>
                            <hr>
                        </div>
                    </div>
                    <form action="" method="GET" id="cari_data_riwayat">
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
                                <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                    <label>Tanggal Awal</label>
                                    <div class=" input-group date nk-int-st">
                                        <span class="input-group-addon"></span>
                                        <input type="text" class="form-control" name="awal" placeholder="yyyy/mm/dd" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 mt-2">
                                <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
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
                                    <a href="<?= base_url('admin/data-riwayat'); ?>" class=" btn btn-success notika-btn-success">Refresh</a> &nbsp;
                                    <button type="submit" class="btn btn-primary notika-btn-primary" id="tombol_cari_data"> Cari Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-content nk-green notika-shadow mg-tb-30">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="data-table-basic">
                            <thead style="color:#fff;background:#bbbbbb">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengadu</th>
                                    <th>Subjek</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($pengaduan as $p) : ?>
                                    <tr id="<?= $p->id ?>">
                                        <td><?= $i += 1; ?></td>
                                        <td><?= $p->nama ?></td>
                                        <td><?= get_small_char($p->subjek, 30) ?></td>
                                        <td><?= tanggal($p->tanggal) ?></td>
                                        <td>
                                            <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#hapus_<?= $p->id ?>"><i class="fa fa-trash-o"></i></button>
                                            <button type="button" class="badge badge-default" data-toggle="modal" data-target="#detail_<?= $p->id ?>"><i class="fa fa-eye"></i></button>
                                        </td>
                                    </tr>

                                    <!-- modal detail pengaduan -->
                                    <div class="modal fade" id="detail_<?= $p->id ?>" role="dialog">
                                        <div class="modal-dialog modals-default">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="view-mail-hd">
                                                        <div class="view-mail-hrd">
                                                            <h4><?= $p->subjek ?></h4>
                                                        </div>
                                                        <div class="view-ml-rl">
                                                            <p><?= time_elapsed_string($p->tanggal) ?></p>
                                                        </div>
                                                    </div>
                                                    <small><?= $p->nama ?> | <?= $p->tanggal ?></small>
                                                    <hr>
                                                    <img src="<?= base_url("/public/pengaduan/" . $p->lampiran) ?>" alt="<?= $p->lampiran ?>">
                                                    <p class="pt-2"><?= str_replace(array("\r\n", "\r", "\n"), "<br/>", $p->deskripsi) ?></p>
                                                </div>
                                                <!-- <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal konfirmasi hapus -->
                                    <div class="modal fade" id="hapus_<?= $p->id ?>" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <center>
                                                        <h4> Yakin ingin menghapus pengaduan "<span class="text-warning"><?= $p->subjek ?></span>" ?</h4>
                                                        <div class="my-3">
                                                            <img src="<?= base_url("/public/img/alert.png") ?>" alt="alert1.png">
                                                        </div>
                                                        <span>Tindakan tidak dapat diurungkan!</span><br><br>
                                                    </center>
                                                </div>
                                                <div class="modal-footer">
                                                    <center>
                                                        <button type="button" data-dismiss="modal" class="btn btn-success btn-md notika-btn-success">Batalkan</button>
                                                        <a href="<?= base_url("/proses/delete_pengaduan/" . $p->id)  ?>" class="btn btn-danger btn-md notika-btn-danger">Hapus</a>
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
                        <button type="button" class="btn btn-success notika-btn-success" data-toggle="modal" data-target="#tambah">Tambah</button>
                        &nbsp;
                        <span data-toggle="tooltip" data-placement="bottom" title="Reset semua data"><button type="button" class="btn btn-warning warning-icon-notika" data-toggle="modal" data-target="#reset">Reset All</button></span>
                        &nbsp;
                        <a href="<?= base_url('admin/data-pengaduan-pdf?nama=' . $nama . '&awal=' . $awal . '&akhir=' . $akhir); ?>" target="_blank" class="btn btn-lightblue lightblue-icon-notika" data-toggle="tooltip" data-placement="bottom" title="Export to Pdf">Pdf</a>
                        &nbsp;
                        <a href="<?= base_url('admin/data-pengaduan-excell?nama=' . $nama . '&awal=' . $awal . '&akhir=' . $akhir); ?>" target="_blank" class="btn btn-teal teal-icon-notika" data-toggle="tooltip" data-placement="bottom" title="Export to Excell">Excell</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <div class="right-bar notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <h5>Pengaduan Siswa</h5>
                    <hr>
                    <center>
                        <h4 class="counter"><?= $jml_pengaduan ?></h4>
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

    <div class="modal fade" id="reset" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <center>
                        <h4> Yakin ingin menghapus semua data pengaduan ?</h4>
                        <div class="my-3">
                            <img src="<?= base_url("/public/img/alert.png") ?>" alt="alert1.png">
                        </div>
                        <span>Tindakan tidak dapat diurungkan!</span><br><br>
                    </center>
                </div>
                <div class="modal-footer">
                    <center>
                        <button type="button" data-dismiss="modal" class="btn btn-success btn-md notika-btn-success">Batalkan</button>
                        <a href="<?= base_url("/proses/5a2efc8fd504edad5e4867d73601f102") ?>" class="btn btn-danger btn-md notika-btn-danger">Hapus Semua</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sale Statistic area-->

    <!-- modal tambah pengaduan -->
    <div class="modal fade" id="tambah" role=" dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?= base_url("") ?>/proses/kirim-pengaduan" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-support"></i>
                            </div>
                            <div class="bootstrap-select fm-cmp-mg">
                                <select class="selectpicker" name="nis">
                                    <option value="0">Pilih Siswa</option>

                                    <?php foreach ($list_siswa as $p) : ?>
                                        <option value="<?= $p->nis ?>"><?= $p->nama ?></option>

                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-mail"></i>
                            </div>
                            <div class="nk-int-st">
                                <input type="text" class="form-control" name="subjek" placeholder="Subjek Pengaduan" required>
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
                                <input type="file" name="lampiran" required>
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

    <?= $this->endSection(""); ?>