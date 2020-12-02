<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Daftar | Bk Online</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- favicon
		============================================ -->
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url("") ?>/assets/img/favicon.ico">
	<!-- Google Fonts
		============================================ -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
	<!-- Bootstrap CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url("") ?>/assets/css/bootstrap.min.css">
	<!-- font awesome CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url("") ?>/assets/css/font-awesome.min.css">
	<!-- bootstrap select CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url("") ?>/assets/css/bootstrap-select/bootstrap-select.css">
	<!-- owl.carousel CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url("") ?>/assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?= base_url("") ?>/assets/css/owl.theme.css">
	<link rel="stylesheet" href="<?= base_url("") ?>/assets/css/owl.transitions.css">
	<!-- animate CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url("") ?>/assets/css/animate.css">
	<!-- normalize CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url("") ?>/assets/css/normalize.css">
	<!-- mCustomScrollbar CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url("") ?>/assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
	<!-- wave CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url("") ?>/assets/css/wave/waves.min.css">
	<link rel="stylesheet" href="<?= base_url("") ?>/assets/css/wave/button.css">
	<!-- dialog CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url("") ?>/assets/css/dialog/sweetalert2.min.css">
	<link rel="stylesheet" href="<?= base_url("") ?>/assets/css/dialog/dialog.css">
	<!-- Notika icon CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url("") ?>/assets/css/notika-custom-icon.css">
	<!-- main CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url("") ?>/assets/css/main.css">
	<!-- style CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url("") ?>/assets/style.css">
	<!-- responsive CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url("") ?>/assets/css/responsive.css">
	<!-- modernizr JS
		============================================ -->
	<script src="<?= base_url("") ?>/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="nk-deep-purple">

	<!-- Start Sale Statistic area-->
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-md-2"></div>
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class="form-example-wrap mg-tb-30">
					<form action="<?= base_url() ?>/proses/tambah-profile-siswa" method="post">
						<center style="margin-bottom:30px" class="mg-b-20">
							<img src="<?= base_url("") ?>/assets/img/logo/logo-fhd.png" style="margin-bottom:10px" alt="bk online logo">
							<h4>Pendaftaran Siswa</h4>
						</center>
						<div class="form-example-int form-horizental">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">NIS</label>
									</div>
									<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
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
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">Nama Lengkap</label>
									</div>
									<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
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
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">Kelas</label>
									</div>
									<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
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
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">Jurusan</label>
									</div>
									<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
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
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">Email</label>
									</div>
									<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
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
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">Password</label>
									</div>
									<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
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
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">Alamat</label>
									</div>
									<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
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
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">Jenis Kelamin</label>
									</div>
									<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
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
						<div class="form-example-int mg-t-15">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								</div>
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<button type="submit" class="btn btn-lg btn-block btn-success notika-btn-success"> Daftar</button>&nbsp;&nbsp;
								</div>
								<div class="col-lg-6 col-md-5 col-sm-6 col-xs-12">
									<span>Sudah punya akun? Login <a href="<?= base_url() ?>" class="text-link">Disini</a> </span>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-2 col-md-2"></div>
		</div>
	</div>
	<!-- jquery
		============================================ -->
	<script src="<?= base_url("") ?>/assets/js/vendor/jquery-1.12.4.min.js"></script>
	<!-- bootstrap JS
		============================================ -->
	<script src="<?= base_url("") ?>/assets/js/bootstrap.min.js"></script>
	<!-- wow JS
		============================================ -->
	<script src="<?= base_url("") ?>/assets/js/wow.min.js"></script>
	<!-- price-slider JS
		============================================ -->
	<script src="<?= base_url("") ?>/assets/js/jquery-price-slider.js"></script>
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
	<!-- sparkline JS
		============================================ -->
	<script src="<?= base_url("") ?>/assets/js/sparkline/jquery.sparkline.min.js"></script>
	<script src="<?= base_url("") ?>/assets/js/sparkline/sparkline-active.js"></script>
	<!-- flot JS
		============================================ -->
	<script src="<?= base_url("") ?>/assets/js/flot/jquery.flot.js"></script>
	<script src="<?= base_url("") ?>/assets/js/flot/jquery.flot.resize.js"></script>
	<script src="<?= base_url("") ?>/assets/js/flot/flot-active.js"></script>
	<!-- knob JS
		============================================ -->
	<script src="<?= base_url("") ?>/assets/js/knob/jquery.knob.js"></script>
	<script src="<?= base_url("") ?>/assets/js/knob/jquery.appear.js"></script>
	<script src="<?= base_url("") ?>/assets/js/knob/knob-active.js"></script>
	<!--  Chat JS
		============================================ -->
	<script src="<?= base_url("") ?>/assets/js/chat/jquery.chat.js"></script>
	<!--  wave JS
		============================================ -->
	<script src="<?= base_url("") ?>/assets/js/wave/waves.min.js"></script>
	<script src="<?= base_url("") ?>/assets/js/wave/wave-active.js"></script>
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
	<!--  todo JS
		============================================ -->
	<script src="<?= base_url("") ?>/assets/js/todo/jquery.todo.js"></script>
	<!-- Login JS
		============================================ -->
	<script src="<?= base_url("") ?>/assets/js/login/login-action.js"></script>
	<!-- plugins JS
		============================================ -->
	<script src="<?= base_url("") ?>/assets/js/plugins.js"></script>
	<!-- Sweetalert
		============================================ -->
	<script src="<?= base_url("") ?>/assets/js/dialog/sweetalert2.min.js"></script>
	<!-- main JS
		============================================ -->
	<script src="<?= base_url("") ?>/assets/js/main.js"></script>
	<script>
		<?php if (isset($_SESSION['msg_suc'])) { ?>
			swal("Berhasil", "<?= $_SESSION["msg_suc"]; ?>", "success");

		<?php } elseif (isset($_SESSION['msg_err'])) { ?>
			swal("Terjadi Kesalahan", "<?= $_SESSION["msg_err"]; ?>", "warning");

		<?php } elseif (isset($_SESSION['msg_login'])) { ?>
			swal("Hello!", "<?= $_SESSION["msg_login"]; ?>");

		<?php } ?>
	</script>
</body>

</html>