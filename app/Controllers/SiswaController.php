<?php

namespace App\Controllers;

use codeIgniter\Controller;

class SiswaController extends BaseController
{
	//--------------------------------------------------------------------
	//ATTRIBUT
	//--------------------------------------------------------------------
	protected $session;
	protected $siswaModel;
	protected $pelanggaranModel;
	public  $validasi;
	public  $db;

	//--------------------------------------------------------------------
	//VIEW DASHBOARD SISWA
	//--------------------------------------------------------------------
	public function index()
	{
		if (isset($_SESSION['is_login'])) {
			//jika yg login bukan admin
			if ($_SESSION['is_login'] == 'admin') {
				return redirect()->to(previous_url());
			}
		} else {
			return redirect()->to(previous_url());
		}

		$data['active'] 		= "Home";
		$data['title']  		= "Dashboard";
		$id 					= $this->session->id_siswa_login;
		$data['saya']  			= $this->siswaModel->find($id);
		$data['edukasi']  		= $this->edukasiModel->orderBy('id', 'RANDOM')->first();
		$data['list_edukasi']   = $this->edukasiModel->findAll(2);
		// DD($data);
		return view('siswa/dashboard', $data);
	}

	//--------------------------------------------------------------------
	//VIEW DAFTAR - SISWA
	//--------------------------------------------------------------------
	public function daftar()
	{
		$data['title'] = "Daftar Siswa";
		return view('register', $data);
	}

	//--------------------------------------------------------------------
	//VIEW PROFILE SAYA - SISWA
	//--------------------------------------------------------------------
	public function profile_saya()
	{
		if (isset($_SESSION['is_login'])) {

			if ($_SESSION['is_login'] == 'admin') {
				return redirect()->to(previous_url());
			}
		} else {
			return redirect()->to(previous_url());
		}

		$id = $this->session->id_siswa_login;
		$data['title'] = "Profile Saya";
		$data['active'] = "Profile";
		$data['profile_saya'] = $this->siswaModel->where('id', $id)->first();
		// dd($id);
		return view('siswa/profile-saya', $data);
	}

	//--------------------------------------------------------------------
	//VIEW PROFILE SISWA - SISWA
	//--------------------------------------------------------------------
	public function profile_siswa()
	{
		if (isset($_SESSION['is_login'])) {

			if ($_SESSION['is_login'] == 'admin') {
				return redirect()->to(previous_url());
			}
		} else {
			return redirect()->to(previous_url());
		}

		$data['title'] = "Profile Siswa";
		$data['active'] = "Profile";
		$data['list_siswa'] = $this->siswaModel->findAll();
		return view('siswa/profile-siswa', $data);
	}

	//--------------------------------------------------------------------
	//AUTH - SISWA
	//--------------------------------------------------------------------
	public function auth()
	{
		$email = $this->request->getPost('email');
		$pass = $this->request->getPost('password');
		// $akun = $this->db->query("SELECT * FROM siswa WHERE username='$user' AND password='$pass'")->getResultArray();

		$akun = $this->siswaModel->where('email', $email)->first();

		if ($akun) {
			$verifY = password_verify($pass, $akun->password);
			if ($verifY) {
				$sesi_login = [
					'id_siswa_login' => $akun->id,
					'nis'            => $akun->nis,
					'username'       => $akun->username,
					'email'          => $akun->email,
					'is_login'      => 'siswa'
				];
				$this->session->set($sesi_login);
				$this->session->setFlashdata('msg_login', 'Selamat Datang Kembali ' . $akun->username);
				return redirect()->to(base_url('/siswa/dashboard'));
			} else {
				$this->session->setFlashdata('msg_err', 'Gagal Login !');
				return redirect()->to(base_url('/login'));
				// return redirect()->to(base_url('/pengaduan'));
			}
		} else {
			$this->session->setFlashdata('msg_err', 'Email dan Password tidak ditemukan !');
			return redirect()->to(base_url('/'));
		}
	}

