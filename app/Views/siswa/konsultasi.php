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
                                    <h2>Konsultasi Siswa - BK ONLINE</h2>
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
<?php $validasi = \Config\Services::validation() ?>
<div class="box-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <div class="box-content notika-shadow mg-tb-30">
                    <div class="curved-inner-pro">
                        <div class="curved-ctn">
                            <h2>Buat Konsultasi</h2>
                            <hr>
                        </div>
                    </div>
                    <div class="">
                        <form action="<?= base_url("") ?>/proses/kirim-konsultasi" method="post" enctype="multipart/form-data">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-support"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control" name="nama_lengkap" placeholder="Full Name" required value="<?= $_SESSION['nama'] ?>">
                                    <input type="hidden" class="form-control" name="nis" required value="<?= $_SESSION['nis'] ?>">
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
                                <input type="hidden" name="id" value="<?= $_SESSION['id_siswa_login'] ?>"><br>
                            </div>
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-file"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="file" name="lampiran">
                                    <small>*Max 10 MB | JPG, JPEG, PNG</small>
                                </div>
                                <div class="mg-t-20 material-design-btn">
                                    <button type="submit" class="btn notika-btn-indigo btn-reco-mg btn-button-mg btn-block text-white">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-content notika-shadow">
                    <div class="curved-inner-pro">
                        <div class="curved-ctn">
                            <h2>Riwayat Konsultasi</h2>
                            <hr>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="data-table-basic">
                            <thead style="color:#fff;background:#bbbbbb">
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
                                    <tr id="<?= $r->id ?>">
                                        <td><?= $i += 1; ?></td>
                                        <td><?= $r->nama ?></td>
                                        <td><?= $r->subjek ?></td>
                                        <td><?= date("D, d M Y", strtotime($r->tanggal)) ?></td>
                                        <td>
                                            <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#hapus_<?= $r->id ?>">Hapus</button>
                                            <button type="button" class="badge badge-default" data-toggle="modal" data-target="#detail_<?= $r->id ?>">Detail</button>
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
                                                            <p><?= time_elapsed_string($r->tanggal) ?></p>
                                                        </div>
                                                    </div>
                                                    <small><?= $r->nama ?> | <?= $r->tanggal ?></small>
                                                    <hr>
                                                    <img src="<?= base_url("/public/konsultasi/" . $r->lampiran) ?>" alt="$r->lampiran">
                                                    <p class="pt-2"><?= str_replace(array("\r\n", "\r", "\n"), "<br/>", $r->deskripsi) ?></p>
                                                </div>
                                                <!-- <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div> -->
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
                    <h5>Konsultasi Saya</h5>
                    <hr>
                    <center>
                        <h4 class="counter"><?= $jml_konsultasi_saya ?></h4>
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