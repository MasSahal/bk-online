<?php

namespace App\Models;

use CodeIgniter\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nis',
        'username',
        'poin_pelanggaran',
        'email',
        'password',
        'kelas',
        'jurusan',
        'jenis_kelamin',
        'alamat',
        'date_created'
    ];
    protected $returnType = 'object';
}
