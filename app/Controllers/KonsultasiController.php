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

    //--------------------------------------------------------------------
    //PROSES DELETE KONSULTASI - SISWA/ADMIN
    //--------------------------------------------------------------------
    public function delete_konsultasi($id = FALSE)
    {
        if ($id == FALSE) {
            $deleteAll = $this->konsultasiModel->query("DELETE FROM konsultasi");
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

            $image = $this->konsultasiModel->where('id', $id)->first();
            $name_image = $image->lampiran;

            $delete_image = unlink('./public/konsultasi/' . $name_image);

            if ($delete_image) {
                $delete = $this->konsultasiModel->delete($id);

                if ($delete) {
                    $this->session->setFlashdata("msg_suc", "Konsultasi telah dihapus !");
                    return redirect()->to(previous_url());
                } else {
                    $this->session->setFlashdata("msg_err", "Konsultasi gagal dihapus !");
                    return redirect()->to(previous_url());
                }
            } else {
                $this->session->setFlashdata("msg_err", "Konsultasi gagal dihapus !");
                return redirect()->to(previous_url());
            }
        }
    }

    //--------------------------------------------------------------------
    //PROSES KIRIM KONSULTASI - SISWA/ADMIN
    //--------------------------------------------------------------------
    public function kirim_konsultasi()
    {
        $nis = $this->request->getPost('nis');
        //jika username belum di pilih
        if ($nis == 0) {
            $this->session->setFlashdata("msg_err", "Silahkan pilih siswa terlebih dahulu !");
            return redirect()->to(previous_url());
        } else {

            $nama           = $this->siswaModel->where('nis', $nis)->first();
            $nama_lengkap   = $nama->username;
            $subjek         = $this->request->getPost('subjek');
            $deskripsi      = $this->request->getPost('deskripsi');
            $lampiran       = $this->request->getFile('lampiran');

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
                    $kirim = $this->konsultasiModel->insert($data);

                    if ($kirim) {
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
        }




        // 
    }

    //--------------------------------------------------------------------
    //VIEW KONSULTASI - ADMIN
    //--------------------------------------------------------------------
    public function data_konsultasi()
    {
        if (isset($_SESSION['is_login'])) {
            if ($_SESSION['is_login'] == 'siswa') {
                return redirect()->to(previous_url());
            }
        } else {
            return redirect()->to(previous_url());
        }

        $data['active']             = "Program";
        $data['title']              = "Data Konsultasi";
        $data['list_siswa']         = $this->siswaModel->findAll();
        $data['list_konsultasi']    = $this->konsultasiModel->findAll();
        $data['jml_konsultasi']     = $this->konsultasiModel->countAll();
        return view('/admin/data-konsultasi', $data);
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