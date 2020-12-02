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

    //--------------------------------------------------------------------
    //PROSES HAPUS DATA PENGADUAN SISWA - SISWA/ADMIN
    //--------------------------------------------------------------------
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

    //--------------------------------------------------------------------
    //VIEW DATA PENGADUAN SISWA - ADMIN
    //--------------------------------------------------------------------
    public function data_pengaduan()
    {
        if (isset($_SESSION['is_login'])) {
            if ($_SESSION['is_login'] == 'siswa') {
                return redirect()->to(previous_url());
            }
        } else {
            return redirect()->to(previous_url());
        }

        $data['active']             = "Program";
        $data['title']              = "Data Pengaduan";
        $data['pengaduan']          = $this->pengaduanModel->countAll();
        $data['menunggu']           = $this->pengaduanModel->where('status', 'Menunggu')->countAll();
        $data['ditolak']            = $this->pengaduanModel->countAll();
        $data['diterima']           = $this->pengaduanModel->countAll();
        $data['list_pengaduan']     = $this->pengaduanModel->findAll();
        $data['list_siswa']         = $this->siswaModel->findAll();

        return view('admin/data-pengaduan', $data);
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