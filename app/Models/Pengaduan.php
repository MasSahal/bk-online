<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nis_siswa',
        'nama',
        'tanggal',
        'subjek',
        'lampiran',
        'deskripsi'
    ];
    protected $returnType = 'object';
}