	//--------------------------------------------------------------------
	//PROFILE SISWA
	//--------------------------------------------------------------------
	public function tambah_profile_siswa()
	{

		$nis            = $this->request->getPost('nis');
		$cek_nis = $this->siswaModel->where(['nis' => $nis])->first();
		if ($cek_nis == NULL) {
			$nama           = $this->request->getPost('nama');
			$kelas           = $this->request->getPost('kelas');
			$jurusan           = $this->request->getPost('jurusan');
			$email          = $this->request->getPost('email');
			$password       = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
			$jenis_kelamin  = $this->request->getPost('jenis_kelamin');
			$alamat         = $this->request->getPost('alamat');

			//masukan data array ke variable
			$data = ([
				"nis"            => $nis,
				"username"       => $nama,
				"kelas"       	 => $kelas,
				"jurusan"        => $jurusan,
				"email"          => $email,
				"password"       => $password,
				"jenis_kelamin"  => $jenis_kelamin,
				"alamat"         => $alamat
			]);

			//eksekusi data ke database
			$tambah = $this->siswaModel->insert($data);
			if ($tambah) {
				$this->session->setFlashdata('msg_suc', 'Pendaftaran siswa berhasil ! <a href="<?=base_url()?>"> Login here </a>');
				return redirect()->to(previous_url());
			} else {
				$this->session->setFlashdata('msg_err', 'Gagal mendaftar, Silahkan coba lagi atau hubungi Admin !');
				return redirect()->to(previous_url());
			}
		} else {
			$this->session->setFlashdata('msg_err', 'NIS Sudah terdaftar, Silahkan coba lagi atau hubungi Admin !');
			return redirect()->to(previous_url());
		}
	}

	//--------------------------------------------------------------------
	//PROSES HAPUS PROFILE SISWA - SISWA/ADMIN
	//--------------------------------------------------------------------
	public function delete_profile_siswa($id = FALSE)
	{
		if ($id == FALSE) {

			$deleteAll = $this->siswaModel->query("DELETE FROM siswa");
			if ($deleteAll) {

				$this->session->setFlashdata("msg_suc", "Berhasil membersihkan data profile siswa !");
				return redirect()->to(previous_url());
			} else {
				$this->session->setFlashdata("msg_err", "Gagal membersihkan data profile siswa !");
				return redirect()->to(previous_url());
			}
		} else {

			$delete = $this->siswaModel->delete($id);

			if ($delete) {
				$this->session->setFlashdata("msg_suc", "Profile siswa telah dihapus !");
				return redirect()->to(previous_url());
			} else {
				$this->session->setFlashdata("msg_err", "Profile siswa gagal dihapus !");
				return redirect()->to(previous_url());
			}
		}
	}

	//--------------------------------------------------------------------
	//PROSES EDIT PROFILE SISWA - SISWA/ADMIN
	//--------------------------------------------------------------------
	public function edit_profile_siswa()
	{

		$id            	= $this->request->getPost('id');
		$nis            = $this->request->getPost('nis');
		$nama           = $this->request->getPost('nama');
		$kelas          = $this->request->getPost('kelas');
		$jurusan        = $this->request->getPost('jurusan');
		$email          = $this->request->getPost('email');
		$jenis_kelamin  = $this->request->getPost('jenis_kelamin');
		$alamat         = $this->request->getPost('alamat');

		//masukan data array ke variable
		$data = ([
			"nis"            => $nis,
			"username"       => $nama,
			"kelas"       	 => $kelas,
			"jurusan"        => $jurusan,
			"email"          => $email,
			"jenis_kelamin"  => $jenis_kelamin,
			"alamat"         => $alamat
		]);

		//eksekusi data ke database
		$tambah = $this->siswaModel->update($id, $data);
		if ($tambah) {
			$this->session->setFlashdata('msg_suc', 'Pendaftaran siswa berhasil !');
			return redirect()->to(previous_url());
		} else {
			$this->session->setFlashdata('msg_err', 'Gagal mendaftar, Silahkan coba lagi atau hubungi Admin !');
			return redirect()->to(previous_url());
		}
	}

	//--------------------------------------------------------------------
	//PROSES EDIT PASSWORD SISWA - SISWA/ADMIN
	//--------------------------------------------------------------------
	public function edit_password_siswa()
	{
		$id       			  = $this->request->getPost('id');
		$password_baru        = $this->request->getPost('password-baru');
		$password_konfir      = $this->request->getPost('password-konfir');

		if ($password_baru == $password_konfir) {
			$data = ([
				'password' => password_hash($password_baru, PASSWORD_DEFAULT)
			]);

			//eksekusi data ke database
			$ubah_pw = $this->siswaModel->update($id, $data);
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
}



	// public function data_profile_siswa()
	// {
	// 	$data['active'] 	= "program";
	// 	$data['title']  	= "Dashboard";
	// 	$data['list_siswa'] = $this->siswaModel->findAll();
	// 	return view('admin/data-profile-siswa', $data);
	// }