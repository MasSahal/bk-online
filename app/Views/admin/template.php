<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $title ?> | BK Online</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- faviconF
		============================================ -->
  <link rel="shortcut icon" type="<?= base_url("") ?>/assets/image/x-icon" href="<?= base_url("") ?>/assets/img/favicon.ico">
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
  <!-- bootstrap select CSS
		============================================ -->
  <link rel="stylesheet" href="<?= base_url("") ?>/assets/css/bootstrap-select/bootstrap-select.css">
  <!-- Data Table JS
		============================================ -->
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
  <script src="<?= base_url("") ?>/assets/js/vendor/jquery-1.12.4.min.js"></script>
  <!-- Charts JS
		============================================ -->
  <script src="<?= base_url("") ?>/assets/js/charts/Chart.js"></script>
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
                    <li><a href="<?= base_url("") ?>/admin/data-edukasi">Edukasi</a>
                    </li>
                    <li>
                      <!-- <a href="<?= base_url("") ?>/admin/data-layanan-klasikal">Layanan Klasikal</a> -->
                      <a href="" class="construction">Layanan Klasikal</a>
                    </li>
                  </ul>
                </li>
                <li><a data-toggle="collapse" data-target="#demoevent" href="#">Program</a>
                  <ul id="demoevent" class="collapse dropdown-header-top">
                    <li><a href="<?= base_url("") ?>/admin/data-konsultasi">Konsultasi</a>
                    </li>
                    <li><a href="<?= base_url("") ?>/admin/data-pengaduan">Pengaduan</a>
                    </li>
                    <li><a href="<?= base_url("") ?>/admin/data-pelanggaran">Riwayat Pelanggaran</a>
                    </li>
                    <li><a href="<?= base_url("") ?>/admin/data-pelanggaran-siswa">Pelanggaran Siswa</a>
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
            <li class="<?php if ($active == "Home") : echo "active";
                        endif ?>">
              <a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Home</a>
            </li>
            <li class="<?php if ($active == "Program") : echo "active";
                        endif ?>">
              <a data-toggle="tab" href="#Program"><i class="notika-icon notika-edit"></i> Program</a>
            </li>
            <li class="<?php if ($active == "Profile") : echo "active";
                        endif ?>">
              <a data-toggle="tab" href="#Page"><i class="notika-icon notika-support"></i> Profile</a>
            </li>
            <li class="<?php if ($active == "Lainnya") : echo "active";
                        endif ?>">
              <a data-toggle="tab" href="#Lainnya"><i class="notika-icon notika-app"></i> Lainnya</a>
            </li>
          </ul>
          <div class="tab-content custom-menu-content">
            <div id="Home" class=" <?php if ($active == "Home") : echo "active ";
                                    endif ?> tab-pane in notika-tab-menu-bg animated flipInX">
              <ul class="notika-main-menu-dropdown">
                <li><a href="<?= base_url("") ?>/admin/dashboard">Dashboard</a>
                </li>
                <li><a href="<?= base_url("") ?>/admin/data-edukasi">Edukasi</a>
                </li>
                <li>
                  <!-- <a href="<?= base_url("") ?>/admin/data-layanan-klasikal">Layanan Klasikal</a> -->
                  <a href="#" class="construction">Layanan Klasikal</a>
                </li>
              </ul>
            </div>
            <div id="Program" class="<?php if ($active == "Program") : echo "active ";
                                      endif ?> tab-pane notika-tab-menu-bg animated flipInX">
              <ul class="notika-main-menu-dropdown">
                <li><a href="<?= base_url("") ?>/admin/data-konsultasi">Konsultasi</a>
                </li>
                <li><a href="<?= base_url("") ?>/admin/data-pengaduan">Pengaduan</a>
                </li>
                <li><a href="<?= base_url("") ?>/admin/data-pelanggaran">Jenis Pelanggaran</a>
                </li>
                <li><a href="<?= base_url("") ?>/admin/data-pelanggaran-siswa">Pelanggaran Siswa</a>
                </li>
              </ul>
            </div>
            <div id="Page" class="<?php if ($active == "Profile") : echo "active ";
                                  endif ?> tab-pane notika-tab-menu-bg animated flipInX">
              <ul class="notika-main-menu-dropdown">
                <li><a href="<?= base_url("") ?>/admin/data-profile-saya">Profil Saya</a>
                </li>
                <li><a href="<?= base_url("") ?>/admin/data-profile-siswa">Profil Siswa</a>
                </li>
              </ul>
            </div>
            <div id="Lainnya" class="<?php if ($active == "Lainnya") : echo "active ";
                                      endif ?> tab-pane notika-tab-menu-bg animated flipInX">
              <ul class="notika-main-menu-dropdown">
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

  <!-- Start Content area-->
  <?= $this->renderSection("title") ?>
  <div class="" style="min-height:380px !important;">
    <?= $this->renderSection("content") ?>
  </div>
  <!-- End Content area-->

  <!-- Start Footer area-->
  <div class=" footer-copyright-area">
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
  <script src="<?= base_url("") ?>/assets/js/todo/jquery.todo.js"></script>
  <!-- plugins JS
		============================================ -->
  <script src="<?= base_url("") ?>/assets/js/plugins.js"></script>
  <!-- Data Table JS
		============================================ -->
  <script src="<?= base_url("") ?>/assets/js/data-table/jquery.dataTables.min.js"></script>
  <script src="<?= base_url("") ?>/assets/js/data-table/data-table-act.js"></script>
  <!--  Chat JS
		============================================ -->
  <script src="<?= base_url("") ?>/assets/js/dialog/sweetalert2.min.js"></script>
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
  <script>
    $(document).ready(function() {
      $(".preloader").fadeOut();
    })
  </script>
</body>

</html>