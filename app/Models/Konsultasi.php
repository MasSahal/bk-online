<?php

namespace App\Models;

use CodeIgniter\Model;

class Konsultasi extends Model
{
    protected $table = 'konsultasi';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nis_siswa',
        'nama',
        'subjek',
        'lampiran',
        'deskripsi',
        'tanggal'
    ];
    protected $returnType = 'object';


    // //validasi data
    // protected $validationRules    = [
    //     'nama'         => 'required|min_length[3]',
    //     'subjek'       => 'required|min_length[3]',
    //     'deskripsi'    => 'required|min_length[3]',
    //     'nama'         => 'required|min_length[3]',
    // ];

    // //pesan validasi data
    // protected $validationMessages = [
    //     'nama'        => [
    //         'required' => 'Wajib di isi !s'
    //     ]
    // ];
}
