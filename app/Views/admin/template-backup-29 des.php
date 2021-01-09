<!doctype html>
<html class="no-js" lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?> | BK Online</title>
    <meta name="title" content="<?= $title ?> | BK Online">
    <meta name="description" content="Halaman Admin Bk-Online">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- faviconF
		============================================ -->
    <link rel="shortcut icon" type="<?= base_url("") ?>/assets/image/x-icon" href="<?= base_url("") ?>/assets/img/favicon.ico">

    <div class="style">
        <!-- Google Fonts
      ============================================ -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
        <!-- Bootstrap CSS
      ============================================ -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/bootstrap.min.css">
        <!-- Font Awesome
      ============================================ -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/font-awesome.min.css">
        <!-- owl.carousel CSS
      ============================================ -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/owl.carousel.css">
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/owl.theme.css">
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/owl.transitions.css">
        <!-- meanmenu CSS
      ============================================ -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/meanmenu/meanmenu.min.css">
        <!-- animate CSS
      ============================================ -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/animate.css">
        <!-- normalize CSS
      ============================================ -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/normalize.css">
        <!-- mCustomScrollbar CSS
      ============================================ -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
        <!-- notika icon CSS
      ============================================ -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/notika-custom-icon.css">
        <!-- summernote CSS
      ============================================ -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/summernote/summernote.css">
        <!-- Range Slider CSS
		============================================ -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/themesaller-forms.css">
        <!-- bootstrap select CSS
      ============================================ -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/bootstrap-select/bootstrap-select.css">
        <!-- datapicker CSS
      ============================================ -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/datapicker/datepicker3.css">
        <!-- Tag input CSS
      ============================================ -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/bootstrap-tagsinput.css">
        <!-- Data Table JS
      ============================================ -->
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"> -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/jquery.dataTables.min.css">
        <!-- wave CSS
      ============================================ -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/wave/waves.min.css">
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/wave/button.css">
        <!-- dialog CSS
      ============================================ -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/dialog/sweetalert2.min.css">
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/dialog/dialog.css">
        <!-- main CSS
      ============================================ -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/main.css">
        <!-- style Ckeditor CSS
      ============================================ -->
        <!-- <link rel="stylesheet" type="text/css" href="<?= base_url("") ?>/assets/styles_ckeditor.css"> -->
        <!-- style CSS
      ============================================ -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/style.css">
        <!-- responsive CSS
      ============================================ -->
        <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/responsive.css">
        <!-- modernizr JS
      ============================================ -->
        <script src="<?= base_url("") ?>/assets/js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- jquery
      ============================================ -->
        <!-- <script src="<?= base_url("") ?>/assets/js/vendor/jquery-3.5.1.min.js"></script> -->
        <script src="<?= base_url("") ?>/assets/js/vendor/jquery-1.12.4.min.js"></script>
        <!-- Charts JS
      ============================================ -->
        <script src="<?= base_url("") ?>/assets/js/charts/Chart.js"></script>
        <!--  Chat JS
      ============================================ -->
        <script src="<?= base_url("") ?>/assets/js/dialog/sweetalert2.min.js"></script>
        <script src="<?= base_url("") ?>/assets/js/jquery.emojiFace.js"></script>
        <!-- Tag input JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/bootstrap-tagsinput.js"></script>
        <!-- <script src="<?= base_url("") ?>/assets/js/bootstrap-tagsinput-active.js"></script> -->
    </div>
</head>

