<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

// require_once __DIR__ . '/../Bootstrap.php';
class AdminController extends BaseController
{

	protected $session;
	protected $db;
	protected $faqModel;
	protected $adminModel;

	// public function __construct()
	// {


	// 	$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
	// 	$sheet = $spreadsheet->getActiveSheet();
	// }


	//--------------------------------------------------------------------
	//METHOD INDEX - DASHBOARD
	//--------------------------------------------------------------------
	public function index()
	{
		$data = ([
			'active' 		=> "Home",
			'title' 		=> "Dashboard",
			'siswa' 		=> $this->siswaModel->countAll(),
			'edukasi' 		=> $this->edukasiModel->countAll(),
			'pengaduan' 	=> $this->pengaduanModel->countAll(),
			'konsultasi'  	=> $this->konsultasiModel->countAll(),
			'pelanggaran' 	=> $this->pelanggaranModel->countAll(),
			'list_edukasi' 	=> $this->edukasiModel->findAll(2),
		]);
		return view('admin/dashboard', $data);
	}

	//--------------------------------------------------------------------
	//METHOD KUNJUNGAN - DASHBOARD
	//--------------------------------------------------------------------
	public function data_kunjungan()
	{
		$data = ([
			'active' 		=> "Home",
			'title' 		=> "Data Kunjungan",
			'kunjungan' 	=> $this->kunjunganModel->getData(),
			'jml_kunjungan' 	=> $this->kunjunganModel->getDataToday(),
		]);
		return view('admin/data-kunjungan', $data);
	}

	public function tambah_data_kunjungan()
	{
		$data = ([
			'nama'		 	=> $this->request->getPost('nama'),
			'tujuan'		=> $this->request->getPost('tujuan'),
			'catatan'		=> $this->request->getPost('catatan'),
		]);
		$this->kunjunganModel->addData($data);
		echo json_encode($data);
	}





	//--------------------------------------------------------------------
	//AUTH ADMIN
	//--------------------------------------------------------------------
	public function auth()
	{

		$email = $this->request->getPost('email');
		$pass = $this->request->getPost('password');       // $akun = $this->db->query("SELECT * FROM siswa WHERE nama='$user' AND password='$pass'")->getResultArray();

		$akun = $this->adminModel->where('email', $email)->first();
		if ($akun) {
			$verifY = password_verify($pass, $akun->password);
			if ($verifY) {
				$sesi_login = [
					'id_login_admin'	=> $akun->id,
					'kode_admin'    	=> $akun->kode_admin,
					'nama'          	=> $akun->nama,
					'email'         	=> $akun->email,
					'is_login'     		=> 'admin'
				];
				$this->session->set($sesi_login);
				$this->session->setFlashdata('msg_login', 'Selamat Datang Kembali ' . $akun->nama);
				return redirect()->to(base_url('/admin/dashboard'));
			} else {
				$this->session->setFlashdata('msg_login', 'Gagal login !');
				return redirect()->to(base_url('/login'));
				// return redirect()->to(base_url('/pengaduan'));
			}
		} else {
			$this->session->setFlashdata('msg_login', 'Email atau Password Salah !');
			return redirect()->to(base_url('/'));
		}
	}

	//--------------------------------------------------------------------
	//PELANGGARAN - ADMIN
	//--------------------------------------------------------------------
	public function data_pelanggaran()
	{
		$data = ([
			'active' 			=> "Program",
			'title' 			=> "Data Pelanggaran",
			'pelanggaran' 		=> $this->pelanggaranModel->countAll(),
			'list_pelanggaran' 	=> $this->pelanggaranModel->getData(),
		]);
		return view('/admin/data-pelanggaran', $data);
	}

	//--------------------------------------------------------------------
	//PROSES DELETE PELANGGARAN - SISWA/ADMIN
	//--------------------------------------------------------------------
	public function delete_pelanggaran($id = FALSE)
	{
		if ($id == FALSE) {

			$deleteAll = $this->pelanggaranModel->query("DELETE FROM pelanggaran");
			if ($deleteAll) {

				$this->session->setFlashdata("msg_suc", "Berhasil membersihkan data konsultasi !");
				return redirect()->to(previous_url());
			} else {
				$this->session->setFlashdata("msg_err", "Gagal membersihkan data konsultasi !");
				return redirect()->to(previous_url());
			}
		} else {

			$delete = $this->pelanggaranModel->delete($id);

			if ($delete) {
				$this->session->setFlashdata("msg_suc", "Pelanggaran telah dihapus !");
				return redirect()->to(previous_url());
			} else {
				$this->session->setFlashdata("msg_err", "Pelanggaran gagal dihapus !");
				return redirect()->to(previous_url());
			}
		}
	}

	//--------------------------------------------------------------------
	//PROSES KIRIM PELANGGARAN - SISWA/ADMIN
	//--------------------------------------------------------------------
	public function kirim_pelanggaran()
	{

		$pelanggaran      = $this->request->getPost('pelanggaran');
		$poin_pelanggaran = $this->request->getPost('poin_pelanggaran');
		$keterangan       = $this->request->getPost('keterangan');

		$data = ([
			'pelanggaran'       => $pelanggaran,
			'poin_pelanggaran'  => $poin_pelanggaran,
			'keterangan'        => $keterangan
		]);

		$input  = $this->pelanggaranModel->insert($data);
		if ($input) {
			$this->session->setFlashdata("msg_suc", "Berhasil menambah data pelanggaran !");
			return redirect()->to(previous_url());
		} else {
			$this->session->setFlashdata("msg_err", "Gagal menambah data pelanggaran !");
			return redirect()->to(previous_url());
		}
	}

	//--------------------------------------------------------------------
	//VIEW DATA PROFILE SISWA - ADMIN
	//--------------------------------------------------------------------
	public function data_profile_siswa()
	{
		$data['title'] = "Data Profile Siswa";
		$data['active'] = "Profile";
		$data['list_siswa'] = $this->siswaModel->findAll();
		return view('admin/data-profile-siswa', $data);
	}

	//--------------------------------------------------------------------
	//VIEW PROFILE SAYA - ADMIN
	//--------------------------------------------------------------------
	public function data_profile_saya()
	{
		if (isset($_SESSION['is_login'])) {

			if ($_SESSION['is_login'] == 'siswa') {
				return redirect()->to(previous_url());
			}
		} else {
			return redirect()->to(previous_url());
		}

		$id = $this->session->id_login_admin;
		$data = ([
			'title' 		=> "Data Profile Saya",
			'active' 		=> "Profile",
			'list_admin' 	=> $this->adminModel->getData(),
			'profile_saya' 	=> $this->adminModel->getData($id),
		]);
		return view('admin/data-profile-saya', $data);
	}

	//--------------------------------------------------------------------
	//PROSES TAMBAH PROFILE ADMIN - ADMIN
	//--------------------------------------------------------------------
	public function tambah_profile_admin()
	{
		$kode_admin 	  = "ADM" . time() . rand(1, 9);
		$nama             = $this->request->getPost('nama');
		$email            = $this->request->getPost('email');
		$password         = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
		$alamat           = $this->request->getPost('alamat');
		$jenis_kelamin    = $this->request->getPost('jenis_kelamin');

		$cek_kode_admin = $this->adminModel->where(['kode_admin' => $kode_admin])->first();
		if ($cek_kode_admin == NULL) {
			$data = ([
				'kode_admin' => $kode_admin,
				'nama' => $nama,
				'email' => $email,
				'password' => $password,
				'alamat' => $alamat,
				'jenis_kelamin' => $jenis_kelamin
			]);

			$input  = $this->adminModel->insert($data);
			if ($input) {
				//buat riwayat
				$riwayat = ([
					'nama' => $this->session->nama,
					'subjek' => "Menambah profile " . $nama,
					'jenis' => 'Profile',
					'role' => 'Admin',
					'catatan' => "Ditambahkan oleh " . $this->session->nama . " melalui halaman admin"
				]);
				$this->riwayatModel->addData($riwayat);
				$this->session->setFlashdata("msg_suc", "Berhasil menambah administrator !");
				return redirect()->to(previous_url());
			} else {
				$this->session->setFlashdata("msg_err", "Gagal menambah administrator !");
				return redirect()->to(previous_url());
			}
		} else {
			$this->session->setFlashdata("msg_err", "Kode administrator sudah terdaftar!");
			return redirect()->to(previous_url());
		}
	}

