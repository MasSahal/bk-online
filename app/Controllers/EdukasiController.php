<?php

namespace App\Controllers;

class EdukasiController extends BaseController
{
    protected $session;

    public function edukasi()
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
}
