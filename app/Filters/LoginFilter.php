<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->is_login) // saya hanya membuat sederhana saja. silahkan kembangkan di kemudian hari
        {
            // if (session('is_login') == 'siswa') //jika admin
            // {
            //     return redirect()->to(base_url('/admin/dashboard'));
            // } else if (session('is_login') == 'admin') //jika user
            // {
            //     return redirect()->to(base_url('/siswa/dashboard'));
            // } else //
            // {
            //     return redirect()->to(base_url())->with('msg_err', 'Sepertinya ada masalah !');
            // }
            return redirect()->to(base_url())->with(
                'msg_err',
                'Ups Kamu harus login dulu !'
            );
        }
        //  else {
        // }
        // Do something here
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
