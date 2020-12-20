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
	//INDEX DEFAULT
	//--------------------------------------------------------------------
	public function index()
	{
		return view('siswa/dashboard');
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
	//VIEW ABOUT - SISWA
	//--------------------------------------------------------------------
	public function about()
	{
		$data['active'] 		= "Lainnya";
		$data['title']  		= "About";
		return view('siswa/about');
	}

	//--------------------------------------------------------------------
	//VIEW FAQ - SISWA
	//--------------------------------------------------------------------
	public function faq()
	{


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


	public function forgotPassword()
	{
		$email = \Config\Services::email();
		$config['protocol'] = 'sendmail';
		$config['mailPath'] = '/usr/sbin/sendmail';
		$config['charset']  = 'iso-8859-1';
		$config['wordWrap'] = true;

		$email->initialize($config);

		$email->setFrom('handyvidic28@gmail.com', 'Your Name');
		$email->setTo($this->request->getPost('email'));
		$email->setCC('another@another-example.com');
		$email->setBCC('them@their-example.com');

		$email->setSubject('Email Test');
		$email->setMessage('Testing the email class.Lupa password');

		$email->send();
		if ($email) {
			$this->session->setFlashdata('msg_suc', 'Berhasil kirim !');
			return redirect()->to(base_url());
		} else {
			$this->session->setFlashdata('msg_err', 'Request time error !');
			return redirect()->to(base_url());
		}
	}


	//--------------------------------------------------------------------

}
