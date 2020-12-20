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
                                    <h2>Riwayat Kejadian - Administrator</h2>
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
                <div class="box-content notika-shadow mg-t-30" id="data_riwayat">
                    <div class="table-responsive" id="print">
                        <h4 class='text-center mb-4 mt-1'><?= $judul; ?></h4>
                        <table class="table table-striped table-hover" id="data-table-basic">
                            <thead style="color:#fff;background:#bbbbbb">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Subjek</th>
                                    <th>Waktu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($riwayat as $r) : ?>
                                    <tr>
                                        <td><?= $i += 1 ?></td>
                                        <td><?= $r->nama ?></td>
                                        <td><?= get_small_char($r->subjek, 30) ?></td>
                                        <td><?= date('d-m-Y H-i-s', strtotime($r->created_at)) ?></td>
                                        <td>
                                            <button type="button" class="badge badge-default" data-toggle="modal" data-target="#detail_<?= $r->id ?>"><i class="fa fa-eye"></i></button>
                                        </td>
                                    </tr>

                                    <!-- modal detail Riwayat Kejadian -->
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
                                                        <!-- <div class="view-ml-rl">
                                                            <p><?= get_small_char($r->subjek, 50) ?></p>
                                                        </div> -->
                                                    </div>
                                                    <hr>
                                                    <p><?= $r->nama ?> : <?= $r->created_at ?></p>
                                                    <p><?= $r->catatan ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="pt-3 material-design-btn">
                        <span data-toggle="tooltip" data-placement="bottom" title="Reset semua data"><button type="button" class="btn btn-warning warning-icon-notika" data-toggle="modal" data-target="#reset">Reset All</button></span>
                        &nbsp;
                        <a href="<?= base_url('admin/data-riwayat-pdf?nama=' . $nama . '&awal=' . $awal . '&akhir=' . $akhir); ?>" target="_blank" class="btn btn-lightblue lightblue-icon-notika" data-toggle="tooltip" data-placement="bottom" title="Export to Pdf">Pdf</a>
                        &nbsp;
                        <a href="<?= base_url('admin/data-riwayat-excell?nama=' . $nama . '&awal=' . $awal . '&akhir=' . $akhir); ?>" target="_blank" class="btn btn-teal teal-icon-notika" data-toggle="tooltip" data-placement="bottom" title="Export to Excell">Excell</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <div class="right-bar notika-shadow mg-t-30">
                    <h5>Riwayat Kejadian</h5>
                    <hr>
                    <center>
                        <h4 class="counter"><?= $jml_riwayat ?></h4>
                    </center>
                </div>
                <div class="right-bar notika-shadow mg-t-30">
                    <center>
                        <img src="<?= base_url() ?>/public/attention/<?= rand(1, 8) ?>.gif" alt="<?= rand(1, 8) ?>.gif">
                    </center>
                </div>
                <div class="right-bar mg-t-30 p-20 ">
                    <h5>Hari ini</h5>
                    <hr>
                    <center>
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

<!-- modal reset Riwayat Kejadian-->
<div class="modal fade" id="reset" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <center>
                    <h4> Yakin ingin menghapus semua data riwayat termasuk yang di pilih ?</h4>
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

<?= $this->endSection(""); ?>