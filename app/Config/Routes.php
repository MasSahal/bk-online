<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
/**
 * --------------------------------------------------------------------
 * Halaman Login All in One
 * --------------------------------------------------------------------
 */
$routes->get('/', 'Home::login');
$routes->get('/login', 'Home::login');
// $routes->get('/admin', 'Home::login');
// $routes->get('/siswa', 'Home::login');
$routes->get('/register', 'SiswaController::daftar');
$routes->post('/forgot-pass', 'Home::forgotPassword');

/**
 * --------------------------------------------------------------------
 * Route Siswa
 * --------------------------------------------------------------------
 */
$routes->group('siswa', ['filter' => 'ceklogin'], function ($routes) {
	$routes->get('dashboard', 'SiswaController::index');
	$routes->get('edukasi', 'AdminController::edukasi_siswa');
	$routes->get('edukasi/(:num)', 'AdminController::edukasi_view/$1');
	$routes->get('konsultasi', 'AdminController::konsultasi');
	$routes->get('pengaduan', 'PengaduanController::pengaduan');
	$routes->get('jenis-pelanggaran', 'PelanggaranController::pelanggaran');
	$routes->get('data-riwayat-kejadian', 'AdminController::data_riwayat_kejadian');
	$routes->get('profile-saya', 'SiswaController::profile_saya');
	$routes->get('profile-siswa', 'SiswaController::profile_siswa');
	$routes->get('about', 'Home::about');
	$routes->get('faq', 'Home::faq');
});
$routes->post('/siswa/auth', 'SiswaController::auth');
$routes->post('/siswa/tambah-akun', 'SiswaController::tambah_akun');

/**
 * --------------------------------------------------------------------
 * Proses
 * --------------------------------------------------------------------
 */
$routes->post('/proses/tambah-profile-siswa', 'SiswaController::tambah_profile_siswa');
$routes->post('/proses/tambah-profile-admin', 'AdminController::tambah_profile_admin');
$routes->post('/proses/tambah-data-edukasi', 'AdminController::tambah_data_edukasi');
$routes->post('/proses/tambah-data-faq', 'AdminController::tambah_data_faq');

$routes->post('/proses/kirim-konsultasi', 'AdminController::kirim_konsultasi');
$routes->post('/proses/kirim-pengaduan', 'PengaduanController::kirim_pengaduan');
$routes->post('/proses/kirim-pelanggaran', 'PelanggaranController::kirim_pelanggaran');
$routes->post('/proses/kirim-pelanggaran-siswa', 'PelanggaranController::kirim_pelanggaran_siswa');

$routes->post('/proses/edit-profile-siswa', 'SiswaController::edit_profile_siswa');
$routes->post('/proses/edit-profile-admin', 'AdminController::edit_profile_admin');
$routes->post('/proses/edit-data-edukasi', 'AdminController::edit_data_edukasi');
$routes->post('/proses/edit-password-siswa', 'SiswaController::edit_password_siswa');
$routes->post('/proses/edit-password-admin', 'AdminController::edit_password_admin');
$routes->post('/proses/edit-data-pelanggaran', 'PelanggaranController::edit_data_pelanggaran');
$routes->post('/proses/edit-data-faq', 'AdminController::edit_data_faq');

$routes->get('/proses/delete_konsultasi/(:num)', 'AdminController::delete_konsultasi/$1');
$routes->get('/proses/delete_pengaduan/(:num)', 'PengaduanController::delete_pengaduan/$1');
$routes->get('/proses/delete_pelanggaran/(:num)', 'PelanggaranController::delete_pelanggaran/$1');
$routes->get('/proses/delete-profile-siswa/(:num)', 'SiswaController::delete_profile_siswa/$1');
$routes->get('/proses/delete-profile-admin/(:num)', 'AdminController::delete_profile_admin/$1');
$routes->get('/proses/delete-edukasi/(:segment)', 'AdminController::delete_edukasi/$1');

$routes->get('/proses/5a2efc8fd504edad5e4867d73601f102', 'PengaduanController::delete_pengaduan');
$routes->get('/proses/bfd3e581b43029e82c36b4b4976c1ea7', 'AdminController::delete_konsultasi');
$routes->get('/proses/cdfd837e007a6f036c70b58f5b2603da', 'PelanggaranController::delete_pelanggaran');
$routes->get('/proses/52194a266de6838d4be3057fb1615227', 'PelanggaranController::delete_pelanggaran_siswa');
$routes->get('/proses/e26c3b7bc1e73d701afbe50f421c0137', 'SiswaController::delete_profile_siswa');
$routes->get('/proses/acb52b147e0a0014ce9ffcede18f1c63', 'AdminController::delete_profile_admin');
$routes->get('/proses/1fa71442e69554cbd67fecd52f7ced91', 'AdminController::delete_data_faq');
$routes->get('/proses/3912f6b5a6108033e736062e64bddb5f', 'AdminController::delete_edukasi');

$routes->get('/proses/log-out', 'Home::log_out');

//ajax
$routes->post('/proses/tambah-data-edukasi-komentar', 'AdminController::tambah_data_edukasi_komentar');
$routes->post('/proses/view-data-edukasi-komentar-ajax/(:num)', 'AdminController::data_edukasi_komentar_view/$1');
$routes->get('/proses/data-riwayat-filter', 'AdminController::cari_data_riwayat');



/**
 * --------------------------------------------------------------------
 * Route Admin
 * --------------------------------------------------------------------
 */
$routes->group('admin', ['filter' => 'ceklogin'], function ($routes) {
	$routes->get('dashboard', 'AdminController::index');
	$routes->get('data-edukasi', 'AdminController::data_edukasi');
	$routes->get('data-tambah-edukasi', 'AdminController::tambah_edukasi_view');

	$routes->get('data-edukasi/view/(:alphanum)', 'AdminController::data_edukasi_view/$1');
	$routes->get('data-edukasi/view-edit/(:alphanum)', 'AdminController::data_edukasi_view_edit/$1');

	$routes->get('data-konsultasi', 'AdminController::data_konsultasi');
	$routes->get('data-pengaduan', 'AdminController::data_pengaduan');
	$routes->get('data-pelanggaran', 'PelanggaranController::data_pelanggaran');
	$routes->get('data-riwayat', 'AdminController::data_riwayat');
	$routes->get('print-data-riwayat', 'AdminController::print_data_riwayat');


	$routes->get('data-pengaduan-pdf', 'AdminController::data_pengaduan_pdf'); // data konsultasi to pdf
	$routes->get('data-pengaduan-excell', 'AdminController::data_pengaduan_excell'); // data konsultasi to excell

	$routes->get('data-konsultasi-pdf', 'AdminController::data_konsultasi_pdf'); // data konsultasi to pdf
	$routes->get('data-konsultasi-excell', 'AdminController::data_konsultasi_excell'); // data konsultasi to excell

	$routes->get('data-riwayat-pdf', 'AdminController::data_riwayat_pdf'); // data riwayat to pdf
	$routes->get('data-riwayat-excell', 'AdminController::data_riwayat_excell'); // data riwayat to excell


	$routes->get('data-profile-saya', 'AdminController::data_profile_saya');
	$routes->get('data-profile-siswa', 'AdminController::data_profile_siswa');

	$routes->get('data-about', 'AdminController::data_about');
	$routes->get('data-faq', 'AdminController::data_faq');
});

$routes->post('/admin/auth', 'AdminController::auth');
$routes->get('/admin/proses/admin-logout', 'AdminController::admin_logout');
$routes->get('/admin', 'AdminController::get_riwayat');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