<body onload="startTime()">

    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="<?= base_url("/admin/dashboard") ?>"><img src="<?= base_url("") ?>/assets/img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item">
                                <a href="#" data-toggle="modal" data-target="#logout" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><small>Log-Out <span><i class="fa fa-sign-out"></i></span></small>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->

    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="<?= base_url("") ?>/admin/dashboard">Dashboard</a>
                                        </li>
                                        <li><a href="<?= base_url("") ?>/admin/data-kunjungan">Daftar Kunjungan</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demoevent" href="#">Program</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        <li><a href="<?= base_url("") ?>/admin/data-edukasi">Edukasi</a>
                                        </li>
                                        <li><a href="<?= base_url("") ?>/admin/data-konsultasi">Konsultasi</a>
                                        </li>
                                        <li><a href="<?= base_url("") ?>/admin/data-pengaduan">Pengaduan</a>
                                        </li>
                                        <li>
                                            <!-- <a href="<?= base_url("") ?>/admin/data-layanan-klasikal">Layanan Klasikal</a> -->
                                            <a href="" class="construction">Layanan Klasikal</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#democrou" href="#">Profile</a>
                                    <ul id="democrou" class="collapse dropdown-header-top">
                                        <li><a href="<?= base_url("") ?>/admin/data-profile-saya">Profil Saya</a>
                                        </li>
                                        <li><a href="<?= base_url("") ?>/admin/data-profile-siswa">Profil Siswa</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Lainnya</a>
                                    <ul id="Pagemob" class="collapse dropdown-header-top">
                                        <li><a href="<?= base_url("") ?>/admin/data-riwayat">Riwayat</a>
                                        </li>
                                        <li><a href="<?= base_url("") ?>/admin/data-about">About</a>
                                        </li>
                                        <li><a href="<?= base_url("") ?>/admin/data-faq">FAQ</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->

    <!-- Main Menu area start-->
    <div class="main-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="<?= ($active == "Home") ? "active" : "" ?>">
                            <a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li class="<?= ($active == "Program") ? "active" : "" ?>">
                            <a data-toggle="tab" href="#Program"><i class="notika-icon notika-edit"></i> Program</a>
                        </li>
                        <li class="<?= ($active == "Profile") ? "active" : "" ?>">
                            <a data-toggle="tab" href="#Page"><i class="notika-icon notika-support"></i> Profile</a>
                        </li>
                        <li class="<?= ($active == "Lainnya") ? "active" : "" ?>">
                            <a data-toggle="tab" href="#Lainnya"><i class="notika-icon notika-app"></i> Lainnya</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="<?= ($active == "Home") ? "active" : "" ?> tab-pane in notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?= base_url("") ?>/admin/dashboard">Dashboard</a>
                                </li>
                                <li><a href="<?= base_url("") ?>/admin/data-kunjungan">Daftar Kunjungan</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Program" class="<?= ($active == "Program") ? "active" : "" ?> tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">

                                <li><a href="<?= base_url("") ?>/admin/data-edukasi">Edukasi</a>
                                </li>
                                <li><a href="<?= base_url("") ?>/admin/data-konsultasi">Konsultasi</a>
                                </li>
                                <li><a href="<?= base_url("") ?>/admin/data-pengaduan">Pengaduan</a>
                                </li>
                                <li>
                                    <!-- <a href="<?= base_url("") ?>/admin/data-layanan-klasikal">Layanan Klasikal</a> -->
                                    <a href="" class="construction">Layanan Klasikal</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Page" class="<?= ($active == "Profile") ? "active" : "" ?> tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?= base_url("") ?>/admin/data-profile-saya">Profil Saya</a>
                                </li>
                                <li><a href="<?= base_url("") ?>/admin/data-profile-siswa">Profil Siswa</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Lainnya" class="<?= ($active == "Lainnya") ? "active" : "" ?> tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?= base_url("") ?>/admin/data-riwayat">Riwayat</a>
                                </li>
                                <li><a href="<?= base_url("") ?>/admin/data-about">About</a>
                                </li>
                                <li><a href="<?= base_url("") ?>/admin/data-faq">FAQ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->

    <!-- Start Content area-->
    <div class="content" style="min-height:380px !important;">
        <?= $this->renderSection("content") ?>
    </div>
    <!-- End Content area-->

    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2020 BK Online - All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->

    <!-- modal konfirmasi logout -->
    <div class="modal fade" id="logout" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <center>
                        <h4> Yakin ingin <span class="text-warning">mengakhiri sesi</span> ?</h4>
                        <div class="my-3">
                            <img src="<?= base_url("/public/img/log-out.gif") ?>" alt="log-out.gif">
                        </div>
                    </center>
                </div>
                <div class="modal-footer">
                    <center>
                        <a href="<?= base_url() ?>/proses/log-out" class="btn btn-danger btn-md notika-btn-danger px-3 mt-3">&nbsp; Log-out &nbsp;</a>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <div class="preloader">
        <div class="loading">
            <center>
                <div class="spinner-border text-deep-purple"></div>
                <h3 class="mt-4">Harap Tunggu</h3>
            </center>
        </div>
    </div>

    <div>
        <!-- bootstrap JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/bootstrap.min.js"></script>
        <!-- wow JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/wow.min.js"></script>
        <!-- price-slider JS
		============================================ -->
        <!-- <script src="<?= base_url("") ?>/assets/js/jquery-price-slider.js"></script> -->
        <!-- owl.carousel JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/owl.carousel.min.js"></script>
        <!-- scrollUp JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/jquery.scrollUp.min.js"></script>
        <!-- meanmenu JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/meanmenu/jquery.meanmenu.js"></script>
        <!-- counterup JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/counterup/jquery.counterup.min.js"></script>
        <script src="<?= base_url("") ?>/assets/js/counterup/waypoints.min.js"></script>
        <script src="<?= base_url("") ?>/assets/js/counterup/counterup-active.js"></script>
        <!-- mCustomScrollbar JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- autosize JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/autosize.min.js"></script>
        <!-- bootstrap select JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/bootstrap-select/bootstrap-select.js"></script>
        <!-- Chosen JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/chosen/chosen.jquery.js"></script>

        <!-- icheck JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/icheck/icheck.min.js"></script>
        <script src="<?= base_url("") ?>/assets/js/icheck/icheck-active.js"></script>
        <!-- datapicker JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/datapicker/bootstrap-datepicker.js"></script>
        <script src="<?= base_url("") ?>/assets/js/datapicker/datepicker-active.js"></script>
        <!-- knob JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/knob/jquery.knob.js"></script>
        <script src="<?= base_url("") ?>/assets/js/knob/jquery.appear.js"></script>
        <script src="<?= base_url("") ?>/assets/js/knob/knob-active.js"></script>
        <!-- summernote JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/summernote/summernote-updated.min.js"></script>
        <script src="<?= base_url("") ?>/assets/js/summernote/summernote-active.js"></script>
        <!--  wave JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/wave/waves.min.js"></script>
        <script src="<?= base_url("") ?>/assets/js/wave/wave-active.js"></script>
        <!--  todo JS
		============================================ -->
        <!-- <script src="<?= base_url("") ?>/assets/js/todo/jquery.todo.js"></script> -->
        <!-- plugins JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/plugins.js"></script>
        <!-- Data Table JS
    ============================================ -->
        <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script> -->
        <script src="<?= base_url("") ?>/assets/js/data-table/jquery.dataTables.min.js"></script>
        <script src="<?= base_url("") ?>/assets/js/data-table/data-table-act.js"></script>

        <!--  Chat JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/chat/moment.min.js"></script>
        <script src="<?= base_url("") ?>/assets/js/chat/jquery.chat.js"></script>
        <!-- Login JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/login/login-action.js"></script>
        <!-- <script src="<?= base_url("") ?>/assets/js/charts/data-chart.js"></script> -->
        <!-- main JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/main.js"></script>
        <!-- tawk chat JS
		============================================ -->
        <script src="<?= base_url("") ?>/assets/js/tawk-chat.js"></script>
        <!-- tawk chat JS
      ============================================ -->
        <!-- <script src="<?= base_url("") ?>/assets/js/ckeditor5/ckeditor.js"></script> -->

        <!-- Notifikasi -->
        <script>
            <?php if (isset($_SESSION['msg_suc'])) { ?>
                swal("Berhasil", "<?= $_SESSION["msg_suc"]; ?>", "success");

            <?php } elseif (isset($_SESSION['msg_err'])) { ?>
                swal("Terjadi Kesalahan", "<?= $_SESSION["msg_err"]; ?>", "warning");

            <?php } elseif (isset($_SESSION['msg_login'])) { ?>
                swal({
                    title: 'Halo',
                    text: "<?= $_SESSION["msg_login"]; ?>",
                    imageUrl: "<?= base_url('/public/img/welcome.gif') ?>",
                    imageWidth: 300,
                    imageHeight: 150,
                    imageAlt: 'Wellcome'
                });

            <?php } ?>

            $('.construction').on('click', function() {
                swal({
                    title: 'Oops',
                    text: 'This link under construction.',
                    imageUrl: '<?= base_url("/public/img/construction.gif") ?>',
                    imageWidth: 200,
                    imageHeight: 100,
                    imageAlt: 'Under Construction'
                })
            })
        </script>
        <script>
            function startTime() {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('realtime').innerHTML =
                    h + ":" + m + ":" + s;
                var t = setTimeout(startTime, 500);
            }

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i
                }; // add zero in front of numbers < 10
                return i;
            }
        </script>
        <script>
            $(document).ready(function() {
                $(".preloader").fadeOut();

                //table click view
                $('td[data-href]').on("click", function() {
                    document.location = $(this).data('href');
                });

                $(function() {
                    $('textarea').emojiInit();
                })
            })
        </script>
    </div>
