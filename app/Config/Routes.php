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
$routes->get('/admin', 'Home::login');
$routes->get('/siswa', 'Home::login');
$routes->get('/daftar', 'SiswaController::daftar');

/**
 * --------------------------------------------------------------------
 * Route Siswa
 * --------------------------------------------------------------------
 */
$routes->get('/siswa/dashboard', 'SiswaController::index');
$routes->get('/siswa/edukasi', 'EdukasiController::edukasi_siswa');
$routes->get('/siswa/edukasi/(:num)', 'EdukasiController::edukasi_view/$1');
$routes->get('/siswa/konsultasi', 'KonsultasiController::konsultasi');
$routes->get('/siswa/pengaduan', 'PengaduanController::pengaduan');
$routes->get('/siswa/jenis-pelanggaran', 'PelanggaranController::pelanggaran');
$routes->get('/siswa/riwayat-pelanggaran', 'PelanggaranController::riwayat_pelanggaran');
$routes->get('/siswa/profile-saya', 'SiswaController::profile_saya');
$routes->get('/siswa/profile-siswa', 'SiswaController::profile_siswa');
$routes->get('/siswa/about', 'Home::about');
$routes->get('/siswa/faq', 'Home::faq');

$routes->post('/siswa/auth', 'SiswaController::auth');
$routes->post('/siswa/tambah-akun', 'SiswaController::tambah_akun');

/**
 * --------------------------------------------------------------------
 * Proses
 * --------------------------------------------------------------------
 */
$routes->post('/proses/tambah-profile-siswa', 'SiswaController::tambah_profile_siswa');
$routes->post('/proses/tambah-profile-admin', 'AdminController::tambah_profile_admin');
$routes->post('/proses/tambah-data-edukasi', 'EdukasiController::tambah_data_edukasi');
$routes->post('/proses/tambah-data-faq', 'AdminController::tambah_data_faq');

$routes->post('/proses/kirim-konsultasi', 'KonsultasiController::kirim_konsultasi');
$routes->post('/proses/kirim-pengaduan', 'PengaduanController::kirim_pengaduan');
$routes->post('/proses/kirim-pelanggaran', 'PelanggaranController::kirim_pelanggaran');
$routes->post('/proses/kirim-pelanggaran-siswa', 'PelanggaranController::kirim_pelanggaran_siswa');

$routes->post('/proses/edit-profile-siswa', 'SiswaController::edit_profile_siswa');
$routes->post('/proses/edit-profile-admin', 'AdminController::edit_profile_admin');
$routes->post('/proses/edit-data-edukasi', 'EdukasiController::edit_data_edukasi');
$routes->post('/proses/edit-password-siswa', 'SiswaController::edit_password_siswa');
$routes->post('/proses/edit-password-admin', 'AdminController::edit_password_admin');
$routes->post('/proses/edit-data-pelanggaran', 'PelanggaranController::edit_data_pelanggaran');
$routes->post('/proses/edit-data-faq', 'AdminController::edit_data_faq');

$routes->get('/proses/delete_konsultasi/(:num)', 'KonsultasiController::delete_konsultasi/$1');
$routes->get('/proses/delete_pengaduan/(:num)', 'PengaduanController::delete_pengaduan/$1');
$routes->get('/proses/delete_pelanggaran/(:num)', 'PelanggaranController::delete_pelanggaran/$1');
$routes->get('/proses/delete-profile-siswa/(:num)', 'SiswaController::delete_profile_siswa/$1');
$routes->get('/proses/delete-profile-admin/(:num)', 'AdminController::delete_profile_admin/$1');
$routes->get('/proses/delete-edukasi/(:num)', 'EdukasiController::delete_edukasi/$1');

$routes->get('/proses/5a2efc8fd504edad5e4867d73601f102', 'PengaduanController::delete_pengaduan');
$routes->get('/proses/bfd3e581b43029e82c36b4b4976c1ea7', 'KonsultasiController::delete_konsultasi');
$routes->get('/proses/cdfd837e007a6f036c70b58f5b2603da', 'PelanggaranController::delete_pelanggaran');
$routes->get('/proses/52194a266de6838d4be3057fb1615227', 'PelanggaranController::delete_pelanggaran_siswa');
$routes->get('/proses/e26c3b7bc1e73d701afbe50f421c0137', 'SiswaController::delete_profile_siswa');
$routes->get('/proses/acb52b147e0a0014ce9ffcede18f1c63', 'AdminController::delete_profile_admin');
$routes->get('/proses/1fa71442e69554cbd67fecd52f7ced91', 'AdminController::delete_data_faq');
$routes->get('/proses/3912f6b5a6108033e736062e64bddb5f', 'EdukasiController::delete_edukasi');

$routes->get('/proses/log-out', 'Home::log_out');

/**
 * --------------------------------------------------------------------
 * Route Admin
 * --------------------------------------------------------------------
 */
$routes->get('/admin/dashboard', 'AdminController::index');
$routes->get('/admin/data-edukasi', 'EdukasiController::data_edukasi');
$routes->get('/admin/data-tambah-edukasi', 'EdukasiController::tambah_edukasi_view');

$routes->get('/admin/data-edukasi-view/(:num)', 'EdukasiController::data_edukasi_view/$1');
$routes->get('/admin/data-edukasi-view-edit/(:num)', 'EdukasiController::data_edukasi_view_edit/$1');

$routes->get('/admin/data-konsultasi', 'KonsultasiController::data_konsultasi');
$routes->get('/admin/data-pengaduan', 'PengaduanController::data_pengaduan');
$routes->get('/admin/data-pelanggaran', 'PelanggaranController::data_pelanggaran');
$routes->get('/admin/data-pelanggaran-siswa', 'PelanggaranController::data_pelanggaran_siswa');

$routes->get('/admin/data-profile-saya', 'AdminController::data_profile_saya');
$routes->get('/admin/data-profile-siswa', 'AdminController::data_profile_siswa');

$routes->get('/admin/data-about', 'AdminController::data_about');
$routes->get('/admin/data-faq', 'AdminController::data_faq');

$routes->post('/admin/auth', 'AdminController::auth');
$routes->post('/admin/proses/admin-logout', 'AdminController::logout');


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
