<?= $this->extend("admin/template") ?>

<?= $this->section("content"); ?>

<!-- Start Sale Statistic area-->
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
                                    <h2>Profile Siswa Terdaftar - Administrator</h2>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <button type="button" class="btn btn-primary notika-btn-primary" data-toggle="modal" data-target="#tambah_siswa">Tambah Profile Siswa</button> &nbsp;
                                <button type="button" class="btn btn-warning notika-btn-warning" data-toggle="modal" data-target="#reset_siswa">Reset Semua</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="sale-statistic-area" style=" min-height:250px">
    <div class="container">
        <div class="row">
            <?php foreach ($list_siswa as $s) { ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="contact-list mg-b-30 sm-res-mg-t-0">
                        <div class="contact-win">
                            <div class="contact-img">
                                <?php if ($s->jenis_kelamin == "L") { ?>
                                    <img src="<?= base_url() ?>/public/profile/default-lk.png" alt="">
                                <?php } elseif ($s->jenis_kelamin == "P") { ?>
                                    <img src="<?= base_url() ?>/public/profile/default-pr.png" alt="">
                                <?php } ?>
                            </div>
                            <div class="conct-sc-ic">
                                <span data-toggle="tooltip" data-placement="left" title="Edit">
                                    <a href="#" class=" btn btn-teal teal-icon-notika" data-toggle="modal" data-target="#edit_<?= $s->id ?>"><i class="notika-icon notika-menu"></i></a>
                                </span>
                                <span data-toggle="tooltip" data-placement="left" title="Ubah Password">
                                    <a href="#" class=" btn btn-warning warning-icon-notika" data-toggle="modal" data-target="#edit_pw_<?= $s->id ?>"><i class="notika-icon notika-draft"></i></a>
                                </span>
                                <span data-toggle="tooltip" data-placement="left" title="Hapus">
                                    <a href="#" class=" btn btn-danger danger-icon-notika" data-toggle="modal" data-target="#hapus_<?= $s->id ?>"><i class="notika-icon notika-close"></i></a>
                                </span></div>
                        </div>
                        <div class="contact-ctn" style="min-height:200px !important">
                            <div class="contact-ad-hd">
                                <h2><?= $s->nama ?></h2>
                                <p class="ctn-ads"><?= $s->alamat ?></p>
                            </div>
                            <p>Saya adalah siswa SMK Informatika Al Irsyad Al Islamiyyah. Saya duduk di bangku kelas <?= $s->kelas ?> jurusan <?= $s->jurusan ?></p>
                        </div>
                        <div class="social-st-list">
                            <div class="social-sn">
                                <h2>Poin Pelanggaran:</h2>
                                <p class="counter"><?= $s->poin_pelanggaran ?></p>
                            </div>
                            <div class="social-sn">
                                <h2>Health:</h2>
                                <p><span class="counter"><?= rand(1, 99) ?></span> / <span class="counter">100</span>%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal konfirmasi hapus -->
                <div class="modal fade" id="hapus_<?= $s->id ?>" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body">
                                <center>
                                    <h4> Yakin ingin menghapus siswa "<span class="text-warning"><?= $s->nama ?></span>" ?</h4>
                                    <div class="my-3">
                                        <img src="<?= base_url("/public/img/alert.png") ?>" alt="alert1.png">
                                    </div>
                                    <span>Tindakan tidak dapat diurungkan!</span><br><br>
                                </center>
                            </div>
                            <div class="modal-footer">
                                <center>
                                    <button type="button" data-dismiss="modal" class="btn btn-success btn-md notika-btn-success">Batalkan</button>
                                    <a href="<?= base_url("/proses/delete-profile-siswa/" . $s->id)  ?>" class="btn btn-danger btn-md notika-btn-danger">Hapus</a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal edit password -->
                <div class="modal fade" id="edit_pw_<?= $s->id ?>" role="dialog">
                    <div class="modal-dialog modals-default ">
                        <div class="modal-content">
                            <form action="<?= base_url() ?>/proses/edit-password-siswa" method="post">
                                <div class="modal-body">
                                    <center style="margin-bottom:30px" class="mg-b-20">
                                        <h4>Edit Password <?= $s->nama ?> </h4>
                                    </center>
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Password Lama</label>
                                                </div>
                                                <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" name="password" class="form-control" placeholder="Masukan password" value="<?= $s->password ?>" required disabled>
                                                        <input type="hidden" name="id" value="<?= $s->id ?>">
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

                <!-- modal edit data profile siswa -->
                <div class="modal fade" id="edit_<?= $s->id ?>" role=" dialog">
                    <div class="modal-dialog modals-default">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="<?= base_url("") ?>/proses/edit-profile-siswa" method="post">
                                <div class="modal-body">
                                    <center style="margin-bottom:30px" class="mg-b-20">
                                        <h4>Edit Data Profile <?= $s->nama ?> </h4>
                                    </center>
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">NIS</label>
                                                </div>
                                                <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="number" name="nis" class="form-control" placeholder="Masukan NIS" value="<?= $s->nis ?>" required>
                                                        <input type="hidden" name="id" value="<?= $s->id ?>">
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
                                                        <input type="text" class="form-control" name="nama" placeholder="Nama lengkap" value="<?= $s->nama ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Kelas</label>
                                                </div>
                                                <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <div class="fm-checkbox">
                                                            <?php if ($s->kelas == 10) { ?>
                                                                <label><input type="radio" checked value="10" name="kelas" class="i-checks"> <i></i> Kelas 10</label>
                                                                &nbsp;&nbsp;
                                                                <label><input type="radio" value="11" name="kelas" class="i-checks"> <i></i> Kelas 11</label>
                                                                &nbsp;&nbsp;
                                                                <label><input type="radio" value="12" name="kelas" class="i-checks"> <i></i>Kelas 12</label>

                                                            <?php } elseif ($s->kelas == 11) { ?>
                                                                <label><input type="radio" value="10" name="kelas" class="i-checks"> <i></i> Kelas 10</label>
                                                                &nbsp;&nbsp;
                                                                <label><input type="radio" checked value="11" name="kelas" class="i-checks"> <i></i> Kelas 11</label>
                                                                &nbsp;&nbsp;
                                                                <label><input type="radio" value="12" name="kelas" class="i-checks"> <i></i>Kelas 12</label>

                                                            <?php } elseif ($s->kelas == 12) { ?>
                                                                <label><input type="radio" value="10" name="kelas" class="i-checks"> <i></i> Kelas 10</label>
                                                                &nbsp;&nbsp;
                                                                <label><input type="radio" value="11" name="kelas" class="i-checks"> <i></i> Kelas 11</label>
                                                                &nbsp;&nbsp;
                                                                <label><input type="radio" checked value="12" name="kelas" class="i-checks"> <i></i>Kelas 12</label>
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Jurusan</label>
                                                </div>
                                                <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="bootstrap-select fm-cmp-mg">
                                                        <select class="selectpicker" name="jurusan">
                                                            <?php if ($s->jurusan == "Rekayasa Perangkat Lunak") { ?>
                                                                <option value="Rekayasa Perangkat Lunak" selected>Rekayasa Perangkat Lunak</option>
                                                                <option value="Multimedia">Multimedia</option>
                                                                <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                                                                <option value="Manajmen Informatika">Manajmen Informatika</option>

                                                            <?php } else if ($s->jurusan == "Multimedia") { ?>
                                                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                                                <option value="Multimedia" selected>Multimedia</option>
                                                                <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                                                                <option value="Manajmen Informatika">Manajmen Informatika</option>

                                                            <?php } else if ($s->jurusan == "Teknik Komputer dan Jaringan") { ?>
                                                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                                                <option value="Multimedia">Multimedia</option>
                                                                <option value="Teknik Komputer dan Jaringan" selected>Teknik Komputer dan Jaringan</option>
                                                                <option value="Manajmen Informatika">Manajmen Informatika</option>

                                                            <?php } else if ($s->jurusan == "anajmen Informatika") { ?>
                                                                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                                                <option value="Multimedia">Multimedia</option>
                                                                <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                                                                <option value="Manajmen Informatika" selected>Manajmen Informatika</option>

                                                            <?php } ?>
                                                        </select>
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
                                                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?= $s->email ?>" required>
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
                                                        <textarea class="form-control auto-size" rows="4" name="alamat" placeholder="Alamat" required><?= str_replace(" ", "&nbsp;", $s->alamat) ?></textarea>
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
                                                            <?php if ($s->jenis_kelamin == "L") { ?>
                                                                <label><input type="radio" checked="" value="L" name="jenis_kelamin" class="i-checks"> <i></i> Laki Laki</label>
                                                                &nbsp;&nbsp;
                                                                <label><input type="radio" value="P" name="jenis_kelamin" class="i-checks"> <i></i> Perempuan</label>

                                                            <?php } else if ($s->jenis_kelamin == "P") { ?>
                                                                <label><input type="radio" value="L" name="jenis_kelamin" class="i-checks"> <i></i> Laki Laki</label>
                                                                &nbsp;&nbsp;
                                                                <label><input type="radio" checked value="P" name="jenis_kelamin" class="i-checks"> <i></i> Perempuan</label>

                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

            <?php } ?>
        </div>
    </div>
</div>
<!-- End Sale Statistic area-->

<!-- modal reset profile siswa-->
<div class="modal fade" id="reset_siswa" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <center>
                    <h4> Yakin ingin menghapus semua data profile siswa ?</h4>
                    <div class="my-3">
                        <img src="<?= base_url("/public/img/alert.png") ?>" alt="alert1.png">
                    </div>
                    <span>Tindakan tidak dapat diurungkan!</span><br><br>
                </center>
            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" data-dismiss="modal" class="btn btn-success btn-md notika-btn-success">Batalkan</button>
                    <a href="<?= base_url("/proses/e26c3b7bc1e73d701afbe50f421c0137") ?>" class="btn btn-danger btn-md notika-btn-danger">Hapus Semua</a>
                </center>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah data profile siswa -->
<div class="modal fade" id="tambah_siswa" role=" dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= base_url("") ?>/proses/tambah-profile-siswa" method="post">
                <div class="modal-body">
                    <center style="margin-bottom:30px" class="mg-b-20">
                        <img src="<?= base_url("") ?>/assets/img/logo/logo-fhd.png" style="margin-bottom:10px;height:50px !important;" alt="bk online logo">
                        <h5>Pendaftaran Siswa</h5>
                    </center>
                    <div class="form-example-int form-horizental">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">NIS</label>
                                </div>
                                <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="number" name="nis" class="form-control" placeholder="Masukan NIS">
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
                                    <label class="hrzn-fm">Kelas</label>
                                </div>
                                <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <div class="fm-checkbox">
                                            <label><input type="radio" checked="" value="10" name="kelas" class="i-checks"> <i></i> Kelas 10</label>
                                            &nbsp;&nbsp;
                                            <label><input type="radio" value="11" name="kelas" class="i-checks"> <i></i> Kelas 11</label>
                                            &nbsp;&nbsp;
                                            <label><input type="radio" value="12" name="kelas" class="i-checks"> <i></i>Kelas 12</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-example-int form-horizental">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">Jurusan</label>
                                </div>
                                <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" name="jurusan">
                                            <option value="Rekayasa Perangkat Lunak">Pilih Jurusan</option>
                                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                            <option value="Multimedia">Multimedia</option>
                                            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                                            <option value="Manajmen Informatika">Manajmen Informatika</option>
                                        </select>
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

<?= $this->endSection(""); ?>