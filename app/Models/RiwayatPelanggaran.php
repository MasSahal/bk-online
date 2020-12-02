<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatPelanggaran extends Model
{
    protected $table = 'riwayat_pelanggaran';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'siswa',
        'jenis_pelanggaran',
        'poin_pelanggaran',
        'catatan',
        'waktu_pelanggaran'
    ];
    protected $returnType = 'object';
}
