<?php

namespace App\Controllers;

class PelanggaranController extends BaseController
{
    //--------------------------------------------------------------------
    //ATTRIBUT
    //--------------------------------------------------------------------
    protected $session;
    public $siswaModel;
    public $pelanggaranModel;
    public $riwayatKejadian;

    //--------------------------------------------------------------------
    //CONSTRUCT
    //--------------------------------------------------------------------
    public function __construct()
    {
    }

    //--------------------------------------------------------------------
    //VIEW PELANGGARAN - SISWA
    //--------------------------------------------------------------------
    public function pelanggaran()
    {
        if (isset($_SESSION['is_login'])) {
            if ($_SESSION['is_login'] == 'admin') {
                return redirect()->to(previous_url());
            }
        } else {
            return redirect()->to(previous_url());
        }

        $data['active']   = "Program";
        $data['title']    = "Pelanggaran";
        $data['list_pelanggaran'] = $this->pelanggaranModel->findAll();
        $data['saya'] = $this->siswaModel->where('id', $this->session->id_siswa_login)->first();
        // dd($data);
        return view('/siswa/pelanggaran', $data);
    }

    //--------------------------------------------------------------------
    //VIEW RIWAYAT PELANGGARAN - SISWA
    //--------------------------------------------------------------------
    public function riwayat_pelanggaran()
    {
        if (isset($_SESSION['is_login'])) {
            if ($_SESSION['is_login'] == 'admin') {
                return redirect()->to(previous_url());
            }
        } else {
            return redirect()->to(previous_url());
        }

        $data['active']              = "Program";
        $data['title']               = "Pelanggaran";
        $data['riwayat_pelanggaran'] = $this->riwayatKejadian->findAll();
        $data['saya']                = $this->siswaModel->where('id', $this->session->id_siswa_login)->first();
        // dd($data);
        return view('/siswa/riwayat-pelanggaran', $data);
    }

    //--------------------------------------------------------------------
    //VIEW DATA PELANGGARAN - ADMIN
    //--------------------------------------------------------------------


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
    //PROSES KIRIM PELANGGARAN - ADMIN
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
    //PROSES KIRIM PELANGGARAN - ADMIN
    //--------------------------------------------------------------------
    public function edit_data_pelanggaran()
    {

        $id               = $this->request->getPost('id');
        $pelanggaran      = $this->request->getPost('pelanggaran');
        $poin_pelanggaran = $this->request->getPost('poin_pelanggaran');
        $keterangan       = $this->request->getPost('keterangan');

        $data = ([
            'pelanggaran'       => $pelanggaran,
            'poin_pelanggaran'  => $poin_pelanggaran,
            'keterangan'        => $keterangan
        ]);

        $update  = $this->pelanggaranModel->update($id, $data);
        if ($update) {
            $this->session->setFlashdata("msg_suc", "Berhasil mengubah data pelanggaran !");
            return redirect()->to(previous_url());
        } else {
            $this->session->setFlashdata("msg_err", "Gagal mengubah data pelanggaran !");
            return redirect()->to(previous_url());
        }
    }

    //--------------------------------------------------------------------
    //VIEW DATA PELANGGARAN SISWA - ADMIN
    //--------------------------------------------------------------------
    public function data_pelanggaran_siswa()
    {
        if (isset($_SESSION['is_login'])) {
            if ($_SESSION['is_login'] == 'siswa') {
                return redirect()->to(previous_url());
            }
        } else {
            return redirect()->to(previous_url());
        }

        $data['active']              = "Program";
        $data['title']               = "Data Pelanggaran Siswa";
        $data['riwayat_pelanggaran'] = $this->riwayatKejadian->findAll();
        $data['pelanggaran']         = $this->pelanggaranModel->findAll();
        $data['siswa']               = $this->siswaModel->findAll();

        // dd($data);
        return view('/admin/data-pelanggaran-siswa', $data);
    }

    //--------------------------------------------------------------------
    //PROSES HAPUS DATA PELANGGARAN SISWA - ADMIN
    //--------------------------------------------------------------------
    public function delete_pelanggaran_siswa($id = FALSE)
    {

        if ($id == FALSE) {

            $deleteAll = $this->pelanggaranModel->query("DELETE FROM riwayat_pelanggaran");
            if ($deleteAll) {

                $this->session->setFlashdata("msg_suc", "Berhasil membersihkan data riwayat pelanggaran !");
                return redirect()->to(previous_url());
            } else {
                $this->session->setFlashdata("msg_err", "Gagal membersihkan data riwayat pelanggaran !");
                return redirect()->to(previous_url());
            }
        }
    }

    //--------------------------------------------------------------------
    //PROSES KIRIM DATA PELANGGARAN SISWA - ADMIN
    //--------------------------------------------------------------------
    public function kirim_pelanggaran_siswa()
    {

        $id_siswa         = $this->request->getPost('id_siswa');
        $id_pelanggaran   = $this->request->getPost('id_pelanggaran');
        $catatan       = $this->request->getPost('catatan');

        //ambil poin siswa berdasarkan id siswa
        $data_siswa = $this->siswaModel->where('id', $id_siswa)->first();

        //ambil poin default berdasarkan id pelanggaran
        $data_pelanggaran = $this->pelanggaranModel->where('id', $id_pelanggaran)->first();

        //jumlahkan poin
        $poin_baru = ($data_pelanggaran->poin_pelanggaran + $data_siswa->poin_pelanggaran);

        $input_poin_pelanggaran = $this->siswaModel->update($id_siswa, ['poin_pelanggaran' => $poin_baru]);
        if ($input_poin_pelanggaran) {

            //input ke riwayat
            $data = ([
                'siswa'             => $data_siswa->nama,
                'jenis_pelanggaran' => $data_pelanggaran->pelanggaran,
                'poin_pelanggaran'  => $data_pelanggaran->poin_pelanggaran,
                'catatan'           => $catatan
            ]);

            $tambah_riwayat = $this->riwayatKejadian->insert($data);
            if ($tambah_riwayat) {
                $this->session->setFlashdata("msg_suc", "Berhasil menambah data pelanggaran siswa !");
                return redirect()->to(previous_url());
            } else {
                $this->session->setFlashdata("msg_err", "Gagal menambah data pelanggaran siswa !");
                return redirect()->to(previous_url());
            }
        } else {
            $this->session->setFlashdata("msg_err", "Gagal menambah data pelanggaran siswa !");
            return redirect()->to(previous_url());
        }
    }
}
