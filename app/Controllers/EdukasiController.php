<?php

namespace App\Controllers;

class EdukasiController extends BaseController
{
    protected $session;

    public function index()
    {
        if (isset($_SESSION['is_login'])) {
            if ($_SESSION['is_login'] == 'siswa') {
                return redirect()->to(previous_url());
            }
        } else {
            return redirect()->to(base_url());
        }

        $data['active']       = "Home";
        $data['title']        = "Dashboard";
        $data['konsultasi'] = $this->edukasiModel->findAll();
        return view('admin/data-edukasi');
    }

    public function edukasi_siswa()
    {
        if (isset($_SESSION['is_login'])) {
            if ($_SESSION['is_login'] == 'admin') {
                return redirect()->to(previous_url());
            }
        } else {
            return redirect()->to(previous_url());
        }
        $data['active']       = "Home";
        $data['title']        = "Edukasi";
        $data['list_edukasi'] = $this->edukasiModel->orderBy('id', 'RANDOM')->findAll();
        // dd($data);
        return view('siswa/edukasi', $data);
    }

    public function edukasi_view($id)
    {
        if (isset($_SESSION['is_login'])) {
            if ($_SESSION['is_login'] == 'admin') {
                return redirect()->to(previous_url());
            }
        } else {
            return redirect()->to(base_url());
        }

        $data['active']       = "Home";
        $data['title']        = "Edukasi";
        $data['edukasi']      = $this->edukasiModel->where('id', $id)->first();
        // dd($data);
        return view('siswa/edukasi-view', $data);
    }

    public function data_edukasi()
    {
        if (isset($_SESSION['is_login'])) {
            if ($_SESSION['is_login'] == 'siswa') {
                return redirect()->to(previous_url());
            }
        } else {
            return redirect()->to(base_url());
        }

        $data['active']       = "Home";
        $data['title']        = "Data Edukasi";
        $data['list_edukasi'] = $this->edukasiModel->findAll();
        $data['jml_edukasi']  = $this->edukasiModel->countAll();
        return view('admin/data-edukasi', $data);
    }

    public function data_edukasi_view($id)
    {
        if (isset($_SESSION['is_login'])) {
            if ($_SESSION['is_login'] == 'siswa') {
                return redirect()->to(previous_url());
            }
        } else {
            return redirect()->to(base_url());
        }

        $data['active']       = "Home";
        $data['title']        = "View Data Edukasi";
        $data['edukasi']      = $this->edukasiModel->where('id', $id)->first();
        // dd($data);
        return view('admin/data-edukasi-view', $data);
    }

    public function data_edukasi_view_edit($id)
    {
        if (isset($_SESSION['is_login'])) {
            if ($_SESSION['is_login'] == 'siswa') {
                return redirect()->to(previous_url());
            }
        } else {
            return redirect()->to(base_url());
        }

        $data['active']       = "Home";
        $data['title']        = "Edit Data Edukasi";
        $data['edukasi']      = $this->edukasiModel->where('id', $id)->first();
        return view('admin/data-edukasi-view-edit', $data);
    }

    public function tambah_edukasi_view()
    {
        if (isset($_SESSION['is_login'])) {
            if ($_SESSION['is_login'] == 'siswa') {
                return redirect()->to(previous_url());
            }
        } else {
            return redirect()->to(base_url());
        }

        $data['active']       = "Home";
        $data['title']        = "Tambah Data Edukasi";
        $data['list_edukasi'] = $this->edukasiModel->findAll();
        $data['jml_edukasi']  = $this->edukasiModel->countAll();
        return view('admin/data-tambah-edukasi', $data);
    }

    public function tambah_data_edukasi()
    {
        $judul          = $this->request->getPost('judul');
        $link_video     = $this->request->getPost('link_video');
        $deskripsi      = $this->request->getPost('deskripsi');
        $id_pemutaran   = get_id_video($link_video);
        if ($id_pemutaran) {
            $data = ([
                'id_pemutaran'  => $id_pemutaran,
                'judul'         => $judul,
                'link_video'    => $link_video,
                'deskripsi'     => $deskripsi,
            ]);

            $tambah = $this->edukasiModel->insert($data);
            if ($tambah) {
                $this->session->setFlashdata("msg_suc", "Berhasil menambahkan materi edukasi !");
                return redirect()->to(base_url('/admin/data-edukasi'));
            } else {
                $this->session->setFlashdata("msg_err", "Gagal menambahkan materi edukasi !");
                return redirect()->to(previous_url());
            }
        } else {
            $this->session->setFlashdata("msg_err", "Link video bermasalah, Silahkan masukan link dengan benar !");
            return redirect()->to(previous_url());
        }
    }

    public function edit_data_edukasi()
    {

        $id             = $this->request->getPost('id');
        $judul          = $this->request->getPost('judul');
        $link_video     = $this->request->getPost('link_video');
        $deskripsi      = $this->request->getPost('deskripsi');
        $id_pemutaran   = get_id_video($link_video);

        if ($id_pemutaran) {
            $data = ([
                'judul' => $judul,
                'link_video' => $link_video,
                'deskripsi' => $deskripsi,
            ]);

            $update = $this->edukasiModel->update($id, $data);
            if ($update) {
                $this->session->setFlashdata("msg_suc", "Berhasil memperbarui materi edukasi !");
                return redirect()->to(base_url('/admin/data-edukasi'));
            } else {
                $this->session->setFlashdata("msg_err", "Gagal memperbarui materi edukasi !");
                return redirect()->to(previous_url());
            }
        } else {
            $this->session->setFlashdata("msg_err", "Link video bermasalah, Silahkan masukan link dengan benar !");
            return redirect()->to(previous_url());
        }
    }

    public function delete_edukasi($id = FALSE)
    {
        if ($id == FALSE) {

            $deleteAll = $this->edukasiModel->query("DELETE FROM edukasi");
            if ($deleteAll) {
                $this->session->setFlashdata("msg_suc", "Berhasil membersihkan materi edukasi !");
                return redirect()->to(base_url('/admin/data-edukasi'));
            } else {
                $this->session->setFlashdata("msg_err", "Gagal membersihkan materi edukasi !");
                return redirect()->to(previous_url());
            }
        } else {

            $delete = $this->edukasiModel->delete($id);
            if ($delete) {
                $this->session->setFlashdata("msg_suc", "Berhasil menghapus materi edukasi !");
                return redirect()->to(base_url('/admin/data-edukasi'));
            } else {
                $this->session->setFlashdata("msg_err", "Gagal menghapus materi edukasi !");
                return redirect()->to(previous_url());
            }
        }
    }
}
