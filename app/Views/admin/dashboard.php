<?= $this->extend("admin/template") ?>
<?= $this->section("content"); ?>
<!-- Start Sale Statistic area-->
<div class="sale-statistic-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <div class="box-content nk-green notika-shadow mg-t-30">
                    <div class="curved-inner-pro">
                        <div class="curved-ctn">
                            <h2>Selamat Datang <?= $_SESSION['nama'] ?> Di Aplikasi Bk Online - Administrator</h2>
                            <hr>
                        </div>
                    </div>
                    <div class="bar-chart-wp mg-t-30 chart-display-none">
                        <canvas height="140vh" width="auto" id="data"></canvas>
                        <script>
                            var ctx = document.getElementById("data");
                            var barchart1 = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ["Siswa Terdaftar", "Materi Edukasi", "Pengaduan Siswa", "Jenis Pelanggaran"],
                                    datasets: [{
                                        label: "Data Keseluruhan",
                                        data: [
                                            <?= $siswa ?>,
                                            <?= $edukasi ?>,
                                            <?= $pengaduan ?>,
                                            <?= $pelanggaran ?>
                                        ],
                                        backgroundColor: [
                                            'rgba(255, 152, 0, 0.5)',
                                            'rgba(139, 195, 74, 0.5)',
                                            'rgba(103, 58, 183, 0.5)',
                                            'rgba(233, 30, 99, 0.5)',
                                            'rgba(63, 81, 181, 0.5)',
                                            'rgba(96, 125, 139, 0.5)'
                                        ],
                                        borderWidth: 0
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <a href="<?= base_url() ?>/admin/data-profile-siswa" class="text-dark">
                    <div class="right-bar notika-shadow mg-tb-30 sm-res-mg-t-0 border-1">
                        <h5>Siswa Terdaftar</h5>
                        <hr>
                        <center>
                            <h4 class="counter"><?= $siswa ?></h4>
                        </center>
                    </div>
                </a>

                <a href="<?= base_url() ?>/admin/data-profile-saya" class="text-dark">
                    <div class="right-bar notika-shadow mg-tb-30 sm-res-mg-t-0">
                        <h5>Materi Edukasi</h5>
                        <hr>
                        <center>
                            <h4 class="counter"><?= $edukasi ?></h4>
                        </center>
                    </div>
                </a>

                <a href="<?= base_url() ?>/admin/data-pengaduan" class="text-dark">
                    <div class="right-bar notika-shadow mg-tb-30 sm-res-mg-t-0">
                        <h5>Pengaduan Siswa</h5>
                        <hr>
                        <center>
                            <h4 class="counter"><?= $pengaduan ?></h4>
                        </center>
                    </div>
                </a>

                <a href="<?= base_url() ?>/admin/data-pelanggaran" class="text-dark">
                    <div class="right-bar notika-shadow mg-tb-30 sm-res-mg-t-0">
                        <h5>Jenis Pelanggaran</h5>
                        <hr>
                        <center>
                            <h4 class="counter"><?= $pelanggaran ?></h4>
                        </center>
                    </div>
                </a>
                <div class="right-bar notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <center>
                        <img src="<?= base_url() ?>/public/attention/<?= rand(1, 8) ?>.gif" alt="<?= rand(1, 8) ?>.gif">
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Sale Statistic area-->
<?= $this->endSection(""); ?>