	//--------------------------------------------------------------------
	//PROSES EDIT PROFILE ADMIN - ADMIN
	//--------------------------------------------------------------------
	public function edit_profile_admin()
	{
		$id       		  = $this->request->getPost('id');
		$nama             = $this->request->getPost('nama');
		$email            = $this->request->getPost('email');
		$alamat           = $this->request->getPost('alamat');
		$jenis_kelamin    = $this->request->getPost('jenis_kelamin');

		$data = ([
			'nama' 			=> $nama,
			'email' 		=> $email,
			'alamat' 		=> $alamat,
			'jenis_kelamin' => $jenis_kelamin
		]);
		// dd($data);
		$update  = $this->adminModel->updateData($id, $data);
		if ($update) {
			$this->session->setFlashdata("msg_suc", "Berhasil mengubah administrator !");
			return redirect()->to(previous_url());
		} else {
			$this->session->setFlashdata("msg_err", "Gagal mengubah administrator !");
			return redirect()->to(previous_url());
		}
	}

	//--------------------------------------------------------------------
	//PROSES DELETE PROFILE ADMIN - ADMIN
	//--------------------------------------------------------------------
	public function delete_profile_admin($id = FALSE)
	{
		if ($id == FALSE) {

			$id_akun_aktif = $this->session->id_login_admin;
			$deleteAll = $this->adminModel->deleteData($id, $id_akun_aktif);
			if ($deleteAll) {

				$this->session->setFlashdata("msg_suc", "Berhasil membersihkan semua administrator !");
				return redirect()->to(previous_url());
			} else {
				$this->session->setFlashdata("msg_err", "Gagal membersihkan semua administrator !");
				return redirect()->to(previous_url());
			}
		} else {
			$delete = $this->adminModel->deleteData($id);

			if ($delete) {
				$this->session->setFlashdata("msg_suc", "Berhasil menghapus administrator !");
				return redirect()->to(previous_url());
			} else {
				$this->session->setFlashdata("msg_err", "Gagal mengapus administrator !");
				return redirect()->to(previous_url());
			}
		}
	}

	//--------------------------------------------------------------------
	//PROSES EDIT PASSWORD ADMIN - SISWA/ADMIN
	//--------------------------------------------------------------------
	public function edit_password_admin()
	{
		$id       			  = $this->request->getPost('id');
		$nama       		  = $this->request->getPost('nama');
		$password_baru        = $this->request->getPost('password-baru');
		$password_konfir      = $this->request->getPost('password-konfir');

		if ($password_baru == $password_konfir) {
			$data = ([
				'password' => password_hash($password_baru, PASSWORD_DEFAULT)
			]);

			//eksekusi data ke database
			$ubah_pw = $this->adminModel->update($id, $data);
			if ($ubah_pw) {

				//buat riwayat
				$riwayat = ([
					'nama' => $this->session->nama,
					'subjek' => "Mengubah password $nama",
					'jenis' => 'Profile',
					'role' => 'Admin',
					'catatan' => "Diubah oleh " . $this->session->nama . " melalui halaman admin"
				]);
				$this->riwayatModel->addData($riwayat);
				$this->session->setFlashdata('msg_suc', 'Password berhasil diperbarui !');
				return redirect()->to(previous_url());
			} else {
				$this->session->setFlashdata('msg_err', 'Gagal memperbarui password !');
				return redirect()->to(previous_url());
			}
		} else {
			$this->session->setFlashdata('msg_err', 'Password tidak sama !');
			return redirect()->to(previous_url());
		}
	}

	//--------------------------------------------------------------------
	//DATA FAQ - ADMIN
	//--------------------------------------------------------------------
	public function data_faq()
	{
		if (isset($_SESSION['is_login'])) {

			if ($_SESSION['is_login'] == 'siswa') {
				return redirect()->to(previous_url());
			}
		} else {
			return redirect()->to(previous_url());
		}

		$data['title'] = "FAQ";
		$data['active'] = "Lainnya";
		$data['list_faq'] = $this->faqModel->findAll();
		return view('admin/data-faq', $data);
	}

	//--------------------------------------------------------------------
	//PROSES TAMBAH FAQ - ADMIN
	//--------------------------------------------------------------------
	public function tambah_data_faq()
	{
		$pertanyaan     = $this->request->getPost('pertanyaan');
		$jawaban       	= $this->request->getPost('jawaban');

		$data = ([
			'pertanyaan' 	=> $pertanyaan,
			'jawaban' 		=> $jawaban
		]);

		$input = $this->faqModel->insert($data);
		if ($input) {
			//buat riwayat
			$riwayat = ([
				'nama' => $this->session->nama,
				'subjek' => 'Membuat Faq baru',
				'jenis' => 'Membuat FAQ',
				'role' => 'Admin',
				'catatan' => "$pertanyaan : $jawaban"
			]);
			$this->riwayatModel->addData($riwayat);
			$this->session->setFlashdata("msg_suc", "Berhasil menambah FAQ !");
			return redirect()->to(previous_url());
		} else {
			$this->session->setFlashdata("msg_err", "Gagal menambah FAQ !");
			return redirect()->to(previous_url());
		}
	}

	//--------------------------------------------------------------------
	//PROSES EDIT FAQ - ADMIN
	//--------------------------------------------------------------------
	public function edit_data_faq()
	{
		$id       		= $this->request->getPost('id');
		$pertanyaan     = $this->request->getPost('pertanyaan');
		$jawaban       	= $this->request->getPost('jawaban');

		$data = ([
			'pertanyaan' 	=> $pertanyaan,
			'jawaban' 		=> $jawaban
		]);

		$update = $this->faqModel->update($id, $data);
		if ($update) {
			$this->session->setFlashdata("msg_suc", "Berhasil mengubah data faq !");
			return redirect()->to(previous_url());
		} else {
			$this->session->setFlashdata("msg_err", "Gagal mengubah data faq !");
			return redirect()->to(previous_url());
		}
	}

	//--------------------------------------------------------------------
	//PROSES DELETE FAQ - ADMIN
	//--------------------------------------------------------------------
	public function delete_data_faq($id = FALSE)
	{
		if ($id == FALSE) {

			$deleteAll = $this->faqModel->query("DELETE FROM faq");
			if ($deleteAll) {

				$this->session->setFlashdata("msg_suc", "Berhasil membersihkan semua FAQ !");
				return redirect()->to(previous_url());
			} else {
				$this->session->setFlashdata("msg_err", "Gagal membersihkan semua FAQ !");
				return redirect()->to(previous_url());
			}
		} else {

			$delete = $this->faqModel->delete($id);

			if ($delete) {
				$this->session->setFlashdata("msg_suc", "Berhasil menghapus FAQ !");
				return redirect()->to(previous_url());
			} else {
				$this->session->setFlashdata("msg_err", "Gagal mengapus FAQ !");
				return redirect()->to(previous_url());
			}
		}
	}

