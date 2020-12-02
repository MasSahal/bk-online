<?php

function akses_admin($admin)
{
    $admin = $_SESSION['is_login'];
    if (isset($admin)) {

        //jika yg login bukan admin
        if ($admin != 'admin') {
            return redirect()->to(previous_url());
        }
    } else {
        return redirect()->to(previous_url());
    }
}

function akses_siswa($siswa)
{
    $siswa = $_SESSION['is_login'];
    if (isset($siswa)) {

        //jika yg login bukan siswa
        if ($siswa != 'siswa') {
            return redirect()->to(previous_url());
        }
    } else {
        return redirect()->to(previous_url());
    }
}
