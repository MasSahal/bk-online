<?php

namespace App\Controllers;

class AdminController extends BaseController
{

	public $session;
	public $db;
	public $faqModel;
	public $adminModel;

	//--------------------------------------------------------------------
	//METHOD INDEX
	//--------------------------------------------------------------------
	public function index()
	{
		if (isset($_SESSION['is_login'])) {
			if ($_SESSION['is_login'] == 'siswa') {
				return redirect()->to(previous_url());
			}
		} else {
			return redirect()->to(previous_url());
		}

		$data['active']       = "Home";
		$data['title']        = "Dashboard";
		$data['siswa']        = $this->siswaModel->countAll();
		$data['edukasi']      = $this->edukasiModel->countAll();
		$data['pengaduan']    = $this->pengaduanModel->countAll();
		$data['konsultasi']   = $this->konsultasiModel->countAll();
		$data['pelanggaran']  = $this->pelanggaranModel->countAll();

		$data['list_edukasi']      = $this->edukasiModel->findAll(2);

		return view('admin/dashboard', $data);
	}

	//--------------------------------------------------------------------
	//AUTH ADMIN
	//--------------------------------------------------------------------
	public function auth()
	{

		$email = $this->request->getPost('email');
		$pass = $this->request->getPost('password');       // $akun = $this->db->query("SELECT * FROM siswa WHERE username='$user' AND password='$pass'")->getResultArray();

		$akun = $this->adminModel->where('email', $email)->first();
		if ($akun) {
			$verifY = password_verify($pass, $akun->password);
			if ($verifY) {
				$sesi_login = [
					'id_login_admin'      => $akun->id,
					'kode_admin'    => $akun->kode_admin,
					'nama'          => $akun->nama,
					'email'         => $akun->email,
					'is_login'     => 'admin'
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
		if (isset($_SESSION['is_login'])) {

			if ($_SESSION['is_login'] == 'siswa') {
				return redirect()->to(previous_url());
			}
		} else {
			return redirect()->to(previous_url());
		}

		$data['active']           = "Program";
		$data['title']            = "Data Pelanggaran";
		$data['pelanggaran']      = $this->pelanggaranModel->countAll();
		$data['list_pelanggaran'] = $this->pelanggaranModel->findAll();
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
		if (isset($_SESSION['is_login'])) {

			if ($_SESSION['is_login'] == 'siswa') {
				return redirect()->to(previous_url());
			}
		} else {
			return redirect()->to(previous_url());
		}

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
		$data['title'] = "Data Profile Saya";
		$data['active'] = "Profile";
		$data['list_admin'] = $this->adminModel->where('id !=', $id)->findAll();
		$data['profile_saya'] = $this->adminModel->find($id);
		// dd($data);
		return view('admin/data-profile-saya', $data);
	}

	//--------------------------------------------------------------------
	//PROSES TAMBAH PROFILE ADMIN - ADMIN
	//--------------------------------------------------------------------
	public function tambah_profile_admin()
	{
		$kode_admin       = $this->request->getPost('kode_admin');
		$nama             = $this->request->getPost('nama');
		$email            = $this->request->getPost('email');
		$password         = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
		$alamat           = $this->request->getPost('alamat');
		$jenis_kelamin    = $this->request->getPost('jenis_kelamin');

		$cek_kode_admin = $this->adminModel->where(['kode_admin' => $kode_admin])->first();
		// dd(!$cek_kode_admin);
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
		$kode_admin       = $this->request->getPost('kode_admin');
		$nama             = $this->request->getPost('nama');
		$email            = $this->request->getPost('email');
		$alamat           = $this->request->getPost('alamat');
		$jenis_kelamin    = $this->request->getPost('jenis_kelamin');

		$data = ([
			'kode_admin' 	=> $kode_admin,
			'nama' 			=> $nama,
			'email' 		=> $email,
			'alamat' 		=> $alamat,
			'jenis_kelamin' => $jenis_kelamin
		]);
		// dd($data);
		$update  = $this->adminModel->update($id, $data);
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
			$deleteAll = $this->pelanggaranModel->query("DELETE FROM admin WHERE id != $id_akun_aktif");
			if ($deleteAll) {

				$this->session->setFlashdata("msg_suc", "Berhasil membersihkan semua administrator !");
				return redirect()->to(previous_url());
			} else {
				$this->session->setFlashdata("msg_err", "Gagal membersihkan semua administrator !");
				return redirect()->to(previous_url());
			}
		} else {
			$delete = $this->adminModel->delete($id);

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
	//PROSES EDIT PASSWORD SISWA - SISWA/ADMIN
	//--------------------------------------------------------------------
	public function edit_password_admin()
	{
		$id       			  = $this->request->getPost('id');
		$password_baru        = $this->request->getPost('password-baru');
		$password_konfir      = $this->request->getPost('password-konfir');

		if ($password_baru == $password_konfir) {
			$data = ([
				'password' => password_hash($password_baru, PASSWORD_DEFAULT)
			]);

			//eksekusi data ke database
			$ubah_pw = $this->adminModel->update($id, $data);
			if ($ubah_pw) {
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
		if (isset($_SESSION['is_login'])) {
			if ($_SESSION['is_login'] == 'siswa') {
				return redirect()->to(previous_url());
			}
		} else {
			return redirect()->to(previous_url());
		}

		$data['title'] = "About";
		$data['active'] = "Lainnya";
		return view('admin/data-about', $data);
	}

	//--------------------------------------------------------------------
	//PROSES LOGOUT - ADMIN
	//--------------------------------------------------------------------
	public function admin_logout()
	{
	}
	//--------------------------------------------------------------------

}
