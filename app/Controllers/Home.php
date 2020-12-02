<?php

namespace App\Controllers;

class Home extends BaseController
{

	//--------------------------------------------------------------------
	//ATTRIBUT
	//--------------------------------------------------------------------
	protected $session;
	protected $db;
	public $faqModel;

	//--------------------------------------------------------------------
	//CONSTRUCT
	//--------------------------------------------------------------------
	public function __construct()
	{
		// $this->session = \Config\Services::session();
		// $this->db = \Config\Database::connect();
		// $this->faqModel = new \App\Models\Faq();
	}

	//--------------------------------------------------------------------
	//INDEX DEFAULT
	//--------------------------------------------------------------------
	public function index()
	{
		return view('siswa/dashboard');
	}

	//--------------------------------------------------------------------
	//VIEW ABOUT - SISWA
	//--------------------------------------------------------------------
	public function about()
	{
		if (isset($_SESSION['is_login'])) {
			if ($_SESSION['is_login'] == 'admin') {
				return redirect()->to(previous_url());
			}
		} else {
			return redirect()->to(previous_url());
		}

		$data['active'] 		= "Lainnya";
		$data['title']  		= "About";
		return view('siswa/about');
	}

	//--------------------------------------------------------------------
	//VIEW FAQ - SISWA
	//--------------------------------------------------------------------
	public function faq()
	{
		if (isset($_SESSION['is_login'])) {
			if ($_SESSION['is_login'] == 'admin') {
				return redirect()->to(previous_url());
			}
		} else {
			return redirect()->to(previous_url());
		}

		$data['active'] 		= "Lainnya";
		$data['title']  		= "FAQ";
		$data['faq'] = $this->faqModel->findAll();
		return view('siswa/faq', $data);
	}

	//--------------------------------------------------------------------
	//VIEW LOGIN - SISWA/ADMIN
	//--------------------------------------------------------------------
	public function login()
	{
		if (isset($_SESSION['is_login'])) {
			if ($_SESSION['is_login'] == 'admin') {

				return redirect()->to(base_url('/admin/dashboard'));
			} else if ($_SESSION['is_login'] == 'siswa') {

				return redirect()->to(base_url('/siswa/dashboard'));
			}
		} else {
			return view('login');
		}
	}

	public function log_out()
	{
		$logout = $this->session->destroy();
		if ($logout) {
			$this->session->setFlashdata('msg_suc', 'Berhasil Logout !');
			return redirect()->to(base_url());
		} else {
			$this->session->setFlashdata('msg_err', 'Request time error !');
			return redirect()->to(base_url());
		}
	}



	//--------------------------------------------------------------------

}