	//--------------------------------------------------------------------
	//DATA ABOUT - ADMIN
	//--------------------------------------------------------------------
	public function data_about()
	{


		$data['title'] = "About";
		$data['active'] = "Lainnya";
		return view('admin/data-about', $data);
	}

	//--------------------------------------------------------------------
	//PROSES LOGOUT - ADMIN
	//--------------------------------------------------------------------
	public function admin_logout()
	{
		session_destroy();
		return redirect()->to(base_url());
	}
	//--------------------------------------------------------------------



	# EDUKASI

	protected function filter_edukasi($nama = FALSE, $awal = FALSE, $akhir = FALSE)
	{
		$tgl_awal = date('Y-m-d H:i:s', strtotime($awal . " 00:00:00")); //filter ke date
		$tgl_akhir = date('Y-m-d H:i:s', strtotime($akhir . " 23:59:59")); //filter ke date

		# Jika semua di isi nilai
		if ($nama != "" && $awal != "" && $akhir != "") {
			$judul  		    = "Data Edukasi " . $nama . " dari " . tanggal($tgl_awal) . " sampai " . tanggal($tgl_akhir);
			$edukasi			= $this->edukasiModel->getDataByDateName($tgl_awal, $tgl_akhir, $nama);
			$tanggal			= "Dibuat pada " . tanggal(date('y-m-d')) . " pukul " . date('H:i');

			# Jika nama kosong
		} else if ($nama == "" && $awal != "" && $akhir != "") {
			$judul  		    = "Data Konsultasi " . tanggal($tgl_awal) . " sampai " . tanggal($tgl_akhir);
			$edukasi			= $this->edukasiModel->getDataByDate($tgl_awal, $tgl_akhir,);
			$tanggal			= "Dibuat pada " . tanggal(date('y-m-d')) . " pukul " . date('H:i');

			# Jika tanggal kosong
		} else if ($nama != "" && $awal == "" && $akhir == "") {

			$judul  		    = "Data Edukasi " . $nama;
			$edukasi			= $this->edukasiModel->getDataByName($nama);
			$tanggal			= "Dibuat pada " . tanggal(date('y-m-d')) . " pukul " . date('H:i');

			# Jika tidak ada sama sekali
		} else {
			$judul 				= "Data Seluruh Edukasi";
			$edukasi 			= $this->edukasiModel->getData();
			$tanggal			= "Dibuat pada " . tanggal(date('y-m-d')) . " pukul " . date('H:i');
		}

		return array('judul' => $judul, 'edukasi' => $edukasi, 'tanggal' => $tanggal);
	}

	public function data_edukasi()
	{
		$nama 			= $this->request->getGet('nama');
		$awal 			= $this->request->getGet('awal');
		$akhir 			= $this->request->getGet('akhir');
		$filter = $this->filter_edukasi($nama, $awal, $akhir);

		$data = ([
			'active' 		=> 'Program',
			'title' 		=> 'Data Edukasi',
			'nama' 			=> $nama,
			'awal' 			=> $awal,
			'akhir' 		=> $akhir,
			'list_edukasi' 	=> $this->edukasiModel->findAll(),
			'jml_edukasi' 	=> $this->edukasiModel->countAll(),
		]);
		return view('admin/data-edukasi', $data);
	}

	public function edukasi_view($id)
	{
		$data['active']       = "Program";
		$data['title']        = "Edukasi";
		$data['edukasi']      = $this->edukasiModel->where('id', $id)->first();
		// dd($data);
		return view('siswa/edukasi-view', $data);
	}

	public function data_edukasi_view($id_pemutaran)
	{
		$edukasi = $this->edukasiModel->getData($id_pemutaran);
		$data = ([
			'active' 	=> "Program",
			'title' 	=> "View Data Edukasi",
			'edukasi' 	=> $edukasi,
			'komentar' 	=> $this->edukasiKomentarModel->getData($edukasi->id)
		]);
		return view('admin/data-edukasi-view', $data);
	}

	public function data_edukasi_view_edit($id_pemutaran)
	{
		$edukasi = $this->edukasiModel->where('id_pemutaran', $id_pemutaran)->findAll();
		$data = ([
			'active' => "Program",
			'title' => "View Data Edukasi",
			'edukasi' => $this->edukasiModel->getData($id_pemutaran),
			'komentar' => $edukasi->id
		]);
		return view('admin/data-edukasi-view-edit', $data);
	}

	public function tambah_edukasi_view()
	{
		$data = ([
			'active' => "Program",
			'title' => "Tambah Data Edukasi",
			'list_edukasi' => $this->edukasiModel->getData()
		]);
		return view('admin/data-tambah-edukasi', $data);
	}

	public function tambah_data_edukasi()
	{
		$link_video		= $this->request->getPost('link_video');
		$id_pemutaran   = get_id_video($link_video);
		if ($id_pemutaran) {
			$cek = $this->edukasiModel->getData($id_pemutaran);
			if (empty($cek)) {
				$data = ([
					'id_pemutaran'  => $id_pemutaran,
					'author'        => $this->session->nama,
					'judul'         => $this->request->getPost('judul'),
					'link_video'    => $link_video,
					'deskripsi'     => $this->request->getPost('deskripsi'),
					'tags'     		=> $this->request->getPost('tags'),
				]);

				//buat riwayat
				$riwayat = ([
					'nama' 		=> $this->session->nama,
					'subjek' 	=> 'Membuat materi edukasi',
					'jenis' 	=> 'Edukasi',
					'role' 		=> 'Admin',
					'catatan' 	=> "Link video materi dari YouTube : $link_video"
				]);
				$this->riwayatModel->addData($riwayat);
				$tambah = $this->edukasiModel->addData($data);
				if ($tambah) {
					$this->session->setFlashdata("msg_suc", "Berhasil menambahkan materi edukasi !");
					return redirect()->to(base_url('/admin/data-edukasi'));
				} else {
					$this->session->setFlashdata("msg_err", "Gagal menambahkan materi edukasi !");
					return redirect()->to(previous_url());
				}
			} else {
				$this->session->setFlashdata("msg_err", "Video sudah tersedia, Silahkan masukan video yang lain !");
				return redirect()->to(previous_url());
			}
		} else {
			$this->session->setFlashdata("msg_err", "Link video bermasalah, Silahkan masukan link dengan benar !");
			return redirect()->to(previous_url());
		}
	}

	public function edit_data_edukasi()
	{

		$id             = $this->request->getPost('id');
		$judul          = $this->request->getPost('judul');
		$link_video     = $this->request->getPost('link_video');
		$deskripsi      = $this->request->getPost('deskripsi');
		$id_pemutaran   = get_id_video($link_video);

		if ($id_pemutaran) {
			$data = ([
				'judul' 		=> $judul,
				'id_pemutaran' 	=> $id_pemutaran,
				'link_video' 	=> $link_video,
				'deskripsi' 	=> $deskripsi,
			]);

			$update = $this->edukasiModel->updateData($id, $data);
			if ($update) {
				$this->session->setFlashdata("msg_suc", "Berhasil memperbarui materi edukasi !");
				return redirect()->to(base_url('/admin/data-edukasi'));
			} else {
				$this->session->setFlashdata("msg_err", "Gagal memperbarui materi edukasi !");
				return redirect()->to(previous_url());
			}
		} else {
			$this->session->setFlashdata("msg_err", "Link video bermasalah, Silahkan masukan link dengan benar !");
			return redirect()->to(previous_url());
		}
	}

