<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>404 Page | BK Online</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- favicon
		============================================ -->
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/assets/img/favicon.ico">
	<!-- Google Fonts
		============================================ -->
	<link href="<?= base_url() ?>/assets/https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
	<!-- Bootstrap CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css">
	<!-- font awesome CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/font-awesome.min.css">
	<!-- owl.carousel CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/owl.theme.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/owl.transitions.css">
	<!-- animate CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/animate.css">
	<!-- normalize CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/normalize.css">
	<!-- mCustomScrollbar CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
	<!-- wave CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/wave/waves.min.css">
	<!-- Notika icon CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/notika-custom-icon.css">
	<!-- main CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/main.css">
	<!-- style CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/style.css">
	<!-- responsive CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/responsive.css">
	<!-- modernizr JS
		============================================ -->
	<script src="<?= base_url() ?>/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
	<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="<?= base_url() ?>/assets/http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	<!-- 404 Page area Start-->
	<div class="error-page-area">
		<div class="error-page-wrap">
			<!-- <i class="notika-icon notika-close"></i> -->
			<center>
				<h1>Oops!</h1>
				<img src="<?= base_url('public/img/sorry.gif') ?>" alt="" style="height:200px !important">
			</center>
			<br>
			<?php if (!empty($message) && $message !== '(null)') : ?>
				<?= esc($message) ?>
			<?php else : ?>
				<h2><span class="counter">404</span> NOT FOUND</h2>
				<center>
					<img src="<?= base_url('public/img/sorry.gif') ?>" alt="" style="height:200px !important">
				</center>
				<br>
				<p>Sorry! Cannot seem to find the page you were looking for.</p>
			<?php endif ?>
			<a href="<?= base_url() ?>" class="btn mt-4">Dashboard</a>
		</div>
	</div>
	<!-- 404 Page area End-->
	<!-- jquery
		============================================ -->
	<script src="<?= base_url() ?>/assets/js/vendor/jquery-1.12.4.min.js"></script>
	<!-- bootstrap JS
		============================================ -->
	<script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
	<!-- wow JS
		============================================ -->
	<script src="<?= base_url() ?>/assets/js/wow.min.js"></script>
	<!-- price-slider JS
		============================================ -->
	<script src="<?= base_url() ?>/assets/js/jquery-price-slider.js"></script>
	<!-- owl.carousel JS
		============================================ -->
	<script src="<?= base_url() ?>/assets/js/owl.carousel.min.js"></script>
	<!-- scrollUp JS
		============================================ -->
	<script src="<?= base_url() ?>/assets/js/jquery.scrollUp.min.js"></script>
	<!-- meanmenu JS
		============================================ -->
	<script src="<?= base_url() ?>/assets/js/meanmenu/jquery.meanmenu.js"></script>
	<!-- counterup JS
		============================================ -->
	<script src="<?= base_url() ?>/assets/js/counterup/jquery.counterup.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/counterup/waypoints.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/counterup/counterup-active.js"></script>
	<!-- mCustomScrollbar JS
		============================================ -->
	<script src="<?= base_url() ?>/assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<!-- sparkline JS
		============================================ -->
	<script src="<?= base_url() ?>/assets/js/sparkline/jquery.sparkline.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/sparkline/sparkline-active.js"></script>
	<!-- flot JS
		============================================ -->
	<script src="<?= base_url() ?>/assets/js/flot/jquery.flot.js"></script>
	<script src="<?= base_url() ?>/assets/js/flot/jquery.flot.resize.js"></script>
	<script src="<?= base_url() ?>/assets/js/flot/flot-active.js"></script>
	<!-- knob JS
		============================================ -->
	<script src="<?= base_url() ?>/assets/js/knob/jquery.knob.js"></script>
	<script src="<?= base_url() ?>/assets/js/knob/jquery.appear.js"></script>
	<script src="<?= base_url() ?>/assets/js/knob/knob-active.js"></script>
	<!--  wave JS
		============================================ -->
	<script src="<?= base_url() ?>/assets/js/wave/waves.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/wave/wave-active.js"></script>
	<!--  Chat JS
		============================================ -->
	<script src="<?= base_url() ?>/assets/js/chat/jquery.chat.js"></script>
	<!--  todo JS
		============================================ -->
	<script src="<?= base_url() ?>/assets/js/todo/jquery.todo.js"></script>
	<!-- plugins JS
		============================================ -->
	<script src="<?= base_url() ?>/assets/js/plugins.js"></script>
	<!-- main JS
		============================================ -->
	<script src="<?= base_url() ?>/assets/js/main.js"></script>
</body>

</html>