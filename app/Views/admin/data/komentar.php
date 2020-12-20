<div class="comment-wrapper mx-5 mx-sm-0">
    <ul class="media-list">
        <?php foreach ($komentar as $k) { ?>
            <li class="media">
                <a href="#" class="pull-left">
                    <img src="https://bootdey.com/img/Content/user_3.jpg" alt="" class="img-circle">
                </a>
                <div class="media-body">
                    <span class="text-muted pull-right">
                        <small class="text-muted"><?= time_elapsed_string($k->updated_at)  ?></small>
                    </span>
                    <strong class="text-primary"><?= $k->nama ?></strong>
                    <p>
                        <?= str_replace(array("\r\n", "\r", "\n"), "<br />", $k->komentar) ?>
                    </p>
                    <small>
                        <a href="#" data-toggle="modal" data-target="#ubah_<?= $k->id; ?>" class="menu-komen">Ubah</a>
                        &bull;
                        <a href="#" data-toggle="modal" data-target="#hapus_<?= $k->id; ?>" class="menu-komen">Hapus</a></small>
                    <br>
                </div>
            </li>

            <!-- modal konfirmasi hapus -->
            <div class="modal fade" id="hapus_<?= $k->id ?>" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body">
                            <center>
                                <h4> Yakin ingin menghapus konsultasi "<span class="text-warning"><?= $k->komentar ?></span>" ?</h4>
                                <center class="my-3">
                                    <img src="<?= base_url("/public/img/alert.png") ?>" alt="alert1.png">
                                </center>
                                <span>Tindakan tidak dapat diurungkan!</span><br><br>
                            </center>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" data-dismiss="modal" class="btn btn-success btn-md notika-btn-success">Batalkan</button>
                                <a href="<?= base_url("/proses/delete_konsultasi/" . $k->id)  ?>" class="btn btn-danger btn-md notika-btn-danger">Hapus</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </ul>
</div>