<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form', 'filesystem', 'custom_helper', 'akses_helper'];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		// helper(['form', 'filesystem', 'ago_helper']);

		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
		$this->session 					= \Config\Services::session();
		$this->db 						= \Config\Database::connect();
		$this->edukasiModel 			= new \App\Models\Edukasi();
		$this->edukasiKomentarModel 	= new \App\Models\Edukasi_Komentar();
		$this->faqModel 				= new \App\Models\Faq();
		$this->adminModel 				= new \App\Models\Admin();
		$this->siswaModel 				= new \App\Models\Siswa();
		$this->pengaduanModel 			= new \App\Models\Pengaduan();
		$this->konsultasiModel 			= new \App\Models\Konsultasi();
		$this->pelanggaranModel 		= new \App\Models\Pelanggaran();
		$this->riwayatModel 			= new \App\Models\Riwayat();

		$options 						= new \Dompdf\Options();
		$options->set('defaultFont', 'helvetica');
		$this->dompdf 					= new \Dompdf\Dompdf($options);
		$this->dompdf->setPaper('A4', 'potrait');

		// $this->spreadSheet				= new \PhpOffice\PhpSpreadsheet\Spreadsheet();
		// $this->writeSheet 				= $this->spreadSheet->getActiveSheet();
		// $this->Sheet					= new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($this->spreadSheet);
		// $this->dompdf 					= new \Dompdf\Dompdf();
		//set default time zone
		date_default_timezone_set("ASIA/BANGKOK");
	}
}
