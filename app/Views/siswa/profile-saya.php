<?= $this->extend("siswa/template") ?>

<?= $this->section("content"); ?>

<div class="invoice-print">
    <a href="#" class="btn" data-ma-action="print"><i class="notika-icon notika-print"></i></a>
</div>

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
                                    <h2>Profile Saya - Bk Online</h2>
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
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <div class="box-content notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <div class="contact-list">
                        <div class="contact-win">
                            <div class="contact-img">
                                <?php if ($profile_saya->jenis_kelamin == "L") { ?>
                                    <img src="<?= base_url() ?>/public/profile/default-lk.png" alt="default-lk.png" style="margin-top:0px !important;">
                                <?php } elseif ($profile_saya->jenis_kelamin == "P") { ?>
                                    <img src="<?= base_url() ?>/public/profile/default-pr.png" alt="default-pr.png" style="margin-top:0px !important;">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="contact-ctn">
                            <div class="contact-ad-hd">
                                <h2><?= $profile_saya->nama ?></h2>
                                <p class="ctn-ads"><?= $profile_saya->alamat ?></p>
                            </div>
                        </div>

                        <div class="social-st-list">
                            <div class="social-sn">
                                <hr>
                                <h2>Poin Pelanggaran:</h2>
                                <?php if ($profile_saya->poin_pelanggaran >= 0 && $profile_saya->poin_pelanggaran <= 20) { ?>
                                    <p class="counter"><?= $profile_saya->poin_pelanggaran ?></p>
                                <?php } elseif ($profile_saya->poin_pelanggaran >= 21 && $profile_saya->poin_pelanggaran <= 50) { ?>
                                    <p class="counter text-info"><?= $profile_saya->poin_pelanggaran ?></p>
                                <?php } elseif ($profile_saya->poin_pelanggaran >= 51 && $profile_saya->poin_pelanggaran <= 80) { ?>
                                    <p class="counter text-warning"><?= $profile_saya->poin_pelanggaran ?></p>
                                <?php } elseif ($profile_saya->poin_pelanggaran >= 81) { ?>
                                    <p class="counter text-danger"><?= $profile_saya->poin_pelanggaran ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="right-bar notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <center>
                        <img src="<?= base_url() ?>/public/attention/<?= rand(1, 8) ?>.gif" alt="<?= rand(1, 8) ?>.gif">
                    </center>
                </div>
            </div>

            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <div class="box-content notika-shadow mg-tb-30">
                    <div class="contact-list">
                        <div class="contact-win">
                            <div class="conct-sc-ic">
                                <span data-toggle="tooltip" data-placement="left" title="Edit">
                                    <a href="#" class=" btn btn-teal teal-icon-notika" data-toggle="modal" data-target="#edit_<?= $profile_saya->id ?>"><i class="notika-icon notika-menu"></i></a>
                                </span>
                                <span data-toggle="tooltip" data-placement="left" title="Ubah Password">
                                    <a href="#" class=" btn btn-warning warning-icon-notika" data-toggle="modal" data-target="#edit_pw_<?= $profile_saya->id ?>"><i class="notika-icon notika-draft"></i></a>
                                </span>
                            </div>
                        </div>
                        <div class="contact-ctn">
                            <div class="contact-ad-hd">
                                <h2><?= $profile_saya->nama ?></h2>
                                <p class="ctn-ads"><?= $profile_saya->alamat ?></p>
                            </div>
                        </div>
                        <div class="social-st-list">
                            <div class="social-sn">
                                <hr>
                                <h2>Siswa</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Sale Statistic area-->

<!-- modal edit password -->
<div class="modal fade" id="edit_pw_<?= $profile_saya->id ?>" role="dialog">
    <div class="modal-dialog modals-default ">
        <div class="modal-content">
            <form action="<?= base_url() ?>/proses/edit-password-siswa" method="post">
                <div class="modal-body">
                    <center style="margin-bottom:30px" class="mg-b-20">
                        <h4>Edit Password <?= $profile_saya->nama ?> </h4>
                    </center>
                    <div class="form-example-int form-horizental">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">Password Lama</label>
                                </div>
                                <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="text" name="password" class="form-control" placeholder="Masukan password" value="<?= $profile_saya->password ?>" required disabled>
                                        <input type="hidden" name="id" value="<?= $profile_saya->id ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">Password Baru</label>
                                </div>
                                <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="text" name="password-baru" class="form-control" placeholder="Masukan password baru" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">Konfirmasi Password</label>
                                </div>
                                <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="text" name="password-konfir" class="form-control" placeholder="Masukan konfirmasi password" required>
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

<!-- modal tambah data profile admin -->
<div class="modal fade" id="tambah_admin" role=" dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= base_url("") ?>/proses/tambah-profile-admin" method="post">
                <div class="modal-body">
                    <center style="margin-bottom:30px" class="mg-b-20">
                        <img src="<?= base_url("") ?>/assets/img/logo/logo-fhd.png" style="margin-bottom:10px; height:50px !important;" alt="bk online logo">
                        <h5>Pendaftaran Admin</h5>
                    </center>
                    <div class="form-example-int form-horizental">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">Kode Admin</label>
                                </div>
                                <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="number" name="kode_admin" class="form-control" placeholder="Masukan Kode Admin">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-example-int form-horizental">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">Nama Lengkap</label>
                                </div>
                                <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama lengkap" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-example-int form-horizental">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">Email</label>
                                </div>
                                <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-example-int form-horizental">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">Password</label>
                                </div>
                                <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-example-int form-horizental">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">Alamat</label>
                                </div>
                                <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <textarea class="form-control auto-size" rows="4" name="alamat" placeholder="Alamat" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-example-int form-horizental">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">Jenis Kelamin</label>
                                </div>
                                <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <div class="fm-checkbox">
                                            <label><input type="radio" checked="" value="L" name="jenis_kelamin" class="i-checks"> <i></i> Laki Laki</label>
                                            &nbsp;&nbsp;
                                            <label><input type="radio" value="P" name="jenis_kelamin" class="i-checks"> <i></i>Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

<!-- modal reset data profile admin-->
<div class="modal fade" id="reset_admin" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <center>
                    <h4> Yakin ingin menghapus semua data profile admin ?</h4>
                    <div class="my-3">
                        <img src="<?= base_url("/public/img/alert.png") ?>" alt="alert1.png">
                    </div>
                    <span>Tindakan tidak dapat diurungkan!</span><br><br>
                </center>
            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" data-dismiss="modal" class="btn btn-success btn-md notika-btn-success">Batalkan</button>
                    <a href="<?= base_url("/proses/acb52b147e0a0014ce9ffcede18f1c63") ?>" class="btn btn-danger btn-md notika-btn-danger">Hapus Semua</a>
                </center>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(""); ?>