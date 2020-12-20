<?php

namespace App\Controllers;

class KonsultasiController extends BaseController
{
    //--------------------------------------------------------------------
    //ATTRIBUT
    //--------------------------------------------------------------------
    protected $session;
    protected $db;
    public $konsultasiModel;
    public $siswaModel;

    //--------------------------------------------------------------------
    //CONSTRUSCT
    //--------------------------------------------------------------------
    public function __construct()
    {
    }

    //--------------------------------------------------------------------
    //VIEW DATA KONSULTASI - SISWA
    //--------------------------------------------------------------------
    public function konsultasi()
    {
        if (isset($_SESSION['is_login'])) {
            if ($_SESSION['is_login'] == 'admin') {
                return redirect()->to(previous_url());
            }
        } else {
            return redirect()->to(previous_url());
        }

        $data['active']                 = "Program";
        $data['title']                  = "Konsultasi";
        $nis_siswa                      = $this->session->nis;
        $data['list_konsultasi']        = $this->konsultasiModel->where('nis_siswa', $nis_siswa)->findAll();
        $rows                           = $this->konsultasiModel->where('nis_siswa', $nis_siswa)->find();
        $data['jml_konsultasi_saya']    = count($rows);
        $data['jml_konsultasi']         = $this->konsultasiModel->countAll();
        // dd($data);
        return view('/siswa/konsultasi', $data);
    }
}

//validasi
        // $validationRules    = [
        //     'nama'         => 'required|min_length[3]',
        //     'subjek'       => 'required|min_length[3]',
        //     'deskripsi'    => 'required|min_length[5]'
        // ];
        // $this->KonsultasiModel->setValidationRules($validationRules)
        
        // if ($this->validasi->run($data, 'konsul') == TRUE) {
        //     

        //     if ($kirim) {
        //         $this->session->setFlashdata("msg_suc", "Berhasil Mengirim Konsultasi !");
        //         return redirect()->to(base_url('/siswa/konsultasi'));
        //     } else {
        //         $this->session->setFlashdata("msg_err", "Gagal Mengirim Konsultasi !");
        //         return redirect()->to(base_url('/siswa/konsultasi'));
        //         // return view('siswa/konsultasi', ['errors' => $this->konsultasiModel->errors()]);
        //     }
        // } else {
        //     // mengembalikan nilai input yang sudah dimasukan sebelumnya
        //     session()->setFlashdata('inputs', $this->request->getPost());
        //     //biuat pesan error
        //     $this->session->setFlashdata("msg_err", "Gagal Mengirim Konsultasi !");
        //     // memberikan pesan error pada saat input data
        //     session()->setFlashdata('errors', $this->validasi->getErrors());
        //     // kembali ke halaman form
        //     return redirect()->to(base_url('/siswa/konsultasi'));
        // }