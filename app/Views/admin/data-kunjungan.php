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
                                    <h2>Daftar Kunjungan - Administrator</h2>
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
            <div class="col-lg-12">
                <div class="box-content notika-shadow mg-t-30" id="box-tamu">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="float-right">
                                <span class="btn" onclick="openFullscreen()">
                                    <i class="fa fa-expand" aria-hidden=" true" id="icon"></i>
                                </span>
                            </div>
                            <div class="curved-inner-pro">
                                <div class="curved-ctn">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div id="daftar_tamu">
                                <div class="box-content-tamu">
                                    <center class="mb-5" id="img">
                                        <img src="<?= base_url("") ?>/assets/img/logo/logo-fhd.png" alt="bk online logo" style="margin-bottom:10px">
                                        <h3>Daftar Kunjungan</h3>
                                    </center>
                                    <!-- <hr class="mb-5 my-2"> -->
                                    <form method="POST" id="form_kunjungan">
                                        <div class="form-example-int form-horizental">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">Nama</label>
                                                    </div>
                                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                        <div class="nk-int-st">
                                                            <div class="row">
                                                                <div class="col-lg-11">
                                                                    <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                                                                </div>
                                                                <div class="col-lg-1">
                                                                    <!-- <span class="btn">
                                                                        <i class="fa fa-get-pocket" aria-hidden="true" data-toggle="modal" data-target="#data_siswa"></i>
                                                                    </span> -->
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="modal" data-target="#data_siswa" aria-expanded="false">
                                                                            Pilih
                                                                        </button>
                                                                    </div>
                                                                    <!-- <button type="button" data-toggle="modal" data-target="#data_siswa" class="btn btn-info notika-btn-info btn-block">Pilih</button> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" form-group">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">Tujuan Kunjungan</label>
                                                    </div>
                                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                        <div class="nk-int-st">
                                                            <input type="text" class="form-control" name="tujuan" placeholder="Tujuan kunjungan" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">Catatan</label>
                                                    </div>
                                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                                        <div class="nk-int-st">
                                                            <textarea class="form-control auto-size" name="catatan" placeholder="Catatan ..." rows="3"></textarea>
                                                        </div>
                                                        <div class="text-right my-4">
                                                            <button type="button" id="tombol_tambah" class="btn btn-primary btn-lg notika-btn-primary px-5">Tambah</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <div class="box-content notika-shadow mg-t-30">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="data-table-basic">
                            <thead style="color:#fff;background:#   ">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tujuan</th>
                                    <th>Catatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($kunjungan as $k) { ?>
                                    <tr>
                                        <td><?= $i += 1 ?></td>
                                        <td><a href="<?= base_url('/admin/data-edukasi/view/' . $k->nama) ?>" class="text-link" style="pading:100%"><?= $k->nama ?></a></td>
                                        <td><?= get_small_char($k->tujuan, 20); ?></td>
                                        <td><?= get_small_char($k->catatan, 20); ?></td>
                                        <td>
                                            <!-- <a href="<?= base_url('/admin/data-edukasi-view/' . $k->id) ?>" class="badge badge-success">Lihat Detail</a> -->
                                            <a href="<?= base_url('/admin/data-edukasi/view-edit/' . $k->id) ?>" class="badge badge-warning"><i class="notika-icon notika-edit"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#hapus_<?= $k->id ?>" class="badge badge-danger"><i class="notika-icon notika-trash"></i></a>
                                        </td>
                                    </tr>

                                    <!-- modal konfirmasi hapus -->
                                    <div class="modal fade" id="hapus_<?= $k->id ?>" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <center>
                                                        <h4> Yakin ingin menghapus kunjungan "<span class="text-warning"><?= $k->nama ?></span>" ?</h4>
                                                        <div class="my-3">
                                                            <img src="<?= base_url("/public/img/alert.png") ?>" alt="alert1.png">
                                                        </div>
                                                        <span>Tindakan tidak dapat diurungkan!</span><br><br>
                                                    </center>
                                                </div>
                                                <div class="modal-footer">
                                                    <center>
                                                        <button type="button" data-dismiss="modal" class="btn btn-success btn-md notika-btn-success">Batalkan</button>
                                                        <a href="<?= base_url("/proses/delete-edukasi/" . $k->id)  ?>" class="btn btn-danger btn-md notika-btn-danger">Hapus</a>
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
                <div class="right-bar notika-shadow mg-t-30 sm-res-mg-t-0">
                    <h5>Kunjungan Hari Ini</h5>
                    <hr>
                    <center>
                        <h4 class="counter"><?= $jml_kunjungan ?></h4>
                    </center>
                </div>
                <div class="right-bar notika-shadow mg-t-30 sm-res-mg-t-0">
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

<!-- modal data siswa -->
<div class="modal fade" id="data_siswa" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <table class="table table-sm" id="data-table-basic" border="1" style="margin:auto 0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($kunjungan as $k) { ?>
                        <tr>
                            <td><?= $i += 1 ?></td>
                            <td><?= $k->nama ?></td>
                            <td>
                                <span data-toggle="tooltip" data-placement="bottom" title="Pilih"><button type="button" class="badge badge-success" data-toggle="modal" data-target="#"><i class="fa fa-check" aria-hidden="true"></i></button></span>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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

<script>
    $(document).ready(function() {

        //tambah komentar
        $("#tombol_tambah").submit(function() {
            $.ajax({
                url: "<?php echo base_url('/admin/tambah-data-kunjungan'); ?>",
                type: 'POST',
                dataType: 'json',
                data: $('#form_kunjungan').serialize(),
                success: function() {
                    $('#message').val(''); //kosongkan value di 
                    swal("Great!", "Berhasil menmahajsijdsds", "success");
                    // komentar(); //load data saat ada data baru
                    // setTimeout(komentar, 2000);

                },
                error: function() {
                    swal("Oops!", "parah si", 'warning');
                }
            });
        });
    })
    //tambah komentar
    $("#tombol_tambah").submit(function() {
        $.ajax({
            url: "<?php echo base_url('/admin/tambah-data-kunjungan'); ?>",
            type: 'POST',
            dataType: 'json',
            data: $('#form_kunjungan').serialize(),
            success: function() {
                $('#message').val(''); //kosongkan value di 
                swal("Great!", "Berhasil menmahajsijdsds", "success");
                // komentar(); //load data saat ada data baru
                // setTimeout(komentar, 2000);

            },
            error: function() {
                swal("Oops!", "parah si", 'warning');
            }
        });
    });
    var tamu = document.getElementById("box-tamu");

    function openFullscreen() {
        if (tamu.requestFullscreen) {
            // $('#tamu').css("border", "1px solid black");
            // $("#tamu").removeClass("box-content");
            // $("#tamu").addClass("box-content-dark");
            $('#icon').css("color", "white");
            $('#box-tamu').css("padding", "80px");
            $('#box-tamu').css("background", "#673AB7");
            // $('.box-content').css("border", "none");
            $("#img").addClass("mt-5");
            // $('#img').css(``);
            $('.curved-ctn').html(`<span class='text-right text-white'>Tekan <strong>Esc</strong> untuk keluar !</span>`);
            tamu.requestFullscreen();
        } else if (tamu.webkitRequestFullscreen) {
            /* Safari */
            elem.webkitRequestFullscreen();
        } else if (tamu.msRequestFullscreen) {
            /* IE11 */
            tamu.msRequestFullscreen();
        }
    }
</script>
<?= $this->endSection(""); ?>