	public function delete_edukasi($id = FALSE)
	{
		if ($id == FALSE) {

			$deleteAll = $this->edukasiModel->deleteData();
			if ($deleteAll) {
				$this->session->setFlashdata("msg_suc", "Berhasil membersihkan materi edukasi !");
				return redirect()->to(base_url('/admin/data-edukasi'));
			} else {
				$this->session->setFlashdata("msg_err", "Gagal membersihkan materi edukasi !");
				return redirect()->to(previous_url());
			}
		} else {

			$delete = $this->edukasiModel->deleteData($id);
			if ($delete) {
				$this->session->setFlashdata("msg_suc", "Berhasil menghapus materi edukasi !");
				return redirect()->to(base_url('/admin/data-edukasi'));
			} else {
				$this->session->setFlashdata("msg_err", "Gagal menghapus materi edukasi !");
				return redirect()->to(previous_url());
			}
		}
	}

	public function data_edukasi_pdf()
	{
		$nama 			= $this->request->getGet('nama');
		$awal 			= $this->request->getGet('awal');
		$akhir 			= $this->request->getGet('akhir');

		$filter = $this->filter_edukasi($nama, $awal, $akhir);
		$nama_file = strtolower(date('Y_m_d') . "_" . str_replace(" ", "_", $filter['judul']));
		$html = view('admin/data/export_edukasi', $filter);
		$this->dompdf->loadHtml($html);
		$this->dompdf->render();

		//buat riwayat
		$riwayat = ([
			'nama' 		=> $this->session->nama,
			'subjek' 	=> 'Export data Edukasi ke Pdf',
			'jenis' 	=> 'Export to pdf',
			'role' 		=> 'Admin',
			'catatan' 	=> "Mengekspor " . $filter['judul'] . " oleh " . $this->session->nama . " melalui halaman admin"
		]);
		$this->riwayatModel->addData($riwayat);

		$this->dompdf->stream($nama_file);
	}

	public function data_edukasi_excell()
	{
		$nama 			= $this->request->getGet('nama');
		$awal 			= $this->request->getGet('awal');
		$akhir 			= $this->request->getGet('akhir');

		$filter = $this->filter_edukasi($nama, $awal, $akhir);
		$nama_file = strtolower(date('Y_m_d') . "_" . str_replace(" ", "_", $filter['judul']));

		$helper = new Sample();
		if ($helper->isCli()) {
			$helper->log($nama_file . PHP_EOL);

			return;
		}
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator($this->session->nama)
			->setLastModifiedBy($this->session->nama)
			->setTitle($filter['judul'])
			->setCategory('Edukasi');

		// tambah judul
		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', $filter['judul']);

		// font bold dan size 14
		$style_judul = [
			'font' => [
				'size' => 16,
				'bold' => true,
			],
			'alignment' => [
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
		];

		// bagian judul
		$spreadsheet->getActiveSheet()
			->getStyle('A1:G2')->applyFromArray($style_judul);
		$spreadsheet->getActiveSheet()->mergeCells("A1:G2");

		// bagian sub-judul
		$isi_kolom = ['No', 'Judul', 'Author', 'Deskripsi', 'Link', 'Tags', 'Waktu'];
		$spreadsheet->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
		$column = 1;
		foreach ($isi_kolom as $field) {
			// $changeSheet = $spreadSheet->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($column, 3, $field);
			$spreadsheet->getActiveSheet()
				->getStyle('A3:G3')->applyFromArray([
					'borders' =>  [
						'outline' => [
							'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
							'color' => ['rgb' => '1a1a2e'],
						],
					],
					'fill' => [
						'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
						'color' =>  ['argb' => '222831'],
					],
					'font' => [
						'color' =>  ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE],
					],
					'alignment' => [
						'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
						'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
					],
				]);
			$column++;
		}

		// bagian isi
		$kolom = 4;
		$nomor = 0;
		foreach ($filter['edukasi'] as $e) {
			$spreadsheet->getActiveSheet()
				->setCellValue('A' . $kolom, $nomor += 1)
				->setCellValue('B' . $kolom, $e->judul)
				->setCellValue('C' . $kolom, $e->author)
				->setCellValue('D' . $kolom, $e->deskripsi)
				->setCellValue('E' . $kolom, $e->link_video)
				->setCellValue('F' . $kolom, $e->tags)
				->setCellValue('G' . $kolom, $e->created_at);
			$spreadsheet->getActiveSheet()
				->getStyle('A' . $kolom . ':G' . $kolom)->applyFromArray([
					'borders' =>  [
						'outline' => [
							'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
							'color' => ['rgb' => '1a1a2e'],
						],
					]
				]);
			$kolom++;
		}

		//Sesusikan width colum dengan isi
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(100);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nama_file . '.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: private'); // HTTP/1.0

