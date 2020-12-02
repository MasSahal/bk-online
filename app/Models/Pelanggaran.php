<?php

namespace App\Models;

use CodeIgniter\Model;

class Pelanggaran extends Model
{
    protected $table = 'pelanggaran';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'pelanggaran',
        'poin_pelanggaran',
        'keterangan'
    ];
    protected $returnType = 'object';
}
