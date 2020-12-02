<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];


	// public $validasi_daftar = [
	// 	"nis"           => 'required|min_length[5]|max_length[20]',
	// 	"username"      => 'required|min_length[5]|max_length[20]',
	// 	"email"         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[siswa.email]',
	// 	"kelas"         => 'required|min_length[1]|max_length[2]',
	// 	"jurusan"       => 'required',
	// 	"jenis_kelamin" => 'required',
	// 	"alamat"        => 'required'
	// ];
	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */

	//validasi konsultasi
	public $konsul    = [
		'nama'         => 'required|min_length[3]',
		'subjek'       => 'required|min_length[3]',
		'deskripsi'    => 'required|min_length[5]'
	];

	//pesan validasi konsultasi
	public $konsul_error = [
		'nama'        => [
			'required'		=> 'Wajib di isi !',
			'min_length' => 'Masukan minimal 3 karakter.'
		],
		'subjek'        => [
			'required'		=> 'Wajib di isi !',
			'min_length' => 'Masukan minimal 3 karakter.'
		],
		'deskripsi'        => [
			'required'		=> 'Wajib di isi !',
			'min_length' => 'Masukan minimal 3 karakter.'
		]
	];


	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