		//buat riwayat
		$riwayat = ([
			'nama' 		=> $this->session->nama,
			'subjek' 	=> 'Export data edukasi ke Excell',
			'jenis' 	=> 'Export to excell',
			'role' 		=> 'Admin',
			'catatan' 	=> "Mengekspor " . $filter['judul'] . " oleh " . $this->session->nama . " melalui halaman admin"
		]);
		$this->riwayatModel->addData($riwayat);


		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}



	#EDUKASI KOMENTAR
	public function tambah_data_edukasi_komentar()
	{
		$data = ([
			'id_edukasi' 	=> $this->request->getPost('id_edukasi'),
			'nama'		 	=> $this->request->getPost('nama'),
			'komentar'		=> htmlspecialchars($this->request->getPost('komentar'))
		]);
		$this->edukasiKomentarModel->addData($data);
		echo json_encode($data);
	}

	public function data_edukasi_komentar_view($id) //pakai jquery ajax -> json
	{
		$html = view('admin/data/komentar', array('komentar' => $this->edukasiKomentarModel->getData($id)));
		$data = ([
			'status' => 'sukses',
			'html' => $html
		]);

		echo json_encode($data);
	}

	# Pengaduan
	protected function filter_pengaduan($nama = FALSE, $awal = FALSE, $akhir = FALSE)
	{
		$tgl_awal = date('Y-m-d H:i:s', strtotime($awal . " 00:00:00")); //filter ke date
		$tgl_akhir = date('Y-m-d H:i:s', strtotime($akhir . " 23:59:59")); //filter ke date

		# Jika semua di isi nilai
		if ($nama != "" && $awal != "" && $akhir != "") {
			$judul  		    = "Data Pengaduan " . $nama . " dari " . tanggal($tgl_awal) . " sampai " . tanggal($tgl_akhir);
			$pengaduan			= $this->pengaduanModel->getDataByDateName($tgl_awal, $tgl_akhir, $nama);
			$tanggal			= "Dibuat pada " . tanggal(date('y-m-d')) . " pukul " . date('H:i');

			# Jika nama kosong
		} else if ($nama == "" && $awal != "" && $akhir != "") {
			$judul  		    = "Data Pengaduan " . tanggal($tgl_awal) . " sampai " . tanggal($tgl_akhir);
			$pengaduan			= $this->pengaduanModel->getDataByDate($tgl_awal, $tgl_akhir,);
			$tanggal			= "Dibuat pada " . tanggal(date('y-m-d')) . " pukul " . date('H:i');

			# Jika tanggal kosong
		} else if ($nama != "" && $awal == "" && $akhir == "") {

			$judul  		    = "Data Pengaduan " . $nama;
			$pengaduan			= $this->pengaduanModel->getDataByName($nama);
			$tanggal			= "Dibuat pada " . tanggal(date('y-m-d')) . " pukul " . date('H:i');

			# Jika tidak ada sama sekali
		} else {
			$judul 				= "Data Seluruh Pengaduan";
			$pengaduan 			= $this->pengaduanModel->getData();
			$tanggal			= "Dibuat pada " . tanggal(date('y-m-d')) . " pukul " . date('H:i');
		}

		return array('judul' => $judul, 'pengaduan' => $pengaduan, 'tanggal' => $tanggal);
	}

	//--------------------------------------------------------------------
	//VIEW DATA PENGADUAN SISWA - ADMIN
	//--------------------------------------------------------------------
	public function data_pengaduan()
	{


		$nama 			= $this->request->getGet('nama');
		$awal 			= $this->request->getGet('awal');
		$akhir 			= $this->request->getGet('akhir');
		$filter = $this->filter_pengaduan($nama, $awal, $akhir);


		$data	= ([
			'active' 			=> 'Program',
			'title' 			=> 'Data Pengaduan',
			'nama' 				=> $nama,
			'awal' 				=> $awal,
			'akhir' 			=> $akhir,
			'jml_pengaduan' 	=> $this->pengaduanModel->countAll(),
			'terkirim' 			=> $this->pengaduanModel->where('status', 'terkirim')->countAll(),
			'judul' 			=> $filter['judul'],
			'pengaduan' 		=> $filter['pengaduan'],
			'list_siswa' 		=> $this->siswaModel->findAll(),
		]);
		return view('admin/data-pengaduan', $data);
	}

	public function delete_pengaduan($id = FALSE)
	{
		//default $id false jika tidak ada parameter yang di isi
		if ($id == FALSE) {

			$deleteAll = $this->pengaduanModel->query("DELETE FROM pengaduan");
			if ($deleteAll) {
				$files = glob('./public/pengaduan/*'); // ambil semua ekstensi
				foreach ($files as $file) {
					if (is_file($file)) {
						unlink($file); // hapus file
					}
				}
				$this->session->setFlashdata("msg_suc", "Berhasil membersihkan data pengaduan !");
				return redirect()->to(previous_url());
			} else {
				$this->session->setFlashdata("msg_err", "Gagal membersihkan data pengaduan !");
				return redirect()->to(previous_url());
			}
		} else {
			$delete = $this->pengaduanModel->delete($id);

			if ($delete) {
				$this->session->setFlashdata("msg_suc", "Pengaduan telah dihapus !");
				return redirect()->to(previous_url());
			} else {
				$this->session->setFlashdata("msg_err", "Pengaduan gagal dihapus !");
				return redirect()->to(previous_url());
			}
		}
	}

	//--------------------------------------------------------------------
	//PROSES KIRIM DATA PENGADUAN SISWA - SISWA/ADMIN
	//--------------------------------------------------------------------
	public function kirim_pengaduan()
	{
		$nis = $this->request->getPost('nis');
		//jika nama belum di pilih
		if ($nis == 0) {
			$this->session->setFlashdata("msg_err", "Silahkan pilih siswa terlebih dahulu !");
			return redirect()->to(previous_url());
		} else {
			$nama           = $this->siswaModel->where('nis', $nis)->first();
			$nama_lengkap   = $nama->nama;
			$subjek         = $this->request->getPost('subjek');
			$deskripsi      = $this->request->getPost('deskripsi');
			$lampiran       = $this->request->getFile('lampiran');

			$validated = $this->validate([
				'lampiran' => 'uploaded[lampiran]|mime_in[lampiran,image/jpg,image/jpeg,image/png]'
			]);
			// $nama_lampiran = $lampiran->getName();
			if ($validated) {
				$nama_baru = date('Ymd') . "_pengaduan_" . str_replace(" ", "_", $nama_lengkap) . "_" . $lampiran->getRandomName();
				$lampiran->move(ROOTPATH . '/public/pengaduan', $nama_baru);

				if ($lampiran) {
					$data = ([
						"nis_siswa"  => $nis,
						"nama"       => $nama_lengkap,
						"subjek"     => $subjek,
						"lampiran"   => $nama_baru,
						"deskripsi"  => $deskripsi
					]);

					$kirim = $this->pengaduanModel->insert($data);
					if ($kirim) {
						$this->session->setFlashdata("msg_suc", "Berhasil mengirim pengaduan !");
						return redirect()->to(previous_url());
					} else {
						$this->session->setFlashdata("msg_err", "Gagal mengirim pengaduan !");
						return redirect()->to(previous_url());
					}
				} else {
					$this->session->setFlashdata("msg_err", "Gagal mengupload lampiran !");
					return redirect()->to(previous_url());
				}
			} else {
				$this->session->setFlashdata("msg_err", "File tidak valid !");
				return redirect()->to(previous_url());
			}
		}
	}

	public function data_pengaduan_pdf()
	{
		$nama 			= $this->request->getGet('nama');
		$awal 			= $this->request->getGet('awal');
		$akhir 			= $this->request->getGet('akhir');

		$filter = $this->filter_pengaduan($nama, $awal, $akhir);
		$nama_file = strtolower(date('Y_m_d') . "_" . str_replace(" ", "_", $filter['judul']));
		$html = view('admin/data/export_pengaduan', $filter);
		$this->dompdf->loadHtml($html);
		$this->dompdf->render();
		//buat riwayat
		$riwayat = ([
			'nama' 		=> $this->session->nama,
			'subjek' 	=> 'Export data Pengaduan ke Pdf',
			'jenis' 	=> 'Export to pdf',
			'role' 		=> 'Admin',
			'catatan' 	=> "Mengekspor " . $filter['judul'] . " oleh " . $this->session->nama . " melalui halaman admin"
		]);
		$this->riwayatModel->addData($riwayat);

		$this->dompdf->stream($nama_file);
	}

	public function data_pengaduan_excell()
	{
		$nama 			= $this->request->getGet('nama');
		$awal 			= $this->request->getGet('awal');
		$akhir 			= $this->request->getGet('akhir');

		$filter = $this->filter_konsultasi($nama, $awal, $akhir);
		$nama_file = strtolower(date('Y_m_d') . "_" . str_replace(" ", "_", $filter['judul']));

		$helper = new Sample();
		if ($helper->isCli()) {
			$helper->log($nama_file . PHP_EOL);

			return;
		}
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator($this->session->nama)
			->setLastModifiedBy($this->session->nama)
			->setTitle($filter['judul'])
			->setCategory('Pengaduan');

		// tambah judul
		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', $filter['judul']);

		// font bold dan size 14
		$style_judul = [
			'font' => [
				'size' => 16,
				'bold' => true,
			],
			'alignment' => [
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
		];

		// bagian judul
		$spreadsheet->getActiveSheet()
			->getStyle('A1:H2')->applyFromArray($style_judul);
		$spreadsheet->getActiveSheet()->mergeCells("A1:H2");

		// bagian sub-judul
		$isi_kolom = ['No', 'NIS', 'Nama', 'Subjek', 'Lampiran', 'Status', 'Deskripsi', 'Waktu'];
		$spreadsheet->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
		$column = 1;
		foreach ($isi_kolom as $field) {
			// $changeSheet = $spreadSheet->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($column, 3, $field);
			$spreadsheet->getActiveSheet()
				->getStyle('A3:H3')->applyFromArray([
					'borders' =>  [
						'outline' => [
							'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
							'color' => ['rgb' => '1a1a2e'],
						],
					],
					'fill' => [
						'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
						'color' =>  ['argb' => '222831'],
					],
					'font' => [
						'color' =>  ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE],
					],
					'alignment' => [
						'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
						'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
					],
				]);
			$column++;
		}

		// bagian isi
		$kolom = 4;
		$nomor = 0;
		foreach ($filter['konsultasi'] as $k) {
			$spreadsheet->getActiveSheet()
				->setCellValue('A' . $kolom, $nomor += 1)
				->setCellValue('B' . $kolom, $k->nis_siswa)
				->setCellValue('C' . $kolom, $k->nama)
				->setCellValue('D' . $kolom, $k->subjek)
				->setCellValue('E' . $kolom, $k->lampiran)
				->setCellValue('F' . $kolom, $k->status)
				->setCellValue('G' . $kolom, $k->deskripsi)
				->setCellValue('H' . $kolom, $k->created_at);
			$spreadsheet->getActiveSheet()
				->getStyle('A' . $kolom . ':H' . $kolom)->applyFromArray([
					'borders' =>  [
						'outline' => [
							'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
							'color' => ['rgb' => '1a1a2e'],
						],
					]
				]);
			$kolom++;
		}

		//Sesusikan width colum dengan isi
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nama_file . '.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: private'); // HTTP/1.0

		//buat riwayat
		$riwayat = ([
			'nama' 		=> $this->session->nama,
			'subjek' 	=> 'Export data riwayat ke Excell',
			'jenis' 	=> 'Export to excell',
			'role' 		=> 'Admin',
			'catatan' 	=> "Mengekspor " . $filter['judul'] . " oleh " . $this->session->nama . " melalui halaman admin"
		]);
		$this->riwayatModel->addData($riwayat);


		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}





	# KONSULTASI
	protected function filter_konsultasi($nama = FALSE, $awal = FALSE, $akhir = FALSE)
	{
		$tgl_awal = date('Y-m-d H:i:s', strtotime($awal . " 00:00:00")); //filter ke date
		$tgl_akhir = date('Y-m-d H:i:s', strtotime($akhir . " 23:59:59")); //filter ke date

		# Jika semua di isi nilai
		if ($nama != "" && $awal != "" && $akhir != "") {
			$judul  		    = "Data Konsultasi " . $nama . " dari " . tanggal($tgl_awal) . " sampai " . tanggal($tgl_akhir);
			$konsultasi			= $this->konsultasiModel->getDataByDateName($tgl_awal, $tgl_akhir, $nama);
			$tanggal			= "Dibuat pada " . tanggal(date('y-m-d'), false) . " pukul " . date('H:i');

			# Jika nama kosong
		} else if ($nama == "" && $awal != "" && $akhir != "") {
			$judul  		    = "Data Konsultasi " . tanggal($tgl_awal) . " sampai " . tanggal($tgl_akhir);
			$konsultasi			= $this->konsultasiModel->getDataByDate($tgl_awal, $tgl_akhir,);
			$tanggal			= "Dibuat pada " . tanggal(date('y-m-d'), false) . " pukul " . date('H:i');

			# Jika tanggal kosong
		} else if ($nama != "" && $awal == "" && $akhir == "") {

			$judul  		    = "Data Konsultasi " . $nama;
			$konsultasi			= $this->konsultasiModel->getDataByName($nama);
			$tanggal			= "Dibuat pada " . tanggal(date('y-m-d'), false) . " pukul " . date('H:i');

			# Jika tidak ada sama sekali
		} else {
			$judul 				= "Data Seluruh Konsultasi";
			$konsultasi 			= $this->konsultasiModel->getData();
			$tanggal			= "Dibuat pada " . tanggal(date('y-m-d'), false) . " pukul " . date('H:i');
		}

		return array('judul' => $judul, 'konsultasi' => $konsultasi, 'tanggal' => $tanggal);
	}

	public function data_konsultasi($id = FALSE)
	{

		if ($id == FALSE) {
			$nama 			= $this->request->getGet('nama');
			$awal 			= $this->request->getGet('awal');
			$akhir 			= $this->request->getGet('akhir');
			$filter = $this->filter_konsultasi($nama, $awal, $akhir);

			$data = ([
				'active' 			=> "Program",
				'title' 			=> "Data Konsultasi",
				'nama' 				=> $nama,
				'awal' 				=> $awal,
				'akhir' 			=> $akhir,
				'list_siswa' 		=> $this->siswaModel->findAll(),
				'judul' 			=> $filter['judul'],
				'list_konsultasi' 	=> $filter['konsultasi'],
				'jml_konsultasi' 	=> $this->siswaModel->countAll(),
			]);
			return view('/admin/data-konsultasi', $data);
		} else {

			$getData = $this->konsultasiModel->getData($id);

			$data = ([
				'active' 			=> "Program",
				'title' 			=> "Data Konsultasi " . $getData->nama,
				'konsultasi' 		=> $getData,
			]);
			return view('/admin/data-konsultasi-view', $data);
		}
	}
	public function data_konsultasi_view($id)
	{
		$nama 			= $this->request->getGet('nama');
		$awal 			= $this->request->getGet('awal');
		$akhir 			= $this->request->getGet('akhir');
		$filter = $this->filter_konsultasi($nama, $awal, $akhir);

		$data = ([
			'active' 			=> "Program",
			'title' 			=> "Data Konsultasi",
			'nama' 				=> $nama,
			'awal' 				=> $awal,
			'akhir' 			=> $akhir,
			'list_siswa' 		=> $this->siswaModel->findAll(),
			'judul' 			=> $filter['judul'],
			'list_konsultasi' 	=> $filter['konsultasi'],
			'jml_konsultasi' 	=> $this->siswaModel->countAll(),
		]);
		return view('/admin/data-konsultasi', $data);
	}

	public function data_konsultasi_dibaca()
	{
		$id = $this->request->getPost('id');
		$update = $this->konsultasiModel->updateDibaca($id);
	}

	public function delete_konsultasi($id_konsultasi = FALSE)
	{
		if ($id_konsultasi == FALSE) {
			$deleteAll = $this->konsultasiModel->deleteData();
			if ($deleteAll) {
				$files = glob('./public/konsultasi/*'); // ambil semua ekstensi
				foreach ($files as $file) {
					if (is_file($file)) {
						unlink($file); // hapus file
					}
				}

				$this->session->setFlashdata("msg_suc", "Berhasil membersihkan data konsultasi !");
				return redirect()->to(previous_url());
			} else {
				$this->session->setFlashdata("msg_err", "Gagal membersihkan data konsultasi !");
				return redirect()->to(previous_url());
			}
		} else {

			$image = $this->konsultasiModel->getData($id_konsultasi);
			$name_image = $image->lampiran;

			if ($image->lampiran != 'none') {
				$delete_image = unlink('./public/konsultasi/' . $name_image);

				if ($delete_image) {
					$delete = $this->konsultasiModel->deleteData($id_konsultasi);

					if ($delete) {
						$this->session->setFlashdata("msg_suc", "Konsultasi telah dihapus !");
						return redirect()->to(previous_url());
					} else {
						$this->session->setFlashdata("msg_err", "Konsultasi gagal dihapus !");
						return redirect()->to(previous_url());
					}
				} else {
					$this->session->setFlashdata("msg_err", "Konsultasi gagal dihapus !");
				}
				return redirect()->to(previous_url());
			} else {
				$delete = $this->konsultasiModel->deleteData($id_konsultasi);

				if ($delete) {
					$this->session->setFlashdata("msg_suc", "Konsultasi telah dihapus !");
					return redirect()->to(previous_url());
				} else {
					$this->session->setFlashdata("msg_err", "Konsultasi gagal dihapus !");
					return redirect()->to(previous_url());
				}
			}
		}
	}

	public function kirim_konsultasi()
	{
		$nis = $this->request->getPost('nis');
		//jika nama belum di pilih
		if ($nis != 0) {

			$nama           = $this->siswaModel->where('nis', $nis)->first();
			$nama_lengkap   = $nama->nama;
			$subjek         = $this->request->getPost('subjek');
			$deskripsi      = $this->request->getPost('deskripsi');
			$lampiran       = $this->request->getFile('lampiran');
			// Jika lampiran Berisi
			if ($lampiran->isValid()) {
				$validated = $this->validate([
					'lampiran' => 'uploaded[lampiran]|mime_in[lampiran,image/jpg,image/jpeg,image/png]'
				]);
				// $nama_lampiran = $lampiran->getName();
				if ($validated) {
					$nama_baru = date('Ymd') . "_konsultasi_" . str_replace(" ", "_", $nama_lengkap) . "_" . $lampiran->getRandomName();
					$lampiran->move(ROOTPATH . '/public/konsultasi', $nama_baru);

					if ($lampiran) {
						$data = ([
							'nis_siswa' => $nis,
							'nama'      => $nama_lengkap,
							'subjek'    => $subjek,
							'lampiran'  => $nama_baru,
							'deskripsi' => $deskripsi
						]);
						$kirim = $this->konsultasiModel->addData($data);

						if ($kirim) {

							//buat riwayat
							$riwayat = ([
								'nama' 		=> $nama_lengkap,
								'subjek' 	=> 'Mengirimkan konsultasi',
								'jenis' 	=> 'Konsultasi',
								'role' 		=> 'Siswa',
								'catatan' 	=> "Dibuat oleh " . $this->session->nama . " melalui halaman admin"
							]);
							$this->riwayatModel->addData($riwayat);
							$this->session->setFlashdata("msg_suc", "Berhasil mengirim konsultasi !");
							return redirect()->to(previous_url());
						} else {
							$this->session->setFlashdata("msg_err", "Gagal mengirim konsultasi !");
							return redirect()->to(previous_url());
						}
					} else {
						$this->session->setFlashdata("msg_err", "Gagal mengupload lampiran !");
						return redirect()->to(previous_url());
					}
				} else {
					$this->session->setFlashdata("msg_err", "File tidak valid !");
					return redirect()->to(previous_url());
				}
			} else {
				// jika lampiran kosong
				$data = ([
					'nis_siswa' => $nis,
					'nama'      => $nama_lengkap,
					'subjek'    => $subjek,
					'deskripsi' => $deskripsi
				]);

				//buat riwayat
				$riwayat = ([
					'nama' 		=> $nama_lengkap,
					'subjek' 	=> 'Mengirimkan konsultasi',
					'jenis' 	=> 'Konsultasi',
					'role' 		=> 'Siswa',
					'catatan'	=> "Dibuat oleh " . $this->session->nama . " melalui halaman admin"

				]);
				$this->riwayatModel->addData($riwayat);
				$kirim = $this->konsultasiModel->addData($data);

				if ($kirim) {
					$this->session->setFlashdata("msg_suc", "Berhasil mengirim konsultasi !");
					return redirect()->to(previous_url());
				} else {
					$this->session->setFlashdata("msg_err", "Gagal mengirim konsultasi !");
					return redirect()->to(previous_url());
				}
			}
		} else {
			$this->session->setFlashdata("msg_err", "Silahkan pilih siswa terlebih dahulu !");
			return redirect()->to(previous_url());
		}
	}

	public function data_konsultasi_pdf()
	{
		$nama 			= $this->request->getGet('nama');
		$awal 			= $this->request->getGet('awal');
		$akhir 			= $this->request->getGet('akhir');

		$filter = $this->filter_konsultasi($nama, $awal, $akhir);
		$nama_file = strtolower(date('Y_m_d') . "_" . str_replace(" ", "_", $filter['judul']));
		$html = view('admin/data/export_konsultasi', $filter);
		$this->dompdf->loadHtml($html);
		$this->dompdf->render();
		//buat riwayat
		$riwayat = ([
			'nama' 		=> $this->session->nama,
			'subjek' 	=> 'Export data riwayat ke Pdf',
			'jenis' 	=> 'Export to pdf',
			'role' 		=> 'Admin',
			'catatan' 	=> "Mengekspor " . $filter['judul'] . " oleh " . $this->session->nama . " melalui halaman admin"
		]);
		$this->riwayatModel->addData($riwayat);

		$this->dompdf->stream($nama_file);
	}

	public function data_konsultasi_excell()
	{
		$nama 			= $this->request->getGet('nama');
		$awal 			= $this->request->getGet('awal');
		$akhir 			= $this->request->getGet('akhir');

		$filter = $this->filter_konsultasi($nama, $awal, $akhir);
		$nama_file = strtolower(date('Y_m_d') . "_" . str_replace(" ", "_", $filter['judul']));

		$helper = new Sample();
		if ($helper->isCli()) {
			$helper->log($nama_file . PHP_EOL);

			return;
		}
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator($this->session->nama)
			->setLastModifiedBy($this->session->nama)
			->setTitle($filter['judul'])
			->setCategory('Konsultasi');

		// tambah judul
		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', $filter['judul']);

		// font bold dan size 14
		$style_judul = [
			'font' => [
				'size' => 16,
				'bold' => true,
			],
			'alignment' => [
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
		];

		// bagian judul
		$spreadsheet->getActiveSheet()
			->getStyle('A1:H2')->applyFromArray($style_judul);
		$spreadsheet->getActiveSheet()->mergeCells("A1:H2");

		// bagian sub-judul
		$isi_kolom = ['No', 'NIS', 'Nama', 'Subjek', 'Lampiran', 'Status', 'Deskripsi', 'Waktu'];
		$spreadsheet->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
		$column = 1;
		foreach ($isi_kolom as $field) {
			// $changeSheet = $spreadSheet->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($column, 3, $field);
			$spreadsheet->getActiveSheet()
				->getStyle('A3:H3')->applyFromArray([
					'borders' =>  [
						'outline' => [
							'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
							'color' => ['rgb' => '1a1a2e'],
						],
					],
					'fill' => [
						'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
						'color' =>  ['argb' => '222831'],
					],
					'font' => [
						'color' =>  ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE],
					],
					'alignment' => [
						'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
						'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
					],
				]);
			$column++;
		}

		// bagian isi
		$kolom = 4;
		$nomor = 0;
		foreach ($filter['konsultasi'] as $k) {
			$spreadsheet->getActiveSheet()
				->setCellValue('A' . $kolom, $nomor += 1)
				->setCellValue('B' . $kolom, $k->nis_siswa)
				->setCellValue('C' . $kolom, $k->nama)
				->setCellValue('D' . $kolom, $k->subjek)
				->setCellValue('E' . $kolom, $k->lampiran)
				->setCellValue('F' . $kolom, $k->status)
				->setCellValue('G' . $kolom, $k->deskripsi)
				->setCellValue('H' . $kolom, $k->created_at);
			$spreadsheet->getActiveSheet()
				->getStyle('A' . $kolom . ':H' . $kolom)->applyFromArray([
					'borders' =>  [
						'outline' => [
							'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
							'color' => ['rgb' => '1a1a2e'],
						],
					]
				]);
			$kolom++;
		}

		//Sesusikan width colum dengan isi
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nama_file . '.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: private'); // HTTP/1.0

		//buat riwayat
		$riwayat = ([
			'nama' 		=> $this->session->nama,
			'subjek' 	=> 'Export data riwayat ke Excell',
			'jenis' 	=> 'Export to excell',
			'role' 		=> 'Admin',
			'catatan' 	=> "Mengekspor " . $filter['judul'] . " oleh " . $this->session->nama . " melalui halaman admin"
		]);
		$this->riwayatModel->addData($riwayat);


		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}




	#Riwayat Kejadian

	protected function filter_riwayat($nama = FALSE, $awal = FALSE, $akhir = FALSE)
	{
		$tgl_awal = date('Y-m-d H:i:s', strtotime($awal . " 00:00:00")); //filter ke date
		$tgl_akhir = date('Y-m-d H:i:s', strtotime($akhir . " 23:59:59")); //filter ke date

		# Jika semua di isi nilai
		if ($nama != "" && $awal != "" && $akhir != "") {
			$judul  		    = "Data Riwayat " . $nama . " dari " . tanggal($tgl_awal) . " sampai " . tanggal($tgl_akhir);
			$riwayat			= $this->riwayatModel->getDataByDateName($tgl_awal, $tgl_akhir, $nama);
			$tanggal			= "Dibuat pada " . tanggal(date('y-m-d')) . " pukul " . date('H:i');
			# Jika nama kosong
		} else if ($nama == "" && $awal != "" && $akhir != "") {
			$judul  		    = "Data Riwayat " . tanggal($tgl_awal) . " sampai " . tanggal($tgl_akhir);
			$riwayat			= $this->riwayatModel->getDataByDate($tgl_awal, $tgl_akhir,);
			$tanggal			= "Dibuat pada " . tanggal(date('y-m-d')) . " pukul " . date('H:i');

			# Jika nama kosong
		} else if ($nama != "" && $awal == "" && $akhir == "") {

			$judul  		    = "Data Riwayat " . $nama;
			$riwayat			= $this->riwayatModel->getDataByName($nama);
			$tanggal			= "Dibuat pada " . tanggal(date('y-m-d')) . " pukul " . date('H:i');

			# Jika tidak ada sama sekali
		} else {
			$judul 				= "Data Seluruh Riwayat";
			$riwayat 			= $this->riwayatModel->getData();
			$tanggal			= "Dibuat pada " . tanggal(date('y-m-d')) . " pukul " . date('H:i');
		}

		return array('judul' => $judul, 'riwayat' => $riwayat, 'tanggal' => $tanggal);
	}

	public function data_riwayat()
	{
		$nama 			= $this->request->getGet('nama');
		$awal 			= $this->request->getGet('awal');
		$akhir 			= $this->request->getGet('akhir');
		$filter = $this->filter_riwayat($nama, $awal, $akhir);
		$data = ([
			'active' 		=> 'Lainnya',
			'title' 		=> 'Data Riwayat',
			'nama' 			=> $nama,
			'awal' 			=> $awal,
			'akhir' 		=> $akhir,
			'judul' 		=> $filter['judul'],
			'riwayat' 		=> $filter['riwayat'],
			'jml_riwayat' 	=> $this->riwayatModel->countAll()
		]);
		return view('/admin/data-riwayat', $data);
	}

	public function data_riwayat_pdf()
	{
		$nama 			= $this->request->getGet('nama');
		$awal 			= $this->request->getGet('awal');
		$akhir 			= $this->request->getGet('akhir');

		$filter = $this->filter_riwayat($nama, $awal, $akhir);
		$nama_file = strtolower(date('Y_m_d') . "_" . str_replace(" ", "_", $filter['judul']));
		$html = view('admin/data/export_riwayat', $filter);
		$this->dompdf->loadHtml($html);
		$this->dompdf->render();

		//buat riwayat
		$riwayat = ([
			'nama' 		=> $this->session->nama,
			'subjek' 	=> 'Export data riwayat ke Pdf',
			'jenis' 	=> 'Export to Pdf',
			'role' 		=> 'Admin',
			'catatan' 	=> "Mengekspor " . $filter['judul'] . " oleh " . $this->session->nama . " melalui halaman admin"
		]);
		$this->riwayatModel->addData($riwayat);

		$this->dompdf->stream($nama_file);
	}

	public function data_riwayat_excell()
	{
		$nama 			= $this->request->getGet('nama');
		$awal 			= $this->request->getGet('awal');
		$akhir 			= $this->request->getGet('akhir');

		$filter = $this->filter_riwayat($nama, $awal, $akhir);
		$nama_file = strtolower(date('Y_m_d') . "_" . str_replace(" ", "_", $filter['judul']));

		$helper = new Sample();
		if ($helper->isCli()) {
			$helper->log('This example should only be run from a Web Browser' . PHP_EOL);

			return;
		}
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator($this->session->nama)
			->setLastModifiedBy($this->session->nama)
			->setTitle($filter['judul'])
			->setCategory('Log');

		// tambah judul
		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', $filter['judul']);

		// font bold dan size 14
		$style_judul = [
			'font' => [
				'size' => 16,
				'bold' => true,
			],
			'alignment' => [
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
		];

		// bagian judul
		$spreadsheet->getActiveSheet()
			->getStyle('A1:G2')->applyFromArray($style_judul);
		$spreadsheet->getActiveSheet()->mergeCells("A1:G2");

		// bagian sub-judul
		$isi_kolom = ['No', 'Nama', 'Subjek', 'Jenis', 'Role', 'Catatan', 'Created_at'];
		$spreadsheet->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
		$column = 1;
		foreach ($isi_kolom as $field) {
			// $changeSheet = $spreadSheet->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
			$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($column, 3, $field);
			$spreadsheet->getActiveSheet()
				->getStyle('A3:G3')->applyFromArray([
					'borders' =>  [
						'outline' => [
							'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
							'color' => ['rgb' => '1a1a2e'],
						],
					],
					'fill' => [
						'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
						'color' =>  ['argb' => '222831'],
					],
					'font' => [
						'color' =>  ['argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE],
					],
					'alignment' => [
						'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
						'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
					],
				]);
			$column++;
		}

		// bagian isi
		$kolom = 4;
		$nomor = 0;
		foreach ($filter['riwayat'] as $r) {
			$spreadsheet->getActiveSheet()
				->setCellValue('A' . $kolom, $nomor += 1)
				->setCellValue('B' . $kolom, $r->nama)
				->setCellValue('C' . $kolom, $r->subjek)
				->setCellValue('D' . $kolom, $r->jenis)
				->setCellValue('E' . $kolom, $r->role)
				->setCellValue('F' . $kolom, $r->catatan)
				->setCellValue('G' . $kolom, $r->created_at);
			$spreadsheet->getActiveSheet()
				->getStyle('A' . $kolom . ':G' . $kolom)->applyFromArray([
					'borders' =>  [
						'outline' => [
							'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
							'color' => ['rgb' => '1a1a2e'],
						],
					]
				]);
			$kolom++;
		}

		//Sesusikan width colum dengan isi
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $nama_file . '.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: private'); // HTTP/1.0

		//buat riwayat
		$riwayat = ([
			'nama' 		=> $this->session->nama,
			'subjek' 	=> 'Export data riwayat ke Excell',
			'jenis' 	=> 'Export to excell',
			'role' 		=> 'Admin',
			'catatan' 	=> "Mengekspor " . $filter['judul'] . " oleh " . $this->session->nama . " melalui halaman admin"
		]);
		$this->riwayatModel->addData($riwayat);

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}
}

	// public function export()
	// {

	// 	$isi_kolom = ['No', 'Nama', 'Subjek', 'Jenis', 'Role', 'Catatan', 'Created_at'];
	// 	$column = 0;
	// 	foreach ($isi_kolom as $field) {
	// 		$this->writeSheet->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
	// 		$column++;
	// 	}
	// 	$builder = $db->table('pegawai');
	// 	$query = $builder->get();
	// 	$excel_row = 2;
	// 	foreach ($query->getResult('array') as $row) {
	// 		$hasil = array_values($row);
	// 		$kolom = sizeof($row);
	// 		for ($i = 0; $i < $kolom; $i++) {
	// 			$object->getActiveSheet()->setCellValueByColumnAndRow($i, $excel_row, $hasil[$i]);
	// 		}
	// 		$excel_row++;
	// 	}

	// 	$writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
	// 	header('Content-Type: application/vnd.ms-excel');
	// 	header('Content-Disposition: attachment;filename="DataPegawai.xlsx"');
	// 	$writer->save('php://output');
	// }
// }
