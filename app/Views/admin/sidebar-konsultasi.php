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
                        <li><a href="<?= base_url('/admin/data-konsultasi/') ?>"><i class="notika-icon notika-menus"></i> List Konsultasi</a></li>
                        <li><a href="<?= base_url('/admin/data-tambah-konsultasi/') ?>"><i class="notika-icon notika-edit"></i> Tambah</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#reset_konsultasi"><i class="notika-icon notika-trash"></i> Hapus Semua</a></li>
                    </ul>
                    <hr>
                    <ul class="inbox-st-nav">
                        <li><a href="<?= base_url('/admin/data-konsultasi-view-edit/' . $konsultasi->id) ?>"><i class="notika-icon notika-draft"></i> Edit</a></li>
                        <li><a href="#" data-toggle="modal" data-target="delete_<?= $konsultasi->id ?>"><i class="notika-icon notika-trash"></i> Hapus</a></li>
                    </ul>
                </div>
                <hr>
                <div class="inbox-status">
                    <span>Perubahan Terakhir</span>
                    <br>
                    <small><?= tanggal($konsultasi->id) . " | " . date('H:i', strtotime($konsultasi->id)) ?></small>
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

;