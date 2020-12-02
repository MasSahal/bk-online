<?php

namespace App\Models;

use CodeIgniter\Model;

class Edukasi extends Model
{
    protected $table = 'edukasi';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_pemutaran',
        'judul',
        'link_video',
        'deskripsi',
        'waktu_upload'
    ];
    protected $returnType = 'object';
}
