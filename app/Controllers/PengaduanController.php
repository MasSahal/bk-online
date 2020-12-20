<?php

namespace App\Controllers;

class PengaduanController extends BaseController
{

    //--------------------------------------------------------------------
    //ATTRIBUT
    //--------------------------------------------------------------------
    protected $session;
    protected  $db;
    public  $pengaduanModel;

    //--------------------------------------------------------------------
    //VIEW PENGADUAN - SISWA
    //--------------------------------------------------------------------
    public function pengaduan()
    {
        if (isset($_SESSION['is_login'])) {
            if ($_SESSION['is_login'] == 'admin') {
                return redirect()->to(previous_url());
            }
        } else {
            return redirect()->to(previous_url());
        }

        $data['active']             = "Program";
        $data['title']              = "Pengaduan";
        $nis_siswa                  = $this->session->nis;
        $data['list_pengaduan']     = $this->pengaduanModel->where('nis_siswa', $nis_siswa)->findAll();
        $data['jml_pengaduan']      = $this->pengaduanModel->countAll();
        $rows                       = $this->pengaduanModel->where('nis_siswa', $nis_siswa)->find();
        $data['saya']               = count($rows);
        return view('siswa/pengaduan', $data);
    }
}

// public function hapus_semua_pengaduan()
// {
//     $deleteAll = $this->pengaduanModel->query("DELETE FROM pengaduan");
//     if ($deleteAll) {
//         $files = glob('./public/pengaduan/*'); // ambil semua ekstensi
//         foreach ($files as $file) {
//             if (is_file($file)) {
//                 unlink($file); // hapus file
//             }
//         }
//         $this->session->setFlashdata("msg_suc", "Berhasil membersihkan data pengaduan !");
//         return redirect()->to(previous_url());
//     } else {
//         $this->session->setFlashdata("msg_err", "Gagal membersihkan data pengaduan !");
//         return redirect()->to(previous_url());
//     }
// }