</body>

</html>

<div class="col-lg-12">
    <div class="box-content notika-shadow mg-t-30" id="tamu">
        <div id="daftar_tamu">
            <div class="float-right">
                <span class="btn" onclick="openFullscreen()">
                    <i class="fa fa-expand" aria-hidden=" true"></i>
                </span>
            </div>
            <div class="curved-inner-pro">
                <div class="curved-ctn">
                </div>
            </div>
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
                                        <!-- <textarea class="form-control auto-size" name="nama" placeholder="Masukan nama" rows="1"></textarea> -->
                                        <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm">Tujuan Kunjungan</label>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <!-- <textarea class="form-control auto-size" name="tujuan" placeholder="Tujuan kunjungan" rows="1"></textarea> -->
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
<!-- <script>


    ClassicEditor
      .create(document.querySelector('#ckeditor'), {

        toolbar: {
          items: [
            'heading',
            '|',
            'bold',
            'underline',
            'italic',
            'fontFamily',
            'fontSize',
            'fontColor',
            'fontBackgroundColor',
            'removeFormat',
            '|',
            'bulletedList',
            'numberedList',
            'todoList',
            'indent',
            'outdent',
            'alignment',
            '|',
            'imageInsert',
            'blockQuote',
            'link',
            'insertTable',
            'mediaEmbed',
            'horizontalLine',
            'exportPdf',
            'undo',
            'redo'
          ]
        },
        language: 'id',
        image: {
          toolbar: [
            'imageTextAlternative',
            'imageStyle:full',
            'imageStyle:side',
            'linkImage'
          ]
        },
        table: {
          contentToolbar: [
            'tableColumn',
            'tableRow',
            'mergeTableCells'
          ]
        },
        licenseKey: '',

      })
      .then(editor => {
        window.editor = editor;
      })
      .catch(error => {
        console.error('Oops, something went wrong!');
        console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
        console.warn('Build id: pl2up9clynzw-anovpgg6q2op');
        console.error(error);
      });
  </script> -->