<?= $this->extend("admin/template"); ?>
<?= $this->section("content"); ?>
<style>
    .comment-wrapper {
        max-height: auto;
        overflow: auto;
    }

    .comment-wrapper .media-list .media img {
        width: 44px;
        height: 44px;
        border: 2px solid #e5e7e8;
    }

    .comment-wrapper .media-list .media {
        border-bottom: 2px dashed #efefef;
        margin-bottom: 25px;
    }

    .menu-komen {
        color: darkgray;
    }

    .menu-komen:hover {
        color: darkslategray;
        text-decoration: underline;
        font-weight: bold;
    }
</style>
<div class="sale-statistic-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="box-content notika-shadow mg-t-30 responsive">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $edukasi->id_pemutaran ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="mb-2 mt-4">
                        <h3><?= $edukasi->judul ?></h3>
                        <?= $edukasi->author ?> | <?= date('D, d M Y', strtotime($edukasi->created_at)) ?>
                    </div>
                    <hr>
                    <p><?= str_replace(array("\r\n", "\r", "\n"), "<br/>", $edukasi->deskripsi) ?></p>
                </div>
                <div class="box-content notika-shadow mg-b-30" id="isi_komen">
                    <?= view('admin/data/komentar', $komentar); ?>
                </div>
                <div class="box-content notika-shadow">
                    <form method="post" id="form_komentar">
                        <div class="form-group mt-4">
                            <label class="sr-only" for="message">post</label>
                            <input type="hidden" name="id_edukasi" value="<?= $edukasi->id ?>">
                            <input type="hidden" name="nama" value="<?= $_SESSION['nama'] ?>">
                            <textarea class="form-control" id="message" rows="2" name="komentar" placeholder="Ketikkan komentar..." required></textarea>
                            <div class="text-right mt-4">
                                <button type="button" id="tombol_tambah" class="btn btn-primary notika-btn-primary"><i class="notika-icon notika-next"></i> Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-sm-6">
                        <!-- <div class="right-bar notika-shadow mg-t-30 sm-res-mg-t-0"> -->
                        <div class="right-bar notika-shadow mg-t-30">
                            <div class="inbox-left-sd">
                                <div class="compose-ml">
                                    <h5>Pengaturan Data</h5>
                                    <hr>
                                </div>
                                <div class="inbox-status">
                                    <ul class="inbox-st-nav">
                                        <li><a href="<?= base_url('/admin/data-edukasi/') ?>"><i class="notika-icon notika-menus"></i> List Materi</a></li>
                                        <li><a href="<?= base_url('/admin/data-tambah-edukasi/') ?>"><i class="notika-icon notika-edit"></i> Tambah</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#reset_edukasi"><i class="notika-icon notika-trash"></i> Hapus Semua</a></li>
                                    </ul>
                                    <hr>
                                    <ul class="inbox-st-nav">
                                        <li><a href="<?= base_url('/admin/data-edukasi-view-edit/' . $edukasi->id_pemutaran) ?>"><i class="notika-icon notika-draft"></i> Edit</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="delete_<?= $edukasi->id_pemutaran ?>"><i class="notika-icon notika-trash"></i> Hapus</a></li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="inbox-status">
                                    <ul class="inbox-st-nav">
                                        <li>
                                            <span>Perubahan Terakhir</span>
                                            <br>
                                            <small><?= date('D, d M Y | h:i', strtotime($edukasi->updated_at)) ?></small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-6">
                        <div class="right-bar notika-shadow mg-t-30">
                            <center>
                                <img src="<?= base_url() ?>/public/attention/<?= rand(1, 8) ?>.gif" alt="<?= rand(1, 8) ?>.gif">
                            </center>
                        </div>
                        <div class="statistic-right-area mg-t-30 p-20 ">
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
    </div>
</div>

<!-- modal konfirmasi hapus -->
<div class="modal fade" id="hapus_<?= $edukasi->id_pemutaran ?>" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <h4> Yakin ingin menghapus materi "<span class="text-warning"><?= $edukasi->judul ?></span>" ?</h4>
                    <div class="my-3">
                        <img src="<?= base_url("/public/img/alert.png") ?>" alt="alert1.png">
                    </div>
                    <span>Tindakan tidak dapat diurungkan!</span><br><br>
                </center>
            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" data-dismiss="modal" class="btn btn-success btn-md notika-btn-success">Batalkan</button>
                    <a href="<?= base_url("/proses/delete-edukasi/" . $edukasi->id_pemutaran)  ?>" class="btn btn-danger btn-md notika-btn-danger">Hapus</a>
                </center>
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


<script>
    $(document).ready(function() {

        //load data saat refresh halaman
        function komentar() {
            $.ajax({
                url: "<?= base_url('/proses/view-data-edukasi-komentar-ajax/' . $edukasi->id); ?>",
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (data.status == 'sukses') {
                        $('#isi_komen').html(data.html);
                    } else {
                        swal("Opps", "Sepertinya ada masalah !", 'warning');
                    }
                }
            });
        }
        setTimeout(komentar, 2000);

        //tambah komentar
        $("#tombol_tambah").submit(function() {
            $.ajax({
                url: "<?php echo base_url('/proses/tambah-data-edukasi-komentar'); ?>",
                type: 'POST',
                dataType: 'json',
                data: $('#form_komentar').serialize(),
                success: function() {
                    $('#message').val(''); //kosongkan value di komentar
                    komentar(); //load data saat ada data baru
                    // setTimeout(komentar, 2000);

                },
                error: function() {
                    swal("Oops!", "parah si", 'warning');
                }
            });
        });

        $("#tombol_hapus").click(function() {
            $.ajax({
                url: "<?php echo base_url('/proses/tambah-data-edukasi-komentar'); ?>",
                type: 'POST',
                dataType: 'json',
                data: $('#form_komentar').serialize(),
                success: function(data) {
                    $('#message').val(''); //kosongkan value di komentar
                    komentar(); //load data saat ada data baru
                },
                error: function() {
                    swal("Oops!", "parah si", 'warning');
                }
            });
        });

    });
</script>
<?= $this->endSection(); ?>