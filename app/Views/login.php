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

<body>
	<!-- Login Register area Start-->
	<div class="login-content">
		<!-- Login Siswa -->
		<div class="nk-block toggled" id="l-login">

			<form action="<?= base_url("/siswa/auth") ?>" method="post">
				<div class="nk-form">
					<center style="margin-bottom:10px"><img src="<?= base_url("") ?>/assets/img/logo/logo-hd.png" alt="bk online logo"></center>
					<h6 style="margin-bottom:20px">Siswa Login</h6>
					<div class="input-group">
						<span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
						<div class="nk-int-st">
							<input type="text" name="email" class="form-control" placeholder="Email" required>
						</div>
					</div>
					<div class="input-group mg-t-15">
						<span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
						<div class="nk-int-st">
							<input type="password" name="password" class="form-control" placeholder="Password" required>
						</div>
					</div>
					<div class="fm-checkbox">
						<span>Belum punya akun? Daftar <a href="<?= base_url() ?>/register">Disini</a></span>
					</div>

					<button type="submit" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
				</div>
			</form>

			<div class="nk-navigation nk-lg-ic">
				<a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-support"></i><span>Admin</span></a>
				<a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Lupa Password</span></a>
			</div>
		</div>

		<!-- Register -->
		<div class="nk-block" id="l-register">
			<form action="<?= base_url("/admin/auth") ?>" method="post">
				<div class="nk-form">
					<center style="margin-bottom:10px"><img src="<?= base_url("") ?>/assets/img/logo/logo-hd.png" alt="bk online logo"></center>

					<h6 style="margin-bottom:20px">Admin Login</h6>
					<div class="input-group">
						<span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
						<div class="nk-int-st">
							<input type="text" name="email" class="form-control" placeholder="Email Administrator" required>
						</div>
					</div>
					<div class="input-group mg-t-15">
						<span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
						<div class="nk-int-st">
							<input type="password" name="password" class="form-control" placeholder="Password" required>
						</div>
					</div>

					<button type="submit" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
				</div>
			</form>

			<div class="nk-navigation rg-ic-stl">
				<a href="" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
				<a href="" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
			</div>
		</div>

		<!-- Forgot Password -->
		<div class="nk-block" id="l-forget-password">
			<div class="nk-form">
				<form action="<?= base_url('/forgot-pass') ?>" method="post">

					<p class="text-left">Masukan email yang terdaftar untuk melakukan reset password</p>

					<div class="input-group">
						<span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
						<div class="nk-int-st">
							<input type="text" class="form-control" placeholder="Email Address" name="email" required>
						</div>
					</div>

					<button type="submit" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
				</form>
			</div>

			<div class="nk-navigation nk-lg-ic rg-ic-stl">
				<a href="" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
				<a href="<?= base_url('/register') ?>" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-plus-symbol"></i> <span>Register</span></a>
			</div>
		</div>
	</div>

	<?php
	session()->getFlashdata('msg') ?>
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
	<!--  notification JS
		============================================ -->
	<script src="<?= base_url("") ?>/assets/js/notification/bootstrap-growl.js"></script>
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