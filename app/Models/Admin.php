<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'kode_admin',
        'nama',
        'email',
        'password',
        'jenis_kelamin',
        'alamat',
        'date_created'
    ];
    protected $returnType = 'object';
}
